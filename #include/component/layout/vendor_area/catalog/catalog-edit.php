<!-- Modal Content -->
<section class="container tab-pane container-fluid ptb-60">
	<div class="d-flex justify-content-start mb-3">
		<a href="<?= SERVER_NAME ?>vendor_area/user/" class="btn text-capitalize rounded text-white" style="background-color:#AA0A2F;">Kembali</a>
	</div>
	<form method="POST" id="form_edit_katalog" action="" enctype="multipart/form-data">
		<div class="d-flex justify-content-center my-4">
			<h5>Edit Katalog</h5>
		</div>
		<?php foreach ($catalogId['data'] as $data): ?>
			<div class="row">
				<div class="col-md-6 mb-3">
					<label class="form-label">Kode Produk</label>
					<input type="text" maxlength="150" name="kode_produk" id="kode_produk"
						value="<?= $data['kode_produk'] ?>" placeholder="Kode Produk" class="form-control" required="">
				</div>
				<div class="col-md-6 mb-3">
					<label class="form-label">Produk / Solusi</label>
					<input type="text" maxlength="150" name="nama_produk" id="produk_solusi"
						value="<?= $data['produk_solusi'] ?>" placeholder="Produk / Solusi" class="form-control" required="">
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label class="form-label">TKDN Produk</label>
					<input type="text" maxlength="150" name="tkdn_produk" id="tkdn" value="<?= $data['tkdn_produk'] ?>" placeholder="TKDN Produk"
						class="form-control" required="" />
				</div>
				<div class="col-md-6 mb-3">
					<label class="form-label">Jenis</label>
					<select name="jenis_produk" id="jenis_produk" class="form-control" required="">
						<option value="">Pilih Jenis</option>
						<?php if ($data['jenis'] == 'lokal'): ?>
							<option value="lokal" selected>Lokal</option>
							<option value="import">Import</option>
						<?php else: ?>
							<option value="lokal">Lokal</option>
							<option value="import" selected>Import</option>
						<?php endif; ?>
					</select>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label class="form-label">Harga</label>
					<input type="text" name="harga_produk" id="harga" value="<?= $data['harga'] ?>" placeholder="Harga" class="form-control"
						onkeydown="return numbersonly(this, event);">
				</div>
				<div class="col-md-6 mb-3">
					<label class="form-label">Expired Harga</label>
					<input type="text" name="expired_harga" id="expired" value="<?= $data['expired_harga'] ?>" placeholder="Expired Harga"
						class="form-control datepicker" style="background-color:white" onkeydown="return numbersonly(this, event);" step="1">
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 mb-3">
					<label class="form-label">Kategori</label>
					<select name="kategori_produk" id="kategori_katalog" class="form-control" required="">
						<option value="">Pilih Kategori</option>
						<option value="Alat Tulis Kantor" <?= $data['kategori'] == 'Alat Tulis Kantor' ? 'selected' : '' ?>>Alat Tulis Kantor</option>
						<option value="Electric" <?= $data['kategori'] == 'Electric' ? 'selected' : '' ?>>Electric</option>
						<option value="Hardware" <?= $data['kategori'] == 'Hardware' ? 'selected' : '' ?>>Hardware</option>
						<option value="Jasa Konsultasi Perorangan" <?= $data['kategori'] == 'Jasa Konsultasi Perorangan' ? 'selected' : '' ?>>Jasa Konsultasi Perorangan</option>
						<option value="Jasa Konsultasi Perusahaan" <?= $data['kategori'] == 'Jasa Konsultasi Perusahaan' ? 'selected' : '' ?>>Jasa Konsultasi Perusahaan</option>
						<option value="Kendaraan Operasional" <?= $data['kategori'] == 'Kendaraan Operasional' ? 'selected' : '' ?>>Kendaraan Operasional</option>
						<option value="Perlengkapan Fotografi / Videografi" <?= $data['kategori'] == 'Perlengkapan Fotografi / Videografi' ? 'selected' : '' ?>>Perlengkapan Fotografi / Videografi</option>
						<option value="Property" <?= $data['kategori'] == 'Property' ? 'selected' : '' ?>>Property (Tanah atau Bangunan)</option>
						<option value="Rumah Tangga Kantor" <?= $data['kategori'] == 'Rumah Tangga Kantor' ? 'selected' : '' ?>>Rumah Tangga Kantor (RTK)</option>
					</select>
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-12">
					<label class="form-label">Deskripsi</label>
					<textarea name="deskripsi_produk" id="deskripsi" placeholder="Deskripsi" class="form-control"
						required=""><?= $data['deskripsi'] ?></textarea>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<label class="form-label">Foto Produk</label>
					<?php if ($data['gambar']): ?>
						<p>Foto Lama: <a href="<?= SERVER_NAME . 'assets/katalog/image/' . $data['gambar'] ?>" target="_blank">Lihat Foto</a></p>
					<?php endif; ?>
					<center>
						<input type="file" name="photo">
					</center>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<label class="form-label">Dokumen</label>
					<?php if ($data['dokumen']): ?>
						<p>Dokumen Lama: <a href="<?= SERVER_NAME . 'assets/katalog/document/' . $data['dokumen'] ?>" target="_blank">Lihat Dokumen</a></p>
					<?php endif; ?>
					<center>
						<input type="file" name="document">
					</center>
				</div>
			</div>
		<?php endforeach; ?>

		<div class="text-center">
			<button type="submit" class="text-uppercase rounded text-white" style="background-color:#AA0A2F;">Simpan</button>
		</div>
	</form>
</section>
<!-- End Modal Content -->

<script>
	document.getElementById('form_edit_katalog').addEventListener('submit', function(event) {
		event.preventDefault(); // Mencegah form submission tradisional
		const catalogId = new URLSearchParams(window.location.search).get('id');
		Swal.fire({
			title: 'Edit Katalog',
			text: "Apakah kamu ingin edit katalog ini?",
			icon: 'info',
			showCancelButton: true,
			confirmButtonColor: '#007bff',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok',
			cancelButtonText: 'Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.isConfirmed) {
				// Tampilkan loading
				document.getElementById('loader').style.display = 'block';
				fetch(`<?= SERVER_NAME ?>handler/katalog/edit?id=${catalogId}`, {
						method: 'POST',
						credentials: 'include',
						body: new FormData(this)
					})
					.then(response => response.json())
					.then(data => {
						document.getElementById('loader').style.display = 'none';
						if (data.status == 'success') {
							document.getElementById('loader').style.display = 'none';
							Swal.fire({
								title: 'Berhasil',
								text: data.message,
								icon: 'success',
								confirmButtonText: 'OK',
								confirmButtonColor: '#007bff'
							}).then(() => {
								window.location.href = '<?= SERVER_NAME ?>vendor_area/user/';
							});
						} else {
							document.getElementById('loader').style.display = 'none';
							Swal.fire({
								title: 'Gagal',
								text: data.message,
								icon: 'error',
								confirmButtonText: 'OK',
								confirmButtonColor: '#007bff',
							});
						}
					})
					.catch(error => {
						document.getElementById('loader').style.display = 'none';
						Swal.fire({
							title: 'Gagal',
							text: 'Terjadi kesalahan saat menghubungi server.',
							icon: 'error',
							confirmButtonText: 'Ok',
							confirmButtonColor: '#007bff'
						});
					});
			}
		});
	});
</script>