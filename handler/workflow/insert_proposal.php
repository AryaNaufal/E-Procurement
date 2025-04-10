<?php

use App\DocumentService;
use App\TimelineService;

session_start();

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $documentService = new DocumentService();
    $timelineService = new TimelineService();

    $id = $_GET['id'];
    $file = $_FILES['file'];

    $userId = $_GET['user_id'];
    $tenderId = $_GET['tender_id'];
    $date = date("Y-m-d");

    $proposal = $documentService->postProposal(
        tenderId: $tenderId,
        file: $file
    );

    $timeline = $timelineService->insertTimelineProposal(
        userId: $userId,
        tenderId: $tenderId,
        date: $date
    );

    if ($proposal['status'] === 'success') {
        $response = [
            "status" => $proposal['status'],
            "message" => $proposal['message'],
        ];
    } else {
        $response = [
            "status" => $proposal['status'],
            "message" => $proposal['message'],
        ];
    }

    echo json_encode($response);
}
