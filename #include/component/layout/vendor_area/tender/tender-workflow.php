<div style="min-height: calc(100vh - 150px);">
  <div class="container py-5">
    <div class="mb-5">
      <div class="d-flex align-items-center" style="gap: 20px;">
        <i class="fa fa-arrow-left" aria-hidden="true" style="font-size: 25px; cursor: pointer;" onclick="window.history.back()"></i>
        <h3>Workflow Pengadaan</h3>
      </div>
      <p>Pembelian 200 unit laptop</p>
    </div>

    <div class="d-flex justify-content-center flex-wrap" style="gap: 20px; width: 100%;">
      <div class="card" id="pendaftaran">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/1_submit_done.png" alt="">
          <h6 class="card-title">Pendaftaran</h6>
        </div>
      </div>

      <div class="card" id="prakualifikasi">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/2_prakualifikasi_done.png" alt="">
          <h6 class="card-title">Prakualifikasi</h6>
        </div>
      </div>

      <div class="card" id="tor">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/3_tor_abu.png" alt="">
          <h6 class="card-title">TOR</h6>
        </div>
      </div>

      <div class="card" id="aanwijizing">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/4_invitation_disabled.png" alt="">
          <h6 class="card-title">Aanwijizing</h6>
        </div>
      </div>

      <div class="card" id="proposal">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/5_proposal_disabled.png" alt="">
          <h6 class="card-title">Proposal</h6>
        </div>
      </div>

      <div class="card" id="shortlisted">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/6_shortlisted_disabled.png" alt="">
          <h6 class="card-title">Shortlisted</h6>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-center flex-wrap mt-4" style="gap: 20px; width: 100%;">
      <div class="card" id="poc">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/7_poc_disabled.png" alt="">
          <h6 class="card-title">POC</h6>
        </div>
      </div>

      <div class="card" id="announcement">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/8_pengumuman_disabled.png" alt="">
          <h6 class="card-title">Announcement</h6>
        </div>
      </div>

      <div class="card" id="negotiation">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/9_nego_disabled.png" alt="">
          <h6 class="card-title">Negotiation</h6>
        </div>
      </div>

      <div class="card" id="purchase-order">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/10_po_disabled.png" alt="">
          <h6 class="card-title">Purchase Order</h6>
        </div>
      </div>

      <div class="card" id="bast">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/11_bast_disabled.png" alt="">
          <h6 class="card-title">BAST</h6>
        </div>
      </div>

    </div>

    <div class="mt-5">
      <div class="d-flex flex-column align-items-center">
        <h4 id="heading-area"></h4>
        <div id="body-area"></div>
      </div>
    </div>
  </div>
</div>

<script>
  const cards = document.querySelectorAll(".card");
  cards.forEach(card => {
    card.onmouseover = () => {
      card.style.transform = "scale(1.03)";
      card.style.boxShadow = "0 0 10px rgba(0,0,0,0.2)";
      card.style.cursor = "pointer";
      card.style.transition = "transform 0.2s ease, box-shadow 0.2s ease";

    }
    card.onmouseout = () => {
      card.style.transform = "scale(1)";
      card.style.boxShadow = "none";
    }
  });

  cards.forEach(card => {
    card.onclick = () => {
      const headingArea = document.getElementById("heading-area");
      headingArea.innerText = card.id.charAt(0).toUpperCase() + card.id.slice(1);

      const bodyArea = document.getElementById("body-area");
      bodyArea.innerHTML = "";

      switch (card.id) {
        case "pendaftaran":
          bodyArea.innerHTML = `
            <div class="d-flex flex-column justify-content-center align-items-center">
              <h5 class="mt-3">Selamat!</h5>
              <p class="text-center" style="width: 60%;">Anda telah terdaftar pada pengadaan ini, periksa kembali data/dokumen perusahaan anda. Sebelum pemeriksaan pada tahap prakualifikasi</p>
            </div>
          `;
          break;
        case "prakualifikasi":
          bodyArea.innerHTML = `
            <div class="d-flex flex-column justify-content-center align-items-center">
              <h5 class="mt-3">Selamat!</h5>
              <p>Anda terpilih pada tahap prakualifikasi</p>
            </div>
          `;
          break;
        case "tor":
          bodyArea.innerHTML = `
            <div class="d-flex flex-column justify-content-center align-items-center">
              <p>Silahkan download dokumen TOR <a href="<?= SERVER_NAME ?>assets/document/workflow/tor.pdf" download="TOR.pdf">disini</a></p>
            </div>
          `;
          break;
        case "aanwijizing":
          bodyArea.innerHTML = `
            <div class="d-flex flex-column justify-content-center align-items-center">
              <div class="my-3">
                <a href="<?= SERVER_NAME ?>assets/document/workflow/invitation.pdf" download="invitation.pdf" class="btn rounded text-white" style="background-color:orange;"><i class="fa fa-download" aria-hidden="true"></i> Download Invitation</a>
                <a href="<?= SERVER_NAME ?>assets/document/workflow/info.pdf" download="info.pdf" class="btn rounded text-white" style="background-color:orange;"><i class="fa fa-download" aria-hidden="true"></i> Download Info</a>
              </div>
            </div>
          `;
          break;
        case "proposal":
          bodyArea.innerHTML = `
            <div class="d-flex flex-column justify-content-center align-items-center gap-3">
              <p>Silahkan Upload Proposal Anda disini</p>
              <form id="form-upload-file" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center gap-3">
                <input type="text" hidden id='user_id' value="<?= $_SESSION['id'] ?>">
                <input type="file" name="file" id="input-file" class="form-control" style="height:auto;">
                <?php if (isset($documents['data'][0]['proposal'])): ?>
                  <p>Dokumen Lama: <a href="<?= SERVER_NAME ?>assets/document/proposal/<?= $documents['data'][0]['proposal'] ?>" target="_blank">Lihat Dokumen</a></p>
                <?php endif; ?>
                <button type="submit" class="btn btn-success rounded text-white" id="btn-upload-file">
                  <i class="fa fa-upload" aria-hidden="true"></i> Upload
                </button>
                <a href="<?= SERVER_NAME ?>assets/document/proposal/<?= $documents['data'][0]['proposal'] ?>" target="_blank" download="<?= $documents['data'][0]['proposal'] ?>" class="btn btn-primary rounded text-white">
                  <i class="fa fa-download" aria-hidden="true"></i> Download
                </a>
              </form>
            </div>
          `;
          document.getElementById('form-upload-file')?.addEventListener('submit', function(event) {
            event.preventDefault();
            const userId = $('#user_id').val();

            const fileInput = document.getElementById("input-file");
            const formData = new FormData(this);

            fetch(`<?= SERVER_NAME ?>handler/upload_file?id=${userId}&type=proposal`, {
                method: 'POST',
                credentials: 'include',
                body: formData
              })
              .then(response => response.json())
              .then(data => {
                if (data.status === 'success') {
                  Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: data.message
                  });
                } else if (data.status === 'error') {
                  Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: data.message
                  });
                }
              })
              .catch(error => {
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'Terjadi kesalahan saat menghubungi server'
                });
              });
          });
          break;
        case "shortlisted":
          bodyArea.innerHTML = `
          <div class="d-flex flex-column justify-content-center align-items-center">
            <p>Maaf, anda tidak terpilih di pengadaan ini.</p>
          </div>
          `;
          break;
        case "poc":
          bodyArea.innerHTML = `
          <div class="d-flex flex-column justify-content-center align-items-center">
            <p>Silahkan download, undangan POC <a href="<?= SERVER_NAME ?>assets/document/workflow/poc.pdf" download="POC.pdf">disini</a></p>
          </div>
          `;
          break;
        case "announcement":
          bodyArea.innerHTML = `
          <div class="d-flex flex-column justify-content-center align-items-center">
            <p>Selamat anda menempati possisi rank <strong class="fw-bold">2</strong> dengan total score <strong class="fw-bold">905</strong></p>
          </div>
          `;
          break;
      }
    }
  });
</script>