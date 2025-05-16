<?php
session_start();

use App\LoadEnv;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$env = new LoadEnv(ROOT_PATH . '.env');

$current_menu = "request";
$current_sub_menu = NULL;
$title = "Request";

require_once ROOT_PATH . '#include/component/layout/management/header.php';
require_once ROOT_PATH . '#include/component/layout/management/request/request-menu.php';
require_once ROOT_PATH . '#include/component/layout/management/footer.php';
