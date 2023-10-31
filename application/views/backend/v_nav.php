<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url('admin') ?>" class="brand-link">
		<span class="brand-text font-weight-light">
			<h5 class="text-center text-bold">BUMDES</h5>
		</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url() ?>assets/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="<?= base_url('admin') ?>" class="d-block">
					<?= $this->session->userdata('nama_lengkap'); ?>
				</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('admin') ?>" class="nav-link <?php if (
																			$this->uri->segment(1) == 'admin' and $this->uri->segment(2) == " "
																		) {
																			echo "active";
																		} ?>">
						<i class="nav-icon fas fa-home"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('bumdes') ?>" class="nav-link <?php if (
																			$this->uri->segment(1) == 'bumdes'
																		) {
																			echo "active";
																		} ?>">
						<i class="nav-icon fas fa-money-check-alt"></i>
						<p>
							Informasi BUMDES
							<!-- <span class="badge badge-info right">12</span> -->
						</p>
					</a>
				</li>

				<li class="nav-item has-treeview">
					<a class="nav-link">
						<i class="nav-icon fas fa-box"></i>
						<p>
							Produk UMKM
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('umkm') ?>" class="nav-link <?php if (
																					$this->uri->segment(1) == 'umkm'
																				) {
																					echo "active";
																				} ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>UMKM</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('produk') ?>" class="nav-link <?php if (
																					$this->uri->segment(1) == 'produk'
																				) {
																					echo "active";
																				} ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Produk Terbaru</p>
							</a>
						</li>
					</ul>
				</li>


				<!--<li class="nav-item">
                    <a href="<?= base_url('gambarproduk') ?>" class="nav-link <?php if (
																					$this->uri->segment(1) == 'gambarproduk'
																				) {
																					echo "active";
																				} ?>">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Gambar Produk
                        </p>
                    </a>
                </li>-->

				<li class="nav-item">
					<a href="<?= base_url('admin/pesanan_masuk') ?>" class="nav-link <?php if (
																							$this->uri->segment(2) == 'pesanan_masuk' and $this->uri->segment(1) == 'admin'
																						) {
																							echo "active";
																						} ?>">
						<i class="nav-icon fas fa-money-check-alt"></i>
						<p>
							Transaksi
							<span class="badge badge-info right">12</span>
						</p>
					</a>
				</li>

				<!-- <li class="nav-item">
					<a href="<?= base_url('laporan') ?>" class="nav-link <?php if (
																				$this->uri->segment(1) == 'laporan'
																			) {
																				echo "active";
																			} ?>">
						<i class="nav-icon fas fa-address-book"></i>
						<p>
							Laporan
						</p>
					</a>
				</li> -->

				<!-- <li class="nav-item">
					<a href="<?= base_url('user') ?>" class="nav-link <?php if (
																			$this->uri->segment(1) == 'user'
																		) {
																			echo "active";
																		} ?>">
						<i class="nav-icon fas fa-users"></i>
						<p>
							User
						</p>
					</a>
				</li> -->

				<!-- <li class="nav-item">
                    <a href="<?= base_url('admin/setting') ?>" class="nav-link <?php if (
																					$this->uri->segment(2) == 'setting' and $this->uri->segment(1) == 'admin'
																				) {
																					echo "active";
																				} ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li> -->

				<!-- <li class="nav-item">
					<a href="<?= base_url('lokasi') ?>" class="nav-link <?php if (
																			$this->uri->segment(2) == 'setting' and $this->uri->segment(1) == 'admin'
																		) {
																			echo "active";
																		} ?>">
						<i class="nav-icon fas fa-th"></i>
						<p>
							Data Lokasi
						</p>
					</a>
				</li> -->

				<li class="nav-item">
					<a href="<?= base_url('auth/logout_user') ?>" class="nav-link">
						<i class="nav-icon fas fa-angle-double-left"></i>
						<p>
							LogOut
						</p>
					</a>
				</li>

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $title ?></h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">