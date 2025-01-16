<!DOCTYPE html>
<html>
<head>
	<title>Issued books</title>
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
		
		.icon
		{
			height: 20px;
			width: 20px;
			padding-top: 5px;
		}
		.return
		{
			border: none;
			outline: none;
			background: #f95555;
			width: 70%;
			border:1px solid;
			border-radius: 5px;
			color: white; 
			padding: 5px 0 5px 0;

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
		<p style="color: white; font-size:20px; font-family: Nunito-Light; ">Issued Books</p>
	</div>
</div>

<?php foreach ($books as $row) { ?>
<div class="col-xs-12" style="background:rgba(228, 228, 228, 0.6); color: #666666; font-family: RedhatR; font-size: 18px; margin-bottom: 20px; padding-bottom: 20px; " align="center">
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
	<?php if ($row->ReturnDate==NULL) { ?>
		<button class="return" onclick="ConfirmDelete(<?php echo $row->TransactionId; ?>)">Return</button>
	<?php } else { ?>
		<p style="color: #00CC00;">Returned on: <?php echo $row->ReturnDate; ?></p>
	<?php } ?>
	
</div>
<?php } ?>

</div>
<script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript">
	function ConfirmDelete(TransactionId)
		{
			var x= confirm("Are you Sure?");
			if (x)
				location.href="<?php echo site_url('librarian/returnbook/'); ?>"+TransactionId;
			else
				return false;
		}
</script>
</body>
</html>