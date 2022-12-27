<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Form Update Data Mobil</h1>
		</div>
		<div class="card">
			<div class="card-body">


				<form method="POST" action="<?php echo base_url('admin/data_mobil/update_mobil_aksi')	  ?>" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Type Mobil</label>
								<input type="hidden" name="id_mobil" value="<?php echo $tb_mobil->id_mobil ?>">
								<select name="kode_tipe" class="form-control">
									<option value="<?php echo $tb_mobil->kode_tipe ?>"><?php echo $tb_mobil->kode_tipe ?>
									</option>
									<?php foreach ($tipe as $tp) : ?>
										<option value="<?php echo $tp->kode_tipe ?>">
											<?php echo 	$tp->nama_tipe ?>

										</option>
									<?php endforeach; ?>
								</select>
								<?php echo form_error('kode_tipe', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>Merk</label>
								<input type="text" name="merk" class="form-control" value="<?php echo $tb_mobil->merk ?>">
								<?php echo form_error('merk', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>No. Plat</label>
								<input type="text" name="no_plat" class="form-control" value="<?php echo $tb_mobil->no_plat ?>">
								<?php echo form_error('no_plat', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>Warna</label>
								<input type="text" name="warna" class="form-control" value="<?php echo $tb_mobil->warna ?>">
								<?php echo form_error('warna', '<div class="text-small text-danger">', '</div>') ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Tahun</label>
								<input type="text" name="tahun" class="form-control" value="<?php echo $tb_mobil->tahun ?>">
								<?php echo form_error('tahun', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>Status</label>
								<select name="status" class="form-control">
									<option <?php if ($tb_mobil->status == "1") {
												echo "selected='selected'";
											}
											echo $tb_mobil->status; ?> value="1">Tersedia</option>
									<option <?php if ($tb_mobil->status == "0") {
												echo "selected='selected'";
											}
											echo $tb_mobil->status; ?> value="0">Tidak Tersedia</option>
								</select>
								<?php echo form_error('status', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>Gambar</label>
								<input type="file" name="gambar" class="form-control">
								<?php echo form_error('gambar', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>Biaya per hari</label>
								<input type="number" name="biaya" class="form-control" min="1" value="<?php echo $tb_mobil->biaya ?>">
								<?php echo form_error('biaya', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>Status Kepemilikan</label>
								<select name="status_kepemilikan" id="status_kepemilikan" class="form-control" style="height:42px">
									<option value="">Pilih status kepemilikan</option>
									<option value="0" <?= $tb_mobil->status_kepemilikan == 0 ? 'selected' : '' ?>>Perusahaan</option>
									<option value="1" <?= $tb_mobil->status_kepemilikan == 1 ? 'selected' : '' ?>>Mitra</option>
								</select>
								<?php echo form_error('status_kepemilikan', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group" id="form-mitra" <?= $tb_mobil->status_kepemilikan == 0 ? 'style="display: none"' : '' ?>>
								<label>Mitra</label>
								<select name="mitra" id="mitra" class="form-control" style="height:42px">
									<option value="">Pilih mitra</option>
									<?php foreach ($mitra as $key => $value) { ?>
										<option value="<?= $value->id_mitra ?>" <?= $tb_mobil->id_mitra == $value->id_mitra ? 'selected' : '' ?>><?= $value->nama_mitra ?></option>
									<?php } ?>
								</select>
								<?php echo form_error('mitra', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<button type="submit" class="btn btn-primary mt-4">Simpan</button>
							<button type="reset" class="btn btn-danger mt-4">Reset</button>
						</div>

					</div>
				</form>

			</div>
		</div>

	</section>
</div>

<script>
	<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
		cek_status_kepemilikan();
	<?php } ?>

	$('#status_kepemilikan').change(function() {
		cek_status_kepemilikan();
	});

	function cek_status_kepemilikan() {
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
	}
</script>
