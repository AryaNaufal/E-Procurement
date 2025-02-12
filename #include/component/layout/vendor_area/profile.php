<div class="tab-pane container active mt-4" id="menuProfile">
  <div class="row">
    <div class="col-lg-12 mb-3">
      <label>Informasi Perusahaan</label>
      <div class="card my-3" style="box-shadow: 3px 3px 3px #777;">
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
                    <div class="form-group row">
                      <div class="col-lg-4">
                        <label class="text-muted"><?= $label ?>:</label>
                      </div>
                      <div class="col-lg-4">
                        <label class="text-muted"><?= !empty($data[$key]) ? htmlspecialchars($data[$key]) : '-' ?></label>
                      </div>
                    </div>
                  <?php endforeach; ?>

                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted" style="font-weight: bold;">Status:</label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-danger font-weight-bold">Upload Document</label>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">Alamat:</label>
                    </div>
                    <div class="col-lg-4">
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
                    <div class="form-group row">
                      <div class="col-lg-4">
                        <label class="text-muted"><?= $label ?>:</label>
                      </div>
                      <div class="col-lg-4">
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
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted"><?= $label ?>:</label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted"><?= $value ?></label>
                    </div>
                  </div>
                <?php endforeach; ?>

                <div class="form-group row">
                  <div class="col-lg-4">
                    <label class="text-muted" style="font-weight: bold;">Status:</label>
                  </div>
                  <div class="col-lg-4">
                    <label class="text-danger font-weight-bold">Upload Document</label>
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
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted"><?= $label ?>:</label>
                    </div>
                    <div class="col-lg-4">
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
  <label>Informasi Dokumen Perusahaan</label>
  <div class="row">
    <div class="col-lg-12">
      <div class="card my-3" style="box-shadow: 3px 3px 3px #777;">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4 mb-3">
              Akta Perubahan
              <?= $documents['status'] != 'error' && $documents['data'][0]['akta_perubahan'] != null ? '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>' : '' ?>
            </div>
            <div class="col-lg-4 mb-3">
              SK Menkumham
              <?= $documents['status'] != 'error' && $documents['data'][0]['sk_menkumham'] != null ? '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>' : '' ?>
            </div>
            <div class="col-lg-4 mb-3">
              KTP Pengurus Perusahaan
              <?= $documents['status'] != 'error' && $documents['data'][0]['ktp_pengurus_perusahaan'] != null ? '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>' : '' ?>
            </div>
            <div class="col-lg-4 mb-3">
              Surat Keterangan Domisili Perusahaan
              <?= $documents['status'] != 'error' && $documents['data'][0]['surat_keterangan_domisili_perusahaan'] != null ? '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>' : '' ?>
            </div>
            <div class="col-lg-4 mb-3">
              SIUP
              <?= $documents['status'] != 'error' && $documents['data'][0]['siup'] != null ? '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>' : '' ?>
            </div>
            <div class="col-lg-4 mb-3">
              TDP
              <?= $documents['status'] != 'error' && $documents['data'][0]['tdp'] != null ? '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>' : '' ?>
            </div>
            <div class="col-lg-4 mb-3">
              NPWP
              <?= $documents['status'] != 'error' && $documents['data'][0]['npwp'] != null ? '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>' : '' ?>
            </div>
            <div class="col-lg-4 mb-3">
              PKP
              <?= $documents['status'] != 'error' && $documents['data'][0]['pkp'] != null ? '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>' : '' ?>
            </div>
            <div class="col-lg-4 mb-3">
              SPT PPH/PPN
              <?= $documents['status'] != 'error' && $documents['data'][0]['spt'] != null ? '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>' : '' ?>
            </div>
            <div class="col-lg-4 mb-3">
              Laporan Keuangan
              <?= $documents['status'] != 'error' && $documents['data'][0]['laporan_keuangan'] != null ? '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>' : '' ?>
            </div>
            <div class="col-lg-4 mb-3">
              Sertifikasi
              <?= $documents['status'] != 'error' && $documents['data'][0]['sertifikasi'] != null ? '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>' : '' ?>
            </div>
            <div class="col-lg-4 mb-3">
              Akta Pendirian
              <?= $documents['status'] != 'error' && $documents['data'][0]['akta_pendirian'] != null ? '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>' : '' ?>
            </div>
            <div class="col-lg-4 mb-3">
              Rekening Koran Bank
              <?= $documents['status'] != 'error' && $documents['data'][0]['rekening_koran'] != null ? '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>' : '' ?>
            </div>
            <div class="col-lg-4 mb-3">
              Daftar Pengalaman Kerja
              <?= $documents['status'] != 'error' && $documents['data'][0]['list_daftar_pengalaman_kerja'] != null ? '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>' : '' ?>
            </div>
            <div class="col-lg-4 mb-3">
              Daftar Tenaga Ahli
              <?= $documents['status'] != 'error' && $documents['data'][0]['list_tenaga_ahli'] != null ? '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>' : '' ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>