<!DOCTYPE html>
<html
  class="js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths"
  lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <!-- favicon
    ============================================ -->
  <link rel="icon" href="assets/icon/favicon.ico">

  <!-- Google Fonts
    ============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- All css files are included here
    ============================================ -->
  <!-- Bootstrap CSS
    ============================================ -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- This core.css file contents all plugins css file
    ============================================ -->
  <link rel="stylesheet" href="assets/css/core.css">

  <!-- Theme shortcodes/elements style
    ============================================ -->
  <link rel="stylesheet" href="assets/css/shortcode/shortcodes.css">

  <!--  Theme main style
    ============================================ -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">


  <!-- Color CSS
          ============================================ -->
  <link rel="stylesheet" href="assets/css/plugins/color.css">

  <!-- Responsive CSS
    ============================================ -->
  <link rel="stylesheet" href="assets/css/responsive.css">

  <!-- Modernizr JS -->
  <script type="text/javascript" async=""
    src="https://www.gstatic.com/recaptcha/releases/iRvKkcsnpNcOYYwhqaQxPITz/recaptcha__id.js" crossorigin="anonymous"
    integrity="sha384-bu8oxO1mNFo1qyH3vU7LRuw4Kre09Mgu0V49KJs4xNN3yxmEGW/VTVltEbxnxUbv"></script>
  <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

  <!-- jquery latest version -->
  <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>

  <!-- Bootstrap framework js
    ========================================================= -->
  <script src="assets/js/bootstrap.min.js"></script>

  <script src="assets/js/rupiah.js"></script>

  <!-- Bootstrap DatePicker -->
  <script
    src="assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet"
    href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Loader Start  */
    #loader {
      display: none;
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url("assets/images/spinners/loading.gif") 50% 50% no-repeat #2d3436;
      background-size: 120px 120px;
      opacity: 0.8;
    }

    /* Loader End  */

    #message {
      margin-bottom: 0;
      padding-top: 20px;
      padding-bottom: 20px
    }
  </style>
</head>

<body>
  <div id="loader"></div>
  <?php
  include "fragment/login-modal.php";
  include "fragment/register-modal.php";
  include "fragment/reset-password-modal.php";
  ?>