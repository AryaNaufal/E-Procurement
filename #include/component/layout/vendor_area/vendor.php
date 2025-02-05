<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area pt-30 pb-10 bg-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-text">
          <h2 class="text-center text-white">Vendor Information</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Breadcrumb Banner Area-->

<!-- About Area Start -->
<div class="about-area ptb-130 ptb-sm-60" style="padding-top: 45px !important;">
  <div class="container">
    <div class="row">
      <?php include_once __DIR__ . '/../../fragment/breadcrumb-nav.php'; ?>
      <div class="col-lg-12">
        <div class="tab-content">
          <?php
          include_once __DIR__ . '/profile.php';
          include_once __DIR__ . '/data-perusahaan.php';
          include_once __DIR__ . '/dokumen.php';
          include_once __DIR__ . '/e-katalog.php';
          include_once __DIR__ . '/pengadaan.php';
          ?>
        </div>
      </div>
    </div>
  </div>
</div>