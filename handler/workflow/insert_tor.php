<?php
session_start();

use App\TimelineService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$timelineService = new TimelineService();

$participantId = $_GET['participant_id'];
$tenderId = $_GET['tender_id'];
$date = date("Y-m-d");

$result = $timelineService->insertTor($participantId, $tenderId, $date);

if ($result['status'] === 'success') {
  $response = [
    "status" => $result['status'],
    "message" => $result['message'],
  ];
} else {
  $response = [
    "status" => $result['status'],
    "message" => $result['message'],
  ];
}

echo json_encode($response);
