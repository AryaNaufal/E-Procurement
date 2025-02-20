<section class="tab-pane fade" id="menu3">
  <div class="text-left my-4">
    <button type="button" class="text-uppercase" style="color:white; background-color:#AA0A2F; border-radius: 5px;" data-toggle="modal" data-target="#katalog-modal">Tambah E-Katalog</button>
  </div>
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th>
          <center>Produk/Solusi</center>
        </th>
        <th>
          <center>Category</center>
        </th>
        <th>
          <center>Harga (IDR)</center>
        </th>
        <th>
          <center>Aksi</center>
        </th>
      </tr>
      <?php if (isset($katalogs['status']) && $katalogs['status'] === 'success' && !empty($katalogs['data'])): ?>
        <?php foreach ($katalogs['data'] as $katalog): ?>
          <tr>
            <td><?= $katalog['produk_solusi'] ?></td>
            <td><?= $katalog['kategori'] ?></td>
            <td><?= 'Rp ' . number_format($katalog['harga'], 0, ',', '.') ?></td>
            <td>
              <a href="<?= SERVER_NAME ?>vendor_area/katalog/edit?id=<?= $katalog['id'] ?>" class='btn btn-primary btn-sm'>Edit</a>
              <button class="btn btn-danger btn-sm text-capitalize delete-katalog-btn" data-id="<?= $katalog['id'] ?>">Delete</button>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
  <?php include_once __DIR__ . '/../../fragment/katalog-modal.php'; ?>
</section>


<script>
  document.querySelectorAll('.delete-katalog-btn').forEach(button => {
    button.addEventListener('click', function(event) {
      event.preventDefault();
      const katalogId = this.getAttribute('data-id');
      Swal.fire({
          title: 'Hapus Katalog',
          text: "Apakah kamu ingin menghapus katalog ini?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#007bff',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ok',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            // Tampilkan loading
            document.getElementById('loader').style.display = 'block';
            fetch(`<?= SERVER_NAME ?>handler/katalog/delete?id=${katalogId}`, {
                method: 'POST',
                credentials: 'include'
              })
              .then(response => response.json())
              .then(data => {
                document.getElementById('loader').style.display = 'none';
                if (data.status == 'success') {
                  Swal.fire({
                    title: 'Berhasil',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                  }).then(() => {
                    window.location.href = '<?= SERVER_NAME ?>vendor_area/user/';
                  });
                } else {
                  Swal.fire({
                    title: 'Gagal',
                    text: data.message,
                    icon: 'error',
                    confirmButtonText: 'Ok'
                  });
                }
              });
          }
        })
        .catch(error => {
          document.getElementById('loader').style.display = 'none';
          Swal.fire({
            title: 'Gagal',
            text: 'Terjadi kesalahan saat menghubungi server.',
            icon: 'error',
            confirmButtonText: 'Ok'
          })
        });
    });
  });
</script>