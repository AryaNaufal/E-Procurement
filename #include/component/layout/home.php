  <!-- Search Form Start -->
  <div class="search-job-area bg-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-10 col-lg-12 ml-auto mr-auto py-5">
          <div class="job-search-content text-center">
            <h4 class="text-white mb-5">Selamat Datang di E-Procurement</h4>
            <form action="" method="GET" autocomplete="off">
              <div class="form-container">
                <?php include __DIR__ . '/../fragment/search-category.php'; ?>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--Start of Fun Factor Area-->
      <div class="fun-factor-area bg-1 text-center ptb-20 pt-sm-20 pb-sm-20">
        <div class="row">
          <div class="col-md-3 col-6">
            <div class="single-fun-factor">
              <h1><span><?= isset($tenders['data']) ? count($tenders['data']) : 0 ?></span></h1>
              <h3>Semua Tender</h3>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="single-fun-factor">
              <h1><span><?= isset($tenders['data']) ? $tenderBaru : 0 ?></span></h1>
              <h3>Tender Baru</h3>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="single-fun-factor">
              <h1><span><?= isset($tenders['data']) ? $tenderSelesai : 0 ?></span></h1>
              <h3>Tender Selesai</h3>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="single-fun-factor">
              <h1><span>0</span></h1>
              <h3>Vendor</h3>
            </div>
          </div>
        </div>
      </div>
      <!--End of Fun Factor Area-->
    </div>
  </div>
  <!-- Search Form End -->

  <!--Start of Job Post Area-->
  <div class="job-post-area pb-100 pb-sm-35 pt-5">
    <div class="container">
      <!-- Section Title Start -->
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center">
            <h2>Informasi Tender</h2>
            <p>List tender terbaru pada E-Procurement</p>
          </div>
        </div>
      </div>
      <!-- Section Title End -->
      <div class="all-job-post">
        <!-- Nav tabs -->
        <div class="post-tab nav mb-5">
          <a class="nav-link active" data-toggle="tab" href="#all">Semua Kategori</a>
          <a class="nav-link" data-toggle="tab" href="#jasa_lain">Jasa Lainnya</a>
          <a class="nav-link" data-toggle="tab" href="#barang_jasa">Pengadaan Barang &amp; Jasa</a>
          <a class="nav-link" data-toggle="tab" href="#konsultasi">Jasa Konsultasi Bidang Usaha</a>
        </div>
        <!-- Tab panes -->
        <?php include __DIR__ . '/../fragment/tab-content.php'; ?>
      </div>
    </div>
  </div>
  <!-- End of Job Post Area -->

  <!-- Working Aera Start -->
  <div class="woring-area pt-130 pb-100 pt-sm-60 pb-sm-30">
    <div class="container">
      <!-- Section Title Start -->
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center ">
            <h2>Tata Cara Tender</h2>
            <p>Berikut tata cara mengikuti tender</p>
          </div>
        </div>
      </div>
      <!-- Section Title End -->
      <div class="row work-shap">
        <div class="col-md-4">
          <div class="work-item">
            <div class="img-icon">
              <img src="<?= SERVER_NAME ?>assets/images/icons/wrk1.png" alt="">
            </div>
            <h5>Daftar Akun</h5>
            <p>Membuat akun baru untuk mengikuti tender.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-item">
            <div class="img-icon">
              <img src="<?= SERVER_NAME ?>assets/images/icons/wrk2.png" alt="">
            </div>
            <h5>Kelengkapan Berkas</h5>
            <p>Setelah memiliki akun, harap melengkapi berkas/dokumen legalitas perusahaan, sebagai persyaratan mengikuti tender.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-item">
            <div class="img-icon">
              <img src="<?= SERVER_NAME ?>assets/images/icons/wrk3.png" alt="">
            </div>
            <h5>Submit Tender</h5>
            <p>Setelah berkas/dokumen lengkap dan sudah terverifikasi.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Working Aera End -->