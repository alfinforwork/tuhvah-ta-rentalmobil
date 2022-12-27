<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Form Update Tipe  Mobil</h1>
		</div>	
		<div class="card">
			<div class="card-body">
				<?php foreach($tipe as $tp) : ?>
				<form method="POST" action="<?php echo base_url('admin/data_tipe/update_tipe_aksi') ?>">
					<div class="form-group">
						<label>Kode Tipe</label>
						<input type="hidden" name="id_type" value="<?php echo $tp->id_type ?>">
						<input type="text" name="kode_tipe" class="form-control" value="<?php echo $tp->kode_tipe ?>">
						<?php echo form_error('kode_tipe','<div class="text-small text-danger">','</div>') ?>
					</div>
					<div class="form-group">
						<label>Nama Tipe</label>
						<input type="text" name="nama_tipe" class="form-control" value="<?php echo $tp->nama_tipe ?>">
						<?php echo form_error('nama_tipe','<div class="text-small text-danger">','</div>') ?>
					</div>
					<button type="text" class="btn btn-primary">Simpan</button>
					<button type="text" class="btn btn-danger">Reset</button>

				</form>
			<?php endforeach; ?>
			</div>
		</div>
	</section>
</div>