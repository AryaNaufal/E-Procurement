<?php
session_start();

include_once __DIR__ . '/../../#include/config.php';
include_once __DIR__ . '/../../#include/#class/autoload.php';

use App\LoadEnv;
use App\UserService;

$env = new LoadEnv(ROOT_PATH . '.env');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        "status" => "error",
        "message" => "Metode request tidak diizinkan."
    ]);
    exit;
}

$email = trim($_POST['email'] ?? null);

$userService = new UserService();
$result = $userService->sendResetPassword(['email' => $email]);

$response = [
    "status" => $result['status'],
    "message" => $result['message']
];

echo json_encode($response);