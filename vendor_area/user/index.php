<?php
session_start();

use App\CompanyService;
use App\KatalogService;
use App\RegionService;
use App\TenderService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

if (empty($_SESSION)) {
  header("Location: " . SERVER_NAME . "");
  exit;
}

$region = new RegionService();
$company = new CompanyService();
$katalogService = new KatalogService();
$tenderService = new TenderService();

$provinces = $region->getProvinces();
$companyDatas = $company->getCompanyData($_SESSION['id'] ?? '');
$katalogs = $katalogService->getKatalog();
$tenders = $tenderService->getTenders();

$selectedProvince = $_GET['province'] ?? '';
$selectedRegency = $_GET['regency'] ?? '';
$selectedDistrict = $_GET['district'] ?? '';
$selectedVillage = $_GET['village'] ?? '';
$name = $_GET['name'] ?? '';

$regencies = $selectedProvince ? $region->getRegencies($selectedProvince) : [];
$districts = $selectedRegency ? $region->getDistricts($selectedRegency) : [];
$villages = $selectedDistrict ? $region->getVillages($selectedDistrict) : [];

$current_menu = "profile";
$current_sub_menu = NULL;
$title = "Profile";

require_once __DIR__ . '/../../#include/component/header.php';
require_once __DIR__ . '/../../#include/component/navbar.php';
require_once __DIR__ . '/../../#include/component/layout/vendor_area/vendor.php';
require_once __DIR__ . '/../../#include/component/footer.php';
