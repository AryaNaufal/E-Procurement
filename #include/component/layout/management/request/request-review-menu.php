<div id="wrapper">
    <?php include_once(ROOT_PATH . "#include/component/fragment/management/sidebar.php"); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php include_once(ROOT_PATH . "#include/component/fragment/management/navbar.php"); ?>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <h1 class="mt-0 mb-4 font-bold">Request Review</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Pengadaan</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th>Publish Data</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pembelian 100 Mouse</td>
                                            <td>Pengadaan Barang dan Jasa</td>
                                            <td class="center">
                                                <span class="label label-info"><i class="fa fa-paper-plane mr-2" aria-hidden="true"></i>Publish</span>
                                            </td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td class="center">
                                                <a href="<?= SERVER_NAME ?>management/request/request-detail">
                                                    <button class="btn btn-warning"><i class="fa fa-file mr-2"></i>Detail</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pembelian 100 Laptop</td>
                                            <td>Pengadaan Barang dan Jasa</td>
                                            <td class="center">
                                                <span class="label label-danger"><i class="fa fa-ban mr-2" aria-hidden="true"></i>Closed</span>
                                            </td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td class="center">
                                                <a href="<?= SERVER_NAME ?>management/request/request-detail">
                                                    <button class="btn btn-warning"><i class="fa fa-file mr-2"></i>Detail</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pembelian 200 Laptop</td>
                                            <td>Pengadaan Barang dan Jasa</td>
                                            <td class="center">
                                                <span class="label label-success"><i class="fa fa-check mr-2" aria-hidden="true"></i>Approved</span>
                                            </td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td class="center">
                                                <a href="<?= SERVER_NAME ?>management/request/request-detail">
                                                    <button class="btn btn-warning"><i class="fa fa-file mr-2"></i>Detail</button>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="float-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2018
            </div>
        </div>
    </div>
</div>