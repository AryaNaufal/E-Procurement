<?php
session_start();

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

use App\LoadEnv;
use App\UserService;

$env = new LoadEnv(ROOT_PATH . '.env');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  $error = [
    'status' => 'error',
    'message' => 'Metode request tidak diizinkan.',
  ];
  echo json_encode($error);
  exit;
}

$userService = new UserService();

$password = trim($_POST['new_password'] ?? '');
$passwordConfirm = trim($_POST['confirm_password'] ?? '');

if (strlen($password) < 8) {
  $error = [
    'status' => 'error',
    'message' => 'Password harus minimal 8 karakter.',
  ];
  echo json_encode($error);
  exit;
}

if ($password !== $passwordConfirm) {
  $error = [
    'status' => 'error',
    'message' => 'Password tidak sesuai.',
  ];
  echo json_encode($error);
  exit;
}

$result = $userService->resetPassword([
  'email' => $_SESSION['email'],
  'password' => $password,
]);

if ($result['status'] === 'success') {
  $success = [
    'status' => $result['status'],
    'message' => $result['message'],
  ];
  echo json_encode($success);
} else {
  $error = [
    'status' => $result['status'],
    'message' => $result['message'],
  ];
  echo json_encode($error);
}

