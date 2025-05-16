<div id="wrapper">
    <?php include_once(ROOT_PATH . "#include/component/fragment/management/sidebar.php"); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php include_once(ROOT_PATH . "#include/component/fragment/management/navbar.php"); ?>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <h1 class="mt-0 mb-4 font-bold">Detail Budget Review</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <button type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#myModal5" onclick="window.history.back()">
                                <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back
                            </button>

                            <form method="POST" action="" id="form_detail_budget">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="budgetName">Budget Name</label>
                                            <input type="text" name="budgetName" id="budgetName" placeholder="Budget Name" class="form-control" disabled>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="createdBy">Created By</label>
                                            <input type="text" name="createdBy" id="createdBy" placeholder="Created By" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="departement">Departement</label>
                                            <input type="text" name="departement" id="departement" placeholder="Departement" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="hargaPerkiraan">Harga Perkiraan Sendiri (HPS)</label>
                                            <input type="text" name="hargaPerkiraan" id="hargaPerkiraan" placeholder="Rp." class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="spesifikasi">Spesifikasi Teknis</label>
                                            <textarea name="spesifikasi" id="spesifikasi" placeholder="Spesifikasi Teknis" class="form-control" disabled></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="kualifikasi">Kualifikasi Vendor</label>
                                            <textarea name="kualifikasi" id="kualifikasi" placeholder="Kualifikasi Vendor" class="form-control" disabled></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="output">Output</label>
                                            <input type="text" name="output" id="output" placeholder="Output" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="description">Description</label>
                                            <textarea name="description" id="description" placeholder="Description" class="form-control" disabled></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="attachment">Attachment</label>
                                            <div class="d-flex flex-wrap justify-content-between" style="border: 1px solid #ccc; padding: 20px;">
                                                <div>
                                                    <h4>Attachment Title</h4>
                                                    <p>tes</p>
                                                </div>
                                                <div>
                                                    <h4>Attachment File Name</h4>
                                                    <p>tes</p>
                                                </div>
                                                <div>
                                                    <h4>Attachment Size</h4>
                                                    <p>tes</p>
                                                </div>
                                                <button type="button" class="btn btn-primary" style="width: 40px; height: 40px;" onclick="$('input[name=attachment]').click()"> <i class="fa fa-download"></i></button>
                                                <input type="file" name="attachment" id="attachment" class="form-control d-none" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="approval">Approval Notes</label>
                                            <textarea name="approval" id="approval" placeholder="Approval Notes" class="form-control" disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
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