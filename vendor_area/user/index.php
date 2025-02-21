<?php
session_start();

use App\CompanyService;
use App\DocumentService;
use App\KatalogService;
use App\RegionService;
use App\TenderService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

if (empty($_SESSION)) {
  header("Location: " . SERVER_NAME . "");
  exit;
}

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

$current_menu = "profile";
$current_sub_menu = NULL;
$title = "Profile";

require_once __DIR__ . '/../../#include/component/header.php';
require_once __DIR__ . '/../../#include/component/navbar.php';
require_once __DIR__ . '/../../#include/component/layout/vendor_area/vendor.php';
require_once __DIR__ . '/../../#include/component/footer.php';
