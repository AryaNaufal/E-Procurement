<section style="min-height: calc(100vh - 150px);">
  <!--Breadcrumb Banner Area Start-->
  <div class="breadcrumb-banner-area pt-30 pb-10 bg-5" style="background-position: 0px -100px; background-size: cover; background-repeat: no-repeat;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-text">
            <h2 class="text-center text-white">Vendor Information</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End of Breadcrumb Banner Area-->

  <!-- About Area Start -->
  <div class="about-area ptb-130 ptb-sm-60" style="padding-top: 45px !important;">
    <div class="container px-auto">
      <div class="row">
        <?php include_once ROOT_PATH . '#include/component/fragment/breadcrumb-nav.php'; ?>
        <div class="col-lg-12 px-0">
          <div class="tab-content">
            <?php
            include_once ROOT_PATH . '#include/component/layout/vendor_area/profile/profile-layout.php';
            include_once ROOT_PATH . '#include/component/layout/vendor_area/company/company-layout.php';
            include_once ROOT_PATH . '#include/component/layout/vendor_area/document/dokumen-layout.php';
            include_once ROOT_PATH . '#include/component/layout/vendor_area/catalog/catalog-layout.php';
            include_once ROOT_PATH . '#include/component/layout/vendor_area/tender/tender-layout.php';
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>