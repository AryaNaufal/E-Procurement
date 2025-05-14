<div id="wrapper">
    <?php include_once(ROOT_PATH . "#include/component/fragment/management/sidebar.php"); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php include_once(ROOT_PATH . "#include/component/fragment/management/navbar.php"); ?>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <h1 class="mt-0 mb-4 font-bold">Manage User</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <button type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#myModal5" onclick="window.history.back()">
                                <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back
                            </button>

                            <form method="POST" action="<?= SERVER_NAME ?>handler/add-user.php" id="form_add_user">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" name="username" placeholder="Username" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full_name">Full Name</label>
                                            <input type="text" name="full_name" placeholder="Full Name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="no_telp">No Telp</label>
                                            <input type="text" name="no_telp" placeholder="No Telp" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="no_hp">No HP</label>
                                            <input type="text" name="no_hp" placeholder="No HP" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="group">Group</label>
                                            <select name="group" class="form-control" required>
                                                <option value="">-- Select Group --</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="departement">Departement</label>
                                            <select name="departement" class="form-control" required>
                                                <option value="">-- Select Departement --</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="address">Address</label>
                                            <textarea name="address" placeholder="Address" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 d-flex">
                                        <div class="form-group">
                                            <label class="form-label" for="group">Photo</label>
                                            <input type="file" name="photo" class="form-control border-0" required onchange="showImage(this)">
                                        </div>
                                        <img src="" id="preview-image" style="display:none; width:100%; height:200px; object-fit:scale-down; border-radius:5px; margin-top:10px;">
                                    </div>
                                </div>
                                <script>
                                    function showImage(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function(e) {
                                                $('#preview-image')
                                                    .attr('src', e.target.result)
                                                    .width(100 + '%')
                                                    .height(100 + 'px');
                                            };

                                            reader.readAsDataURL(input.files[0]);
                                            $('#preview-image').show();
                                        }
                                    }
                                </script>
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