<?php
session_start();

use App\LoadEnv;
use App\TenderService;
use App\TimelineService;

require_once __DIR__ . '/../../#include/config.php';
require_once ROOT_PATH . '#include/#class/autoload.php';

$env = new LoadEnv(ROOT_PATH . '.env');
$tenderService = new TenderService();
$timelineService = new TimelineService();

$tenders = $tenderService->getTenderById($_GET['id']);
$followedTender = $tenderService->getTenderFollowedByUser($_SESSION['id'] ?? '');
$timeline = $timelineService->getTimeline($_GET['id']);

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

require_once ROOT_PATH . '#include/component/header.php';
require_once ROOT_PATH . '#include/component/navbar.php';
require_once ROOT_PATH . '#include/component/layout/vendor_area/tender/tender-detail.php';
require_once ROOT_PATH . '#include/component/footer.php';
