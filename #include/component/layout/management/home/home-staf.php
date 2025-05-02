<div id="wrapper">
    <?php include_once(ROOT_PATH . "#include/component/fragment/management/sidebar.php"); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php include_once(ROOT_PATH . "#include/component/fragment/management/navbar.php"); ?>
        </div>
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox d-flex align-items-center" style="background-color: white; border-radius: 5px; padding: 10px;">
                        <div class="" style="background-color: #FE7743; border-radius: 100%;padding: 0 15px;margin: 10px;height: fit-content;padding: 20px;">
                            <i class="fa fa-gavel" style="color: white; font-size: 30px;"></i>
                        </div>
                        <div class="">
                            <h1 class="no-margins">6</h1>
                            <h4>Semua Tender</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox d-flex align-items-center" style="background-color: white; border-radius: 5px; padding: 10px;">
                        <div class="" style="background-color: #03A791; border-radius: 100%;padding: 0 15px;margin: 10px;height: fit-content;padding: 20px;">
                            <i class="fa fa-tag" style="color: white; font-size: 30px;"></i>
                        </div>
                        <div class="">
                            <h1 class="no-margins">4</h1>
                            <h4>Tender Baru</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox d-flex align-items-center" style="background-color: white; border-radius: 5px; padding: 10px;">
                        <div class="" style="background-color: #9966FF; border-radius: 100%;padding: 0 15px;margin: 10px;height: fit-content;padding: 20px;">
                            <i class="fa fa-money" style="color: white; font-size: 30px;"></i>
                        </div>
                        <div class="">
                            <h1 class="no-margins">0</h1>
                            <h4>Tender Selesai</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox d-flex align-items-center" style="background-color: white; border-radius: 5px; padding: 10px;">
                        <div class="" style="background-color: #90C67C; border-radius: 100%;padding: 0 15px;margin: 10px;height: fit-content;padding: 20px;">
                            <i class="fa fa-eye" style="color: white; font-size: 30px;"></i>
                        </div>
                        <div class="">
                            <h1 class="no-margins">22</h1>
                            <h4>Vendor</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>TIPE</h5>
                        </div>
                        <div class="ibox-content d-flex justify-content-center w-100">
                            <div>
                                <canvas id="tenderType" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>STATUS TENDER</h5>
                        </div>
                        <div class="ibox-content d-flex justify-content-center w-100">
                            <div>
                                <canvas id="tenderStatus" height="400"></canvas>
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