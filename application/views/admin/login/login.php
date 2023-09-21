<!doctype html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/stylesss.css">
	<link rel="icon" sizes="76x76" href="https://ept-lembagabahasa.widyatama.ac.id/registration/assets/img/logo_widyatama.ico">
	<link rel="icon" type="image/png" href="https://ept-lembagabahasa.widyatama.ac.id/registration/assets/img/logo_widyatama.ico">

</head>

<body class="img js-fullheight" style="background-image: url(<?php echo base_url() ?>assets/images/bg2.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<a style="text-align: center;"><img src="<?php echo base_url() ?>assets/images/Mask group.png" height="200"></a>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<form method="post" action="<?php echo base_url('login/proses_login') ?>" class="user" id="login-form">
							<div class="form-group">
								<input type="text" class="form-control" id="username" placeholder="Username" name="username">
								<?php echo form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password">
								<?php echo form_error('password', '<div class="text-danger small ml-3">', '</div>') ?>
								<span toggle="#exampleInputPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								<div>
									<p id="warning">Warning: Capslock is ON</p>
								</div>
							</div>
							<div class="form-group">
								<input type="checkbox" id="remember" name="remember" value="1">
								<label for="remember">Remember Me</label>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-secondary submit px-3">Sign In</button>
							</div>
							<div class="form-group d-md-flex">
							</div>
						</form>
						<p class="w-100 text-center">&mdash; Lembaga Bahasa Widyatama &mdash;</p>
						<p class="text-center">©<script>
								document.write(new Date().getFullYear());
							</script> All Rights Reserved. Created by MBKM Team Widyatama 2022</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/popper.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/main.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>

<script>
	const password = document.querySelector("#exampleInputPassword");
	const warning = document.querySelector("#warning");

	password.addEventListener("keyup", function(e) {
		if (e.getModifierState("CapsLock")) {
			warning.style.display = "block";
		} else {
			warning.style.display = "none";
		}
		console.log("exampleInputPassword: " + password.value);
	});
</script>
<script>
<?php if ($this->session->flashdata('pesan')) { ?>
    swal({
    title: "Error",
    text: "<?php echo $this->session->flashdata('pesan'); ?>",
    icon: "error",
    button: "OK",
    });
<?php } ?>
</script>

<style>
	#warning {
		display: none;
		margin-top: 10px;
		background-color: #ffdde0;
		color: #d32f2f;
		padding: 5px;
		border-radius: 50px;
	}
</style>