<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?= @$judul ?: '' ?></h1>
		</div>
		<div class="card">
			<div class="card-body">
				<form method="POST" action="<?php echo @$action ?>" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama mitra</label>
								<input type="text" name="nama_mitra" class="form-control" value="<?php echo $nama_mitra ?>">
								<?php echo form_error('nama_mitra', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>jenis kelamin</label>
								<select name="jenis_kelamin" class="form-control" style="height:42px">
									<option value=""> -- Pilih Jenis Kelamin-- </option>
									<option value="l" <?php echo $jenis_kelamin == 'l' ? 'selected' : '' ?>>Laki laki</option>
									<option value="p" <?php echo $jenis_kelamin == 'p' ? 'selected' : '' ?>>Perempuan</option>
								</select>
								<?php echo form_error('jenis_kelamin', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea name="alamat" class="form-control"><?php echo $alamat ?></textarea>
								<?php echo form_error('alamat', '<div class="text-small text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>No telp</label>
								<input type="text" name="no_telp" class="form-control" value="<?php echo $no_telp; ?>">
								<?php echo form_error('no_telp', '<div class="text-small text-danger">', '</div>') ?>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary mt-4">Submit</button>
					<button type="reset" class="btn btn-danger mt-4">Reset</button>
				</form>
			</div>
		</div>

	</section>
</div>
