<section id="hero" class="d-flex flex-column justify-content-center">
	<!-- <div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-8">
				<h1>Rental Mobil</h1>
				<h2>Wujudkan keinginan anda untuk mendapatkan mobil impian</h2>
				<a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="btn btn-outlined btn-success"> Klik disini untuk memesan <i class="fas fa-arrow-right"></i></a>
			</div>
		</div>
	</div> -->

	<div class="container mt-4 text-left">
		<div style="height: 100px"></div>
		<?php if ($this->session->userdata('gagal')) { ?>
			<div class="mb-4 alert alert-danger">
				<?= $this->session->userdata('gagal') ?>
			</div>
		<?php } ?>
		<?php if ($this->session->userdata('berhasil')) { ?>
			<div class="mb-4 alert alert-success">
				<?= $this->session->userdata('berhasil') ?>
			</div>
		<?php } ?>
		<nav class="row justify-content-end">
			<div class="col-md-3 offset-md-5 mb-2">
				<form action="" method="get">
					<div class="input-group input-group-sm">
						<input type="text" name="q" class="form-control o-search-input" placeholder="Search" value="<?= $q ?>">
						<span class="input-group-append">
							<?php if ($q <> '') { ?>
								<a href="<?= site_url('customer/mobil') ?>" class="btn btn-secondary btn-sm" title="Clear"><i class="fas fa-redo"></i></a>
							<?php } ?>
							<button type="submit" class="btn btn-primary btn-sm" title="Search"><i class="fas fa-search"></i></button>
						</span>
					</div>
				</form>
			</div>
		</nav>
		<div class="row">
			<?php foreach ($data_mobil as $key => $value) {
				// if ($value->id_rental) { 
			?>
				<div class="col-lg-4 col-md-6 mb-4 p-4">
					<div class="card custom-card">
						<div class="card-body">
							<div style="background-image: url('<?= site_url($value->gambar ? $value->gambar : 'assets/assets_customer/images/img_1.jpg') ?>');width:100%;height: 25vh;background-size: cover;background-position: center;" class="img-fluid"></div>
							<div class="text-center mt-4">
								<h3><a href="#" class="text-white"><?= $value->merk ?></a></h3>
								<!-- <div class="rating">
											<span class="icon-star text-warning"></span>
											<span class="icon-star text-warning"></span>
											<span class="icon-star text-warning"></span>
											<span class="icon-star text-warning"></span>
											<span class="icon-star text-warning"></span>
										</div> -->
								<div><span>Rp. <?= $value->biaya ?>/</span>Hari</div>
							</div>
							<ul class="mt-4">
								<li>
									<span>Kode Tipe</span>
									<span class="spec"><?= $value->nama_tipe ?></span>
								</li>
								<li>
									<span>No Plat</span>
									<span class="spec"><?= $value->no_plat ?></span>
								</li>
								<li>
									<span>Warna</span>
									<span class="spec"><?= $value->warna ?></span>
								</li>
								<li>
									<span>Tahun</span>
									<span class="spec"><?= $value->tahun ?></span>
								</li>
								<li>
									<span>Mobil Dalam Keadaan Prima </span>
								</li>
								<li>
									<span>Steril Dari Covid 19</span>
								</li>
							</ul>
							<div class="d-flex action">
								<a href="<?= site_url("customer/mobil/sewa/$value->id_mobil") ?>" class="btn btn-primary btn-sm"><i class="fas fa-check"></i> Sewa sekarang</a>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			// } 
			?>


		</div>
		<nav class="row justify-content-end">
			<?= $pagination ?>
		</nav>
	</div>
</section>
