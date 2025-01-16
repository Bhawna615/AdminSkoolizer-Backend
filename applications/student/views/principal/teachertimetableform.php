<!DOCTYPE html>
<html>
<head>
	<title>Select Teacher</title>
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
		.icon
		{
			height: 20px;
			width: 20px;
			padding-top: 5px;
		}
		select{
			background: #A5D3E4;
			outline: none;
			border: none;
			font-family: Nunito-Light;
			font-size: 20px;
			width: 100%;
			margin-top: 50px;
			border-bottom: 1px solid;
			border-color: #1b1b1b;
			color: #515151;
		}
		button{
			border: none;
			width: 100%;
			background: #f95555;
			color: white;
			font-family: RedhatR;
			margin-top: 70px;
			font-size: 20px;
			border-radius: 4px;
			padding-top: 5px;
			padding-bottom: 5px;
		}
		select option{
			outline: none;
			border: none;
			font-size: 15px;
		}
	</style>
</head>
<body style="background:#A5D3E4; ">
	<div class="visible-xs visible-sm">
<div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); padding-top: 10px;">
	<div class="col-xs-1" style="padding: 0px;">
		<img onclick="goBack()" src="<?php echo base_url('assets/icons/left-arrow.svg'); ?>" class="icon">
	</div>
	<div class="col-xs-11" style="padding: 0px;">
		<p style="color: white; font-size:20px; font-family: Nunito-Light; ">Select Teacher</p>
	</div>
</div>

<div class="col-xs-12">
	<form method="POST" action="<?php echo site_url('principal/showtt'); ?>">
	<select name="teacher">
		<option selected="selected">Select Teacher...</option>
		<?php foreach($teachers as $row) { ?>
			<option value="<?php echo $row->id; ?>"><?php echo $row->Teachername; ?></option>
		<?php } ?>
	</select>
	<select name="day">
		<option selected="selected"><?php echo date('l'); ?></option>
		<option value="Monday">Monday</option>
		<option value="Tuesday">Tuesday</option>
		<option value="Wednesday">Wednesday</option>
		<option value="Thursday">Thursday</option>
		<option value="Friday">Friday</option>
		<option value="Saturday">Saturday</option>
	</select>

	<button type="submit">Next</button>
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