<!DOCTYPE html>
<html>
<head>
    <title>My Bus</title>
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
      .headings
    {
      font-family: Rubik;
      font-size: 14px;
      color: rgba(0,0,0,0.70);
    }
    .values
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
         <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); padding-top: 10px;">
  <div class="col-xs-1" style="padding: 0px;">
    <img onclick="goBack()" src="<?php echo base_url('assets/icons/left-arrow.svg'); ?>" class="icon">
  </div>
  <div class="col-xs-11" style="padding: 0px;">
    <p style="color: white; font-size:20px; font-family: Nunito-Light; ">My Bus</p>
  </div>
</div>
<div class="col-xs-12" style="padding-top: 30px; padding-bottom: 30px; ">
  <?php foreach($bus as $row) { ?>
    <div class="col-xs-12" style="border: 1px solid; margin-bottom: 30px; padding: 30px;">
        <p class="headings">Bus Name</p>
        <p class="values"><?php echo $row->busname; ?></p>
        <p class="headings">Bus Model</p>
        <p class="values"><?php echo $row->model; ?></p>
        <p class="headings">Registration No.</p>
        <p class="values"><?php echo $row->regno; ?></p>
        <p class="headings">No. of Seats</p>
        <p class="values"><?php echo $row->seats; ?></p>
        <p class="headings">Fuel Tank Capacity</p>
        <p class="values"><?php echo $row->fueltankcapacity; ?></p>
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