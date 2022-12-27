<div class="container" style="margin-top: 100px; margin-bottom: 200px">
	<div class="card custom-card">
		<div class="card-body">

			<?php foreach ($detail as $dt) : ?>
				<div class="row">
					<div class="col-md-6">
						<img style="width: 90%" src="<?php echo base_url('assets/upload/' . $dt->gambar) ?>">
					</div>

					<div class="col-md-6">
						<table class="table custom-table">

							<tr>
								<th>Merk</th>
								<td><?php echo $dt->merk ?></td>
							</tr>
							<tr>
								<th>No Plat</th>
								<td><?php echo $dt->no_plat ?></td>
							</tr>
							<tr>
								<th>Warna</th>
								<td><?php echo $dt->warna ?></td>
							</tr>
							<tr>
								<th>Tahun</th>
								<td><?php echo $dt->tahun ?></td>
							</tr>

							<tr>
								<th>Status</th>
								<td>

									<?php if ($dt->status == '1') {
										echo "Tersedia";
									} else {
										echo "Sedang Dirental";
									} ?>

								</td>
							</tr>

							<tr>
								<td>
									<?php

									if ($dt->status = "0") {
										echo "<span class='btn btn-danger' disable>Sedang Di Rental</span>";
									} else {
										echo anchor('customer/rental/tambah_rental' . $dt->id_mobil, '<button class="btn btn-success">Rental</button>');
									}

									?>

								</td>
							</tr>
						</table>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
