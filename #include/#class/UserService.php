<?php

namespace App;

include ROOT_PATH . 'vendor/autoload.php';

use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

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
      $stmt = $this->db->queryAll($query);
      if (empty($stmt)) {
        return $this->createErrorResponse('No users available');
      }

      return $this->createSuccessResponse('Users retrieved successfully', $stmt);
    } catch (Exception $e) {
      return $this->createErrorResponse('Server error occurred');
    }
  }

  public function getUserById(string $id)
  {
    $query = "SELECT * FROM user WHERE id = :id";
    try {
      $stmt = $this->db->prepare($query);
      $stmt->execute(['id' => $id]);
      $user = $stmt->fetch();
      if (!$user) {
        return $this->createErrorResponse('User not found');
      }
      return $this->createSuccessResponse('', $user);
    } catch (Exception $e) {
      return $this->createErrorResponse('Server error occurred');
    }
  }

  public function getUserByEmail(string $email)
  {
    $query = "SELECT * FROM user WHERE email = :email LIMIT 1";
    try {
      $stmt = $this->db->prepare($query);
      $stmt->execute(['email' => $email]);
      $userEmail = $stmt->fetch();

      if (!$userEmail) {
        return $this->createErrorResponse('User not found');
      }

      return $this->createSuccessResponse('', $userEmail);
    } catch (Exception $e) {
      return $this->createErrorResponse('Server error occurred');
    }
  }

  public function getUserByUsername(string $username)
  {
    $query = "SELECT * FROM user WHERE username = :username LIMIT 1";
    try {
      $stmt = $this->db->prepare($query);
      $stmt->execute(['username' => $username]);
      $userName = $stmt->fetch();

      if (!$userName) {
        return $this->createErrorResponse('User not found');
      }

      return $this->createSuccessResponse('', $userName);
    } catch (Exception $e) {
      return $this->createErrorResponse('Server error occurred');
    }
  }

  public function loginUser(array $data)
  {
    $query = "SELECT * FROM user WHERE email = :email OR username = :username LIMIT 1";
    try {
      $stmt = $this->db->prepare($query);
      $stmt->execute(['email' => $data['email'], 'username' => $data['username']]);
      $user = $stmt->fetch();

      if (!$user) {
        return $this->createErrorResponse('User not found');
      }

      // Verifikasi password
      if (!password_verify($data['password'], $user['password'])) {
        return $this->createErrorResponse('Invalid password');
      }

      // Jika password valid
      return $this->createSuccessResponse('Login successful', []);
    } catch (Exception $e) {
      return $this->createErrorResponse('Server error occurred');
    }
  }


  public function createUser(array $data)
  {
    if (empty($data['email']) || empty($data['password'])) {
      return $this->createErrorResponse('Email and password are required');
    }

    // Periksa jika email sudah terdaftar
    $existUser = $this->getUserByEmail($data['email']);

    if ($existUser['status'] === 'success') {
      return $this->createErrorResponse('Email already exists');
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

    // Kirim email verifikasi
    $this->sendMailVerification($data['email'], $verification_code);

    return $this->createSuccessResponse('User created. Please verify your email.', []);
  }

  private function sendMailVerification(string $email, string $verification_code)
  {
    $mail = new PHPMailer(true);

    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'YOUR_EMAIL';
      $mail->Password = 'YOUR_APP_EMAIL_PASSWORD';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;

      $mail->setFrom('YOUR_EMAIL', 'No Reply');
      $mail->addAddress($email);
      $mail->Subject = 'Verifikasi Email';
      $verification_link = SERVER_NAME . "handler/verify.php?code=$verification_code";
      $mail->Body = "Klik link berikut untuk verifikasi: $verification_link";

      $mail->send();
    } catch (PHPMailerException $e) {
      echo "Email gagal dikirim. Error: {$mail->ErrorInfo}";
    }
  }

  public function verifyUser()
  {
    // Validasi apakah verification_code tersedia di session dan URL
    if (isset($_GET['code'], $_SESSION['verification_code']) && $_GET['code'] === $_SESSION['verification_code']) {
      // Ambil data dari session
      $email = $_SESSION['email'];
      $username = $_SESSION['username'];
      $password = $_SESSION['password'];
      $pic = $_SESSION['pic'];
      $perusahaan = $_SESSION['perusahaan'];
      $npwp = $_SESSION['npwp'];

      // Enkripsi password
      $password_hash = password_hash($password, PASSWORD_DEFAULT);

      // Simpan ke database
      $query = "INSERT INTO user (username, email, password, pic, perusahaan, npwp) VALUES (:username, :email, :password, :pic, :perusahaan, :npwp)";
      $stmt = $this->db->prepare($query);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':password', $password_hash);
      $stmt->bindParam(':pic', $pic);
      $stmt->bindParam(':perusahaan', $perusahaan);
      $stmt->bindParam(':npwp', $npwp);
      $stmt->execute();

      // Hapus session setelah sukses
      session_unset();
      session_destroy();

      return $this->createSuccessResponse('Akun Anda telah berhasil diverifikasi dan diaktifkan.', []);
    } else {
      return $this->createErrorResponse('Kode verifikasi tidak valid atau telah kedaluwarsa.');
    }
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
