<!-- Home -->

<div class="home">
	<div class="breadcrumbs_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumbs">
						<ul>
							<li><a href="<?= base_url('') ?>">Home</a></li>
							<li>UMKM</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<!-- About -->
<div class="about">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="section_title_container text-center">
					<h2 class="section_title"><?= $title ?></h2>
					<div class="section_subtitle">
					</div>
				</div>
			</div>
		</div>
		<div class="row about_row">

			<!-- About Item -->
			<?php foreach ($umkm as $key => $value) { ?>
				<div class="col-lg-4 about_col about_col_left">
					<div class="about_item">
						<div class="about_item_image"><img src="<?= base_url('assets/umkm/' . $value->gambar) ?>" alt=""></div>
						<div class="about_item_title"><a href="<?= base_url('home/detail/' . $value->id_umkm) ?>"><?= $value->nama_umkm ?></a></div>
						<div class="about_item_text">
							<p><?= $value->deskripsi ?></p>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>