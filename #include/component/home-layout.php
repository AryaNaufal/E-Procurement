  <!-- Search Form Start -->
  <div class="search-job-area bg-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-10 col-lg-12 ml-auto mr-auto">
          <br><br><br>
          <div class="job-search-content text-center">
            <h4 class="text-white mb-5">Selamat Datang di E-Procurement</h4>
            <form action="<?php SERVER_NAME ?>search.php" method="get" autocomplete="off">
              <div class="form-container">
                <?php include 'fragment/search-category.php'; ?>
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
              <h1><span><?= count($tenders['data']) ?></span></h1>
              <h3>Semua Tender</h3>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="single-fun-factor">
              <h1><span><?= $tenderBaru ?></span></h1>
              <h3>Tender Baru</h3>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="single-fun-factor">
              <h1><span><?= $tenderSelesai ?></span></h1>
              <h3>Tender Selesai</h3>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="single-fun-factor">
              <h1><span>-</span></h1>
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
        <div class="tab-content">
          <div class="tab-pane active" id="all">
            <div class="row">
              <?php if (isset($tenders['status']) && $tenders['status'] === 'success' && !empty($tenders['data'])): ?>
                <?php foreach ($tenders['data'] as $tender): ?>
                  <div class="col-md-6 align-items-stretch mb-4">
                    <div class="single-job-post h-100">
                      <div class="address">
                        <h6><?= htmlspecialchars($tender['description'], ENT_QUOTES, 'UTF-8') ?></h6>
                        <p>Kategori: <?= htmlspecialchars($tender['category'], ENT_QUOTES, 'UTF-8') ?></p>
                        <p>Tanggal Pendaftaran: <?= htmlspecialchars($tender['registration_date'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($tender['closing_date'], ENT_QUOTES, 'UTF-8') ?></p>
                      </div>
                      <div class="button-box">
                        <a href="<?= SERVER_NAME ?>vendor_area/tender/detail/<?= $tender['id'] ?>" class="button button-black">DETAIL</a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <div class="col-md-12">
                  <center>
                    <h6><?= htmlspecialchars(isset($tenders['message']) ? $tenders['message'] : 'Tender tidak tersedia', ENT_QUOTES, 'UTF-8') ?></h6>
                  </center>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <div class="tab-pane" id="jasa_lain">
            <div class="row">
              <?php if (isset($tenderLain['status']) && $tenderLain['status'] === 'success' && !empty($tenderLain['data'])): ?>
                <?php foreach ($tenderLain['data'] as $tender): ?>
                  <div class="col-md-6 d-flex align-items-stretch mb-4">
                    <div class="single-job-post h-100">
                      <div class="address">
                        <h6><?= htmlspecialchars($tender['description'], ENT_QUOTES, 'UTF-8') ?></h6>
                        <p><strong>Kategori:</strong> <?= htmlspecialchars($tender['category'], ENT_QUOTES, 'UTF-8') ?></p>
                        <p>Tanggal Pendaftaran: <?= htmlspecialchars($tender['registration_date'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($tender['closing_date'], ENT_QUOTES, 'UTF-8') ?></p>
                      </div>
                      <div class="button-box">
                        <a href="<?= SERVER_NAME ?>vendor_area/tender/detail/<?= $tender['id'] ?>" class="button button-black">DETAIL</a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <div class="col-md-12">
                  <center>
                    <h6><?= htmlspecialchars(isset($tenderLain['message']) ? $tenderLain['message'] : 'Tender tidak tersedia', ENT_QUOTES, 'UTF-8') ?></h6>
                  </center>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <div class="tab-pane" id="barang_jasa">
            <div class="row">
              <?php if (isset($tenderBarangJasa['status']) && $tenderBarangJasa['status'] === 'success' && !empty($tenderBarangJasa['data'])): ?>
                <?php foreach ($tenderBarangJasa['data'] as $tender): ?>
                  <div class="col-md-6 align-items-stretch mb-4">
                    <div class="single-job-post h-100">
                      <div class="address">
                        <h6><?= htmlspecialchars($tender['description'], ENT_QUOTES, 'UTF-8') ?></h6>
                        <p><strong>Kategori:</strong> <?= htmlspecialchars($tender['category'], ENT_QUOTES, 'UTF-8') ?></p>
                        <p>Tanggal Pendaftaran: <?= htmlspecialchars($tender['registration_date'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($tender['closing_date'], ENT_QUOTES, 'UTF-8') ?></p>
                      </div>
                      <div class="button-box">
                        <a href="<?= SERVER_NAME ?>vendor_area/tender/detail/<?= $tender['id'] ?>" class="button button-black">DETAIL</a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <div class="col-md-12">
                  <center>
                    <h6><?= htmlspecialchars(isset($tenderBarangJasa['message']) ? $tenderBarangJasa['message'] : 'Tender tidak tersedia', ENT_QUOTES, 'UTF-8') ?></h6>
                  </center>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <div class="tab-pane" id="konsultasi">
            <div class="row">
              <?php if (isset($tenderKonsultasi['status']) && $tenderKonsultasi['status'] === 'success' && !empty($tenderKonsultasi['data'])): ?>
                <?php foreach ($tenderKonsultasi['data'] as $tender): ?>
                  <div class="col-md-6 align-items-stretch mb-4">
                    <div class="single-job-post h-100">
                      <div class="address">
                        <h6><?= htmlspecialchars($tender['description'], ENT_QUOTES, 'UTF-8') ?></h6>
                        <p><strong>Kategori:</strong> <?= htmlspecialchars($tender['category'], ENT_QUOTES, 'UTF-8') ?></p>
                        <p>Tanggal Pendaftaran: <?= htmlspecialchars($tender['registration_date'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($tender['closing_date'], ENT_QUOTES, 'UTF-8') ?></p>
                      </div>
                      <div class="button-box">
                        <a href="<?= SERVER_NAME ?>vendor_area/tender/detail/<?= $tender['id'] ?>" class="button button-black">DETAIL</a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <div class="col-md-12">
                  <center>
                    <h6><?= htmlspecialchars(isset($tenderKonsultasi['message']) ? $tenderKonsultasi['message'] : 'Tender tidak tersedia', ENT_QUOTES, 'UTF-8') ?></h6>
                  </center>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End of Job Post Area -->

  <!-- Working Aera Start -->
  <div class="woring-area pt-130 pb-100 pt-sm-60 pb-sm-30">
    <div class="container">
      <!-- Section Title Start -->
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center ">
            <h2>Tata Cara Tender</h2>
            <p>Berikut tata cara mengikuti tender</p>
          </div>
        </div>
      </div>
      <!-- Section Title End -->
      <div class="row work-shap">
        <div class="col-md-4">
          <div class="work-item">
            <div class="img-icon">
              <img src="<?php SERVER_NAME ?>assets/images/icons/wrk1.png" alt="">
            </div>
            <h5>Daftar Akun</h5>
            <p>Membuat akun baru untuk mengikuti tender.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-item">
            <div class="img-icon">
              <img src="<?php SERVER_NAME ?>assets/images/icons/wrk2.png" alt="">
            </div>
            <h5>Kelengkapan Berkas</h5>
            <p>Setelah memiliki akun, harap melengkapi berkas/dokumen legalitas perusahaan, sebagai persyaratan mengikuti tender.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-item">
            <div class="img-icon">
              <img src="<?php SERVER_NAME ?>assets/images/icons/wrk3.png" alt="">
            </div>
            <h5>Submit Tender</h5>
            <p>Setelah berkas/dokumen lengkap dan sudah terverifikasi.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Working Aera End -->



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
            url: "<?php SERVER_NAME ?>logout",
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
        url: 'handler/login-handler',
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
              window.location = '<?php SERVER_NAME ?>vendor_area/member';
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
        url: 'handler/register-handler',
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
        url: '<?php SERVER_NAME ?>vendor_area/req_pwd',
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

    function do_act(form_id, act_controller, after_controller, header_text, content_text, type_icon, fct_after, not_ok = '') {
      swal({
        title: header_text,
        text: content_text,
        type: type_icon, // warning,info,success,error,question
        showCancelButton: true,
        showLoaderOnConfirm: true,
        allowEscapeKey: false,
        allowOutsideClick: false,
        preConfirm: function() {
          $.ajax({
            url: act_controller,
            type: 'POST',
            data: new FormData($('#' + form_id)[0]), // Form ID
            processData: false,
            contentType: false,
            beforeSend: function() {
              $("#loader").show();
            },
            success: function(data) {
              var data_trim = $.trim(data);
              if (data_trim == "OK") {
                swal({
                  title: 'Success',
                  type: 'success',
                  allowEscapeKey: false,
                  allowOutsideClick: false,
                  showCancelButton: false,
                  showLoaderOnConfirm: false,
                }).then(function() {
                  if (after_controller == 'no_refresh') {
                    window[fct_after]();
                  } else if (after_controller != '') {
                    window.location = '<?php SERVER_NAME ?>' + after_controller;
                  } else {
                    location.reload();
                  }
                });
              } else {
                if (not_ok == "1") {
                  swal({
                    title: 'Error',
                    type: 'error',
                    html: data_trim,
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showLoaderOnConfirm: false,
                  }).then(function() {
                    if (after_controller == 'no_refresh') {
                      window[fct_after]();
                    } else if (after_controller != '') {
                      window.location = '<?php SERVER_NAME ?>' + after_controller;
                    } else {
                      location.reload();
                    }
                  });
                } else {
                  swal({
                    title: 'Error',
                    html: data_trim,
                    type: 'error',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showLoaderOnConfirm: false,
                  });
                }

              }
            },
            complete: function() {
              $("#loader").hide();
            }
          });

        }
      });
    }

    function get_kabkot(from_id, to_id) {
      var prov = $("#" + from_id).val();
      if (prov) {
        $.ajax({
          url: '<?php SERVER_NAME ?>region/kabkot',
          type: 'POST',
          dataType: "html",
          data: {
            "_token": "IRclsQFTY5dglnB4NGJXsRwYVy9ZpVT0crqaJUxd",
            'prov': prov
          },
          success: function(data) {
            $("#" + to_id).html(data);
          }
        });
      } else {
        $("#" + to_id).html("<option value=''>Pilih Kota/Kabupaten</option>");
      }
    }

    function get_kecamatan(from_id, to_id) {
      var kabkot = $("#" + from_id).val();
      if (kabkot) {
        $.ajax({
          url: '<?php SERVER_NAME ?>region/kecamatan',
          type: 'POST',
          dataType: "html",
          data: {
            "_token": "IRclsQFTY5dglnB4NGJXsRwYVy9ZpVT0crqaJUxd",
            'kabkot': kabkot
          },
          success: function(data) {
            $("#" + to_id).html(data);
          }
        });
      } else {
        $("#" + to_id).html("<option value=''>Pilih Kecamatan</option>");
      }
    }

    function get_kelurahan(from_id, to_id) {
      var kecamatan = $("#" + from_id).val();
      if (kecamatan) {
        $.ajax({
          url: '<?php SERVER_NAME ?>region/kelurahan',
          type: 'POST',
          dataType: "html",
          data: {
            "_token": "IRclsQFTY5dglnB4NGJXsRwYVy9ZpVT0crqaJUxd",
            'kec': kecamatan
          },
          success: function(data) {
            $("#" + to_id).html(data);
          }
        });
      } else {
        $("#" + to_id).html("<option value=''>Pilih Kelurahan</option>");
      }
    }

    function get_provinsi_edit(from_html, to_html, id = '') {
      $.ajax({
        url: '<?php SERVER_NAME ?>region/provinsi',
        type: 'POST',
        dataType: "html",
        data: {
          "_token": "IRclsQFTY5dglnB4NGJXsRwYVy9ZpVT0crqaJUxd"
        },
        success: function(data) {
          $("#" + from_html).html(data);
          if (id) {
            $("#" + from_html).val(id);
          }
          setTimeout(function() {
            $("#" + from_html).attr('onchange', 'get_kabkot(\'' + from_html + '\',\'' + to_html + '\')');
          }, 2000);
        }
      });
    }

    function get_kabkot_edit(from_html, to_html, parent_id, id) {
      if (id) {
        $.ajax({
          url: '<?php SERVER_NAME ?>region/kabkot',
          type: 'POST',
          dataType: "html",
          data: {
            "_token": "IRclsQFTY5dglnB4NGJXsRwYVy9ZpVT0crqaJUxd",
            'prov': parent_id
          },
          success: function(data) {
            $("#" + to_html).html(data);
            $("#" + to_html).val(id);
            setTimeout(function() {
              $("#" + from_html).attr('onchange', 'get_kabkot(\'' + from_html + '\',\'' + to_html + '\')');
            }, 2000);
          }
        });
      } else {
        $("#" + to_id).html("<option value=''>Pilih Kota/Kabupaten</option>");
      }
    }

    function get_kecamatan_edit(from_html, to_html, parent_id, id) {
      if (id) {
        $.ajax({
          url: '<?php SERVER_NAME ?>region/kecamatan',
          type: 'POST',
          dataType: "html",
          data: {
            "_token": "IRclsQFTY5dglnB4NGJXsRwYVy9ZpVT0crqaJUxd",
            'kabkot': parent_id
          },
          success: function(data) {
            $("#" + to_html).html(data);
            $("#" + to_html).val(id);
            setTimeout(function() {
              $("#" + from_html).attr('onchange', 'get_kecamatan(\'' + from_html + '\',\'' + to_html + '\')');
            }, 2000);
          }
        });
      } else {
        $("#" + to_id).html("<option value=''>Pilih Kecamatan</option>");
      }
    }

    function get_kelurahan_edit(from_html, to_html, parent_id, id) {
      if (id) {
        $.ajax({
          url: '<?php SERVER_NAME ?>region/kelurahan',
          type: 'POST',
          dataType: "html",
          data: {
            "_token": "IRclsQFTY5dglnB4NGJXsRwYVy9ZpVT0crqaJUxd",
            'kec': parent_id
          },
          success: function(data) {
            $("#" + to_html).html(data);
            $("#" + to_html).val(id);
            setTimeout(function() {
              $("#" + from_html).attr('onchange', 'get_kelurahan(\'' + from_html + '\',\'' + to_html + '\')');
            }, 2000);
          }
        });
      } else {
        $("#" + to_id).html("<option value=''>Pilih Kelurahan</option>");
      }
    }

    function logout() {
      window.open('<?php SERVER_NAME ?>vendor_area/logout', '_self')
    }

    //CAPTCHA START
    // function createCaptcha() {
    //   var random = Math.floor(Math.random() * 999999);
    //   document.getElementById("form-captcha").innerHTML = random;
    // }
    //CAPTCHA END
  </script>