<?php
session_start();

use App\LoadEnv;
use App\CatalogService;

require_once __DIR__ . '/../../#include/config.php';
require_once ROOT_PATH . '#include/#class/autoload.php';

$env = new LoadEnv(ROOT_PATH . '.env');
$catalogService = new CatalogService();

$catalogId = $_GET['id'] ?? '';

$catalogId = $catalogService->getCatalogById($catalogId);

$current_menu = "edit Catalog";
$current_sub_menu = NULL;
$title = "Edit Catalog";

require_once ROOT_PATH . '#include/component/header.php';
require_once ROOT_PATH . '#include/component/navbar.php';
require_once ROOT_PATH . '#include/component/layout/vendor_area/catalog/catalog-edit.php';
require_once ROOT_PATH . '#include/component/footer.php';
