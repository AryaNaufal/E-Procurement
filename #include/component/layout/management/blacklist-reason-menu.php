<div id="wrapper">
    <?php include_once(ROOT_PATH . "#include/component/fragment/management/sidebar.php"); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php include_once(ROOT_PATH . "#include/component/fragment/management/navbar.php"); ?>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <h1 class="mt-0 mb-4 font-bold">Blacklist Reason</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#myModal5">
                                <i class="fa fa-plus mr-2" aria-hidden="true"></i>Add
                            </button>
                            <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="">
                                                <div class="form-group"><label>Reason</label> <input type="email" placeholder="Blacklist Reason" class="form-control"></div>
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
                                            <th>Reason</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gradeX">
                                            <td>Mengundurkan diri atau tidak menandatangani kontrak yang sudah katalog</td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td class="center">
                                                <button class="btn btn-info">Edit</button>
                                                <button class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                        <tr class="gradeC">
                                            <td>Mengundurkan diri dengan alasan yang tidak dapat diterima Pejabat Pengadaan/Pokja Pemilihan</td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td class="center">
                                                <button class="btn btn-info">Edit</button>
                                                <button class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Mengundurkan diri sebelum penandatanganan Kontrak dengan alasan yang tidak dapat diterima oleh PPK</td>
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