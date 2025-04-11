<?php

namespace App;

use App\ResponseMessage;
use Exception;

class TimelineService
{
    private $db;

    public function __construct()
    {
        $this->db = new DB(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }

    public function getTimeline($id)
    {
        $sql = "SELECT * FROM timeline_pengadaan WHERE tender_id = :id";
        try {
            $timeline = $this->db->squery($sql, ['id' => $id]);
            return ResponseMessage::createSuccessResponse(
                message: 'Timeline berhasil diambil',
                data: $timeline
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server'
            );
        }
    }

    public function insertPendaftaran(string $participantId, string $tenderId, string $registrationDate, string $closingDate)
    {
        $sql = "INSERT INTO timeline_pengadaan (user_id, tender_id, awal_pendaftaran, akhir_pendaftaran) VALUES (:user_id, :tender_id, :awal_pendaftaran, :akhir_pendaftaran)";
        try {
            $this->db->supdate($sql, ['user_id' => $participantId, 'tender_id' => $tenderId, 'awal_pendaftaran' => $registrationDate, 'akhir_pendaftaran' => $closingDate]);
            return;
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server'
            );
        }
    }

    public function insertTimelineTor(string $participantId, string $tenderId, string $date)
    {
        $sql = "UPDATE timeline_pengadaan SET tor = :date WHERE participant_id = :participant_id AND tender_id = :tender_id AND tor IS NULL";
        try {
            $this->db->supdate($sql, ['participant_id' => $participantId, 'tender_id' => $tenderId, 'date' => $date]);
            return;
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server'
            );
        }
    }

    public function insertTimelineAanwijizing(string $userId, string $tenderId, string $date)
    {
        $sql = "UPDATE timeline_pengadaan SET aanwijizing = :date WHERE user_id = :user_id AND tender_id = :tender_id AND aanwijizing IS NULL";
        try {
            $this->db->supdate($sql, [
                'user_id' => $userId,
                'tender_id' => $tenderId,
                'date' => $date
            ]);
            return ResponseMessage::createSuccessResponse(
                message: ''
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server'
            );
        }
    }

    public function insertTimelineProposal(string $userId, string $tenderId, string $date)
    {
        $sql = "UPDATE timeline_pengadaan SET submit_proposal = :date WHERE user_id = :user_id AND tender_id = :tender_id AND submit_proposal IS NULL";
        try {
            $this->db->supdate($sql, [
                'user_id' => $userId,
                'tender_id' => $tenderId,
                'date' => $date
            ]);
            return ResponseMessage::createSuccessResponse(
                message: ''
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server'
            );
        }
    }
}
