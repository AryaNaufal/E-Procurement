<div id="wrapper">
    <?php include_once(ROOT_PATH . "#include/component/fragment/management/sidebar.php"); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php include_once(ROOT_PATH . "#include/component/fragment/management/navbar.php"); ?>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <h1 class="mt-0 mb-4">Manage User</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <a href="<?= SERVER_NAME ?>management/user/add-user.php">
                                <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#myModal5">
                                    <i class="fa fa-plus mr-2" aria-hidden="true"></i>Create User
                                </button>
                            </a>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Create At</th>
                                            <th>Update At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="<?= SERVER_NAME ?>assets/management/img/a1.jpg" alt=""></td>
                                            <td>Zulfi</td>
                                            <td>Zulfi</td>
                                            <td>zulfi@gmail.com</td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td class="center">
                                                <button class="btn btn-info">Edit</button>
                                                <button class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="<?= SERVER_NAME ?>assets/management/img/a2.jpg" alt=""></td>
                                            <td>Hendra</td>
                                            <td>Hendra</td>
                                            <td>hendra@gmail.com</td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td>6/05/2025 15:30:00</td>
                                            <td class="center">
                                                <button class="btn btn-info">Edit</button>
                                                <button class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="<?= SERVER_NAME ?>assets/management/img/a4.jpg" alt=""></td>
                                            <td>Zaenal</td>
                                            <td>Zaenal</td>
                                            <td>zaenal@gmail.com</td>
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