<!DOCTYPE html>
<html>
<head>
	<title>Stations</title>
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
			font-family: Nunito-Semibold;
			src: url(<?php echo base_url("assets/fonts/Nunito-Semibold.ttf"); ?>);
		}

		@font-face{
			font-family: Questrial-regular;
			src: url(<?php echo base_url("assets/fonts/Questrial-regular.ttf"); ?>);
		}


		
		.icon
		{
			height: 20px;
			width: 20px;
			padding-top: 5px;
		}
		.stations
		{
			width: 100%;
			padding-left: 20px;
		}
	</style>
</head>
<body style="background:#f2f2f2; ">
	<div class="visible-xs visible-sm">

<div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); padding-top: 10px;">
	<div class="col-xs-1" style="padding: 0px;">
		<img onclick="goBack()" src="<?php echo base_url('assets/icons/left-arrow.svg'); ?>" class="icon">
	</div>
	<div class="col-xs-11" style="padding: 0px;">
		<p style="color: white; font-size:20px; font-family: Nunito-Light; ">Stations</p>
	</div>
</div>
<div class="col-xs-12">
	<?php foreach($stations as $row) { ?>
		<div class="col-xs-12" style="background: #ffffff; border-radius: 4px; margin-top: 40px; padding-top: 10px; border: 1px solid; border-color: rgba(134, 134, 134, 0.17);" align="center">
			<p style="font-family: Nunito-Semibold; font-size: 20px; text-transform: uppercase; color: #000000; width: 100%; text-align: center; "><?php echo $row->stationname; ?></p>
			<div class="col-xs-6" align="left">
				<?php foreach($passengers as $key) { if ($key->Stationid==$row->id) { ?>
	<p style="font-family: Questrial-Regular; font-size: 18px; color: #000;"><?php echo $key->Name; ?></p>
	<?php } } ?>
			</div>
			<div class="col-xs-6" align="right">
				<?php foreach($passengers as $key) { if ($key->Stationid==$row->id) { ?>
	<button value="<?php echo $key->id; ?>" style="font-family: RedhatR; font-size: 16px; color: #fff; background: #5789D6; border: 0px; border-radius: 2px; margin-bottom: 15px; outline: none; padding: 0 10px 0 10px;">
		<?php if ($key->Presence) { echo "Check-Out"; } else { echo "Check-In";} ?></button>
	<br>
	<?php } } ?>
			</div>
	</div>
<?php } ?>
	<div class="col-xs-12" style="margin-top: 30px;">
		<input type="button" onclick="ConfirmDelete()" style="font-family: Rubik-Medium; font-size: 20px; color: #fff; background: rgba(41, 149, 191, 0.9); border: 0px; border-radius: 2px; margin-bottom: 15px; outline: none; padding: 5px 0 5px 0; width: 100%;"value="End Route">
	</div>
</div>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('button').click(function(){
			var passengerid=$(this).val();
			$btn=$(this);
			$.ajax({
				url: "<?php echo site_url('transport/changepresence/') ?>"+passengerid,
				success:function(data)
				{
					if (data==true) {
						$btn.html("Check-Out");
					}
					else
					{
						$btn.html("Check-In");
					}
				}
			});
		});
	});

		function ConfirmDelete()
		{
			var x= confirm("Are you Sure?");
			if (x)
				location.href="<?php echo site_url('transport/endroute'); ?>";
			else
				return false;
		}

</script>
</body>
</html>