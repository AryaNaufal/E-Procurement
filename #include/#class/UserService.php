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
            return $this->createErrorResponse('Terjadi Kesalahan Pada Server');
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
                return $this->createErrorResponse('User Tidak Ditemukan');
            }

            return $this->createSuccessResponse('', $user);
        } catch (Exception $e) {
            return $this->createErrorResponse('Terjadi Kesalahan Pada Server');
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
                return $this->createErrorResponse('User Tidak Ditemukan');
            }

            // Verifikasi password
            if (!password_verify($data['password'], $user['password'])) {
                return $this->createErrorResponse('Password Tidak Sesuai');
            }

            // Get ip address
            $ipaddress = '';
            if (getenv('HTTP_CLIENT_IP'))
                $ipaddress = getenv('HTTP_CLIENT_IP');
            else if (getenv('HTTP_X_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
            else if (getenv('HTTP_X_FORWARDED'))
                $ipaddress = getenv('HTTP_X_FORWARDED');
            else if (getenv('HTTP_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_FORWARDED_FOR');
            else if (getenv('HTTP_FORWARDED'))
                $ipaddress = getenv('HTTP_FORWARDED');
            else if (getenv('REMOTE_ADDR'))
                $ipaddress = getenv('REMOTE_ADDR');
            else
                $ipaddress = 'UNKNOWN';

            $this->db->supdate('UPDATE user SET login_terakhir = :login_terakhir, ip_login = :ip WHERE email = :email', ['login_terakhir' => date('Y-m-d H:i:s'), 'ip' => $ipaddress, 'email' => $user['email']]);

            return $this->createSuccessResponse('Anda Telah Berhasil Masuk', [
                // Set session data after successful login
                $_SESSION['id'] = $user['id'],
                $_SESSION['username'] = $user['username'],
                $_SESSION['email'] = $user['email'],
                $_SESSION['is_verify'] = $user['is_verify']
            ]);
        } catch (Exception $e) {
            return $this->createErrorResponse('Terjadi Kesalahan Pada Server');
        }
    }

    public function registerUser(array $data)
    {
        if (empty($data['email']) || empty($data['password'])) {
            return $this->createErrorResponse('Email dan Password Wajib Diisi');
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

        $verification_code = bin2hex(random_bytes(16)); // Membuat kode verifikasi unik

        try {
            $sql = "INSERT INTO user (username, email, password, pic, perusahaan, npwp, nik, tanggal_registrasi, verification_code, is_verify) VALUES (:username, :email, :password, :pic, :perusahaan, :npwp, :nik, :tanggal_registrasi, :verification_code, 0)";

            // Enkripsi password
            $password_hash = password_hash($data['password'], PASSWORD_DEFAULT);

            $this->db->sinsert($sql, [
                "username" => $data['username'],
                "email" => $data['email'],
                "password" => $password_hash,
                "pic" => $data['pic'],
                "perusahaan" => $data['perusahaan'],
                "npwp" => $data['npwp'],
                "nik" => $data['nik'],
                "tanggal_registrasi" => date('Y-m-d'),
                "verification_code" => $verification_code
            ]);

            // Kirim email verifikasi
            $emailService = new MailService();
            $emailService->sendMailVerification($data['email'], $verification_code);

            return $this->createSuccessResponse('Pendaftaran Berhasil, periksa email Anda untuk aktivasi akun.', []);
        } catch (Exception $e) {
            return $this->createErrorResponse('Terjadi Kesalahan Pada Server' . $e->getMessage());
        }
    }

    public function sendResetPassword(array $data)
    {
        if (empty($data['email'])) {
            return $this->createErrorResponse('Email Wajib Diisi');
        }

        $checkEmail = $this->getUser($data['email']);

        if ($checkEmail['status'] !== 'success') {
            return $this->createErrorResponse('Email tidak terdaftar');
        }

        // Proses reset password: data belum disimpan, hanya di-simpan sementara
        $verification_code = bin2hex(random_bytes(16)); // Membuat kode verifikasi unik
        $_SESSION['verification_code'] = $verification_code;
        $_SESSION['email'] = $data['email'];

        // Kirim email verifikasi
        $emailService = new MailService();
        $emailService->sendResetPasswordVerification($data['email'], $verification_code);

        return $this->createSuccessResponse('Email verifikasi telah dikirim. Silakan cek email Anda', []);
    }

    public function resetPassword(array $data)
    {
        if (empty($data['password'])) {
            return $this->createErrorResponse('Password Wajib Diisi');
        }

        if (strlen($data['password']) < 8) {
            return $this->createErrorResponse('Password minimal 8 karakter');
        }

        $sql = "UPDATE user SET password = :password WHERE email = :email AND is_verify = 1";

        try {
            $this->db->supdate($sql, [
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT)
            ]);

            session_unset();
            session_destroy();

            return $this->createSuccessResponse('Password berhasil direset');
        } catch (Exception $e) {
            return $this->createErrorResponse('Terjadi Kesalahan Pada Server');
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
