<html lang="en">
<head>
	<title>Assignment</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link href="<?php echo base_url('assets/css/printable.css') ?>" rel="stylesheet"/>
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

		@font-face {
			font-family: Rubik-Regular;
			src: url(<?php echo base_url("assets/fonts/Rubik-Regular.ttf"); ?>);
		}
	</style>
</head>
<body>
<div class="col-xs-12 school-name-container">
	<div class="school-logo-container">
		<img
				src="<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>"
				class="school-logo"
				alt="School Logo"
		/>
	</div>
	<p class="school-name"><?php echo $this->config->item('schoolName') ?></p>
	<p class="school-address"><?php echo $this->config->item('schoolAddress') ?></p>
</div>
<?php if( isset($assignment) ) { ?>
	<div class="col-xs-12 exam-details">
		<div class="col-xs-12">
			<p class="exam-name"><?php echo $assignment->name ?></p>
			<p class="exam-class"><?php echo "Class ".$assignment->class ?></p>
			<p class="exam-subject"><?php echo "Subject ".$assignment->subject ?></p>
		</div>
	</div>
<?php } ?>

<div class="col-xs-12 exam-paper">
	<p>Answer the following question briefly</p>
	<?php if (isset($questions)) { ?>
		<?php foreach ($questions as $key => $question) { ?>
			<p class="question"><?php echo $key +1 . ". ".$question->content ?></p>
		<?php } ?>
	<?php } ?>
</div>
<script>
	window.onload = function() {	window.print();  }
</script>
</body>
</html>
