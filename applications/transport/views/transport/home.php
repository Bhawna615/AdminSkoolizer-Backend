<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
          font-family: Questrial-Regular;
          src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
        }
         @font-face
        {
          font-family: Nunito-Semibold;
          src: url(<?php echo base_url("assets/fonts/Nunito-Semibold.ttf"); ?>);
        }
        @font-face{
      font-family: Rubik-Medium;
      src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
    }
</style>

	    <style>
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background: #F7F7F9;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}
.sidenav button{
  background: #F7F7F9;
outline: none;
  font-family: Nunito-Light;
  font-size: 20px;
  margin-bottom: 10px;
  border: none;

}
.sidenav button:focus{
  border: none;
  outline: none;
}

.sidenav a {
  font-size: 20px;
  text-decoration: none;
}



.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: relative;
 right: 20px;
 top: 10px;
  color: white;
  font-size: 36px;
 
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<style type="text/css">
  #sidebaritems
  {
    border-bottom: 1px solid;
    border-color: #c9c9c9;
    margin-top: 5px;
  }
  .icon{
    height: 25px;
    width: 25px;
    margin-right: 20px;
    color: #363636;
    position: relative;
    bottom: 3px;
  }
  .startroute
  {
    color: white;
    font-family: Nunito_regular;
    font-size: 22px;
    width: 50%;
    border: none;
    outline: none;
    padding: 5px 0 5px 0;
    background: #5789D6;
    border-radius: 5px;
    margin-top: 30px;
  }
  #dialog-form
  {
    background: #2995bf;
  }
  select
  {
    font-family: Nunito_regular;
    border: none;
    outline: none;
  }
  
</style>
</head>
<body style="background: #f2f2f2;" >
	

	<div class="visible-xs visible-sm">

	
<div id="mySidenav" class="sidenav" style="padding: 0px;">
	<div class="col-xs-12" style="background: rgb(41, 149, 191);">
      
      <div class="col-xs-12" style="padding: 0px;">
        <div class="col-xs-2" align="left" style="padding: 0px;">
            <?php  foreach ($result as $row) { $image=$row->image; } ?>
                <?php if ($image!=NULL) { ?>
                   <img src="<?php  echo base_url('assets/images/transport/').$row->image; ?>"  style="font-size: 60px; border: 1px solid; border-radius: 50%; color: white; height: 60px; width: 60px; position: relative;top: 7px;">
                <?php } else { ?>
                    <i class='material-icons' style='color: white; font-size: 60px;  position: relative;top: 7px;'>account_circle</i>
                <?php } ?>   
        </div>
        <div class="col-xs-8" align="center">
          <p style="font-size: 20px; color: white; margin-top: 10px; font-family:Nunito_regular;"><?php foreach($result as $row) { echo $row->drivername;} ?><br>Transport</p>
        </div>
        <div class="col-xs-2">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>
      </div>
</div>
    <div class="col-xs-12" style=" margin-top: 20px;">
      <div class="col-xs-12" id="sidebaritems">
        <button onclick="location.href='<?php echo site_url('transport/mybus'); ?>'"><img src="<?php echo base_url('assets/icons/bus.svg'); ?>" class="icon"> My Bus</button><br>
        <button onclick="location.href='<?php echo site_url('transport/passengerslist'); ?>'"><img src="<?php echo base_url('assets/icons/note.svg'); ?>" class="icon">Passengers List</button><br>
        <button onclick="location.href='<?php echo site_url('transport/routetimings'); ?>'"><img src="<?php echo base_url('assets/icons/destination.svg'); ?>" class="icon">Route Timings</button><br>
      
      </div>

      <div class="col-xs-12" id="sidebaritems">
        <button onclick="location.href='<?php echo site_url('transport/settings'); ?>'"><img src="<?php echo base_url('assets/icons/settings.svg'); ?>" class="icon">Settings</button><br>
      <button onclick="location.href='<?php echo site_url('transport/signout'); ?>'"><img src="<?php echo base_url('assets/icons/logout.svg'); ?>" class="icon">LOG OUT</button><br>
      </div>
    </div>
</div>
<div id="main">
		<div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); color: #FFFFFF; border-bottom: 5px solid; border-color:rgba(41, 149, 191, 0.7);">
		
			<div class="col-xs-1" align="left" style="padding:15px 0px 0px 5px;">
				<span style="font-size:30px;cursor:pointer;" onclick="  openNav()"><i class="fa fa-navicon" style="font-size:24px"></i></span>
			</div>
			<div class="col-xs-10" style="padding: 0px;">
					<p align="center" style="padding-top: 20px; padding-bottom: 10px; margin-bottom: 0px; font-size: 25px; font-family: Nunito-Semibold;"><?php echo $this->config->item('schoolName'); ?></p>
                   
				
				</div>
				
				<div class="col-xs-1" style="padding: 20px 5px 0px 0px;" align="right">
					
				</div>
	</div>
<?php if ($currentroute==NULL) { ?>
<div class="col-xs-12" align="center" style="margin-top: 100px;">
  <img src="<?php echo base_url('assets/icons/destination.svg'); ?>" style="height: 125px; width: 125px; color: "><br>
  <button class="startroute" onclick="location.href='<?php echo site_url('transport/showroutes') ?>'">Start a Route</button>
</div>
<?php } else { foreach($currentroute as $row) { ?>
  <div class="col-xs-12" align="center" style="" >
  <div class="col-xs-12" style="border-radius: 10px; background: #ffffff;margin-top: 50px; border: 1px solid; padding: 0px; border-color: rgba(134, 134, 134, 0.17); " align="
    center">
    <p style="color: white; background: #5789D6; font-family: Questrial-regular; font-size: 20px; border: 1px; border-color: white; padding: 5px 0 5px 0;"><?php echo $row->subroutename; ?></p>
    <div class="col-xs-6" style="padding: 0px; border-bottom: 1px solid; border-right: 1px solid; border-color: rgba(134, 134, 134, 0.17); padding-top: 10px;" align="center">
      <p style="font-family: Questrial-regular; font-size: 18px;">FROM</p>
    <P style=" font-family: Rubik-Medium; font-size: 20px;"><?php echo $row->Firststation; ?></P>
    </div>
    <div class="col-xs-6" style="border-bottom: 1px solid; border-color:rgba(134, 134, 134, 0.17); padding-top: 10px;" align="center">
      <p style=" font-family: Questrial-regular; font-size: 18px;">TO</p>
    <p style=" font-family: Rubik-Medium; font-size: 20px;"><?php echo $row->Laststation; ?></p>
    </div>
    <div class="col-xs-6" style="border-right: 1px solid; border-color:rgba(134, 134, 134, 0.17); padding-top: 10px; " align="center">
      <p style=" font-family: Questrial-regular; font-size: 18px;">DEPARTURE</p>
    <P style=" font-family: Rubik-Medium; font-size: 18px;"><?php echo $row->Departuretime; ?></P>
    </div>
    <div class="col-xs-6" style="padding-top: 10px;" align="center">
      <P style=" font-family: Questrial-regular;font-size: 18px;">ARRIVAL</P>
    <p style=" font-family: Rubik-Medium; font-size: 18px;"><?php echo $row->Arrivaltime; ?></p>
    </div>
    <form action="<?php echo site_url('transport/stations'); ?>" method="POST">
      <input type="hidden" name="routeid" value="<?php echo $row->routeid; ?>">
      <button style="color: white; font-size: 20px; background-color: #5789D6; font-family: Nunito_regular; padding: 5px 0 5px 0; border-radius: 15px; width: 60%; border: none; position: relative; top: 19px; outline: none;">Checkin/Checkout</button>
    </form>
  </div> 
  </div> 
<?php } } ?>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "75%";
  document.body.style.backgroundColor = "#949494";
  document.getElementById("main").style.filter = "blur(2px)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.body.style.backgroundColor = "#f2f2f2";
 document.getElementById("main").style.filter = "blur(0px)";

}
</script>

</body>
</html>