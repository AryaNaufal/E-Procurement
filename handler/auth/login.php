<?php
session_start();

include_once __DIR__ . '/../../#include/config.php';
include_once __DIR__ . '/../../#include/#class/autoload.php';

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
$password = trim($_POST['password'] ?? null);

$recaptchaResponse = $_POST['g-recaptcha-response'] ?? null;

// Validasi data yang dikirim
if (empty($username) || empty($password)) {
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
//   echo $recaptchaVerifyResponse;
//   echo 'Recaptcha tidak valid.';
//   exit;
// }

// Validasi panjang password
if (strlen($password) < 8) {
  $response = [
    "status" => "error",
    "message" => "Password harus minimal 8 karakter."
  ];

  echo json_encode($response);
  exit;
}

// Panggil UserService untuk melakukan login
$userService = new UserService();
$result = $userService->loginUser([
  'email' => $username,
  'username' => $username,
  'password' => $password
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
