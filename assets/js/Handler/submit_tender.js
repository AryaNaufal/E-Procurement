$(document).ready(function () {
  $("#submit-tender-btn").click(function (e) {
    e.preventDefault();
    var tenderId = $(this).data('id');
    Swal.fire({
      title: 'Submit Pengadaan',
      text: "Apakah kamu ingin submit pengadaan ini?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#007bff',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: `http://localhost/eproc/handler/submit_tender.php?id=${tenderId}`,
          type: 'GET',
          success: function (response) {
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
          },
          error: function (xhr, status, error) {
            Swal.fire({
              title: "Error!",
              text: "Terjadi kesalahan pada server.",
              icon: "error",
              confirmButtonText: "Ok"
            });
          }
        });
      }
    });
  });
});
