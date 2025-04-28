<?php
session_start();

require_once __DIR__ . "/#include/config.php";
require_once 'vendor/autoload.php';

use App\LoadEnv;
use App\liblary;
use App\NewsService;

$env = new LoadEnv(ROOT_PATH . '.env');
$Lib = new liblary();
$newsService = new NewsService();

// Mengambil jumlah data pada news
$totalItemsResponse = $newsService->getTotalNewsCount();
$totalItems = $totalItemsResponse['data'][0]['total'];
$itemsPerPage = 3;
$totalPages = ceil($totalItems / $itemsPerPage);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$page = min($page, $totalPages);

// Mengambil data news berdasarkan halaman
$pagedNews = $newsService->getNewsByPage($itemsPerPage, ($page - 1) * $itemsPerPage);

$current_menu = "news";
$current_sub_menu = null;
$title = "News";

// $uri_parts = explode('/', $_SERVER['REQUEST_URI']);
$slug = basename($_SERVER['REQUEST_URI']);

// Mengambil data news berdasarkan slug
$news = $newsService->getNews();
$newsContent = $newsService->getNewsBySlug($slug);

if (isset($newsContent['data'][0])) {
  $newsData = $newsContent['data'][0];
  $current_menu = $newsData['judul'];
  $current_sub_menu = $newsData['judul'];
  $title = "News - " . $newsData['judul'];

  require_once ROOT_PATH . "#include/component/header.php";
  require_once ROOT_PATH . "#include/component/navbar.php";
  require_once ROOT_PATH . "#include/component/layout/news/news-content.php";
  require_once ROOT_PATH . "#include/component/footer.php";
  exit;
}

require_once ROOT_PATH . "#include/component/header.php";
require_once ROOT_PATH . "#include/component/navbar.php";
require_once ROOT_PATH . "#include/component/layout/news/news-layout.php";
require_once ROOT_PATH . "#include/component/footer.php";
