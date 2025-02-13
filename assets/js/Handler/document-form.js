$(document).ready(function () {
  let userId = $('#user_id').val();

  // Fungsi file upload
  function handleFileUpload(buttonId, inputId, formId, type) {
    $(buttonId).click(function () {
      var fileInput = $(inputId)[0].files[0];
      if (fileInput) {
        if (fileInput.size <= 2 * 1024 * 1024) { // Check file size
          var formData = new FormData($(formId)[0]);
          formData.append('file', fileInput);
          Swal.fire({
            title: 'Upload Document',
            text: "Apakah file yang anda upload sudah benar?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: `http://localhost/eproc/handler/upload_file?id=${userId}&type=${type}`,
                type: 'POST',
                data: formData,
                success: function (data) {
                  var data_trim = JSON.parse($.trim(data));
                  if (data_trim.status == 'success') {
                    Swal.fire({
                      icon: 'success',
                      title: 'Berhasil',
                      text: data_trim.message
                    });
                  } else {
                    Swal.fire({
                      icon: 'error',
                      title: 'Gagal',
                      text: data_trim.message
                    });
                  }
                },
                cache: false,
                contentType: false,
                processData: false
              });
            }
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Ukuran File maksimal 2 MB'
          });
        }
      } else {
        Swal.fire({
          icon: 'warning',
          title: 'Peringatan',
          text: 'File belum dipilih'
        });
      }
    });
  }

  // Memanggil fungsi sesuai tombol
  handleFileUpload('#akta-perubahan-btn', '#input_akta_perubahan', '#form_upload_file_1', 'akta_perubahan');
  handleFileUpload('#sk-menkumham-btn', '#input_sk_menkumham', '#form_upload_file_2', 'sk_menkumham');
  handleFileUpload('#ktp-pengurus-btn', '#input_ktp_pengurus_perusahaan', '#form_upload_file_3', 'ktp_pengurus_perusahaan');
  handleFileUpload('#surat-keterangan-domisili-perusahaan-btn', '#input_surat_keterangan_domisili_perusahaan', '#form_upload_file_4', 'surat_keterangan_domisili_perusahaan');
  handleFileUpload('#siup-btn', '#input_siup', '#form_upload_file_5', 'siup');

  handleFileUpload('#tdp-btn', '#input_tdp', '#form_upload_file_6', 'tdp');
  handleFileUpload('#npwp-btn', '#input_npwp', '#form_upload_file_7', 'npwp');
  handleFileUpload('#pkp-btn', '#input_pkp', '#form_upload_file_8', 'pkp');
  handleFileUpload('#spt-btn', '#input_spt', '#form_upload_file_9', 'spt');
  handleFileUpload('#laporan-keuangan-btn', '#input_laporan_keuangan', '#form_upload_file_10', 'laporan_keuangan');

  handleFileUpload('#rekening-koran-btn', '#input_rekening_koran', '#form_upload_file_11', 'rekening_koran');
  handleFileUpload('#sertifikasi-btn', '#input_sertifikasi', '#form_upload_file_12', 'sertifikasi');
  handleFileUpload('#list-daftar-pengalaman-kerja-btn', '#input_list_daftar_pengalaman_kerja', '#form_upload_file_13', 'list_daftar_pengalaman_kerja');
  handleFileUpload('#list-tenaga-ahli-btn', '#input_list_tenaga_ahli', '#form_upload_file_14', 'list_tenaga_ahli');
  handleFileUpload('#akta-pendirian-btn', '#input_akta_pendirian', '#form_upload_file_15', 'akta_pendirian');
});
