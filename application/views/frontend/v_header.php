<body>
	<div class="super_container">

		<!-- Header -->

		<header class="header">

			<!-- Top Bar -->
			<div class="top_bar">
				<div class="top_bar_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
									<ul class="top_bar_contact_list">
										<li>
											<div class="question">Ada Pertanyaan?</div>
										</li>
										<li>
											<i class="fa fa-phone" aria-hidden="true"></i>
											<div>(+62) 857-1921-2919</div>
										</li>
										<li>
											<i class="fa fa-envelope-o" aria-hidden="true"></i>
											<div>info.bundes@gmail.com</div>
										</li>
									</ul>
									<div class="top_bar_login ml-auto">
										<?php if ($this->session->userdata('nama_lengkap') == "") { ?>
											<div class="login_button"><a href="<?= base_url('auth/login_user') ?>">Register or Login</a></div>
										<?php } else { ?>
											<div class="login_button"><a href="<?= base_url('auth/logout_user') ?>">Logout / <?= $this->session->userdata('nama_lengkap') ?></a></div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>