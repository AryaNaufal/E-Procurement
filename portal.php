<?php
session_start();

require_once __DIR__ . "/#include/config.php";
require_once ROOT_PATH . "#include/#class/autoload.php";

$current_menu = "portal";
$current_sub_menu = NULL;
$title = "Portal";

require_once ROOT_PATH . "#include/component/layout/portal-layout.php";
require_once ROOT_PATH . "#include/component/footer.php";
