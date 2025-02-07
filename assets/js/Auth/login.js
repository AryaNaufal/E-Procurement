$("#form_login").on("submit", function (event) {
  event.preventDefault();
  login();
});

function login() {
  $.ajax({
    url: 'http://localhost/eproc/handler/auth/login',
    type: 'POST',
    data: $("#form_login").serialize(), // Form ID
    beforeSend: function () {
      $("#loader").show();
    },
    success: function (data) {
      var data_trim = JSON.parse($.trim(data));
      if (data_trim.status == "success") {
        Swal.fire({
          title: data_trim.status,
          html: data_trim.message,
          icon: data_trim.status,
          showCancelButton: false,
          showLoaderOnConfirm: false,
        }).then(function () {
          window.location = 'http://localhost/eproc/';
        });
      } else {
        Swal.fire({
          title: data_trim.status,
          html: data_trim.message,
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