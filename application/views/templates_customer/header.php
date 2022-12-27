<header id="header" class="fixed-top ">
	<div class="container-fluid">

		<div class="row justify-content-center">
			<div class="col-xl-9 d-flex align-items-center justify-content-between">
				<h1 class="logo"><a href="<?= site_url('') ?>">Rizqi Multi Creative</a></h1>
				<!-- Uncomment below if you prefer to use an image logo -->
				<!-- <a href="index.html" class="logo"><img src="<?= site_url('assets/assets_customer') ?>/img/logo.png" alt="" class="img-fluid"></a>-->

				<nav class="nav-menu d-none d-lg-block">
					<ul>
						<li class="<?= @$menu_aktif == 'dashboard' ? 'active' : '' ?>"><a href="<?= site_url('customer/dashboard') ?>" class="nav-link"><i class="fas fa-home"></i> Home</a></li>
						<li class="<?= @$menu_aktif == 'mobil' ? 'active' : '' ?>"><a href="<?= site_url('customer/mobil') ?>" class="nav-link"><i class="fas fa-car"></i> Mobil</a></li>
						<li class="<?= @$menu_aktif == 'about' ? 'active' : '' ?>"><a href="<?= site_url('customer/about') ?>" class="nav-link"><i class="fas fa-address-book"></i> About</a></li>
						<li class="<?= @$menu_aktif == 'kontak_kami' ? 'active' : '' ?>"><a href="<?= site_url('customer/kontak_kami') ?>" class="nav-link"><i class="fas fa-phone"></i> Kontak kami</a></li>
						<?php if ($this->session->is_login_user) { ?>
							<li class="drop-down">
								<a class="<?= @$menu_aktif == 'profile' || @$menu_aktif == 'login' ? 'active' : '' ?>" href="">
									<i class="fas fa-user"></i> <?= $this->session->username ?>
								</a>
								<ul>
									<li><a class="" href="<?= site_url('customer/profile') ?>"><i class="fas fa-user-cog"></i> Profile</a></li>
									<li><a class="" href="<?= site_url('customer/profile?menu=gantipassword') ?>"><i class="fas fa-key"></i> Ganti Password</a></li>
									<li><a class="" href="<?= site_url('customer/profile?menu=transaksi') ?>"><i class="fas fa-credit-card"></i> Transaksi</a></li>
									<li><a class="" href="<?= site_url('customer/login/logout') ?>"><i class="fas fa-power-off"></i> Logout</a></li>
								</ul>
							</li>
						<?php } ?>
						<!-- <li class="drop-down"><a href="">Drop Down</a>
							<ul>
								<li><a href="#">Drop Down 1</a></li>
								<li class="drop-down"><a href="#">Deep Drop Down</a>
									<ul>
										<li><a href="#">Deep Drop Down 1</a></li>
										<li><a href="#">Deep Drop Down 2</a></li>
										<li><a href="#">Deep Drop Down 3</a></li>
										<li><a href="#">Deep Drop Down 4</a></li>
										<li><a href="#">Deep Drop Down 5</a></li>
									</ul>
								</li>
								<li><a href="#">Drop Down 2</a></li>
								<li><a href="#">Drop Down 3</a></li>
								<li><a href="#">Drop Down 4</a></li>
							</ul>
						</li> -->

					</ul>
				</nav><!-- .nav-menu -->
				<?php if (!$this->session->is_login_user) { ?>
					<a href="<?= site_url('customer/login') ?>" class="get-started-btn"><i class="fas fa-power-off"></i> Login</a>
				<?php } ?>
			</div>
		</div>

	</div>
</header>

<!-- <ul class="site-menu main-menu js-clone-nav ml-auto ">
	<li class="<?= @$menu_aktif == 'dashboard' ? 'active' : '' ?>"><a href="<?= site_url('customer/dashboard') ?>" class="nav-link"><i class="fas fa-home"></i></a></li>
	<li class="<?= @$menu_aktif == 'mobil' ? 'active' : '' ?>"><a href="<?= site_url('customer/mobil') ?>" class="nav-link"><i class="fas fa-car"></i></a></li>
	<li class="<?= @$menu_aktif == 'about' ? 'active' : '' ?>"><a href="<?= site_url('customer/about') ?>" class="nav-link"><i class="fas fa-address-book"></i></a></li>
	<li class="<?= @$menu_aktif == 'kontak_kami' ? 'active' : '' ?>"><a href="<?= site_url('customer/kontak_kami_kami') ?>" class="nav-link"><i class="fas fa-phone"></i></a></li>
	<?php if ($this->session->is_login_user) { ?>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle <?= @$menu_aktif == 'profile' || @$menu_aktif == 'login' ? 'active' : '' ?>" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-user"></i> <?= $this->session->username ?>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="<?= site_url('customer/profile') ?>"><i class="fas fa-user-cog"></i> Profile</a>
				<a class="dropdown-item" href="<?= site_url('customer/profile?menu=gantipassword') ?>"><i class="fas fa-key"></i> Ganti Password</a>
				<a class="dropdown-item" href="<?= site_url('customer/profile?menu=transaksi') ?>"><i class="fas fa-credit-card"></i> Transaksi</a>
				<a class="dropdown-item" href="<?= site_url('customer/login/logout') ?>"><i class="fas fa-power-off"></i> Logout</a>
			</div>
		</li>
	<?php } else { ?>
		<li class="<?= @$menu_aktif == 'login' ? 'active' : '' ?>"><a href="<?= site_url('customer/login') ?>" class="nav-link"><i class="fas fa-power-off"></i></a></li>
	<?php } ?>
</ul> -->
