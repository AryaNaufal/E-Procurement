<div class="tab-pane container fade" id="menu3">
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
      <?php foreach ($katalogs['data'] as $katalog): ?>
        <tr>
          <td><?= $katalog['produk_solusi'] ?></td>
          <td><?= $katalog['kategori'] ?></td>
          <td><?= 'Rp ' . number_format($katalog['harga'], 0, ',', '.') ?></td>
          <td>
            <a href="<?= SERVER_NAME ?>vendor_area/katalog/edit.php?id=<?= $katalog['id'] ?>" class='btn btn-primary btn-sm'>Edit</a>
            <button class="btn btn-danger btn-sm text-capitalize delete-katalog-btn" data-id="<?= $katalog['id'] ?>">Delete</button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php include_once __DIR__ . '/../../fragment/katalog-modal.php'; ?>
</div>