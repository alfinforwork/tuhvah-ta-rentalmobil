<section id="hero" class="d-flex flex-column justify-content-center">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-8">
				<div class="card custom-card">
					<div class="card-body">

						<form action="<?= site_url('customer/register/action') ?>" method="POST">
							<h4 class="text-black">Register</h4>
							<?php if (validation_errors()) { ?>
								<div class="alert text-black" style="background-color:  #e74c3c ;">
									<?php if (form_error('nama')) { ?>
										<?= form_error('nama') ?>
									<?php }
									if (form_error('username')) { ?>
										<?= form_error('username') ?>
									<?php }
									if (form_error('no_telp')) { ?>
										<?= form_error('no_telp') ?>
									<?php }
									if (form_error('j_kelamin')) { ?>
										<?= form_error('j_kelamin') ?>
									<?php }
									if (form_error('password')) { ?>
										<?= form_error('password') ?>
									<?php }
									if (form_error('konfirmasi_password')) { ?>
										<?= form_error('konfirmasi_password') ?>
									<?php } ?>
								</div>
							<?php } ?>
							<?php if ($this->session->userdata('berhasil')) { ?>
								<div class="alert alert-success">
									<?= $this->session->userdata('berhasil') ?>
								</div>
							<?php } elseif ($this->session->userdata('gagal')) { ?>
								<div class="alert text-white" style="background-color:  #e74c3c ;">
									<?= $this->session->userdata('gagal') ?>
								</div>
							<?php } ?>
							<div class="text-white input-group mt-4 input-group-sm">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-user"></i></div>
								</div>

								<input type="text" name="nama" id="nama" placeholder="Nama : jono" class="form-control <?= form_error('nama') ? 'is_form_invalid' : '' ?>" value="<?= $this->input->post('nama', true) ?>">
							</div>
							<div class="text-white input-group mt-4 input-group-sm">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-user-cog"></i></div>
								</div>

								<input type="text" name="username" id="username" placeholder="Username" class="form-control <?= form_error('username') ? 'is_form_invalid' : '' ?>" value="<?= $this->input->post('username', true) ?>">
							</div>
							<div class="text-white input-group mt-4 input-group-sm">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-phone-alt"></i></div>
								</div>

								<input type="text" name="no_telp" id="no_telp" placeholder="No Telp : 08...." class="form-control <?= form_error('no_telp') ? 'is_form_invalid' : '' ?>" value="<?= $this->input->post('no_telp', true) ?>">
							</div>
							<div class="input-group mt-4 input-group-sm <?= form_error('password') ? 'is_form_invalid' : '' ?>">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-people-arrows"></i></div>
								</div>
								<div class="form-check form-check-inline ml-2">
									<input class="form-check-input" type="radio" name="j_kelamin" id="inlineRadio1" value="l" <?= $this->input->post('j_kelamin', true) == 'l' ? 'checked' : '' ?>>
									<label class="form-check-label" for="inlineRadio1">Laki laki</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="j_kelamin" id="inlineRadio2" value="p" <?= $this->input->post('j_kelamin', true) == 'p' ? 'checked' : '' ?>>
									<label class="form-check-label" for="inlineRadio2">Perempuan</label>
								</div>
							</div>
							<div class="text-white input-group mt-4 input-group-sm">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-key"></i></div>
								</div>

								<input type="password" name="password" id="password" placeholder="Password" class="form-control <?= form_error('password') ? 'is_form_invalid' : '' ?>" value="<?= $this->input->post('password', true) ?>">
							</div>
							<div class="text-white input-group mt-4 input-group-sm">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-key"></i></div>
								</div>

								<input type="password" name="konfirmasi_password" id="konfirmasi_password" placeholder="Konfirmasi Password" class="form-control <?= form_error('konfirmasi_password') ? 'is_form_invalid' : '' ?>" value="<?= $this->input->post('konfirmasi_password', true) ?>">
							</div>


							<div class="d-flex mt-4">
								<a class="btn btn-link" href="<?= site_url('customer/login') ?>">Login</a>
								<button class="btn btn-primary ml-auto" type="submit">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
