<style>
  table td {
    padding: 8px;
  }
</style>
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area pt-30 pb-10 bg-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-text">
          <h2 class="text-center text-white"><?= $tenders['data'][0]['description'] ?></h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Breadcrumb Banner Area-->

<!-- About Area Start -->
<div class="about-area ptb-130 ptb-sm-60" style="padding-top: 45px !important; min-height: calc(100vh - 230px);">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card" style="box-shadow: 3px 3px 3px #777;">
          <h4 class="p-4">Detail Pengadaan</h4>
          <div class="card-body">
            <div class="row">
              <?php foreach ($tenders['data'] as $data): ?>
                <div class="col-lg-6">
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">Kategori:</label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted"><?= (isset($data['category']) && !empty($data['category'])) ? htmlspecialchars($data['category']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">Deskripsi:</label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted"><?= (isset($data['description']) && !empty($data['description'])) ? htmlspecialchars($data['description']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">Metode Pengadaan:</label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted"><?= (isset($data['metode']) && !empty($data['metode'])) ? htmlspecialchars($data['metode']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">%PPN:</label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted"><?= (isset($data['ppn']) && !empty($data['ppn'])) ? htmlspecialchars($data['ppn']) : '-' ?></label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">Harga Perkiraan:</label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted"><?= (isset($data['harga_perkiraan']) && !empty($data['harga_perkiraan'])) ? htmlspecialchars($data['harga_perkiraan']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">Kualifikasi Vendor:</label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted"><?= (isset($data['address']) && !empty($data['address'])) ? htmlspecialchars($data['address']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">PPH:</label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted"><?= (isset($data['address']) && !empty($data['address'])) ? htmlspecialchars($data['address']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">Registration Date:</label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted"><?= (isset($data['registration_date']) && !empty($data['registration_date'])) ? htmlspecialchars($data['registration_date']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">Category Termin:</label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted"><?= (isset($data['address']) && !empty($data['address'])) ? htmlspecialchars($data['address']) : '-' ?></label>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12 mt-4">
        <h4 class="border-bottom border-warning pb-2 pl-2">Deskripsi</h4>
        <p>deskripsi tender</p>
      </div>
      <div class="col-lg-12 mt-4">
        <h4 class="border-bottom border-warning pb-2 pl-2">Timeline Pengadaan</h4>
        <table class="table" style="font-size: small;">
          <thead class="py-3">
            <tr>
              <td>Awal Pendaftaran</td>
              <td>Akhir Pendaftaran</td>
              <td>Prakualifikasi</td>
              <td>Aanwijizing</td>
              <td>Submit Proposal</td>
              <td>Shortlisted</td>
              <td>POC</td>
              <td>Awal Negosiasi</td>
              <td>Akhir Negosiasi</td>
              <td>PO</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>tes</td>
              <td>tes</td>
              <td>tes</td>
              <td>tes</td>
              <td>tes</td>
              <td>tes</td>
              <td>tes</td>
              <td>tes</td>
              <td>tes</td>
              <td>tes</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>