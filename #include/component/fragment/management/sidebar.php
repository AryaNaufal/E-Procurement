<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="<?= SERVER_NAME ?>assets/management/img/profile_small.jpg" />
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">Selamat Datang</span>
                        <span class="block font-bold">
                            <?php
                            $_SESSION['username'] ? print($_SESSION['username']) : print('');
                            ?></span>
                        <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                        <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                        <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a type="button" class="dropdown-item" onclick="location.href='<?= SERVER_NAME ?>handler/auth/logout.php'">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    <img src="<?= SERVER_NAME ?>assets/management/img/logo/logo-antara.png" alt="" style="max-width: 25px;">
                </div>
            </li>
            <li <?= basename($_SERVER['REQUEST_URI']) == 'management' ? 'class="active"' : ''; ?>>
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li <?= basename($_SERVER['REQUEST_URI']) == 'management' ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/">Home</a></li>
                </ul>
            </li>
            <li <?= (
                    strpos($_SERVER['REQUEST_URI'], 'katalog/') ||
                    strpos($_SERVER['REQUEST_URI'], 'departement/') ||
                    strpos($_SERVER['REQUEST_URI'], 'scoring/') ||
                    strpos($_SERVER['REQUEST_URI'], 'sub-scoring/') ||
                    strpos($_SERVER['REQUEST_URI'], 'user/') !== false ||
                    strpos($_SERVER['REQUEST_URI'], 'user-role/') ||
                    strpos($_SERVER['REQUEST_URI'], 'vendor-type/') ||
                    strpos($_SERVER['REQUEST_URI'], 'vendor-category/') ||
                    strpos($_SERVER['REQUEST_URI'], 'vendor/') ||
                    strpos($_SERVER['REQUEST_URI'], 'blacklist-reason/')) ? 'class="active"' : ''; ?>>
                <a href="index.html"><i class="fa fa-book"></i> <span class="nav-label">Master</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li <?= (strpos($_SERVER['REQUEST_URI'], 'katalog/')) ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/katalog">Catalog Category</a></li>
                    <li <?= (strpos($_SERVER['REQUEST_URI'], 'departement/')) ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/departement">Departement</a></li>
                    <li <?= (strpos($_SERVER['REQUEST_URI'], 'scoring/')) ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/scoring">Scoring</a></li>
                    <li <?= (strpos($_SERVER['REQUEST_URI'], 'sub-scoring/')) ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/sub-scoring">Sub Scoring</a></li>
                    <li <?= (strpos($_SERVER['REQUEST_URI'], 'user/')) ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/user">User</a></li>
                    <li <?= (strpos($_SERVER['REQUEST_URI'], 'user-role/')) ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/user-role">User Role</a></li>
                    <li <?= (strpos($_SERVER['REQUEST_URI'], 'vendor-type/')) ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/vendor-type">Vendor Type</a></li>
                    <li <?= (strpos($_SERVER['REQUEST_URI'], 'vendor-category/')) ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/vendor-category">Vendor Category</a></li>
                    <li <?= (strpos($_SERVER['REQUEST_URI'], 'vendor/')) ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/vendor">Vendor</a></li>
                    <li <?= (strpos($_SERVER['REQUEST_URI'], 'blacklist-reason/')) ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/blacklist-reason">Blacklist Reason</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>