<?php
session_start();

use App\KatalogService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$katalogService = new KatalogService();

$userId = $_GET['id'] ?? '';

$katalogId = $katalogService->getKatalogById($userId);

if (isset($_POST['submit_katalog'])) {
  $data = [
    'kode_produk' => $_POST['kode_produk'],
    'nama_produk' => $_POST['nama_produk'],
    'tkdn_produk' => $_POST['tkdn_produk'],
    'jenis_produk' => $_POST['jenis_produk'],
    'harga_produk' => preg_replace('/\D/', '', $_POST['harga_produk']),
    'expired_harga' => preg_replace('/\D/', '', $_POST['expired_harga']),
    'kategori_produk' => $_POST['kategori_produk'],
    'deskripsi_produk' => $_POST['deskripsi_produk'],
    'photo' => isset($_FILES['photo']) && $_FILES['photo']['error'] == 0 ? $_FILES['photo'] : null,
    'document' => isset($_FILES['document']) && $_FILES['document']['error'] == 0 ? $_FILES['document'] : null
  ];

  $result = $katalogService->putKatalog($userId, $data);

  echo "<script>alert('" . $result['message'] . "'); window.location.href = '" . SERVER_NAME . "vendor_area/user/';</script>";
}

$current_menu = "edit Katalog";
$current_sub_menu = NULL;
$title = "Edit Katalog";

require_once __DIR__ . '/../../#include/component/header.php';
require_once __DIR__ . '/../../#include/component/navbar.php';
require_once __DIR__ . '/../../#include/component/layout/vendor_area/edit-katalog.php';
require_once __DIR__ . '/../../#include/component/footer.php';
