<!DOCTYPE html>
<html>
<head>
    <title>Your Account</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
     <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <style type="text/css">
          @font-face{
            font-family: Markprol;
            src: url(<?php echo base_url("assets/fonts/Markprol.otf"); ?>);
        }
           @font-face{
            font-family:CIRCULARSTD-BOOK ;
            src: url(<?php echo base_url("assets/fonts/CIRCULARSTD-BOOK.otf"); ?>);
        }
        @font-face{
            font-family:ANTIPASTOPRO_TRIAL;
            src: url(<?php echo base_url("assets/fonts/ANTIPASTOPRO_TRIAL.ttf"); ?>);
        }
        @font-face{
            font-family:ANTIPASTOPRO-EXTRALIGHT_TRIAL;
            src: url(<?php echo base_url("assets/fonts/ANTIPASTOPRO-EXTRALIGHT_TRIAL.ttf"); ?>);
        }
        @font-face{
            font-family: BAHNSCHRIFT;
            src: url(<?php echo base_url("assets/fonts/ BAHNSCHRIFT.ttf"); ?>);
        }
  
      </style>
      <style type="text/css">
          p#top
          {
            font-size: 20px;
            font-family:ANTIPASTOPRO-EXTRALIGHT_TRIAL;
            border-bottom: 1px solid;
            border-color: #666666;
            color: #0D0D0D;
            padding-top: 5px;
          }
          p#bottom
          {
            font-size: 17px;
             font-family:  BAHNSCHRIFT;
              margin-bottom: 5px;
               color: #875FD4; 
          }
      </style>
</head>
<body style="background-color: #E7EAED;">
<div class="visible-xs visible-sm">
    <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); color: #FFFFFF;  padding: 8px 0 10px; 0;">
            <div class="col-xs-1" style="padding-left: 15px;">
                <i class="material-icons" onclick="goBack()" style="font-size: 25px; color: #FFFFFF;padding-top:5px; ">arrow_back</i>
            </div>
            <div class="col-xs-11" style="padding-left: 10px;">
                <p style="font-size: 25px; color: #FFFFFF; margin: 0px; padding: 0px; font-family: Markprol; "> My Account</p>
            </div>
            
            <?php foreach ($profile as $row) { ?>
            <div class="col-xs-12" style="margin-top:10px;" align="center">
                <i class='material-icons' style=" border-radius: 50%; color: white; font-size: 75px; position: relative;top: 7px;">account_circle</i> 
                <p style="font-family: CIRCULARSTD-BOOK; font-size: 25px; color: white; margin-top: 20px; "><?php echo $row->Teachername; ?>
                </p>
                <p style="font-size: 16px; font-family:CarroisGothic ; margin-top: 20px; "><?php echo $row->Contact; ?></p>
                 <p style="font-size: 17px; font-family: CarroisGothic; margin-top: 10px;"><?php echo $row->Email ?><a href="<?php echo site_url('teacher/settings/').$row->id; ?>" style="color: white;"><i class="material-icons" style="font-size: 18px; position: relative; left: 60px; top: 3px;">edit</i></a></p>
            </div>
            <?php  }  ?>
         </div>
        <div class="col-xs-12">
           <div class="col-xs-12" style="background: #F8F8F8; margin-top: 20px;">
                     <p id="top">My Account Settings</p>
                     <p align="right" id="bottom">GO TO SETTINGS</p>
                 </div> 
                 <div class="col-xs-12" style="background: #F8F8F8; margin-top: 40px;">
                     <p id="top">Today's Classes</p>
                     <p align="right" id="bottom">MANAGE CLASSES</p>
                 </div> 
                 <div class="col-xs-12" style="background: #F8F8F8; margin-top: 40px;">
                     <p id="top">Today's Attendance</p>
                     <p align="right" id="bottom">MANAGE ATTENDANCE</p>
                 </div> 
                 <div class="col-xs-12" style="background: #F8F8F8; margin-top: 40px;">
                     <p id="top">Exam Report</p>
                     <p align="right" id="bottom">DOWNLOAD EXAM REPORT</p>
                 </div> 
                 <div class="col-xs-12" style="background: #F8F8F8; margin-top: 40px; margin-bottom: 20px;">
                     <p id="top">Current Exam</p>
                     <p align="right" id="bottom">EDIT EXAM DETAILS</p>
                 </div> 
        </div>
         
</div>
 <script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>