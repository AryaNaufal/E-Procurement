<?php

session_start();

require_once __DIR__ . '/../#include/config.php';
require_once __DIR__ . '/../#include/#class/autoload.php';

use App\TenderService;
use App\TimelineService;

$tenderService = new TenderService();
$timelineService = new TimelineService();

$participantId = $_GET['participant_id'];
$tenderId = $_GET['tender_id'];
$date = date("Y-m-d");
$closingDate = $tenderService->getTenderById($tenderId)['data'][0]['closing_date'];

$result = $tenderService->submitTender(isset($_SESSION['id']) ? $_SESSION['id'] : '', $_GET['id']);
$insertPendaftaran = $timelineService->insertPendaftaran($participantId, $tenderId, $date, $closingDate);

if (empty($_SESSION['id'])) {
    $response = [
        'status' => 'error',
        'message' => 'Anda belum login'
    ];

    echo json_encode($response);
    exit;
}

if ($result['status'] === 'success' && $insertPendaftaran['status'] === 'success') {
    $response = [
        'status' => $result['status'],
        'message' => $result['message']
    ];

    echo json_encode($response);
} else {
    $response = [
        'status' => $result['status'],
        'message' => $result['message']
    ];

    echo json_encode($response);
}
