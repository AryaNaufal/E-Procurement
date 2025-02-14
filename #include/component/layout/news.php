<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area pt-30 pb-10 bg-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-text">
          <h2 class="text-center">Info</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Breadcrumb Banner Area-->

<!--Start of Blog Area-->
<div class="blog-area pt-130 pb-120 ptb-sm-60">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <div class="blog-posts">
          <div class="row">
            <!-- Single Item Start -->
            <?php foreach ($news as $n): ?>
              <div class="col-lg-6 col-md-6">
                <div class="single-blog shadow-lg rounded">
                  <div class="blog-image box-hover">
                    <a href="news/<?= strtolower(str_replace(' ', '-', $n['judul'])) ?>" class="block">
                      <img src="assets/management/images/news/<?= $n['gambar'] ?>" alt="" class="rounded-top">
                    </a>
                  </div>
                  <div class="blog-text px-3 pb-2">
                    <h4><a href="news/<?= strtolower(str_replace(' ', '-', $n['judul'])) ?>"><?= $n['judul'] ?></a></h4>
                    <div class="blog-post-info">
                      <span><i class="zmdi zmdi-calendar-check mr-10"></i><?= date('d-m-Y', strtotime($n['created_at'])) ?></span>
                    </div>
                    <p class="" style="
                    display: -webkit-box;
                    -webkit-line-clamp: 3;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    text-overflow: ellipsis;"><?= $n['isi'] ?></p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <!-- Single Item End -->
          </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-content text-center block">
          <ul class="pagination fix">
            <?php if ($currentPage > 1): ?>
              <li><a href="?page=<?= $currentPage - 1 ?>"><i class="zmdi zmdi-long-arrow-left"></i></a></li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
              <li class="<?= $i === $currentPage ? 'current' : '' ?>"><a href="?page=<?= $i ?>"><?= $i ?></a></li>
            <?php endfor; ?>
            <?php if ($currentPage < $totalPages): ?>
              <li><a href="?page=<?= $currentPage + 1 ?>"><i class="zmdi zmdi-long-arrow-right"></i></a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>

      <!-- Sidebar with recent posts (optional) -->
      <div class="col-lg-3 sidebar-right">
        <div class="single-sidebar-widget mb-48">
          <div class="sidebar-widget-title">
          </div>
          <div class="search-container">
            <form action="news/search_news" method="post">
              <input type="text" placeholder="Cari Info" name="src_news" />
              <button type="submit">Search</button>
            </form>
          </div>
        </div>

        <div class="single-sidebar-widget mb-48">
          <div class="sidebar-widget-title">
            <h4><span>Info Terbaru</span></h4>
          </div>
          <div class="recent-posts">
            <div class="recent-post-item ptb-20">
              <h5 class="mb-6"><a href="news/pemilihan-katalog-lokal-elektronik-pekerjaan-utilitas-jalan">Pemilihan Katalog Lokal Elektronik Pekerjaan Utilitas Jalan</a></h5>
              <span class="block"><i class="zmdi zmdi-calendar-check mr-10"></i> 26/08/2020 14:08:38</span>
            </div>
            <div class="recent-post-item ptb-20">
              <h5 class="mb-6"><a href="news/penjelasan-katalog-elektronik-lokal-komoditas-utilitas-tahap-i">Penjelasan Katalog Elektronik Lokal Komoditas Utilitas Tahap I</a></h5>
              <span class="block"><i class="zmdi zmdi-calendar-check mr-10"></i> 26/08/2020 14:07:47</span>
            </div>
            <div class="recent-post-item ptb-20">
              <h5 class="mb-6"><a href="news/bahp-dan-penetapan-ulang-pemilihan">BAHP dan Penetapan Ulang Pemilihan</a></h5>
              <span class="block"><i class="zmdi zmdi-calendar-check mr-10"></i> 26/08/2020 14:08:57</span>
            </div>
            <div class="recent-post-item ptb-20">
              <h5 class="mb-6"><a href="news/pemberitahuan-maintenance">Pemberitahuan Maintenance</a></h5>
              <span class="block"><i class="zmdi zmdi-calendar-check mr-10"></i> 26/08/2020 14:08:10</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Blog Area-->