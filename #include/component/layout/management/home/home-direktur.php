<div id="wrapper">
    <?php include_once(ROOT_PATH . "#include/component/fragment/management/sidebar.php"); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php include_once(ROOT_PATH . "#include/component/fragment/management/navbar.php"); ?>
        </div>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="col-form-label" for="date_modified">Tahun</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_modified" type="text" class="form-control" value="03/06/2014">
                        <button type="button" class="btn btn-outline btn-info mx-2">
                            <i class="fa fa-search"></i> Search
                        </button>
                        <button type="button" class="btn btn-outline btn-secondary" onclick="location.reload();">
                            <i class="fa fa-refresh"></i> Refresh
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox">
                        <div class="ibox-content" style="min-height: 500px;">
                            <div style="overflow: hidden; min-height: inherit;">
                                <canvas id="budgetChart" style="min-width: 100%; height: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox">
                        <div class="ibox-content" style="min-height: 500px;">
                            <div style="overflow: hidden; min-height: inherit;">
                                <canvas id="requestChart" style="min-width: 100%; height: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content" style="min-height: 500px;">
                            <div style="overflow: hidden; min-height: inherit;">
                                <canvas id="workflowChart" style="min-width: 100%; height: 100%;"></canvas>
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