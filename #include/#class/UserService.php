<?php

namespace App;

include ROOT_PATH . 'vendor/autoload.php';

use Exception;

class UserService
{
  private $db;

  public function __construct()
  {
    $this->db = new DB(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  }

  public function getUsers()
  {
    $query = "SELECT * FROM user";

    try {
      $users = $this->db->squery($query, []);

      if (empty($users)) {
        return $this->createErrorResponse('No users available');
      }

      return $this->createSuccessResponse('Users retrieved successfully', $users);
    } catch (Exception $e) {
      return $this->createErrorResponse('Server error occurred');
    }
  }

  public function getUser(string $params)
  {
    $query = "SELECT * FROM user WHERE id = :id OR username = :username OR email = :email LIMIT 1";
    try {
      $user = $this->db->squery_single($query, [
        'id' => $params,
        'username' => $params,
        'email' => $params
      ]);

      // Memeriksa user
      if (empty($user)) {
        return $this->createErrorResponse('User not found');
      }

      return $this->createSuccessResponse('', $user);
    } catch (Exception $e) {
      return $this->createErrorResponse('Server error occurred');
    }
  }

  public function loginUser(array $data)
  {
    $query = "SELECT * FROM user WHERE email = :email OR username = :username LIMIT 1";
    try {
      $user = $this->db->squery_single($query, [
        'email' => $data['email'],
        'username' => $data['username']
      ]);

      // Memeriksa user
      if (!$user) {
        return $this->createErrorResponse('User not found');
      }

      // Verifikasi password
      if (!password_verify($data['password'], $user['password'])) {
        return $this->createErrorResponse('Invalid password');
      }

      return $this->createSuccessResponse('Login successful', [
        // Set session data after successful login
        $_SESSION['username'] = $user['username'],
        $_SESSION['email'] = $user['email'],
      ]);
    } catch (Exception $e) {
      return $this->createErrorResponse('Server error occurred');
    }
  }

  public function registerUser(array $data)
  {
    if (empty($data['email']) || empty($data['password'])) {
      return $this->createErrorResponse('Email and password are required');
    }

    // Periksa jika email sudah terdaftar
    $checkEmail = $this->getUser($data['email']);
    $checkUsername = $this->getUser($data['username']);

    if ($checkEmail['status'] === 'success' || $checkUsername['status'] === 'success') {
      $errors = [];
      if ($checkEmail['status'] === 'success') {
        $errors[] = 'Email';
      }
      if ($checkUsername['status'] === 'success') {
        $errors[] = 'Username';
      }
      return $this->createErrorResponse(implode(' and ', $errors) . ' already exist');
    }

    // Proses registrasi: data belum disimpan, hanya di-simpan sementara
    $verification_code = bin2hex(random_bytes(16)); // Membuat kode verifikasi unik
    $_SESSION['verification_code'] = $verification_code;
    $_SESSION['email'] = $data['email'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['pic'] = $data['pic'];
    $_SESSION['perusahaan'] = $data['perusahaan'];
    $_SESSION['npwp'] = $data['npwp'];
    $_SESSION['nik'] = $data['nik'];

    // Kirim email verifikasi
    $emailService = new MailService();
    $emailService->sendMailVerification($data['email'], $verification_code);

    return $this->createSuccessResponse('Pendaftaran Berhasil, periksa email Anda untuk aktivasi akun.', []);
  }

  private function createSuccessResponse(string $message, array $data = []): array
  {
    return [
      'status' => 'success',
      'message' => $message,
      'data' => $data
    ];
  }

  private function createErrorResponse(string $message): array
  {
    return [
      'status' => 'error',
      'message' => $message
    ];
  }
}
