<?php

use App\CompanyService;

session_start();

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$companyService = new CompanyService();

$data = [
  'company_name' => $_POST['nama_perusahaan'],
  'company_type' => $_POST['tipe_perusahaan'],
  'company_mail' => $_POST['email_perusahaan'],
  'company_phone' => $_POST['no_tlp'],
  'company_mobile_phone' => $_POST['no_hp'],
  'company_address' => $_POST['alamat_perusahaan'],
  'company_province' => $_POST['province'],
  'company_regency' => $_POST['regency'],
  'company_district' => $_POST['district'],
  'company_village' => $_POST['village'],
  'company_category' => isset($_POST['category']) ? implode(',', $_POST['category']) : '',
];

$result = $companyService->updateCompanyData(
  userId: $_SESSION['id'],
  data: $data
);

if ($result['status'] === 'success') {
  $response = [
    "status" => $result['status'],
    "message" => $result['message'],
  ];
} else {
  $response = [
    "status" => $result['status'],
    "message" => $result['message'],
  ];
}

echo json_encode($response);
