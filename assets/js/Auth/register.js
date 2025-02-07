$("#form_daftar").on("submit", function (event) {
  event.preventDefault();
  daftar();
});

function daftar() {
  $.ajax({
    url: 'http://localhost/eproc/handler/auth/register',
    type: 'POST',
    data: $("#form_daftar").serialize(),
    beforeSend: function () {
      $("#loader").show();
    },
    success: function (data) {
      var data_trim = JSON.parse($.trim(data));
      if (data_trim.status === "success") {
        Swal.fire({
          title: data_trim.status,
          html: data_trim.message,
          icon: data_trim.status,
          showCancelButton: false,
          showLoaderOnConfirm: false,
        }).then(function () {
          $("#RegisterModal").modal('remove');
          $("#form_daftar")[0].reset();
        });
      } else {
        Swal.fire({
          title: data_trim.status,
          html: data_trim.message,
          icon: data_trim.status,
          showCancelButton: false,
          showLoaderOnConfirm: false,
        });
      }
    },
    complete: function () {
      $("#loader").hide();
    },
    error: function (xhr, status, error) {
      swal({
        title: 'Error',
        html: 'Terjadi kesalahan pada server.',
        type: 'error',
        showCancelButton: false,
      });
    }
  });
}