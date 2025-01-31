<nav style="--bs-breadcrumb-divider: 'none';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <?php
    $current_page = basename($_SERVER['PHP_SELF'], '.php');
    $pages = [
      'my-info' => 'Profile',
      'data-perusahaan' => 'Data Perusahaan',
      'dokumen' => 'Dokumen',
      'e-katalog' => 'E-Katalog',
      'pengadaan' => 'Pengadaan'
    ];
    foreach ($pages as $page => $title) {
      echo $current_page == $page
        ? '<li class="breadcrumb-item active" aria-current="page">' . $title . '</li>'
        : '<li class="breadcrumb-item"><a href="' . SERVER_NAME . 'vendor_area/user/' . $page . '">' . $title . '</a></li>';
    }
    ?>
  </ol>
</nav>