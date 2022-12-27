<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Mobil</h1>
		</div>

		<a href="<?php echo base_url('admin/data_mobil/tambah_mobil') ?>" class="btn btn-primary mb-4 color-white">Tambah Data</a>
		<?php echo $this->session->flashdata('pesan') ?>

		<table class="table table-sm table-hover table-striped table-borderd">
			<thead>
				<tr>
					<th>NO</th>
					<th>Status Kepemilikan</th>
					<th>Nama Pemilik</th>
					<th>Gambar</th>
					<th>Type</th>
					<th>Merk</th>
					<th>No. Plat</th>
					<th>Biaya per hari</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				foreach ($tb_mobil as $mb) : ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $mb->status_kepemilikan == 0 ? 'Perusahaan' : "Mitra" ?></td>
						<td><?php echo $mb->status_kepemilikan == 0 ? "perusahaan" : $this->db->where('id_mitra', $mb->id_mitra)->get('tb_mitra')->row()->nama_mitra ?></td>
						<td>
							<img width="60px" src="<?php echo base_url() . $mb->gambar ?>">
						</td>
						<td><?php echo $mb->kode_tipe ?></td>
						<td><?php echo $mb->merk ?></td>
						<td><?php echo $mb->no_plat ?></td>
						<td class="text-right">Rp. <?php echo $mb->biaya ?></td>
						<td><?php
							if ($mb->status == "0") {
								echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
							} else {
								echo "<span class='badge badge-primary'>Tersedia</span>";
							} ?></td>
						<td>
							<a href="<?php echo base_url('admin/data_mobil/detail_mobil/') . $mb->id_mobil ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
							<a href="<?php echo base_url('admin/data_mobil/delete_mobil/') . $mb->id_mobil ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
							<a href="<?php echo base_url('admin/data_mobil/update_mobil/') . $mb->id_mobil ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
						</td>
					</tr>

				<?php endforeach; ?>
			</tbody>

		</table>
	</section>
</div>
