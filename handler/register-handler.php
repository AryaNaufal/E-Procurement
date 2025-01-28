<?php
session_start();

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
$email = trim($_POST['email'] ?? null);
$password = trim($_POST['password'] ?? null);
$pic = trim($_POST['nama_lengkap'] ?? null);
$perusahaan = trim($_POST['company_name'] ?? null);
$npwp = trim($_POST['company_npwp'] ?? null);
$nik = trim($_POST['pic_ktp'] ?? null);
$recaptchaResponse = $_POST['g-recaptcha-response'] ?? null;

// Validasi data yang dikirim
if (empty($username) || empty($email) || empty($password)) {
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
  unset($_POST['g-recaptcha-response']);
  exit;
}

// Validasi email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo 'Format email tidak valid.';
  exit;
}

// Validasi panjang password
if (strlen($password) < 8) {
  echo 'Password minimal 8 karakter.';
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
