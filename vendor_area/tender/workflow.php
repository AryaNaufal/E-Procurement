<?php
session_start();

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$current_menu = "workflow";
$current_sub_menu = NULL;
$title = "Workflow";

require_once __DIR__ . '/../../#include/component/header.php';
require_once __DIR__ . '/../../#include/component/navbar.php';
require_once __DIR__ . '/../../#include/component/layout/vendor_area/tender-workflow.php';
require_once __DIR__ . '/../../#include/component/footer.php';
