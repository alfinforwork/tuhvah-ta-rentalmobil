<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>
		<div class="row">
			<div class="col-md">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total User</h4>
						</div>
						<div class="card-body">
							<?= $jumlah_customer ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="fas fa-car"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Mobil</h4>
						</div>
						<div class="card-body">
							<?= $jumlah_mobil ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-random"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Transaksi</h4>
						</div>
						<div class="card-body">
							<?= $jumlah_transaksi ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
