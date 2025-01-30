<?php
require_once __DIR__ . '/#include/config.php';
require_once __DIR__ . '/#include/#class/autoload.php';

use App\TenderService;
use App\UserService;

$tenderService = new TenderService();
$userService = new UserService();

$category = $_GET['category'] ?? '';
$keyword = $_GET['keyword'] ?? '';

// Daftar kategori
$categories = [
  'semua_kategori' => ['filter' => null],
  'jasa_konsultasi' => ['filter' => ['Jasa Konsultasi Bidang Usaha']],
  'pegadaan_barang' => ['filter' => ['Pengadaan Barang & Jasa']],
  'jasa_lain' => ['filter' => ['Pengadaan Barang & Jasa', 'Jasa Konsultasi Bidang Usaha'], 'operator' => 'NOT IN'],
];

// Tentukan kategori yang dipilih
$currentCategory = $categories[$category] ?? $categories['semua_kategori'];
$title = "Home";

// Ambil data tender berdasarkan kategori dan keyword
if ($keyword) {
  if ($category === 'semua_kategori') {
    $tenders = $tenderService->getTender($keyword);
  } else {
    $tenders = $tenderService->searchTender($currentCategory['filter'] ?? [], $keyword, $currentCategory['operator'] ?? 'IN');
  }
} elseif (isset($currentCategory['filter'])) {
  $tenders = $tenderService->getTendersByCategory($currentCategory['filter'] ?? [], $currentCategory['operator'] ?? 'IN');
} else {
  $tenders = $tenderService->getTenders();
}

// Ambil data untuk setiap kategori tab-pane
$tenderLain = $tenderService->getTendersByCategory(['Pengadaan Barang & Jasa', 'Jasa Konsultasi Bidang Usaha'], 'NOT IN');
$tenderBarangJasa = $tenderService->getTendersByCategory(['Pengadaan Barang & Jasa']);
$tenderKonsultasi = $tenderService->getTendersByCategory(['Jasa Konsultasi Bidang Usaha']);

// Hitung tender baru (max 3 hari terakhir) dan tender selesai
$tenderBaru = $tenderSelesai = 0;
if (isset($tenders['data'])) {
  $now = new DateTimeImmutable();
  foreach ($tenders['data'] as $tender) {
    $registrationDate = new DateTimeImmutable($tender['registration_date'] ?? 'now');
    $closingDate = new DateTimeImmutable($tender['closing_date'] ?? 'now');

    if ($now->diff($registrationDate)->days <= 3) {
      $tenderBaru++;
    }
    if ($now->diff($closingDate)->days > 0) {
      $tenderSelesai++;
    }
  }
}

require_once __DIR__ . '/#include/component/header.php';
require_once __DIR__ . '/#include/component/navbar.php';
require_once __DIR__ . '/#include/component/home-layout.php';
require_once __DIR__ . '/#include/component/footer.php';
