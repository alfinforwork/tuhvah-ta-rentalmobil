<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Detail Mobil</h1>
		</div>
	</section>
	<?php foreach ($detail as $dt) : ?>
		<div class="card">
			<div class="row">
				<div class="col-md-5">
					<img class="img-responsive rounded-left" src="<?php echo base_url() . $dt->gambar ?>" style="height: 100%;width: 100%;">
				</div>

				<div class="col-md-7">
					<table class="table">
						<tr>
							<td>Tipe Mobil </td>
							<td>
								<?php
								if ($dt->kode_tipe == "SDN") {
									echo "Sedan";
								} elseif ($dt->kode_tipe == "HBK") {
									echo "Hatchback";
								} elseif ($dt->kode_tipe == "MPV") {
									echo "Multi Purpose Vehicle";
								} else {
									echo "<span class='text_danger'>Tipe Mobil Belum Tersedia</span>";
								}
								?>
							</td>
						</tr>
						<tr>
							<td>Merk</td>
							<td><?php echo $dt->merk ?></td>
						</tr>
						<tr>
							<td>No. Plat</td>
							<td><?php echo $dt->no_plat ?></td>
						</tr>
						<tr>
							<td>Warna</td>
							<td><?php echo $dt->warna ?></td>
						</tr>
						<tr>
							<td>Tahun</td>
							<td><?php echo $dt->tahun ?></td>
						</tr>
						<tr>
							<td>Biaya per hari</td>
							<td><?php echo $dt->biaya ?></td>
						</tr>
						<tr>
							<td>Status</td>
							<td>
								<?php
								if ($dt->status == "0") {
									echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
								} else {
									echo "<span class='badge badge-primary'>Tersedia</span>";
								}
								?>
							</td>

						</tr>
						<tr>
							<td>Status Kepemilikan</td>
							<td>
								<?php
								$mitra = $this->db->where('id_mitra', $dt->id_mitra)->get('tb_mitra')->row();
								echo $dt->status_kepemilikan == 0 ? 'Perusahaan' : "Mitra - $mitra->nama_mitra";
								?>
							</td>

						</tr>
					</table>
					<a class="btn btn-sm btn-danger ml-4" href="<?php echo base_url('admin/data_mobil') ?>">Kembali</a>
				</div>

			</div>
		</div>
	<?php endforeach; ?>
</div>
