<!DOCTYPE html>
<html>
<head>
	<title>Write message</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<style type="text/css">
		@font-face{
			font-family: Nunito_regular;
			src: url(<?php echo base_url("assets/fonts/Nunito_regular.ttf"); ?>);
		}
		@font-face{
			font-family: Nunito-Light;
			src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
		}
		@font-face{
			font-family: RedhatR;
			src: url(<?php echo base_url("assets/fonts/RedhatR.ttf"); ?>);
		}
		@font-face{
			font-family: Questrial-Regular;
			src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
		}
		@font-face{
			font-family: Nunito-Semibold;
			src: url(<?php echo base_url("assets/fonts/Nunito-Semibold.ttf"); ?>);
		}
		@font-face{
			font-family: Rubik-Medium;
			src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
		}
		.icon
		{
			height: 20px;
			width: 20px;
			padding-top: 5px;
		}
		.btn
		{
			border: 2px solid;
			outline: none;
			background: transparent;
			font-size: 20px;
			width: 100%;
			font-family: Nunito_regular;
			color:  white;
			border-color: #fff;
			border-radius: 8px;
			margin-top: 50px;
		}
		.btn:focus{
			color: white;
			outline: none;
			border-color: white;
		}
	</style>
</head>
<body style="background:rgba(41, 149, 191, 0.6); ">
	<div class="visible-xs visible-sm">

<div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); padding-top: 10px;">
	<div class="col-xs-1" style="padding: 0px;">
		<img onclick="goBack()" src="<?php echo base_url('assets/icons/left-arrow.svg'); ?>" class="icon">
	</div>
	<div class="col-xs-11" style="padding: 0px;">
		<p style="color: white; font-size:20px; font-family: Nunito-Light; ">Write Message</p>
	</div>
</div>
<div class="col-xs-12" style="padding-top: 40px;">
	<form method="POST" action="<?php echo site_url('Principal/postmessage') ?>">
	<p style=" border-bottom: 1px solid; border-color: black; font-family: RedhatR; font-size: 18px; padding-bottom: 5px;"><span style="font-family: Nunito-Semibold;">Recieptents:</span>
	 <?php 
	 $recieptents=implode(",", $target); 
	  foreach($target as $row) { if ($row=='Everyone') {
		echo "Everyone";
		break;
	} else { echo $row.","; } } ?></p>
	<textarea name="message" style="background: white; border: none; outline: none; border-radius: 5px; font-family: Questrial-Regular; font-size: 20px; width: 100%; margin-top: 50px; padding-top: 5px; padding-left: 10px;" placeholder="Write Message..." rows="5"></textarea>
	<input type="hidden" name="recieptents" value="<?php echo $recieptents; ?>">
	<button class="btn" type="submit">Send</button>
	</form>
</div>

</div>
<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>