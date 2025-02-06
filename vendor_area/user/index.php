<?php
session_start();

use App\CompanyService;
use App\KatalogService;
use App\RegionService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$region = new RegionService();
$company = new CompanyService();
$katalogService = new KatalogService();

$provinces = $region->getProvinces();
$companyDatas = $company->getCompanyData($_SESSION['id'] ?? '');
$katalogs = $katalogService->getKatalog();

$selectedProvince = $_GET['province'] ?? '';
$selectedRegency = $_GET['regency'] ?? '';
$selectedDistrict = $_GET['district'] ?? '';
$selectedVillage = $_GET['village'] ?? '';
$name = $_GET['name'] ?? '';

$regencies = $selectedProvince ? $region->getRegencies($selectedProvince) : [];
$districts = $selectedRegency ? $region->getDistricts($selectedRegency) : [];
$villages = $selectedDistrict ? $region->getVillages($selectedDistrict) : [];

if (isset($_POST['submit_company'])) {
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
    'user_id' => $_SESSION['id']
  ];

  $result = $company->postCompanyData($data);

  if ($result['status'] === 'success') {
    echo "<script>alert('" . $result['message'] . "');</script>";
  } else {
    echo "<script>alert('" . $result['message'] . "');</script>";
  }
}

if (isset($_POST['submit_katalog'])) {
  $data = [
    'kode_produk' => $_POST['kode_produk'],
    'nama_produk' => $_POST['nama_produk'],
    'tkdn_produk' => $_POST['tkdn_produk'],
    'jenis_produk' => $_POST['jenis_produk'],
    'harga_produk' => preg_replace('/\D/', '', $_POST['harga_produk']),
    'expired_harga' => preg_replace('/\D/', '', $_POST['expired_harga']),
    'kategori_produk' => $_POST['kategori_produk'],
    'deskripsi_produk' => $_POST['deskripsi_produk'],
    'photo' => $_FILES['photo'],
    'document' => $_FILES['document']
  ];

  $result = $katalogService->postKatalog($data);

  if ($result['status'] === 'success') {
    echo "<script>alert('" . $result['message'] . "'); window.location.href = '" . $_SERVER['PHP_SELF'] . "';</script>";
  } else {
    echo "<script>alert('" . $result['message'] . "'); window.location.href = '" . $_SERVER['PHP_SELF'] . "';</script>";
  }
}

$current_menu = "profile";
$current_sub_menu = NULL;
$title = "Profile";

require_once __DIR__ . '/../../#include/component/header.php';
require_once __DIR__ . '/../../#include/component/navbar.php';
require_once __DIR__ . '/../../#include/component/layout/vendor_area/vendor.php';
require_once __DIR__ . '/../../#include/component/footer.php';
