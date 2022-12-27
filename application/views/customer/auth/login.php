<section id="hero" class="d-flex flex-column justify-content-center">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-8">
				<div class="card custom-card">
					<div class="card-header">
						<h4>Login</h4>
					</div>
					<div class="card-body">

						<form action="<?= site_url('customer/login/action') ?>" method="POST">
							<?php if (form_error('username') || form_error('password')) { ?>
								<div class="alert text-black" style="background-color:  #e74c3c ;">
									<?php if (form_error('username')) { ?>
										<span><?= form_error('username') ?></span>
									<?php } elseif (form_error('password')) { ?>
										<span><?= form_error('password') ?></span>
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
							<div class="text-white input-group custom-input-group mt-4">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-user"></i></div>
								</div>

								<input type="text" name="username" id="username" placeholder="Username" class="form-control <?= form_error('username') ? 'is_form_invalid' : '' ?>">
							</div>
							<div class="text-white input-group custom-input-group mt-4">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-key"></i></div>
								</div>

								<input type="password" name="password" id="password" placeholder="Password" class="form-control <?= form_error('password') ? 'is_form_invalid' : '' ?>">
							</div>
							<div class="d-flex mt-4">
								<a class="btn btn-link" href="<?= site_url('customer/register') ?>">Register</a>
								<button class="btn btn-primary ml-auto" type="submit">Login</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
