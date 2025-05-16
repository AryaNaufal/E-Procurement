<?php
$menuMasterItems = [
    'catalog/' => 'Catalog Category',
    'departement/' => 'Departement',
    'scoring/' => 'Scoring',
    'sub-scoring/' => 'Sub Scoring',
    'user/' => 'User',
    'user-role/' => 'User Role',
    'vendor-type/' => 'Vendor Type',
    'vendor-category/' => 'Vendor Category',
    'vendor/' => 'Vendor',
    'blacklist-reason/' => 'Blacklist Reason'
];

$menuBudgetItems = [
    'budget/' => 'Budget',
    'budget-review/' => 'Budget Review',
];

$menuRequestItems = [
    'request/' => 'Request',
    'request-review/' => 'Request Review',
];

$currentUri = $_SERVER['REQUEST_URI'];
$activeMasterMenu = false;
$activeBudgetMenu = false;
$activeRequestMenu = false;

foreach ($menuBudgetItems as $path => $label) {
    if (strcasecmp($current_menu, $label) === 0) {
        $activeBudgetMenu = true;
        break;
    }
}

foreach ($menuRequestItems as $path => $label) {
    if (strcasecmp($current_menu, $label) === 0) {
        $activeRequestMenu = true;
        break;
    }
}

foreach ($menuMasterItems as $path => $label) {
    if (strcasecmp($current_menu, $label) === 0) {
        $activeMasterMenu = true;
        break;
    }
}
?>

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="<?= SERVER_NAME ?>assets/management/img/profile_small.jpg" />
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold"><?= $_SESSION['username'] ? $_SESSION['username'] : ''; ?></span>
                        <span class="block font-bold">
                        </span>
                        <span class="text-muted text-xs block"><?= $_SESSION['role'] ?> <b class="caret"></b></span>
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
            <li class="<?= $current_menu == 'dashboard' ? 'active' : ''; ?>">
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level <?= $current_menu == 'dashboard' ? '' : 'collapse'; ?>">
                    <li class="<?= $current_menu == 'dashboard' ? 'active' : ''; ?>"><a href="<?= SERVER_NAME ?>management/">Home</a></li>
                </ul>
            </li>

            <li class="<?= $activeMasterMenu ? 'active' : ''; ?>">
                <a href=""><i class="fa fa-book"></i> <span class="nav-label">Master</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level <?= $activeMasterMenu ? '' : 'collapse'; ?>">
                    <?php foreach ($menuMasterItems as $path => $label): ?>
                        <li class="<?= strcasecmp($current_menu, $label) === 0 ? 'active' : ''; ?>" style="width: 100%;">
                            <a href="<?= SERVER_NAME . 'management/' . trim($path, '/') ?>">
                                <?= $label ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>

            <li class="<?= $activeBudgetMenu ? 'active' : ''; ?>">
                <a href=""><i class="fa fa-money"></i> <span class="nav-label">Budget</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level <?= $activeBudgetMenu ? '' : 'collapse'; ?>">
                    <?php foreach ($menuBudgetItems as $path => $label): ?>
                        <li class="<?= strcasecmp($current_menu, $label) === 0 ? 'active' : ''; ?>" style="width: 100%;">
                            <a href="<?= SERVER_NAME . 'management/' . trim($path, '/') ?>">
                                <?= $label ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>

            <li class="<?= $activeRequestMenu ? 'active' : ''; ?>">
                <a href=""><i class="fa fa-copy"></i> <span class="nav-label">Request</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level <?= $activeRequestMenu ? '' : 'collapse'; ?>">
                    <?php foreach ($menuRequestItems as $path => $label): ?>
                        <li class="<?= strcasecmp($current_menu, $label) === 0 ? 'active' : ''; ?>" style="width: 100%;">
                            <a href="<?= SERVER_NAME . 'management/' . trim($path, '/') ?>">
                                <?= $label ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
    </div>
</nav>