<?php
session_start();

require_once __DIR__ . '/#include/config.php';
require_once ROOT_PATH . '#include/#class/autoload.php';

use App\LoadEnv;
use App\liblary;
use App\NewsService;
use App\TenderService;
use App\UserService;

$env = new LoadEnv(ROOT_PATH . '.env');
$Lib = new liblary();
$tenderService = new TenderService();
$userService = new UserService();
$newsService = new NewsService();

$news = $newsService->getNews();
$category = $_GET['category'] ?? '';
$keyword = $_GET['keyword'] ?? '';
$tenders = $tenderService->getTenders();

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
if ($keyword && $categories[$category]['filter'] !== null) {
  if ($category === 'semua_kategori') {
    $tender = $tenderService->getTender($keyword);
  } else {
    $tender = $tenderService->searchTender($currentCategory['filter'] ?? [], $keyword, $currentCategory['operator'] ?? 'IN');
  }
} elseif (isset($currentCategory['filter'])) {
  $tender = $tenderService->getTendersByCategory($currentCategory['filter'] ?? [], $currentCategory['operator'] ?? 'IN');
} else {
  isset($keyword) && $tender = $tenderService->getTender($keyword);
}

// Ambil data untuk setiap kategori tab-pane
$tenderLain = $tenderService->getTendersByCategory(['Pengadaan Barang & Jasa', 'Jasa Konsultasi Bidang Usaha'], 'NOT IN');
$tenderBarangJasa = $tenderService->getTendersByCategory(['Pengadaan Barang & Jasa']);
$tenderKonsultasi = $tenderService->getTendersByCategory(['Jasa Konsultasi Bidang Usaha']);

// Hitung tender baru (max 3 hari terakhir) dan tender selesai
$tenderBaru = $tenderSelesai = 0;
if (isset($tenders['data'])) {
  $now = new DateTimeImmutable();
  foreach ($tenders['data'] as $item) {
    $registrationDate = new DateTimeImmutable($item['registration_date'] ?? 'now');
    $closingDate = new DateTimeImmutable($item['closing_date'] ?? 'now');

    // Menampilkan Tender yang baru dalam durasi max 3 hari terakhir
    if ($now->diff($registrationDate)->days <= 3 && $now >= $registrationDate) {
      $tenderBaru++;
    }

    // Menampilkan Tender yang sudah selesai
    if ($now > $closingDate) {
      $tenderSelesai++;
    }
  }
}

require_once ROOT_PATH . '#include/component/header.php';
require_once ROOT_PATH . '#include/component/navbar.php';
require_once ROOT_PATH . '#include/component/layout/home/home-layout.php';
require_once ROOT_PATH . '#include/component/footer.php';
