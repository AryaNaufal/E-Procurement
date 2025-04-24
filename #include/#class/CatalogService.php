<?php

namespace App;

use App\ResponseMessage;
use Exception;

class CatalogService
{
    protected $db;

    public function __construct()
    {
        $this->db = new DB(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }

    public function getCatalogs(): array
    {
        $sql = "SELECT * FROM catalogs";
        try {
            $katalog = $this->db->squery($sql, []);
            return ResponseMessage::createSuccessResponse(
                message: 'Data katalog berhasil diambil',
                data: $katalog
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server'
            );
        }
    }

    public function getCatalogById(string $catalogId): array
    {
        $sql = "SELECT * FROM catalogs WHERE id = :id";
        try {
            $katalog = $this->db->squery($sql, ['id' => $catalogId]);

            if (empty($katalog)) {
                return ResponseMessage::createErrorResponse(
                    message: 'Data katalog tidak ditemukan'
                );
            }

            return ResponseMessage::createSuccessResponse(
                message: 'Data katalog berhasil diambil',
                data: $katalog
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server'
            );
        }
    }

    public function getCatalogOwnership(string $userId): array
    {
        $sql = "SELECT * FROM catalogs WHERE user_id = :user_id";
        try {
            $katalog = $this->db->squery($sql, ['user_id' => $userId]);

            if (empty($katalog)) {
                return ResponseMessage::createErrorResponse(
                    message: 'Data katalog tidak ditemukan'
                );
            }

            return ResponseMessage::createSuccessResponse(
                message: 'Data katalog berhasil diambil',
                data: $katalog
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server'
            );
        }
    }

    public function getImage(string $userId): array
    {
        $sql = "SELECT gambar FROM catalogs WHERE id = :user_id";
        try {
            $katalog = $this->db->squery($sql, ['user_id' => $userId]);
            return ResponseMessage::createSuccessResponse(
                message: 'Data katalog berhasil diambil',
                data: $katalog
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server'
            );
        }
    }

    public function postCatalog(array $data): array
    {
        $sql = "INSERT INTO catalogs (user_id, kode_produk, produk_solusi, tkdn_produk, jenis, harga, expired_harga, kategori, deskripsi, gambar, dokumen) VALUES (:user_id, :kode_produk, :produk_solusi, :tkdn_produk, :jenis, :harga, :expired_harga, :kategori, :deskripsi, :gambar, :dokumen)";
        try {
            $photo = $this->savePhoto($data['photo']);
            $document = $this->saveDocument($data['document']);
            $this->db->squery($sql, [
                'user_id' => $data['user_id'],
                'kode_produk' => $data['kode_produk'],
                'produk_solusi' => $data['nama_produk'],
                'tkdn_produk' => $data['tkdn_produk'],
                'jenis' => $data['jenis_produk'],
                'harga' => $data['harga_produk'],
                'expired_harga' => $data['expired_harga'],
                'kategori' => $data['kategori_produk'],
                'deskripsi' => $data['deskripsi_produk'],
                'gambar' => $photo,
                'dokumen' => $document
            ]);
            return ResponseMessage::createSuccessResponse(
                message: 'Catalog berhasil ditambahkan'
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server',
            );
        }
    }

    public function putCatalog(string $catalogId, array $data): array
    {
        $sql = "UPDATE catalogs SET kode_produk = :kode_produk, produk_solusi = :produk_solusi, tkdn_produk = :tkdn_produk, jenis = :jenis, harga = :harga, expired_harga = :expired_harga, kategori = :kategori, deskripsi = :deskripsi, gambar = :gambar, dokumen = :dokumen WHERE id = :id";
        try {
            $existProduct = $this->db->squery("SELECT * FROM catalogs WHERE id = :id", ['id' => $catalogId]);

            if (empty($existProduct)) {
                return ResponseMessage::createErrorResponse(
                    message: 'Data katalog tidak ditemukan'
                );
            }

            $photo = isset($data['gambar']) && $data['gambar']['error'] == 0 ? $this->savePhoto($data['gambar']) : ($existProduct ? $existProduct[0]['gambar'] : null);
            $document = isset($data['dokumen']) && $data['dokumen']['error'] == 0 ? $this->saveDocument($data['dokumen']) : ($existProduct ? $existProduct[0]['dokumen'] : null);

            $this->db->supdate($sql, [
                'id' => $catalogId,
                'kode_produk' => $data['kode_produk'],
                'produk_solusi' => $data['nama_produk'],
                'tkdn_produk' => $data['tkdn_produk'],
                'jenis' => $data['jenis_produk'],
                'harga' => $data['harga_produk'],
                'expired_harga' => $data['expired_harga'],
                'kategori' => $data['kategori_produk'],
                'deskripsi' => $data['deskripsi_produk'],
                'gambar' => $photo,
                'dokumen' => $document
            ]);

            return ResponseMessage::createSuccessResponse(
                message: 'Catalog berhasil diubah'
            );
        } catch (Exception $e) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server' . $e
            );
        }
    }

    public function deleteCatalog(string $catalogId): array
    {
        $target_dir = ROOT_PATH . 'assets/katalog';

        try {
            $katalog = $this->db->squery("SELECT gambar, dokumen FROM catalogs WHERE id = :id", ['id' => $catalogId]);

            if (empty($katalog)) {
                return ResponseMessage::createErrorResponse(
                    message: 'Data katalog tidak ditemukan'
                );
            }

            foreach (['dokumen' => '/document/', 'gambar' => '/image/'] as $field => $subdir) {
                $filePath = $target_dir . $subdir . $katalog[0][$field];
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $sql = "DELETE FROM catalogs WHERE id = :id";
            $this->db->sdelete($sql, ['id' => $catalogId]);

            return ResponseMessage::createSuccessResponse(
                message: 'Catalog berhasil dihapus'
            );
        } catch (Exception) {
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi kesalahan pada server'
            );
        }
    }

    protected function savePhoto(array $photo): string
    {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'];
        $maxSize = 2 * 1024 * 1024; // max 2MB

        if (!isset($photo) || $photo['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("File foto tidak valid.");
        }

        $mime = mime_content_type($photo['tmp_name']);
        $extension = strtolower(pathinfo($photo["name"], PATHINFO_EXTENSION));

        if (!in_array($mime, $allowedMimeTypes) || !in_array($extension, $allowedExtensions)) {
            throw new Exception("Tipe atau ekstensi file foto tidak diizinkan.");
        }

        if ($photo['size'] > $maxSize) {
            throw new Exception("Ukuran file foto maksimal 2MB.");
        }

        $target_dir = ROOT_PATH . "assets/katalog/image/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        $filename = uniqid('photo_', true) . '.' . $extension;
        $target_file = $target_dir . $filename;

        if (move_uploaded_file($photo["tmp_name"], $target_file)) {
            return $filename;
        } else {
            throw new Exception("Gagal menyimpan foto.");
        }
    }

    protected function saveDocument(array $document): string
    {
        $allowedExtensions = ['pdf', 'docx'];
        $allowedMimeTypes = [
            'application/pdf',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ];
        $maxSize = 5 * 1024 * 1024; // max 5MB

        if (!isset($document) || $document['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("File dokumen tidak valid.");
        }

        $mime = mime_content_type($document['tmp_name']);
        $extension = strtolower(pathinfo($document["name"], PATHINFO_EXTENSION));

        if (!in_array($mime, $allowedMimeTypes) || !in_array($extension, $allowedExtensions)) {
            throw new Exception("Tipe atau ekstensi file dokumen tidak diizinkan.");
        }

        if ($document['size'] > $maxSize) {
            throw new Exception("Ukuran file dokumen maksimal 5MB.");
        }

        $target_dir = ROOT_PATH . "assets/katalog/document/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        $filename = uniqid('doc_', true) . '.' . $extension;
        $target_file = $target_dir . $filename;

        if (move_uploaded_file($document["tmp_name"], $target_file)) {
            return $filename;
        } else {
            throw new Exception("Gagal menyimpan dokumen.");
        }
    }
}
