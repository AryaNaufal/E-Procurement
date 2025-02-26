<section style="min-height: calc(100vh - 150px);">
  <!-- Search Form Start -->
  <div class="search-job-area bg-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-10 col-lg-12 ml-auto mr-auto py-5">
          <div class="job-search-content text-center">
            <h4 class="text-white mb-5">Selamat Datang di E-Procurement</h4>
            <form action="" method="GET" autocomplete="off">
              <div class="form-container">
                <?php include ROOT_PATH . '#include/component/fragment/search-category.php'; ?>
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
          <a class="nav-link active" data-bs-toggle="tab" href="#all">Semua Kategori</a>
          <a class="nav-link" data-bs-toggle="tab" href="#jasa_lain">Jasa Lainnya</a>
          <a class="nav-link" data-bs-toggle="tab" href="#barang_jasa">Pengadaan Barang &amp; Jasa</a>
          <a class="nav-link" data-bs-toggle="tab" href="#konsultasi">Jasa Konsultasi Bidang Usaha</a>
        </div>
        <!-- Tab panes -->
        <?php include  ROOT_PATH . '#include/component/fragment/tab-content.php'; ?>
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

  <!-- News Area Start -->
  <section id="article" class="blog-area pt-130 pb-100 pt-sm-60 pb-sm-30">
    <div class="container">
      <!-- Section Title Start -->
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center ">
            <h2>Info</h2>
            <p>Infor terbaru seputar E-Procurement</p>
          </div>
        </div>
      </div>
      <!-- Section Title End -->

      <div class="row">
        <?php
        if (empty($news['data'])):
          echo '<p class="text-center">No news available.</p>';
        else:
          $count = 0;
          foreach (array_slice($news['data'], -3) as $item):
            $count++;
        ?>
            <!-- Single item -->
            <div class="single-item col-lg-4 col-md-6">
              <div class="item">
                <div class="thumb">
                  <a href="<?= SERVER_NAME . "news/" . $Lib->seo_title($item['judul']); ?>"><img class="img-fluid" src="<?= SERVER_NAME . 'assets/management/images/news/' .  $item['gambar'] ?>" alt="Thumb"></a>
                  <div class="date"><strong><?= date('d', strtotime($item['created_at'])) ?></strong> <span><?= date('M', strtotime($item['created_at'])) ?></span></div>
                </div>
                <div class="info">
                  <h4 class="overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                    <a href="<?= SERVER_NAME . "news/" . $Lib->seo_title($item['judul']); ?>" aria-label="<?= $item['judul'] ?>"><?= $item['judul'] ?></a>
                  </h4>
                  <p style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                    <?= htmlspecialchars($item['isi'] ?? 'No description available.') ?>
                  </p>
                </div>
              </div>
            </div>
            <!-- End Single item -->
          <?php endforeach; ?>
        <?php endif; ?>

        <div class="d-flex justify-content-center w-100">
          <!-- Start Atribute Navigation -->
          <div style="background-color: #AA0A2F; padding: 10px 20px; border-radius: 5px;">
            <ul>
              <li class="button"><a href="<?php SERVER_NAME ?>news" class="text-white">Lihat Semua</a></li>
            </ul>
          </div>
          <!-- End Atribute Navigation -->
        </div>
        <!-- Main Nav -->
      </div>
    </div>
  </section>
  <!-- News Area End -->
</section>