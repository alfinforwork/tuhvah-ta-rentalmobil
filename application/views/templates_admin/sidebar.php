<body>
	<div id="app">
		<div class="main-wrapper">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<form class="form-inline mr-auto">
					<ul class="navbar-nav mr-3">

						<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
						<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>

					</ul>

				</form>
				<ul class="navbar-nav">
					<li><a href="<?= site_url('admin/login/logout') ?>" class="nav-link nav-link-lg"><i class="fas fa-power-off"></i></a></li>
				</ul>
			</nav>
			<div class="main-sidebar">
				<aside id="sidebar-wrapper">
					<div class="sidebar-brand">
						<a href="index.html">RENTAL MOBIL</a>
					</div>
					<div class="sidebar-brand sidebar-brand-sm">
						<a href="index.html">RM</a>
					</div>
					<ul class="sidebar-menu">
						<li><a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>"><i class="fas fa-tachometer-alt"></i></i> <span>Dashboard</span></a>
						</li>

						<li><a class="nav-link" href="<?php echo base_url('admin/data_mobil') ?>"><i class="fas fa-car"></i> <span>Data Mobil</span></a>
						</li>

						<li><a class="nav-link" href="<?php echo base_url('admin/data_tipe') ?>"><i class="fas fa-grip-horizontal"></i> <span>Data Tipe</span></a>
						</li>

						<li><a class="nav-link" href="<?php echo base_url('admin/data_mitra') ?>"><i class="fas fa-user"></i> <span>Data Mitra</span></a>
						</li>
						<li><a class="nav-link" href="<?php echo base_url('admin/data_customer') ?>"><i class="fas fa-user"></i> <span>Data Customer</span></a>
						</li>

						<li><a class="nav-link" href="<?php echo base_url('admin/transaksi') ?>"><i class="fas fa-random"></i> <span>Transaksi</span></a>
						</li>

						<li><a class="nav-link" href="<?php echo base_url('admin/laporan/pilih_menu') ?>"><i class="fas fa-clipboard-list"></i> <span>Laporan</span></a>
						</li>

					</ul>


				</aside>
			</div>
