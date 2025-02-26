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

  <!-- favicon -->
  <link rel="icon" href="<?= SERVER_NAME ?>assets/icon/favicon.ico">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- All css files are included here -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= SERVER_NAME ?>assets/css/bootstrap.min.css">

  <!-- This core.css file contents all plugins css file -->
  <link rel="stylesheet" href="<?= SERVER_NAME ?>assets/css/core.css">

  <!-- Theme shortcodes/elements style -->
  <link rel="stylesheet" href="<?= SERVER_NAME ?>assets/css/shortcode/shortcodes.css">

  <!--  Theme main style -->
  <link rel="stylesheet" href="<?= SERVER_NAME ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= SERVER_NAME ?>assets/css/font-awesome.min.css">


  <!-- Color CSS -->
  <link rel="stylesheet" href="<?= SERVER_NAME ?>assets/css/plugins/color.css">

  <!-- Responsive CSS -->
  <link rel="stylesheet" href="<?= SERVER_NAME ?>assets/css/responsive.css">

  <!-- jquery latest version -->
  <script src="<?= SERVER_NAME ?>assets/js/vendor/jquery-1.12.4.min.js"></script>

  <!-- Bootstrap framework js -->
  <script src="<?= SERVER_NAME ?>assets/js/bootstrap.min.js"></script>

  <script src="<?= SERVER_NAME ?>assets/js/rupiah.js"></script>

  <!-- Bootstrap DatePicker -->
  <script
    src="<?= SERVER_NAME ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet"
    href="<?= SERVER_NAME ?>assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <link rel="stylesheet" href="<?= SERVER_NAME ?>assets/css/error.css">

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
      background: 50% 50% no-repeat #2d3436;
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

<body style="min-width: fit-content; overflow-x: hidden;">
  <div id="loader"></div>
  <?php
  include "fragment/login-modal.php";
  include "fragment/register-modal.php";
  include "fragment/reset-password-modal.php";
  ?>