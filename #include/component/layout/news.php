<section class="blog-area" style="min-height: calc(100vh - 150px);">
  <div class="container pt-3 pb-5">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color: transparent; font-weight: 600;">
          <li><a href="<?= SERVER_NAME ?>" style="color: #383838;">home</a></li>
          <span class="mx-2"> > </span>
          <li class="fw-bold" style="color: #AA0A2F;"><?= htmlspecialchars($current_menu) ?></li>
        </ol>
      </nav>
    </div>
    <div class="blog-items content-less px-3">
      <div class="blog-content">
        <div class="blog-item-box">
          <div class="row">
            <?php if ($pagedNews !== null && !empty($pagedNews)): ?>
              <?php foreach ($pagedNews as $item): ?>
                <!-- Single Item -->
                <div class="col-lg-4 col-md-6 single-item">
                  <div class="item">
                    <div class="thumb">
                      <a href="<?= SERVER_NAME . 'news/' . $Lib->seo_title($item['judul']); ?>">
                        <?php if (isset($item['gambar'])): ?>
                          <img src="<?= SERVER_NAME . 'assets/management/images/news/' . htmlspecialchars($item['gambar']); ?>" alt="Thumb"
                            style="width: 100%; height: 200px; object-fit: cover;">
                        <?php endif; ?>
                      </a>
                      <div class="date"><strong><?= date('d', strtotime($item['created_at'])) ?></strong> <span><?= date('M', strtotime($item['created_at'])) ?></span></div>
                    </div>
                    <div class="info">
                      <h4
                        style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                        <a href="<?= SERVER_NAME . 'news/' . $Lib->seo_title($item['judul']); ?>" aria-label="<?= htmlspecialchars($item['judul']); ?>">
                          <?= htmlspecialchars($item['judul']); ?>
                        </a>
                      </h4>
                      <p
                        style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                        <?= htmlspecialchars($item['isi'] ?? 'No description available.'); ?>
                      </p>
                      <a class="btn circle btn-theme-border btn-sm" href="<?= SERVER_NAME . 'news/' . $Lib->seo_title($item['judul']); ?>">
                        Lihat Selengkapnya
                      </a>
                    </div>
                  </div>
                </div>
                <!-- End Single Item -->
              <?php endforeach; ?>
            <?php else: ?>
              <p style="padding-left: 1.9rem;">No news available.</p>
            <?php endif; ?>
          </div>

          <!-- Pagination -->
          <div class="row">
            <div class="col-md-12 pagi-area text-center">
              <nav aria-label="pagination">
                <ul class="pagination">
                  <!-- Previous Page -->
                  <?php if ($page > 1): ?>
                    <li class="page-item">
                      <a class="page-link" href="?page=<?= $page - 1; ?>" aria-label="Previous">
                        <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                      </a>
                    </li>
                  <?php endif; ?>

                  <!-- Page Numbers -->
                  <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                      <a class="page-link" href="?page=<?= $i; ?>" aria-label="Page <?= $i; ?>"><?= $i; ?></a>
                    </li>
                  <?php endfor; ?>

                  <!-- Next Page -->
                  <?php if ($page < $totalPages): ?>
                    <li class="page-item">
                      <a class="page-link" href="?page=<?= $page + 1; ?>" aria-label="Next">
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
    </div>
  </div>
</section>