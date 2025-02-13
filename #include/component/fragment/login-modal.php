<!--Start of Login Form-->
<div id="quickview-login">
  <!-- Modal -->
  <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
        </div>
        <div class="modal-body">
          <div class="form-pop-up-content ptb-30 pl-60 pr-60">
            <div class="area-title text-center mb-43" style="margin-bottom: 15px !important">
              <img src="<?= SERVER_NAME ?>assets/images/logo/antara-logo-colour.png" alt="jobhere" style="width: 80%;">
            </div>
            <p class="text-center" style="color: black; font-size: 12px; line-height: 11px;">Sistem Pengadaan secara Elektronik (e-Procurement) merupakan layanan mandiri berbasis internet untuk lebih mengefisiensikan transaksi</p>
            <form method="POST" id="form_login" autocomplete="off">
              <input type="text" name="username" placeholder="Email / Username" class="mb-14" required>
              <div class="position-relative">
                <input type="password" name="password" placeholder="Password" class="position-static" id="password" required>
                <div class=" position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%);">
                  <i class="fa fa-eye toggle-password" data-toggle="password" style="cursor: pointer; color: rgb(118, 118, 118);"></i>
                </div>
              </div>
              <div class="text-center my-3">
                <!-- <div class="g-recaptcha my-3" data-sitekey=" -->
                <?php
                // echo $env->get("RECAPTCHA_SITE_KEY")
                ?>
                <!-- "></div> -->
                <a href="#" data-toggle="modal" data-target="#ResetPwdModal" style="cursor:pointer; color:#0091ff; font-size: 12px;">Forgot Password ?</a>
              </div>
              <div class="text-center mt-3">
                <button type="submit" class="text-uppercase">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Login Form-->