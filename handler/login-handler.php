<?php
include_once '../#include/config.php';
include_once '../#include/#class/autoload.php';
include_once '../#include/#class/UserService.php';

use App\UserService;

// Validasi method request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo 'Metode request tidak diizinkan.';
  exit;
}

// Ambil data dari form
$username = trim($_POST['username'] ?? null);
$password = trim($_POST['password'] ?? null);

$recaptchaResponse = $_POST['g-recaptcha-response'] ?? null;

// Validasi data yang dikirim
if (empty($username) || empty($password)) {
  echo 'Semua data wajib diisi.';
  exit;
}

// Validasi recaptcha
$recaptchaSecret = 'YOUR_RECAPTCHA_SECRET_KEY';
$recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
$recaptchaVerifyResponse = file_get_contents($recaptchaUrl . '?secret=' . $recaptchaSecret . '&response=' . $recaptchaResponse);
$recaptchaResult = json_decode($recaptchaVerifyResponse);

if (!$recaptchaResult->success) {
  echo 'Recaptcha tidak valid.';
  exit;
}

// Validasi panjang password
if (strlen($password) < 8) {
  echo 'Password minimal 8 karakter.';
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
