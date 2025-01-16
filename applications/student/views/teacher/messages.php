<!DOCTYPE html>
<html>
<head>
  <title>Messages</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
      width: 70%;
      font-family: Nunito_regular;
      color:  white;
      border-color: #fff;
      border-radius: 8px;
      margin-top: 50px;
    }
    .msgicon
    {
      height: 50px;
      width: 50px;
    }
  </style>
  <style type="text/css">
    *{padding:0;margin:0;}
.float{
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#0099FF;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  box-shadow: 2px 2px 3px #999;
}

.my-float{
  margin-top:22px;
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
    <p style="color: white; font-size:20px; font-family: Nunito-Light; ">Messages</p>
  </div>
</div>
<?php if ($messages!=NULL) { ?>
<div class="col-xs-12" style="background: #ffffff; border-radius:16px; padding-top: 20px; margin-top: 20px; ">
  <?php foreach($messages as $row) { ?>
    <div class="col-xs-12" style="margin-bottom: 20px;">
      <div class="col-xs-2" style="padding: 0px; padding-top: 10px;">
          <img src="<?php echo base_url('assets/icons/principal.svg'); ?>" class="msgicon">
        
    
      </div>
    <div class="col-xs-10" style="border-bottom: 1px solid; border-color: #515151;">
      <p style="text-transform: uppercase; font-family: Nunito-Semibold; font-size: 20px;">From: Principal<span style="float: right; font-size: 10px;"><?php 
      $timestamp=strtotime($row->Timestamp); $date=date('d M'); if ($date==date('d M',$timestamp)) {
        echo date('h:i a',$timestamp);
      } else{
        echo date('d M',$timestamp);
      }  ?></span></p>
      <p style="font-family: Questrial-Regular; color: #000000;"><?php echo $row->message; ?></p>
    </div>
    </div>
  
  <?php } ?>
</div>
<?php } else { ?>

  <div class="col-xs-12" align="center" style="padding-top: 80px;">
    <p style="font-family: Questrial-Regular; font-size: 16px; color: white;">No Messages. Your messages Appear here.</p>
    <img src="<?php echo base_url('assets/icons/newmessage.svg'); ?>" style="height: 200px; width:200px;">
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