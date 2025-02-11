<?php
session_start();

include_once __DIR__ . "/#include/config.php";
include_once __DIR__ . "/#include/#class/autoload.php";

use App\LoadEnv;

$env = new LoadEnv(ROOT_PATH . '.env');

if ((isset($_SESSION['verification_code']) != isset($_GET['code'])) || empty($_SESSION['verification_code'])) {
  echo "<script>window.location.href = '" . SERVER_NAME . "';</script>";
  exit;
}

$current_menu = "reset password";
$current_sub_menu = NULL;
$title = "Reset Password";

include_once __DIR__ . "/#include/component/header.php";
include_once __DIR__ . "/#include/component/navbar.php";
include_once __DIR__ . "/#include/component/layout/reset_password.php";
include_once __DIR__ . "/#include/component/footer.php";
