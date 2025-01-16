<!DOCTYPE html>
<html>
<head>
	<title>Library Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
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
		.cover
		{
			width: 120px;
			height: 170px;
			padding-top: 10px;

		}
		.bookinfo
		{
			font-family: RedhatR;
			font-size: 18px;
			margin-bottom: 10px;
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
		<p style="color: white; font-size:20px; font-family: Nunito-Light; ">Library Books</p>
	</div>
</div>

	<div class="col-xs-12">
		<?php foreach($books as $row) { ?>
		<div class="col-xs-12" style="background: #e4e4e4; border-radius: 4px; margin-top: 20px;">
			<div class="col-xs-4" style="padding: 10px 0 10px 0;">
				<img src="<?php echo base_url('assets/images/books/').$row->image; ?>" class="cover">
			</div>
			<div class="col-xs-8" style="padding: 10px 0 10px 20px;">
				<p style="font-family: Rubik-Medium; font-size: 20px; "><?php echo $row->title; ?></p>
				<p  class="bookinfo">By: <?php echo $row->author; ?></p>
				<p class="bookinfo">No. of pages: <?php echo $row->pages; ?></p>
				<p class="bookinfo">Edition: <?php echo $row->edition; ?></p>
				<?php if ($row->availability==TRUE) { ?><p style="color: #00CC00; font-family: Montserrat-Medium; font-size: 18px;">Available</p>
				<?php } else {  ?><p style="color: #FF0000; font-family: Montserrat-Medium; font-size: 18px;">Not Available</p><?php } ?>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>