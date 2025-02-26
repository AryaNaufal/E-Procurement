<!doctype html>
<html lang="en">

<head>
  <!-- Required Meta Tag -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/icon/favicon.ico">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/portal/css/global.css">
  <link rel="stylesheet" href="assets/portal/css/color.css">
  <link rel="stylesheet" href="assets/portal/css/style.css">
  <link rel="stylesheet" href="assets/portal/css/responsive.css">
  <title>Portal</title>
</head>

<body>
  <div class="h-100">
    <!-- START: Navbar -->
    <ul class="nav bg-primary py-3 text-center rounded-b-3xl">
      <div class="container">
        <li class="nav-item">
          <img src="assets/portal/img/logo.svg" alt="" srcset="" width="170">
        </li>
      </div>
    </ul>
    <!-- END: Navbar -->

    <!-- START: Content -->
    <div class="container h-100 py-4" id="content">
      <div class="row gap-y-10 h-100">
        <div class="col-12 col-md-4 align-self-center">
          <div class="card card-portal bg-white rounded-xl border-0 box-shadow-lg overflow-hidden position-relative">
            <div class="d-flex h-100 align-items-stretch">
              <img src="assets/portal/img/vendor.svg" alt="" srcset="" class="img-fluid m-auto">
            </div>
            <div class="card-footer bg-primary text-white text-center border-0 py-4 mt-auto">
              <span class="font-semibold text-xl">Vendor</span>
            </div>
            <a href="<?= SERVER_NAME ?>" class="stretched-link"></a>
          </div>
        </div>


        <div class="col-12 col-md-4 align-self-center">
          <div class="card card-portal bg-white rounded-xl border-0 box-shadow-lg overflow-hidden position-relative">
            <div class="d-flex h-100 align-items-stretch">
              <img src="assets/portal/img/management.svg" alt="" srcset="" class="img-fluid m-auto">
            </div>
            <div class="card-footer bg-primary text-white text-center border-0 py-4 mt-auto">
              <span class="font-semibold text-xl">Management</span>
            </div>
            <a href="<?= SERVER_NAME ?>management" class="stretched-link"></a>
          </div>
        </div>


        <div class="col-12 col-md-4 align-self-center">
          <div class="card card-portal bg-white rounded-xl border-0 box-shadow-lg overflow-hidden position-relative">
            <div class="d-flex h-100 align-items-stretch">
              <img src="assets/portal/img/e-auction.svg" alt="" srcset="" class="img-fluid m-auto">
            </div>
            <div class="card-footer bg-primary text-white text-center border-0 py-4 mt-auto">
              <span class="font-semibold text-xl">E-Auction</span>
            </div>
            <a href="<?= SERVER_NAME ?>e-auction" class="stretched-link"></a>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content -->
    <div class="nav fixed-bottom py-3 d-none d-md-flex bg-white w-auto">
      <span class="mt-auto mx-auto font-medium">Antara SIPOL 2023 ©. All rights reserved.</span>
    </div>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>