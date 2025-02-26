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
          <a class="nav-link active" data-bs-toggle="tab" href="#all">Semua Kategori</a>
          <a class="nav-link" data-bs-toggle="tab" href="#jasa_lain">Jasa Lainnya</a>
          <a class="nav-link" data-bs-toggle="tab" href="#barang_jasa">Pengadaan Barang &amp; Jasa</a>
          <a class="nav-link" data-bs-toggle="tab" href="#konsultasi">Jasa Konsultasi Bidang Usaha</a>
        </div>
        <!-- Tab panes -->
        <?php include ROOT_PATH . '#include/component/fragment/tab-content.php'; ?>
      </div>
    </div>
  </div>
  <!-- End of Job Post Area -->
</section>