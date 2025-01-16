<!DOCTYPE html>
<html>
<head>
	<title>Fee Pending List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
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
		.icon
		{
			height: 20px;
			width: 20px;
			padding-top: 5px;
		}
		th
		{
			border: 1px solid; border-color: white;
		}
		td
		{

			border: 1px solid; border-color:#C5C5C5;
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
		<p style="color: white; font-size:20px; font-family: Nunito-Light; ">Fee Pending List</p>
	</div>
</div>

<div class="col-xs-12" style="padding-top: 30px;">
	<table class="table table-responsive">
		<tr style="background: #f95555; color: white; font-family: RedhatR;">
			<th>R.No.</th>
			<th>NAME</th>
			<th>CLASS</th>
			<th>STATUS</th>
		</tr>
		<?php foreach($students as $row)  { ?>
		<tr style="background: white; font-family: RedhatR; color: black; font-size: 15px;">
			<td><?php echo $row->Rollno; ?></td>
				<td><?php echo $row->Name; ?></td>
				<td><?php echo $row->Class; ?></td>
				<td style="color: #FF0000;"><?php if($row->Feepending==true){ echo "Pending";} ?></td>
		</tr>
	<?php } ?>
	</table>
</div>


</div>

<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>