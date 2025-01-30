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
    $query = "SELECT * FROM tender WHERE description LIKE :keyword OR category LIKE :keyword";
    return $this->fetchTenders($query, ['keyword' => "%{$keyword}%"]);
  }

  public function getTendersByCategory(array $categories, string $operator = 'IN'): array
  {
    if (empty($categories)) {
      return $this->createErrorResponse('Kategori tidak tersedia');
    }

    $placeholders = implode(',', array_fill(0, count($categories), '?'));
    $query = "SELECT * FROM tender WHERE category {$operator} ({$placeholders})";

    return $this->fetchTenders($query, $categories);
  }

  public function searchTender(array $categories, string $keyword, string $operator = 'IN'): array
  {
    if (empty($categories)) {
      return $this->createErrorResponse('Kategori tidak tersedia');
    }

    $placeholders = implode(',', array_fill(0, count($categories), '?'));
    $query = "SELECT * FROM tender WHERE category {$operator} ({$placeholders}) AND description LIKE ?";
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
