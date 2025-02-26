<nav class="navbar navbar-expand-lg navbar-light py-3" style="overflow: hidden;">

  <div class="logo">
    <a href="<?= SERVER_NAME ?>">
      <img src="<?= SERVER_NAME ?>assets/images/logo/antara-logo-colour.png" alt="JobHere">
    </a>
  </div>

  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent" style="gap: 20px;">

    <ul class="main-menu">
      <li><a href="<?= SERVER_NAME ?>" <?= $active = strrchr($_SERVER['REQUEST_URI'], '/') == '/' || strrchr($_SERVER['REQUEST_URI'], '/') == '/index' ? 'class="active"' : '' ?>>Home</a></li>
      <li><a href="<?= SERVER_NAME ?>about" <?= $active = strrchr($_SERVER['REQUEST_URI'], '/') == '/about' ? 'class="active"' : '' ?>>Tentang</a></li>
      <li><a href="<?= SERVER_NAME ?>tender" <?= $active = strrchr($_SERVER['REQUEST_URI'], '/') == '/tender' ? 'class="active"' : '' ?>>Pengadaan</a></li>
      <li><a href="<?= SERVER_NAME ?>news" <?= $active = strrchr($_SERVER['REQUEST_URI'], '/') == '/news' ? 'class="active"' : '' ?>>Berita</a></li>
      <li><a href="<?= SERVER_NAME ?>portal" <?= $active = strrchr($_SERVER['REQUEST_URI'], '/') == '/portal' ? 'class="active"' : '' ?>>Portal</a></li>
    </ul>


    <div class="login-btn">
      <?php if (isset($_SESSION['email']) && isset($_SESSION['is_verify']) && $_SESSION['is_verify'] == '1') { ?>
        <a class="modal-view button" style="cursor:pointer;" href="<?= SERVER_NAME ?>vendor_area/user">My Info</a>
      <?php } else { ?>
        <a class="modal-view button" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#RegisterModal">Daftar</a>
      <?php } ?>
      <?php if (isset($_SESSION['email']) && isset($_SESSION['is_verify']) && $_SESSION['is_verify'] == '1') { ?>
        <a class="modal-view button" style="cursor:pointer;" href="<?= SERVER_NAME ?>handler/auth/logout.php">Logout</a>
      <?php } else { ?>
        <a class="modal-view button" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#LoginModal">Login</a>
      <?php } ?>
    </div>
  </div>

</nav>