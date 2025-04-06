<?php

namespace App;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

class MailService
{
    private $db;

    public function __construct()
    {
        $this->db = new DB(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }

    public function sendMailVerification(string $email, string $verification_code)
    {
        $env = new LoadEnv(ROOT_PATH . '.env');
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $env->get('EMAIL');
            $mail->Password = $env->get('APP_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom($env->get('EMAIL'), 'No Reply');
            $mail->addAddress($email);
            $mail->Subject = 'Verifikasi Email';
            $verification_link = SERVER_NAME . "handler/auth/verify.php?code=$verification_code";
            $mail->Body = "Klik link berikut untuk verifikasi: $verification_link";

            $mail->send();
        } catch (PHPMailerException $e) {
            echo "Email gagal dikirim. Error: {$mail->ErrorInfo}";
        }
    }

    public function verifyUser()
    {
        try {
            $sql = "UPDATE user SET is_verify = :id, tanggal_verifikasi = :tanggal_verifikasi WHERE verification_code = :code";
            $this->db->supdate($sql, ['id' => 1, 'tanggal_verifikasi' => date('Y-m-d H:i:s'), 'code' => $_GET['code']]);
            return $this->createSuccessResponse('Akun Anda telah berhasil diverifikasi dan diaktifkan.');
        } catch (Exception $e) {
            return $this->createErrorResponse('Terjadi Kesalahan Pada Server');
        }
    }

    public function sendResetPasswordVerification(string $email, string $verification_code)
    {
        $env = new LoadEnv(ROOT_PATH . '.env');
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $env->get('EMAIL');
            $mail->Password = $env->get('APP_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom($env->get('EMAIL'), 'No Reply');
            $mail->addAddress($email);
            $mail->Subject = 'Reset Password';
            $verification_link = SERVER_NAME . "reset_password.php?code=$verification_code";
            $mail->Body = "Klik link berikut untuk reset password: $verification_link";

            $mail->send();
        } catch (PHPMailerException $e) {
            echo "Email gagal dikirim. Error: {$mail->ErrorInfo}";
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
