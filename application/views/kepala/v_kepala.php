<div class="col-lg-3 col-6">
	<!-- small box -->
	<div class="small-box bg-info">
		<div class="inner">
			<h3><?= $total_pesanan ?></h3>

			<p>Pesanan Masuk</p>
		</div>
		<div class="icon">
			<i class="ion ion-bag"></i>
		</div>
		<a href="#" class="small-box-footer">Pesanan Masuk<i class="fas fa-arrow-circle-up"></i></a>
	</div>
</div>

<div class="col-lg-3 col-6">
	<!-- small box -->
	<div class="small-box bg-success">
		<div class="inner">
			<h3><?= $total_produk ?></h3>

			<p>Produk</p>
		</div>
		<div class="icon">
			<i class="ion ion-bag"></i>
		</div>
		<a href="#" class="small-box-footer">Jumlah Produk<i class="fas fa-arrow-circle-up"></i></a>
	</div>
</div>

<div class="col-lg-3 col-6">
	<!-- small box -->
	<div class="small-box bg-warning">
		<div class="inner">
			<h3><?= $total_pelanggan ?></h3>

			<p>User</p>
		</div>
		<div class="icon">
			<i class="fas fa-users"></i>
		</div>
		<a href="#" class="small-box-footer">Jumlah User<i class="fas fa-arrow-circle-up"></i></a>
	</div>
</div>

<div class="col-lg-3 col-6">
	<!-- small box -->
	<div class="small-box bg-danger">
		<div class="inner">
			<h3><?= $total_transaksi ?></h3>
			<p>Transaksi</p>
		</div>
		<div class="icon">
			<i class="fas fa-money-check-alt"></i>
		</div>
		<a href="#" class="small-box-footer">Total Transaksi Selesai<i class="fas fa-arrow-circle-up"></i></a>
	</div>
</div>

<div class="col-md-6">
	<div class="card">
		<div class="card-header border-transparent">
			<h3 class="card-title">Informasi Stock</h3>
		</div>
		<div class="card-body table-responsive p-0">
			<table class="table table-striped table-valign-middle">
				<thead>
					<tr>
						<th>Produk</th>
						<th>Harga</th>
						<th>Stock</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($data_stock as $key => $value) { ?>
						<tr>
							<td>
								<img src="<?= base_url('assets/produk/' . $value->img) ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
								<?= $value->nama_produk ?>
							</td>
							<td>Rp. <?= number_format($value->harga, 0) ?></td>
							<td>
								<?php if ($value->stock <= 50) { ?>
									<small class="text-danger mr-1">
										<i class="fas fa-arrow-down"></i>
										<?= $value->stock ?>
									</small>
									<?= $value->qty ?>
								<?php } else { ?>
									<small class="text-warning mr-1">
										<i class="fas fa-arrow-down"></i>
										<?= $value->stock ?>
									</small>
									<?= $value->qty ?>
								<?php } ?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="col-md-6">
	<div class="card">
		<div class="card-header border-transparent">
			<h3 class="card-title">Informasi Penjualan</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table m-0">
					<thead>
						<tr>
							<th>No Order</th>
							<th>Nama Pelanggan</th>
							<th>Status</th>
							<th>Biaya</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($status_transaksi_selesai as $key => $value) { ?>
							<tr>
								<td><?= $value->id_pesanan ?></td>
								<td><?= $value->nama_lengkap ?></td>
								<td>
									<span class="badge badge-success">Selesai</span><br>
								</td>
								<td>
									<div class="sparkbar" data-color="#00a65a" data-height="20">
										Total Harga : Rp. <?= number_format($value->total_harga, 0) ?><br>
										Total Bayar : Rp. <?= number_format($value->jml_bayar, 0) ?></div>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<!-- /.table-responsive -->
		</div>
		<!-- /.card-body -->
		<!-- /.card-footer -->
	</div>
	<!-- /.card -->
</div>
<!-- /.col -->


<div class="col-md-12">
	<!-- AREA CHART -->
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Produk Terlaris</h3>

			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
				</button>
				<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
			</div>
		</div>
		<div class="card-body">
			<div class="chart">
				<div id="larissa"></div>
			</div>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>


<!-- MEREK PRODUK TERLARIS -->
<script type="text/javascript">
	Highcharts.chart('larissa', {
		chart: {
			type: 'column'
			// type: 'line'
		},
		title: {
			text: 'Grafik Produk Terlaris Pertanggal, Bulan, Tahun'
		},
		subtitle: {
			text: 'Badan Usaha Milik Desa'
		},
		xAxis: {

			categories: [
				<?php
				$tanggal_tahun = $this->m_auth->bulan();
				foreach ($tanggal_tahun as $betul) {
					echo "'" . $betul['tgl_pesanan'] . "',";
				}
				?>
			]
		},
		yAxis: {
			title: {
				text: 'Jumlah Terjual'
			}
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		series: [
			<?php
			$merek = $this->m_auth->merek();
			foreach ($merek as $mereka) { ?> {
					name: '<?php echo $mereka['nama_produk'] ?>',

					data: [
						<?php
						$tanggal_tahun = $this->m_auth->bulan();
						foreach ($tanggal_tahun as $ketiga) {
							$total_prpduk = $this->db->query("SELECT SUM(qty) as laris FROM `detail_pesanan` LEFT JOIN pesanan ON pesanan.id_pesanan=detail_pesanan.id_pesanan LEFT JOIN produk ON produk.id_produk=detail_pesanan.id_produk WHERE nama_produk='" . $mereka['nama_produk'] . "' AND tgl_pesanan='" . $ketiga['tgl_pesanan'] . "' GROUP BY produk.nama_produk ORDER BY qty");
							foreach ($total_prpduk->result_array() as $tota) {
								if (empty($tota['laris'])) {
									echo "0,";
								} else {
									echo $tota['laris'] . ",";
								}
							}
						}
						?>
					]
				},
			<?php } ?>
		]
	});
</script>