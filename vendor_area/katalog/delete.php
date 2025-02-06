<?php
session_start();

use App\KatalogService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$katalogServicce = new KatalogService();

$id = $_GET['id'] ?? '';

$katalogServicce->deleteKatalog($id);

header('Location: ' . SERVER_NAME . 'vendor_area/user/index.php');
