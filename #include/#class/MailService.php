<?php

namespace App;

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
    // Validasi apakah verification_code tersedia di session dan URL
    if (isset($_GET['code'], $_SESSION['verification_code']) && $_GET['code'] === $_SESSION['verification_code']) {
      // Ambil data dari session
      $email = $_SESSION['email'];
      $username = $_SESSION['username'];
      $password = $_SESSION['password'];
      $pic = $_SESSION['pic'];
      $perusahaan = $_SESSION['perusahaan'];
      $npwp = $_SESSION['npwp'];
      $nik = $_SESSION['nik'];

      // Enkripsi password
      $password_hash = password_hash($password, PASSWORD_DEFAULT);

      // Simpan ke database
      $query = "INSERT INTO user (username, email, password, pic, perusahaan, npwp, nik, is_verify) VALUES (:username, :email, :password, :pic, :perusahaan, :npwp, :nik, 1)";
      $this->db->sinsert($query, [
        'username' => $username,
        'email' => $email,
        'password' => $password_hash,
        'pic' => $pic,
        'perusahaan' => $perusahaan,
        'npwp' => $npwp,
        'nik' => $nik
      ]);

      // Hapus session setelah sukses
      session_unset();
      session_destroy();

      return $this->createSuccessResponse('Akun Anda telah berhasil diverifikasi dan diaktifkan.');
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
