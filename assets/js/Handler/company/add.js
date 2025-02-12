$(document).ready(function () {
  $('#form_add_company').submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      type: 'POST',
      url: `http://localhost/eproc/handler/company/add`,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        var data = JSON.parse(response);
        if (data.status === 'success') {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: data.message,
            button: "Ok",
          }).then(function () {
            location.reload();
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: data.message,
            button: "Ok",
          });
        }
      },
      error: function (xhr, status, error) {
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: data.message,
          button: "Ok",
        });
      }
    });
  });
});