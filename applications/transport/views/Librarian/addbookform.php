<!DOCTYPE html>
<html>
<head>
	<title>Add a Book</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
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
			font-family: Questrial-regular;
			src: url(<?php echo base_url("assets/fonts/Questrial-regular.ttf"); ?>);
		}

		
		.icon
		{
			height: 20px;
			width: 20px;
			margin-right: 10px;
		}
		input{

			border: 1px solid;
			border-color: #666666;
			font-family: RedhatR;
			margin: 0px 0 25px 0;
			width: 100%;
			font-size: 18px;
			outline: none;
			height: 40px;
			text-align: right;
		}
		p#input
		{
			font-family: Questrial-regular;
			font-size: 18px;
			margin: 0px; 
			color: #7686D1;
			margin-top: 20px;

		}

		input[type=file]
		{
			display: none;

		}

		.file-upload
		{
			border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
    font-size: 18px;
     font-family: RedhatR; 
     color: #7686D1;
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
		<p style="color: white; font-size:20px; font-family: Nunito-Light; ">Add a Book</p>
	</div>
</div>
<div class="col-xs-12">
	<form method="POST" action="<?php echo site_url('librarian/addbook'); ?>" enctype="multipart/form-data"> 
	<p id="input" style="margin-bottom: 0px; margin-top: 20px;">Title</p>
	<input type="text" name="title">
	<p id="input">Author</p>
	<input type="text" name="author">
	<p id="input">No. of Units</p>
	<input type="number" name="units">
	<p id="input">I.S.B.N</p>
	<input type="text" name="isbn">
	<p id="input">Publisher</p>
	<input type="text" name="publisher">
	<p id="input">No. of Pages</p>
	<input type="number" name="pages">
	<p id="input">Edition</p>
	<input type="number" name="edition">
	<p id="input">Description</p>
	<input type="text" name="Description" placeholder="optional" >
	<label class="file-upload"><img src="<?php echo base_url('assets/icons/plus.svg') ?>" class="icon"><input type="file" name="img">Add Cover Photo</label>
		

	<button style="font-family: RedhatR; font-size: 20px; background: rgba(39, 74, 229, 0.9); color: white; width: 100%; border:none; padding: 5px 0 5px 0; margin-bottom: 20px; margin-top: 20px;" type="submit">Add book</button>
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