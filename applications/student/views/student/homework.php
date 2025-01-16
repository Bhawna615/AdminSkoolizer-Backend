<!DOCTYPE html>
<html>
<head>
    <title>Homework</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('assets/js/jqueryui/jquery-ui.min.js') ?>"></script>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/jqueryui/jquery-ui.min.css') ?>">
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
     <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
  } );
  </script>

    <style type="text/css">
       select
      {
        background: rgba(41, 149, 191, 0.9);
        color: white;
        border: 1px solid white;
        font-family: CarroisCaps;
        font-size: 15px;
        width: 25%;
        padding: 5px 2px 5px 2px;
      }
      select:focus
      {
        outline: none;
      }
        input#datepicker
      {
        background: white;
        color: black;
        border: 1px solid black;
        font-family: bahnschrift;
        font-size: 15px;
        width: 25%;
        padding: 2px 0 0 5px;
        
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
    <p style="color: white; font-size:20px; font-family: Nunito-Light; ">Homework</p>
  </div>
</div>
         <div class="col-xs-12" style="margin-top: 20PX;">
           <p style="font-family:Nunito_regular; ">Date</p>
           <input type="text" id="datepicker" name="" value="<?php echo date('Y-m-d'); ?>">
         </div>
         <div class="col-xs-12" style="padding-top: 30px;">
<div id="content">
    
  </div>
  

                
    </div>
</div>  



<script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript">
  $(document).ready(function(){ 
   var cls='<?php echo $class; ?>';
  var curdate='<?php echo date('Y-m-d'); ?>';
  $("#content").load('<?php echo site_url('student/viewhwbydate/'); ?>'+curdate+'/'+cls);
  $('#datepicker').on('change',function(){
      var date=$('#datepicker').val();
      $("#content").load('<?php echo site_url('student/viewhwbydate/'); ?>'+date+'/'+cls);
    
  });
  })
  
</script>
</body>
</html>