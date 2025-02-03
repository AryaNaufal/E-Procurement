  <!-- Search Form Start -->
  <div class="search-job-area bg-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-10 col-lg-12 ml-auto mr-auto py-5">
          <div class="job-search-content text-center">
            <h4 class="text-white mb-5">Selamat Datang di E-Procurement</h4>
            <form action="" method="GET" autocomplete="off">
              <div class="form-container">
                <?php include __DIR__ . '/../fragment/search-category.php'; ?>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--Start of Fun Factor Area-->
      <div class="fun-factor-area bg-1 text-center ptb-20 pt-sm-20 pb-sm-20">
        <div class="row">
          <div class="col-md-3 col-6">
            <div class="single-fun-factor">
              <h1><span><?= isset($tenders['data']) ? count($tenders['data']) : 0 ?></span></h1>
              <h3>Semua Tender</h3>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="single-fun-factor">
              <h1><span><?= isset($tenders['data']) ? $tenderBaru : 0 ?></span></h1>
              <h3>Tender Baru</h3>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="single-fun-factor">
              <h1><span><?= isset($tenders['data']) ? $tenderSelesai : 0 ?></span></h1>
              <h3>Tender Selesai</h3>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="single-fun-factor">
              <h1><span>0</span></h1>
              <h3>Vendor</h3>
            </div>
          </div>
        </div>
      </div>
      <!--End of Fun Factor Area-->
    </div>
  </div>
  <!-- Search Form End -->

  <!--Start of Job Post Area-->
  <div class="job-post-area pb-100 pb-sm-35 pt-5">
    <div class="container">
      <!-- Section Title Start -->
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center">
            <h2>Informasi Tender</h2>
            <p>List tender terbaru pada E-Procurement</p>
          </div>
        </div>
      </div>
      <!-- Section Title End -->
      <div class="all-job-post">
        <!-- Nav tabs -->
        <div class="post-tab nav mb-5">
          <a class="nav-link active" data-toggle="tab" href="#all">Semua Kategori</a>
          <a class="nav-link" data-toggle="tab" href="#jasa_lain">Jasa Lainnya</a>
          <a class="nav-link" data-toggle="tab" href="#barang_jasa">Pengadaan Barang &amp; Jasa</a>
          <a class="nav-link" data-toggle="tab" href="#konsultasi">Jasa Konsultasi Bidang Usaha</a>
        </div>
        <!-- Tab panes -->
        <?php include __DIR__ . '/../fragment/tab-content.php'; ?>
      </div>
    </div>
  </div>
  <!-- End of Job Post Area -->



  <script type="text/javascript">
    //Start Password Validation
    var validation_pwd = 0;
    var pwd_myInput = document.getElementById("psw");
    var pwd_letter = document.getElementById("pwd_letter");
    var pwd_capital = document.getElementById("pwd_capital");
    var pwd_number = document.getElementById("pwd_number");
    var pwd_sc = document.getElementById("pwd_special_character");
    var pwd_length = document.getElementById("pwd_length");

    function password_validation() {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      var validation_pwd_letter = 0;
      if (pwd_myInput.value.match(lowerCaseLetters)) {
        pwd_letter.classList.remove("invalid");
        pwd_letter.classList.add("valid");
        validation_pwd_letter = 1;
      } else {
        pwd_letter.classList.remove("valid");
        pwd_letter.classList.add("invalid");
        validation_pwd_letter = 0;
      }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      var validation_pwd_uppercaseletter = 0;
      if (pwd_myInput.value.match(upperCaseLetters)) {
        pwd_capital.classList.remove("invalid");
        pwd_capital.classList.add("valid");
        validation_pwd_uppercaseletter = 1;
      } else {
        pwd_capital.classList.remove("valid");
        pwd_capital.classList.add("invalid");
        validation_pwd_uppercaseletter = 0;
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      var validation_pwd_number = 0;
      if (pwd_myInput.value.match(numbers)) {
        pwd_number.classList.remove("invalid");
        pwd_number.classList.add("valid");
        validation_pwd_number = 1;
      } else {
        pwd_number.classList.remove("valid");
        pwd_number.classList.add("invalid");
        validation_pwd_number = 0;
      }

      var sc = /[!@#$%^&*]/g;
      var validation_pwd_sc = 0;
      if (pwd_myInput.value.match(sc)) {
        pwd_sc.classList.remove("invalid");
        pwd_sc.classList.add("valid");
        validation_pwd_sc = 1;
      } else {
        pwd_sc.classList.remove("valid");
        pwd_sc.classList.add("invalid");
        validation_pwd_sc = 0;
      }

      // Validate length
      var validation_pwd_length = 0;
      if (pwd_myInput.value.length >= 8) {
        pwd_length.classList.remove("invalid");
        pwd_length.classList.add("valid");
        validation_pwd_length = 1;
      } else {
        pwd_length.classList.remove("valid");
        pwd_length.classList.add("invalid");
        validation_pwd_length = 0;
      }


      if (validation_pwd_letter == 0 || validation_pwd_uppercaseletter == 0 || validation_pwd_number == 0 || validation_pwd_sc == 0 || validation_pwd_length == 0) {
        validation_pwd = 0;
      } else {
        validation_pwd = 1;
      }

      $("#validation_pwd_val").val(validation_pwd);
    }

    //End Password Validation


    $(document).ready(function() {
      var $recaptcha = document.querySelector('#g-recaptcha-response');

      if ($recaptcha) {
        $recaptcha.setAttribute("required", "required");
      }
    })

    var sessionInfo = "";
    if (sessionInfo != null && sessionInfo != "") {
      let time = 6;
      let countDown = setInterval(function() {
        time--;
        if (time == 0) {
          clearInterval(countDown);
          $.ajax({
            url: "<?= SERVER_NAME ?>logout",
            type: 'get',
            success: function() {
              $("#message").remove();
            }
          });
        }
      }, 1000);
    }

    $('.datepicker').datepicker({
      orientation: "bottom",
      autoclose: true,
      todayHighlight: true,
      format: "dd/mm/yyyy"
    });

    $("#form_login").on("submit", function(event) {
      event.preventDefault();
      login();
    });

    $("#form_daftar").on("submit", function(event) {
      event.preventDefault();
      daftar();
    });

    $("#form_reset").on("submit", function(event) {
      event.preventDefault();
      reset_account();
    });

    function get_akun(tipe) {
      if (tipe == "1") {
        $("#div_nik").hide();
        $("#pic_ktp").val("");
        $("#div_npwp").show();
        $("#company_npwp").prop('required', true);
        $("#pic_ktp").prop('required', false);
      } else {
        $("#div_npwp").hide();
        $("#company_npwp").val("");
        $("#div_nik").show();
        $("#pic_ktp").prop('required', true);
        $("#company_npwp").prop('required', false);
      }
    }

    function login() {
      $.ajax({
        url: 'handler/auth/login',
        type: 'POST',
        data: $("#form_login").serialize(), // Form ID
        beforeSend: function() {
          $("#loader").show();
        },
        success: function(data) {
          var data_trim = JSON.parse($.trim(data));
          if (data_trim.status == "success") {
            swal({
              title: data_trim.status,
              type: data_trim.status,
              html: data_trim.message,
              showCancelButton: false,
              showLoaderOnConfirm: false,
            }).then(function() {
              window.location = '<?= SERVER_NAME ?>';
            });
          } else {
            swal({
              title: data_trim.status,
              type: data_trim.status,
              html: data_trim.message,
              showCancelButton: false,
              showLoaderOnConfirm: false,
            });
          }
        },
        complete: function() {
          $("#loader").hide();
        }
      });
    }

    function daftar() {
      $.ajax({
        url: 'handler/auth/register',
        type: 'POST',
        data: $("#form_daftar").serialize(),
        beforeSend: function() {
          $("#loader").show();
        },
        success: function(data) {
          var data_trim = JSON.parse($.trim(data));
          if (data_trim.status === "success") {
            swal({
              title: data_trim.status,
              type: data_trim.status,
              html: data_trim.message,
              showCancelButton: false,
              showLoaderOnConfirm: false,
            }).then(function() {
              $("#RegisterModal").modal('remove');
              $("#form_daftar")[0].reset();
            });
          } else {
            swal({
              title: data_trim.status,
              type: data_trim.status,
              html: data_trim.message,
              showCancelButton: false,
              showLoaderOnConfirm: false,
            });
          }
        },
        complete: function() {
          $("#loader").hide();
        },
        error: function(xhr, status, error) {
          swal({
            title: 'Error',
            html: 'Terjadi kesalahan pada server.',
            type: 'error',
            showCancelButton: false,
          });
        }
      });
    }

    function reset_account() {
      $.ajax({
        url: '<?= SERVER_NAME ?>vendor_area/req_pwd',
        type: 'POST',
        data: $("#form_reset").serialize(), // Form ID
        beforeSend: function() {
          $("#loader").show();
        },
        success: function(data) {
          var data_trim = $.trim(data);
          if (data_trim == "OK") {
            swal({
              title: 'Success',
              type: 'success',
              html: 'Reset password berhasil, silahkan periksa email anda',
              showCancelButton: false,
              showLoaderOnConfirm: false,
            }).then(function() {
              $("#LoginModal").modal('remove');
              $("#ResetPwdModal").modal('remove');
              $("#form_login")[0].reset();
              $("#form_reset")[0].reset();
            });
          } else {
            swal({
              title: 'Error',
              html: data_trim,
              type: 'error',
              showCancelButton: false,
              showLoaderOnConfirm: false,
            });
          }
        },
        complete: function() {
          $("#loader").hide();
        }
      });
    }
  </script>