<!--Start of Login Form-->
<div id="quickview-register">
  <!-- Modal -->
  <div class="modal fade" id="RegisterModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
        </div>
        <div class="modal-body">
          <div class="form-pop-up-content ptb-30 pl-60 pr-60">
            <div class="area-title text-center mb-43" style="margin-bottom: 15px !important">
              <img src="<?php SERVER_NAME ?>assets/images/logo/antara-logo-colour.png" alt="jobhere" style="height:100px;">
            </div>
            <p align="center" style="color:black;font-size: 12px;line-height: 11px;">Sistem Pengadaan secara Elektronik (e-Procurement) merupakan layanan mandiri berbasis internet untuk lebih mengefisiensikan transaksi</p>
            <hr class="my-3">
            <form method="post" id="form_daftar" autocomplete="off" class="mt-3">
              <div class="d-flex flex-column">
                <label style="color: #393939; font-size: 14px !important;">Pilih Jenis Akun</label>
                <div class="btn-group btn-group-toggle w-100 mb-3" data-toggle="buttons">
                  <label onclick="get_akun('1')" class="btn btn-outline-danger w-50 m-auto" style="font-size: 12px !important; border-radius: 3px !important; margin-right: 16px !important;">
                    <input type="radio" name="type_akun" value="1" id="type_akun_1" class="m-auto" autocomplete="off" required> Perusahaan
                  </label>
                  <label onclick="get_akun('2')" class="btn btn-outline-danger w-50 m-auto" style="font-size: 12px !important; border-radius: 3px !important; margin-right: 20px;">
                    <input type="radio" name="type_akun" value="2" id="type_akun_2" autocomplete="off" required> Individu
                  </label>
                </div>
              </div>
              <div class="form-box">
                <input type="text" name="username" placeholder="Username" class="mb-14" required>
              </div>
              <div class="form-box">
                <input title="Password minimal 8 karakter, harus berisi huruf kapital, huruf kecil, angka dan Karakter khusus" type="password" id="psw" name="password" placeholder="Password" class="mb-14" onkeyup="password_validation()" required>
                <input type="hidden" name="validation_pwd" id="validation_pwd_val" value="0">
                <span style="font-size:11px;color:black;">Password harus berisi : </span>
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
              <div class="form-box">
                <input type="email" name="email" placeholder="Email" class="mb-14" required>
              </div>
              <div class="form-box">
                <input type="text" name="nama_lengkap" placeholder="Nama PIC" class="mb-14" required>
              </div>
              <div class="form-box">
                <input type="text" name="company_name" placeholder="Nama Perusahaan" class="mb-14" required>
              </div>
              <div class="form-box" id="div_npwp" style="display:none">
                <input type="text" name="company_npwp" id="company_npwp" maxlength="15" placeholder="NPWP Perusahaan" class="mb-14">
              </div>
              <div class="form-box" id="div_nik" style="display:none">
                <input type="text" name="pic_ktp" id="pic_ktp" maxlength="16" placeholder="NIK" class="mb-14">
              </div>
              <!-- <div class="g-recaptcha my-3" data-sitekey="6Lepm9UpAAAAAGicQkWtrUl970c2ML7F7zeVdigo"></div> -->
              <div class="text-center">
                <button type="submit" class="text-uppercase">Daftar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Login Form-->