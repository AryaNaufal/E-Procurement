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
      <tr>
        <td>Katalog 1</td>
        <td>Kategori</td>
        <td>100k</td>
        <td>
          <a href="/edit_pengadaan.php?id=$row['id']" class='btn btn-primary btn-sm'>Edit</a>
          <a href="/delete_pengadaan.php?=$row['id']" class='btn btn-danger btn-sm'>Delete</a>
        </td>
      </tr>
    </tbody>
  </table>
  <?php include_once __DIR__ . '/../../fragment/katalog-modal.php'; ?>
</div>