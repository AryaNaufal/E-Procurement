<?php
include_once "#include/config.php";
include_once "#include/#class/autoload.php";

use App\TenderService;

// Tender Service
$tenderService = new TenderService();

// Get all tender
$tenders = $tenderService->getTenders();

// Get tender by category
$tenderBarangJasa = $tenderService->getTendersByCategory(['Pengadaan Barang & Jasa']);
$tenderKonsultasi = $tenderService->getTendersByCategory(['Jasa Konsultasi Bidang Usaha']);

// Get tender not in above category (other)
$tenderLain = $tenderService->getTendersByCategory(['Pengadaan Barang & Jasa', 'Jasa Konsultasi Bidang Usaha'], 'NOT IN');

$current_menu = "tender";
$current_sub_menu = NULL;
$title = "Tender";

include_once "#include/component/header.php";
include_once "#include/component/navbar.php";
include_once "#include/component/tender-layout.php";
include_once "#include/component/footer.php";
