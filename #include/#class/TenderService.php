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

  public function getTenders()
  {
    $query = "SELECT * FROM tender";

    try {
      $tenders = $this->db->squery($query, []);

      if (empty($tenders)) {
        return $this->createErrorResponse('No tenders available');
      }

      return $this->createSuccessResponse('', $tenders);
    } catch (Exception $e) {
      return $this->createErrorResponse('Server error occurred');
    }
  }

  public function getTendersByCategory(array $category, string $operator = 'IN'): array
  {
    $placeholders = implode(',', array_fill(0, count($category), '?'));

    $query = "SELECT * FROM tender WHERE category {$operator} ({$placeholders})";

    if (empty($category)) {
      return $this->createErrorResponse('No category provided');
    }

    try {
      $tenders = $this->db->squery($query, $category);

      if (empty($tenders)) {
        return $this->createErrorResponse('No tenders found for the given category');
      }

      return $this->createSuccessResponse('', $tenders);
    } catch (Exception $e) {
      return $this->createErrorResponse('Server error occurred');
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
