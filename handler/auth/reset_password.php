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
$email = trim($_POST['email'] ?? null);
$password = trim($_POST['new_password'] ?? null);
$password_confirm = trim($_POST['confirm_password'] ?? null);


// Panggil UserService untuk menambahkan user
$userService = new UserService();
if (isset($_SESSION['verification_code'])) {
  if (strlen($password) < 8) {
    $response = [
      "status" => "error",
      "message" => "Password harus minimal 8 karakter."
    ];

    echo json_encode($response);
    exit;
  }
  if ($password !== $password_confirm) {
    $response = [
      "status" => "error",
      "message" => "Password tidak sesuai."
    ];

    echo json_encode($response);
    exit;
  }
  $result = $userService->resetPassword([
    'email' => $_SESSION['email'],
    'password' => $password,
  ]);
} else {
  $result = $userService->sendResetPassword([
    'email' => $email,
  ]);
}

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
