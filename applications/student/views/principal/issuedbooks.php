<!DOCTYPE html>
<html>
<head>
	<title>Library Transactions</title>
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
		.null
		{
			font-family: RedhatR;
			font-size: 20px;
			color: white;
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
		<p style="color: white; font-size:20px; font-family: Nunito-Light; ">Library Transactions</p>
	</div>
</div>

<?php if ($books==NULL) { ?>
	<div class="col-xs-12" align="center" style="padding-top: 100px;">
		<p class="null">No Transactions to show</p>
	</div>
 <?php } ?>
<?php foreach ($books as $row) { ?>
<div class="col-xs-12" style="background:rgba(228, 228, 228, 0.6); color: #666666; font-family: RedhatR; font-size: 18px; margin-bottom: 20px; ">
	<p align="center" style="font-family: Rubik-Medium;"><?php echo $row->TransactionId.". ".$row->Title; ?></p>
	<div class="col-xs-6" align="left">
		<p>Issued To</p>
		<p>Class</p>
		<p>Borrower Id</p>
		<p>From : <?php echo $row->IssueDate; ?></p>
	</div>
	<div class="col-xs-6">
		<p><?php echo $row->Name; ?></p>
		<p><?php echo $row->Class; ?></p>
		<p><?php echo $row->BorrowerId; ?></p>
		<p>To: <?php echo $row->DueDate; ?></p>
	</div>
	
</div>
<?php } ?>

</div>
<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>