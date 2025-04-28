<!--Start of Login Form-->
<div id="quickview-register">
  <!-- Modal -->
  <div class="modal fade" id="RegisterModal" tabindex="-1" role="dialog" style="z-index: 1; position: fixed;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span><i class="zmdi zmdi-close"></i></span></button>
        </div>
        <div class="modal-body">
          <div class="form-pop-up-content ptb-30 pl-60 pr-60">
            <div class="area-title text-center mb-43" style="margin-bottom: 15px !important">
              <img src="<?= SERVER_NAME ?>assets/images/logo/antara-logo-colour.png" alt="jobhere" style="width: 80%;">
            </div>
            <p align="center" style="color:black;font-size: 12px;line-height: 11px;">Sistem Pengadaan secara Elektronik (e-Procurement) merupakan layanan mandiri berbasis internet untuk lebih mengefisiensikan transaksi</p>
            <hr class="my-3">
            <form method="post" id="form_daftar" autocomplete="off" class="mt-3">
              <div class="form-group">
                <label class="form-label" style="font-size: 14px; color:#393939 !important;">Pilih Jenis Akun</label>
                <div class="btn-group btn-group-toggle w-100 mb-3" data-toggle="buttons">
                  <label onclick="get_akun('1')" class="btn btn-outline-danger w-50 m-auto" style="font-size: 12px !important; border-radius: 3px !important; margin-right: 16px !important;">
                    <input type="radio" name="type_akun" value="1" id="type_akun_1" class="m-auto d-none" autocomplete="off" required> Perusahaan
                  </label>
                  <label onclick="get_akun('2')" class="btn btn-outline-danger w-50 m-auto" style="font-size: 12px !important; border-radius: 3px !important; margin-right: 20px;">
                    <input type="radio" name="type_akun" value="2" id="type_akun_2" class="m-auto d-none" autocomplete="off" required> Individu
                  </label>
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="username" class="form-label" style="font-size: 14px; color:#393939 !important;">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" class="form-control" required>
              </div>

              <!-- <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="font-size: 14px; color:#393939 !important;">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div> -->

              <div class="form-group mb-3">
                <label for="psw" class="form-label" style="font-size: 14px; color:#393939 !important;">Password</label>
                <input type="password" id="psw" name="password" placeholder="Password" class="form-control" onkeyup="password_validation()" required>
                <input type="hidden" name="validation_pwd" id="validation_pwd_val" value="0">
                <div class="my-3" style="font-size:11px;color:black;">
                  Password harus berisi :
                </div>
                <table style="color: #393939; font-size: 12px !important;">
                  <tr>
                    <td style="width:40%"><span id="pwd_capital">* Huruf kapital</span></td>
                    <td style="width:40%"><span id="pwd_letter">* Huruf kecil</span></td>
                  </tr>
                  <tr>
                    <td><span id="pwd_number">* Angka</span></td>
                    <td><span id="pwd_special_character">* Karakter khusus</span></td>
                  </tr>
                  <tr>
                    <td colspan="2"><span id="pwd_length">* Minimal 8 Karakter</span></td>
                  </tr>
                </table>
              </div>

              <div class="form-group mb-3">
                <label for="email" class="form-label" style="font-size: 14px; color:#393939 !important;">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
              </div>

              <div class="form-group mb-3">
                <label for="nama_lengkap" class="form-label" style="font-size: 14px; color:#393939 !important;">Nama PIC</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama PIC" class="form-control" required>
              </div>

              <div class="form-group mb-3">
                <label for="company_name" class="form-label" style="font-size: 14px; color:#393939 !important;">Nama Perusahaan</label>
                <input type="text" name="company_name" id="company_name" placeholder="Nama Perusahaan" class="form-control" required>
              </div>

              <div class="form-group mb-3" id="div_npwp" style="display:none;">
                <label for="company_npwp" class="form-label" style="font-size: 14px; color:#393939 !important;">NPWP Perusahaan</label>
                <input type="text" name="company_npwp" id="company_npwp" maxlength="15" placeholder="NPWP Perusahaan" class="form-control">
              </div>

              <div class="form-group mb-3" id="div_nik" style="display:none;">
                <label for="pic_ktp" class="form-label" style="font-size: 14px; color:#393939 !important;">NIK</label>
                <input type="text" name="pic_ktp" id="pic_ktp" maxlength="16" placeholder="NIK" class="form-control">
              </div>
              <!-- <div class="g-recaptcha my-3" data-sitekey=" -->
              <?php
              // echo $env->get("RECAPTCHA_SITE_KEY") 
              ?>
              <!-- "></div> -->
              <div class="text-center">
                <button type="submit" class="text-uppercase rounded">Daftar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Login Form-->

<script type="text/javascript">
  function get_akun(tipe) {
    if (tipe == "1") {
      $("#div_nik").hide();
      $("#pic_ktp").val("");
      $("#div_npwp").show();
      $("#company_npwp").prop('required', true);
      $("#pic_ktp").prop('required', false);

      $('label.btn').on('click', function() {
        $('label.btn').removeClass('active');
        $(this).addClass('active');
      });

    } else {
      $("#div_npwp").hide();
      $("#company_npwp").val("");
      $("#div_nik").show();
      $("#pic_ktp").prop('required', true);
      $("#company_npwp").prop('required', false);

      $('label.btn').on('click', function() {
        $('label.btn').removeClass('active');
        $(this).addClass('active');
      });
    }
  }

  document.getElementById('form_daftar').addEventListener('submit', function(event) {
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