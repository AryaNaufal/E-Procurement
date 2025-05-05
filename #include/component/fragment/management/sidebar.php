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
            <li <?= (basename($_SERVER['REQUEST_URI']) == 'katalog' || basename($_SERVER['REQUEST_URI']) == 'departement' || basename($_SERVER['REQUEST_URI']) == 'scoring' || basename($_SERVER['REQUEST_URI']) == 'sub-scoring' || basename($_SERVER['REQUEST_URI']) == 'vendor-type' || basename($_SERVER['REQUEST_URI']) == 'vendor-category' || basename($_SERVER['REQUEST_URI']) == 'vendor' || basename($_SERVER['REQUEST_URI']) == 'blacklist-reason') ? 'class="active"' : ''; ?>>
                <a href="index.html"><i class="fa fa-book"></i> <span class="nav-label">Master</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li <?= (basename($_SERVER['REQUEST_URI']) == 'katalog') ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/katalog.php">Catalog Category</a></li>
                    <li <?= (basename($_SERVER['REQUEST_URI']) == 'departement') ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/departement.php">Departement</a></li>
                    <li <?= (basename($_SERVER['REQUEST_URI']) == 'scoring') ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/scoring.php">Scoring</a></li>
                    <li <?= (basename($_SERVER['REQUEST_URI']) == 'sub-scoring') ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/sub-scoring.php">Sub Scoring</a></li>
                    <li <?= (basename($_SERVER['REQUEST_URI']) == 'vendor-type') ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/vendor-type.php">Vendor Type</a></li>
                    <li <?= (basename($_SERVER['REQUEST_URI']) == 'vendor-category') ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/vendor-category.php">Vendor Category</a></li>
                    <li <?= (basename($_SERVER['REQUEST_URI']) == 'vendor') ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/vendor.php">Vendor</a></li>
                    <li <?= (basename($_SERVER['REQUEST_URI']) == 'blacklist-reason') ? 'class="active"' : ''; ?>><a href="<?= SERVER_NAME ?>management/blacklist-reason.php">Blacklist Reason</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>