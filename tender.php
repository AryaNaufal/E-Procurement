<?php
session_start();

require_once __DIR__ . '/#include/config.php';
require_once ROOT_PATH . '#include/#class/autoload.php';

use App\LoadEnv;
use App\TenderService;
use App\UserService;

$env = new LoadEnv(ROOT_PATH . '.env');
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
$title = "Tender";

// Ambil data tender berdasarkan kategori dan keyword
if ($keyword && $categories[$category]['filter'] !== null) {
  $tenders = $tenderService->searchTender($currentCategory['filter'] ?? [], $keyword, $currentCategory['operator'] ?? 'IN');
} elseif (isset($currentCategory['filter'])) {
  $tenders = $tenderService->getTendersByCategory($currentCategory['filter'] ?? [], $currentCategory['operator'] ?? 'IN');
} else {
  isset($keyword) && $tenders = $tenderService->getTender($keyword);
}

// Ambil data untuk setiap kategori tab-pane
$tenderLain = $tenderService->getTendersByCategory(['Pengadaan Barang & Jasa', 'Jasa Konsultasi Bidang Usaha'], 'NOT IN');
$tenderBarangJasa = $tenderService->getTendersByCategory(['Pengadaan Barang & Jasa']);
$tenderKonsultasi = $tenderService->getTendersByCategory(['Jasa Konsultasi Bidang Usaha']);

require_once ROOT_PATH . "#include/component/header.php";
require_once ROOT_PATH . "#include/component/navbar.php";
require_once ROOT_PATH . "#include/component/layout/tender/tender-layout.php";
require_once ROOT_PATH . "#include/component/footer.php";
