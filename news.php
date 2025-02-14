<?php
session_start();

include_once __DIR__ . "/#include/config.php";
include_once __DIR__ . "/#include/#class/autoload.php";

use App\LoadEnv;
use App\NewsService;

$env = new LoadEnv(ROOT_PATH . '.env');
$newsService = new NewsService();
$news = $newsService->getNews()['data'];

// Pagination
define('ARTICLE_PATH', SERVER_NAME . 'news/');
$newsPerPage = 3;
$totalArticles = count($news);
$totalPages = ceil($totalArticles / $newsPerPage);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, min($totalPages, $page));

$offset = ($page - 1) * $newsPerPage;

// Fetch articles for the current page
$news = array_slice($news, $offset, $newsPerPage);

$current_menu = "news";
$current_sub_menu = NULL;
$title = "News";

include_once __DIR__ . "/#include/component/header.php";
include_once __DIR__ . "/#include/component/navbar.php";
include_once __DIR__ . "/#include/component/layout/news.php";
include_once __DIR__ . "/#include/component/footer.php";
