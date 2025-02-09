<?php
session_start();

use App\KatalogService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$katalogService = new KatalogService();

$userId = $_GET['id'] ?? '';

$katalogId = $katalogService->getKatalogById($userId);

$current_menu = "edit Katalog";
$current_sub_menu = NULL;
$title = "Edit Katalog";

require_once __DIR__ . '/../../#include/component/header.php';
require_once __DIR__ . '/../../#include/component/navbar.php';
require_once __DIR__ . '/../../#include/component/layout/vendor_area/edit-katalog.php';
require_once __DIR__ . '/../../#include/component/footer.php';
