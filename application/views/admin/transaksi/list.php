<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Transaksi</h1>
		</div>

		<div class="card">
			<div class="card-body">
				<form action="" method="get">
					<div class="form-group">
						<label for="status_kepemilikan">Kepemilikan</label>
						<select name="status_kepemilikan" id="status_kepemilikan" class="form-control" style="height:42px">
							<option value="">Pilih</option>
							<option value="0" <?= @$status_kepemilikan == "0" ? "selected" : '' ?>>Perusahaan</option>
							<option value="1" <?= @$status_kepemilikan == "1" ? "selected" : '' ?>>Mitra</option>
						</select>
					</div>
					<div class="form-group" id="form-mitra" style="display: none">
						<label>Mitra</label>
						<select name="mitra" id="mitra" class="form-control" style="height:42px">
							<option value="">Pilih mitra</option>
							<?php foreach ($data_mitra as $key => $value) { ?>
								<option value="<?= $value->id_mitra ?>" <?= $value->id_mitra == $mitra ? "selected" : '' ?>><?= $value->nama_mitra ?></option>
							<?php } ?>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>

		<div class="card">
			<div class="card-body">
				<?php echo $this->session->flashdata('pesan') ?>

				<table class="table table-sm table-hover table-striped table-borderd">
					<thead>
						<tr class="text-center">
							<th>NO</th>
							<th>Kepemilikan</th>
							<th>Nama Pemilik</th>
							<th>Nama Customer</th>
							<th>Mobil</th>
							<th>Tanggal Rental</th>
							<th>Tanggal Kembali</th>
							<th>Tanggal Pengembalian</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($data_transaksi as $value) : ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $value->status_kepemilikan == 0 ? "Perusahaan" : "Mitra" ?></td>
								<td><?php echo $value->status_kepemilikan == 0 ? "Perusahaan" : $this->db->where('id_mitra', $value->id_mitra)->get('tb_mitra')->row()->nama_mitra ?></td>
								<td><?php echo $value->nama ?></td>
								<td><?php echo $value->merk ?></td>
								<td><?php echo date('j F Y H:i:s', strtotime($value->tgl_rental)) ?></td>
								<td><?php echo date('j F Y H:i:s', strtotime($value->tgl_kembali)) ?></td>
								<td><?= $value->tgl_pengembalian ? date('j F Y H:i:s', strtotime($value->tgl_pengembalian)) : '<span class="badge badge-danger w-100">Belum ada</span>' ?></td>
								<td class="text-center">
									<?php if ($value->status_rental == 1) { ?>
										<span class="badge badge-danger w-100"><?= $value->nama_status_rental ?></span>
									<?php } elseif ($value->status_rental == 2) { ?>
										<span class="badge badge-info w-100"><?= $value->nama_status_rental ?></span>
									<?php } elseif ($value->status_rental == 3) { ?>
										<span class="badge badge-warning w-100"><?= $value->nama_status_rental ?></span>
									<?php } elseif ($value->status_rental == 4) { ?>
										<span class="badge badge-success w-100"><?= $value->nama_status_rental ?></span>
									<?php } else { ?>
										<span class="badge badge-danger w-100"><?= $value->nama_status_rental ?></span>
									<?php } ?>
								</td>
								<td>
									<a href="<?php echo base_url('admin/transaksi/detail/') . $value->id_rental ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
								</td>
							</tr>

						<?php endforeach; ?>
					</tbody>

				</table>
				<nav class="row justify-content-end">
					<?= $pagination ?>
				</nav>
			</div>
		</div>
	</section>
</div>

<script>
	<?php if ($status_kepemilikan == "0") { ?>
	<?php } elseif ($status_kepemilikan == "1") { ?>
		$('#form-mitra').css('display', 'inline');
	<?php } ?>
	$('#status_kepemilikan').change(function() {
		var status_kepemilikan = $('#status_kepemilikan').val();
		if (status_kepemilikan == 0) {
			$('#form-mitra').css('display', 'none');
			$('#mitra').val('');
		} else if (status_kepemilikan == 1) {
			$('#form-mitra').css('display', 'inline');
			$('#admin').val('');
		} else {
			$('#form-mitra').css('display', 'none');
			$('#mitra').val('');
			$('#admin').val('');
		}
	});
</script>
