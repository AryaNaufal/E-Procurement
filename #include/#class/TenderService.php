<?php

namespace App;

use App\ResponseMessage;
use Exception;

class TenderService
{
    private $db;

    public function __construct()
    {
        $this->db = new DB(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }

    public function getTenders(): array
    {
        return $this->fetchTenders("SELECT * FROM tenders");
    }

    public function getNewTenders(): array
    {
        return $this->fetchTenders("SELECT * FROM tenders WHERE registration_date>= CURDATE() - INTERVAL 3 DAY;");
    }

    public function getClosingTenders(): array
    {
        return $this->fetchTenders("SELECT * FROM tenders WHERE closing_date <= NOW()");
    }

    public function getTender(string $keyword): array
    {
        $query = "SELECT * FROM tenders WHERE description LIKE :keyword OR category LIKE :keyword AND closing_date >= NOW() LIMIT 6";
        return $this->fetchTenders($query, ['keyword' => "%{$keyword}%"]);
    }

    public function getTenderById(string $id): array
    {
        $query = "SELECT * FROM tenders WHERE id = :id";
        return $this->fetchTenders($query, ['id' => $id]);
    }

    public function getTendersByCategory(array $categories, string $operator = 'IN', int $limit = 6, int $offset = 0): array
    {
        if (empty($categories)) {
            return ResponseMessage::createErrorResponse(
                message: 'Kategori tidak tersedia'
            );
        }

        $placeholders = implode(',', array_fill(0, count($categories), '?'));
        $query = "SELECT * FROM tenders WHERE category {$operator} ({$placeholders}) AND closing_date >= NOW() LIMIT $limit OFFSET $offset";

        return $this->fetchTenders($query, $categories);
    }

    public function getTotalCategoryCount(array $categories, string $operator = 'IN')
    {
        $placeholders = implode(',', array_fill(0, count($categories), '?'));
        $sql = "SELECT COUNT(*) AS total FROM tenders WHERE category {$operator} ({$placeholders})";
        try {
            $result = $this->db->squery($sql, $categories);
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

    public function searchTender(array $categories, string $keyword, string $operator = 'IN'): array
    {
        if (empty($categories)) {
            return ResponseMessage::createErrorResponse(
                message: 'Kategori tidak tersedia'
            );
        }

        $placeholders = implode(',', array_fill(0, count($categories), '?'));
        $query = "SELECT * FROM tenders WHERE category {$operator} ({$placeholders}) AND description LIKE ? LIMIT 6";
        $params = array_merge($categories, ["%{$keyword}%"]);

        return $this->fetchTenders($query, $params);
    }

    private function fetchTenders(string $query, array $params = []): array
    {
        try {
            $tenders = $this->db->squery($query, $params);

            if (empty($tenders)) {
                return ResponseMessage::createErrorResponse(
                    message: 'Tender tidak ditemukan'
                );
            }

            return ResponseMessage::createSuccessResponse(
                message: '',
                data: $tenders
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server'
            );
        }
    }

    public function submitTender(string $user_id, string $tender_id): array
    {
        $query = "INSERT INTO participants (user_id, tender_id, registration_date, is_accepted) VALUES (:user_id, :tender_id, :registration_date, 'pending')";

        try {
            $checkSubmit = $this->db->squery("SELECT * FROM participants WHERE user_id = :user_id AND tender_id = :tender_id", ['user_id' => $user_id, 'tender_id' => $tender_id]);

            if (!empty($checkSubmit)) {
                return ResponseMessage::createErrorResponse(
                    message: 'Anda sudah terdaftar pada pengadaan ini'
                );
            }

            $this->db->squery($query, ['user_id' => $user_id, 'tender_id' => $tender_id, 'registration_date' => date('Y-m-d H:i:s')]);
            return ResponseMessage::createSuccessResponse(
                message: 'Pendaftaran berhasil'
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server'
            );
        }
    }

    public function getTenderFollowedByUser(string $userId): array
    {
        $query = "SELECT t.id, t.description, t.category FROM tenders t JOIN participants p ON t.id = p.tender_id WHERE p.user_id = :user_id";

        try {
            $result = $this->db->squery($query, ['user_id' => $userId]);

            if (empty($result)) {
                return ResponseMessage::createErrorResponse(
                    message: 'Tender tidak ditemukan untuk user tersebut'
                );
            }

            return ResponseMessage::createSuccessResponse(
                message: '',
                data: $result
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server'
            );
        }
    }
}
