<?php
include_once "#include/config.php";
include_once "#include/#class/autoload.php";

use App\TenderService;

// Tender Service
$tenderService = new TenderService();

// Get all tender
$tenders = $tenderService->getAllTenders();

// Get tender by category
$tenderBarangJasa = $tenderService->getTendersByCategories(['Pengadaan Barang & Jasa']);
$tenderKonsultasi = $tenderService->getTendersByCategories(['Jasa Konsultasi Bidang Usaha']);

// Get tender not in above category (other)
$tenderLain = $tenderService->getTendersByCategories(['Pengadaan Barang & Jasa', 'Jasa Konsultasi Bidang Usaha'], 'NOT IN');

// Show newest tender (Max 3 day ago)
$tenderBaru = isset($tenders['data']) ? count(array_filter($tenders['data'], function ($tender) {
  $now = new DateTimeImmutable();
  $registrationDate = new DateTimeImmutable($tender['registration_date'] ?? 'now');
  $interval = $now->diff($registrationDate);
  return $interval->days <= 3;
})) : 0;

// Show completed tender or closing
$tenderSelesai = isset($tenders['data']) ? count(array_filter($tenders['data'], function ($tender) {
  $now = new DateTimeImmutable();
  $closingDate = new DateTimeImmutable($tender['closing_date'] ?? 'now');
  $interval = $now->diff($closingDate);
  return $interval->days > 0;
})) : 0;

$current_menu = "home";
$current_sub_menu = NULL;
$title = "Home";

include_once "#include/component/header.php";
include_once "#include/component/navbar.php";
include_once "#include/component/home-layout.php";
include_once "#include/component/footer.php";
