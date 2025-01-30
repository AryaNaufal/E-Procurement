<?php

namespace App;

class LoadEnv
{
  private $env;

  public function __construct($path = ROOT_PATH . '.env')
  {
    if (!file_exists($path)) {
      throw new \Exception("File .env tidak ditemukan");
    }

    // Membaca file .env secara manual
    $this->env = [];
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
      // Mengabaikan komentar dan baris kosong
      if (strpos($line, '#') === 0) {
        continue;
      }

      // Memisahkan key dan value berdasarkan tanda "="
      list($key, $value) = explode('=', $line, 2);
      $this->env[trim($key)] = trim($value);
    }
  }

  public function get($key)
  {
    // Mengecek apakah key ada dalam array
    if (array_key_exists($key, $this->env)) {
      return $this->env[$key];
    }

    // Jika key tidak ada, bisa return null atau pesan error
    throw new \Exception("Key '$key' tidak ditemukan dalam file .env");
  }
}
