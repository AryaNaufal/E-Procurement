<div id="wrapper">
    <?php include_once(ROOT_PATH . "#include/component/fragment/management/sidebar.php"); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php include_once(ROOT_PATH . "#include/component/fragment/management/navbar.php"); ?>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <h1 class="mt-0 mb-4">Manage Scoring</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#myModal5">
                                <i class="fa fa-plus mr-2" aria-hidden="true"></i>Create Scoring
                            </button>
                            <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="category">Category</label>
                                                            <select name="category" id="category" class="form-control h-auto">
                                                                <option value="">-- Choose category --</option>
                                                                <option value="umum">Umum</option>
                                                                <option value="keuangan">Keuangan</option>
                                                                <option value="teknis">Teknis</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="nama_scoring">Nama Scoring</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                                                </div>
                                                                <input type="text" id="nama_scoring" name="nama_scoring" value="" placeholder="" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="scoring_quality">Scoring Quality</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-addon"><i class="fa fa-sort-alpha-asc"></i></span>
                                                                </div>
                                                                <input type="text" id="scoring_quality" name="scoring_quality" value="" placeholder="" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="scoring_harga">Scoring Harga</label>

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="scoring_harga" name="scoring_harga">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary float-right">submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nama Scoring</th>
                                            <th>Category</th>
                                            <th>Scoring Quality</th>
                                            <th>Scoring Price</th>
                                            <th>Create Date</th>
                                            <th>Last Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Harga</td>
                                            <td>Pengadaan Barang & Jasa</td>
                                            <td>30</td>
                                            <td>Yes</td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td class="center">
                                                <button class="btn btn-info">Edit</button>
                                                <button class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>Jasa Konsultasi Bidang Usaha</td>
                                            <td>30</td>
                                            <td>Yes</td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td class="center">
                                                <button class="btn btn-info">Edit</button>
                                                <button class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>Jasa Lainnya</td>
                                            <td>30</td>
                                            <td>Yes</td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td class="center">
                                                <button class="btn btn-info">Edit</button>
                                                <button class="btn btn-danger">Hapus</button>
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