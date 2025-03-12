<?php

use App\DocumentService;

session_start();

require_once __DIR__ . '/../#include/config.php';
require_once __DIR__ . '/../#include/#class/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
  $documentService = new DocumentService();

  $id = $_GET['id'];
  $file = $_FILES['file'];

  $result = $documentService->postProposal($id, $file);

  if ($result['status'] === 'success') {
    $response = [
      "status" => $result['status'],
      "message" => $result['message'],
    ];
  } else {
    $response = [
      "status" => $result['status'],
      "message" => $result['message'],
    ];
  }

  echo json_encode($response);
}
