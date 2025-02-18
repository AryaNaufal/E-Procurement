<?php

session_start();

require_once __DIR__ . '/../#include/config.php';
require_once __DIR__ . '/../#include/#class/autoload.php';

use App\TenderService;

$tenderService = new TenderService();

$result = $tenderService->submitTender(isset($_SESSION['id']) ? $_SESSION['id'] : '', $_GET['id']);

if (empty($_SESSION['id'])) {
  $response = [
    'status' => 'error',
    'message' => 'Anda belum login'
  ];

  echo json_encode($response);
  exit;
}

if ($result['status'] === 'success') {
  $response = [
    'status' => $result['status'],
    'message' => $result['message']
  ];

  echo json_encode($response);
} else {
  $response = [
    'status' => $result['status'],
    'message' => $result['message']
  ];

  echo json_encode($response);
}
