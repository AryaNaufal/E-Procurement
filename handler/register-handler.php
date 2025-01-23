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

// Validasi data yang dikirim
if (empty($username) || empty($email) || empty($password)) {
  echo 'Semua data wajib diisi.';
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
$result = $userService->createUser([  // Menggunakan UserService untuk handle pendaftaran
  'username' => $username,
  'email' => $email,
  'password' => $password,
  'pic' => $pic,
  'perusahaan' => $perusahaan,
  'npwp' => $npwp
]);

if ($result['status'] === 'success') {
  echo 'OK';
} else {
  echo $result['message'];
}
