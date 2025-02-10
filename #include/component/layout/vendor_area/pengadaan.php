<div class="tab-pane container fade mt-4" id="menu4">
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
        <?php foreach ($tenders['data'] as $data): ?>
          <tr>
            <td><?= $data['description'] ?></td>
            <td><?= $data['category'] ?></td>
            <td class="text-center">
              <a href="<?= SERVER_NAME ?>vendor_area/tender/workflow.php?id=<?= $data['id'] ?>" class="text-success">
                <i class="fa fa-file" aria-hidden="true"></i>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div id="detail_tender"></div>
  <div id="data_tender"></div>
  <?php include_once __DIR__ . '/../../fragment/pengadaan-modal.php'; ?>
</div>