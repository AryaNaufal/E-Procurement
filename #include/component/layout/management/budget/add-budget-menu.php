<div id="wrapper">
    <?php include_once(ROOT_PATH . "#include/component/fragment/management/sidebar.php"); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php include_once(ROOT_PATH . "#include/component/fragment/management/navbar.php"); ?>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <h1 class="mt-0 mb-4 font-bold">Create Budget</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <button type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#myModal5" onclick="window.history.back()">
                                <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back
                            </button>

                            <form method="POST" action="" id="form_add_budget">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="budgetName">Budget Name</label>
                                            <input type="text" name="budgetName" id="budgetName" placeholder="Budget Name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="budgetPlan">Budget Plan</label>
                                            <div class="input-group date">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                <input id="budgetPlan" type="text" name="budgetPlan" class="form-control" value="<?= date('d/m/Y'); ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="departement">Departement</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                                </span>
                                                <select name="departement" id="departement" class="form-control">
                                                    <option value="">-- Select Departement --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="hargaPerkiraan">Harga Perkiraan Sendiri (HPS)</label>
                                            <input type="text" name="hargaPerkiraan" id="hargaPerkiraan" placeholder="Rp." class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="spesifikasi">Spesifikasi Teknis</label>
                                            <textarea name="spesifikasi" id="spesifikasi" placeholder="Spesifikasi Teknis" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="kualifikasi">Kualifikasi Vendor</label>
                                            <textarea name="kualifikasi" id="kualifikasi" placeholder="Kualifikasi Vendor" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="output">Output</label>
                                            <input type="text" name="output" id="output" placeholder="Output" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="description">Description</label>
                                            <textarea name="description" id="description" placeholder="Description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="description">Upload laporan</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <button type="button" class="btn btn-primary" onclick="$('input[name=attachment]').click()"><i class="fa fa-plus mr-2"></i> Add</button>
                                                    <input type="file" name="attachment" id="attachment" class="form-control d-none">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div style="text-align: right;">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
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