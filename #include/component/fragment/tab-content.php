<?php
$activeCategory = $_GET['category'] ?? 'semua_kategori';
?>

<div class="tab-content">
  <div class="tab-pane active" id="<?= htmlspecialchars($activeCategory, ENT_QUOTES, 'UTF-8') ?>" role="tabpanel">
    <div class="row">
      <?php if (!empty($pagedNews)): ?>
        <?php foreach ($pagedNews as $tender): ?>
          <div class="col-md-6 align-items-stretch mb-4">
            <div class="single-job-post h-100">
              <div class="address">
                <h6><?= htmlspecialchars($tender['description'], ENT_QUOTES, 'UTF-8') ?></h6>
                <p><strong>Kategori:</strong> <?= htmlspecialchars($tender['category'], ENT_QUOTES, 'UTF-8') ?></p>
                <p>Tanggal Pendaftaran:
                  <?= htmlspecialchars(date('d-m-Y', strtotime($tender['registration_date'])), ENT_QUOTES, 'UTF-8') ?>
                  s/d
                  <?= htmlspecialchars(date('d-m-Y', strtotime($tender['closing_date'])), ENT_QUOTES, 'UTF-8') ?>
                </p>
              </div>
              <div class="button-box">
                <a href="<?= SERVER_NAME ?>vendor_area/tender/detail?id=<?= htmlspecialchars($tender['id'], ENT_QUOTES, 'UTF-8') ?>"
                  class="button button-red-outline">DETAIL</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-md-12 text-center">
          <h6>Tender tidak tersedia</h6>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>