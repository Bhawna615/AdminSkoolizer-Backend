<!DOCTYPE html>
<html>
<head>
    <title>Change Image</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
   
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
<body style="background: #fff;">
   <div class="visible-xs visible-sm">
         <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); padding-top: 10px;">
  <div class="col-xs-1" style="padding: 0px;">
    <img onclick="goBack()" src="<?php echo base_url('assets/icons/left-arrow.svg'); ?>" class="icon">
  </div>
  <div class="col-xs-11" style="padding: 0px;">
    <p style="color: white; font-size:20px; font-family: Nunito-Light; ">Change Image</p>
  </div>
</div>
<div class="col-xs-12" align="center" style="padding-top: 150px; padding-bottom: 150px; border: 5px dashed #2995bf; border-radius: 5px; margin-top: 20px; ">
  <form method="POST" action="<?php echo site_url('librarian/uploadimage') ?>" enctype="multipart/form-data">
  <label class="file-upload"><img src="<?php echo base_url('assets/icons/plus.svg') ?>" class="icon"><input type="file" name="img"> Choose Image</label><br>
  <button type="submit" style="border: 2px solid #2995bf; background: transparent; outline: none; color: #2995bf; border-radius: 5px; font-family: Nunito_regular; padding: 5px; width: 50%; margin-top: 20px; font-size: 18px;">UPLOAD</button>
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