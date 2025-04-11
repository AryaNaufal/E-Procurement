<?php
session_start();

require_once __DIR__ . "/#include/config.php";
require_once 'vendor/autoload.php';

use App\LoadEnv;

$env = new LoadEnv(ROOT_PATH . '.env');

if ((isset($_SESSION['verification_code']) != isset($_GET['code'])) || empty($_SESSION['verification_code'])) {
    echo "<script>window.location.href = '" . SERVER_NAME . "';</script>";
    exit;
}

$current_menu = "reset password";
$current_sub_menu = NULL;
$title = "Reset Password";

require_once ROOT_PATH . "#include/component/header.php";
require_once ROOT_PATH . "#include/component/navbar.php";
require_once ROOT_PATH . "#include/component/layout/reset-password.php";
require_once ROOT_PATH . "#include/component/footer.php";
