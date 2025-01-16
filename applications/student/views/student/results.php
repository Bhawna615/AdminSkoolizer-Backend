<!DOCTYPE html>
<html>
<head>
    <title>Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
   
     <style type="text/css">
     select
      {
        background: transparent;
        color: black;
        border: 1px solid white;
        font-family: Nunito_regular;
        font-size: 16px;
        width: auto;
         -webkit-appearance: none;
    -moz-appearance: none;
      }
      select:focus
      {
        outline: none;
      }
  
      </style>
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
    <p style="color: white; font-size:20px; font-family: Nunito-Light; ">Results</p>
  </div>
</div>
              <div class="col-xs-12" style="margin-top: 20px; border-bottom: 1px solid; border-color: #B3B9BE; padding-bottom: 10px;">
                <p style="margin-bottom: 0px; font-family: Nunito-Semibold; color: #4F6476; font-size: 13px;   ">SUBJECT</p>
                <select id="code">
                  <option>Select</option>
                  <?php foreach ($exam as $row) { ?>
                    <option name="<?php echo $row->Date; ?>" id="<?php echo $row->Maxmarks; ?>" value="<?php echo $row->Subject; ?>"><?php echo $row->Subject; ?></option>
               <?php   } ?>

               </select><img src="<?php echo base_url('assets/icons/down-arrow.svg'); ?>" style="height: 10px; width: 10px;">
              </div>
         <div id="content">

             </div>
          </div>

<script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript">
  $('#code').on('change',function(){
    var cls='<?php echo $class; ?>';
    var rollno='<?php echo $rollno; ?>'
      var subjectname=$('#code option:selected').val();
      var max=$('#code option:selected').attr('id');
      var date=$('#code option:selected').attr('name');
      var ename=$('#code option:selected').text();
      $("#content").load('<?php echo site_url('student/displayresult/'); ?>'+subjectname+'/'+cls+'/'+rollno);
      $('p#max').html("Max Marks: "+max);
      $('p#ename').html(ename);
      $('p#date').html("on "+date);
  });
  
</script>
    </body>
    </html>