$(document).ready(function () {
  $('.delete-katalog-btn').each(function () {
    $(this).click(function (e) {
      e.preventDefault();
      const katalogId = $(this).data('id');
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda tidak dapat mengembalikan penghapusan ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#007bff',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: `http://localhost/eproc/handler/katalog/delete.php?id=${katalogId}`,
            type: 'GET',
            success: function (response) {
              Swal.fire({
                title: "Deleted!",
                text: "Katalog berhasi di hapus",
                icon: "success"
              }).then(() => {
                window.location.href = `http://localhost/eproc/vendor_area/user/`;
              })
            }
          })
        }
      });
    });
  });
});