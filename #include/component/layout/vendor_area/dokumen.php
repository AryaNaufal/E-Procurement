<section class="tab-pane fade mt-4" id="menu2">
  <div class="accordion" id="accordion">
    <!-- Form untuk Akta Perubahan -->
    <form method="post" id="form_upload_file_1" autocomplete="off" enctype="multipart/form-data">
      <input type="text" hidden id='user_id' value="<?= $_SESSION['id'] ?>">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#akta_perubahan">
            1. Akta Perubahan
          </a>
        </div>
        <div id="akta_perubahan" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <table>
              <tbody>
                <tr>
                  <td>
                    <input name="file" type="file" id="input_akta_perubahan">
                  </td>
                  <td>
                    <button type="button" id="akta-perubahan-btn" class="text-uppercase rounded" style="color:white;background-color: #AA0A2F;">Upload</button>
                    <span>
                      File Maximum Size 2 Mb
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>

    <!-- Form untuk SK Menkumham -->
    <form method="post" id="form_upload_file_2" autocomplete="off" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#sk_menkumham">
            2. SK Menkumham
          </a>
        </div>
        <div id="sk_menkumham" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <table>
              <tbody>
                <tr>
                  <td>
                    <input name="file" type="file" id="input_sk_menkumham">
                  </td>
                  <td>
                    <button type="button" id="sk-menkumham-btn" class="text-uppercase rounded" style="color:white;background-color: #AA0A2F;">Upload</button>
                    <span>
                      File Maximum Size 2 Mb
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>

    <!-- Form untuk KTP Pengurus Perusahaan -->
    <form method="post" id="form_upload_file_3" autocomplete="off" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#ktp_pengurus_perusahaan">
            3. KTP Pengurus Perusahaan
          </a>
        </div>
        <div id="ktp_pengurus_perusahaan" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <table>
              <tbody>
                <tr>
                  <td>
                    <input name="file" type="file" id="input_ktp_pengurus_perusahaan">
                  </td>
                  <td>
                    <button type="button" id="ktp-pengurus-btn" class="text-uppercase rounded" style="color:white;background-color: #AA0A2F;">Upload</button>
                    <span>
                      File Maximum Size 2 Mb
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>

    <!-- Form untuk Surat Keterangan Domisili Perusahaan -->
    <form method="post" id="form_upload_file_4" autocomplete="off" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#surat_keterangan_domisili_perusahaan">
            4. Surat Keterangan Domisili Perusahaan
          </a>
        </div>
        <div id="surat_keterangan_domisili_perusahaan" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <table>
              <tbody>
                <tr>
                  <td>
                    <input name="file" type="file" id="input_surat_keterangan_domisili_perusahaan">
                  </td>
                  <td>
                    <button type="button" id="surat-keterangan-domisili-perusahaan-btn" class="text-uppercase rounded" style="color:white;background-color: #AA0A2F;">Upload</button>
                    <span>
                      File Maximum Size 2 Mb
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>

    <!-- Form untuk SIUP -->
    <form method="post" id="form_upload_file_5" autocomplete="off" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#siup">
            5. SIUP
          </a>
        </div>
        <div id="siup" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <table>
              <tbody>
                <tr>
                  <td>
                    <input name="file" type="file" id="input_siup">
                  </td>
                  <td>
                    <button type="button" id="siup-btn" class="text-uppercase rounded" style="color:white;background-color: #AA0A2F;">Upload</button>
                    <span>
                      File Maximum Size 2 Mb
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>

    <!-- Form untuk TDP -->
    <form method="post" id="form_upload_file_6" autocomplete="off" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#tdp">
            6. TDP
          </a>
        </div>
        <div id="tdp" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <table>
              <tbody>
                <tr>
                  <td>
                    <input name="file" type="file" id="input_tdp">
                  </td>
                  <td>
                    <button type="button" id="tdp-btn" class="text-uppercase rounded" style="color:white;background-color: #AA0A2F;">Upload</button>
                    <span>
                      File Maximum Size 2 Mb
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>

    <!-- Form untuk NPWP -->
    <form method="post" id="form_upload_file_7" autocomplete="off" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#npwp">
            7. NPWP
          </a>
        </div>
        <div id="npwp" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <table>
              <tbody>
                <tr>
                  <td>
                    <input name="file" type="file" id="input_npwp">
                  </td>
                  <td>
                    <button type="button" id="npwp-btn" class="text-uppercase rounded" style="color:white;background-color: #AA0A2F;">Upload</button>
                    <span>
                      File Maximum Size 2 Mb
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>

    <!-- Form untuk PKP -->
    <form method="post" id="form_upload_file_8" autocomplete="off" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#pkp">
            8. PKP
          </a>
        </div>
        <div id="pkp" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <table>
              <tbody>
                <tr>
                  <td>
                    <input name="file" type="file" id="input_pkp">
                  </td>
                  <td>
                    <button type="button" id="pkp-btn" class="text-uppercase rounded" style="color:white;background-color: #AA0A2F;">Upload</button>
                    <span>
                      File Maximum Size 2 Mb
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>

    <!-- Form untuk SPT PPH / PPN -->
    <form method="post" id="form_upload_file_9" autocomplete="off" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#spt">
            9. SPT PPH / PPN
          </a>
        </div>
        <div id="spt" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <table>
              <tbody>
                <tr>
                  <td>
                    <input name="file" type="file" id="input_spt">
                  </td>
                  <td>
                    <button type="button" id="spt-btn" class="text-uppercase rounded" style="color:white;background-color: #AA0A2F;">Upload</button>
                    <span>
                      File Maximum Size 2 Mb
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>

    <!-- Form untuk Laporan Keuangan -->
    <form method="post" id="form_upload_file_10" autocomplete="off" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#laporan_keuangan">
            10. Laporan Keuangan
          </a>
        </div>
        <div id="laporan_keuangan" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <table>
              <tbody>
                <tr>
                  <td>
                    <input name="file" type="file" id="input_laporan_keuangan">
                  </td>
                  <td>
                    <button type="button" id="laporan-keuangan-btn" class="text-uppercase rounded" style="color:white;background-color: #AA0A2F;">Upload</button>
                    <span>
                      File Maximum Size 2 Mb
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>

    <!-- Form untuk Rekening Koran -->
    <form method="post" id="form_upload_file_11" autocomplete="off" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#rekening_koran">
            11. Rekening Koran
          </a>
        </div>
        <div id="rekening_koran" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <table>
              <tbody>
                <tr>
                  <td>
                    <input name="file" type="file" id="input_rekening_koran">
                  </td>
                  <td>
                    <button type="button" id="rekening-koran-btn" class="text-uppercase rounded" style="color:white;background-color: #AA0A2F;">Upload</button>
                    <span>
                      File Maximum Size 2 Mb
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>

    <!-- Form untuk Sertifikasi -->
    <form method="post" id="form_upload_file_12" autocomplete="off" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#sertifikasi">
            12. Sertifikasi
          </a>
        </div>
        <div id="sertifikasi" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <table>
              <tbody>
                <tr>
                  <td>
                    <input name="file" type="file" id="input_sertifikasi">
                  </td>
                  <td>
                    <button type="button" id="sertifikasi-btn" class="text-uppercase rounded" style="color:white;background-color: #AA0A2F;">Upload</button>
                    <span>
                      File Maximum Size 2 Mb
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>

    <!-- Form untuk List Daftar Pengalaman Kerja -->
    <form method="post" id="form_upload_file_13" autocomplete="off" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#list_daftar_pengalaman_kerja">
            13. List Daftar Pengalaman Kerja
          </a>
        </div>
        <div id="list_daftar_pengalaman_kerja" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <table>
              <tbody>
                <tr>
                  <td>
                    <input name="file" type="file" id="input_list_daftar_pengalaman_kerja">
                  </td>
                  <td>
                    <button type="button" id="list-daftar-pengalaman-kerja-btn" class="text-uppercase rounded" style="color:white;background-color: #AA0A2F;">Upload</button>
                    <span>
                      File Maximum Size 2 Mb
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>

    <!-- Form untuk List Tenaga Ahli -->
    <form method="post" id="form_upload_file_14" autocomplete="off" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#list_tenaga_ahli">
            14. List Tenaga Ahli
          </a>
        </div>
        <div id="list_tenaga_ahli" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <table>
              <tbody>
                <tr>
                  <td>
                    <input name="file" type="file" id="input_list_tenaga_ahli">
                  </td>
                  <td>
                    <button type="button" id="list-tenaga-ahli-btn" class="text-uppercase rounded" style="color:white;background-color: #AA0A2F;">Upload</button>
                    <span>
                      File Maximum Size 2 Mb
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>

    <!-- Form untuk Akta Pendirian -->
    <form method="post" id="form_upload_file_15" autocomplete="off" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#akta_pendirian">
            15. Akta Pendirian
          </a>
        </div>
        <div id="akta_pendirian" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <table>
              <tbody>
                <tr>
                  <td>
                    <input name="file" type="file" id="input_akta_pendirian">
                  </td>
                  <td>
                    <button type="button" id="akta-pendirian-btn" class="text-uppercase rounded" style="color:white;background-color: #AA0A2F;">Upload</button>
                    <span>
                      File Maximum Size 2 Mb
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>

<script type="text/javascript">
  $(document).ready(function() {
    const userId = $('#user_id').val();

    const handleFileUpload = (buttonId, inputId, formId, type) => {
      document.getElementById(buttonId).addEventListener('click', async () => {
        const fileInput = document.getElementById(inputId).files[0];
        if (fileInput) {
          if (fileInput.size <= 2 * 1024 * 1024) { // Check file size
            const formData = new FormData(document.getElementById(formId));
            formData.append('file', fileInput);
            Swal.fire({
              icon: 'info',
              title: 'Upload Dokumen',
              text: "Apakah file yang anda upload sudah benar?",
              showCancelButton: true,
              confirmButtonColor: '#007bff',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ok',
              cancelButtonText: 'Batal'
            }).then((result) => {
              if (result.isConfirmed) {
                document.getElementById('loader').style.display = 'block';
                fetch(`<?= SERVER_NAME ?>handler/upload_file?id=${userId}&type=${type}`, {
                    method: 'POST',
                    credentials: 'include',
                    body: formData
                  })
                  .then(response => response.json())
                  .then(data => {
                    document.getElementById('loader').style.display = 'none';
                    if (data.status == 'success') {
                      Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: data.message,
                        confirmButtonText: 'Ok'
                      });
                    } else {
                      Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: data.message
                      });
                    }
                  })
                  .catch(error => {
                    document.getElementById('loader').style.display = 'none';
                    Swal.fire({
                      icon: 'error',
                      title: 'Gagal',
                      text: 'Terjadi kesalahan pada server',
                      confirmButtonText: 'Ok'
                    });
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
    };

    const uploadItems = [{
        buttonId: 'akta-perubahan-btn',
        inputId: 'input_akta_perubahan',
        formId: 'form_upload_file_1',
        type: 'akta_perubahan'
      },
      {
        buttonId: 'sk-menkumham-btn',
        inputId: 'input_sk_menkumham',
        formId: 'form_upload_file_2',
        type: 'sk_menkumham'
      },
      {
        buttonId: 'ktp-pengurus-btn',
        inputId: 'input_ktp_pengurus_perusahaan',
        formId: 'form_upload_file_3',
        type: 'ktp_pengurus_perusahaan'
      },
      {
        buttonId: 'surat-keterangan-domisili-perusahaan-btn',
        inputId: 'input_surat_keterangan_domisili_perusahaan',
        formId: 'form_upload_file_4',
        type: 'surat_keterangan_domisili_perusahaan'
      },
      {
        buttonId: 'siup-btn',
        inputId: 'input_siup',
        formId: 'form_upload_file_5',
        type: 'siup'
      },
      {
        buttonId: 'tdp-btn',
        inputId: 'input_tdp',
        formId: 'form_upload_file_6',
        type: 'tdp'
      },
      {
        buttonId: 'npwp-btn',
        inputId: 'input_npwp',
        formId: 'form_upload_file_7',
        type: 'npwp'
      },
      {
        buttonId: 'pkp-btn',
        inputId: 'input_pkp',
        formId: 'form_upload_file_8',
        type: 'pkp'
      },
      {
        buttonId: 'spt-btn',
        inputId: 'input_spt',
        formId: 'form_upload_file_9',
        type: 'spt'
      },
      {
        buttonId: 'laporan-keuangan-btn',
        inputId: 'input_laporan_keuangan',
        formId: 'form_upload_file_10',
        type: 'laporan_keuangan'
      },
      {
        buttonId: 'rekening-koran-btn',
        inputId: 'input_rekening_koran',
        formId: 'form_upload_file_11',
        type: 'rekening_koran'
      },
      {
        buttonId: 'sertifikasi-btn',
        inputId: 'input_sertifikasi',
        formId: 'form_upload_file_12',
        type: 'sertifikasi'
      },
      {
        buttonId: 'list-daftar-pengalaman-kerja-btn',
        inputId: 'input_list_daftar_pengalaman_kerja',
        formId: 'form_upload_file_13',
        type: 'list_daftar_pengalaman_kerja'
      },
      {
        buttonId: 'list-tenaga-ahli-btn',
        inputId: 'input_list_tenaga_ahli',
        formId: 'form_upload_file_14',
        type: 'list_tenaga_ahli'
      },
      {
        buttonId: 'akta-pendirian-btn',
        inputId: 'input_akta_pendirian',
        formId: 'form_upload_file_15',
        type: 'akta_pendirian'
      },
    ];

    uploadItems.forEach(item => {
      handleFileUpload(item.buttonId, item.inputId, item.formId, item.type);
    });
  });
</script>