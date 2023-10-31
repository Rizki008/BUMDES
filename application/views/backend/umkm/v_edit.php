<!-- right column -->
<div class="col-md-12">
	<!-- general form elements disabled -->
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Form Edit UMKM</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<?php
			//notifikasi form kosong
			echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i>', '</h5></div>');

			//notifikasi gagal upload gambar
			if (isset($error_upload)) {
				echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i>' . $error_upload . '</h5></div>';
			}
			echo form_open_multipart('umkm/edit/' . $umkm->id_umkm) ?>
			<!-- text input -->
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Pemilik UMKM</label>
						<input name="pemilik" type="text" class="form-control" placeholder="Pemilik UMKM" value="<?= $umkm->pemilik ?>">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Nama UMKM</label>
						<input name="nama_umkm" type="text" class="form-control" placeholder="Nama UMKM" value="<?= $umkm->nama_umkm ?>">
					</div>
				</div>
			</div>
			<!-- text input -->
			<div class="form-group">
				<label>Deskripsi UMKM</label>
				<textarea name="deskripsi" class="form-control" cols="30" rows="10" placeholder="Deskripsi UMKM"><?= $umkm->deskripsi ?></textarea>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Gambar umkm</label>
						<input type="file" name="gambar" class="form-control" id="preview_gambar">
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<img src="<?= base_url('assets/umkm/' . $umkm->gambar) ?>" id="gambar_load" width="400px">
					</div>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
				<a href="<?= base_url('umkm') ?>" class="btn btn-warning btn-sm">Kembali</a>
			</div>

			<?php echo form_close() ?>
		</div>
	</div>
</div>

<script>
	function bacaGambar(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#gambar_load').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#preview_gambar").change(function() {
		bacaGambar(this);
	});
</script>