<!-- Home -->

<div class="home">
	<div class="home_slider_container">

		<!-- Home Slider -->
		<div class="owl-carousel owl-theme home_slider">

			<!-- Home Slider Item -->
			<div class="owl-item">
				<div class="home_slider_background" style="background-image:url(<?= base_url('assets/front-end/') ?>images/home_slider_1.jpg)"></div>
				<div class="home_slider_content">
					<div class="container">
						<div class="row">
							<div class="col text-center">
								<div class="home_slider_title">Informasi Bumdes</div>
								<div class="home_slider_subtitle">Badan Usaha Milik Desa</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Home Slider Item -->
			<div class="owl-item">
				<div class="home_slider_background" style="background-image:url(<?= base_url('assets/front-end/') ?>images/home_slider_1.jpg)"></div>
				<div class="home_slider_content">
					<div class="container">
						<div class="row">
							<div class="col text-center">
								<div class="home_slider_title">Informasi Bumdes</div>
								<div class="home_slider_subtitle">Badan Usaha Milik Desa</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Home Slider Item -->
			<div class="owl-item">
				<div class="home_slider_background" style="background-image:url(<?= base_url('assets/front-end/') ?>images/home_slider_1.jpg)"></div>
				<div class="home_slider_content">
					<div class="container">
						<div class="row">
							<div class="col text-center">
								<div class="home_slider_title">Informasi Bumdes</div>
								<div class="home_slider_subtitle">Badan Usaha Milik Desa</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
	<div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
</div>


<!-- Popular Courses -->

<div class="courses">
	<div class="section_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url('assets/front-end/') ?>images/courses_background.jpg" data-speed="0.8"></div>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="section_title_container text-center">
					<h2 class="section_title">Selamat Data Di Badan Usaha Milik Desa</h2>
					<div class="section_subtitle">
						<h6>UMKM kami</h6>
					</div>
				</div>
			</div>
		</div>
		<div class="row courses_row">
			<?php foreach ($umkm as $key => $value) { ?>
				<!-- Course -->
				<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="<?= base_url('assets/umkm/' . $value->gambar) ?>" alt=""></div>
						<div class="course_body">
							<h3 class="course_title"><a href="course.html"><?= $value->nama_umkm ?></a></h3>
							<div class="course_teacher"><?= $value->pemilik ?></div>
							<div class="course_text">
								<p><?= $value->deskripsi ?></p>
							</div>
						</div>
						<div class="course_footer">
							<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
								<div class="course_info">
									<a href="<?= base_url('home/detail/' . $value->id_umkm) ?>" class="fa fa-primary">
										<i class="fa fa-product-hunt" aria-hidden="true"></i>
										<span>Produk UMKM</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>



<div class="events">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="section_title_container text-center">
					<h2 class="section_title">Informasi Terkait Bumdes</h2>

				</div>
			</div>
		</div>
		<div class="row events_row">

			<?php foreach ($info as $key => $row) { ?>
				<!-- Event -->
				<div class="col-lg-4 event_col">
					<div class="event event_left">
						<div class="event_image"><img src="<?= base_url('assets/info/' . $row->img) ?>" alt=""></div>
						<div class="event_body d-flex flex-row align-items-start justify-content-start">
							<div class="event_date">
								<div class="d-flex flex-column align-items-center justify-content-center trans_200">
									<div class="event_day trans_200"><?= $row->tanggal ?></div>
									<div class="event_month trans_200"><?= $row->bulan ?></div>
								</div>
							</div>
							<div class="event_content">
								<div class="event_title"><a href="#"><?= $row->judul ?></a></div>
								<div class="event_info_container">
									<div class="event_info"><i class="fa fa-clock-o" aria-hidden="true"></i><span><?= $row->jam_info ?></span></div>
									<div class="event_text">
										<p><?= $row->judul ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<!-- Team -->

<div class="team">
	<div class="team_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url('assets/front-end/') ?>images/team_background.jpg" data-speed="0.8"></div>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="section_title_container text-center">
					<h2 class="section_title">Produk UMKM Terfavorite</h2>
					<div class="section_subtitle">
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu. Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p> -->
					</div>
				</div>
			</div>
		</div>
		<div class="row team_row">

			<!-- Team Item -->
			<?php foreach ($produk as $key => $prod) { ?>
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="<?= base_url('assets/produk/' . $prod->img) ?>" alt=""></div>
						<div class="team_body">
							<div class="team_title"><a href="#"><?= $prod->nama_produk ?></a></div>
							<div class="team_subtitle"><?= $prod->deskripsi ?></div>

						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>