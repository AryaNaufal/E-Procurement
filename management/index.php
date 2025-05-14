<?php

use App\liblary;
use App\LoadEnv;

session_start();

require_once __DIR__ . '/../#include/config.php';
require_once '../vendor/autoload.php';

$env = new LoadEnv(ROOT_PATH . '.env');
$Lib = new liblary();

$title = "Management - Staf";
$current_menu = "dashboard";
$current_sub_menu = NULL;

require_once ROOT_PATH . '#include/component/layout/management/header.php';
if ($_SESSION['role'] == 'staf') {
    require_once ROOT_PATH . '#include/component/layout/management/home/home-staf.php';
} else if ($_SESSION['role'] == 'direktur') {
    require_once ROOT_PATH . '#include/component/layout/management/home/home-direktur.php';
} else {
    header("Location: " . SERVER_NAME);
}
require_once ROOT_PATH . '#include/component/layout/management/footer.php';
