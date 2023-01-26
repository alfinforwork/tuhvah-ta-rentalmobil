<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Laporan Transaksi Selesai</h1>
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
					<!-- -------------------------------------------------------------------------------------------------------- -->
					<div class="form-group">
						<label for="dari">Tanggal dari</label>
						<input type="date" name="dari" id="dari" class="form-control" required value="<?= $dari ?>">
					</div>
					<div class="form-group">
						<label for="ke">Tanggal ke</label>
						<input type="date" name="ke" id="ke" class="form-control" required value="<?= $ke ?>">
					</div>
					<button type="submit" class="btn btn-sm btn-primary">Filter</button>
					<?php if ($dari && $ke) { ?>
						<a href="<?= base_url("admin/laporan/print?dari=$dari&ke=$ke") ?>" class="btn btn-sm btn-success" target="_blank">Print</a>
					<?php } ?>
				</form>
			</div>
		</div>

		<div class="card">
			<div class="card-body">
				<?php echo $this->session->flashdata('pesan') ?>

				<table class="table table-sm table-hover table-striped">
					<thead>
						<tr class="text-center">
							<th>NO</th>
							<th>Pemilik</th>
							<th>Nama Customer</th>
							<th>Mobil</th>
							<th>Tanggal</th>
							<th>Biaya</th>
							<th>Pembayaran</th>
							<th>Bagi hasil</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($data_transaksi as $value) : ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td>
									Kepemilikan : <b><?php echo $value->status_kepemilikan == 0 ? "Perusahaan" : "Mitra" ?></b><br>
									Nama Pemilik : <b><?php echo $value->status_kepemilikan == 0 ? "Perusahaan" : $this->db->where('id_mitra', $value->id_mitra)->get('tb_mitra')->row()->nama_mitra ?></b>
								</td>
								<td><?php echo $value->nama ?></td>
								<td><?php echo $value->merk ?></td>
								<td>
									Rental : <b><?= date('j F Y H:i:s', strtotime($value->tgl_rental)) ?></b> <br>
									Kembali : <b><?= date('j F Y H:i:s', strtotime($value->tgl_kembali)) ?></b> <br>
									Pengembalian : <b><?= $value->tgl_pengembalian ? date('j F Y H:i:s', strtotime($value->tgl_pengembalian)) : '<span class="badge badge-danger">Belum ada</span>' ?></b>
								</td>
								<td class="text-left">
									<?php $lama_sewa = round((strtotime($value->tgl_kembali) - strtotime($value->tgl_rental)) / (60 * 60 * 24)) ?>
									<?php $biaya_sopir = $value->jenis_layanan == 'sopir' ? 50000 : 0; ?>
									Biaya : <b>Rp. <?= rupiah($biaya = (($value->biaya * $lama_sewa) + ($lama_sewa * $biaya_sopir))) ?></b><br>
									Denda :
									<?php
									$beda_hari = floor((strtotime($value->tgl_pengembalian) - strtotime($value->tgl_kembali)) / 3600 / 24);
									if ($beda_hari > 0) { ?>
										<b>Rp. <?= rupiah($denda = (($value->biaya) * $beda_hari)) ?></b>
									<?php } else {
										$denda = 0; ?>
										<span class="badge badge-success" id="denda">Tidak ada</span>
									<?php } ?><br>
									Total : <b>Rp. <?= rupiah($total = (($biaya + $denda))) ?></b>
								</td>
								<td>
									Tipe Pembayaran: <b><?= $value->tipe_pembayaran ?></b><br>
									Jenis Pembayaran: <b><?= $value->jenis_pembayaran ?></b><br>
									Potongan: <b>Rp. <?= rupiah($potongan_midtrans = 4000) ?></b>
								</td>
								<td>
									<b>
										<?php
										if ($value->status_kepemilikan == 0) {
											echo 'Milik Perusahaan <br> Rp. ' . rupiah(($total - $potongan_midtrans));
										} else { ?>
											Total : <?= rupiah(($total - $potongan_midtrans)) ?><br>
											Perusahaan : <?= rupiah(($total - $potongan_midtrans) * 0.4) ?><br>
											Mitra : <?= rupiah(($total - $potongan_midtrans) * 0.6) ?>
										<?php } ?>
								</td>
								<td class="text-center">
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
