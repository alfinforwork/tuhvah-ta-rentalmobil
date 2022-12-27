<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Pilih menu</h1>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md">
						<a href="<?= base_url('admin/laporan/mobil?menu=belum_dikembalikan') ?>">
							<div class="card card-statistic-1">
								<div class="card-icon bg-primary">
									<i class="fas fa-car"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Mobil belum dikembalikan</h4>
									</div>
									<div class="card-body">
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md">
						<a href="<?= base_url('admin/laporan/mobil?menu=perlu_dikembalikan_hari_ini') ?>">
							<div class="card card-statistic-1">
								<div class="card-icon bg-danger">
									<i class="fas fa-car"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Mobil Perlu dikembalikan hari ini</h4>
									</div>
									<div class="card-body">
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md">
						<a href="<?= base_url('admin/laporan/mobil?menu=telat_dikembalikan') ?>">
							<div class="card card-statistic-1">
								<div class="card-icon bg-warning">
									<i class="fas fa-car"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Mobil yang telat dikembalikan</h4>
									</div>
									<div class="card-body">
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md">
						<a href="<?= base_url('admin/laporan') ?>">
							<div class="card card-statistic-1">
								<div class="card-icon bg-warning">
									<i class="fas fa-list"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Laporan Transaksi</h4>
									</div>
									<div class="card-body">
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
