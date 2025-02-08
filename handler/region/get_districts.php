<?php

use App\RegionService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$region = new RegionService();

$regencyId = $_GET['regency'] ?? '';

$districts = $region->getDistricts($regencyId);

echo '<option value="">Pilih Kecamatan</option>';
foreach ($districts as $district) {
  echo '<option value="' . $district['id'] . '">' . $district['name'] . '</option>';
}
