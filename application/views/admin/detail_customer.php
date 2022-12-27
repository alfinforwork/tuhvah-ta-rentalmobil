<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Customer</h1>
        </div>
    </section>
    <?php foreach($detail as $dt) : ?>
        <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                        	<td>Nama</td>
                        	<td><?php echo $dt->nama ?></td>
                        </tr>

                        <tr>
                        	<td>Username</td>
                        	<td><?php echo $dt->username ?></td>
                        </tr>

                        <tr>
                        	<td>Alamat</td>
                        	<td><?php echo $dt->alamat ?></td>
                        </tr>

                        <tr>
                        	<td>Jenis Kelamin</td>
                        	<td><?php echo $dt->j_kelamin ?></td>
                        </tr>

                        <tr>
                        	<td>No Telp</td>
                        	<td><?php echo $dt->no_telp ?></td>
                        </tr>

                        <tr>
                        	<td>No KTP</td>
                        	<td><?php echo $dt->no_ktp ?></td>
                        </tr>

                        <tr>
                        	<td>Password</td>
                        	<td><?php echo $dt->password ?></td>
                        </tr>
                    </table>
                    <a class="btn btn-sm btn-danger ml-4" href="<?php echo base_url('admin/data_customer') ?>">Kembali</a>
                    <a class="btn btn-sm btn-primary ml-4" href="<?php echo base_url('admin/data_customer/update_customer/'.$dt->id_customer) ?>">Update</a>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
</div>