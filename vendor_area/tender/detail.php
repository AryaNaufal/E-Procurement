<?php
session_start();

use App\LoadEnv;
use App\TenderService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$env = new LoadEnv(ROOT_PATH . '.env');
$tenderService = new TenderService();

$tenders = $tenderService->getTenderById($_GET['id']);
$followedTender = $tenderService->getTenderFollowedByUser($_SESSION['id'] ?? '');

$checkFollowedTender = false;

if (isset($followedTender['status']) && $followedTender['status'] === 'success' && !empty($followedTender['data'])) {
  foreach ($followedTender['data'] as $item) {
    if ($item['id'] === $tenders['data'][0]['id']) {
      $checkFollowedTender = true;
      break;
    }
  }
}

if (empty($tenders['data'])) {
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
