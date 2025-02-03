<?php
// echo $_SESSION['email'];
?>
<div class="container-fluid overflow-hidden w-100">
  <div class="row">
    <div class="col-sm-6 col-lg-6">
      <!-- <div class="logo">
                 assets/images/logo/LogoSIPOL.png" alt="JobHere" height="100" width="100"></a>
                    </div> -->
      <div class="logo"><a href="<?= SERVER_NAME ?>index"><br><img
            src="<?= SERVER_NAME ?>assets/images/logo/antara-logo-colour.png" alt="JobHere"></a></div>
    </div>
    <div class="col-sm-6 col-lg-6">
      <div class="pull-right header-menu">
        <nav id="primary-menu">
          <ul class="main-menu text-right">
            <li><a href="<?= SERVER_NAME ?>index.php" style="cursor:pointer;">Home</a></li>
            <li><a href="<?= SERVER_NAME ?>tentang.php" style="cursor:pointer;">Tentang</a></li>
            <li><a href="<?= SERVER_NAME ?>tender.php" style="cursor:pointer;">Tender</a></li>
            <li><a href="<?= SERVER_NAME ?>news.php" style="cursor:pointer;">News</a></li>
            <li><a href="<?= SERVER_NAME ?>portal.php" style="cursor:pointer;">Portal</a></li>
          </ul>
        </nav>
        <div class="login-btn">
          <?php if (isset($_SESSION['email'])) { ?>
            <a class="modal-view button" style="cursor:pointer;" href="<?= SERVER_NAME ?>vendor_area/user/my-info">My Info</a>
          <?php } else { ?>
            <a class="modal-view button" style="cursor:pointer;" data-toggle="modal" data-target="#RegisterModal">Daftar</a>
          <?php } ?>
          <?php if (isset($_SESSION['email'])) { ?>
            <a class="modal-view button" style="cursor:pointer;" href="<?= SERVER_NAME ?>handler/logout-handler">Logout</a>
          <?php } else { ?>
            <a class="modal-view button" style="cursor:pointer;" data-toggle="modal" data-target="#LoginModal">Login</a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>