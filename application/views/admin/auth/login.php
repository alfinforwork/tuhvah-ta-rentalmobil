<h4 class="text-center">Login</h4>
<?php if (form_error('username') || form_error('password')) { ?>
	<div class="alert alert-danger">
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
	<div class="alert alert-danger">
		<?= $this->session->userdata('gagal') ?>
	</div>
<?php } ?>
<form action="<?= site_url('admin/login/action') ?>" method="POST">
	<div class="input-group mt-4 input-group-sm">
		<div class="input-group-prepend">
			<div class="input-group-text"><i class="fas fa-user"></i></div>
		</div>

		<input type="text" name="username" id="username" placeholder="Username" class="form-control" value="<?= $this->input->post('username', true) ?>">
	</div>
	<div class="input-group mt-4 input-group-sm">
		<div class="input-group-prepend">
			<div class="input-group-text"><i class="fas fa-key"></i></div>
		</div>

		<input type="password" name="password" id="password" placeholder="Password" class="form-control" value="<?= $this->input->post('password', true) ?>">
	</div>
	<div class="d-flex mt-4">
		<a href="<?= site_url('') ?>" class="">Kembali ke customer</a>
		<button class="btn btn-sm btn-primary ml-auto" type="submit">Login</button>
	</div>
</form>
