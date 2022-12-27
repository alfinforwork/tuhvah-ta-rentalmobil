<div class="col-md-9 m-auto">
	<div class="row align-items-center justify-content-center" style="height: 100vh">
		<div class="col-lg card custom-card">
			<div class="card-body row">
				<div class="col-md-3">
					<div class="list-group" id="list-tab" role="tablist">
						<a class="list-group-item custom-list-group-item list-group-item-action <?= $menu === 'profile' || $menu == null ? 'active' : '' ?>" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
						<a class="list-group-item custom-list-group-item list-group-item-action <?= $menu === 'gantipassword' ? 'active' : '' ?>" id="list-gantipassword-list" data-toggle="list" href="#list-gantipassword" role="tab" aria-controls="gantipassword">Ganti Password</a>
						<a class="list-group-item custom-list-group-item list-group-item-action <?= $menu === 'transaksi' ? 'active' : '' ?>" id="list-transaksi-list" data-toggle="list" href="#list-transaksi" role="tab" aria-controls="transaksi">Transaksi</a>
					</div>
				</div>
				<div class="col-md">
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade <?= $menu === 'profile' || $menu == null ? 'show active' : '' ?>" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
							<h4 class="text-center mb-4">Profile</h4>
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
							<form action="<?= base_url('customer/profile/profile_action') ?>" method="POST">
								<div class="row">
									<div class="col-md">
										<div class="form-group form-group-sm">
											<label for="nama">Nama <?= form_error('nama') ?></label>
											<input type="text" name="nama" id="nama" class="form-control" value="<?= $customer->nama ?>" required>
										</div>
										<div class="form-group form-group-sm">
											<label for="username">Username <?= form_error('username') ?></label>
											<input type="text" name="username" id="username" class="form-control" value="<?= $customer->username ?>" required>
										</div>
									</div>
									<div class="col-md">
										<div class="form-group form-group-sm">
											<label for="j_kelamin">Jenis Kelamin <?= form_error('j_kelamin') ?></label>
											<select name="j_kelamin" id="j_kelamin" class="form-control" required>
												<option value="">Pilih jenis kelamin</option>
												<option value="l" <?= $customer->j_kelamin === 'l' ? 'selected' : '' ?>>Laki laki</option>
												<option value="p" <?= $customer->j_kelamin === 'p' ? 'selected' : '' ?>>Perempuan</option>
											</select>
										</div>
										<div class="form-group form-group-sm">
											<label for="no_ktp">No KTP <?= form_error('no_ktp') ?></label>
											<input type="number" min="1" name="no_ktp" id="no_ktp" class="form-control" value="<?= $customer->no_ktp ?>" required>
										</div>
									</div>
								</div>
								<div class="form-group form-group-sm">
									<label for="alamat">Alamat <?= form_error('alamat') ?></label>
									<textarea name="alamat" id="alamat" class="form-control" required><?= $customer->alamat ?></textarea>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-primary btn-sm">Submit</button>
								</div>
							</form>
						</div>
						<div class="tab-pane fade <?= $menu === 'gantipassword' ? 'show active' : '' ?>" id="list-gantipassword" role="tabpanel" aria-labelledby="list-gantipassword-list">
							<h4 class="text-center mb-4">Ganti Password</h4>
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
							<form action="<?= base_url('customer/profile/ganti_password_action') ?>" method="POST">
								<!-- <div class="col-md-4"> -->
								<div class="form-group form-group-sm">
									<label for="password_lama">Password lama <?= form_error('password_lama') ?></label>
									<input type="password" name="password_lama" id="password_lama" class="form-control" required value="<?= $this->input->post('password_lama', true) ?>">
								</div>
								<div class="form-group form-group-sm">
									<label for="password_baru">Password baru <?= form_error('password_baru') ?></label>
									<input type="password" name="password_baru" id="password_baru" class="form-control" required value="<?= $this->input->post('password_baru', true) ?>">
								</div>
								<div class="form-group form-group-sm">
									<label for="konfirmasi_password">Konfirmasi password <?= form_error('konfirmasi_password') ?></label>
									<input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control" required value="<?= $this->input->post('konfirmasi_password', true) ?>">
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-primary btn-sm">Submit</button>
								</div>
								<!-- </div> -->
							</form>
						</div>
						<div class="tab-pane fade <?= $menu === 'transaksi' ? 'show active' : '' ?>" id="list-transaksi" role="tabpanel" aria-labelledby="list-transaksi-list">
							<h4 class="text-center mb-4">List Transaksi</h4>
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
							<div style="overflow: auto;">
								<table class="table table-sm table-striped table-hover custom-table" style="font-size: 14px !important;">
									<tr class="text-center">
										<th>No</th>
										<th>Mobil</th>
										<th>Tanggal sewa</th>
										<th>Tanggal kembali</th>
										<th>Tanggal pengembalian</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
									<?php foreach ($data_transaksi as $key => $value) { ?>
										<tr>
											<td><?= $start + $key + 1 ?></td>
											<td><?= $value->merk ?></td>
											<td class="tect-center"><?= date('j F Y H:i:s', strtotime($value->tgl_rental)) ?></td>
											<td class="tect-center"><?= date('j F Y H:i:s', strtotime($value->tgl_kembali)) ?></td>
											<td class="tect-center"><?= strtotime($value->tgl_pengembalian) ? date('j F Y H:i:s', strtotime($value->tgl_pengembalian)) : '<span class="badge badge-danger w-100">Belum ada</span>' ?></td>
											<td class="text-center">
												<?php if ($value->status_rental == 1) { ?>
													<span class="badge badge-danger w-100"><?= $value->nama_status_rental ?></span>
												<?php } elseif ($value->status_rental == 2) { ?>
													<span class="badge badge-info w-100"><?= $value->nama_status_rental ?></span>
												<?php } elseif ($value->status_rental == 3) { ?>
													<span class="badge badge-warning w-100"><?= $value->nama_status_rental ?></span>
												<?php } elseif ($value->status_rental == 4) { ?>
													<span class="badge badge-success w-100"><?= $value->nama_status_rental ?></span>
												<?php } else { ?>
													<span class="badge badge-danger w-100"><?= $value->nama_status_rental ?></span>
												<?php } ?>
											</td>
											<td>
												<div class="btn-group btn-group-sm">
													<a href="<?= base_url("customer/transaksi/detail/$value->id_rental") ?>" class="btn btn-primary"><i class="fas fa-info"></i></a>
												</div>
											</td>
										</tr>
									<?php } ?>
								</table>
							</div>

							<nav class="row justify-content-end">
								<?= $pagination ?>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
