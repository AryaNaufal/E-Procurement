<!--Start of Reset Password Form-->
<div id="quickview-reset_pwd">
  <!-- Modal -->
  <div class="modal fade" id="ResetPwdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
        </div>
        <div class="modal-body">
          <div class="form-pop-up-content ptb-30 pl-60 pr-60">
            <div class="area-title text-center mb-43">
              <img src="<?= SERVER_NAME ?>assets/images/logo/antara-logo-colour.png" alt="jobhere" style="height:100px;">
            </div>
            <h3 class="text-center">Lupa Password</h3>
            <p class="text-center" style="color:black; font-size: 12px; line-height: 11px;">Silahkan Masukan email anda untuk melakukan reset password</p>
            <form method="post" id="form_reset" autocomplete="off">
              <div class="form-box">
                <input type="email" name="email" placeholder="Email" class="mb-14" required>
              </div>
              <div class="g-recaptcha my-3" data-sitekey="6Lepm9UpAAAAAGicQkWtrUl970c2ML7F7zeVdigo"></div>
              <div class="text-center">
                <button type="submit" class="text-uppercase">Reset</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Reset Password Form-->