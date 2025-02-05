<div class="tab-pane container active mt-4" id="menuProfile">
  <div class="row">
    <div class="col-lg-12 mb-3">
      <label>Informasi Perusahaan</label>
      <div class="card my-3" style="box-shadow: 3px 3px 3px #777;">
        <div class="card-body">
          <div class="row">
            <?php if (!empty($companyDatas['data']) && $companyDatas['status'] === 'success'): ?>
              <?php foreach ($companyDatas['data'] as $data): ?>
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
                        <label class="text-muted"><?= !empty($data[$key]) ? htmlspecialchars($region->getRegionName($data[$key])) : '-' ?></label>
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
            </div>
            <div class="col-lg-4 mb-3">
              SK Menkumham
            </div>
            <div class="col-lg-4 mb-3">
              KTP Pengurus Perusahaan
            </div>
            <div class="col-lg-4 mb-3">
              Surat Keterangan Domisili Perusahaan
            </div>
            <div class="col-lg-4 mb-3">
              SIUP
            </div>
            <div class="col-lg-4 mb-3">
              TDP
            </div>
            <div class="col-lg-4 mb-3">
              NPWP
            </div>
            <div class="col-lg-4 mb-3">
              PKP
            </div>
            <div class="col-lg-4 mb-3">
              SPT PPH/PPN
            </div>
            <div class="col-lg-4 mb-3">
              Laporan Keuangan
            </div>
            <div class="col-lg-4 mb-3">
              Sertifikasi
            </div>
            <div class="col-lg-4 mb-3">
              Akta Pendirian
            </div>
            <div class="col-lg-4 mb-3">
              Rekening Koran Bank
            </div>
            <div class="col-lg-4 mb-3">
              Daftar Pengalaman Kerja
            </div>
            <div class="col-lg-4 mb-3">
              Daftar Tenaga Ahli
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>