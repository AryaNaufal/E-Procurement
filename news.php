<?php
session_start();

include_once __DIR__ . "/#include/config.php";
include_once __DIR__ . "/#include/#class/autoload.php";

use App\LoadEnv;

$env = new LoadEnv(ROOT_PATH . '.env');

$current_menu = "news";
$current_sub_menu = NULL;
$title = "News";

include_once __DIR__ . "/#include/component/header.php";
include_once __DIR__ . "/#include/component/navbar.php";
include_once __DIR__ . "/#include/component/layout/news.php";
include_once __DIR__ . "/#include/component/footer.php";
