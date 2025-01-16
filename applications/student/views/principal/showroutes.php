<!DOCTYPE html>
<html>
<head>
  <title>Buses Routes</title>
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

  </style>
</head>
<body style="background:rgba(41, 149, 191, 0.6); ">
  <div class="visible-xs visible-sm">

<div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); padding-top: 10px;">
  <div class="col-xs-1" style="padding: 0px;">
    <img onclick="goBack()" src="<?php echo base_url('assets/icons/left-arrow.svg'); ?>" class="icon">
  </div>
  <div class="col-xs-11" style="padding: 0px;">
    <p style="color: white; font-size:20px; font-family: Nunito-Light; ">Bus Routes</p>
  </div>
</div>
<div class="col-xs-12" style="padding-bottom: 100px;">
<?php foreach($routes as $row) { ?>
<div class="col-xs-12" style="border-radius: 10px; background: #ffffff;margin-top: 50px; border: 1px solid; padding: 0px; border-color: rgba(134, 134, 134, 0.17); " align="
    center">
    <p style="color: white; background: #5789D6; font-family: Questrial-regular; font-size: 20px; border: 1px; border-color: white; padding: 5px 0 5px 0; border-radius: 6px;"><?php echo $row->routename; ?></p>
    <div class="col-xs-6" style="padding: 0px; border-bottom: 1px solid; border-right: 1px solid; border-color: rgba(134, 134, 134, 0.17); padding-top: 10px;" align="center">
      <p style="font-family: Questrial-regular; font-size: 18px;">FROM</p>
    <P style=" font-family: Rubik-Medium; font-size: 20px;"><?php echo $row->Firststation; ?></P>
    </div>
    <div class="col-xs-6" style="border-bottom: 1px solid; border-color:rgba(134, 134, 134, 0.17); padding-top: 10px;" align="center">
      <p style=" font-family: Questrial-regular; font-size: 18px;">TO</p>
    <p style=" font-family: Rubik-Medium; font-size: 20px;"><?php echo $row->Laststation; ?></p>
    </div>
    <div class="col-xs-6" style="border-right: 1px solid; border-color:rgba(134, 134, 134, 0.17); padding-top: 10px; " align="center">
      <p style=" font-family: Questrial-regular; font-size: 18px;">DEPARTURE</p>
    <P style=" font-family: Rubik-Medium; font-size: 18px;"><?php echo $row->Departuretime; ?></P>
    </div>
    <div class="col-xs-6" style="padding-top: 10px;" align="center">
      <P style=" font-family: Questrial-regular;font-size: 18px;">ARRIVAL</P>
    <p style=" font-family: Rubik-Medium; font-size: 18px;"><?php echo $row->Arrivaltime; ?></p>
    </div>
    <button style="color: white; font-size: 20px; background-color: #5789D6; font-family: Nunito_regular; padding: 5px 0 5px 0; border-radius: 15px; width: 60%; border: none; position: relative; top: 19px;"><?php echo $row->subroutename; ?></button>
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