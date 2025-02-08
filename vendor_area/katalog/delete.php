<?php
session_start();

use App\KatalogService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$katalogService = new KatalogService();

$katalogId = $_GET['id'];

$result = $katalogService->deleteKatalog($katalogId);

echo "<script>window.location.href='" . SERVER_NAME . "vendor_area/user';</script>";
