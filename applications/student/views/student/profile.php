<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <style type="text/css">
        p{
            font-size: 50px;
        }
    </style>
</head>
<body style="background: #D31C1F;">
<?php
foreach ($info as $row) {
    ?>

    <?php echo $row->Name; echo "<br>"; ?>
     <?php echo $row->Mname;echo "<br>"; ?>
    <?php echo $row->Fname; echo "<br>";?>
  <?php echo $row->Class;echo "<br>"; ?>
   <?php echo $row->Contact; ?><a href="<?php echo site_url('student/editprofile/'.$row->id) ?>"><i class="material-icons">
edit
</i></a>
<br>
  <?php  echo $row->House;echo "<br>"; ?>
  Username: <?php  echo $row->Username; echo "<br>";?>
 Password<a id="toggle" href="<?php echo site_url('student/editprofile/'.$row->id) ?>"><i class="material-icons">
edit
</i></a>

    <?php
 } 
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>">
    </script>
</body>
</html>


<?php 
//echo "<p style='font-size:40px;'>Please buy to continue</p>"
?>