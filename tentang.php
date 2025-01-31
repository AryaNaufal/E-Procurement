<?php
session_start();

include_once __DIR__ . "/#include/config.php";
include_once __DIR__ . "/#include/#class/autoload.php";

use App\LoadEnv;

$env = new LoadEnv(ROOT_PATH . '.env');

$current_menu = "tentang";
$current_sub_menu = NULL;
$title = "Tentang";

include_once __DIR__ . "/#include/component/header.php";
include_once __DIR__ . "/#include/component/navbar.php";
include_once __DIR__ . "/#include/component/layout/about.php";
include_once __DIR__ . "/#include/component/footer.php";
