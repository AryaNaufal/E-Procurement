<?php

namespace App;

use Exception;

class ParticipantService
{
  private $db;

  public function __construct()
  {
    $this->db = new DB(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  }

  public function getParticipants()
  {
    $participants = $this->db->query('SELECT * FROM participant;');
    return $participants;
  }

  public function getParticipantById($id)
  {
    $participant = $this->db->squery('SELECT * FROM participant WHERE id = :id;', ['id' => $id]);
    return $this->createSuccessResponse('Data participant berhasil diambil', $participant);
  }

  public function getParticipantByTenderId(string $userId, string $tenderId): array
  {
    $participant = $this->db->squery('SELECT * FROM participant WHERE user_id = :user_id AND tender_id = :tender_id;', ['user_id' => $userId, 'tender_id' => $tenderId]);
    return $this->createSuccessResponse('Data participant berhasil diambil', $participant);
  }

  private function createSuccessResponse(string $message, array $data = []): array
  {
    return [
      'status' => 'success',
      'message' => $message,
      'data' => $data
    ];
  }

  private function createErrorResponse(string $message): array
  {
    return [
      'status' => 'error',
      'message' => $message
    ];
  }
}
