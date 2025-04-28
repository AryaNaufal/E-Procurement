<?php
session_start();

use App\LoadEnv;
use App\CompanyService;
use App\RegionService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

if (empty($_SESSION)) {
    header("Location: " . SERVER_NAME . "");
    exit;
}

$env = new LoadEnv(ROOT_PATH . '.env');
$regionService = new RegionService();
$companyService = new CompanyService();

$provinces = $regionService->getProvinces();
$companies = $companyService->getCompanyData($_GET['id'] ?? '');

$selectedCategory = explode(',', $companies['data'][0]['kategori']);
$regencies = $regionService->getRegencies($companies['data'][0]['provinsi'] ?? '');
$districts = $regionService->getDistricts($companies['data'][0]['kota'] ?? '');
$villages = $regionService->getVillages($companies['data'][0]['kecamatan'] ?? '');

$current_menu = "company";
$current_sub_menu = NULL;
$title = "Edit Company";

require_once ROOT_PATH . '#include/component/header.php';
require_once ROOT_PATH . '#include/component/navbar.php';
require_once ROOT_PATH . '#include/component/layout/vendor_area/company/company-edit.php';
require_once ROOT_PATH . '#include/component/footer.php';
