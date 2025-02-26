<div style="min-height: calc(100vh - 200px);">
  <div class="container mt-5">
    <h4>Reset Password for email <?= $_SESSION['email'] ?? '' ?></h4>
    <form action="" id="form_reset_password" class="d-flex flex-column mt-5" style="gap: 20px;">
      <div>
        <label for="new_password">Password Baru</label>
        <div class="d-flex">
          <div class="input-group position-relative">
            <input type="password" name="new_password" id="new_password" class="position-static" placeholder="Masukan Password Baru">
            <div class="input-group-append position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%);">
              <i class="fa fa-eye toggle-password" data-toggle="new_password" style="cursor: pointer;"></i>
            </div>
          </div>
        </div>

      </div>
      <div>
        <label for="confirm_password">Konfirmasi Password</label>
        <div class="d-flex">
          <div class="input-group position-relative">
            <input type="password" name="confirm_password" id="confirm_password" class="position-static" placeholder="Masukan Konfirmasi Password Baru">
            <div class="input-group-append position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%);">
              <i class="fa fa-eye toggle-password" data-toggle="confirm_password" style="cursor: pointer;"></i>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" style="background-color: #AA0A2F;">Kirim</button>
    </form>
  </div>
</div>

<script>
  document.getElementById('form_reset_password').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah form submission tradisional

    // Tampilkan loading
    document.getElementById('loader').style.display = 'block';

    // Ambil data dari form
    const formData = new FormData(this);

    // Kirim data ke server menggunakan fetch
    fetch('<?= SERVER_NAME ?>handler/auth/reset_password', {
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