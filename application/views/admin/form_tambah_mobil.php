<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Form Tambah Mobil</h1>
		</div>
		<div class="card">
			<div class="card-body">
				<form method="POST" action="<?php echo base_url('admin/data_mobil/tambah_mobil_aksi')	  ?>" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Type Mobil</label>
								<select name="kode_tipe" class="form-control" style="height:42px">
									<option value=""> -- Pilih Type Mobil -- </option>
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
								<input type="text" name="merk" class="form-control">
								<?php echo form_error('merk', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>No. Plat</label>
								<input type="text" name="no_plat" class="form-control">
								<?php echo form_error('no_plat', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>Warna</label>
								<input type="text" name="warna" class="form-control">
								<?php echo form_error('warna', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>Tahun</label>
								<input type="text" name="tahun" class="form-control">
								<?php echo form_error('tahun', '<div class="text-small text-danger">', '</div>') ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Status</label>
								<select name="status" class="form-control" style="height:42px">
									<option value=""> -- Pilih Status -- </option>
									<option value="1">Tersedia</option>
									<option value="0">Tidak Tersedia</option>
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
								<input type="number" name="biaya" class="form-control" min="1">
								<?php echo form_error('biaya', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>Status Kepemilikan</label>
								<select name="status_kepemilikan" id="status_kepemilikan" class="form-control" style="height:42px">
									<option value="">Pilih status kepemilikan</option>
									<option value="0">Perusahaan</option>
									<option value="1">Mitra</option>
								</select>
								<?php echo form_error('status_kepemilikan', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group" id="form-mitra" style="display: none">
								<label>Mitra</label>
								<select name="mitra" id="mitra" class="form-control" style="height:42px">
									<option value="">Pilih mitra</option>
									<?php foreach ($mitra as $key => $value) { ?>
										<option value="<?= $value->id_mitra ?>"><?= $value->nama_mitra ?></option>
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
