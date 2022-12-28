<div class="ftco-blocks-cover-1">
	<div class="ftco-cover-1 overlay" style="background-image: url('<?= site_url('assets/assets_customer/') ?>images/hero_2.jpg');padding: 20vh 0;height: auto !important;">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg card custom-card" style="padding: 0 !important;">
					<div class="card-header">
						<h3 class="text-center">Detail Transaksi</h3>
					</div>
					<div class="card-body">
						<?php if ($this->session->userdata('gagal')) { ?>
							<div class="mb-4 alert alert-danger">
								<?= $this->session->userdata('gagal') ?>
							</div>
						<?php } ?>
						<?php if ($this->session->userdata('berhasil')) { ?>
							<div class="mb-4 alert alert-success">
								<?= $this->session->userdata('berhasil') ?>
							</div>
						<?php } ?>
						<div class="row">
							<div class="col-md-3">
								<div class="list-group" id="list-tab" role="tablist">
									<a class="list-group-item custom-list-group-item list-group-item-action active" id="list-datadiri-list" data-toggle="list" href="#list-datadiri" role="tab" aria-controls="datadiri">Data Diri</a>
									<a class="list-group-item custom-list-group-item list-group-item-action" id="list-datamobil-list" data-toggle="list" href="#list-datamobil" role="tab" aria-controls="datamobil">Data Mobil</a>
									<a class="list-group-item custom-list-group-item list-group-item-action" id="list-sewamobil-list" data-toggle="list" href="#list-sewamobil" role="tab" aria-controls="sewamobil">Sewa Mobil</a>
									<!-- <a class="list-group-item custom-list-group-item list-group-item-action" id="list-uploadpembayaran-list" data-toggle="list" href="#list-uploadpembayaran" role="tab" aria-controls="uploadpembayaran">Upload Pembayaran</a> -->
								</div>
							</div>
							<div class="col-md">
								<div class="tab-content" id="nav-tabContent">
									<div class="tab-pane fade show active" id="list-datadiri" role="tabpanel" aria-labelledby="list-datadiri-list">
										<div class="card custom-card">
											<div class="card-body">
												<table class="table custom-table table-sm table-hover table-striped">
													<tr>
														<th>Nama</th>
														<td><?= $customer->nama ?></td>
													</tr>
													<tr>
														<th>Jenis Kelamin</th>
														<td><?= $customer->j_kelamin == 'p' ? 'Perempuan' : 'Laki laki' ?></td>
													</tr>
													<tr>
														<th>No KTP</th>
														<td><?= $customer->no_ktp ?></td>
													</tr>
													<tr>
														<th>Alamat</th>
														<td><?= $customer->alamat ?></td>
													</tr>
												</table>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="list-datamobil" role="tabpanel" aria-labelledby="list-datamobil-list">
										<div class="card custom-card">
											<div class="card-body">
												<div class="item-1">
													<a href="#"><img src="<?= site_url($transaksi->gambar ? $transaksi->gambar : 'assets/assets_customer/images/img_1.jpg') ?>" alt="Image" class="img-fluid" style="width:100%;max-height: 30vh;"></a>
													<div class="item-1-contents">
														<div class="text-center">
															<h3><a href="#"><?= $transaksi->merk ?></a></h3>
															<div class="rent-price"><span>Rp. <?= $transaksi->biaya ?>/</span>day</div>
														</div>
														<ul class="specs">
															<li>
																<span>Kode Tipe</span>
																<span class="spec"><?= $transaksi->kode_tipe ?></span>
															</li>
															<li>
																<span>No Plat</span>
																<span class="spec"><?= $transaksi->no_plat ?></span>
															</li>
															<li>
																<span>Warna</span>
																<span class="spec"><?= $transaksi->warna ?></span>
															</li>
															<li>
																<span>Tahun</span>
																<span class="spec"><?= $transaksi->tahun ?></span>
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
										<div class="card custom-card">
											<div class="card-body">
												<table class="table custom-table table-sm table-hover table-striped">
													<tr>
														<th>Jenis Layanan</th>
														<td><?= $transaksi->jenis_layanan == 'sopir' ? 'Sopir' : 'Tanpa Sopir' ?></td>
													</tr>
													<tr>
														<th>Jaminan</th>
														<td>
															<p>
																KTP <br>
																<?= $transaksi->jaminan_ktp ?>
															</p>
															<p>
																NAMA (STNK) <br>
																<?= ucfirst($transaksi->jaminan_stnk_nama) ?>
															</p>
															<p>
																PLAT NOMOR (STNK) <br>
																<?= $transaksi->jaminan_stnk_plat ?>
															</p>
															<p>
																PLAT MOTOR (MOTOR) <br>
																<?= $transaksi->jaminan_motor_plat ?>
															</p>
															<p>
																MERK (MOTOR) <br>
																<?= $transaksi->jaminan_motor_merk ?>
															</p>
														</td>
													</tr>
													<tr>
														<th>Merk Mobil</th>
														<td><?= $transaksi->merk ?></td>
													</tr>
													<tr>
														<th>Harga Per Hari</th>
														<td>Rp. <?= rupiah($transaksi->biaya) ?></td>
													</tr>
													<tr>
														<th>Tanggal Sewa</th>
														<td><?= date('d F Y H:i:s', strtotime($transaksi->tgl_rental)) ?></td>
													</tr>
													<tr>
														<th>Tanggal Kembali</th>
														<td><?= date('d F Y H:i:s', strtotime($transaksi->tgl_kembali)) ?></td>
													</tr>
													<tr>
														<th>Lama sewa</th>
														<td><?= $lama_sewa = round((strtotime($transaksi->tgl_kembali) - strtotime($transaksi->tgl_rental)) / (60 * 60 * 24)) ?> Hari</td>
													</tr>
												</table>
											</div>
										</div>
									</div>
									<!-- <div class="tab-pane fade" id="list-uploadpembayaran" role="tabpanel" aria-labelledby="list-uploadpembayaran-list">
										<div class="card custom-card">
											<div class="card-body">
												<p>Silahkan Tranfer Pembayaran Ke Nomor Rekening BCA 0600945332 A/N Hasto Yulianto</p>
												<table class="table table-striped">
													<tr>
														<th>Jenis Pembayaran</th>
														<td></td>
													</tr>
													<tr>
														<th>Kode Pembayaran</th>
														<td></td>
													</tr>
													<tr>
														<th>QR</th>
														<td>
															<img src="" alt="" style="width: 200px;">
														</td>
													</tr>
												</table>
												<form action="<?= base_url("customer/transaksi/upload_action/$id_transaksi") ?>" method="POST" enctype="multipart/form-data">
													<?php if ($transaksi->bukti_transfer) { ?>
														<img src="<?= base_url($transaksi->bukti_transfer) ?>" alt="Bukti Transfer" class="img img-thumbnail" style="max-height: 300px;">
														<div class="form-group form-group-sm mt-2">
															<input type="file" name="bukti_transfer" id="bukti_transfer" class="">
														</div>
													<?php } else { ?>
														<div class="form-group form-group-sm">
															<input type="file" name="bukti_transfer" id="bukti_transfer" class="">
														</div>
													<?php } ?>
													<button type="submit" class="btn btn-sm btn-primary">Upload</button>
												</form>
												<?php
												if ($status) { ?>
												<?php } ?>
											</div>
										</div>
									</div> -->
								</div>
							</div>
						</div>
						<div class="alert alert-primary mt-4">
							*Jika anda merasa sudah membayar dan status masih <strong>menunggu pembayaran</strong>, tunggu beberapa saat kemudian refresh halaman. Waktu tunggu paling lambat 1x24 jam
						</div>
						<div class="card custom-card mt-4">
							<div class="card-body" style="display: flex;flex-direction: row;justify-content:space-between">
								<span>
									<?php if ($transaksi->status_rental == 1) { ?>
										<span class="badge badge-danger"><?= $transaksi->nama_status_rental ?></span>
									<?php } elseif ($transaksi->status_rental == 2) { ?>
										<span class="badge badge-info"><?= $transaksi->nama_status_rental ?></span>
									<?php } elseif ($transaksi->status_rental == 3) { ?>
										<span class="badge badge-warning"><?= $transaksi->nama_status_rental ?></span>
									<?php } elseif ($transaksi->status_rental == 4) { ?>
										<span class="badge badge-success"><?= $transaksi->nama_status_rental ?></span>
									<?php } else { ?>
										<span class="badge badge-danger"><?= $transaksi->nama_status_rental ?></span>
									<?php } ?>
								</span>
								<div>
									<?php if ($transaksi->status_rental < 3) { ?>
										<button id="pay-button" class="btn btn-primary">Bayar</button>

										<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<Set your ClientKey here>"></script>
										<script type="text/javascript">
											function sendData(result) {
												$.ajax({
													url: "<?= base_url('customer/transaksi/api_update/' . $id_transaksi) ?>",
													method: "POST",

													data: result,
													success: function(response) {
														console.log(response);
														location.reload();
													},
													error: function() {
														alert("error");
													}
												});
											}
											document.getElementById('pay-button').onclick = function() {
												// SnapToken acquired from previous step
												snap.pay('<?= $snapToken ?>', {
													// Optional
													onSuccess: function(result) {
														console.log(result);
														/* You may add your own js here, this is just example */
														// document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
														sendData(result);
													},
													// Optional
													onPending: function(result) {
														console.log(result);
														/* You may add your own js here, this is just example */
														// document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
														sendData(result);
													},
													// Optional
													onError: function(result) {
														console.log(result);
														/* You may add your own js here, this is just example */
														// document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
														sendData(result);
													}
												});
											};
										</script>
									<?php } ?>
								</div>
								<?php $biaya_sopir = $transaksi->jenis_layanan == 'sopir' ? 50000 : 0; ?>
								<span>Total biaya Rp. <?= rupiah(($transaksi->biaya * $lama_sewa) + ($lama_sewa * $biaya_sopir)) ?></span>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
