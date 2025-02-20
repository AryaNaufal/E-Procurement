<?php

namespace App;

use Exception;

class CompanyService
{
  private $db;

  public function __construct()
  {
    $this->db = new DB(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  }

  public function getCompanyData(string $id): array
  {
    $sql = "SELECT * FROM vendor WHERE user_id = :id";
    try {
      $companyData = $this->db->squery($sql, ['id' => $id]);

      if (!$companyData) {
        return $this->createErrorResponse('Data perusahaan tidak ditemukan.');
      }

      return $this->createSuccessResponse('Data perusahaan berhasil ditemukan.', $companyData);
    } catch (Exception $e) {
      return $this->createErrorResponse($e->getMessage());
    }
  }

  public function postCompanyData(array $data): array
  {
    $checkUserId = "SELECT user_id FROM vendor WHERE user_id = :user_id";
    try {
      $checkResult = $this->db->squery_single($checkUserId, [
        'user_id' => $_SESSION['id']
      ]);

      if ($checkResult) {
        return $this->createErrorResponse('Data perusahaan sudah ada');
      }

      $sql = "INSERT INTO vendor (name, type, mail, phone, mobile_phone, address, provinsi, kota, kecamatan, kelurahan, kategori, user_id) 
      VALUES (:company_name, :company_type, :company_mail, :company_phone, :company_mobile_phone, :company_address, :company_province, :company_regency, :company_district, :company_village, :company_category, :user_id)";

      $companyData = $this->db->sinsert($sql, [
        'company_name' => $data['company_name'],
        'company_type' => $data['company_type'],
        'company_mail' => $data['company_mail'],
        'company_phone' => $data['company_phone'],
        'company_mobile_phone' => $data['company_mobile_phone'],
        'company_address' => $data['company_address'],
        'company_province' => $data['company_province'],
        'company_regency' => $data['company_regency'],
        'company_district' => $data['company_district'],
        'company_village' => $data['company_village'],
        'company_category' => $data['company_category'],
        'user_id' => $_SESSION['id']
      ]);

      if (!$companyData) {
        return $this->createErrorResponse('Data perusahaan gagal disimpan');
      }

      return $this->createSuccessResponse('Data perusahaan berhasil disimpan');
    } catch (Exception $e) {
      error_log("Database error: " . $e->getMessage());
      return $this->createErrorResponse('Database error: ' . $e->getMessage());
    }
  }

  public function updateCompanyData($id, array $data): array
  {
    $checkUserId = "SELECT user_id FROM vendor WHERE user_id = :user_id";
    $updateCompany = "UPDATE vendor SET 
    name = :company_name, 
    type = :company_type, 
    mail = :company_mail, 
    phone = :company_phone, 
    mobile_phone = :company_mobile_phone, 
    address = :company_address, 
    provinsi = :company_province, 
    kota = :company_regency, 
    kecamatan = :company_district, 
    kelurahan = :company_village, 
    kategori = :company_category 
    WHERE user_id = :user_id";

    try {
      $checkResult = $this->db->squery_single($checkUserId, [
        'user_id' => $id
      ]);

      if (!$checkResult) {
        return $this->createErrorResponse('Data perusahaan tidak ditemukan');
      }

      $this->db->supdate($updateCompany, [
        'company_name' => $data['company_name'],
        'company_type' => $data['company_type'],
        'company_mail' => $data['company_mail'],
        'company_phone' => $data['company_phone'],
        'company_mobile_phone' => $data['company_mobile_phone'],
        'company_address' => $data['company_address'],
        'company_province' => $data['company_province'],
        'company_regency' => $data['company_regency'],
        'company_district' => $data['company_district'],
        'company_village' => $data['company_village'],
        'company_category' => $data['company_category'],
        'user_id' => $id
      ]);

      return $this->createSuccessResponse('Data perusahaan berhasil diupdate');
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
