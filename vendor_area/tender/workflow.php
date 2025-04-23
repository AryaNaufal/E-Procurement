<?php
session_start();

use App\DocumentService;
use App\LoadEnv;
use App\ParticipantService;
use App\TenderService;
use App\TimelineService;

require_once __DIR__ . '/../../#include/config.php';
require_once ROOT_PATH . '#include/#class/autoload.php';

if (!isset($_SESSION['email']) && !isset($_SESSION['is_verify']) && $_SESSION['is_verify'] != '1') {
    header("Location: " . SERVER_NAME . "");
    exit;
}

$env = new LoadEnv(ROOT_PATH . '.env');

$tenderService = new TenderService();
$documentService = new DocumentService();
$participantService = new ParticipantService();
$timelineService = new TimelineService();

$participant = $participantService->getParticipantByTenderId($_SESSION['id'], $_GET['id']);
$tender = $tenderService->getTenderById($_GET['id']);
$proposal = $documentService->getProposal($_SESSION['id'], $_GET['id']);
$timeline = $timelineService->getTimeline($_SESSION['id'], $_GET['id']);

if ($participant == null) {
    header("Location: " . SERVER_NAME . "");
}

$current_menu = "workflow";
$current_sub_menu = NULL;
$title = "Workflow";

require_once ROOT_PATH . '#include/component/header.php';
require_once ROOT_PATH . '#include/component/navbar.php';
require_once ROOT_PATH . '#include/component/layout/vendor_area/tender/tender-workflow.php';
require_once ROOT_PATH . '#include/component/footer.php';
