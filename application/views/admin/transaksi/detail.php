<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Detail Transaksi</h1>
		</div>
		<div class="card">
			<div class="card-body">
				<?= $this->session->flashdata('pesan', true) ?>

				<div class="row align-items-center justify-content-center">
					<div class="col-lg card" style="padding: 0 !important;">
						<div class="card-body">
							<div class="row">
								<div class="col-md-3">
									<div class="list-group" id="list-tab" role="tablist">
										<a class="list-group-item list-group-item-action active" id="list-datadiri-list" data-toggle="list" href="#list-datadiri" role="tab" aria-controls="datadiri">Data Diri</a>
										<a class="list-group-item list-group-item-action" id="list-datamobil-list" data-toggle="list" href="#list-datamobil" role="tab" aria-controls="datamobil">Data Mobil</a>
										<a class="list-group-item list-group-item-action" id="list-sewamobil-list" data-toggle="list" href="#list-sewamobil" role="tab" aria-controls="sewamobil">Sewa Mobil</a>
										<!-- <a class="list-group-item list-group-item-action" id="list-buktitransfer-list" data-toggle="list" href="#list-buktitransfer" role="tab" aria-controls="buktitransfer">Bukti Transfer</a> -->
										<?php if ($data_transaksi->status_rental >= 3) { ?>
											<a class="list-group-item list-group-item-action" id="list-pengembalian-list" data-toggle="list" href="#list-pengembalian" role="tab" aria-controls="pengembalian">Pengembalian</a>
											<a class="list-group-item list-group-item-action" id="list-pembayaran-list" data-toggle="list" href="#list-pembayaran" role="tab" aria-controls="pembayaran">Pembayaran</a>
											<a class="list-group-item list-group-item-action" id="list-bagihasil-list" data-toggle="list" href="#list-bagihasil" role="tab" aria-controls="bagihasil">Bagi Hasil</a>
										<?php } ?>
									</div>
								</div>
								<div class="col-md">
									<div class="tab-content" id="nav-tabContent">
										<div class="tab-pane fade show active" id="list-datadiri" role="tabpanel" aria-labelledby="list-datadiri-list">
											<div class="card">
												<div class="card-body">
													<table class="table table-sm table-hover table-striped">
														<tr>
															<th>Nama</th>
															<td><?= $data_transaksi->nama ?></td>
														</tr>
														<tr>
															<th>Jenis Kelamin</th>
															<td><?= $data_transaksi->j_kelamin == 'p' ? 'Perempuan' : 'Laki laki' ?></td>
														</tr>
														<tr>
															<th>No KTP</th>
															<td><?= $data_transaksi->no_ktp ?></td>
														</tr>
														<tr>
															<th>Alamat</th>
															<td><?= $data_transaksi->alamat ?></td>
														</tr>
													</table>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="list-datamobil" role="tabpanel" aria-labelledby="list-datamobil-list">
											<div class="card">
												<div class="card-body">
													<div class="item-1">
														<a href="#"><img src="<?= site_url($data_transaksi->gambar ? $data_transaksi->gambar : 'assets/assets_customer/images/img_1.jpg') ?>" alt="Image" class="img-fluid" style="width:100%;max-height: 30vh;"></a>
														<div class="item-1-contents">
															<div class="text-center">
																<h3><a href="#"><?= $data_transaksi->merk ?></a></h3>
																<div class="rent-price"><span>Rp. <?= $data_transaksi->biaya ?>/</span>day</div>
															</div>
															<ul class="specs">
																<li>
																	<span>Kode Tipe</span>
																	<span class="spec"><?= $data_transaksi->kode_tipe ?></span>
																</li>
																<li>
																	<span>No Plat</span>
																	<span class="spec"><?= $data_transaksi->no_plat ?></span>
																</li>
																<li>
																	<span>Warna</span>
																	<span class="spec"><?= $data_transaksi->warna ?></span>
																</li>
																<li>
																	<span>Tahun</span>
																	<span class="spec"><?= $data_transaksi->tahun ?></span>
																</li>
																<li>
																	<span>Minium age</span>
																	<span class="spec">18 years</span>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="list-sewamobil" role="tabpanel" aria-labelledby="list-sewamobil-list">
											<div class="card">
												<div class="card-body">
													<table class="table table-sm table-hover table-striped">
														<tr>
															<th>Merk Mobil</th>
															<td><?= $data_transaksi->merk ?></td>
														</tr>
														<tr>
															<th>Harga Per Hari</th>
															<td>Rp. <?= $data_transaksi->biaya ?></td>
														</tr>
														<tr>
															<th>Tanggal Rental</th>
															<td><?php echo date('j F Y', strtotime($data_transaksi->tgl_rental)) ?></td>
														</tr>
														<tr>
															<th>Tanggal Kembali</th>
															<td><?php echo date('j F Y', strtotime($data_transaksi->tgl_kembali)) ?></td>
														</tr>
														<tr>
															<th>Lama Sewa</th>
															<td>
																<?php $lama_sewa = round((strtotime($data_transaksi->tgl_kembali) - strtotime($data_transaksi->tgl_rental)) / (60 * 60 * 24)) ?>
																<?php echo $lama_sewa ?> hari
															</td>
														</tr>
														<tr>
															<th>Total Biaya</th>
															<?php $biaya_sopir = $data_transaksi->jenis_layanan == 'sopir' ? 50000 : 0; ?>
															<td>Rp. <?= rupiah($biaya = (($data_transaksi->biaya * $lama_sewa) + ($lama_sewa * $biaya_sopir))) ?></td>
														</tr>
													</table>
												</div>
											</div>
										</div>
										<!-- <div class="tab-pane fade" id="list-buktitransfer" role="tabpanel" aria-labelledby="list-buktitransfer-list">
											<div class="card">
												<div class="card-header text-center">
													<h4 class="text-center w-100"><?= $data_transaksi->status_rental == 2 ? 'Konfirmasi Bukti Transfer' : 'Bukti Transfer' ?></h4>
												</div>
												<div class="card-body">
													<?php if ($data_transaksi->status_rental == 2) { ?>
														<div class="row">
															<div class="col-md">
																<?php if ($data_transaksi->bukti_transfer) { ?>
																	<img src="<?= base_url($data_transaksi->bukti_transfer) ?>" alt="bukti transfer" class="img-responsive img-thumbnail">
																<?php } else echo "Bukti transfer tidak ditemukan"; ?>
																<p style="color:red">*Cek kembali foto bukti transfer</p>
															</div>
															<div class="col-md">
																<p>Apakah foto sudah benar?</p>
																<div class="btn-group btn-group-sm">
																	<a href="<?= base_url("admin/transaksi/foto_salah/$id_rental") ?>" class="btn btn-danger">Foto salah</a>
																	<a href="<?= base_url("admin/transaksi/foto_benar/$id_rental") ?>" class="btn btn-success">Foto benar</a>
																</div>
															</div>
														</div>
													<?php } else { ?>
														<?php if ($data_transaksi->bukti_transfer) { ?>
															<img src="<?= base_url($data_transaksi->bukti_transfer) ?>" alt="bukti transfer" class="img-responsive img-thumbnail">
														<?php } else echo "Bukti transfer tidak ditemukan"; ?>
													<?php } ?>
												</div>
											</div>
										</div> -->
										<div class="tab-pane fade" id="list-pengembalian" role="tabpanel" aria-labelledby="list-pengembalian-list">
											<div class="card">
												<div class="card-header text-center">
													<h4 class="text-center w-100"><?= $data_transaksi->status_rental == 3 ? 'Konfirmasi Pengembalian' : 'Pengembalian' ?></h4>
												</div>
												<div class="card-body">
													<table class="table table-sm table-hover table-striped">
														<?php if ($data_transaksi->status_rental == 3) { ?>

															<form action="<?= base_url("admin/transaksi/pengembalian_action/$data_transaksi->id_rental") ?>" method="post">
																<tr>
																	<th>Tanggal Rental</th>
																	<td><?= $data_transaksi->tgl_rental ? date('j F Y H:i:s', strtotime($data_transaksi->tgl_rental)) : '<span class="badge badge-danger w-100">Belum ada</span>' ?></td>
																</tr>
																<tr>
																	<th>Tanggal kembali</th>
																	<td><?= $data_transaksi->tgl_kembali ? date('j F Y H:i:s', strtotime($data_transaksi->tgl_kembali)) : '<span class="badge badge-danger w-100">Belum ada</span>' ?></td>
																</tr>
																<tr>
																	<th>Tanggal pengembalian</th>
																	<td>
																		<?= form_error('tgl_pengembalian') ?>
																		<div class="input-group input-group-sm">
																			<input type="datetime-local" name="tgl_pengembalian" id="tgl_pengembalian" class="form-control" required value="<?= $this->input->post('tgl_pengembalian', true) ?>" min="<?= $data_transaksi->tgl_rental ?>">
																		</div>
																	</td>
																</tr>
																<tr id="row_denda" style="display:none">
																	<th>Denda</th>
																	<td><span class="badge badge-danger w-100" id="denda">Belum ada</span></td>
																</tr>
																<script>
																	$(document).ready(function() {
																		$('#tgl_pengembalian').change(function() {
																			var satu_hari = 24 * 60 * 60 * 1000;
																			var tanggal_kembali = new Date(`<?= $data_transaksi->tgl_kembali ?>`)
																			var tanggal_pengembalian = new Date($('#tgl_pengembalian').val())
																			var diffDays = Math.round((tanggal_pengembalian.getTime() - tanggal_kembali.getTime()) - (satu_hari));
																			console.log(diffDays)
																			if (diffDays > 0) {
																				$('#denda').html('Rp. ' + Math.ceil(diffDays / (1000 * 60 * 60 * 24)) * <?php echo $data_transaksi->biaya * 1.5; ?>)
																				$('#row_denda').css('display', 'table-row')
																			} else {
																				$('#row_denda').css('display', 'none')
																			}
																			// if (tanggal_kembali) {

																			// }
																		})
																	});
																</script>

																<tr>
																	<th>Apakah anda yakin ?</th>
																	<td><button type="submit" class="btn btn-success">Yakin</button></td>
																</tr>
															</form>
														<?php
															$denda = 0;
														} else { ?>
															<tr>
																<th>Tanggal Rental</th>
																<td><?= $data_transaksi->tgl_rental ? date('j F Y H:i:s', strtotime($data_transaksi->tgl_rental)) : '<span class="badge badge-danger w-100">Belum ada</span>' ?></td>
															</tr>
															<tr>
																<th>Tanggal kembali</th>
																<td><?= $data_transaksi->tgl_kembali ? date('j F Y H:i:s', strtotime($data_transaksi->tgl_kembali)) : '<span class="badge badge-danger w-100">Belum ada</span>' ?></td>
															</tr>
															<tr>
																<th>Tanggal pengembalian</th>
																<td><?= $data_transaksi->tgl_pengembalian ? date('j F Y H:i:s', strtotime($data_transaksi->tgl_pengembalian)) : '<span class="badge badge-danger w-100">Belum ada</span>' ?></td>
															</tr>
															<tr>
																<th>Denda</th>
																<td>
																	<?php
																	$beda_hari = floor((strtotime($data_transaksi->tgl_pengembalian) - strtotime($data_transaksi->tgl_kembali)) / 3600 / 24);
																	if ($beda_hari > 0) { ?>
																		<span class="badge badge-danger">Rp. <?= $denda = ($data_transaksi->biaya * 1.5) * $beda_hari ?></span>
																	<?php } else { ?>
																		<span class="badge badge-success" id="denda">Tidak ada</span>
																	<?php } ?>
																</td>
															</tr>
														<?php } ?>
													</table>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="list-pembayaran" role="tabpanel" aria-labelledby="list-pembayaran-list">
											<div class="card">
												<div class="card-header text-center">
													<h4 class="text-center w-100">Pembayaran</h4>
												</div>
												<div class="card-body">
													<table class="table table-sm table-hover table-striped">
														<tr>
															<th>Tipe Pembayaran</th>
															<td><?= $data_transaksi->tipe_pembayaran ?></td>
														</tr>
														<tr>
															<th>Jenis Pembayaran</th>
															<td><?= $data_transaksi->jenis_pembayaran ?></td>
														</tr>
														<tr>
															<th>Kode Pembayaran</th>
															<td><?= $data_transaksi->kode_pembayaran ?></td>
														</tr>
													</table>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="list-bagihasil" role="tabpanel" aria-labelledby="list-bagihasil-list">
											<div class="card">
												<div class="card-header text-center">
													<h4 class="text-center w-100">Bagi Hasil</h4>
												</div>
												<div class="card-body">
													<table class="table table-sm table-hover table-striped">
														<?php $total = (($biaya + $denda)) ?>
														<?php $potongan_midtrans = 4000 ?>
														<?php if ($data_transaksi->status_kepemilikan == 0) { ?>
															<tr>
																<th>Perusahaan</th>
																<td><?= rupiah(($total - $potongan_midtrans)) ?></td>
															</tr>
														<?php } else { ?>
															<tr>
																<th>Total</th>
																<td><?= rupiah(($total - $potongan_midtrans)) ?></td>
															</tr>
															<tr>
																<th>Perusahaan</th>
																<td><?= rupiah(($total - $potongan_midtrans) * 0.4) ?></td>
															</tr>
															<tr>
																<th>Mitra</th>
																<td><?= rupiah(($total - $potongan_midtrans) * 0.6) ?></td>
															</tr>
														<?php } ?>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="card-footer">
				<?php if ($data_transaksi->status_rental == 1) { ?>
					<span class="badge badge-danger"><?= $data_transaksi->nama_status_rental ?></span>
				<?php } elseif ($data_transaksi->status_rental == 2) { ?>
					<span class="badge badge-info"><?= $data_transaksi->nama_status_rental ?></span>
				<?php } elseif ($data_transaksi->status_rental == 3) { ?>
					<span class="badge badge-warning"><?= $data_transaksi->nama_status_rental ?></span>
				<?php } elseif ($data_transaksi->status_rental == 4) { ?>
					<span class="badge badge-success"><?= $data_transaksi->nama_status_rental ?></span>
				<?php } else { ?>
					<span class="badge badge-danger"><?= $data_transaksi->nama_status_rental ?></span>
				<?php } ?>
			</div>
		</div>

	</section>
</div>
