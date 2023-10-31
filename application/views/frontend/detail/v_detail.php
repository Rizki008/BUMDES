<div class="home">
	<div class="breadcrumbs_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumbs">
						<ul>
							<li><a href="<?= base_url() ?>">Home</a></li>
							<li><?= $title ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Courses -->

<div class="courses">
	<div class="container">
		<div class="row">

			<!-- Courses Main Content -->
			<div class="col-lg-12">
				<div class="courses_container">
					<div class="row courses_row">

						<?php foreach ($produk as $key => $value) { ?>
							<!-- Course -->
							<div class="col-lg-4 course_col">
								<?php echo form_open('belanja/add');
								echo form_hidden('id_produk', $value->id_produk);
								echo form_hidden('qty', 1);
								?>
								<div class="course">
									<div class="course_image"><img src="<?= base_url('assets/produk/' . $value->img) ?>" alt=""></div>
									<div class="course_body">
										<h3 class="course_title"><a href="course.html"><?= $value->nama_produk ?></a></h3>
										<div class="course_teacher"><?= $value->nama_umkm ?></div>
										<div class="course_text">
											<p><?= $value->deskripsi ?></p>
										</div>
									</div>
									<div class="course_footer">
										<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
											<div class="course_info">
												Berat :
												<span><?= $value->berat ?> <?= $value->satuan ?></span>
											</div>
											<div class="course_info">
												Stock :
												<span><?= $value->stock ?></span>
											</div>
											<div class="course_price ml-auto">Rp. <?= number_format($value->harga, 0) ?></div>
										</div>
										<button type="submit" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Tambah Keranjang</button>
									</div>
									<hr>
								</div>
								<?php echo form_close() ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>