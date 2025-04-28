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

$categoryParam = $_GET['category'] ?? 'semua_kategori';
$keyword = $_GET['keyword'] ?? '';

$itemsPerPage = 6;
$page = max(1, (int)($_GET['page'] ?? 1));

$categoryMap = [
    'barang_jasa' => [
        'categories' => ['Pengadaan Barang & Jasa'],
        'operator' => 'IN',
    ],
    'jasa_konsultasi' => [
        'categories' => ['Jasa Konsultasi Bidang Usaha'],
        'operator' => 'IN',
    ],
    'jasa_lain' => [
        'categories' => ['Pengadaan Barang & Jasa', 'Jasa Konsultasi Bidang Usaha'],
        'operator' => 'NOT IN',
    ],
    'semua_kategori' => [
        'categories' => [],
        'operator' => '',
    ]
];

$currentCategory = $categoryMap[$categoryParam] ?? $categoryMap['semua_kategori'];
$categories = $currentCategory['categories'];
$operator = $currentCategory['operator'];

$title = "Tender";

// Pagination Sesuai kategori
if (!empty($categories)) {
    $totalItemsResponse = $tenderService->getTotalCategoryCount($categories, $operator);
    $totalItems = $totalItemsResponse['data'][0]['total'] ?? 0;

    $pagedNews = $tenderService->getTendersByCategory(
        categories: $categories,
        operator: $operator,
        limit: $itemsPerPage,
        offset: ($page - 1) * $itemsPerPage
    )['data'] ?? [];
} else {
    $tenders = $tenderService->getTenders();
    $totalItems = count($tenders['data'] ?? []);
    $pagedNews = array_slice($tenders['data'] ?? [], ($page - 1) * $itemsPerPage, $itemsPerPage);
}

// Pagination Sesuai kategori + Keyword
if (!empty($keyword)) {
    if (!empty($categories)) {
        $filteredData = $tenderService->searchTender($categories, $keyword, $operator)['data'] ?? [];
    } else {
        $allTenders = $tenderService->getTenders()['data'] ?? [];
        $filteredData = array_filter($allTenders, function ($tender) use ($keyword) {
            return stripos($tender['description'], $keyword) !== false;
        });
    }

    $totalItems = count($filteredData);
    $pagedNews = array_slice($filteredData, ($page - 1) * $itemsPerPage, $itemsPerPage);
} else {
    if (!empty($categories)) {
        $totalItemsResponse = $tenderService->getTotalCategoryCount($categories, $operator);
        $totalItems = $totalItemsResponse['data'][0]['total'] ?? 0;

        $pagedNews = $tenderService->getTendersByCategory(
            categories: $categories,
            operator: $operator,
            limit: $itemsPerPage,
            offset: ($page - 1) * $itemsPerPage
        )['data'] ?? [];
    } else {
        $tenders = $tenderService->getTenders();
        $totalItems = count($tenders['data'] ?? []);
        $pagedNews = array_slice($tenders['data'] ?? [], ($page - 1) * $itemsPerPage, $itemsPerPage);
    }
}

$totalPages = max(1, ceil($totalItems / $itemsPerPage));

require_once ROOT_PATH . "#include/component/header.php";
require_once ROOT_PATH . "#include/component/navbar.php";
require_once ROOT_PATH . "#include/component/layout/tender/tender-layout.php";
require_once ROOT_PATH . "#include/component/footer.php";
