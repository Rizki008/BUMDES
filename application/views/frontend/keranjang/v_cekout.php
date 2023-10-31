<!-- Home -->

<div class="home">
	<div class="breadcrumbs_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumbs">
						<ul>
							<li><a href="<?= base_url('') ?>">Home</a></li>
							<li>Cekout Pesanan</li>
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
					<h2>Cekout Pesanan</h2><br>
				</div>
				<?php
				//notifikasi form kosong
				echo validation_errors('<div class="alert alert-warning alert-dismissible">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
														<h5><i class="icon fas fa-exclamation-triangle"></i>', '</h5></div>');
				?>
				<form action="<?= base_url('belanja/cekout') ?>" method="POST">
					<?php
					$i = 1;
					$j = 1;
					$subtotal = 0;
					$total = 0;
					$total_berat = 0;
					$berat = 0;
					foreach ($cart['cart'] as $key => $items) {
						$id_detail = random_string('alnum', 5);
						$id_pesanan = date('Ymd') . strtoupper(random_string('alnum', 8));
						echo form_hidden('id_detail' . $j++, $id_detail);
						$subtotal = $items->qty_cart * $items->harga;
						$total += $subtotal;
						$berat = $items->qty_cart * $items->berat;
						$total_berat = $total_berat + $berat;
					}
					?>
					<!-- Checkout Start -->
					<div class="container-fluid pt-5">
						<div class="row px-xl-5">
							<div class="col-lg-8">
								<div class="mb-4">
									<h4 class="font-weight-semi-bold mb-4">Alamat Penerima</h4>
									<div class="row">
										<div class="col-md-6 form-group">
											<label>Nama</label>
											<input class="form-control" type="text" value="<?= $this->session->userdata('nama_lengkap'); ?>" readonly>
										</div>
										<div class="col-md-6 form-group">
											<label>No Handphone</label>
											<input class="form-control" type="text" value="<?= $this->session->userdata('no_hp'); ?>" readonly>
										</div>
										<div class="col-md-12 form-group">
											<label>Alamat Lengkap</label>
											<textarea name="alamat" class="form-control"></textarea>
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" name="id_pesanan" value="<?= $id_pesanan ?>">
							<input type="hidden" name="total_berat" value="<?= $total_berat ?>">
							<input type="hidden" name="total_harga" value="<?= $total ?>">

							<div class="col-lg-4">
								<div class="card border-secondary mb-5">
									<div class="card-header bg-secondary border-0">
										<h4 class="font-weight-semi-bold m-0">Rincian Pesanan</h4>
									</div>
									<div class="card-body">

										<hr class="mt-0">
										<div class="d-flex justify-content-between mb-3 pt-1">
											<h6 class="font-weight-medium">Total Harga</h6>
											<h6 class="font-weight-medium">Rp. <?= number_format($total, 0) ?></h6>
										</div>
										<div class="d-flex justify-content-between">
											<h6 class="font-weight-medium">Total Qty</h6>
											<h6 class="font-weight-medium"><?= $cart['jml']->jml ?></h6>
										</div>
									</div>
									<div class="card-footer border-secondary bg-transparent">
										<div class="d-flex justify-content-between mt-2">
											<h5 class="font-weight-bold">Total Pembayaran</h5>
											<h5 class="font-weight-bold"><span>Rp. <?= number_format($total, 0) ?></span></h5>
										</div>
									</div>
								</div>
								<div class="card border-secondary mb-5">
									<div class="card-footer border-secondary bg-transparent">
										<button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Pesan Sekarang</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Checkout End -->
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Newsletter -->
<br>
<br>