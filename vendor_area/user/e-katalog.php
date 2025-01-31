<?php
session_start();

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$current_menu = "e-catalog";
$current_sub_menu = NULL;
$title = "E-Catalog";

require_once __DIR__ . '/../../#include/component/header.php';
require_once __DIR__ . '/../../#include/component/navbar.php';
require_once __DIR__ . '/../../#include/component/layout/vendor_area/e-katalog.php';
require_once __DIR__ . '/../../#include/component/footer.php';
