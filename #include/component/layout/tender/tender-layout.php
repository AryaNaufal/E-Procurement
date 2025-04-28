<section style="min-height: calc(100vh - 150px);">
  <!--Breadcrumb Banner Area Start-->
  <div class="breadcrumb-banner-area pt-94 pb-85 bg-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-text mb-5">
            <h2 class="text-center text-white">Pengadaan</h2>
          </div>
          <div class="job-search-content text-center">
            <form action="" method="GET" autocomplete="off">
              <div class="form-container">
                <?php include ROOT_PATH . '#include/component/fragment/search-category.php'; ?>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End of Breadcrumb Banner Area-->

  <!--Start of Job Post Area-->
  <div class="job-post-area pt-130 pb-100 pb-sm-35 pt-5">
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
        <div class="post-tab nav mb-5">
          <!-- <a class="nav-link active" data-bs-toggle="tab" href="#all">Semua Kategori</a> -->
          <!-- <a class="nav-link" data-bs-toggle="tab" href="#jasa_lain">Jasa Lainnya</a> -->
          <!-- <a class="nav-link" data-bs-toggle="tab" href="#barang_jasa">Pengadaan Barang &amp; Jasa</a> -->
          <!-- <a class="nav-link" data-bs-toggle="tab" href="#konsultasi">Jasa Konsultasi Bidang Usaha</a> -->

          <a class="nav-link <?= $categoryParam === 'semua_kategori' || $categoryParam === '' ? 'active' : '' ?>" href="?category=semua_kategori&page=1">Semua Kategori</a>
          <a class="nav-link <?= $categoryParam === 'jasa_lain' ? 'active' : '' ?>" href="?category=jasa_lain&page=1">Jasa Lainnya</a>
          <a class="nav-link <?= $categoryParam === 'barang_jasa' ? 'active' : '' ?>" href="?category=barang_jasa&page=1">Pengadaan Barang &amp; Jasa</a>
          <a class="nav-link <?= $categoryParam === 'jasa_konsultasi' ? 'active' : '' ?>" href="?category=jasa_konsultasi&page=1">Jasa Konsultasi Bidang Usaha</a>


        </div>
        <!-- Tab panes -->
        <?php include ROOT_PATH . '#include/component/fragment/tab-content.php'; ?>
      </div>


      <?php
      $categoryQuery = isset($_GET['category']) ? htmlspecialchars($_GET['category'], ENT_QUOTES) : '';
      $keywordQuery = isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword'], ENT_QUOTES) : '';
      ?>

      <!-- Pagination -->
      <div class="row">
        <div class="col-md-12 pagi-area text-center">
          <nav aria-label="pagination">
            <ul class="pagination">
              <!-- Previous Page -->
              <?php if ($page > 1): ?>
                <li class="page-item">
                  <a class="page-link"
                    href="?category=<?= $categoryQuery ?>&keyword=<?= urlencode($keywordQuery) ?>&page=<?= $page - 1; ?>"
                    aria-label="Previous">
                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                  </a>
                </li>
              <?php endif; ?>

              <!-- Page Numbers -->
              <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                  <a class="page-link"
                    href="?category=<?= $categoryQuery ?>&keyword=<?= urlencode($keywordQuery) ?>&page=<?= $i; ?>"
                    aria-label="Page <?= $i; ?>">
                    <?= $i; ?>
                  </a>
                </li>
              <?php endfor; ?>

              <!-- Next Page -->
              <?php if ($page < $totalPages): ?>
                <li class="page-item">
                  <a class="page-link"
                    href="?category=<?= $categoryQuery ?>&keyword=<?= urlencode($keywordQuery) ?>&page=<?= $page + 1; ?>"
                    aria-label="Next">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </nav>
        </div>
      </div>



    </div>
  </div>
  <!-- End of Job Post Area -->
</section>