<?php

namespace App;

use Exception;

class KatalogService
{
  private $db;

  public function __construct()
  {
    $this->db = new DB(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  }

  public function getKatalog()
  {
    $sql = "SELECT * FROM katalog";
    try {
      $katalog = $this->db->squery($sql, []);
      return $this->createSuccessResponse('Data katalog berhasil diambil', $katalog);
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server');
    }
  }

  public function getKatalogById($id)
  {
    $sql = "SELECT * FROM katalog WHERE id = :id";
    try {
      $katalog = $this->db->squery($sql, ['id' => $id]);
      return $this->createSuccessResponse('Data katalog berhasil diambil', $katalog);
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server');
    }
  }

  public function getImage($id)
  {
    $sql = "SELECT gambar FROM katalog WHERE id = :id";
    try {
      $katalog = $this->db->squery($sql, ['id' => $id]);
      return $this->createSuccessResponse('Data katalog berhasil diambil', $katalog);
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server');
    }
  }

  public function postKatalog(array $data)
  {
    $sql = "INSERT INTO katalog (kode_produk, produk_solusi, tkdn_produk, jenis, harga, expired_harga, kategori, deskripsi, gambar, dokumen) VALUES (:kode_produk, :produk_solusi, :tkdn_produk, :jenis, :harga, :expired_harga, :kategori, :deskripsi, :gambar, :dokumen)";
    try {
      $photo = $this->savePhoto($data['photo']);
      $document = $this->saveDocument($data['document']);
      $this->db->squery($sql, [
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
      return $this->createSuccessResponse('Katalog berhasil ditambahkan');
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server: ' . $e->getMessage());
    }
  }

  public function putKatalog($id, array $data)
  {
    $sql = "UPDATE katalog SET kode_produk = :kode_produk, produk_solusi = :produk_solusi, tkdn_produk = :tkdn_produk, jenis = :jenis, harga = :harga, expired_harga = :expired_harga, kategori = :kategori, deskripsi = :deskripsi, gambar = :gambar, dokumen = :dokumen WHERE id = :id";
    try {
      $existProduct = $this->db->squery("SELECT * FROM katalog WHERE kode_produk = :kode_produk AND id = :id", [
        'kode_produk' => $data['kode_produk'],
        'id' => $id
      ]);

      $photo = isset($data['photo']) && $data['photo']['error'] == 0 ? $this->savePhoto($data['photo']) : ($existProduct ? $existProduct[0]['gambar'] : null);
      $document = isset($data['document']) && $data['document']['error'] == 0 ? $this->saveDocument($data['document']) : ($existProduct ? $existProduct[0]['dokumen'] : null);

      $this->db->squery($sql, [
        'id' => $id,
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

      return $this->createSuccessResponse('Katalog berhasil diubah');
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server: ' . $e->getMessage());
    }
  }

  public function deleteKatalog($id)
  {
    $sql = "DELETE FROM katalog WHERE id = :id";
    try {
      $this->db->squery($sql, ['id' => $id]);
      return $this->createSuccessResponse('Katalog berhasil dihapus');
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server: ' . $e->getMessage());
    }
  }

  private function savePhoto($photo)
  {
    $target_dir = "../../assets/katalog/image/";

    if (!is_dir($target_dir)) {
      mkdir($target_dir, 0755, true);
    }

    $target_file = $target_dir . uniqid() . '.' . pathinfo($photo["name"], PATHINFO_EXTENSION);

    if (move_uploaded_file($photo["tmp_name"], $target_file)) {
      return $target_file;
    } else {
      throw new Exception("Gagal menyimpan foto.");
    }
  }

  private function saveDocument($document)
  {
    $target_dir = "../../assets/katalog/document/";

    if (!is_dir($target_dir)) {
      mkdir($target_dir, 0755, true);
    }

    $target_file = $target_dir . uniqid() . '.' . pathinfo($document["name"], PATHINFO_EXTENSION);

    if (move_uploaded_file($document["tmp_name"], $target_file)) {
      return $target_file;
    } else {
      throw new Exception("Gagal menyimpan dokumen.");
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
