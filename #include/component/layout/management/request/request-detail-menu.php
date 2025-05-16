<div id="wrapper">
    <?php include_once(ROOT_PATH . "#include/component/fragment/management/sidebar.php"); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php include_once(ROOT_PATH . "#include/component/fragment/management/navbar.php"); ?>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <h1 class="mt-0 mb-4 font-bold">Detail Request Review</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <button type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#myModal5" onclick="window.history.back()">
                                <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back
                            </button>

                            <form method="POST" action="" id="form_request_detail">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="form-label font-bold">Status</span><br>
                                            <span class="label label-info" style="width: 200px; display: block; height: 35px; align-content: center; font-size: 13px; font-weight: 600;">
                                                Waiting Approval Manager
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="pengadaan">Pengadaan</label>
                                            <input type="text" name="pengadaan" id="pengadaan" placeholder="Budget Name" class="form-control" disabled>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="category">Category</label>
                                            <select name="category" id="category" class="form-control h-auto" disabled>
                                                <option value="">-- Choose Category --</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="publish">Publish Date</label>
                                            <input type="text" name="publish" id="publish" placeholder="Publish Date" class="form-control" value="<?= date('d/m/Y'); ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="delivery">Delivery Date</label>
                                            <input type="text" name="delivery" id="delivery" placeholder="Delivery Date" class="form-control" value="<?= date('d/m/Y'); ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="departement">Departement</label>
                                            <select name="departement" id="departement" class="form-control h-auto" disabled>
                                                <option value="">-- Choose Departement --</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="budgetName">Budget Name</label>
                                            <input type="text" name="budgetName" id="budgetName" class="form-control" placeholder="Pembelian 2 kendaraan operasional" disabled>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="budgetPlan">Budget Plan/Harga Perkiraan Sendiri(HPS)</label>
                                            <input type="text" name="budgetPlan" id="budgetPlan" class="form-control" placeholder="850.000.000" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="output">Output</label>
                                            <input type="text" name="output" id="output" placeholder="Output" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="form-label font-bold">Created</span>
                                            <div>
                                                <div class="d-flex align-items-center" style="gap: 10px;">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <p class="m-0">Riski Nur Rohman (Riski)</p>
                                                </div>
                                                <div class="d-flex align-items-center" style="gap: 10px;">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    <p class="m-0">16/05/2025</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="spesifikasi">Spesifikasi Teknis</label>
                                            <textarea placeholder="Kijang Innova" name="spesifikasi" id="spesifikasi" class="form-control" style="resize: none;" disabled></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="kualifikasi">Kualifikasi Vendor</label>
                                            <textarea placeholder="Showroom Toyota" name="kualifikasi" id="kualifikasi" class="form-control" style="resize: none;" disabled></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="description">Description</label>
                                            <textarea placeholder="Description" name="description" id="description" class="form-control" style="resize: none;" disabled></textarea>
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
                                            <textarea name="approval" id="approval" placeholder="Approval Notes" class="form-control"></textarea>
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