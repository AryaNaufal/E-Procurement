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

    $participantId = $_GET['participant_id'];
    $tenderId = $_GET['tender_id'];
    $date = date("Y-m-d");

    $result = $documentService->postProposal($id, $file);
    $insertProposal = $timelineService->insertProposal($participantId, $tenderId, $date);

    if ($result['status'] === 'success' && $insertProposal['status'] === 'success') {
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
}
