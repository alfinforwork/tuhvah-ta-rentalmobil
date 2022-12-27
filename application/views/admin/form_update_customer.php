<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Update Data Customer</h1>
        </div>
        <div class="card">
        	<div class="card-body">

        		<?php foreach ($tb_customer as $cs) : ?>

        		<form method="POST" action="<?php echo base_url('admin/data_customer/update_customer_aksi')	  ?>" enctype="multipart/form-data">
        		<div class="row">
        			<div class="col-md-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="hidden" name="id_customer" class="form-control" value="<?php echo $cs->id_customer ?>">
                            <input type="text" name="nama" class="form-control" value="<?php echo $cs->nama ?>">
                            <?php echo form_error('nama','<div class="text-small text-danger">','</div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $cs->username ?>">
                            <?php echo form_error('username','<div class="text-small text-danger">','</div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?php echo $cs->alamat ?>">
                            <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input type="text" name="j_kelamin" class="form-control" value="<?php echo $cs->j_kelamin ?>">
                            <?php echo form_error('j_kelamin','<div class="text-small text-danger">','</div>') ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" name="no_telp" class="form-control" value="<?php echo $cs->no_telp ?>">
                            <?php echo form_error('no_telp','<div class="text-small text-danger">','</div>') ?>
                        </div>

                        <div class="form-group">
                            <label>No KTP</label>
                            <input type="text" name="no_ktp" class="form-control" value="<?php echo $cs->no_ktp ?>">
                            <?php echo form_error('no_ktp','<div class="text-small text-danger">','</div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $cs->password ?>">
                             <?php echo form_error('password','<div class="text-small text-danger">','</div>') ?>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        <button type="reset" class="btn btn-danger mt-4">Reset</button>
                     </div>
        		</div>
        		</form>

        	 	<?php endforeach; ?>

        	</div>
        </div>

    </section>
</div>