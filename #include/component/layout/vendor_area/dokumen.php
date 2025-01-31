<?php include_once __DIR__ . '/../../fragment/breadcrumb-banner.php'; ?>

<!-- About Area Start -->
<div class="about-area ptb-130 ptb-sm-60" style="padding-top: 45px !important;">
  <div class="container">
    <div class="row">
      <?php include_once __DIR__ . '/../../fragment/breadcrumb-nav.php'; ?>
      <div class="col-lg-12">
        <div class="tab-content">
          <p>Username: <?= $_SESSION['username']; ?></p>
          <p>Email: <?= $_SESSION['email']; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>