<div id="wrapper">
    <?php include_once(ROOT_PATH . "#include/component/fragment/management/sidebar.php"); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php include_once(ROOT_PATH . "#include/component/fragment/management/navbar.php"); ?>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <h1 class="mt-0 mb-4 font-bold">Manage User Role</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <button type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#myModal5" onclick="window.history.back()">
                                <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back
                            </button>

                            <form action="">
                                <div class="row align-items-center mb-3">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="col-form-label" for="user_role_name">Group</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="user_role_name" id="user_role_name" placeholder="Group" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="col-form-label" for="parent_group">Parent Group</label>
                                            <select name="parent_group" id="parent_group" class="form-control h-auto" required>
                                                <option value="">-- Select Parent Group --</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary w-auto mt-3">
                                            Check All
                                        </button>
                                    </div>
                                </div>
                            </form>


                            <table class="easyui-treegrid" style="width:100%;border: none;" data-options="
                                url: '<?= SERVER_NAME ?>management/user-role/menu-user-role.json',
                                method: 'get',
                                rownumbers: true,
                                idField: 'id',
                                treeField: 'name',
                                fitColumns: true,
                                rownumbers: false,
                            ">
                                <thead>
                                    <tr>
                                        <th data-options="field:'name'" width="220">Menu</th>
                                        <th data-options="field:'read',formatter:formatCheckbox" width="100">Read</th>
                                        <th data-options="field:'add',formatter:formatCheckbox" width="150">Add</th>
                                        <th data-options="field:'edit',formatter:formatCheckbox" width="150">Edit</th>
                                        <th data-options="field:'delete',formatter:formatCheckbox" width="150">Delete</th>
                                        <th data-options="field:'all',formatter:formatIcon" width="150">All</th>
                                        <th data-options="field:'clear',formatter:formatIcon" width="150">Clear</th>
                                    </tr>
                                </thead>
                            </table>

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

<script>
    function formatCheckbox(value, row, index) {
        return '<input type="checkbox" ' + (value ? 'checked' : '') + '>';
    }

    function formatIcon(value, row, index) {
        if (value) {
            return '<span style="color: green;">✔</span>';
        } else {
            return '<span style="color: red;">✘</span>';
        }
    }
</script>