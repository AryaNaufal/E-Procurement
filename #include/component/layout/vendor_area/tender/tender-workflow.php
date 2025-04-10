<div style="min-height: calc(100vh - 150px);">
  <div class="container py-5">
    <div class="mb-5">
      <div class="d-flex align-items-center" style="gap: 20px;">
        <i class="fa fa-arrow-left" aria-hidden="true" style="font-size: 25px; cursor: pointer;" onclick="window.history.back()"></i>
        <h3>Workflow Pengadaan</h3>
      </div>
      <p><?= $tender['data'][0]['description'] ?></p>
    </div>

    <div class="d-flex justify-content-center flex-wrap" style="gap: 20px; width: 100%;">
      <div class="card" id="pendaftaran">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <?php if (isset($timeline['data'][0]['awal_pendaftaran'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/1_submit_done.png" alt="">
          <?php else: ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/1_submit_disabled.png" alt="">
          <?php endif; ?>
          <h6 class="card-title">Pendaftaran</h6>
        </div>
      </div>

      <div class="card" id="prakualifikasi" style="<?= !isset($timeline['data'][0]['prakualifikasi']) && !isset($timeline['data'][0]['awal_pendaftaran']) ? 'cursor: not-allowed' : '' ?>">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <?php if (isset($timeline['data'][0]['prakualifikasi'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/2_prakualifikasi_done.png" alt="">
          <?php elseif (!isset($timeline['data'][0]['prakualifikasi']) && isset($timeline['data'][0]['awal_pendaftaran'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/2_prakualifikasi_abu.png" alt="">
          <?php else: ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/2_prakualifikasi_disabled.png" alt="">
          <?php endif; ?>
          <h6 class="card-title">Prakualifikasi</h6>
        </div>
      </div>

      <div class="card" id="tor" style="<?= !isset($timeline['data'][0]['tor']) && !isset($timeline['data'][0]['prakualifikasi']) ? 'cursor: not-allowed' : '' ?>">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <?php if (isset($timeline['data'][0]['tor'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/3_tor_done.png" alt="">
          <?php elseif (!isset($timeline['data'][0]['tor']) && isset($timeline['data'][0]['prakualifikasi'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/3_tor_abu.png" alt="">
          <?php else: ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/3_tor_disabled.png" alt="">
          <?php endif; ?>
          <h6 class="card-title">TOR</h6>
        </div>
      </div>

      <div class="card" id="aanwijizing" style="<?= !isset($timeline['data'][0]['aanwijizing']) && !isset($timeline['data'][0]['tor']) ? 'cursor: not-allowed' : '' ?>">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <?php if (isset($timeline['data'][0]['aanwijizing'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/4_invitation_done.png" alt="">
          <?php elseif (!isset($timeline['data'][0]['aanwijizing']) && isset($timeline['data'][0]['tor'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/4_invitation_abu.png" alt="">
          <?php else: ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/4_invitation_disabled.png" alt="">
          <?php endif; ?>
          <h6 class="card-title">Aanwijizing</h6>
        </div>
      </div>

      <div class="card" id="proposal" style="<?= !isset($timeline['data'][0]['submit_proposal']) && !isset($timeline['data'][0]['aanwijizing']) ? 'cursor: not-allowed' : '' ?>">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <?php if (isset($timeline['data'][0]['submit_proposal'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/5_proposal_done.png" alt="">
          <?php elseif (!isset($timeline['data'][0]['submit_proposal']) && isset($timeline['data'][0]['aanwijizing'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/5_proposal_abu.png" alt="">
          <?php else: ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/5_proposal_disabled.png" alt="">
          <?php endif; ?>
          <h6 class="card-title">Proposal</h6>
        </div>
      </div>

      <div class="card" id="shortlisted" style="<?= !isset($timeline['data'][0]['shortlisted']) && !isset($timeline['data'][0]['submit_proposal']) ? 'cursor: not-allowed' : '' ?>">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <?php if (isset($timeline['data'][0]['shortlisted'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/6_shortlisted_done.png" alt="">
          <?php elseif (!isset($timeline['data'][0]['shortlisted']) && isset($timeline['data'][0]['submit_proposal'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/6_shortlisted_abu.png" alt="">
          <?php else: ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/6_shortlisted_disabled.png" alt="">
          <?php endif; ?>
          <h6 class="card-title">Shortlisted</h6>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-center flex-wrap mt-4" style="gap: 20px; width: 100%;">
      <div class="card" id="poc" style="<?= !isset($timeline['data'][0]['poc']) && !isset($timeline['data'][0]['shortlisted']) ? 'cursor: not-allowed' : '' ?>">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <?php if (isset($timeline['data'][0]['poc'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/7_poc_done.png" alt="">
          <?php elseif (!isset($timeline['data'][0]['poc']) && isset($timeline['data'][0]['shortlisted'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/7_poc_abu.png" alt="">
          <?php else: ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/7_poc_disabled.png" alt="">
          <?php endif; ?>
          <h6 class="card-title">POC</h6>
        </div>
      </div>

      <div class="card" id="announcement" style="<?= !isset($timeline['data'][0]['announcement']) && !isset($timeline['data'][0]['poc']) ? 'cursor: not-allowed' : '' ?>">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <?php if (isset($timeline['data'][0]['announcement'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/8_pengumuman_done.png" alt="">
          <?php elseif (!isset($timeline['data'][0]['announcement']) && isset($timeline['data'][0]['poc'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/8_pengumuman_abu.png" alt="">
          <?php else: ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/8_pengumuman_disabled.png" alt="">
          <?php endif; ?>
          <h6 class="card-title">Announcement</h6>
        </div>
      </div>

      <div class="card" id="negotiation" style="<?= !isset($timeline['data'][0]['awal_negosisasi']) && !isset($timeline['data'][0]['announcement']) ? 'cursor: not-allowed' : '' ?>">
        <div class="card-body d-flex align-items-center flex-column" style="gap: 20px; min-width: 170px;">
          <?php if (isset($timeline['data'][0]['awal_negosiasi'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/9_nego_done.png" alt="">
          <?php elseif (!isset($timeline['data'][0]['awal_negosiasi']) && isset($timeline['data'][0]['announcement'])): ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/9_nego_abu.png" alt="">
          <?php else: ?>
            <img src="<?= SERVER_NAME ?>assets/icon/alur_eproc/9_nego_disabled.png" alt="">
          <?php endif; ?>
          <h6 class="card-title">Negotiation</h6>
        </div>
      </div>

      <div class="card" id="purchase-order" style="<?= !isset($timeline['data'][0]['po']) && !isset($timeline['data'][0]['announcement']) ? 'cursor: not-allowed' : '' ?>">
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
  let headingArea = document.getElementById("heading-area");
  let bodyArea = document.getElementById("body-area");

  // Pendaftaran
  <?php if (isset($timeline['data'][0]['awal_pendaftaran']) && ($timeline['data'][0]['awal_pendaftaran'] != null)): ?>
    const pendaftaran = document.getElementById("pendaftaran");

    pendaftaran.onmouseover = () => {
      pendaftaran.style.transform = "scale(1.03)";
      pendaftaran.style.boxShadow = "0 0 10px rgba(0,0,0,0.2)";
      pendaftaran.style.cursor = "pointer";
      pendaftaran.style.transition = "transform 0.2s ease, box-shadow 0.2s ease";

    }
    pendaftaran.onmouseout = () => {
      pendaftaran.style.transform = "scale(1)";
      pendaftaran.style.boxShadow = "none";
    }

    pendaftaran.onclick = () => {
      headingArea.innerHTML = "Pendaftaran";
      bodyArea.innerHTML = `
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h5 class="mt-3">Selamat!</h5>
          <p class="text-center" style="width: 60%;">Anda telah terdaftar pada pengadaan ini, periksa kembali data/dokumen perusahaan anda. Sebelum pemeriksaan pada tahap prakualifikasi</p>
        </div>
      `;
    }
  <?php endif; ?>

  // Prakualifikasi
  <?php if (isset($timeline['data'][0]['prakualifikasi']) || ((!isset($timeline['data'][0]['prakualifikasi']) && isset($timeline['data'][0]['awal_pendaftaran'])))): ?>
    const prakualifikasi = document.getElementById("prakualifikasi");

    prakualifikasi.onmouseover = () => {
      prakualifikasi.style.transform = "scale(1.03)";
      prakualifikasi.style.boxShadow = "0 0 10px rgba(0,0,0,0.2)";
      prakualifikasi.style.cursor = "pointer";
      prakualifikasi.style.transition = "transform 0.2s ease, box-shadow 0.2s ease";

    }
    prakualifikasi.onmouseout = () => {
      prakualifikasi.style.transform = "scale(1)";
      prakualifikasi.style.boxShadow = "none";
    }

    prakualifikasi.onclick = () => {
      headingArea.innerHTML = "Prakualifikasi";
      bodyArea.innerHTML = `
         <div class="d-flex flex-column justify-content-center align-items-center">
          <h5 class="mt-3">Selamat!</h5>
          <p>Anda terpilih pada tahap prakualifikasi</p>
        </div>
      `;
    }
  <?php endif; ?>

  // TOR
  <?php if (isset($timeline['data'][0]['tor']) || ((!isset($timeline['data'][0]['tor']) && isset($timeline['data'][0]['prakualifikasi'])))): ?>
    const tor = document.getElementById("tor");

    tor.onmouseover = () => {
      tor.style.transform = "scale(1.03)";
      tor.style.boxShadow = "0 0 10px rgba(0,0,0,0.2)";
      tor.style.cursor = "pointer";
      tor.style.transition = "transform 0.2s ease, box-shadow 0.2s ease";

    }
    tor.onmouseout = () => {
      tor.style.transform = "scale(1)";
      tor.style.boxShadow = "none";
    }

    tor.onclick = () => {
      headingArea.innerHTML = "TOR";
      bodyArea.innerHTML = `
        <div class="d-flex flex-column justify-content-center align-items-center">
          <p>Silahkan download dokumen TOR <a href="<?= SERVER_NAME ?>assets/document/workflow/TOR.pdf" download="TOR.pdf" id="insert_tor">disini</a></p>
        </div>
      `;
      document.getElementById("insert_tor").onclick = () => {
        fetch(`<?= SERVER_NAME ?>handler/workflow/insert_tor?participant_id=${<?= $_SESSION['id'] ?>}&tender_id=${<?= $_GET['id'] ?>}`)
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              window.location.reload();
            } else {
              window.location.reload();
            }
          })
          .catch(error => {
            console.error('Error:', error);
          });
      }
    }
  <?php endif; ?>

  // Aanwijizing
  <?php if (isset($timeline['data'][0]['aanwijizing']) || ((!isset($timeline['data'][0]['aanwijizing']) && isset($timeline['data'][0]['tor'])))): ?>
    const aanwijizing = document.getElementById("aanwijizing");

    aanwijizing.onmouseover = () => {
      aanwijizing.style.transform = "scale(1.03)";
      aanwijizing.style.boxShadow = "0 0 10px rgba(0,0,0,0.2)";
      aanwijizing.style.cursor = "pointer";
      aanwijizing.style.transition = "transform 0.2s ease, box-shadow 0.2s ease";

    }
    aanwijizing.onmouseout = () => {
      aanwijizing.style.transform = "scale(1)";
      aanwijizing.style.boxShadow = "none";
    }

    let invitationClicked = false;
    let infoClicked = false;

    aanwijizing.onclick = () => {
      headingArea.innerHTML = "Aanwijizing";
      bodyArea.innerHTML = `
        <div class="d-flex flex-column justify-content-center align-items-center">
          <div class="my-3">
            <a href="<?= SERVER_NAME ?>assets/document/workflow/invitation.pdf" id="invitation_btn" download="invitation.pdf" class="btn rounded text-white" style="background-color:orange;"><i class="fa fa-download" aria-hidden="true"></i> Download Invitation</a>
            <a href="<?= SERVER_NAME ?>assets/document/workflow/info.pdf" id="info_btn" download="info.pdf" class="btn rounded text-white" style="background-color:orange;"><i class="fa fa-download" aria-hidden="true"></i> Download Info</a>
          </div>
        </div>
      `;

      document.getElementById("invitation_btn").onclick = () => {
        invitationClicked = true;
        checkBothButtonsClicked();
      };

      document.getElementById("info_btn").onclick = () => {
        infoClicked = true;
        checkBothButtonsClicked();
      };
    }

    function checkBothButtonsClicked() {
      if (invitationClicked && infoClicked) {
        fetch(`<?= SERVER_NAME ?>handler/workflow/insert_aanwijizing?participant_id=${<?= $_SESSION['id'] ?>}&tender_id=${<?= $_GET['id'] ?>}`)
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              window.location.reload();
            }
          })
          .catch(error => {
            console.error('Error:', error);
          });
      }
    }
  <?php endif; ?>

  // Proposal
  <?php if (isset($timeline['data'][0]['submit_proposal']) || ((!isset($timeline['data'][0]['submit_proposal']) && isset($timeline['data'][0]['aanwijizing'])))): ?>
    const proposal = document.getElementById("proposal");

    proposal.onmouseover = () => {
      proposal.style.transform = "scale(1.03)";
      proposal.style.boxShadow = "0 0 10px rgba(0,0,0,0.2)";
      proposal.style.cursor = "pointer";
      proposal.style.transition = "transform 0.2s ease, box-shadow 0.2s ease";

    }
    proposal.onmouseout = () => {
      proposal.style.transform = "scale(1)";
      proposal.style.boxShadow = "none";
    }

    proposal.onclick = () => {
      headingArea.innerHTML = "Submit Proposal";
      bodyArea.innerHTML = `
        <div class="d-flex flex-column justify-content-center align-items-center gap-3">
          <p>Silahkan Upload Proposal Anda disini</p>
          <form id="form-upload-file" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center gap-3">
            <input type="text" hidden id='user_id' value="<?= $_SESSION['id'] ?>">
            <input type="file" name="file" id="input-file" class="form-control" style="height:auto;">
            <?php if (isset($proposal['data'][0]['proposal']) && !empty($proposal['data'][0]['proposal'])): ?>
              <p>Dokumen Lama: <a href="<?= SERVER_NAME ?>assets/document/proposal/<?= $proposal['data'][0]['proposal'] ?>" target="_blank">Lihat Dokumen</a></p>
            <?php endif; ?>
            <button type="submit" class="btn btn-success rounded text-white" id="btn-upload-file">
              <i class="fa fa-upload" aria-hidden="true"></i> Upload
            </button>
            <a href="<?= SERVER_NAME ?>assets/document/proposal/<?= isset($proposal['data'][0]['proposal']) ?? $proposal['data'][0]['proposal'] ?>" target="_blank" download="<?= isset($proposal['data'][0]['proposal']) ?? $proposal['data'][0]['proposal'] ?>" class="btn btn-primary rounded text-white">
              <i class="fa fa-download" aria-hidden="true"></i> Download
            </a>
          </form>
        </div>
      `;
      document.getElementById('form-upload-file')?.addEventListener('submit', function(event) {
        event.preventDefault();

        const fileInput = document.getElementById("input-file");
        const formData = new FormData(this);

        fetch(`<?= SERVER_NAME ?>handler/workflow/insert_proposal?id=<?= $_GET['id'] ?>&user_id=<?= $_SESSION['id'] ?>&tender_id=<?= $_GET['id'] ?>`, {
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
              }).then(() => {
                window.location.reload();
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
    }
  <?php endif; ?>

  // Shortlisted
  <?php if (isset($timeline['data'][0]['shortlisted']) || ((!isset($timeline['data'][0]['shortlisted']) && isset($timeline['data'][0]['submit_proposal'])))): ?>
    const shortlisted = document.getElementById("shortlisted");

    shortlisted.onmouseover = () => {
      shortlisted.style.transform = "scale(1.03)";
      shortlisted.style.boxShadow = "0 0 10px rgba(0,0,0,0.2)";
      shortlisted.style.cursor = "pointer";
      shortlisted.style.transition = "transform 0.2s ease, box-shadow 0.2s ease";

    }
    shortlisted.onmouseout = () => {
      shortlisted.style.transform = "scale(1)";
      shortlisted.style.boxShadow = "none";
    }

    shortlisted.onclick = () => {
      headingArea.innerHTML = "Shortlisted";
      bodyArea.innerHTML = `
        <div class="d-flex flex-column justify-content-center align-items-center">
          <p>Maaf, anda tidak terpilih di pengadaan ini.</p>
        </div>
      `;
    }
  <?php endif; ?>

  // POC
  <?php if (isset($timeline['data'][0]['poc']) || ((!isset($timeline['data'][0]['poc']) && isset($timeline['data'][0]['shortlisted'])))): ?>
    const poc = document.getElementById("poc");

    poc.onmouseover = () => {
      poc.style.transform = "scale(1.03)";
      poc.style.boxShadow = "0 0 10px rgba(0,0,0,0.2)";
      poc.style.cursor = "pointer";
      poc.style.transition = "transform 0.2s ease, box-shadow 0.2s ease";

    }
    poc.onmouseout = () => {
      poc.style.transform = "scale(1)";
      poc.style.boxShadow = "none";
    }

    poc.onclick = () => {
      headingArea.innerHTML = "POC";
      bodyArea.innerHTML = `
        <div class="d-flex flex-column justify-content-center align-items-center">
          <p>Silahkan download, undangan POC <a href="<?= SERVER_NAME ?>assets/document/workflow/POC.pdf" download="POC.pdf">disini</a></p>
        </div>
      `;
    }
  <?php endif; ?>

  // Announcement
  <?php if (isset($timeline['data'][0]['announcement']) || ((!isset($timeline['data'][0]['announcement']) && isset($timeline['data'][0]['poc'])))): ?>
    const announcement = document.getElementById("announcement");

    announcement.onmouseover = () => {
      announcement.style.transform = "scale(1.03)";
      announcement.style.boxShadow = "0 0 10px rgba(0,0,0,0.2)";
      announcement.style.cursor = "pointer";
      announcement.style.transition = "transform 0.2s ease, box-shadow 0.2s ease";

    }
    announcement.onmouseout = () => {
      announcement.style.transform = "scale(1)";
      announcement.style.boxShadow = "none";
    }

    announcement.onclick = () => {
      headingArea.innerHTML = "Announcement";
      bodyArea.innerHTML = `
        <div class="d-flex flex-column justify-content-center align-items-center">
          <p>Selamat anda menempati possisi rank <strong class="fw-bold">2</strong> dengan total score <strong class="fw-bold">905</strong></p>
        </div>
      `;
    }
  <?php endif; ?>
</script>