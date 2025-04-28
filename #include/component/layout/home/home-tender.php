<div class="tab-content">
    <!-- Tab Semua Kategori -->
    <div class="tab-pane active" id="all">
        <div class="row">
            <?php if (isset($tender['status']) && $tender['status'] === 'success' && !empty($tender['data'])): ?>
                <?php $tenders = array_slice($tender['data'], 0, 6); ?>
                <?php foreach ($tenders as $tender): ?>
                    <div class="col-md-6 align-items-stretch mb-4">
                        <div class="single-job-post h-100">
                            <div class="address">
                                <h6><?= htmlspecialchars($tender['description'], ENT_QUOTES, 'UTF-8') ?></h6>
                                <p>Kategori: <?= htmlspecialchars($tender['category'], ENT_QUOTES, 'UTF-8') ?></p>
                                <p>Tanggal Pendaftaran: <?= htmlspecialchars(date('d-m-Y', strtotime($tender['registration_date'])), ENT_QUOTES, 'UTF-8') ?> s/d <?= htmlspecialchars(date('d-m-Y', strtotime($tender['closing_date'])), ENT_QUOTES, 'UTF-8') ?></p>
                            </div>
                            <div class="button-box">
                                <a href="<?= SERVER_NAME ?>vendor_area/tender/detail?id=<?= $tender['id'] ?>" class="button button-red-outline">DETAIL</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-md-12 text-center">
                    <h6><?= htmlspecialchars(isset($tender['message']) ? $tender['message'] : 'Tender tidak tersedia', ENT_QUOTES, 'UTF-8') ?></h6>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Tab Jasa Lainnya -->
    <div class="tab-pane" id="jasa_lain">
        <div class="row">
            <?php if (isset($tenderLain['status']) && $tenderLain['status'] === 'success' && !empty($tenderLain['data'])): ?>
                <?php foreach ($tenderLain['data'] as $tender): ?>
                    <div class="col-md-6 align-items-stretch mb-4">
                        <div class="single-job-post h-100">
                            <div class="address">
                                <h6><?= htmlspecialchars($tender['description'], ENT_QUOTES, 'UTF-8') ?></h6>
                                <p><strong>Kategori:</strong> <?= htmlspecialchars($tender['category'], ENT_QUOTES, 'UTF-8') ?></p>
                                <p>Tanggal Pendaftaran: <?= htmlspecialchars(date('d-m-Y', strtotime($tender['registration_date'])), ENT_QUOTES, 'UTF-8') ?> s/d <?= htmlspecialchars(date('d-m-Y', strtotime($tender['closing_date'])), ENT_QUOTES, 'UTF-8') ?></p>
                            </div>
                            <div class="button-box">
                                <a href="<?= SERVER_NAME ?>vendor_area/tender/detail?id=<?= htmlspecialchars($tender['id'], ENT_QUOTES, 'UTF-8') ?>" class="button button-red-outline">DETAIL</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-md-12 text-center">
                    <h6><?= isset($tenderLain['message']) ? htmlspecialchars($tenderLain['message'], ENT_QUOTES, 'UTF-8') : 'Tender tidak tersedia' ?></h6>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Tab Pengadaan Barang & Jasa -->
    <div class="tab-pane" id="barang_jasa">
        <div class="row">
            <?php if (isset($tenderBarangJasa['status']) && $tenderBarangJasa['status'] === 'success' && !empty($tenderBarangJasa['data'])): ?>
                <?php foreach ($tenderBarangJasa['data'] as $tender): ?>
                    <div class="col-md-6 align-items-stretch mb-4">
                        <div class="single-job-post h-100">
                            <div class="address">
                                <h6><?= htmlspecialchars($tender['description'], ENT_QUOTES, 'UTF-8') ?></h6>
                                <p><strong>Kategori:</strong> <?= htmlspecialchars($tender['category'], ENT_QUOTES, 'UTF-8') ?></p>
                                <p>Tanggal Pendaftaran: <?= htmlspecialchars(date('d-m-Y', strtotime($tender['registration_date'])), ENT_QUOTES, 'UTF-8') ?> s/d <?= htmlspecialchars(date('d-m-Y', strtotime($tender['closing_date'])), ENT_QUOTES, 'UTF-8') ?></p>
                            </div>
                            <div class="button-box">
                                <a href="<?= SERVER_NAME ?>vendor_area/tender/detail?id=<?= $tender['id'] ?>" class="button button-red-outline">DETAIL</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-md-12 text-center">
                    <h6><?= isset($tenderBarangJasa['message']) ? htmlspecialchars($tenderBarangJasa['message'], ENT_QUOTES, 'UTF-8') : 'Tender tidak tersedia' ?></h6>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Tab Jasa Konsultasi Bidang Usaha -->
    <div class="tab-pane" id="konsultasi">
        <div class="row">
            <?php if (isset($tenderKonsultasi['status']) && $tenderKonsultasi['status'] === 'success' && !empty($tenderKonsultasi['data'])): ?>
                <?php foreach ($tenderKonsultasi['data'] as $tender): ?>
                    <div class="col-md-6 align-items-stretch mb-4">
                        <div class="single-job-post h-100">
                            <div class="address">
                                <h6><?= htmlspecialchars($tender['description'], ENT_QUOTES, 'UTF-8') ?></h6>
                                <p><strong>Kategori:</strong> <?= htmlspecialchars($tender['category'], ENT_QUOTES, 'UTF-8') ?></p>
                                <p>Tanggal Pendaftaran: <?= htmlspecialchars(date('d-m-Y', strtotime($tender['registration_date'])), ENT_QUOTES, 'UTF-8') ?> s/d <?= htmlspecialchars(date('d-m-Y', strtotime($tender['closing_date'])), ENT_QUOTES, 'UTF-8') ?></p>
                            </div>
                            <div class="button-box">
                                <a href="<?= SERVER_NAME ?>vendor_area/tender/detail?id=<?= $tender['id'] ?>" class="button button-red-outline">DETAIL</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-md-12 text-center">
                    <h6><?= isset($tenderKonsultasi['message']) ? htmlspecialchars($tenderKonsultasi['message'], ENT_QUOTES, 'UTF-8') : 'Tender tidak tersedia' ?></h6>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>