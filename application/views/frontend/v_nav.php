<!-- Header Content -->
<div class="header_container">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="header_content d-flex flex-row align-items-center justify-content-start">
					<div class="logo_container">
						<a href="#">
							<div class="logo_text">BUM<span>DES</span></div>
						</a>
					</div>
					<nav class="main_nav_contaner ml-auto">
						<ul class="main_nav">
							<li class="active"><a href="<?= base_url('') ?>">Home</a></li>
							<li><a href="<?= base_url('home/about') ?>">About</a></li>
							<li><a href="<?= base_url('home/umkm') ?>">UMKM</a></li>
						</ul>
						<?php
						if ($this->session->userdata('id_user') != '') {
							if ($cart['jml']->jml != 0) {
						?>
								<div class="shopping_cart">
									<a href="<?= base_url('belanja') ?>">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>[<?= $cart['jml']->jml ?>]
									</a>
								</div>
						<?php
							}
						}
						?>
						<div class="hamburger menu_mm">
							<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
						</div>
					</nav>

				</div>
			</div>
		</div>
	</div>
</div>

</header>

<!-- Menu -->

<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
	<div class="menu_close_container">
		<div class="menu_close">
			<div></div>
			<div></div>
		</div>
	</div>
	<div class="search">
		<form action="#" class="header_search_form menu_mm">
			<input type="search" class="search_input menu_mm" placeholder="Search" required="required">
			<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
				<i class="fa fa-search menu_mm" aria-hidden="true"></i>
			</button>
		</form>
	</div>
	<nav class="menu_nav">
		<ul class="menu_mm">
			<li class="menu_mm"><a href="index.html">Home</a></li>
			<li class="menu_mm"><a href="#">About</a></li>
			<li class="menu_mm"><a href="#">UMKM</a></li>
		</ul>
	</nav>
</div>