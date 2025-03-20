<section class="py-5" style="min-height: 100vh">
  <div class="container">
    <h2>Daftar Akun</h2>
    <form method="post" id="register_form" autocomplete="off" class="mt-3">
      <div class="form-group">
        <label class="form-label" style="font-size: 14px; color:#393939 !important;">Pilih Jenis Akun</label>
        <div class="btn-group btn-group-toggle w-100 mb-3" data-toggle="buttons">
          <label onclick="get_akun('1')" class="btn btn-outline-danger w-50 m-auto z-0" style="font-size: 12px !important; border-radius: 3px !important; margin-right: 16px !important;">
            <input type="radio" name="type_akun" value="1" id="type-akun-1" class="m-auto d-none" autocomplete="off" required> Perusahaan
          </label>
          <label onclick="get_akun('2')" class="btn btn-outline-danger w-50 m-auto z-0" style="font-size: 12px !important; border-radius: 3px !important; margin-right: 20px;">
            <input type="radio" name="type_akun" value="2" id="type-akun-2" class="m-auto d-none" autocomplete="off" required> Individu
          </label>
        </div>
      </div>
      <div class="form-group mb-3">
        <label for="Username" class="form-label" style="font-size: 14px; color:#393939 !important;">Username</label>
        <input type="text" name="username" id="Username" placeholder="Username" class="form-control" required>
      </div>

      <div class="form-group mb-3">
        <label for="Password" class="form-label" style="font-size: 14px; color:#393939 !important;">Password</label>
        <input type="password" id="Password" name="password" placeholder="Password" class="form-control" onkeyup="password_validation()" required>
        <input type="hidden" name="validation_pwd" id="validation-password-val" value="0">
        <div class="my-3" style="font-size:11px;color:black;">
          Password harus berisi :
        </div>
        <table style="color: #393939; font-size: 12px !important;">
          <tr>
            <td style="width:40%"><span id="password-capital">* Huruf kapital</span></td>
            <td style="width:40%"><span id="password-letter">* Huruf kecil</span></td>
          </tr>
          <tr>
            <td><span id="password-number">* Angka</span></td>
            <td><span id="password-special-character">* Karakter khusus</span></td>
          </tr>
          <tr>
            <td colspan="2"><span id="password-length">* Minimal 8 Karakter</span></td>
          </tr>
        </table>
      </div>

      <div class="form-group mb-3">
        <label for="Email" class="form-label" style="font-size: 14px; color:#393939 !important;">Email</label>
        <input type="email" name="email" id="Email" placeholder="Email" class="form-control" required>
      </div>

      <div class="form-group mb-3">
        <label for="nama-lengkap" class="form-label" style="font-size: 14px; color:#393939 !important;">Nama PIC</label>
        <input type="text" name="nama_lengkap" id="nama-lengkap" placeholder="Nama PIC" class="form-control" required>
      </div>

      <div class="form-group mb-3">
        <label for="company-name" class="form-label" style="font-size: 14px; color:#393939 !important;">Nama Perusahaan</label>
        <input type="text" name="company_name" id="company-name" placeholder="Nama Perusahaan" class="form-control" required>
      </div>

      <div class="form-group mb-3" id="div-npwp" style="display:none;">
        <label for="company-npwp" class="form-label" style="font-size: 14px; color:#393939 !important;">NPWP Perusahaan</label>
        <input type="text" name="company_npwp" id="company-npwp" maxlength="15" placeholder="NPWP Perusahaan" class="form-control">
      </div>

      <div class="form-group mb-3" id="div-nik" style="display:none;">
        <label for="pic-ktp" class="form-label" style="font-size: 14px; color:#393939 !important;">NIK</label>
        <input type="text" name="pic_ktp" id="pic-ktp" maxlength="16" placeholder="NIK" class="form-control">
      </div>
      <!-- <div class="g-recaptcha my-3" data-sitekey=" -->
      <?php
      // echo $env->get("RECAPTCHA_SITE_KEY") 
      ?>
      <!-- "></div> -->
      <div class="text-center">
        <button type="submit" class="text-uppercase rounded z-0" style="background-color:#AA0A2F;">Daftar</button>
      </div>
    </form>
  </div>
</section>

<script type="text/javascript">
  function get_akun(tipe) {
    if (tipe == "1") {
      $("#div-nik").hide();
      $("#pic-ktp").val("");
      $("#div-npwp").show();
      $("#company_npwp").prop('required', true);
      $("#pic-ktp").prop('required', false);

      $('label.btn').on('click', function() {
        $('label.btn').removeClass('active');
        $(this).addClass('active');
      });

    } else {
      $("#div-npwp").hide();
      $("#company_npwp").val("");
      $("#div-nik").show();
      $("#pic-ktp").prop('required', true);
      $("#company_npwp").prop('required', false);

      $('label.btn').on('click', function() {
        $('label.btn').removeClass('active');
        $(this).addClass('active');
      });
    }
  }

  document.getElementById('register_form').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah form submission tradisional

    // Tampilkan loading
    document.getElementById('loader').style.display = 'block';

    // Ambil data dari form
    const formData = new FormData(this);

    // Kirim data ke server menggunakan fetch
    fetch('<?= SERVER_NAME ?>handler/auth/register', {
        method: 'POST',
        body: formData,
        credentials: 'include'
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
            window.location.href = '<?= SERVER_NAME ?>';
          });
        } else {
          Swal.fire({
            title: 'Gagal',
            text: data.message,
            icon: 'error',
            confirmButtonText: 'OK'
          });
        }
      })
      .catch(error => {
        document.getElementById('loader').style.display = 'none';
        Swal.fire({
          title: 'Gagal',
          text: 'Terjadi kesalahan saat menghubungi server.',
          icon: 'error',
          confirmButtonText: 'OK'
        });
      });
  });
</script>