<!-- Start Blog -->
<section class="blog-area single">
  <div class="container pt-3 pb-5" style="min-height: calc(100vh - 150px);">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb" style="background-color: transparent; font-weight: 600;">
        <li><a href="<?= SERVER_NAME ?>" style="color: #383838;">home</a></li>
        <span class="mx-2"> > </span>
        <li><a href="<?= SERVER_NAME ?>news" style="color: #383838;">news</a></li>
        <span class="mx-2"> > </span>
        <li class="fw-bold" style="color: #AA0A2F;"><?= htmlspecialchars($current_menu) ?></li>
      </ol>
    </nav>
    <div class="blog-items">
      <div class="row">
        <div class="blog-content col-lg-8 col-md-12">
          <div class="item">
            <div class="blog-item-box">
              <div class="thumb">
                <a href="#"><img src="<?= SERVER_NAME . 'assets/management/images/news/' . htmlspecialchars($newsData['gambar']); ?>" alt="Thumb" class="w-100"></a>
                <div class="date"><strong><?= date('d', strtotime(htmlspecialchars($newsData['created_at']))) ?></strong> <span><?= date('M', strtotime(htmlspecialchars($newsData['created_at']))) ?></span></div>
              </div>
              <div class="info">
                <h4>
                  <a href="#" title="<?= htmlspecialchars($newsData['judul']) ?>"><?= htmlspecialchars($newsData['judul']) ?></a>
                </h4>
                <div class="content">
                  <p><?= htmlspecialchars($newsData['isi']) ?></p>
                </div>

              </div>
            </div>
          </div>

          <!-- Start Post Pagination -->
          <div class="post-pagi-area pb-5 px-3">
            <?php
            $previousNews = null;
            $nextNews = null;
            foreach ($news['data'] as $key => $newsItem) {
              if ($newsItem['judul'] === $newsData['judul']) {
                $previousNews = (isset($news['data'][$key - 1]) ? $news['data'][$key - 1] : null);
                $nextNews = (isset($news['data'][$key + 1]) ? $news['data'][$key + 1] : null);
                break;
              }
            }
            ?>

            <?php if (isset($previousNews)): ?>
              <a href="<?= SERVER_NAME . "news/" . $Lib->seo_title(htmlspecialchars($previousNews['judul'])); ?>" style="max-width: 200px;">
                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                Previous Post
                <h5 class="overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"><?= htmlspecialchars($previousNews['judul']); ?></h5>
              </a>
            <?php endif; ?>
            <?php if (isset($nextNews)): ?>
              <a href="<?= SERVER_NAME . "news/" . $Lib->seo_title($nextNews['judul']); ?>" style="max-width: 200px;">
                Next Post <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <h5 class="overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"><?= htmlspecialchars($nextNews['judul']); ?></h5>
              </a>
            <?php endif; ?>
          </div>
          <!-- End Post Pagination -->
        </div>
        <!-- Start Sidebar -->
        <div class="sidebar col-lg-4 col-md-12" style="
          position: sticky;
          overflow-y: auto;
          top: 135px;
          max-height: calc(97vh - 135px);
          scrollbar-width: thin;
          scrollbar-color: var(--color-primary) var(--color-background);
          padding-top: 20px;
          padding-bottom: 20px;
        " onscroll="this.style.boxShadow = this.scrollTop === 0 ? '0px -4px 4px -4px rgba(0, 0, 0, 0.3) inset' :  '0px 4px 4px -4px rgba(0, 0, 0, 0.3) inset';">
          <aside>
            <div class="sidebar-item recent-post">
              <div class="title">
                <h4>Postingan Terbaru</h4>
              </div>
              <ul>
                <?php foreach (array_slice($news['data'], -3) as $newsItem): ?>
                  <li>
                    <div class="thumb">
                      <a href="<?= SERVER_NAME . "news/" . $Lib->seo_title(htmlspecialchars($newsItem['judul'])); ?>">
                        <img src="<?= SERVER_NAME . 'assets/management/images/news/' . $newsItem['gambar'] ?>" alt="Thumb">
                      </a>
                    </div>
                    <div class="info">
                      <div class="meta-title">
                        <span class="post-date"><?= date('d-m-Y', strtotime(htmlspecialchars($newsItem['created_at']))); ?></span>
                      </div>
                      <a href="<?= SERVER_NAME . "news/" . $Lib->seo_title(htmlspecialchars($newsItem['judul'])); ?>" title="<?= htmlspecialchars($newsItem['judul']) ?>"><?= htmlspecialchars($newsItem['judul']) ?></a>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="sidebar-item category">
              <div class="title">
                <h4>daftar kategori</h4>
              </div>
              <div class="sidebar-info">
                <ul>
                  <li>
                    <a href="#">national <span>69</span></a>
                  </li>
                  <li>
                    <a href="#">national <span>25</span></a>
                  </li>
                  <li>
                    <a href="#">sports <span>18</span></a>
                  </li>
                  <li>
                    <a href="#">megazine <span>37</span></a>
                  </li>
                  <li>
                    <a href="#">health <span>12</span></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="sidebar-item tags">
              <div class="title">
                <h4>tagar</h4>
              </div>
              <div class="sidebar-info">
                <ul>
                  <li><a href="#">Fashion</a>
                  </li>
                  <li><a href="#">Education</a>
                  </li>
                  <li><a href="#">nation</a>
                  </li>
                  <li><a href="#">study</a>
                  </li>
                  <li><a href="#">health</a>
                  </li>
                  <li><a href="#">food</a>
                  </li>
                  <li><a href="#">travel</a>
                  </li>
                  </li>
                </ul>
              </div>
            </div>
          </aside>
        </div>
        <!-- End Start Sidebar -->
      </div>
    </div>
  </div>
  </div>
  <!-- End Blog -->