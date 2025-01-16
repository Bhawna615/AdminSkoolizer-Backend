<!DOCTYPE html>
<html>
<head>
	<title>Create New Message</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
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
		@font-face{
			font-family: Questrial-Regular;
			src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
		}
		@font-face{
			font-family: Nunito-Semibold;
			src: url(<?php echo base_url("assets/fonts/Nunito-Semibold.ttf"); ?>);
		}
		@font-face{
			font-family: Rubik-Medium;
			src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
		}
		.icon
		{
			height: 20px;
			width: 20px;
			padding-top: 5px;
		}
		.btn
		{
			border: 2px solid;
			outline: none;
			background: transparent;
			font-size: 20px;
			width: 100%;
			font-family: Nunito_regular;
			color:  white;
			border-color: #fff;
			border-radius: 8px;
			margin-top: 50px;
		}
	</style>
	<style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 20px;
  color:white;
  font-family: Nunito_regular;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #fff;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 0px;
  width: 8px;
  height: 20px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
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
		<p style="color: white; font-size:20px; font-family: Nunito-Light; ">New Message</p>
	</div>
</div>


<div class="col-xs-12" style="margin-top: 30px;">
	<form method="POST" action="<?php echo site_url('Principal/writemessage') ?>">
		<label class="container">Everyone
  <input type="checkbox" name="audience[]" value="Everyone" onClick="selectall(this)">
  <span class="checkmark"></span>
</label>
<label class="container">Students
  <input type="checkbox" name="audience[]" value="Students">
  <span class="checkmark"></span>
</label>
<label class="container">Teachers
  <input type="checkbox" name="audience[]" value="Teachers">
  <span class="checkmark"></span>
</label>
<label class="container">Librarian
  <input type="checkbox" name="audience[]" value="Librarian">
  <span class="checkmark"></span>
</label>
<label class="container">Transport Staff
  <input type="checkbox" name="audience[]" value="Transport Staff">
  <span class="checkmark"></span>
</label>
<label class="container">Office Staff
  <input type="checkbox" name="audience[]" value="Office Staff">
  <span class="checkmark"></span>
</label>
<button class="btn" type="submit">Next</button>
</form>
</div>
</div>

<script type="text/javascript">
	function selectall(source) {
  checkboxes = document.getElementsByName('audience[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>