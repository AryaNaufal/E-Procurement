<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area pt-94 pb-85 bg-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-text mb-5">
          <h2 class="text-center">Pengadaan</h2>
        </div>
        <div class="job-search-content text-center">
          <form action="tender.html" method="get"
            autocomplete="on">
            <div class="form-container">
              <?php include 'fragment/search-category.php'; ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Breadcrumb Banner Area-->

<!--Start of Job Post Area-->
<div class="job-post-area pt-130 pb-100 pt-sm-60 pb-sm-30">
  <div class="container">
    <!-- Section Title Start -->
    <div class="row">
      <div class="col-md-12">
        <div class="section-title text-center">
          <h2>Pengadaan Baru</h2>
          <p>List tender terbaru pada eproc E-Procurement</p>
        </div>
      </div>
    </div>
    <!-- Section Title End -->
    <div class="all-job-post">
      <!-- Nav tabs -->
      <div class="post-tab nav">
        <a class="nav-link active" data-toggle="tab" href="#all">Semua Kategori</a>
        <a class="nav-link" data-toggle="tab" href="#jasa_lain">Jasa Lainnya</a>
        <a class="nav-link" data-toggle="tab" href="#barang_jasa">Pengadaan Barang &amp; Jasa</a>
        <a class="nav-link" data-toggle="tab" href="#konsultasi">Jasa Konsultasi Bidang Usaha</a>

      </div>
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="all">
          <div class="row">
            <?php if (isset($tenders['status']) && $tenders['status'] === 'success' && !empty($tenders['data'])): ?>
              <?php foreach ($tenders['data'] as $tender): ?>
                <div class="col-md-6 align-items-stretch mb-4">
                  <div class="single-job-post h-100">
                    <div class="address">
                      <h6><?= htmlspecialchars($tender['description'], ENT_QUOTES, 'UTF-8') ?></h6>
                      <p>Kategori: <?= htmlspecialchars($tender['category'], ENT_QUOTES, 'UTF-8') ?></p>
                      <p>Tanggal Pendaftaran: <?= htmlspecialchars($tender['registration_date'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($tender['closing_date'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                    <div class="button-box">
                      <a href="<?= SERVER_NAME ?>vendor_area/tender/detail/<?= $tender['id'] ?>" class="button button-black">DETAIL</a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="col-md-12">
                <center>
                  <h6><?= htmlspecialchars(isset($tenders['message']) ? $tenders['message'] : 'Tender tidak tersedia', ENT_QUOTES, 'UTF-8') ?></h6>
                </center>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="tab-pane" id="jasa_lain">
          <div class="row">
            <?php if (isset($tenderLain['status']) && $tenderLain['status'] === 'success' && !empty($tenderLain['data'])): ?>
              <?php foreach ($tenderLain['data'] as $tender): ?>
                <div class="col-md-6 d-flex align-items-stretch mb-4">
                  <div class="single-job-post h-100">
                    <div class="address">
                      <h6><?= htmlspecialchars($tender['description'], ENT_QUOTES, 'UTF-8') ?></h6>
                      <p><strong>Kategori:</strong> <?= htmlspecialchars($tender['category'], ENT_QUOTES, 'UTF-8') ?></p>
                      <p>Tanggal Pendaftaran: <?= htmlspecialchars($tender['registration_date'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($tender['closing_date'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                    <div class="button-box">
                      <a href="<?= SERVER_NAME ?>vendor_area/tender/detail/<?= $tender['id'] ?>" class="button button-black">DETAIL</a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="col-md-12">
                <center>
                  <h6><?= htmlspecialchars(isset($tenderLain['message']) ? $tenderLain['message'] : 'Tender tidak tersedia', ENT_QUOTES, 'UTF-8') ?></h6>
                </center>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="tab-pane" id="barang_jasa">
          <div class="row">
            <?php if (isset($tenderBarangJasa['status']) && $tenderBarangJasa['status'] === 'success' && !empty($tenderBarangJasa['data'])): ?>
              <?php foreach ($tenderBarangJasa['data'] as $tender): ?>
                <div class="col-md-6 align-items-stretch mb-4">
                  <div class="single-job-post h-100">
                    <div class="address">
                      <h6><?= htmlspecialchars($tender['description'], ENT_QUOTES, 'UTF-8') ?></h6>
                      <p><strong>Kategori:</strong> <?= htmlspecialchars($tender['category'], ENT_QUOTES, 'UTF-8') ?></p>
                      <p>Tanggal Pendaftaran: <?= htmlspecialchars($tender['registration_date'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($tender['closing_date'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                    <div class="button-box">
                      <a href="<?= SERVER_NAME ?>vendor_area/tender/detail/<?= $tender['id'] ?>" class="button button-black">DETAIL</a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="col-md-12">
                <center>
                  <h6><?= htmlspecialchars(isset($tenderBarangJasa['message']) ? $tenderBarangJasa['message'] : 'Tender tidak tersedia', ENT_QUOTES, 'UTF-8') ?></h6>
                </center>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="tab-pane" id="konsultasi">
          <div class="row">
            <?php if (isset($tenderKonsultasi['status']) && $tenderKonsultasi['status'] === 'success' && !empty($tenderKonsultasi['data'])): ?>
              <?php foreach ($tenderKonsultasi['data'] as $tender): ?>
                <div class="col-md-6 align-items-stretch mb-4">
                  <div class="single-job-post h-100">
                    <div class="address">
                      <h6><?= htmlspecialchars($tender['description'], ENT_QUOTES, 'UTF-8') ?></h6>
                      <p><strong>Kategori:</strong> <?= htmlspecialchars($tender['category'], ENT_QUOTES, 'UTF-8') ?></p>
                      <p>Tanggal Pendaftaran: <?= htmlspecialchars($tender['registration_date'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($tender['closing_date'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                    <div class="button-box">
                      <a href="<?= SERVER_NAME ?>vendor_area/tender/detail/<?= $tender['id'] ?>" class="button button-black">DETAIL</a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="col-md-12">
                <center>
                  <h6><?= htmlspecialchars(isset($tenderKonsultasi['message']) ? $tenderKonsultasi['message'] : 'Tender tidak tersedia', ENT_QUOTES, 'UTF-8') ?></h6>
                </center>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End of Job Post Area -->