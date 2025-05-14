<div id="wrapper">
    <?php include_once(ROOT_PATH . "#include/component/fragment/management/sidebar.php"); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php include_once(ROOT_PATH . "#include/component/fragment/management/navbar.php"); ?>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <h1 class="mt-0 mb-4 font-bold">Manage Vendor</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Company</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>PT A</td>
                                            <td>Andi</td>
                                            <td>Andi</td>
                                            <td>andi@gmail.com</td>
                                            <td>Aktif</td>
                                            <td class="center">
                                                <button class="btn btn-info">Edit</button>
                                                <button class="btn btn-danger">Hapus</button>
                                                <button class="btn btn-warning">Detail</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PT B</td>
                                            <td>Budi</td>
                                            <td>Budi</td>
                                            <td>budi@gmail.com</td>
                                            <td>Aktif</td>
                                            <td class="center">
                                                <button class="btn btn-info">Edit</button>
                                                <button class="btn btn-danger">Hapus</button>
                                                <button class="btn btn-warning">Detail</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PT C</td>
                                            <td>Tono</td>
                                            <td>Tono</td>
                                            <td>tono@gmail.com</td>
                                            <td>Aktif</td>
                                            <td class="center">
                                                <button class="btn btn-info">Edit</button>
                                                <button class="btn btn-danger">Hapus</button>
                                                <button class="btn btn-warning">Detail</button>
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