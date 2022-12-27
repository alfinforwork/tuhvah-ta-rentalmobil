<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title><?= $title ?: 'KOSONG' ?></title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="<?= site_url('assets/assets_customer') ?>/img/favicon.png" rel="icon">
	<link href="<?= site_url('assets/assets_customer') ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?= site_url('assets/assets_customer') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= site_url('assets/assets_customer') ?>/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="<?= site_url('assets/assets_customer') ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?= site_url('assets/assets_customer') ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="<?= site_url('assets/assets_customer') ?>/vendor/venobox/venobox.css" rel="stylesheet">
	<link href="<?= site_url('assets/assets_customer') ?>/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="<?= site_url('assets/assets_customer') ?>/vendor/fontawesome/css/all.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="<?= site_url('assets/assets_customer') ?>/css/style.css" rel="stylesheet">

	<!-- =======================================================
	* Template Name: KnightOne - v2.2.1
	* Template URL: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/
	* Author: BootstrapMade.com
	* License: https://bootstrapmade.com/license/
	======================================================== -->
	<script src="<?= site_url('assets/assets_customer') ?>/vendor/jquery/jquery.min.js"></script>
</head>

<body>

	<!-- ======= Header ======= -->
	<?php $this->load->view('templates_customer/header');
	?>
	<!-- End Header -->
	<main id="main">
		<?php echo @$content ?: 'KOSONG' ?>
	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<footer id="footer">
		<div class="container">
			<h3>Rizqi Multi Creative</h3>
			<p>Rizqi Multi Creative adalah Jasa Sewa Mobil di Jogja. Kami mempertemukan antara kualitas kendaraan sewa dan ragam pelayanan yang prima dengan harga yang kompetitif.</p>
			<div class="social-links">
				<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
				<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
				<a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
				<a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
				<a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
			</div>
			<div class="copyright">
				&copy; Copyright <strong><span>Rizqi Multi Creative</span></strong>. All Rights Reserved
			</div>
			<div class="credits">
				<!-- All the links in the footer should remain intact. -->
				<!-- You can delete the links only if you purchased the pro version. -->
				<!-- Licensing information: https://bootstrapmade.com/license/ -->
				<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/ -->
				Designed by <a href="https://bootstrapmade.com/">Tuhfah Areta Gumilar</a>
			</div>
		</div>
	</footer><!-- End Footer -->

	<div id="preloader"></div>
	<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

	<!-- Vendor JS Files -->
	<script src="<?= site_url('assets/assets_customer') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= site_url('assets/assets_customer') ?>/vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="<?= site_url('assets/assets_customer') ?>/vendor/php-email-form/validate.js"></script>
	<script src="<?= site_url('assets/assets_customer') ?>/vendor/waypoints/jquery.waypoints.min.js"></script>
	<script src="<?= site_url('assets/assets_customer') ?>/vendor/counterup/counterup.min.js"></script>
	<script src="<?= site_url('assets/assets_customer') ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="<?= site_url('assets/assets_customer') ?>/vendor/venobox/venobox.min.js"></script>
	<script src="<?= site_url('assets/assets_customer') ?>/vendor/owl.carousel/owl.carousel.min.js"></script>
	<script src="<?= site_url('assets/assets_customer') ?>/vendor/fontawesome/js/all.min.js"></script>
	<script src="<?= site_url('assets/assets_customer') ?>/vendor/moment/moment.js"></script>

	<!-- Template Main JS File -->
	<script src="<?= site_url('assets/assets_customer') ?>/js/main.js"></script>




	<?php //$this->load->view('templates_customer/header'); 
	?>

	<?php //echo isset($content) ? $content : 'KOSONG' 
	?>


	<?php //$this->load->view('templates_customer/footer'); 
	?>
</body>

</html>
