<nav class="navbar navbar-expand-lg navbar-light py-3 px-4 nav-md" style="overflow: hidden;">

  <div class="logo">
    <a href="<?= SERVER_NAME ?>">
      <img src="<?= SERVER_NAME ?>assets/images/logo/logo-e-procurement.png" alt="JobHere">
    </a>
  </div>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent" style="gap: 20px;">

    <ul class="main-menu">
      <li><a href="<?= SERVER_NAME ?>" <?= $title == 'Home' ? 'class="active"' : '' ?>>Home</a></li>
      <li><a href="<?= SERVER_NAME ?>about" <?= $title == 'Tentang' ? 'class="active"' : '' ?>>Tentang</a></li>
      <li><a href="<?= SERVER_NAME ?>tender" <?= (strpos($title, 'Tender') !== false) ? 'class="active"' : '' ?>>Pengadaan</a></li>
      <li><a href="<?= SERVER_NAME ?>news" <?= (strpos($title, 'News') !== false) ? 'class="active"' : '' ?>>Berita</a></li>
      <li><a href="<?= SERVER_NAME ?>portal">Portal</a></li>
    </ul>


    <div class="login-btn">
      <?php if (isset($_SESSION['email']) && isset($_SESSION['is_verify']) && $_SESSION['is_verify'] == '1') { ?>
        <a class="modal-view button z-0" style="cursor:pointer;" href="<?= SERVER_NAME ?>vendor_area/user">My Info</a>
      <?php } else { ?>
        <a class="modal-view button z-0" style="cursor:pointer;" href="<?= SERVER_NAME ?>register">Daftar</a>
      <?php } ?>
      <?php if (isset($_SESSION['email']) && isset($_SESSION['is_verify']) && $_SESSION['is_verify'] == '1') { ?>
        <a class="modal-view button z-0" style="cursor:pointer;" href="<?= SERVER_NAME ?>handler/auth/logout.php">Logout</a>
      <?php } else { ?>
        <a class="modal-view button z-0 text-white" style="cursor:pointer;" data-toggle="modal" data-target="#LoginModal">Login</a>
      <?php } ?>
    </div>
  </div>

</nav>