<?php

use App\DocumentService;

session_start();

require_once __DIR__ . '/../#include/config.php';
require_once __DIR__ . '/../#include/#class/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $documentService = new DocumentService();

    $userId = $_GET['user_id'];
    $file = $_FILES['file'];
    $type = $_GET['type'];

    $result = $documentService->postDocument(
        userId: $userId,
        file: $file,
        type: $type
    );

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
