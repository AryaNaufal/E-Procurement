<div class="tab-pane container fade" id="menu4">
  <div class="text-left my-4">
    <button type="button" class="text-uppercase" style="color:white; background-color:#AA0A2F; border-radius: 5px;" data-toggle="modal" data-target="#pengadaan-modal">Tambah Pengadaan</button>
  </div>
  <div id="table_tender">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <th>
            <center>Nama Pengadaan</center>
          </th>
          <th>
            <center>Category</center>
          </th>
          <th>
            <center>Aksi</center>
          </th>
        </tr>
        <tr>
          <td>Pengadaan 1</td>
          <td>Kategori</td>
          <td>
            <a href="/edit_pengadaan.php?id=$row['id']" class='btn btn-primary btn-sm'>Edit</a>
            <a href="/delete_pengadaan.php?=$row['id']" class='btn btn-danger btn-sm'>Delete</a>
          </td>
        </tr>


      </tbody>
    </table>
  </div>
  <div id="detail_tender"></div>
  <div id="data_tender"></div>
  <?php include_once __DIR__ . '/../../fragment/pengadaan-modal.php'; ?>
</div>