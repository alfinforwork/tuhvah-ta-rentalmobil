<h2 class="text-center">RENTAL MOBIL</h2>
<table class="table table-sm table-bordered" style="font-size: 12px !important">
	<tr class="text-center">
		<th>No.</th>
		<th>Nama Pemilik</th>
		<th>Merk Mobil</th>
		<th>Biaya per hari</th>
		<th>Tanggal Rental</th>
		<th>Tanggal Kembali</th>
		<th>Lama Pengembalian</th>
		<th>Keterlambatan</th>
		<th>Denda</th>
		<th>Total biaya</th>
	</tr>
	<?php $total = 0;
	foreach ($data_transaksi as $key => $value) {
		$beda_hari = floor((strtotime($value->tgl_pengembalian) - strtotime($value->tgl_kembali)) / 3600 / 24);
	?>
		<tr>
			<td class="text-center"><?= $key + 1 ?></td>
			<td><?php echo $value->status_kepemilikan == 0 ? "Perusahaan" : $this->db->where('id_mitra', $value->id_mitra)->get('tb_mitra')->row()->nama_mitra ?></td>
			<td class="pr-4 pl-4"><?= $value->merk ?></td>
			<td class="pr-4 pl-4 text-right">Rp. <?= $value->biaya ?></td>
			<td class="pr-4 pl-4"><?= date('j F Y H:i:s',  strtotime($value->tgl_rental)) ?></td>
			<td class="pr-4 pl-4"><?= date('j F Y H:i:s',  strtotime($value->tgl_kembali)) ?></td>
			<td class="pr-4 pl-4"><?= date('j F Y H:i:s',  strtotime($value->tgl_pengembalian)) ?></td>
			<td class="pr-4 pl-4"><?= $beda_hari > 0 ? $beda_hari : 0 ?> Hari</td>
			<td class="text-center">
				<?php
				if ($beda_hari > 0) {
					$denda = $beda_hari * ($value->biaya);
				?>
					Rp. <?= $denda ?>
				<?php } else {
					$denda = 0; ?>
					Tidak ada
				<?php } ?>
			</td>
			<td class="pr-4 pl-4 text-right">Rp. <?= $biaya = (date_diff(date_create($value->tgl_rental), date_create($value->tgl_kembali))->d * $value->biaya) + $denda ?></td>
		</tr>
	<?php $total += $biaya;
	} ?>
</table>
<p class="text-right mr-4">Total biaya Rp. <?= $total ?></p>
<script>
	window.onload = function() {
		window.print();
		setTimeout(function() {
			window.close();
		}, 100);
	}
</script>
