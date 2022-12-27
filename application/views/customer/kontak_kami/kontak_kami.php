<section id="hero" class="d-flex flex-column justify-content-center">
	<div class="container">
		<form action="<?= base_url('customer/kontak_kami/action') ?>" method="post">
			<div class="card custom-card">
				<div class="card-body">
					<h1>Kontak kami</h1>
					<div class="row text-left">
						<div class="col-md">
							<div class="form-group custom-input-group">
								<label for="email">Email</label>
								<input type="text" name="email" id="email" class="form-control">
							</div>
						</div>
						<div class="col-md">
							<div class="form-group custom-input-group">
								<label for="subject">Subject</label>
								<input type="text" name="subject" id="subject" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group custom-input-group text-left">
						<label for="message">Message</label>
						<textarea name="message" id="message" class="form-control" rows="10"></textarea>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Kirim</button>
				</div>
			</div>
		</form>
	</div>
</section><!-- End Hero -->
