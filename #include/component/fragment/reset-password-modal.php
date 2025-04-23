<!--Start of Reset Password Form-->
<div id="quickview-reset_pwd">
  <!-- Modal -->
  <div class="modal fade" id="ResetPwdModal" tabindex="-1" role="dialog" style="position: fixed;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span><i class="zmdi zmdi-close"></i></span></button>
        </div>
        <div class="modal-body">
          <div class="form-pop-up-content ptb-30 pl-60 pr-60">
            <div class="area-title text-center mb-43">
              <img src="<?= SERVER_NAME ?>assets/images/logo/antara-logo-colour.png" alt="jobhere" style="width: 80%;">
            </div>
            <h3 class="text-center">Lupa Password</h3>
            <p class="text-center" style="color:black; font-size: 12px; line-height: 11px;">Silahkan Masukan email anda untuk melakukan reset password</p>
            <form method="POST" id="form_reset" autocomplete="off">
              <div class="form-box">
                <input type="email" name="email" placeholder="Email" class="mb-14" required>
              </div>
              <!-- <div class="g-recaptcha my-3" data-sitekey="6Lepm9UpAAAAAGicQkWtrUl970c2ML7F7zeVdigo"></div> -->
              <div class="text-center">
                <button type="submit" class="text-uppercase rounded">Reset</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Reset Password Form-->

<script>
  document.getElementById('form_reset').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah form submission tradisional

    // Tampilkan loading
    document.getElementById('loader').style.display = 'block';

    // Ambil data dari form
    const formData = new FormData(this);

    // Kirim data ke server menggunakan fetch
    fetch('<?= SERVER_NAME ?>handler/auth/send_mail_reset', {
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
            confirmButtonText: 'OK',
            confirmButtonColor: '#007bff'
          }).then(() => {
            window.location.href = '<?= SERVER_NAME ?>';
          });
        } else {
          Swal.fire({
            title: 'Gagal',
            text: data.message,
            icon: 'error',
            confirmButtonText: 'OK',
            confirmButtonColor: '#007bff'
          });
        }
      })
      .catch(error => {
        document.getElementById('loader').style.display = 'none';
        Swal.fire({
          title: 'Gagal',
          text: 'Terjadi kesalahan saat menghubungi server.',
          icon: 'error',
          confirmButtonText: 'OK',
          confirmButtonColor: '#007bff'
        });
      });
  });
</script>