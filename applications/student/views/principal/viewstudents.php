<!DOCTYPE html>
<html>
<head>
    <title></title>
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
      padding-top: 5px;
    }
     select
      {
        background: transparent;
        color: black;
        border: 1px solid white;
        font-family: Nunito_regular;
        font-size: 16px;
        width: 80%;
         -webkit-appearance: none;
    -moz-appearance: none;
      }
      select:focus
      {
        outline: none;
      }

      #headings{
        font-family: Nunito-Semibold;
        font-size: 13px;
        color: #4F6476;
        margin: 0px;
        margin-left: 2px;
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
    <p style="color: white; font-size:20px; font-family: Nunito-Light; ">View Students</p>
  </div>
</div>
<div class="col-xs-12" style="padding-top: 20px; padding-bottom: 10px; border-bottom: 1px solid #B3B9BE;">
  <div class="col-xs-4">
    <p id="headings">CLASS</p>
    <select id="class">
      <option>Select</option>
      <?php foreach($classes as $row) { ?>
        <option value="<?php echo $row->Classname; ?>"><?php echo "Class ".$row->Classname; ?></option>
      <?php }   ?>
    </select>
    <img src="<?php echo base_url('assets/icons/down-arrow.svg'); ?>" style="height: 10px; width: 10px;">
  </div>
  <div class="col-xs-4">
   
  </div>
  <div class="col-xs-4">
    
  </div>
</div>
<div id="content">
  <p style="text-align: center; font-family: Questrial-Regular; font-size: 18px;">Select a Class First</p>
</div>

</div>
<script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript">
  $('#class').on('change',function(){
  
      var cls=$('#class option:selected').val();
     $("#content").load('<?php echo site_url('principal/displaystudents/'); ?>'+cls);
  }); 
</script>
</body>
</html>