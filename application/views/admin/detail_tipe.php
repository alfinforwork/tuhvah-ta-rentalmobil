<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Tipe</h1>
        </div>
    </section>
    <?php foreach($detail as $dt) : ?>
        <div class="card">
            <div class="row">
                
                <div class="col-md-7">
                    <table class="table">
                        <tr>
                            <td>Tipe Mobil </td>
                            
                        </tr>
                        <tr>
                            <td>Kode Tipe</td>
                            <td><?php echo $dt->kode_tipe ?></td>
                        </tr>
                        <tr>
                            <td>Nama Tipe</td>
                            <td><?php echo $dt->nama_tipe ?></td>
                        </tr>
                       
                    </table>
                    <a class="btn btn-sm btn-danger ml-4" href="<?php echo base_url('admin/data_tipe') ?>">Kembali</a>
                    <a class="btn btn-sm btn-primary ml-4" href="<?php echo base_url('admin/data_tipe/update_tipe/'.$dt->id_type) ?>">Update</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>