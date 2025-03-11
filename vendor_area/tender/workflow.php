<?php
session_start();

use App\DocumentService;
use App\LoadEnv;

require_once __DIR__ . '/../../#include/config.php';
require_once ROOT_PATH . '#include/#class/autoload.php';

if (!isset($_SESSION['email']) && !isset($_SESSION['is_verify']) && $_SESSION['is_verify'] != '1') {
  header("Location: " . SERVER_NAME . "");
  exit;
}

$env = new LoadEnv(ROOT_PATH . '.env');
$documentService = new DocumentService();

$documents = $documentService->getDocuments();

$current_menu = "workflow";
$current_sub_menu = NULL;
$title = "Workflow";

require_once ROOT_PATH . '#include/component/header.php';
require_once ROOT_PATH . '#include/component/navbar.php';
require_once ROOT_PATH . '#include/component/layout/vendor_area/tender/tender-workflow.php';
require_once ROOT_PATH . '#include/component/footer.php';
