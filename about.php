<?php
session_start();

require_once __DIR__ . "/#include/config.php";
require_once ROOT_PATH . "#include/#class/autoload.php";

use App\LoadEnv;

$env = new LoadEnv(ROOT_PATH . '.env');

$current_menu = "tentang";
$current_sub_menu = NULL;
$title = "Tentang";

require_once ROOT_PATH . "#include/component/header.php";
require_once ROOT_PATH . "#include/component/navbar.php";
require_once ROOT_PATH . "#include/component/layout/about/about-layout.php";
require_once ROOT_PATH . "#include/component/footer.php";
