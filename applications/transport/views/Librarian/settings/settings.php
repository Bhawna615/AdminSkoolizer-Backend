<!DOCTYPE html>
<html>
<head>
    <title>Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
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

    #headings
    {
      font-family: Rubik;
      font-size: 14px;
      color: rgba(0,0,0,0.70);
    }
    input[type=text]
        {
          border: 0px;
          border-bottom: 1px solid;
          border-color: #666666;
          background: #fff;
          width: 100%;
          font-size: 16px;
          font-family: Rubik;
        }
        input:focus
        {
          outline: none;
        }
        #values
        {
          border: 0px;
          border-bottom: 1px solid;
          border-color: #666666;
          background: #fff;
          width: 100%;
          font-size: 18px;
          font-family: Questrial-Regular;
        }
  </style>
</head>
<body style="background: white;">
   <div class="visible-xs visible-sm">
         <div class="col-xs-12" style="background: rgba(41, 149, 191); padding-top: 10px; padding-bottom: 30px;">
  <div class="col-xs-1" style="padding: 0px;">
    <img onclick="goBack()" src="<?php echo base_url('assets/icons/left-arrow.svg'); ?>" class="icon">
  </div>
  <div class="col-xs-11" style="padding: 0px;">
    <p style="color: white; font-size:20px; font-family: Nunito-Light; ">Settings</p>
  </div>
  <div class="col-xs-12" align="center" style="padding-top: 30px;">
     <?php  foreach ($settings as $row) { $image=$row->image; } ?>
                <?php if ($image!=NULL) { ?>
                   <img src="<?php  echo base_url('assets/images/librarian/').$row->image; ?>"  style="font-size: 60px;  border-radius: 50%; color: white; width: 150px; height: 150px; position: relative;top: 7px;">
                <?php } else { ?>
                    <i class='material-icons' style='color: white; font-size: 150px;  position: relative;top: 7px;'>account_circle</i>
                <?php } ?>  
                <br> 
  <button onclick="location.href='<?php echo site_url('librarian/changeimage') ?>'" style="border: 2px solid white; background: transparent; outline: none; color: white; border-radius: 5px; font-family: Nunito_regular; padding: 5px; width: 50%; margin-top: 20px; font-size: 18px;"> Edit </button>
  </div>
</div>
<div class="col-xs-12" style="margin-top:20px;">
            <div class="col-xs-12" style="padding: 0 2px 0 2px;">
              <form>
                <?php foreach($settings as $row) { ?>
                <p id="headings">FULL NAME</p> 
                <input type="text" name="Fname" value="<?php echo $row->Name; ?> ">
              </form>
                <p id="headings" style="margin-top: 50px">PHONE NUMBER</p>
                <p id="values"><?php echo $row->Contact; ?></p>  
                <p id="headings" style="margin-top: 30px">Email ID</p>
                <p id="values"><?php echo $row->Email; ?></p>    
                <?php } ?>    
            </div>
          </div>
           <div class="col-xs-12" style="border-top: 1px solid; border-bottom: 1px solid; margin-top: 20px; margin-bottom: 20px; border-color: #A1A1A1;">
   <a href="<?php echo site_url('librarian/changepassword'); ?>" style="color:#875FD4; "><p style="font-size: 16px; padding-top: 0px; margin-bottom: 0px; color:#875FD4; font-family:Nunito_regular; padding:5px 0 5px 0 ; background: #f1f1f1; ">Change Password</p></a>
 </div>

</div>
 <script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>