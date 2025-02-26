<?php
session_start();

require_once __DIR__ . "/#include/config.php";
require_once ROOT_PATH . "#include/#class/autoload.php";

use App\LoadEnv;
use App\liblary;
use App\NewsService;

$env = new LoadEnv(ROOT_PATH . '.env');
$Lib = new liblary();
$newsService = new NewsService();

$news = $newsService->getNews();

// Jumlah item per halaman
$itemsPerPage = 6;

// Mengambil halaman saat ini dari query string, default ke 1 jika tidak ada
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1); // Memastikan halaman tidak kurang dari 1

// Menghitung total berita dan total halaman
$totalItems = count($news['data']);
$totalPages = ceil($totalItems / $itemsPerPage);

// Memastikan halaman yang diminta tidak lebih dari total halaman
$page = min($page, $totalPages);

// Menghitung offset berdasarkan halaman
$offset = ($page - 1) * $itemsPerPage;

// Mengammbil berita berdasarkan halaman
$pagedNews = array_slice($news['data'], $offset, $itemsPerPage);

$current_menu = "news";
$current_sub_menu = null;
$title = "News";

$uri_parts = explode('/', $_SERVER['REQUEST_URI']);

foreach ($news['data'] as $item) {
  $newsData = $item;
  if (end($uri_parts) === $Lib->seo_title($newsData['judul'])) {
    $current_menu = $newsData['judul'];
    $current_sub_menu = $newsData['judul'];
    $title = $newsData['judul'];

    require_once ROOT_PATH . "#include/component/header.php";
    require_once ROOT_PATH . "#include/component/navbar.php";
    require_once ROOT_PATH . "#include/component/layout/news/news-content.php";
    require_once ROOT_PATH . "#include/component/footer.php";
    exit;
  }
}

require_once ROOT_PATH . "#include/component/header.php";
require_once ROOT_PATH . "#include/component/navbar.php";
require_once ROOT_PATH . "#include/component/layout/news/news-layout.php";
require_once ROOT_PATH . "#include/component/footer.php";
