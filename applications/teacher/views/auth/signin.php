<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to Macmer</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet"
		href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<style type="text/css">
		@font-face {
			font-family: Nunito_regular;
			src: url(<?php echo base_url("assets/fonts/Nunito_regular.ttf"); ?>);
		}

		@font-face {
			font-family: Nunito-Light;
			src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
		}

		@font-face {
			font-family: Nunito-Semibold;
			src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
		}

		@font-face {
			font-family: Questrial-Regular;
			src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
		}

		@font-face {
			font-family: RedhatR;
			src: url(<?php echo base_url("assets/fonts/RedhatR.ttf"); ?>);
		}

		@font-face {
			font-family: Rubik-Medium;
			src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
		}

		@font-face {
			font-family: Montserrat-Medium;
			src: url(<?php echo base_url("assets/fonts/Montserrat-Medium.ttf"); ?>);
		}

		input {
			background: #f95555;
			font-family: Questrial-Regular;
			font-size: 20px;
			border: none;
			border-bottom: 1px solid #fff;
			color: white;
			margin-bottom: 30px;
			width: 90%;
		}

		input:focus {
			outline: none;
			background: #f95555;
		}

		input:-webkit-autofill,
		input:-webkit-autofill:hover,
		input:-webkit-autofill:focus,
		input:-webkit-autofill:active {
			transition: 5000s ease-in-out 0s;
			background: #f95555;
			font-family: Questrial-Regular;
		}

		::placeholder {
			color: white;
		}

		.invalid-bar {
			color: #FFffff;
			font-family: Questrial-regular, serif;
			border: 1px solid #FFffff;
			width: max-content;
			padding: 5px;
		}
	</style>

	<style>
		body {
			background: #fff;
			/* Professional gradient for body */
			font-family: 'Bebas Neue', sans-serif;
			padding-top: 50px;
		}

		.card-container {
			max-width: 500px;
			margin: 40px auto;
			padding: 30px;
			background: #124E66;
			border-radius: 20px;
			box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
			transition: all 0.3s ease-in-out;
			height: max-content;
		
		}

		.card-container:hover {
			box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
			transform: translateY(-10px);
		}

		.login-page-logo-container img {
			width: 130px;
			margin-bottom: 30px;
			animation: logoAnimation 1s ease-out;
		}

		@keyframes logoAnimation {
			0% {
				opacity: 0;
				transform: scale(0.5);
			}

			100% {
				opacity: 1;
				transform: scale(1);
			}
		}

		.login-page-school-name {
			font-size: 2.2rem;
			font-weight: 700;
			color: #fff;
			text-align: center;
			letter-spacing: 1px;
			white-space: nowrap;
			margin-bottom: 20px;
			/* Prevents text from wrapping */
		}

		.login-form-container {
			background: #fff;
			padding: 30px;
			border-radius: 15px;
			box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
		}

		/* Regular input field */
		.login-input {
			border-radius: 7px;
			border: 2px solid #ddd;
			background-color: #A5BFCC;
			!important;
			/* Force white background */
			padding: 12px;
			width: 100%;
			font-size: 1rem;
			margin-bottom: 20px;
			transition: all 0.3s ease;
			box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
		}

		/* Autofill specific styles */
		input:-webkit-autofill {
			background-color: #A5BFCC !important;
			/* Force background to white */
			color: #333 !important;
			/* Optional: set text color to black */
			transition: background-color 5000s ease-in-out 0s;
			/* Prevent override */
		}

		/* For Firefox autofill */
		input:-moz-placeholder {
			background-color: #A5BFCC !important;
		}

		/* Ensure the background remains white even when focused */
		.login-input:focus {
			border-color: #2C56BB;
			background-color: #A5BFCC !important;
			/* Force white background on focus */
			outline: none;
			box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1), 0 0 8px rgba(44, 86, 187, 0.5);
		}

		/* Autofill focused styles */
		input:-webkit-autofill:focus {
			background-color: #A5BFCC !important;
			/* Keep white background on focus */
		}


		.login-page-button {
			background-color: #124E66;
			color: white;
			border: none;
			width: 100%;
			padding: 12px;
			font-size: 1.2rem;
			border-radius: 7px;
			transition: all 0.3s ease;
			cursor: pointer;
		}

		.login-page-button:hover {
			background-color: #1d4287;
			transform: scale(1.05);
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
		}

		.login-page-brand {
			font-size: 1rem;
			color: #2C56BB;
			text-align: center;
			margin-top: 20px;
		}

		.form-label {
			font-size: 1.4rem;
			color: #333;
		}

		.login-page-logo-container {
			text-align: center;
		}

		@media (max-width: 768px) {
			.card-container {
				margin: 20px;
			}
		}
	</style>
</head>

<body>
	<div class="card-container ">
		<div class="login-page-logo-container">
			 <img src="<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>"
				onclick="location.href='<?php echo site_url('product') ?>'" class="login-page-logo" />
		</div>
		<div class="login-page-school-name-container">
			<p class="login-page-school-name"><?php echo $this->config->item('schoolName') ?></p>
		</div>
		<div class="login-form-container">

			<div class="message">
				<?php if ($this->session->flashdata('error')) { ?>
					<div class="col-md-12 error-bar">
						<i class="las la-exclamation-triangle"></i>
						<?php echo $this->session->flashdata('error') ?>
						<?php $this->session->unset_userdata('error') ?>
					</div>
				<?php } ?>
				<?php if ($this->session->flashdata('success')) { ?>
					<div class="col-md-12 col-lg-12 success-bar">
						<i class="las la-check-square"></i>
						<?php echo $this->session->flashdata('success') ?>
						<?php $this->session->unset_userdata('success') ?>
					</div>
				<?php } ?>
			</div>

			<!-- <p
				style="background: #fff; color: #f95555; border-radius: 5px; width: 50%; font-family: Nunito-Semibold; text-transform: uppercase; font-size: 18px; padding: 5px 25px 5px 25px; position: relative;bottom: 20px;">
				Teacher Login</p> -->
			<form method="POST" action="<?php echo site_url('auth/signin'); ?>">
				<div class="form-group">
					<label for="username" class="form-label">Username</label>
					<input type="text" class="login-input" name="username" placeholder="Username"
						value="<?php echo set_value('username') ?>" />
					<?php if (form_error('username')) { ?>
						<?php echo form_error(
							'username',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>'
						)
							?>
					<?php } ?>

				</div>

				<div class="form-group">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="login-input" name="password" placeholder="Password"
						value="<?php echo set_value('password') ?>" />
					<?php if (form_error('password')) { ?>
						<?php echo form_error(
							'password',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>'
						)
							?>
					<?php } ?>
				</div>




				<button class="login-page-button">
					Log In
				</button>

			</form>



			<div class="login-page-brand">
				<p style="color: black; font-family: RedhatR; font-size: 1.2rem;">By Signing in you agree to our <a
						href="<?php echo site_url('auth/terms') ?>" style="color: #2995bf;">Terms and Conditions</a></p>
			</div>
		</div>
		<div class="col-md-12" style="text-align: center; padding: 20px;">
			<p style="font-family: RedhatR; color: white; font-size: 1.2rem;"> © MacMer Web
				Solutions <?php echo date("Y") ?></p>
		</div>
	</div>
</body>

</html>