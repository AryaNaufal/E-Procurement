<?php

use App\RegionService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$region = new RegionService();

$provinceId = $_GET['province'] ?? '';

$regencies = $region->getRegencies($provinceId);

echo '<option value="">Pilih Kabupaten/Kota</option>';
foreach ($regencies as $regency) {
  echo '<option value="' . $regency['id'] . '">' . $regency['name'] . '</option>';
}
