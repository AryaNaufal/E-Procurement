<?php
session_start();

use App\LoadEnv;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$env = new LoadEnv(ROOT_PATH . '.env');

$current_menu = "budget review";
$current_sub_menu = NULL;
$title = "Budget Detail";

require_once ROOT_PATH . '#include/component/layout/management/header.php';
require_once ROOT_PATH . '#include/component/layout/management/budget-detail-menu.php';
require_once ROOT_PATH . '#include/component/layout/management/footer.php';
