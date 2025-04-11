<?php
session_start();

require_once __DIR__ . "/#include/config.php";
require_once 'vendor/autoload.php';

use App\LoadEnv;

$env = new LoadEnv(ROOT_PATH . '.env');

$current_menu = "register";
$current_sub_menu = null;
$title = "Register";

require_once ROOT_PATH . "#include/component/header.php";
require_once ROOT_PATH . "#include/component/navbar.php";
require_once ROOT_PATH . "#include/component/layout/register-layout.php";
require_once ROOT_PATH . "#include/component/footer.php";
