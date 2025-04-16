<?php
session_start();

use App\KatalogService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$katalogService = new KatalogService();

$katalogId = $_GET['id'];

$result = $katalogService->deleteKatalog(
    katalogId: $katalogId
);

if ($result['status'] === 'success') {
    $response = [
        "status" => $result['status'],
        "message" => $result['message']
    ];
} else {
    $response = [
        "status" => $result['status'],
        "message" => $result['message']
    ];
}

echo json_encode($response);
