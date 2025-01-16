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
</head>
<body style="background: #f95555;">
<div class="col-md-12" align="center" style="padding-top: 50px; ">
	<img src="<?php echo base_url('assets/images/logo/skoolizer.png'); ?>"
		 onclick="location.href='<?php echo site_url('product') ?>'"/>
	<div class="col-md-12" style="" align="center">
		<div class="col-md-4"></div>
		<div class="col-md-4" style="border: 1px solid white; border-radius: 5px; margin-top: 60px;">
			<p style="background: #fff; color: #f95555; border-radius: 5px; width: 50%; font-family: Nunito-Semibold; text-transform: uppercase; font-size: 18px; padding: 5px 25px 5px 25px; position: relative;bottom: 20px;">
				Teacher Login</p>
			<form method="POST" action="<?php echo site_url('auth/signin'); ?>">
				<div class="col-md-12" style="padding-top: 50px;">
					<input
							type="text"
							name="username"
							placeholder="Username"
							value="<?php echo set_value('username') ?>"
					/>
					<?php if (form_error('username')) { ?>
						<?php echo form_error('username',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

					<br>
					<input
							type="password"
							name="password"
							placeholder="Password"
							value="<?php echo set_value('password') ?>"
					/>
					<?php if (form_error('password')) { ?>
						<?php echo form_error('password',
								'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
								'</div>')
						?>
					<?php } ?>

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
				</div>
				<div class="col-md-12">
					<button style="font-family: Nunito_Regular; border: 1px solid white; border-radius: 5px; color: white; padding: 5px 25px 5px 25px; background: #f95555; font-size: 20px; margin-top: 40px; position: relative; top: 20px;">
						Log In
					</button>
				</div>
			</form>
		</div>

		<div class="col-md-4">

		</div>
		<div class="col-md-12" style="margin-top: 60px;">
			<p style="color: white; font-family: RedhatR; font-size: 18px;">By Signing in you agree to our <a
						href="<?php echo site_url('auth/terms') ?>" style="color: #2995bf;">Terms and Conditions</a></p>
		</div>
	</div>
	<div class="col-md-12" style="margin-top: 20px;">
		<p style="font-family: RedhatR; color: white; font-size: 16px;"> © MacMer Web
			Solutions <?php echo date("Y") ?></p>
	</div>
</div>
</body>
</html>
