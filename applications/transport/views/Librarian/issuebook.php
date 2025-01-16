<!DOCTYPE html>
<html>
<head>
	<title>Issue a book</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
		<p style="color: white; font-size:20px; font-family: Nunito-Light; ">Issue Book</p>
	</div>
</div>
<div class="col-xs-12" style="margin-top: 50px;">
	<div class="col-xs-12" style="border: 1px solid; border-color: #666666; border-radius: 4px;  padding-bottom: 25px;" align="center">
		<p style="background: white; font-family: Rubik-medium ; font-size: 23px; position: relative; bottom: 18px; width: 60%; padding: 0px; ">Book Details</p>
		<form id="borrower" name="issue" method="POST" action="<?php echo site_url('Librarian/issue'); ?>">	
	<input type="text" name="title" id="title" placeholder="Book Title">
	<input type="text" name="accno" id="accno" placeholder="Acc. No.">
	<input type="text" name="isbn" id="isbn" placeholder="I.S.B.N No.">

	
</div>
<div class="col-xs-12" style="border: 1px solid; border-color: #666666; border-radius: 4px;  padding-bottom: 25px; margin-top: 50px; margin-bottom: 50px;" align="center">
	<p style="background: white; font-family: Rubik-Medium ; font-size: 23px; position: relative; bottom: 18px; width: 60%; padding: 0px; ">To</p>
	<input type="number" name="" placeholder="Class" id="class">
	<input type="number" name="" placeholder="Roll no." id="roll">
	<button style="border: none; color: white; font-family: RedhatR ; background: rgba(41, 149, 191, 0.7); width: 90%; border-radius: 4px; font-size: 20px; padding-top: 5px;padding-bottom: 5px; outline: none; " id="btn" type="button">Get Borrower Id</button>
	<div id="content">
		
	</div>
	<input type="hidden" name="bid" id="bid">
	
</div>
<button style="border: none; color: white; font-family: RedhatR ; background: rgb(41, 149, 191); width: 100%; border-radius: 4px; font-size: 20px; padding-top: 5px;padding-bottom: 5px; margin: 20px 0 20px 0; outline: none; " type="submit" id="submitbtn">Issue book</button>
</form>
</div>

</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btn').click(function(){
			var cls=$('#class').val();
			var roll=$('#roll').val();
			$('#content').load('<?php echo site_url('Librarian/searchstudent/') ?>'+cls+'/'+roll);
			
		});
		$('#borrower').submit(function(e){
			var title=$('#title').val();
			if (title=='') { alert('Enter title first'); e.preventDefault();}
			var accno=$('#accno').val();
			if (accno=='') { alert('Enter Accession No. first'); e.preventDefault();}
			var isbn=$('#isbn').val();
			if (isbn==''){ alert('Enter ISBN first'); e.preventDefault();} 
			var bid=$('#borrowerid').val();
			if (bid==undefined) { alert('Enter Borrower Id First'); e.preventDefault();}
			 $('#bid').val(bid); 
		});
	});


</script>
<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>