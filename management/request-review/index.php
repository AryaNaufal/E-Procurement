<?php
session_start();

use App\LoadEnv;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$env = new LoadEnv(ROOT_PATH . '.env');

$current_menu = "request review";
$current_sub_menu = NULL;
$title = "Request Review";

require_once ROOT_PATH . '#include/component/layout/management/header.php';
require_once ROOT_PATH . '#include/component/layout/management/request/request-review-menu.php';
require_once ROOT_PATH . '#include/component/layout/management/footer.php';
