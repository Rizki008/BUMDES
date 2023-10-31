<!-- Home -->

<div class="home">
	<div class="breadcrumbs_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumbs">
						<ul>
							<li><a href="<?= base_url('') ?>">Home</a></li>
							<li>Keranjang Belanja</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Contact -->
<br>
<br>
<div class="contact">

	<!-- Contact Map -->

	<!-- Contact Info -->

	<div class="contact_info_container">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Keranjang Belanja</h2><br>
				</div>
				<div class="col-lg-12">
					<table class="table table-bordered" id="myTable">
						<thead>
							<tr>
								<th class="text-center" width="50px">No</th>
								<th class="text-center">No Pesanan</th>
								<th class="text-center">Tanggal Pesanan</th>
								<th class="text-center">Total Harga Bayar</th>
								<th class="text-center">Status Pesanan</th>
								<th class="text-center">Action</th>
								</th>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($pesanan as $key => $value) { ?>
								<tr>
									<td class="text-center"><?= $no++ ?></td>
									<td><?= $value->id_pesanan ?></td>
									<td><?= $value->tgl_pesanan ?></td>
									<td>Rp. <?= number_format($value->total_harga, 0) ?></td>
									<td>
										<?php if ($value->status == 0 && $value->status_bayar == 0) { ?>
											<span class="badge badge-primary">Silahkan Melakukan Pembayaran</span>
										<?php } elseif ($value->status == 0 && $value->status_bayar == 1) { ?>
											<span class="badge badge-primary">Menunggu Verifikasi</span><br>
										<?php } elseif ($value->status == 1) { ?>
											<span class="badge badge-warning">Diproses</span>
										<?php } elseif ($value->status == 2) { ?>
											<span class="badge badge-info">Dikirim</span>
										<?php } elseif ($value->status == 3) { ?>
											<span class="badge badge-success">Selesai</span>
										<?php } else { ?>
											<span class="badge badge-danger">Dibatalkan</span>
										<?php } ?>
									</td>
									<td>
										<?php if ($value->status_bayar == '0') { ?>
											<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_pesanan ?>"><i class="fa fa-dollar"></i>Bayar</button>
										<?php } ?>
										<?php if ($value->status == '2') { ?>
											<button class="btn btn-primary btn-xs btn-flat" data-toggle="modal" data-target="#diterima<?= $value->id_pesanan ?>">Diterima</button>
										<?php } ?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php foreach ($pesanan as $key => $value) { ?>
	<div class="modal fade" id="edit<?= $value->id_pesanan ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Bayar pesanan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php
					echo form_open_multipart('pesanan_saya/bayar/' . $value->id_pesanan);
					?>

					<div class="form-group">
						<label>Jumlah Bayar</label>
						<input type="number" name="jml_bayar" class="form-control" placeholder="Jumlah Bayar" required>
					</div>
					<div class="form-group">
						<label>Bukti Bayar</label>
						<input type="file" name="bukti_bayar" class="form-control" placeholder="Bukti Bayar" required>
					</div>

				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
				<?php
				echo form_close();
				?>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>
<!-- Newsletter -->\

<?php foreach ($pesanan as $key => $value) { ?>
	<div class="modal fade" id="diterima<?= $value->id_pesanan ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Pesanan Diterima</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Apakah Anda Yakin Pesanan Sudah Diterima?
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
					<a href="<?= base_url('pesanan_saya/diterima/' . $value->id_pesanan) ?>" class="btn btn-primary">Ya</a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>

<br>
<br>