<?php
session_start();

use App\KatalogService;

require_once __DIR__ . '/../../#include/config.php';
require_once __DIR__ . '/../../#include/#class/autoload.php';

$katalogService = new KatalogService();

$data = [
  'kode_produk' => $_POST['kode_produk'],
  'nama_produk' => $_POST['nama_produk'],
  'tkdn_produk' => $_POST['tkdn_produk'],
  'jenis_produk' => $_POST['jenis_produk'],
  'harga_produk' => preg_replace('/\D/', '', $_POST['harga_produk']),
  'expired_harga' => preg_replace('/\D/', '', $_POST['expired_harga']),
  'kategori_produk' => $_POST['kategori_produk'],
  'deskripsi_produk' => $_POST['deskripsi_produk'],
  'photo' => $_FILES['photo'],
  'document' => $_FILES['document']
];

$result = $katalogService->postKatalog($data);

if ($result['status'] === 'success') {
  $response = [
    "status" => $result['status'],
    "message" => $result['message']
  ];
  echo json_encode($response);
} else {
  $response = [
    "status" => $result['status'],
    "message" => 'Katalog gagal disimpan'
  ];
  echo json_encode($response);
}
