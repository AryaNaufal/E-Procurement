<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area pt-30 pb-10 bg-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-text">
          <h2 class="text-center text-white">Edit Katalog</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Breadcrumb Banner Area-->

<!-- Modal Content -->
<div class="modal-content">
  <div class="modal-body">
    <div class="form-pop-up-content ptb-60 pl-60 pr-60">
      <form method="POST" action="" enctype="multipart/form-data">
        <?php foreach ($katalogId['data'] as $data): ?>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label style="color:black">Kode Produk</label>
              <input type="text" maxlength="150" name="kode_produk" id="kode_produk"
                value="<?= $data['kode_produk'] ?>" placeholder="Kode Produk" class="form-control" required="">
            </div>
            <div class="col-md-6 mb-3">
              <label style="color:black">Produk / Solusi</label>
              <input type="text" maxlength="150" name="nama_produk" id="produk_solusi"
                value="<?= $data['produk_solusi'] ?>" placeholder="Produk / Solusi" class="form-control" required="">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label style="color:black">TKDN Produk</label>
              <input type="text" maxlength="150" name="tkdn_produk" id="tkdn" value="<?= $data['tkdn_produk'] ?>" placeholder="TKDN Produk"
                class="form-control" required="" />
            </div>
            <div class="col-md-6 mb-3">
              <label style="color:black">Jenis</label>
              <select name="jenis_produk" id="jenis_produk" class="form-control" required="">
                <option value="">Pilih Jenis</option>
                <?php if ($data['jenis'] == 'lokal'): ?>
                  <option value="lokal" selected>Lokal</option>
                  <option value="import">Import</option>
                <?php else: ?>
                  <option value="lokal">Lokal</option>
                  <option value="import" selected>Import</option>
                <?php endif; ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label style="color:black">Harga</label>
              <input type="text" name="harga_produk" id="harga" value="<?= $data['harga'] ?>" placeholder="Harga" class="form-control"
                onkeydown="return numbersonly(this, event);">
            </div>
            <div class="col-md-6 mb-3">
              <label style="color:black">Expired Harga</label>
              <input type="text" name="expired_harga" id="expired" value="<?= $data['expired_harga'] ?>" placeholder="Expired Harga"
                class="form-control datepicker" style="background-color:white" onkeydown="return numbersonly(this, event);" step="1">
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 mb-3">
              <label style="color:black">Kategori</label>
              <select name="kategori_produk" id="kategori_katalog" class="form-control" required="">
                <option value="">Pilih Kategori</option>
                <?php if ($data['kategori'] == 'Alat Tulis Kantor'): ?>
                  <option value="Alat Tulis Kantor" selected>Alat Tulis Kantor</option>
                  <option value="Electric">Electric</option>
                  <option value="Hardware">Hardware</option>
                  <option value="Jasa Konsultasi Perorangan">Jasa Konsultasi Perorangan</option>
                  <option value="Jasa Konsultasi Perusahaan">Jasa Konsultasi Perusahaan</option>
                  <option value="Kendaraan Operasional">Kendaraan Operasional</option>
                  <option value="Peralatan Fotografi / Videografi">Peralatan Fotografi / Videografi</option>
                  <option value="Property">Property (Tanah atau Bangunan)</option>
                  <option value="Rumah Tangga Kantor">Rumah Tangga Kantor (RTK)</option>
                <?php else: ?>
                  <option value="Alat Tulis Kantor">Alat Tulis Kantor</option>
                  <?php if ($data['kategori'] == 'Electric'): ?>
                    <option value="Electric" selected>Electric</option>
                  <?php endif; ?>
                  <?php if ($data['kategori'] == 'Hardware'): ?>
                    <option value="Hardware" selected>Hardware</option>
                  <?php endif; ?>
                  <?php if ($data['kategori'] == 'Jasa Konsultasi Perorangan'): ?>
                    <option value="Jasa Konsultasi Perorangan" selected>Jasa Konsultasi Perorangan</option>
                  <?php endif; ?>
                  <?php if ($data['kategori'] == 'Jasa Konsultasi Perusahaan'): ?>
                    <option value="Jasa Konsultasi Perusahaan" selected>Jasa Konsultasi Perusahaan</option>
                  <?php endif; ?>
                  <?php if ($data['kategori'] == 'Kendaraan Operasional'): ?>
                    <option value="Kendaraan Operasional" selected>Kendaraan Operasional</option>
                  <?php endif; ?>
                  <?php if ($data['kategori'] == 'Peralatan Fotografi / Videografi'): ?>
                    <option value="Peralatan Fotografi / Videografi" selected>Peralatan Fotografi / Videografi</option>
                  <?php endif; ?>
                  <?php if ($data['kategori'] == 'Property'): ?>
                    <option value="Property" selected>Property (Tanah atau Bangunan)</option>
                  <?php endif; ?>
                  <?php if ($data['kategori'] == 'Rumah Tangga Kantor'): ?>
                    <option value="Rumah Tangga Kantor" selected>Rumah Tangga Kantor (RTK)</option>
                  <?php endif; ?>
                <?php endif; ?>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-12">
              <label style="color:black">Deskripsi</label>
              <textarea name="deskripsi_produk" id="deskripsi" placeholder="Deskripsi" class="form-control"
                required=""><?= $data['deskripsi'] ?></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <label style="color:black">Foto Produk</label>
              <?php if ($data['gambar']): ?>
                <p>Foto Lama: <a href="<?= $data['gambar'] ?>" target="_blank">Lihat Foto</a></p>
              <?php endif; ?>
              <center>
                <input type="file" name="photo">
              </center>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <label style="color:black">Dokumen</label>
              <?php if ($data['dokumen']): ?>
                <p>Dokumen Lama: <a href="<?= $data['dokumen'] ?>" target="_blank">Lihat Dokumen</a></p>
              <?php endif; ?>
              <center>
                <input type="file" name="document">
              </center>
            </div>
          </div>
        <?php endforeach; ?>

        <div class="text-center">
          <button type="submit" name="submit_katalog" class="text-uppercase">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Content -->