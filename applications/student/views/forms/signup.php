<!DOCTYPE html>
<html>
<head>
    <title>Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="theme-color" content="rgba(41, 149, 191, 0.71)">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css")  ?>">
   <link rel="icon" type="image/gif" href="<?php echo base_url("assets/icons/m.png")  ?>" />
    <link href="https://fonts.googleapis.com/css?family=Oregano" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans+KR|Oswald|Thasadith|Lato" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
  <style>
      @font-face{
        font-family: CarroisCaps;
        src: url(<?php echo base_url("assets/fonts/CarroisCaps.ttf"); ?>);
    }
     @font-face
        {
            font-family: Markpro;
            src: url(<?php echo base_url("assets/fonts/Markpro.otf"); ?>);

        }
        @font-face
        {
          font-family:Markprom;
          src: url(<?php echo base_url("assets/fonts/Markprom.otf"); ?>);

        }
  </style>
<style type="text/css">
  a#navbar
  {
    color: #363636;
    font-family: CarroisCaps;
    font-size: 20px;
    text-decoration: none;
  }
  a#navbar:focus
  {
    color: rgba(41, 149, 191, 0.71);
  }
  input
  {
    width: 100%;
    border:none;
    border-bottom: 1px solid;
    border-color: #AEAEAE;
    font-family: Markpro;
    font-size: 15px;
    color: #6B6B6B;
    height: 30px;
    background:  #E8F0FE;
    padding-left: 10px;
    
    
  }
  input:focus
  {
    outline: none;
    background: #E8F0FE;
  }
  input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
input:-webkit-autofill:active {
    transition: 5000s ease-in-out 0s;
    background: #E8F0FE;
}
i
{
  color: rgba(0, 0, 0, 0.7);
  padding-bottom: 40px;
}
</style>
</head>
<body style="background: #E8F0FE;">
<div class="col-xs-12" style="margin-top: 40px;">
        <div class="col-xs-12" align="center">
           <i class="fas fa-user-graduate" style="font-size:100px"></i>
            <form name="registration" action="<?php echo site_url('home/adduser') ?>" method="POST">
          <input type="text" name="Email" id="Email" placeholder="Enter Email...">
          <input type="password" name="Password" id="pass"  placeholder="Create a Password" style="margin-top: 40px;">
          <input type="password" name="confirm"   placeholder="Confirm Password" style="margin-top: 40px;">
          <input type="number" name="class" placeholder="Enter your Class" style="margin-top: 30px;">
    <input type="number" name="roll" placeholder="Enter your Roll no." style="margin-top: 40px;">
         
          <input type="submit" value="Signup" id="submit" name="" style="font-size: 20px; background: rgba(41, 149, 191, 0.71); color: white; border-radius: 5px; padding: 5px 0 5px 0; height: 100%; margin-top: 30px;">

      </form>
          <p style="width: 100%; color:#1B1B1B; font-family:Markprom; border:1px solid; border-color:#1B1B1B; border-radius: 5px;  font-size: 16px; padding: 5px 0 5px 0; margin-top: 30px;" align="center"><a style="color:#1B1B1B;" href="<?php echo site_url('home');?>">Already Registered ? Sign in</a></p>
        </div>
        
      </div>
       
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery-validation/dist/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/form-validation.js'); ?>"></script>
</body>
</html>