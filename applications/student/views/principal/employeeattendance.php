<!DOCTYPE html>
<html>
<head>
	<title>Employee Attendance</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
           <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/js/jqueryui/jquery-ui.css"); ?>">
     <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
     <script type="text/javascript" src="<?php echo base_url("assets/js/jqueryui/jquery-ui.js"); ?>"></script>
   <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
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
      font-family: Nunito-Semibold;
      src: url(<?php echo base_url("assets/fonts/Nunito-Semibold.ttf"); ?>);
    }
    @font-face{
      font-family: Questrial-Regular;
      src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
    }
    @font-face{
      font-family: Rubik-Medium;
      src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
    }
    @font-face{
      font-family: Rubik;
      src: url(<?php echo base_url("assets/fonts/Rubik-Regular.ttf"); ?>);
    }
		.icon
		{
			height: 20px;
			width: 20px;
			padding-top: 5px;
		}
		 input#datepicker
      {
        background: white;
        color: black;
        border: 1px solid black;
        font-size: 15px;
        width: 80%;
        padding: 2px 0 0 5px;
        
      }
	</style>
</head>
<body style=" ">
	<div class="visible-xs visible-sm">

<div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); padding-top: 10px;">
	<div class="col-xs-1" style="padding: 0px;">
		<img onclick="goBack()" src="<?php echo base_url('assets/icons/left-arrow.svg'); ?>" class="icon">
	</div>
	<div class="col-xs-11" style="padding: 0px;">
		<p style="color: white; font-size:20px; font-family: Nunito-Light; ">Employee Attendance</p>
	</div>
</div>

<div class="col-xs-12" style="padding-top: 20px;">
  <div class="col-xs-4">
    <p id="headings">DATE</p>
    <input type="text" id="datepicker" name="">
    <img src="<?php echo base_url('assets/icons/down-arrow.svg'); ?>" style="height: 10px; width: 10px;">
  </div>
</div>

<div class="col-xs-12" style="margin-top: 30px;">
  <div id="content">
    <p style="font-family: Questrial-Regular; text-align: center;font-size: 18px;">Select a Date</p>
  </div>
</div>
		
	</div>

<script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript">
$('#datepicker').on('change',function(){
  
      var date=$('#datepicker').val();
     $("#content").load('<?php echo site_url('principal/empattendancebydate/'); ?>'+date);
  });  
</script>
</body>
</html>