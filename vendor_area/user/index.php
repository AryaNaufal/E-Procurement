<?php
session_start();

use App\LoadEnv;
use App\CompanyService;
use App\DocumentService;
use App\KatalogService;
use App\RegionService;
use App\TenderService;

require_once __DIR__ . '/../../#include/config.php';
require_once ROOT_PATH . '#include/#class/autoload.php';

if (empty($_SESSION)) {
  header("Location: " . SERVER_NAME . "");
  exit;
}

$env = new LoadEnv(ROOT_PATH . '.env');
$regionService = new RegionService();
$companyService = new CompanyService();
$katalogService = new KatalogService();
$tenderService = new TenderService();
$documentService = new DocumentService();

$provinces = $regionService->getProvinces();
$companies = $companyService->getCompanyData($_SESSION['id'] ?? '');
$katalogs = $katalogService->getKatalogOwnership($_SESSION['id'] ?? '');
$tenders = $tenderService->getTenders();
$documents = $documentService->getDocument($_SESSION['id'] ?? '');
$followedTender = $tenderService->getTenderFollowedByUser($_SESSION['id'] ?? '');

$selectedProvince = $_GET['province'] ?? '';
$selectedRegency = $_GET['regency'] ?? '';
$selectedDistrict = $_GET['district'] ?? '';
$selectedVillage = $_GET['village'] ?? '';
$name = $_GET['name'] ?? '';

$regencies = $selectedProvince ? $regionService->getRegencies($selectedProvince) : [];
$districts = $selectedRegency ? $regionService->getDistricts($selectedRegency) : [];
$villages = $selectedDistrict ? $regionService->getVillages($selectedDistrict) : [];

$filledDocuments = 0;

foreach ($documents['data'][0] as $key => $document) {
  if (!empty($document) && !in_array($key, ['id', 'user_id'])) {
    $filledDocuments++;
  }
}

$current_menu = "profile";
$current_sub_menu = NULL;
$title = "Profile";

require_once ROOT_PATH . '#include/component/header.php';
require_once ROOT_PATH . '#include/component/navbar.php';
require_once ROOT_PATH . '#include/component/layout/vendor_area/vendor-layout.php';
require_once ROOT_PATH . '#include/component/footer.php';
