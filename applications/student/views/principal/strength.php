<!DOCTYPE html>
<html>
<head>
  <title>School Strength</title>
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
    .icon
    {
      height: 20px;
      width: 20px;
      padding-top: 5px;
    }
    tr
    {
      background: white;
    }
    th
    {
      font-family: Nunito-Semibold;
      font-size: 17px;
      color: black;
      text-align: center;
      border: 1px solid;
      border-color: #C5C5C5;
    }
    td
    {
      font-family: Nunito_regular;
      font-size: 15px;
      text-align: center;
      border: 1px solid;
      border-color: #C5C5C5;
    }
  </style>
</head>
<body style="background:rgba(41, 149, 191, 0.6); ">
  <div class="visible-xs visible-sm">

<div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); padding-top: 10px;">
  <div class="col-xs-1" style="padding: 0px;">
    <img onclick="goBack()" src="<?php echo base_url('assets/icons/left-arrow.svg'); ?>" class="icon">
  </div>
  <div class="col-xs-11" style="padding: 0px;">
    <p style="color: white; font-size:20px; font-family: Nunito-Light; ">School Strength</p>
  </div>
</div>
<div class="col-xs-12" align="center" style="padding-top: 20px;">
  <p style="font-family: Rubik; font-size: 20px; color: white;">Class Wise List for session 2019-20</p>
</div>
<table class="table table-responsive">
  <tr>
    <th>Class</th>
    <th>Strength</th>
    </tr>
  <?php foreach($strength as $row) { ?>
    <tr>
    <td><?php echo "Class ".$row->Classname; ?></td>
    <td><?php echo $row->Strength; ?></td>
    </tr>
  <?php } ?>
</table>
<div class="col-xs-12" align="center">
  <p style="font-family: Rubik; font-size: 20px; color: white;">Teachers List for session 2019-20</p>
</div>

<table class="table table-responsive">
  <tr>
    <th>Name</th>
    <th>Post</th>
    </tr>
  <?php foreach($teachers as $row) { ?>
    <tr>
    <td><?php echo $row->Teachername; ?></td>
    <td><?php echo $row->Post; ?></td>
    </tr>
  <?php } ?>
</table>

<div class="col-xs-12" align="center">
  <p style="font-family: Rubik; font-size: 20px; color: white;">Staff List for session 2019-20</p>
</div>

<table class="table table-responsive">
  <tr>
    <th>Name</th>
    <th>Post</th>
    </tr>
  <?php foreach($transportstaff as $row) { ?>
    <tr>
    <td><?php echo $row->drivername; ?></td>
    <td><?php echo $row->Post; ?></td>
    </tr>
  <?php } ?>
</table>


</div>
<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>