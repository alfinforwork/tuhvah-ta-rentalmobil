<div class="ftco-blocks-cover-1">
	<div class="ftco-cover-1 overlay" style="background-image: url('<?= site_url('assets/assets_customer/') ?>images/hero_2.jpg');padding: 20vh 0;height: auto !important;">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg card custom-card" style="padding: 0 !important;">
					<form action="<?= base_url("customer/mobil/sewa_action/$id_mobil") ?>" method="post">
						<div class="card-header">
							<h3 class="text-center">Sewa Mobil</h3>
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
															<td>
																<?= form_error('no_ktp') ?>
																<div class="input-group input-group-sm">
																	<input type="number" name="no_ktp" id="no_ktp" class="form-control" required value="<?= $this->input->post('no_ktp', true) ?: $customer->no_ktp ?>" minlength="16">
																</div>
															</td>
														</tr>
														<tr>
															<th>Alamat</th>
															<td>
																<?= form_error('alamat') ?>
																<div class="input-group input-group-sm">
																	<textarea name="alamat" id="alamat" class="form-control" required><?= $this->input->post('alamat', true) ?: $customer->alamat ?></textarea>
																</div>
															</td>
														</tr>
													</table>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="list-datamobil" role="tabpanel" aria-labelledby="list-datamobil-list">
											<div class="card custom-card">
												<div class="card-body">
													<div class="item-1">
														<a href="#"><img src="<?= site_url($mobil->gambar ? $mobil->gambar : 'assets/assets_customer/images/img_1.jpg') ?>" alt="Image" class="img-fluid" style="width:100%;max-height: 30vh;"></a>
														<div class="item-1-contents">
															<div class="text-center mt-2">
																<h3><a href="#" class="text-white"><?= $mobil->merk ?></a></h3>
																<div class="rent-price"><span>Rp. <?= $mobil->biaya ?>/</span>day</div>
															</div>
															<ul class="specs">
																<li>
																	<span>Kode Tipe</span>
																	<span class="spec"><?= $mobil->kode_tipe ?></span>
																</li>
																<li>
																	<span>No Plat</span>
																	<span class="spec"><?= $mobil->no_plat ?></span>
																</li>
																<li>
																	<span>Warna</span>
																	<span class="spec"><?= $mobil->warna ?></span>
																</li>
																<li>
																	<span>Tahun</span>
																	<span class="spec"><?= $mobil->tahun ?></span>
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
															<td>
																<div class="input-group input-group-sm">
																	<select name="jenis_layanan" id="jenis_layanan" class="form-control" required>
																		<option value="tanpa_sopir">Tanpa Sopir</option>
																		<option value="sopir">Sopir</option>
																	</select>
																</div>
															</td>
														</tr>
														<tr id="jaminan_table">
															<th>Jaminan</th>
															<td>
																<label for="jaminan_ktp">KTP</label>
																<div class="input-group input-group-sm">
																	<input type="text" name="jaminan_ktp" id="jaminan_ktp" class="form-control" required>
																</div>
																<div id="jaminan_sopir">
																	<label for="">STNK</label>
																	<div class="row">
																		<div class="col-md-6">
																			<div class="input-group input-group-sm">
																				<input type="text" name="jaminan_stnk_nama" id="jaminan_stnk_nama" class="form-control" placeholder="Nama STNK" required>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="input-group input-group-sm">
																				<input type="text" name="jaminan_stnk_plat" id="jaminan_stnk_plat" class="form-control" placeholder="Plat Nomor" required>
																			</div>
																		</div>
																	</div>
																	<label for="">MOTOR</label>
																	<div class="row">
																		<div class="col-md-6">
																			<div class="input-group input-group-sm">
																				<input type="text" name="jaminan_motor_plat" id="jaminan_motor_plat" class="form-control" placeholder="Plat Motor" required>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="input-group input-group-sm">
																				<input type="text" name="jaminan_motor_merk" id="jaminan_motor_merk" class="form-control" placeholder="Merk Motor" required>
																			</div>
																		</div>
																	</div>
																	<script>
																		function change_jenis_layanan() {
																			var jenis_layanan = $('#jenis_layanan').val();
																			if (jenis_layanan != 'sopir') {
																				$("#jaminan_sopir").css('display', 'block');
																				$("#jaminan_stnk_nama").attr('required', 'true');
																				$("#jaminan_stnk_plat").attr('required', 'true');
																				$("#jaminan_motor_plat").attr('required', 'true');
																				$("#jaminan_motor_merk").attr('required', 'true');
																			} else {
																				$("#jaminan_sopir").css('display', 'none');
																				$("#jaminan_stnk_nama").removeAttr('required');
																				$("#jaminan_stnk_plat").removeAttr('required');
																				$("#jaminan_motor_plat").removeAttr('required');
																				$("#jaminan_motor_merk").removeAttr('required');

																				$("#jaminan_stnk_nama").val('');
																				$("#jaminan_stnk_plat").val('');
																				$("#jaminan_motor_plat").val('');
																				$("#jaminan_motor_merk").val('');
																			}
																		}

																		function cek_plat_nomor() {
																			var jaminan_stnk_plat = $('#jaminan_stnk_plat').val()
																			var jaminan_motor_plat = $('#jaminan_motor_plat').val()
																			if (jaminan_stnk_plat != '' && jaminan_motor_plat != '' && jaminan_motor_plat != jaminan_stnk_plat) {
																				alert('Plat tidak sama');
																				$('#jaminan_stnk_plat').val('');
																				$('#jaminan_motor_plat').val('');
																			}
																		}
																		$('#jenis_layanan').change(change_jenis_layanan);
																		$('#jaminan_stnk_plat').change(cek_plat_nomor);
																		$('#jaminan_motor_plat').change(cek_plat_nomor);
																	</script>
																</div>
															</td>
														</tr>
														<tr>
															<th>Merk Mobil</th>
															<td><?= $mobil->merk ?></td>
														</tr>
														<tr>
															<th>Harga Per Hari</th>
															<td>Rp. <?= rupiah($mobil->biaya) ?></td>
														</tr>
														<tr>
															<th>Tanggal sewa</th>
															<td>
																<?= form_error('tgl_sewa') ?>
																<div class="input-group input-group-sm">
																	<input type="datetime-local" name="tgl_sewa" id="tgl_sewa" class="form-control" required value="<?= $this->input->post('tgl_sewa', true) ?>" min="<?= date('Y-m-d H:i:s') ?>" max="<?= date('Y-m-d H:i:s', strtotime("+7 day")) ?>">
																</div>
															</td>
														</tr>
														<tr>
															<th>Lama Sewa</th>
															<td>
																<?= form_error('lama_sewa') ?>
																<div class="input-group input-group-sm">
																	<input type="number" name="lama_sewa" id="lama_sewa" class="form-control" required value="<?= $this->input->post('lama_sewa', true) ?>" min="1">
																	<div class="input-group-append">
																		<span class="btn btn-secondary"><b>/ hari</b></span>
																	</div>
																</div>
															</td>
														</tr>
														<tr>
															<th>Tanggal Kembali</th>
															<td id="tanggal_kembali"></td>
														</tr>
														<tr>
															<th>Total biaya</th>
															<td>Rp. <span id="totalbiaya">0</span></td>
														</tr>
													</table>
													<script>
														function hitung() {
															var harga_per_hari = <?= $mobil->biaya ?>;
															var lama_sewa = $('#lama_sewa').val();
															var jenis_layanan = $('#jenis_layanan').val();
															var tgl_sewa = $('#tgl_sewa').val();
															var biaya_sopir = 0;
															if (jenis_layanan == 'sopir') {
																biaya_sopir = 50000;
															} else {
																biaya_sopir = 0;
															}

															$('#totalbiaya').html(((harga_per_hari * lama_sewa) + (lama_sewa * biaya_sopir)));
															$('#tanggal_kembali').html(moment(tgl_sewa).add(lama_sewa, 'd').format('DD-MM-YYYY HH:mm:ss'));
														}
														$('#lama_sewa').keyup(hitung);
														$('#tgl_sewa').keyup(hitung);
														$('#jenis_layanan').change(hitung);
													</script>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="mt-4 mr-2 text-right">
								<span class="badge badge-danger">*Cek kembali data diri anda dan mobil yang anda sewa!</span>
							</div>
						</div>
						<div class="card-footer d-flex align-items-end justify-content-end">
							<button type="submit" class="btn btn-primary" style="width:15%">Sewa</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
