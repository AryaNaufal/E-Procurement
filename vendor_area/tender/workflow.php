<?php
session_start();

use App\LoadEnv;

require_once __DIR__ . '/../../#include/config.php';
require_once ROOT_PATH . '#include/#class/autoload.php';

$env = new LoadEnv(ROOT_PATH . '.env');

$current_menu = "workflow";
$current_sub_menu = NULL;
$title = "Workflow";

require_once ROOT_PATH . '#include/component/header.php';
require_once ROOT_PATH . '#include/component/navbar.php';
require_once ROOT_PATH . '#include/component/layout/vendor_area/tender/tender-workflow.php';
require_once ROOT_PATH . '#include/component/footer.php';
