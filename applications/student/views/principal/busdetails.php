<!DOCTYPE html>
<html>
<head>
  <title>Bus & Driver Details</title>
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
  
    .icon
    {
      height: 20px;
      width: 20px;
      padding-top: 5px;
    }
    .details
    {
      font-family: Questrial-Regular;
      font-size: 15px;
      color: black;
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
    <p style="color: white; font-size:20px; font-family: Nunito-Light; ">Bus & Driver Details</p>
  </div>
</div>
<div class="col-xs-12" style="padding-top: 30px;">
  <?php foreach($details as $row) { ?>
  <div class="col-xs-12" style="background: white; border-radius: 8px; padding-top: 20px;">
    <p style="text-align: center; font-family: Rubik-Medium; font-size: 18px;"><?php echo $row->drivername; ?></p>

      <p class="details">Contact No.<span style="float: right;"><?php echo $row->Contact; ?></span></p>
      <p class="details">Address<span style="float: right;"><?php echo $row->Address; ?></span></p>
      <p class="details">Vehicle Reg No.<span style="float: right;"><?php echo $row->VehicleRegNo; ?></span></p>
  
  
   
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