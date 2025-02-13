<?php
$category = $_GET['category'] ?? '';
?>
<div class="box-select">
  <div>
    <select name="category" class="select-category">
      <option <?= $category == 'semua_kategori' ? 'selected' : '' ?> value="semua_kategori">Semua Kategori</option>
      <option <?= $category == 'jasa_lain' ? 'selected' : '' ?> value="jasa_lain">Jasa Lainnya</option>
      <option <?= $category == 'pegadaan_barang' ? 'selected' : '' ?> value="pegadaan_barang">Pengadaan Barang &amp; Jasa</option>
      <option <?= $category == 'jasa_konsultasi' ? 'selected' : '' ?> value="jasa_konsultasi">Jasa Konsultasi Bidang Usaha</option>
    </select>
  </div>
  <div class="select">
    <div class="form-box fix">
      <input style="height: 45px;" type="text" name="keyword" placeholder="Keyword" value="<?= htmlspecialchars($_POST['keyword'] ?? '', ENT_QUOTES) ?>">
    </div>
  </div>
  <div class="select">
    <button type="submit">Cari</button>
  </div>
</div>