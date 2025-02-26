<?php
session_start();

use App\LoadEnv;
use App\KatalogService;

require_once __DIR__ . '/../../#include/config.php';
require_once ROOT_PATH . '#include/#class/autoload.php';

$env = new LoadEnv(ROOT_PATH . '.env');
$katalogService = new KatalogService();

$userId = $_GET['id'] ?? '';

$katalogId = $katalogService->getKatalogById($userId);

$current_menu = "edit Katalog";
$current_sub_menu = NULL;
$title = "Edit Katalog";

require_once ROOT_PATH . '#include/component/header.php';
require_once ROOT_PATH . '#include/component/navbar.php';
require_once ROOT_PATH . '#include/component/layout/vendor_area/catalog/catalog-edit.php';
require_once ROOT_PATH . '#include/component/footer.php';
