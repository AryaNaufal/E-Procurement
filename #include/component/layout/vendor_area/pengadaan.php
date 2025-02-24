<section class="tab-pane fade mt-4" id="pegadaan">
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
        <?php if (isset($followedTender['status']) && $followedTender['status'] === 'success' && !empty($followedTender['data'])): ?>
          <?php foreach ($followedTender['data'] as $data): ?>
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
        <?php else: ?>
          <tr>
            <td colspan="3" class="text-center">
              <?= $followedTender['message'] ?>
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  <div id="detail_tender"></div>
  <div id="data_tender"></div>
  <?php include_once __DIR__ . '/../../fragment/pengadaan-modal.php'; ?>
</section>