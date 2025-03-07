<?php
$documentLabel = [
  'akta_perubahan' => 'Akta Perubahan',
  'sk_menkumham' => 'SK Menkumham',
  'ktp_pengurus_perusahaan' => 'KTP Pengurus Perusahaan',
  'surat_keterangan_domisili_perusahaan' => 'Surat Keterangan Domisili Perusahaan',
  'siup' => 'SIUP',
  'tdp' => 'TDP',
  'npwp' => 'NPWP',
  'pkp' => 'PKP',
  'spt' => 'SPT',
  'laporan_keuangan' => 'Laporan Keuangan',
  'rekening_koran' => 'Rekening Koran',
  'sertifikasi' => 'Sertifikasi',
  'list_daftar_pengalaman_kerja' => 'List Daftar Pengalaman Kerja',
  'list_tenaga_ahli' => 'List Tenaga Ahli',
  'akta_pendirian' => 'Akta Pendirian'
];
?>
<section class="tab-pane active mt-4" id="menuProfile">
  <div class="row">
    <div class="col-lg-12 mb-3">
      <div class="d-flex justify-content-between align-items-center">
        <h6>Informasi Perusahaan:</h6>
        <?php if (!empty($companies['data'])): ?>
          <a href="<?= SERVER_NAME ?>vendor_area/company/edit?id=<?= $companies['data'][0]['id'] ?>" class="btn ml-3 text-capitalize text-white" style="background-color: #AA0A2F;">Edit</a>
        <?php endif; ?>
      </div>
      <div class="card my-3 shadow-sm">
        <div class="card-body">
          <div class="row">
            <?php if (!empty($companies['data']) && $companies['status'] === 'success'): ?>
              <?php foreach ($companies['data'] as $data): ?>
                <div class="col-lg-6">
                  <?php
                  $fields = [
                    'Nama Perusahaan' => 'name',
                    'Tipe Perusahaan' => 'type',
                    'Email Perusahaan' => 'mail',
                    'No.Tlp Perusahaan' => 'phone',
                    'No.Hp Perusahaan' => 'mobile_phone'
                  ];

                  foreach ($fields as $label => $key): ?>
                    <div class="form-group mb-4 row">
                      <div class="col-lg-4">
                        <label class="text-muted fw-bold"><?= $label ?>:</label>
                      </div>
                      <div class="col-lg-8">
                        <label class="text-muted"><?= !empty($data[$key]) ? htmlspecialchars($data[$key]) : '-' ?></label>
                      </div>
                    </div>
                  <?php endforeach; ?>

                  <div class="form-group mb-4 row">
                    <div class="col-lg-4">
                      <label class="text-muted fw-bold">Status:</label>
                    </div>
                    <div class="col-lg-8">
                      <?php if (!empty($documents['data']) && $documents['status'] === 'success' && $filledDocuments === count($documentLabel)): ?>
                        <label class="text-success fw-bold">Dokumen Lengkap</label>
                      <?php else: ?>
                        <label class="text-danger fw-bold">Upload Document</label>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group mb-4 row">
                    <div class="col-lg-4">
                      <label class="text-muted fw-bold">Alamat:</label>
                    </div>
                    <div class="col-lg-8">
                      <label class="text-muted"><?= !empty($data['address']) ? htmlspecialchars($data['address']) : '-' ?></label>
                    </div>
                  </div>

                  <?php
                  $regions = [
                    'Provinsi' => 'provinsi',
                    'Kecamatan' => 'kecamatan',
                    'Kota/Kabupaten' => 'kota',
                    'Kelurahan' => 'kelurahan'
                  ];

                  foreach ($regions as $label => $key): ?>
                    <div class="form-group mb-4 row">
                      <div class="col-lg-4">
                        <label class="text-muted fw-bold"><?= $label ?>:</label>
                      </div>
                      <div class="col-lg-8">
                        <label class="text-muted"><?= !empty($data[$key]) ? htmlspecialchars($regionService->getRegionName($data[$key])) : '-' ?></label>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <!-- Empty Data Display -->
              <div class="col-lg-6">
                <?php
                $emptyFields = [
                  'Nama Perusahaan' => '-',
                  'Tipe Perusahaan' => '-',
                  'Email Perusahaan' => '-',
                  'No.Tlp Perusahaan' => '-',
                  'No.Hp Perusahaan' => '-'
                ];

                foreach ($emptyFields as $label => $value): ?>
                  <div class="form-group mb-4 row">
                    <div class="col-lg-4">
                      <label class="text-muted"><?= $label ?>:</label>
                    </div>
                    <div class="col-lg-8">
                      <label class="text-muted"><?= $value ?></label>
                    </div>
                  </div>
                <?php endforeach; ?>

                <div class="form-group mb-4 row">
                  <div class="col-lg-4">
                    <label class="text-muted" style="font-weight: bold;">Status:</label>
                  </div>
                  <div class="col-lg-8">
                    <label class="text-danger fw-bold">Upload Document</label>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <?php
                $emptyRegions = [
                  'Alamat' => '-',
                  'Provinsi' => '-',
                  'Kecamatan' => '-',
                  'Kota/Kabupaten' => '-',
                  'Kelurahan' => '-'
                ];

                foreach ($emptyRegions as $label => $value): ?>
                  <div class="form-group mb-4 row">
                    <div class="col-lg-4">
                      <label class="text-muted"><?= $label ?>:</label>
                    </div>
                    <div class="col-lg-8">
                      <label class="text-muted"><?= $value ?></label>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <h6>Informasi Dokumen Perusahaan:</h6>
  <div class="row">
    <div class="col-lg-12">
      <div class="card my-3 shadow-sm">
        <div class="card-body">

          <div class="row">
            <?php foreach ($documentLabel as $label => $value): ?>
              <div class="col-lg-4 mb-3">
                <?= $value ?>
                <?= $documents['status'] != 'error' && $documents['data'][0][$label] != null ?
                  '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>' :
                  '<i class="fa fa-times-circle text-danger" aria-hidden="true"></i>' ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>