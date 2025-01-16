<!DOCTYPE html>
<html>
<head>
    <title>Upcoming Exams</title>
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
<body style="background: white;">
    

    <div class="visible-xs visible-sm">
       <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); padding-top: 10px;">
  <div class="col-xs-1" style="padding: 0px;">
    <img onclick="goBack()" src="<?php echo base_url('assets/icons/left-arrow.svg'); ?>" class="icon">
  </div>
  <div class="col-xs-11" style="padding: 0px;">
    <p style="color: white; font-size:20px; font-family: Nunito-Light; ">Upcoming Exams</p>
  </div>
</div>

<div class="col-xs-12" style="padding-bottom: 30px;">

           <?php
           if ($exam!=FALSE) 
           {
foreach ($exam as $row)
{
  ?>
          <div class="col-xs-12" style="border: 1px solid; border-radius: 4px; border-color: #B3B9BE; background: #5789D6; padding: 0px; margin-top: 30px;">
            <div class="col-xs-4" style="padding: 0px; padding-top: 40px;" align="center">
              <p style="color: white; font-family: Nunito-Semibold;font-size: 18px; padding: 0px;"><?php echo $row->Subject; ?></p>
            </div>
            <div class="col-xs-8" style="background: #fff; padding: 10px; font-size: 16px; " >
              <p style="font-family: Rubik-Medium;"><?php echo $row->Examtype; ?><span style="float: right;">Max Marks : <?php echo $row->Maxmarks; ?></span></p>
              <p  style="font-family: Questrial-Regular;"><?php echo $row->Examname; ?></p>
              <p style="font-family: Questrial-Regular; margin: 0px;"><?php $date=date('D, d M',strtotime($row->Date)); echo $date; ?></p>
            </div>
            
          </div>
            
                  <?php
                }
           }
           else{
            echo "<p align='center'>Not yet announced. Check back Later.</p>";
           }
      ?>
     
</div>
          </div>
      


<script>
function goBack() {
    window.history.back();
}
</script>
    </body>
    </html>