<?php
session_start();

include_once '../#include/config.php';
include_once '../#include/#class/autoload.php';
include_once '../#include/#class/UserService.php';

use App\UserService;

// Inisialisasi objek UserService
$userService = new UserService();

// Proses verifikasi
$response = $userService->verifyUser();

// Tampilkan hasil verifikasi
echo $response['message'];
