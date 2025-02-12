$(document).ready(function () {
  let userId = $('#user_id').val();

  // Fungsi untuk upload file Akta Perubahan
  $('#akta-perubahan-btn').click(function () {
    var fileInput = $('#input_akta_perubahan')[0].files[0];
    if (fileInput && fileInput.size <= 2 * 1024 * 1024) { // Cek ukuran file
      var formData = new FormData($('#form_upload_file_1')[0]);
      formData.append('file', fileInput);

      $.ajax({
        url: `http://localhost/eproc/handler/upload_file?id=${userId}&type=akta_perubahan`,
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
            alert(data_trim.message);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    } else {
      alert('File size exceeds 2 MB limit.');
    }
  });

  // Fungsi untuk upload file SK Menkumham
  $('#sk-menkumham-btn').click(function () {
    var fileInput = $('#input_sk_menkumham')[0].files[0];
    if (fileInput && fileInput.size <= 2 * 1024 * 1024) {
      var formData = new FormData($('#form_upload_file_2')[0]);
      formData.append('file', fileInput);

      $.ajax({
        url: `http://localhost/eproc/handler/upload_file?id=${userId}&type=sk_menkumham`,
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
            alert(data_trim.message);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    } else {
      alert('File size exceeds 2 MB limit.');
    }
  });

  // Fungsi untuk upload file KTP Pengurus Perusahaan
  $('#ktp-pengurus-btn').click(function () {
    var fileInput = $('#input_ktp_pengurus_perusahaan')[0].files[0];
    if (fileInput && fileInput.size <= 2 * 1024 * 1024) {
      var formData = new FormData($('#form_upload_file_3')[0]);
      formData.append('file', fileInput);

      $.ajax({
        url: `http://localhost/eproc/handler/upload_file?id=${userId}&type=ktp_pengurus_perusahaan`,
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
            alert(data_trim.message);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    } else {
      alert('File size exceeds 2 MB limit.');
    }
  });

  //Fungsi untuk upload Surat Keterangan Domisili Perusahaan
  $('#surat-keterangan-domisili-perusahaan-btn').click(function () {
    var fileInput = $('#input_surat_keterangan_domisili_perusahaan')[0].files[0];
    if (fileInput && fileInput.size <= 2 * 1024 * 1024) {
      var formData = new FormData($('#form_upload_file_4')[0]);
      formData.append('file', fileInput);

      $.ajax({
        url: `http://localhost/eproc/handler/upload_file?id=${userId}&type=surat_keterangan_domisili_perusahaan`,
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
            alert(data_trim.message);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    } else {
      alert('File size exceeds 2 MB limit.');
    }
  });

  // Fungsi untuk upload file SIUP
  $('#siup-btn').click(function () {
    var fileInput = $('#input_siup')[0].files[0];
    if (fileInput && fileInput.size <= 2 * 1024 * 1024) {
      var formData = new FormData($('#form_upload_file_5')[0]);
      formData.append('file', fileInput);

      $.ajax({
        url: `http://localhost/eproc/handler/upload_file?id=${userId}&type=siup`,
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
            alert(data_trim.message);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    } else {
      alert('File size exceeds 2 MB limit.');
    }
  });

  // Fungsi untuk upload file TDP
  $('#tdp-btn').click(function () {
    var fileInput = $('#input_tdp')[0].files[0];
    if (fileInput && fileInput.size <= 2 * 1024 * 1024) {
      var formData = new FormData($('#form_upload_file_6')[0]);
      formData.append('file', fileInput);

      $.ajax({
        url: `http://localhost/eproc/handler/upload_file?id=${userId}&type=tdp`,
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
            alert(data_trim.message);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    } else {
      alert('File size exceeds 2 MB limit.');
    }
  });

  // Fungsi untuk upload file NPWP
  $('#npwp-btn').click(function () {
    var fileInput = $('#input_npwp')[0].files[0];
    if (fileInput && fileInput.size <= 2 * 1024 * 1024) {
      var formData = new FormData($('#form_upload_file_7')[0]);
      formData.append('file', fileInput);

      $.ajax({
        url: `http://localhost/eproc/handler/upload_file?id=${userId}&type=npwp`,
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
            alert(data_trim.message);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    } else {
      alert('File size exceeds 2 MB limit.');
    }
  });

  // Fungsi untuk upload file PKP
  $('#pkp-btn').click(function () {
    var fileInput = $('#input_pkp')[0].files[0];
    if (fileInput && fileInput.size <= 2 * 1024 * 1024) {
      var formData = new FormData($('#form_upload_file_7')[0]);
      formData.append('file', fileInput);

      $.ajax({
        url: `http://localhost/eproc/handler/upload_file?id=${userId}&type=pkp`,
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
            alert(data_trim.message);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    } else {
      alert('File size exceeds 2 MB limit.');
    }
  });

  // Fungsi untuk upload file SPT
  $('#spt-btn').click(function () {
    var fileInput = $('#input_spt')[0].files[0];
    if (fileInput && fileInput.size <= 2 * 1024 * 1024) {
      var formData = new FormData($('#form_upload_file_9')[0]);
      formData.append('file', fileInput);

      $.ajax({
        url: `http://localhost/eproc/handler/upload_file?id=${userId}&type=spt`,
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
            alert(data_trim.message);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    } else {
      alert('File size exceeds 2 MB limit.');
    }
  });

  // Fungsi untuk upload file Laporan Keuangan
  $('#laporan-keuangan-btn').click(function () {
    var fileInput = $('#input_laporan_keuangan')[0].files[0];
    if (fileInput && fileInput.size <= 2 * 1024 * 1024) {
      var formData = new FormData($('#form_upload_file_10')[0]);
      formData.append('file', fileInput);

      $.ajax({
        url: `http://localhost/eproc/handler/upload_file?id=${userId}&type=laporan_keuangan`,
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
            alert(data_trim.message);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    } else {
      alert('File size exceeds 2 MB limit.');
    }
  });

  // Fungsi untuk upload file Rekening Koran
  $('#rekening-koran-btn').click(function () {
    var fileInput = $('#input_rekening_koran')[0].files[0];
    if (fileInput && fileInput.size <= 2 * 1024 * 1024) {
      var formData = new FormData($('#form_upload_file_11')[0]);
      formData.append('file', fileInput);

      $.ajax({
        url: `http://localhost/eproc/handler/upload_file?id=${userId}&type=rekening_koran`,
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
            alert(data_trim.message);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    } else {
      alert('File size exceeds 2 MB limit.');
    }
  });

  // Fungsi untuk upload file Sertifikasi
  $('#sertifikasi-btn').click(function () {
    var fileInput = $('#input_sertifikasi')[0].files[0];
    if (fileInput && fileInput.size <= 2 * 1024 * 1024) {
      var formData = new FormData($('#form_upload_file_12')[0]);
      formData.append('file', fileInput);

      $.ajax({
        url: `http://localhost/eproc/handler/upload_file?id=${userId}&type=sertifikasi`,
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
            alert(data_trim.message);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    } else {
      alert('File size exceeds 2 MB limit.');
    }
  });

  // Fungsi untuk upload file List Daftar Pengalaman Kerja
  $('#list-daftar-pengalaman-kerja-btn').click(function () {
    var fileInput = $('#input_list_daftar_pengalaman_kerja')[0].files[0];
    if (fileInput && fileInput.size <= 2 * 1024 * 1024) {
      var formData = new FormData($('#form_upload_file_13')[0]);
      formData.append('file', fileInput);

      $.ajax({
        url: `http://localhost/eproc/handler/upload_file?id=${userId}&type=list_daftar_pengalaman_kerja`,
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
            alert(data_trim.message);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    } else {
      alert('File size exceeds 2 MB limit.');
    }
  });

  // Fungsi untuk upload file List Daftar Pengalaman Kerja
  $('#list-tenaga-ahli-btn').click(function () {
    var fileInput = $('#input_list_tenaga_ahli')[0].files[0];
    if (fileInput && fileInput.size <= 2 * 1024 * 1024) {
      var formData = new FormData($('#form_upload_file_14')[0]);
      formData.append('file', fileInput);

      $.ajax({
        url: `http://localhost/eproc/handler/upload_file?id=${userId}&type=list_tenaga_ahli`,
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
            alert(data_trim.message);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    } else {
      alert('File size exceeds 2 MB limit.');
    }
  });

  // Fungsi untuk upload file List Daftar Pengalaman Kerja
  $('#akta-pendirian-btn').click(function () {
    var fileInput = $('#input_akta_pendirian')[0].files[0];
    if (fileInput && fileInput.size <= 2 * 1024 * 1024) {
      var formData = new FormData($('#form_upload_file_15')[0]);
      formData.append('file', fileInput);

      $.ajax({
        url: `http://localhost/eproc/handler/upload_file?id=${userId}&type=akta_pendirian`,
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
            alert(data_trim.message);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    } else {
      alert('File size exceeds 2 MB limit.');
    }
  });
});