<!DOCTYPE html>
<html>
<head>
    <title>Passengers List</title>
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
    th
    {
      font-family: Nunito-Semibold;
      font-size: 14px;
      border: 1px  solid #EAEAEC;
      text-align: center;
      color: black;
    }
    td
    {
      font-family: Nunito_regular;
      font-size: 14px;
      border: 1px  solid #EAEAEC;
      text-align: center;
      color: black;
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
    <p style="color: white; font-size:20px; font-family: Nunito-Light; ">Passengers List</p>
  </div>
</div>
<div class="col-xs-12" style="padding-top: 30px; padding-bottom: 30px;">
  
    <table class="table table-responsive">
      <tr>
      <th>Name</th>
      <th>Station</th>
      <th>Route</th>
    </tr>
    <?php foreach($passengers as $row) { ?>
    <tr>
      <td><?php echo $row->Name; ?></td>
      <td><?php echo $row->stationname; ?></td>
      <td><?php echo $row->routename; ?></td>
    </tr>
      <?php } ?>
    </table>
</div>



</div>
<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>