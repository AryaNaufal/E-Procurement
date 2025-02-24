<section class="tab-pane container-fluid ptb-60" id="data_perusahaan">
  <div class="d-flex justify-content-start mb-3">
    <a href="<?= SERVER_NAME ?>vendor_area/user/" class="btn text-uppercase rounded" style="color:white;background-color:#AA0A2F;">Kembali</a>
  </div>
  <form method="POST" id="form_edit_company" action="">
    <div class="d-flex justify-content-center my-4">
      <h5>Data Perusahaan</h5>
    </div>

    <div class="row">
      <div class="col-md-4">
        <label>Nama Perusahaan</label>
        <input type="text" maxlength="150" name="nama_perusahaan" id="nama_perusahaan"
          placeholder="Nama Perusahaan" class="form-control" value="<?= $companies['data'][0]['name'] ?>" required>

      </div>
      <div class="col-md-4">
        <label>Tipe Perusahaan</label>
        <select name="tipe_perusahaan" id="tipe_perusahaan" class="form-control">
          <option value="">Pilih Tipe Perusahaan</option>
          <option value="Firma (FA)" <?= $companies['data'][0]['type'] == 'Firma (FA)' ? 'selected' : '' ?>>Firma (FA)</option>
          <option value="Kantor Akuntan Publik (KAP)" <?= $companies['data'][0]['type'] == 'Kantor Akuntan Publik (KAP)' ? 'selected' : '' ?>>Kantor Akuntan Publik (KAP)</option>
          <option value="Koperasi" <?= $companies['data'][0]['type'] == 'Koperasi' ? 'selected' : '' ?>>Koperasi</option>
          <option value="multi nasional company" <?= $companies['data'][0]['type'] == 'multi nasional company' ? 'selected' : '' ?>>multi nasional company</option>
          <option value="Perseroan Komanditer (CV)" <?= $companies['data'][0]['type'] == 'Perseroan Komanditer (CV)' ? 'selected' : '' ?>>Perseroan Komanditer (CV)</option>
          <option value="Perseroan Terbatas (PT)" <?= $companies['data'][0]['type'] == 'Perseroan Terbatas (PT)' ? 'selected' : '' ?>>Perseroan Terbatas (PT)</option>
          <option value="Perusahaan Negara Umum (PERUM)" <?= $companies['data'][0]['type'] == 'Perusahaan Negara Umum (PERUM)' ? 'selected' : '' ?>>Perusahaan Negara Umum (PERUM)</option>
          <option value="Perusahaan Perseorangan" <?= $companies['data'][0]['type'] == 'Perusahaan Perseorangan' ? 'selected' : '' ?>>Perusahaan Perseorangan</option>
        </select>
      </div>
      <div class="col-md-4">
        <label>Email Perusahaan</label>
        <input maxlength="130" type="text" name="email_perusahaan" id="email_perusahaan"
          placeholder="Email Perusahaan" value="<?= $companies['data'][0]['mail'] ?>" class="form-control">
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-6">
        <label>No. Tlp Perusahaan</label>
        <input type="text" name="no_tlp" id="no_tlp" placeholder="No. Tlp Perusahaan" maxlength="30"
          class="form-control" value="<?= $companies['data'][0]['phone'] ?>">
      </div>
      <div class="col-md-6">
        <label>No. Hp Perusahaan</label>
        <input type="text" name="no_hp" id="no_hp" placeholder="No. Hp Perusahaan" maxlength="30"
          class="form-control" value="<?= $companies['data'][0]['mobile_phone'] ?>">
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-12">
        <label>Alamat</label>
        <textarea name="alamat_perusahaan" id="alamat" rows="3" class="form-control" placeholder="Alamat Perusahaan" style="resize: none;"><?= $companies['data'][0]['address'] ?></textarea>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-6">
        <label>Provinsi</label><br>
        <select name="province" id="province">
          <?php foreach ($provinces as $province) : ?>
            <option value="<?= $province['id'] ?>" <?= $province['id'] == $companies['data'][0]['provinsi'] ? 'selected' : '' ?>><?= $province['name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-6">
        <label>Kota/Kabupaten</label><br>
        <select name="regency" id="regency">
          <?php foreach ($regencies as $regency) : ?>
            <option value="<?= $regency['id'] ?>" <?= $regency['id'] === $companies['data'][0]['kota'] ? 'selected' : '' ?>><?= $regency['name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-6">
        <label>Kecamatan</label><br>
        <select name="district" id="district">
          <?php foreach ($districts as $district) : ?>
            <option value="<?= $district['id'] ?>" <?= $district['id'] === $companies['data'][0]['kecamatan'] ? 'selected' : '' ?>><?= $district['name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-6">
        <label>Kelurahan</label><br>
        <select name="village" id="village">
          <?php foreach ($villages as $village) : ?>
            <option value="<?= $village['id'] ?>" <?= $village['id'] === $companies['data'][0]['kelurahan'] ? 'selected' : '' ?>><?= $village['name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="d-flex justify-content-center my-5">
      <h5>Kategori Perusahaan</h5>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="custom-control custom-checkbox">
          <input name="category[]" value="Internet" style="margin-right: -18px;" type="checkbox"
            class="custom-control-input" id="internet" <?= in_array('Internet', $selectedCategory) ? 'checked' : '' ?>>
          <label class="custom-control-label" for="internet">Internet</label>
        </div>
      </div>

      <div class="col-md-3">
        <div class="custom-control custom-checkbox">
          <input name="category[]" value="Arsitektur" style="margin-right: -18px;" type="checkbox"
            class="custom-control-input" id="arsitektur" <?= in_array('Arsitektur', $selectedCategory) ? 'checked' : '' ?>>
          <label class="custom-control-label" for="arsitektur">Arsitektur</label>
        </div>
      </div>

      <div class="col-md-3">
        <div class="custom-control custom-checkbox">
          <input name="category[]" value="Makanan dan Minuman" style="margin-right: -18px;" type="checkbox"
            class="custom-control-input" id="makanan_dan_minuman" <?= in_array('Makanan dan Minuman', $selectedCategory) ? 'checked' : '' ?>>
          <label class="custom-control-label" for="makanan_dan_minuman">Makanan & Minuman</label>
        </div>
      </div>

      <div class="col-md-3">
        <div class="custom-control custom-checkbox">
          <input name="category[]" value="Logistik" style="margin-right: -18px;" type="checkbox"
            class="custom-control-input" id="logistik" <?= in_array('Logistik', $selectedCategory) ? 'checked' : '' ?>>
          <label class="custom-control-label" for="logistik">Logistik</label>
        </div>
      </div>

      <div class="col-md-3">
        <div class="custom-control custom-checkbox">
          <input name="category[]" value="Software house" style="margin-right: -18px;" type="checkbox"
            class="custom-control-input" id="software_house" <?= in_array('Software house', $selectedCategory) ? 'checked' : '' ?>>
          <label class="custom-control-label" for="software_house">Sofware house</label>
        </div>
      </div>

      <div class="col-md-3">
        <div class="custom-control custom-checkbox">
          <input name="category[]" value="Perlengkapan Fotografi" style="margin-right: -18px;" type="checkbox"
            class="custom-control-input" id="perlengkapan_fotografi" <?= in_array('Perlengkapan Fotografi', $selectedCategory) ? 'checked' : '' ?>>
          <label class="custom-control-label" for="perlengkapan_fotografi">Perlengkapan Fotografi</label>
        </div>
      </div>
    </div>
    <div class="text-center">
      <button id="simpan" type="submit" name="submit_edit_company" class="text-uppercase mt-5 rounded"
        style="color:white; background-color:#AA0A2F;">Simpan</button>
    </div>
  </form>
</section>

<script>
  $(document).ready(function() {
    // Get Regencies
    $('#province').change(function() {
      var provinceId = $(this).val();
      var name = $('#name').val();
      $.ajax({
        url: '<?= SERVER_NAME ?>handler/region/get_regencies.php',
        type: 'GET',
        data: {
          province: provinceId,
          name: name
        },
        success: function(response) {
          $('#regency').html(response);
          $('#district').html('<option value="">Pilih Kecamatan</option>');
          $('#village').html('<option value="">Pilih Kelurahan/Desa</option>');
        }
      });
    });

    // Get Districts
    $('#regency').change(function() {
      var regencyId = $(this).val();
      var name = $('#name').val();
      var provinceId = $('#province').val();
      $.ajax({
        url: '<?= SERVER_NAME ?>handler/region/get_districts.php',
        type: 'GET',
        data: {
          regency: regencyId,
          name: name,
          province: provinceId
        },
        success: function(response) {
          $('#district').html(response);
          $('#village').html('<option value="">Pilih Kelurahan/Desa</option>');
        }
      });
    });

    // Get Villages
    $('#district').change(function() {
      var districtId = $(this).val();
      var name = $('#name').val();
      var provinceId = $('#province').val();
      var regencyId = $('#regency').val();
      $.ajax({
        url: '<?= SERVER_NAME ?>handler/region/get_villages.php',
        type: 'GET',
        data: {
          district: districtId,
          name: name,
          province: provinceId,
          regency: regencyId
        },
        success: function(response) {
          $('#village').html(response);
        }
      });
    });
  });

  // Add Company
  document.getElementById('form_edit_company').addEventListener('submit', function(event) {
    event.preventDefault();
    Swal.fire({
      icon: 'info',
      title: 'Tambah Data Perusahaan',
      text: 'Apakah data perusahaan sudah sesuai?',
      showCancelButton: true,
      confirmButtonColor: '#007bff',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        // Tampilkan loading
        document.getElementById('loader').style.display = 'block';
        fetch(`<?= SERVER_NAME ?>handler/company/edit`, {
            method: 'POST',
            credentials: 'include',
            body: new FormData(this)
          })
          .then(response => response.json())
          .then(data => {
            document.getElementById('loader').style.display = 'none';
            if (data.status === 'success') {
              Swal.fire({
                title: 'Berhasil',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'OK'
              }).then(() => {
                window.location.href = '<?= SERVER_NAME ?>vendor_area/user/';
              });
            } else {
              Swal.fire({
                title: 'Gagal',
                text: data.message,
                icon: 'error',
                confirmButtonText: 'OK'
              });
            }
          });
      }
    });
  });
</script>