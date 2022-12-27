<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Tambah Customer</h1>
        </div>
        <div class="card">
        	<div class="card-body">
        		<form method="POST" action="<?php echo base_url('admin/data_customer/tambah_customer_aksi')	  ?>" enctype="multipart/form-data">
        			<div class="row">
        				<div class="col-md-6">
        					<div class="form-group">
        						<label>Nama</label>
        						<input type="text" name="nama" class="form-control">
        						<?php echo form_error('nama','<span class="text-small text-danger">','</span>') ?>
        					</div>

        					<div class="form-group">
        						<label>Username</label>
        						<input type="text" name="username" class="form-control">
        						<?php echo form_error('username','<span class="text-small text-danger">','</span>') ?>
        					</div>

        					<div class="form-group">
        						<label>Alamat</label>
        						<input type="text" name="alamat" class="form-control">
        						<?php echo form_error('alamat','<span class="text-small text-danger">','</span>') ?>
        					</div>

        					<div class="form-group">
        						<label>Jenis Kelamin</label>
        						<select class="form-control" name="j_kelamin"> 
        							<option value=""> -- Pilih Jenis Kelamin -- </option>
        							<option value="laki-laki">Laki-laki</option>
        							<option value="perempuan">Perempuan</option>	
        						</select>
        						<?php echo form_error('j_kelamin','<span class="text-small text-danger">','</span>') ?>
        					</div>
        				</div>
        				<div class="col-md-6">
        					<div class="form-group">
        						<label>No Telepon</label>
        						<input type="text" name="no_telp" class="form-control">
        						<?php echo form_error('no_telp','<span class="text-small text-danger">','</span>') ?>
        					</div>

        					<div class="form-group">
        						<label>No KTP</label>
        						<input type="text" name="no_ktp" class="form-control">
        						<?php echo form_error('no_ktp','<span class="text-small text-danger">','</span>') ?>
        					</div>

        					<div class="form-group">
        						<label>Password</label>
        						<input type="text" name="password" class="form-control">
        						<?php echo form_error('password','<span class="text-small text-danger">','</span>') ?>
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