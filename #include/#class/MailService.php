<?php

namespace App;

use App\ResponseMessage;
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
            $mail->isHTML(true);

            $verification_link = SERVER_NAME . "handler/auth/verify.php?code=$verification_code";
            $template_path = ROOT_PATH . '#include/component/fragment/mail-body-verification-email.php';

            $mail->Body = $this->loadTemplate($template_path, [
                'verification_link' => $verification_link,
                'email' => $email
            ]);

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
            return ResponseMessage::createSuccessResponse(
                message: 'Akun Anda telah berhasil diverifikasi dan diaktifkan.'
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
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

    private function loadTemplate(string $template_path, array $data = []): string
    {
        extract($data);
        ob_start();
        include($template_path);
        return ob_get_clean();
    }
}
