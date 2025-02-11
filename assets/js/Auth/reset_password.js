$("#form_reset").on("submit", function (event) {
  event.preventDefault();
  reset_password_verification();
});
$("#form_reset_password").on("submit", function (event) {
  event.preventDefault();
  reset_password();
});

function reset_password_verification() {
  $.ajax({
    url: `http://localhost/eproc/handler/auth/reset_password`,
    type: 'POST',
    data: $("#form_reset").serialize(), // Form ID
    beforeSend: function () {
      $("#loader").show();
    },
    success: function (data) {
      var data_trim = JSON.parse($.trim(data));
      if (data_trim.status == "success") {
        Swal.fire({
          icon: 'success',
          title: 'Success',
          type: 'success',
          text: 'Reset password berhasil, silahkan periksa email anda',
        })
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: data_trim.message,
          type: 'error',
        });
      }
    },
    complete: function () {
      $("#loader").hide();
    }
  });
}

function reset_password() {
  $.ajax({
    url: `http://localhost/eproc/handler/auth/reset_password`,
    type: 'POST',
    data: $("#form_reset_password").serialize(),
    success: function (data) {
      var data_trim = JSON.parse($.trim(data));
      if (data_trim.status == "success") {
        Swal.fire({
          icon: 'success',
          title: 'Success',
          type: 'success',
          text: data_trim.message,
        }).then(() => {
          window.location.reload();
        })
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          type: 'error',
          text: data_trim.message,
        });
      }
    },
  });
}