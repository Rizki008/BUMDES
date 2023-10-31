<div class="col-sm-12">

	<?php
	if ($this->session->flashdata('pesan')) {
		echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
		echo $this->session->flashdata('pesan');
		echo '</h5></div>';
	} ?>


	<div class="card card-primary card-outline card-tabs">
		<div class="card-header p-0 pt-1 border-bottom-0">
			<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Pesanan masuk</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Diproses</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Dikirim</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Selesai</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="custom-tabs-three-activity-tab" data-toggle="pill" href="#custom-tabs-three-activity" role="tab" aria-controls="custom-tabs-three-activity" aria-selected="false">Dibatalkan</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<div class="tab-content" id="custom-tabs-three-tabContent">
				<div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
					<table class="table">
						<tr>
							<th>Nama Pembeli</th>
							<th>No Order</th>
							<th>Tanggal Order</th>
							<th>Total Bayar</th>
							<th>Action</th>
						</tr>
						<?php foreach ($pesanan as $key => $value) { ?>
							<tr>
								<td><?= $value->nama_lengkap ?></td>
								<td>
									<?= $value->id_pesanan ?></a>
								</td>
								<td><?= $value->tgl_pesanan ?></td>
								<td>
									<b>Rp. <?= number_format($value->total_harga, 0) ?></b><br>
									<?php if ($value->status_bayar == 0) { ?>
										<span class="badge badge-warning">Belum bayar</span>
									<?php } else { ?>
										<span class="badge badge-success">Sudah bayar</span><br>
										<span class="badge badge-primary">Menunggu Verifikasi</span>
									<?php } ?>
								</td>
								<td>
									<?php if ($value->status_bayar == 1) { ?>
										<button class="btn btn-sm btn-success btn-flat" data-toggle="modal" data-target="#cek<?= $value->id_pesanan ?>">Bukti Bayar</button>
										<a href=" <?= base_url('admin/proses/' . $value->id_pesanan) ?>" class="btn btn-sm btn-flat btn-primary">Verifikasi</a>
									<?php } ?>

								</td>
							</tr>
						<?php } ?>

					</table>
				</div>

				<div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
					<table class="table">
						<tr>
							<th>Nama Pembeli</th>
							<th>No Order</th>
							<th>Tanggal Order</th>
							<th>Total Bayar</th>
						</tr>
						<?php foreach ($pesanan_diproses as $key => $value) { ?>
							<tr>
								<td><?= $value->nama_lengkap ?></td>
								<td><a href="<?= base_url('admin/detail/' . $value->id_pesanan) ?>"><?= $value->id_pesanan ?></a></td>
								<td><?= $value->tgl_pesanan ?></td>
								<td>
									<b>Rp. <?= number_format($value->total_harga, 0) ?></b><br>
									<span class="badge badge-primary">Dikemas</span>

								</td>
							</tr>
						<?php } ?>

					</table>
				</div>

				<div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
					<table class="table">
						<tr>
							<th>Nama Pembeli</th>
							<th>No Order</th>
							<th>Tanggal Order</th>
							<th>Alamat</th>
							<th>Total Bayar</th>
						</tr>
						<?php foreach ($pesanan_dikirim as $key => $value) { ?>
							<tr>
								<td><?= $value->nama_lengkap ?></td>
								<td><?= $value->id_pesanan ?></td>
								<td><?= $value->tgl_pesanan ?></td>
								<td><?= $value->alamat ?></td>
								<td>
									<b>Rp. <?= number_format($value->total_harga, 0) ?></b><br>
									<span class="badge badge-success">Dikirim</span>
								</td>

							</tr>
						<?php } ?>

					</table>
				</div>

				<div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
					<table class="table">
						<tr>
							<th>Nama Pembeli</th>
							<th>No Order</th>
							<th>Tanggal Order</th>
							<th>Alamat</th>
							<th>Total Bayar</th>
						</tr>
						<?php foreach ($pesanan_selesai as $key => $value) { ?>
							<tr>
								<td><?= $value->nama_lengkap ?></td>
								<td><?= $value->id_pesanan ?></td>
								<td><?= $value->tgl_pesanan ?></td>
								<td><?= $value->alamat ?></td>
								<td>
									<b>Rp. <?= number_format($value->total_harga, 0) ?></b><br>
									<span class="badge badge-success">Diterima</span>
								</td>

							</tr>
						<?php } ?>

					</table>
				</div>

				<div class="tab-pane fade" id="custom-tabs-three-activity" role="tabpanel" aria-labelledby="custom-tabs-three-activity-tab">
					<table class="table">
						<tr>
							<th>Nama Pembeli</th>
							<th>No Order</th>
							<th>Tanggal Order</th>
							<th>Total Bayar</th>
							<th>Catatan</th>
						</tr>
						<?php foreach ($pesanan_dibatalkan as $key => $value) { ?>
							<tr>
								<td><?= $value->nama_lengkap ?></td>
								<td>
									<?= $value->id_pesanan ?></a>
								</td>
								<td><?= $value->tgl_pesanan ?></td>
								<td>
									<b>Rp. <?= number_format($value->total_harga, 0) ?></b><br>
									<span class="badge badge-danger">Pesanan Dibatalkan</span>
								</td>
							</tr>
						<?php } ?>

					</table>
				</div>
			</div>
		</div>
		<!-- /.card -->
	</div>
</div>


<!--Model-->
<?php foreach ($pesanan as $key => $value) { ?>
	<div class="modal fade" id="cek<?= $value->id_pesanan ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><?= $value->id_pesanan ?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo form_open('admin/batal/' . $value->id_pesanan) ?>
					<table class="table">
						<tr>
							<th>Atas Nama</th>
							<th>:</th>
							<td><?= $value->nama_lengkap ?></td>
						</tr>
						<tr>
							<th>Total Harga</th>
							<th>:</th>
							<td><?= number_format($value->total_harga, 0) ?></td>
						</tr>
						<tr>
							<th>Total Bayar</th>
							<th>:</th>
							<td><?= number_format($value->jml_bayar, 0) ?></td>
						</tr>
					</table>
					<img class="img-fluid pad" src="<?= base_url('assets/bukti_bayar/' . $value->bukti_bayar) ?>" alt="">
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Batalkan</button>
				</div>
				<?php echo form_close() ?>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>