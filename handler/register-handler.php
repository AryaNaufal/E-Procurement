<?php
session_start();

include_once __DIR__ . '/../#include/config.php';
include_once __DIR__ . '/../#include/#class/autoload.php';

use App\LoadEnv;
use App\UserService;

$env = new LoadEnv(ROOT_PATH . '.env');

// Validasi method request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  $response = [
    "status" => "error",
    "message" => "Metode request tidak diizinkan."
  ];

  echo json_encode($response);
  exit;
}

// Ambil data dari form
$username = trim($_POST['username'] ?? null);
$email = trim($_POST['email'] ?? null);
$password = trim($_POST['password'] ?? null);
$pic = trim($_POST['nama_lengkap'] ?? null);
$perusahaan = trim($_POST['company_name'] ?? null);
$npwp = trim($_POST['company_npwp'] ?? null);
$nik = trim($_POST['pic_ktp'] ?? null);
$recaptchaResponse = $_POST['g-recaptcha-response'] ?? null;

// Validasi data yang dikirim
if (empty($username) || empty($email) || empty($password)) {
  $response = [
    "status" => "error",
    "message" => "Semua data wajib diisi."
  ];

  echo json_encode($response);
  exit;
}

// Validasi recaptcha
// $recaptchaSecret = $env->get('RECAPTCHA_SECRET_KEY');
// $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
// $recaptchaVerifyResponse = file_get_contents($recaptchaUrl . "?secret=$recaptchaSecret&response=" . $recaptchaResponse);
// $recaptchaResult = json_decode($recaptchaVerifyResponse);

// if (!$recaptchaResult->success) {
//   echo 'Recaptcha tidak valid.';
//   unset($_POST['g-recaptcha-response']);
//   exit;
// }

// Validasi email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $response = [
    "status" => "error",
    "message" => "Format email tidak valid."
  ];

  echo json_encode($response);
  exit;
}

// Validasi panjang password
if (strlen($password) < 8) {
  $response = [
    "status" => "error",
    "message" => "Password harus minimal 8 karakter."
  ];

  echo json_encode($response);
  exit;
}

// Panggil UserService untuk menambahkan user
$userService = new UserService();
$result = $userService->registerUser([
  'username' => $username,
  'email' => $email,
  'password' => $password,
  'pic' => $pic,
  'perusahaan' => $perusahaan,
  'npwp' => $npwp,
  'nik' => $nik
]);

if ($result['status'] === 'success') {
  $response = [
    "status" => $result['status'],
    "message" => $result['message']
  ];

  echo json_encode($response);
} else {
  $response = [
    "status" => $result['status'],
    "message" => $result['message']
  ];

  echo json_encode($response);
}
