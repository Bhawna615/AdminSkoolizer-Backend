<!DOCTYPE html>
<html>
<head>
	<title>Select a route</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<style type="text/css">
		@font-face{
			font-family: Nunito_regular;
			src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
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
			font-family: Rubik-Medium;
			src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
		}
		@font-face{
			font-family: Montserrat-Medium;
			src: url(<?php echo base_url("assets/fonts/Montserrat-Medium.ttf"); ?>);
		}

		
		.icon
		{
			height: 20px;
			width: 20px;
			padding-top: 5px;
		}
		select{
			border: 1px solid;
			border-color:black;
			font-family: RedhatR;
			margin: 50px 0 25px 0;
			width: 70%;
			font-size: 18px;
			outline: none;
			padding: 5px 5px 5px 5px;
			background: white;
		}
		.route
		{
			border: 0px;
			background: #2995bf;
			border-radius: 5px;
			padding: 5px;
			font-family: Nunito_regular;
			color: white;
			width: 70%;
			font-size: 20px;
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
		<p style="color: white; font-size:20px; font-family: Nunito-Light; ">Select a Route</p>
	</div>
</div>

<div class="col-xs-12" align="center" style="margin-top: 50px;">
	<img src="<?php echo base_url('assets/icons/destination.svg'); ?>" style="height: 300px; width: 300px; ">
	<form method="POST" action="<?php echo site_url('transport/showroutedetails'); ?>">
	<select name="route">
		<?php foreach($routes as $row) { ?>
			<option value="<?php echo $row->id; ?>"><?php echo $row->routename; ?></option>
		<?php }?>
	</select><br>
	<button class="route" type="submit">View Details</button>
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