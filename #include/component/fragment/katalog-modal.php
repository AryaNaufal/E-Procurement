<div class="modal fade" id="katalog-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" style="width:100%" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
      </div>
      <div class="modal-body">
        <div class="form-pop-up-content ptb-60 pl-60 pr-60">
          <p class="d-flex justify-content-center mb-5" id="modalCatalogtitle" style="font-size:15px;color:black">Tambah E-Katalog</p>
          <form method="POST" id="form_add_katalog" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label style="color:black">Kode Produk</label>
                <input type="text" maxlength="150" name="kode_produk" id="kode_produk"
                  placeholder="Kode Produk" class="form-control" required="">
              </div>
              <div class="col-md-6 mb-3">
                <label style="color:black">Produk / Solusi</label>
                <input type="text" maxlength="150" name="nama_produk" id="produk_solusi"
                  placeholder="Produk / Solusi" class="form-control" required="">
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label style="color:black">TKDN Produk</label>
                <input type="text" maxlength="150" name="tkdn_produk" id="tkdn" placeholder="TKDN Produk"
                  class="form-control" required="">
              </div>
              <div class="col-md-6 mb-3">
                <label style="color:black">Jenis</label>
                <select name="jenis_produk" id="jenis_produk" class="form-control" required="">
                  <option value="">Pilih Jenis</option>
                  <option value="lokal">Lokal</option>
                  <option value="import">Import</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label style="color:black">Harga</label>
                <input type="text" name="harga_produk" id="harga" placeholder="Harga" class="form-control"
                  onkeydown="return numbersonly(this, event);">
              </div>
              <div class="col-md-6 mb-3">
                <label style="color:black">Expired Harga</label>
                <input type="text" name="expired_harga" id="expired" placeholder="Expired Harga"
                  class="form-control datepicker" style="background-color:white" onkeydown="return numbersonly(this, event);" step="1">
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label style="color:black">Kategori</label>
                <select name="kategori_produk" id="kategori_katalog" class="form-control" required="">
                  <option value="">Pilih Kategori</option>
                  <option value="Alat Tulis Kantor">Alat Tulis Kantor</option>
                  <option value="Electric">Electric</option>
                  <option value="Hardware">Hardware</option>
                  <option value="Jasa Konsultasi Perorangan">Jasa Konsultasi Perorangan</option>
                  <option value="Jasa Konsultasi Perusahaan">Jasa Konsultasi Perusahaan</option>
                  <option value="Kendaraan Operasional">Kendaraan Operasional</option>
                  <option value="Perlengkapan Fotografi / Videografi">Perlengkapan Fotografi / Videografi</option>
                  <option value="Property">Property (Tanah atau Bangunan)</option>
                  <option value="Rumah Tangga Kantor">Rumah Tangga Kantor (RTK)</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label style="color:black">Deskripsi</label>
                <textarea name="deskripsi_produk" id="deskripsi" placeholder="Deskripsi" class="form-control"
                  required=""></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <label style="color:black">Foto Produk</label>
                <center>
                  <input type="file" name="photo">
                </center>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <label style="color:black">Dokumen</label>
                <center>
                  <input type="file" name="document">
                </center>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" name="submit_katalog" class="text-uppercase">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('form_add_katalog').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah form submission 
    Swal.fire({
      title: 'Tambah E-Katalog',
      text: "Apakah kamu ingin menambahkan katalog ini?",
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#007bff',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        // Tampilkan loading
        document.getElementById('loader').style.display = 'block';
        fetch(`<?= SERVER_NAME ?>handler/katalog/add`, {
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
                title: "Gagal!",
                text: data.message,
                icon: "error",
                button: "Ok",
              });
            }
          })
          .catch(error => {
            document.getElementById('loader').style.display = 'none';
            Swal.fire({
              title: "Error!",
              text: "Terjadi kesalahan pada server.",
              icon: "error",
              button: "Ok",
            });
          });
      }
    })
  })
</script>