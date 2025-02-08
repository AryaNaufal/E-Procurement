<?php

use App\RegionService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$region = new RegionService();

$districtId = $_GET['district'] ?? '';

$villages = $region->getVillages($districtId);

echo '<option value="">Pilih Kelurahan/Desa</option>';
foreach ($villages as $village) {
  echo '<option value="' . $village['id'] . '">' . $village['name'] . '</option>';
}
