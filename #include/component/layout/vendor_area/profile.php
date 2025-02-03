<div class="tab-pane container active mt-4" id="menuProfile">
  <div class="row">
    <div class="col-lg-12">
      <label>Informasi Perusahaan</label>
      <div class="card" style="box-shadow: 3px 3px 3px #777;">
        <div class="card-body">
          <div class="row">
            <?php if (isset($companyDatas['status']) && $companyDatas['status'] === 'success' && !empty($companyDatas['data'])): ?>
              <?php foreach ($companyDatas['data'] as $data): ?>
                <div class="col-lg-6">
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">Nama Perusahaan : </label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted"><?= (isset($data['name']) && !empty($data['name'])) ? htmlspecialchars($data['name']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">Tipe Perusahaan : </label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted"><?= (isset($data['type']) && !empty($data['type'])) ? htmlspecialchars($data['type']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">Email Perusahaan : </label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted"><?= (isset($data['mail']) && !empty($data['mail'])) ? htmlspecialchars($data['mail']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">No.Tlp Perusahaan : </label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted"><?= (isset($data['phone']) && !empty($data['phone'])) ? htmlspecialchars($data['phone']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">No.Hp Perusahaan : </label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted"><?= (isset($data['mobile_phone']) && !empty($data['mobile_phone'])) ? htmlspecialchars($data['mobile_phone']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted" style="font-weight: bold;">Status : </label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-danger" style="font-weight:bolder;">Upload Document</label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">Alamat : </label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted"><?= (isset($data['address']) && !empty($data['address'])) ? htmlspecialchars($data['address']) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">Provinsi : </label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted" id="lblprov"><?= (isset($data['provinsi']) && !empty($data['provinsi'])) ? htmlspecialchars($region->getRegionName($data['provinsi'])) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">Kecamatan : </label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted" id="lblkec"><?= (isset($data['kecamatan']) && !empty($data['kecamatan'])) ? htmlspecialchars($region->getRegionName($data['kecamatan'])) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">Kota/Kabupaten : </label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted" id="lblkot"><?= (isset($data['kota']) && !empty($data['kota'])) ? htmlspecialchars($region->getRegionName($data['kota'])) : '-' ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="text-muted">Kelurahan : </label>
                    </div>
                    <div class="col-lg-4">
                      <label class="text-muted" id="lblkel"><?= (isset($data['kelurahan']) && !empty($data['kelurahan'])) ? htmlspecialchars($region->getRegionName($data['kelurahan'])) : '-' ?></label>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div><br><br>
  Informasi Dokumen Perusahaan
  <div class="row">
    <div class="col-lg-12"><br>
      <div class="card" style="box-shadow: 3px 3px 3px #777;">
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