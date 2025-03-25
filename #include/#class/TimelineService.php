<?php

namespace App;

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
      return $this->createSuccessResponse('Timeline berhasil diambil', $timeline);
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server');
    }
  }

  public function insertPendaftaran(string $participantId, string $tenderId, string $registrationDate, string $closingDate)
  {
    $sql = "INSERT INTO timeline_pengadaan (participant_id, tender_id, awal_pendaftaran, akhir_pendaftaran) VALUES (:participant_id, :tender_id, :awal_pendaftaran, :akhir_pendaftaran)";
    try {
      $this->db->supdate($sql, ['participant_id' => $participantId, 'tender_id' => $tenderId, 'awal_pendaftaran' => $registrationDate, 'akhir_pendaftaran' => $closingDate]);
      return $this->createSuccessResponse('Timeline berhasil ditambahkan');
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server');
    }
  }

  public function insertTor(string $participantId, string $tenderId, string $date)
  {
    $sql = "UPDATE timeline_pengadaan SET tor = :date WHERE participant_id = :participant_id AND tender_id = :tender_id AND tor IS NULL";
    try {
      $this->db->supdate($sql, ['participant_id' => $participantId, 'tender_id' => $tenderId, 'date' => $date]);
      return $this->createSuccessResponse('Timeline berhasil ditambahkan');
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server');
    }
  }

  public function insertAanwijizing(string $participantId, string $tenderId, string $date)
  {
    $sql = "UPDATE timeline_pengadaan SET aanwijizing = :date WHERE participant_id = :participant_id AND tender_id = :tender_id AND aanwijizing IS NULL";
    try {
      $this->db->supdate($sql, ['participant_id' => $participantId, 'tender_id' => $tenderId, 'date' => $date]);
      return $this->createSuccessResponse('Timeline berhasil ditambahkan');
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server');
    }
  }

  public function insertProposal(string $participantId, string $tenderId, string $date)
  {
    $sql = "UPDATE timeline_pengadaan SET submit_proposal = :date WHERE participant_id = :participant_id AND tender_id = :tender_id AND submit_proposal IS NULL";
    try {
      $this->db->supdate($sql, ['participant_id' => $participantId, 'tender_id' => $tenderId, 'date' => $date]);
      return $this->createSuccessResponse('Timeline berhasil ditambahkan');
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server');
    }
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
