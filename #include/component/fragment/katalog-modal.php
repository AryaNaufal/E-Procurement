<div class="modal fade" id="katalog-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" style="width:100%" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
      </div>
      <div class="modal-body">
        <div class="form-pop-up-content ptb-60 pl-60 pr-60">
          <center>
            <p id="modalCatalogtitle" style="font-size:15px;color:black"></p>
          </center><br>
          <form method="post" id="form_produk" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" id="act_catalog">
            <input type="hidden" id="id_catalog" name="id_catalog">
            <div class="row">
              <div class="col-md-6">
                <label style="color:black">Kode Produk</label>
                <input type="text" maxlength="150" name="kode_produk" id="kode_produk"
                  placeholder="Kode Produk" class="form-control" required="">
              </div>
              <div class="col-md-6">
                <label style="color:black">Produk / Solusi</label>
                <input type="text" maxlength="150" name="produk_solusi" id="produk_solusi"
                  placeholder="Produk / Solusi" class="form-control" required="">
              </div>
            </div>

            <br>
            <div class="row">
              <div class="col-md-6">
                <label style="color:black">TKDN Produk</label>
                <input type="text" maxlength="150" name="tkdn" id="tkdn" placeholder="TKDN Produk"
                  class="form-control" required="">
              </div>
              <div class="col-md-6">
                <label style="color:black">Jenis</label>
                <select name="jenis_produk" id="jenis_produk" class="form-control" required="">
                  <option value="">Pilih Jenis</option>
                  <option value="1">Lokal</option>
                  <option value="2">Import</option>

                </select>
              </div>
            </div>

            <br>
            <div class="row">
              <div class="col-md-6">
                <label style="color:black">Harga</label>
                <input type="text" name="harga" id="harga" placeholder="Harga" class="form-control"
                  onkeydown="return numbersonly(this, event);"
                  onkeyup="javascript:tandaPemisahTitik(this);" required="">
              </div>
              <div class="col-md-6">
                <label style="color:black">Expired Harga</label>
                <input type="text" name="expired" id="expired" placeholder="Expired Harga"
                  class="form-control datepicker" style="background-color:white" readonly=""
                  required="">
              </div>
            </div>


            <br>
            <div class="row">
              <div class="col-md-12">
                <label style="color:black">Kategori</label>
                <select name="kategori_katalog" id="kategori_katalog" class="form-control" required="">
                  <option value="">Pilih Kategori</option>
                  <option value="tp_210309035914_27278">Alat Tulis Kantor</option>
                  <option value="tp_210926050357_54999">Electric</option>
                  <option value="ctg_19091244057_90897">Hardware</option>
                  <option value="tp_210309040057_65145">Jasa Konsultasi Perorangan</option>
                  <option value="tp_210309040039_68435">Jasa Konsultasi Perusahaan</option>
                  <option value="tp_210308113016_58001">Kendaraan Operasional</option>
                  <option value="tp_210309035940_26859">Peralatan Fotografi / Videografi</option>
                  <option value="tp_210308113208_91356">Property (Tanah atau Bangunan)</option>
                  <option value="tp_210310121024_29118">Rumah Tangga Kantor (RTK)</option>
                </select>
              </div>
            </div>



            <br>
            <div class="row">
              <div class="col-md-12">
                <label style="color:black">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control"
                  required=""></textarea>
              </div>
            </div>

            <br>
            <div class="row">
              <div class="col-md-12">
                <center>
                  <label style="color:black">Gambar</label>
                </center>
              </div>
            </div><br>

            <!--<div class="row">
                                                <div class="col-md-4">
                                                    <input type="file"  name="gambar[]" id="gambar_1" required>
                                                </div>
                                            </div>-->

            <div id="div_gambar_katalog"></div>

            <div class="text-left"><br>
              <button type="button" onclick="add_image()" style="background-color:#007bff;color:white"
                class="text-uppercase">+ Gambar</button>
            </div>

            <br><br>
            <div class="row">
              <div class="col-md-12">
                <center>
                  <label style="color:black">Dokumen Katalog</label>
                </center>
              </div>
            </div>

            <!--<div class="row">
                                                <div class="col-md-6">
                                                    <input type="text"  maxlength="150" name="doc_name[]" id="doc_name_1" placeholder="Nama Dokumen" class="form-control" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="file"  name="doc_file[]" id="dokumen_1" required>
                                                </div>
                                            </div>-->

            <div id="div_dokumen_katalog"></div>


            <div class="text-left"><br>
              <button onclick="add_doc_katalog()" type="button"
                style="background-color:#007bff;color:white" class="text-uppercase">+ Dokumen</button>
            </div>

            <div class="text-center"><br>
              <input type="hidden" name="_token" value="QRFR6JcK4uAHU7uFqIeOKr3fr1HGKlF3JpmDxGhH">
              <button type="submit" class="text-uppercase">Simpan</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>