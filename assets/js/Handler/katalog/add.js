$(document).ready(function () {
  $('#form_add_katalog').submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    Swal.fire({
      title: 'Tambah E-Katalog',
      text: "Apakah kamu ingin menambahkan E-Katalog ini?",
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#007bff',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "http://localhost/eproc/handler/katalog/add",
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
                  button: "Ok",
                }).then(() => {
                  window.location.href = "http://localhost/eproc/vendor_area/user/";
                });
              } else {
                Swal.fire({
                  title: "Gagal!",
                  text: data.message,
                  icon: "error",
                  button: "Ok",
                });
              }
            } catch (e) {
              Swal.fire({
                title: "Error!",
                text: "Terjadi kesalahan pada server.",
                icon: "error",
                button: "Ok",
              });
            }
          },
          error: function (xhr, status, error) {
            Swal.fire({
              title: "Error!",
              text: "Terjadi kesalahan pada server.",
              icon: "error",
              button: "Ok",
            });
          }
        });
      }
    });
  });
});