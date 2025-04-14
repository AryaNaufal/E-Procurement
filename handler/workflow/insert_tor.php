<?php
session_start();

use App\TimelineService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$timelineService = new TimelineService();

$userId = $_GET['user_id'];
$tenderId = $_GET['tender_id'];
$date = date("Y-m-d");

$tor = $timelineService->insertTimelineTor(
    userId: $userId,
    tenderId: $tenderId,
    date: $date
);

if ($tor['status'] === 'success') {
    $response = [
        "status" => $tor['status'],
        "message" => $tor['message'],
    ];
} else {
    $response = [
        "status" => $tor['status'],
        "message" => $tor['message'],
    ];
}

echo json_encode($response);
