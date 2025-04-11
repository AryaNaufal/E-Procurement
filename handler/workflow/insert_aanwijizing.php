<?php
session_start();

use App\TimelineService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$timelineService = new TimelineService();

$userId = $_GET['user_id'];
$tenderId = $_GET['tender_id'];
$date = date("Y-m-d");

$aanwijizing = $timelineService->insertTimelineAanwijizing(
    userId: $userId,
    tenderId: $tenderId,
    date: $date
);

if ($aanwijizing['status'] === 'success') {
    $response = [
        "status" => $aanwijizing['status'],
        "message" => $aanwijizing['message'],
    ];
} else {
    $response = [
        "status" => $aanwijizing['status'],
        "message" => $aanwijizing['message'],
    ];
}

echo json_encode($response);
