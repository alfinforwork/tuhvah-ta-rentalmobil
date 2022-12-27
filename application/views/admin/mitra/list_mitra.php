<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Mitra</h1>
		</div>

		<a href="<?php echo base_url('admin/data_mitra/tambah') ?>" class="btn btn-primary mb-4 color-white">Tambah Data</a>
		<?php echo $this->session->flashdata('pesan') ?>

		<table class="table table-sm table-hover table-striped table-borderd">
			<thead>
				<tr>
					<th>NO</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>No Telp</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				foreach ($mitra as $mb) : ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $mb->nama_mitra ?></td>
						<td><?php echo $mb->jenis_kelamin ?></td>
						<td><?php echo $mb->alamat ?></td>
						<td><?php echo $mb->no_telp ?></td>
						<td>
							<a href="<?php echo base_url('admin/data_mitra/delete/') . $mb->id_mitra ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
							<a href="<?php echo base_url('admin/data_mitra/update/') . $mb->id_mitra ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
						</td>
					</tr>

				<?php endforeach; ?>
			</tbody>

		</table>
		<nav class="row justify-content-end">
			<?= $pagination ?>
		</nav>
	</section>
</div>
