<?php

namespace App;

use Exception;
use PDO;

class TenderService
{
  private $db;

  public function __construct()
  {
    $this->db = new DB(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  }

  public function getTenders(): array
  {
    return $this->fetchTenders("SELECT * FROM tender");
  }

  public function getTender(string $keyword): array
  {
    $query = "SELECT * FROM tender WHERE description LIKE :keyword OR category LIKE :keyword LIMIT 6";
    return $this->fetchTenders($query, ['keyword' => "%{$keyword}%"]);
  }

  public function getTenderById(string $id): array
  {
    $query = "SELECT * FROM tender WHERE id = :id";
    return $this->fetchTenders($query, ['id' => $id]);
  }

  public function getTendersByCategory(array $categories, string $operator = 'IN'): array
  {
    if (empty($categories)) {
      return $this->createErrorResponse('Kategori tidak tersedia');
    }

    $placeholders = implode(',', array_fill(0, count($categories), '?'));
    $query = "SELECT * FROM tender WHERE category {$operator} ({$placeholders}) LIMIT 6";

    return $this->fetchTenders($query, $categories);
  }

  public function searchTender(array $categories, string $keyword, string $operator = 'IN'): array
  {
    if (empty($categories)) {
      return $this->createErrorResponse('Kategori tidak tersedia');
    }

    $placeholders = implode(',', array_fill(0, count($categories), '?'));
    $query = "SELECT * FROM tender WHERE category {$operator} ({$placeholders}) AND description LIKE ? LIMIT 6";
    $params = array_merge($categories, ["%{$keyword}%"]);

    return $this->fetchTenders($query, $params);
  }

  private function fetchTenders(string $query, array $params = []): array
  {
    try {
      $tenders = $this->db->squery($query, $params);

      if (empty($tenders)) {
        return $this->createErrorResponse('Tender tidak ditemukan');
      }

      return $this->createSuccessResponse('', $tenders);
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server');
    }
  }

  public function submitTender(string $user_id, string $tender_id): array
  {
    $query = "INSERT INTO participant (user_id, tender_id, registration_date) VALUES (:user_id, :tender_id, :registration_date)";

    try {
      $checkSubmit = $this->db->squery("SELECT * FROM participant WHERE user_id = :user_id AND tender_id = :tender_id", ['user_id' => $user_id, 'tender_id' => $tender_id]);

      if (!empty($checkSubmit)) {
        return $this->createErrorResponse('Anda sudah terdaftar pada pengadaan ini');
      }

      $this->db->squery($query, ['user_id' => $user_id, 'tender_id' => $tender_id, 'registration_date' => date('Y-m-d H:i:s')]);
      return $this->createSuccessResponse('Pendaftaran berhasil');
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server');
    }
  }

  public function getTenderFollowedByUser(string $userId): array
  {
    $query = "SELECT t.id, t.description, t.category FROM tender t JOIN participant p ON t.id = p.tender_id WHERE p.user_id = :user_id";

    try {
      $result = $this->db->squery($query, ['user_id' => $userId]);

      if (empty($result)) {
        return $this->createErrorResponse('Tender tidak ditemukan untuk user tersebut');
      }

      return $this->createSuccessResponse('', $result);
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
