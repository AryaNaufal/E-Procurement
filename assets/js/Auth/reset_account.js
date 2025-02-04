$("#form_reset").on("submit", function (event) {
  event.preventDefault();
  reset_account();
});

function reset_account() {
  $.ajax({
    url: 'http://localhost/eproc/vendor_area/req_pwd',
    type: 'POST',
    data: $("#form_reset").serialize(), // Form ID
    beforeSend: function () {
      $("#loader").show();
    },
    success: function (data) {
      var data_trim = $.trim(data);
      if (data_trim == "OK") {
        swal({
          title: 'Success',
          type: 'success',
          html: 'Reset password berhasil, silahkan periksa email anda',
          showCancelButton: false,
          showLoaderOnConfirm: false,
        }).then(function () {
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
    complete: function () {
      $("#loader").hide();
    }
  });
}