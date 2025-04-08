<?php

namespace App;

use App\ResponseMessage;
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
            return ResponseMessage::createSuccessResponse(
                message: 'Data Berita berhasil diambil',
                data: $news
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server'
            );
        }
    }

    public function getNewsBySlug(string $slug)
    {
        $sql = "SELECT * FROM news WHERE slug = :slug";
        try {
            $news = $this->db->squery($sql, ['slug' => $slug]);
            return ResponseMessage::createSuccessResponse(
                message: 'Data Berita berhasil diambil',
                data: $news
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server'
            );
        }
    }

    public function getNewsByPage(string $limit, string $offset)
    {
        $sql = "SELECT * FROM news LIMIT $limit OFFSET $offset";
        try {
            $news = $this->db->squery($sql, []);
            return ResponseMessage::createSuccessResponse(
                message: 'Data Berita berhasil diambil',
                data: $news
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server'
            );
        }
    }

    public function getTotalNewsCount()
    {
        $sql = "SELECT COUNT(*) AS total FROM news";
        try {
            $result = $this->db->squery($sql, []);
            return ResponseMessage::createSuccessResponse(
                message: 'Total news count fetched successfully',
                data: $result
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Error fetching total news count'
            );
        }
    }
}
