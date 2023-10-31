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
	<form action="<?= base_url('belanja/update_cart') ?>" method="POST">
		<div class="contact_info_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2>Keranjang Belanja</h2><br>
					</div>
					<div class="col-lg-8">
						<table class="table table-bordered" id="myTable">
							<thead>
								<tr>
									<th class="text-center">Nama Produk</th>
									<th class="text-center">Harga Satuan</th>
									<th class="text-center">QTY Produk</th>
									<th class="text-center">Berat Produk</th>
									<th class="text-center">Total Harga</th>
									<th class="text-center">Action</th>
									</th>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$tot = 0;
								$total_berat = 0;
								foreach ($cart['cart'] as $key => $value) {
									$berat = $value->qty_cart * $value->berat;
									$total_berat = $total_berat + $berat;
									$tot += $value->qty_cart * $value->harga;
								?>
									<tr>
										<td class="text-center"><?= $value->nama_produk ?></td>
										<td class="text-center">Rp. <?= number_format($value->harga, 0) ?></td>
										<td class="text-center">
											<input class="form-control form-control-sm bg-secondary text-center" type="number" value="<?= $value->qty_cart ?>" min="1" max="<?= $value->stock ?>" name="qty<?= $i++ ?>">
										</td>
										<td class="text-center"><?= $value->qty_cart * $value->berat ?> <?= $value->satuan ?></td>
										<td class="text-center">Rp. <?= number_format($value->qty_cart * $value->harga, 0) ?></td>
										<td>
											<button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Update QTY</button><br>
											<a href="<?= base_url('belanja/deleteCart/' . $value->id_keranjang) ?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>Hapus Produk</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="col-lg-4">
						<div class="sidebar">

							<!-- Categories -->
							<div class="sidebar_section">
								<div class="sidebar_section_title">Rinci Pesanan</div>
								<div class="sidebar_categories">
									<ul>
										<li><a href="#">Total Harga : Rp. <?= number_format($tot, 0) ?></a></li>
										<li><a href="#">Total Berat : <?= $total_berat ?></a></li>
										<li><a href="#">Total Qty : <?= $cart['jml']->jml ?></a></li>
										<li><a href="#">Total Pembayaran : Rp. <?= number_format($tot, 0) ?></a></li>
									</ul>
								</div>
								<a href="<?= base_url('belanja/cekout') ?>" class="btn btn-lg btn-block btn-sm btn-primary font-weight-bold my-3 py-3">Checkout</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Courses Sidebar -->
	</form>
</div>
<!-- Newsletter -->
<br>
<br>