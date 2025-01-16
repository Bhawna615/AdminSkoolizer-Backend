<!DOCTYPE html>
<html>
<head>
	<title>Search Student</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<style type="text/css">
		@font-face{
			font-family: Nunito-Light;
			src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
		}
		@font-face{
			font-family: RedhatR;
			src: url(<?php echo base_url("assets/fonts/RedhatR.ttf"); ?>);
		}
		@font-face{
			font-family: Rubik-Medium;
			src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
		}
		@font-face{
			font-family: Montserrat-Medium;
			src: url(<?php echo base_url("assets/fonts/Montserrat-Medium.ttf"); ?>);
		}
		@font-face{
			font-family: Nunito_regular;
			src: url(<?php echo base_url("assets/fonts/Nunito_regular.ttf"); ?>);
		}

		
		.icon
		{
			height: 20px;
			width: 20px;
			padding-top: 5px;
		}
		input{
			border: none;
			border-bottom: 1px solid;
			border-color: rgba(0, 0, 0, 0.52);
			font-family: RedhatR;
			margin: 25px 0 25px 0;
			width: 90%;
			font-size: 18px;
			outline: none;
		}
	</style>
</head>
<body style="background:#ffffff; ">
	<div class="visible-xs visible-sm">

<div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); padding-top: 10px;">
	<div class="col-xs-1" style="padding: 0px;">
		<img onclick="goBack()" src="<?php echo base_url('assets/icons/left-arrow.svg'); ?>" class="icon">
	</div>
	<div class="col-xs-11" style="padding: 0px;">
		<p style="color: white; font-size:20px; font-family: Nunito-Light; ">Search Student</p>
	</div>
</div>
<div class="col-xs-12" align="center">
	<input type="number" name="" id="class" placeholder="Class">
	<input type="number" name="" id="roll" placeholder="Roll No.">
	<button style="border: none; color: white; font-family: RedhatR ; background: rgb(41, 149, 191); width: 90%; border-radius: 4px; font-size: 20px; padding-top: 5px;padding-bottom: 5px; margin: 20px 0 20px 0; outline: none; " type="button" id="btn">Search</button>
</div>
<div id="content" align="center">
	
</div>
<div id="issuedbook">
	
</div>
</div>

<script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btn').click(function(){
		var cls=$('#class').val();
		var roll=$('#roll').val();
		$('#content').load('<?php echo site_url('Librarian/searchstudent/') ?>'+cls+'/'+roll);
		$('#issuedbook').load('<?php echo site_url('Librarian/searchborrower/'); ?>'+cls+'/'+roll);
	});
	});
	</script>
</html>