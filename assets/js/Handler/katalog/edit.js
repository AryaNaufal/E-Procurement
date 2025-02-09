$(document).ready(function () {
  $('#form_edit_katalog').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
      url: "http://localhost/eproc/handler/katalog/edit?id=" + new URLSearchParams(window.location.search).get('id'),
      type: 'POST',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        try {
          var data = JSON.parse(response);
          if (data.status == 'success') {
            Swal.fire({
              title: "Berhasil!",
              text: data.message,
              icon: "success",
              confirmButtonText: "Ok"
            }).then(() => {
              window.location.href = "http://localhost/eproc/vendor_area/user/";
            });
          } else {
            Swal.fire({
              title: "Gagal!",
              text: data.message,
              icon: "error",
              confirmButtonText: "Ok"
            });
          }
        } catch (e) {
          console.log(e);
          Swal.fire({
            title: "Gagal!",
            text: data.message,
            icon: "error",
            confirmButtonText: "Ok"
          });
        }
      },
      error: function (xhr, status, error) {
        Swal.fire({
          title: "Gagal!",
          text: data.message,
          icon: "error",
          confirmButtonText: "Ok"
        });
      }
    });
  });
});

