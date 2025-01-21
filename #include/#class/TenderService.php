<?php

namespace App;

use Exception;

class TenderService
{
  private $db;

  public function __construct()
  {
    $this->db = new DB(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  }

  public function getAllTenders(): array
  {
    $query = "SELECT * FROM tender";

    try {
      $tenders = $this->db->queryFetchAllAssoc($query);

      if (empty($tenders)) {
        return $this->createErrorResponse('No tenders available');
      }

      return $this->createSuccessResponse($tenders);
    } catch (Exception $e) {
      return $this->createErrorResponse('Server error occurred');
    }
  }

  public function getTendersByCategories(array $categories, string $operator = 'IN'): array
  {
    if (empty($categories)) {
      return $this->createErrorResponse('No categories provided');
    }

    $placeholders = implode(',', array_fill(0, count($categories), '?'));
    $query = "SELECT * FROM tender WHERE category {$operator} ($placeholders)";

    try {
      $stmt = $this->db->prepare($query);
      $stmt->execute($categories);

      $tenders = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      if (empty($tenders)) {
        return $this->createErrorResponse('No tenders found for the given categories');
      }

      return $this->createSuccessResponse($tenders);
    } catch (Exception $e) {
      return $this->createErrorResponse('Server error occurred');
    }
  }

  private function createSuccessResponse(array $data): array
  {
    return [
      'status' => 'success',
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
