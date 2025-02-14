<?php
session_start();

include_once __DIR__ . "/#include/config.php";
include_once __DIR__ . "/#include/#class/autoload.php";

use App\LoadEnv;
use App\NewsService;

$env = new LoadEnv(ROOT_PATH . '.env');
$newsService = new NewsService();

// Pagination
$newsPerPage = 4;
$totalNews = count($newsService->getNews()['data']);
$totalPages = ceil($totalNews / $newsPerPage);

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$currentPage = max(1, min($totalPages, $currentPage));

$offset = ($currentPage - 1) * $newsPerPage;
$news = array_slice($newsService->getNews()['data'], $offset, $newsPerPage);


$current_menu = "news";
$current_sub_menu = NULL;
$title = "News";

include_once __DIR__ . "/#include/component/header.php";
include_once __DIR__ . "/#include/component/navbar.php";
include_once __DIR__ . "/#include/component/layout/news.php";
include_once __DIR__ . "/#include/component/footer.php";
