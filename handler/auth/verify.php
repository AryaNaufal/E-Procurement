<?php
session_start();

include_once __DIR__ . '/../../#include/config.php';
include_once __DIR__ . '/../../#include/#class/autoload.php';
include_once __DIR__ . '/../../#include/#class/UserService.php';

use App\MailService;

// Inisialisasi objek UserService
$userService = new MailService();

// Proses verifikasi
$response = $userService->verifyUser();

// Tampilkan hasil verifikasi
echo $response['message'];
