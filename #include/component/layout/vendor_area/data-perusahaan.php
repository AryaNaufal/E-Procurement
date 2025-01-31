<?php include_once __DIR__ . '/../../fragment/breadcrumb-banner.php'; ?>

<!-- About Area Start -->
<div class="about-area ptb-130 ptb-sm-60" style="padding-top: 45px !important;">
  <div class="container">
    <div class="row">
      <?php include_once __DIR__ . '/../../fragment/breadcrumb-nav.php'; ?>
      <div class="col-lg-12">
        <div class="tab-content">
          <form class="row g-3 needs-validation" novalidate>
            <div class="w-100">
              <h3 class="d-flex justify-content-center my-5">Data Perusahaan</h3>
              <div>
                <div class="row mb-4">
                  <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Nama Perusahaan</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Nama Perusahaan" required>
                    <div class="invalid-feedback">
                      Masukan Nama Perusahaan
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Type Perusahaan</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder="Pilih Tipe Perusahaan" required>
                    <div class="invalid-feedback">
                      PilihTipe Perusahaan
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Email Perusahaan</label>
                    <div class="input-group has-validation">
                      <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="Email Perusahaan" required>
                      <div class="invalid-feedback">
                        Masukan Email Perusahaan
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">No. Tlp Perusahaan</label>
                    <input type="text" class="form-control" id="validationCustom03" placeholder="Email Perusahaan" required>
                    <div class="invalid-feedback">
                      Please provide a valid city.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">No. Hp Perusahaan</label>
                    <input type="text" class="form-control" id="validationCustom04" placeholder="Email Perusahaan" required>
                    <div class="invalid-feedback">
                      Please provide a valid city.
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col-md-12">
                    <label for="validationCustom03" class="form-label">Alamat</label>
                    <textarea class="form-control" id="validationTextarea" placeholder="Masukan Alamat Perusahaan" required></textarea>
                    <div class="invalid-feedback">
                      Please provide a valid city.
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Provinsi</label>
                    <select class="form-select" required aria-label="select example">
                      <option value="" disabled selected>Pilih Provinsi</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                    <div class="invalid-feedback">
                      Please provide a valid city.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Kota/Kabupaten</label>
                    <select class="form-select" required aria-label="select example">
                      <option value="" disabled selected>Pilih Kota/Kabupaten</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                    <div class="invalid-feedback">
                      Please provide a valid city.
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Kecamatan</label>
                    <select class="form-select" required aria-label="select example">
                      <option value="" disabled selected>Pilih Kecamatan</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                    <div class="invalid-feedback">
                      Please provide a valid city.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Perusahaan</label>
                    <select class="form-select" required aria-label="select example">
                      <option value="" disabled selected>Pilih Perusahaan</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                    <div class="invalid-feedback">
                      Please provide a valid city.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-100">
              <h3 class="d-flex justify-content-center my-5">Kategori Perusahaan</h3>
              <div class="col-12 d-flex gap-5 justify-content-between flex-wrap mb-4">
                <div class="d-flex align-items-center">
                  <input type="checkbox" class="form-check-input" id="validationFormCheck1" required>
                  <label class="form-check-label" for="validationFormCheck1">Internet</label>
                </div>
                <div class="d-flex align-items-center">
                  <input type="checkbox" class="form-check-input" id="validationFormCheck2" required>
                  <label class="form-check-label" for="validationFormCheck2">Arsitektur</label>
                </div>
                <div class="d-flex align-items-center">
                  <input type="checkbox" class="form-check-input" id="validationFormCheck3" required>
                  <label class="form-check-label" for="validationFormCheck3">Makanan & Minuman</label>
                </div>
                <div class="d-flex align-items-center">
                  <input type="checkbox" class="form-check-input" id="validationFormCheck4" required>
                  <label class="form-check-label" for="validationFormCheck4">Logistik</label>
                </div>
                <div class="d-flex align-items-center">
                  <input type="checkbox" class="form-check-input" id="validationFormCheck5" required>
                  <label class="form-check-label" for="validationFormCheck5">Software House</label>
                </div>
                <div class="d-flex align-items-center">
                  <input type="checkbox" class="form-check-input" id="validationFormCheck6" required>
                  <label class="form-check-label" for="validationFormCheck6">Perlengkapan Fotografi</label>
                </div>
                <div class="invalid-feedback">Example invalid feedback text</div>
              </div>
            </div>
            <div class="col-12 d-flex justify-content-center mt-4">
              <button class="btn btn-primary text-capitalize " type="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>