<?php
session_start();

use App\CatalogService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$catalogService = new CatalogService();

$catalogId = $_GET['id'];

$result = $catalogService->deleteCatalog(
    catalogId: $catalogId
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
