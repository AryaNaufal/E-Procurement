<?php

namespace App;

include ROOT_PATH . 'vendor/autoload.php';

use App\ResponseMessage;
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
        $query = "SELECT * FROM users";

        try {
            $users = $this->db->squery($query, []);

            if (empty($users)) {
                return ResponseMessage::createErrorResponse(
                    message: 'User Tidak Ditemukan'
                );
            }

            return ResponseMessage::createSuccessResponse(
                message: 'Users retrieved successfully',
                data: $users
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }

    public function getUser(string $params)
    {
        $query = "SELECT * FROM users WHERE id = :id OR username = :username OR email = :email LIMIT 1";
        try {
            $user = $this->db->squery_single($query, [
                'id' => $params,
                'username' => $params,
                'email' => $params
            ]);

            // Memeriksa user
            if (empty($user)) {
                return ResponseMessage::createErrorResponse('User Tidak Ditemukan');
            }

            return ResponseMessage::createSuccessResponse(
                message: '',
                data: $user
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }

    public function loginUser(array $data)
    {
        $query = "SELECT * FROM users WHERE email = :email OR username = :username LIMIT 1";
        try {
            $user = $this->db->squery_single($query, [
                'email' => $data['email'],
                'username' => $data['username']
            ]);

            // Memeriksa user
            if (!$user) {
                return ResponseMessage::createErrorResponse(
                    message: 'User Tidak Ditemukan'
                );
            }

            // Verifikasi password
            if (!password_verify($data['password'], $user['password'])) {
                return ResponseMessage::createErrorResponse(
                    message: 'Password Tidak Sesuai'
                );
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

            $this->db->supdate('UPDATE users SET login_terakhir = :login_terakhir, ip_login = :ip WHERE email = :email', ['login_terakhir' => date('Y-m-d H:i:s'), 'ip' => $ipaddress, 'email' => $user['email']]);

            return ResponseMessage::createSuccessResponse(
                message: 'Anda Telah Berhasil Masuk',
                data: [
                    $_SESSION['id'] = $user['id'],
                    $_SESSION['username'] = $user['username'],
                    $_SESSION['email'] = $user['email'],
                    $_SESSION['is_verify'] = $user['is_verify']
                ]
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }

    public function registerUser(array $data)
    {
        if (empty($data['email']) || empty($data['password'])) {
            return ResponseMessage::createErrorResponse(
                message: 'Email dan Password Wajib Diisi'
            );
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

            return ResponseMessage::createErrorResponse(
                message: implode(' and ', $errors) . ' already exist'
            );
        }

        $verification_code = bin2hex(random_bytes(16)); // Membuat kode verifikasi unik

        try {
            $sql = "INSERT INTO users (username, email, password, pic, perusahaan, npwp, nik, tanggal_registrasi, verification_code, is_verify) VALUES (:username, :email, :password, :pic, :perusahaan, :npwp, :nik, :tanggal_registrasi, :verification_code, 0)";

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

            return ResponseMessage::createSuccessResponse(
                message: 'Pendaftaran Berhasil, periksa email Anda untuk aktivasi akun.',
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }

    public function sendResetPassword(array $data)
    {
        if (empty($data['email'])) {
            return ResponseMessage::createErrorResponse(
                message: 'Email Wajib Diisi'
            );
        }

        $checkEmail = $this->getUser($data['email']);

        if ($checkEmail['status'] !== 'success') {
            return ResponseMessage::createErrorResponse(
                message: 'Email tidak terdaftar'
            );
        }

        try {
            // Proses reset password: data belum disimpan, hanya di-simpan sementara
            $verification_code = bin2hex(random_bytes(16)); // Membuat kode verifikasi unik
            $_SESSION['verification_code'] = $verification_code;
            $_SESSION['email'] = $data['email'];

            // Kirim email verifikasi
            $emailService = new MailService();
            $emailService->sendResetPasswordVerification($data['email'], $verification_code);

            return ResponseMessage::createSuccessResponse(
                message: 'Email verifikasi telah dikirim. Silakan cek email Anda'
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }

    public function resetPassword(array $data)
    {
        if (empty($data['password'])) {
            return ResponseMessage::createErrorResponse(
                message: 'Password Wajib Diisi'
            );
        }

        if (strlen($data['password']) < 8) {
            return ResponseMessage::createErrorResponse(
                message: 'Password minimal 8 karakter'
            );
        }

        $sql = "UPDATE users SET password = :password WHERE email = :email AND is_verify = 1";

        try {
            $this->db->supdate($sql, [
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT)
            ]);

            session_unset();
            session_destroy();

            return ResponseMessage::createSuccessResponse(
                message: 'Password berhasil direset'
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }
}
