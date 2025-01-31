<?php
session_start();

include_once __DIR__ . "/#include/config.php";
include_once __DIR__ . "/#include/#class/autoload.php";

$current_menu = "portal";
$current_sub_menu = NULL;
$title = "Portal";

include_once __DIR__ . "/#include/component/layout/portal.php";
include_once __DIR__ . "/#include/component/footer.php";
