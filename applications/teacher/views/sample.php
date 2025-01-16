<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<style type="text/css">

		        @font-face
        {
            font-family:Nunito_regular;
            src: url(<?php echo base_url("assets/fonts/Nunito_regular.ttf"); ?>);
        }
        @font-face
        {
          font-family: Nunito-Light;
          src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
        }
         @font-face
        {
          font-family: Nunito-Semibold;
          src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
        }
        @font-face
        {
          font-family: Questrial-Regular;
          src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
        }
    @font-face{
      font-family: RedhatR;
      src: url(<?php echo base_url("assets/fonts/RedhatR.ttf"); ?>);
    }
    @font-face{
      font-family: Rubik-Medium;
      src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
    }
    @font-face{
      font-family: Rubik-Regular;
      src: url(<?php echo base_url("assets/fonts/Rubik-Regular.ttf"); ?>);
    }


	</style>
</head>
<body>
<div class="col-md-12" style="margin-top: 30px;">
    <p style="font-family: Nunito_regular; font-size: 25px; color: black; text-align: center;">FUTURE BRIGHT PUBLIC SCHOOL</p>
   


   <?php foreach($classes as $key) { ?>
    <div class="col-md-12" style="margin-bottom: 30px;">
<p style="font-family: Nunito_regular; font-size: 18px; color: black;"> <?php echo "Class ".$key->Classname; ?></p>
<div class="col-md-12">
   
        <table class="table table-responsive">
            <tr>
                <th>Roll No.</th>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
            <?php foreach($students as $row) { 
    if ($key->Classname==$row->Class) { ?>
            <tr>
                <td><?php echo $row->Rollno; ?></td>
                <td><?php echo $row->Name; ?></td>
                <td><?php echo $row->Email; ?></td>
                <td><?php echo $row->Password; ?></td>
            </tr>
            <?php } ?>
            <?php } ?> 
        </table>



</div>

</div>
<?php } ?> 

<div class="col-md-12" style="border: 1px solid; padding: 20px;">
	<p style="font-family: Questrial-Regular; font-size: 16px;">Note: The username is case sensitive. This means that the username must be entered as given above including spaces and letters. Else the username will be accepted as invalid.</p>
</div>
</div>

</body>
</html>