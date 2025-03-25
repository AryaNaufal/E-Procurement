<style>
  table td {
    padding: 8px;
  }
</style>
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area pt-94 pb-85 bg-5">
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
<section class="about-area ptb-130 ptb-sm-60" style="padding-top: 45px !important; min-height: calc(100vh - 230px);">
  <div class="container">
    <div class="d-flex justify-content-start mb-3">
      <button type="button" class="btn text-capitalize rounded text-white" style="background-color:#AA0A2F;" onclick="window.history.back()">Kembali</button>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card shadow-sm">
          <h5 class="p-4">Detail Pengadaan</h5>
          <div class="card-body px-5">
            <div class="row">
              <?php foreach ($tenders['data'] as $data): ?>
                <div class="col-lg-6">
                  <div class="form-group mb-4 row">
                    <div class="col-lg-6">
                      <label class="text-muted font-weight-bold">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        Kategori:
                      </label>
                    </div>
                    <div class="col-lg-6">
                      <label class="text-muted"><?= (isset($data['category']) && !empty($data['category'])) ? htmlspecialchars($data['category']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group mb-4 row">
                    <div class="col-lg-6">
                      <label class="text-muted font-weight-bold">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                        Spesifikasi Teknis:
                      </label>
                    </div>
                    <div class="col-lg-6">
                      <label class="text-muted"><?= (isset($data['description']) && !empty($data['description'])) ? htmlspecialchars($data['description']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group mb-4 row">
                    <div class="col-lg-6">
                      <label class="text-muted font-weight-bold">
                        <i class="fa fa-gavel" aria-hidden="true"></i>
                        Metode Pengadaan:
                      </label>
                    </div>
                    <div class="col-lg-6">
                      <label class="text-muted"><?= (isset($data['metode']) && !empty($data['metode'])) ? htmlspecialchars($data['metode']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group mb-4 row">
                    <div class="col-lg-6">
                      <label class="text-muted font-weight-bold">
                        <i class="fa fa-percent" aria-hidden="true"></i>
                        PPN:
                      </label>
                    </div>
                    <div class="col-lg-6">
                      <label class="text-muted"><?= (isset($data['ppn']) && !empty($data['ppn'])) ? htmlspecialchars($data['ppn']) : '-' ?></label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-4 row">
                    <div class="col-lg-6">
                      <label class="text-muted font-weight-bold">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        Harga Perkiraan:
                      </label>
                    </div>
                    <div class="col-lg-6">
                      <label class="text-muted"><?= (isset($data['harga_perkiraan']) && !empty($data['harga_perkiraan'])) ? htmlspecialchars($data['harga_perkiraan']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group mb-4 row">
                    <div class="col-lg-6">
                      <label class="text-muted font-weight-bold">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        Kualifikasi Vendor:
                      </label>
                    </div>
                    <div class="col-lg-6">
                      <label class="text-muted"><?= (isset($data['address']) && !empty($data['address'])) ? htmlspecialchars($data['address']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group mb-4 row">
                    <div class="col-lg-6">
                      <label class="text-muted font-weight-bold">
                        <i class="fa fa-file" aria-hidden="true"></i>
                        PPH:
                      </label>
                    </div>
                    <div class="col-lg-6">
                      <label class="text-muted"><?= (isset($data['address']) && !empty($data['address'])) ? htmlspecialchars($data['address']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group mb-4 row">
                    <div class="col-lg-6">
                      <label class="text-muted font-weight-bold">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        Registration Date:
                      </label>
                    </div>
                    <div class="col-lg-6">
                      <label class="text-muted">
                        <?= (isset($data['registration_date']) && !empty($data['registration_date'])) ? htmlspecialchars(date('d-m-Y', strtotime($data['registration_date']))) : '-' ?>
                        s/d
                        <?= (isset($data['closing_date']) && !empty($data['closing_date'])) ? htmlspecialchars(date('d-m-Y', strtotime($data['closing_date']))) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group mb-4 row">
                    <div class="col-lg-6">
                      <label class=" text-muted font-weight-bold">
                        <i class="fa fa-sliders" aria-hidden="true"></i>
                        Category Termin:
                      </label>
                    </div>
                    <div class="col-lg-6">
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
        <h5 class="border-bottom border-warning pb-2 pl-2">Deskripsi</h5>
        <p>deskripsi tender</p>
      </div>
      <div class="col-lg-12 mt-4">
        <h5 class="border-bottom border-warning pb-2 pl-2">Timeline Pengadaan</h5>
        <div id="timeline">
          <table class="table" style="font-size: small;">
            <thead class="py-3 font-weight-bold">
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
                <?php if (isset($timeline['data'][0])): ?>
                  <?php for ($i = 3; $i < count($timeline['data'][0]); $i++): ?>
                    <?php $key = array_keys($timeline['data'][0])[$i];
                    $value = $timeline['data'][0][$key]; ?>
                    <td><?= $value ?></td>
                  <?php endfor; ?>
                <?php endif; ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <?php if ($checkFollowedTender == false): ?>
        <?php if (isset($data['closing_date']) && strtotime($data['closing_date']) > time()): ?>
          <div class="w-100 d-flex justify-content-center">
            <button type="submit" id="submit-tender-btn" class="text-white rounded" style="background-color: orange;">Submit</button>
          </div>
        <?php endif; ?>
      <?php else: ?>
        <div class="w-100 d-flex flex-column align-items-center justify-content-center mt-5">
          <img src="<?= SERVER_NAME ?>assets/images/success.svg" alt="" style="width: 40%;">
          <h4>Anda sudah terdaftar pada pengadaan ini.</h4>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<script>
  document.getElementById('submit-tender-btn')?.addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah form submission tradisional
    const tenderId = new URLSearchParams(window.location.search).get('id');
    Swal.fire({
      title: 'Submit Pengadaan',
      text: "Apakah kamu ingin submit pengadaan ini?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#007bff',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        // Tampilkan loading
        document.getElementById('loader').style.display = 'block';
        fetch(`<?= SERVER_NAME ?>handler/submit_tender?id=${tenderId}&participant_id=<?= isset($_SESSION['id']) ? $_SESSION['id'] : '' ?>&tender_id=<?= $_GET['id'] ?>`, {
            method: 'POST',
            credentials: 'include'
          })
          .then(response => response.json())
          .then(data => {
            document.getElementById('loader').style.display = 'none';
            if (data.status === 'success') {
              Swal.fire({
                title: 'Berhasil',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'OK'
              }).then(() => {
                window.location.href = '<?= SERVER_NAME ?>vendor_area/user/';
              });
            } else {
              Swal.fire({
                title: 'Error',
                text: data.message,
                icon: 'error',
                confirmButtonText: 'OK'
              });
            }
          })
          .catch(error => {
            document.getElementById('loader').style.display = 'none';
            Swal.fire({
              title: 'Gagal',
              text: 'Terjadi kesalahan saat menghubungi server.',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          });
      }
    });
  });
</script>