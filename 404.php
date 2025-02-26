<?php
include_once __DIR__ . "/#include/config.php";
require_once ROOT_PATH . "#include/#class/Autoload.php";

$current_menu = "404";
$current_sub_menu = NULL;
$title = "Page Not Found";

require_once ROOT_PATH . '#include/component/header.php';
require_once ROOT_PATH . '#include/component/navbar.php';
?>

<!-- Start 404 
    ============================================= -->
<section class="error-page-area text-center default-padding default-padding-top">
  <div class="container">
    <div class="row align-center">
      <div class="col-lg-8 offset-lg-2">
        <div class="error-box">
          <h1>404</h1>
          <h2>Oops! That page can’t be found.</h2>
          <p>
            The page you are looking for might have been removed had its name changed or its temporarily unavailable.
          </p>
          <a class="btn circle btn-theme-border btn-theme-effect btn-md" href="<?= SERVER_NAME ?>">Back To Home</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End 404 -->

<?php
require_once ROOT_PATH . '#include/component/footer.php';
?>