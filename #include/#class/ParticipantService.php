<?php

namespace App;

use App\ResponseMessage;

class ParticipantService
{
    private $db;

    public function __construct()
    {
        $this->db = new DB(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }

    public function getParticipants()
    {
        $participants = $this->db->query('SELECT * FROM participants;');
        return $participants;
    }

    public function getParticipantById(string $id)
    {
        $participant = $this->db->squery('SELECT * FROM participants WHERE id = :id;', ['id' => $id]);
        return ResponseMessage::createSuccessResponse(
            message: 'Data participant berhasil diambil',
            data: $participant
        );
    }

    public function getParticipantByTenderId(string $userId, string $tenderId): array
    {
        $participant = $this->db->squery('SELECT * FROM participants WHERE user_id = :user_id AND tender_id = :tender_id;', ['user_id' => $userId, 'tender_id' => $tenderId]);
        return ResponseMessage::createSuccessResponse(
            message: 'Data participant berhasil diambil',
            data: $participant
        );
    }
}
