<?php

namespace App;

use Exception;

class NewsService
{
  private $db;

  public function __construct()
  {
    $this->db = new DB(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  }

  public function getNews()
  {
    $sql = "SELECT * FROM news";
    try {
      $news = $this->db->squery($sql, []);
      return $this->createSuccessResponse('Data Berita berhasil diambil', $news);
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server');
    }
  }

  public function getNewsBySlug(string $slug)
  {
    $sql = "SELECT * FROM news WHERE slug = :slug";
    try {
      $news = $this->db->squery($sql, ['slug' => $slug]);
      return $this->createSuccessResponse('Data Berita berhasil diambil', $news);
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server');
    }
  }

  public function getNewsByPage(string $limit, string $offset)
  {
    $sql = "SELECT * FROM news LIMIT $limit OFFSET $offset";
    try {
      $news = $this->db->squery($sql, []);
      return $this->createSuccessResponse('Data Berita berhasil diambil', $news);
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server');
    }
  }

  public function getTotalNewsCount()
  {
    $sql = "SELECT COUNT(*) AS total FROM news";
    try {
      $result = $this->db->squery($sql, []);
      return $this->createSuccessResponse('Total news count fetched successfully', $result);
    } catch (Exception $e) {
      return $this->createErrorResponse('Error fetching total news count');
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
