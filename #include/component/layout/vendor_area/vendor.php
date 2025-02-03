<?php include_once __DIR__ . '/../../fragment/breadcrumb-banner.php'; ?>

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