<?php
session_start();

use App\TenderService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$tender = new TenderService();

$tenderData = $tender->getTenderById($_GET['id']);


if (empty($tenderData['data'])) {
  header("Location: " . SERVER_NAME . "");
  exit;
}

$current_menu = "profile";
$current_sub_menu = NULL;
$title = "Profile";

require_once __DIR__ . '/../../#include/component/header.php';
require_once __DIR__ . '/../../#include/component/navbar.php';
require_once __DIR__ . '/../../#include/component/layout/vendor_area/tender-detail.php';
require_once __DIR__ . '/../../#include/component/footer.php';
