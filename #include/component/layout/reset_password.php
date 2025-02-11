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