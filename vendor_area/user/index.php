<?php
session_start();

use App\CompanyService;
use App\RegionService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$region = new RegionService();
$company = new CompanyService();

$provinces = $region->getProvinces();
$companyDatas = $company->getCompanyData(2);

// echo "<pre>";
// print_r($companyDatas['data'][0]);
// echo "</pre>";

$selectedProvince = $_GET['province'] ?? '';
$selectedRegency = $_GET['regency'] ?? '';
$selectedDistrict = $_GET['district'] ?? '';
$selectedVillage = $_GET['village'] ?? '';
$name = $_GET['name'] ?? '';

$regencies = $selectedProvince ? $region->getRegencies($selectedProvince) : [];
$districts = $selectedRegency ? $region->getDistricts($selectedRegency) : [];
$villages = $selectedDistrict ? $region->getVillages($selectedDistrict) : [];

if (isset($_POST['submit'])) {
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
    'company_category' => isset($_POST['category']) ? implode(',', $_POST['category']) : ''
  ];

  $result = $company->postCompanyData($data);

  if ($result['status'] === 'success') {
    echo $result['message'];
    // header('Location: ' . SERVER_NAME . 'vendor_area/profile');
    exit;
  } else {
    echo "<script>alert('Gagal menyimpan data perusahaan. Silakan periksa kembali data Anda.');</script>";
  }
}

// if (isset($_POST['submit'])) {
//   echo "<script>alert('Gagal menyimpan data perusahaan. Silakan periksa kembali data Anda.');</script>";
// }



$current_menu = "profile";
$current_sub_menu = NULL;
$title = "Profile";

require_once __DIR__ . '/../../#include/component/header.php';
require_once __DIR__ . '/../../#include/component/navbar.php';
require_once __DIR__ . '/../../#include/component/layout/vendor_area/vendor.php';
require_once __DIR__ . '/../../#include/component/footer.php';
