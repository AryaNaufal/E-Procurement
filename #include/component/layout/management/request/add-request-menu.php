<div id="wrapper">
    <?php include_once(ROOT_PATH . "#include/component/fragment/management/sidebar.php"); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php include_once(ROOT_PATH . "#include/component/fragment/management/navbar.php"); ?>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <h1 class="mt-0 mb-4 font-bold">Create Request</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <button type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#myModal5" onclick="window.history.back()">
                                <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back
                            </button>

                            <form method="POST" action="" id="form_add_request">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="budget">Budget</label>
                                            <select name="budget" id="budget" class="form-control h-auto" required>
                                                <option value="">-- Choose Budget --</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="createdBy">Pengadaan</label>
                                            <input type="text" name="createdBy" id="createdBy" placeholder="Pengadaan" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="publish">Publish Date</label>
                                            <input type="text" name="publish" id="publish" placeholder="Publish Date" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="category">Category</label>
                                            <select name="category" id="category" class="form-control h-auto" required>
                                                <option value="">-- Choose Category --</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="deliveryDate">Delivery Date</label>
                                            <input type="text" name="deliveryDate" id="deliveryDate" placeholder="Delivery Date" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label font-bold" for="description">Description</label>
                                            <textarea class="summernote" name="description" id="description" class="form-control" autocomplete="off" rows="30"></textarea>
                                        </div>

                                        <div class="custom-file">
                                            <button type="button" class="btn btn-primary" onclick="$('input[name=attachment]').click()"><i class="fa fa-file mr-2"></i> Add File To Upload</button>
                                            <input type="file" name="attachment" id="attachment" class="form-control d-none">
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