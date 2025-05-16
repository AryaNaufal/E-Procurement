<div id="wrapper">
    <?php include_once(ROOT_PATH . "#include/component/fragment/management/sidebar.php"); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php include_once(ROOT_PATH . "#include/component/fragment/management/navbar.php"); ?>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <h1 class="mt-0 mb-4 font-bold">Manage Budget</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <a href="<?= SERVER_NAME ?>management/budget/add-budget.php">
                                <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#myModal5">
                                    <i class="fa fa-plus mr-2" aria-hidden="true"></i>Create Budget
                                </button>
                            </a>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nama Budget</th>
                                            <th>Harga perkiraan Sendiri (HPS)</th>
                                            <th>Metode Pengadaan</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Last Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Budget 1</td>
                                            <td>Rp. 10.000.000</td>
                                            <td>Pengadaan Langsung</td>
                                            <td class="center">
                                                <span class="label label-success"><i class="fa fa-check mr-2"></i>Approved</span>
                                            </td>
                                            <td>16/05/2025</td>
                                            <td>16/05/2025</td>
                                            <td class="center">
                                                <a href="<?= SERVER_NAME ?>management/budget/budget-detail.php">
                                                    <button class="btn btn-warning"><i class="fa fa-file mr-2"></i>Detail</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Budget 2</td>
                                            <td>Rp. 20.000.000</td>
                                            <td>-</td>
                                            <td class="center">
                                                <span class="label label-success"><i class="fa fa-check mr-2"></i>Approved</span>
                                            </td>
                                            <td>16/05/2025</td>
                                            <td>16/05/2025</td>
                                            <td class="center">
                                                <a href="<?= SERVER_NAME ?>management/budget/budget-detail.php">
                                                    <button class="btn btn-warning"><i class="fa fa-file mr-2"></i>Detail</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Budget 3</td>
                                            <td>Rp. 30.000.000</td>
                                            <td>-</td>
                                            <td class="center">
                                                <span class="label label-danger"><i class="fa fa-times mr-2" aria-hidden="true"></i>Rejected By Manager</span>
                                            </td>
                                            <td>16/05/2025</td>
                                            <td>16/05/2025</td>
                                            <td class="center">
                                                <a href="<?= SERVER_NAME ?>management/budget/budget-detail.php">
                                                    <button class="btn btn-warning"><i class="fa fa-file mr-2"></i>Detail</button>
                                                </a>
                                                <button class="btn btn-primary"><i class="fa fa-pencil mr-2"></i>Update</button>
                                                <button class="btn btn-danger"><i class="fa fa-trash mr-2"></i>Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Budget 4</td>
                                            <td>Rp. 40.000.000</td>
                                            <td>-</td>
                                            <td class="center">
                                                <span class="label label-success"><i class="fa fa-check mr-2"></i>Approved</span>
                                            </td>
                                            <td>16/05/2025</td>
                                            <td>16/05/2025</td>
                                            <td class="center">
                                                <a href="<?= SERVER_NAME ?>management/budget/budget-detail.php">
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