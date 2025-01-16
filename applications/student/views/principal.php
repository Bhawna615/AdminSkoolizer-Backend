<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>


<style type="text/css">
    @font-face
        {
            font-family:BAHNSCHRIFT;
            src: url(<?php echo base_url("assets/fonts/BAHNSCHRIFT.ttf"); ?>);
        }
         @font-face
        {
            font-family:Markpro;
            src: url(<?php echo base_url("assets/fonts/Markpro.otf"); ?>);
        }
        @font-face
        {
            font-family:CIRCULARSTD-BOOK;
            src: url(<?php echo base_url("assets/fonts/CIRCULARSTD-BOOK.OTF"); ?>);
        }
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


</style>
<style>

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}
.sidenav button{
  background: #F7F7F9;
outline: none;
   font-family: Nunito-Light;
  font-size: 18px;
  margin-bottom: 15px;
  border: none;

}
.sidenav button:focus{
  border: none;
  outline: none;
}

.sidenav a {
  font-size: 18px;
  text-decoration: none;
  color: black;
}



.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: relative;
 right: 10px;
 top: 10px;
  color: white;
  font-size: 36px;
  margin-left: 20px;
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
  
</style>
</head>
<body style="background:#FFF; ">
<div class="visible-xs visible-sm">
  <div id="mySidenav" class="sidenav" style="background:#F7F7F9; padding: 0px;">
    <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9);">
      
      <div class="col-xs-12" style="padding: 0px;">
        <div class="col-xs-2" align="left" style="padding: 0px;">
            <?php  foreach ($principal as $row) { $image=$row->image; } ?>
                <?php if ($image!=NULL) { ?>
                   <img src="<?php  echo base_url('assets/images/principal/').$row->image; ?>"  style="font-size: 60px; border: 1px solid; border-radius: 50%; color: white; height: 60px; width: 60px; position: relative;top: 7px;">
                <?php } else { ?>
                    <i class='material-icons' style='color: white; font-size: 60px;  position: relative;top: 7px;'>account_circle</i>
                <?php } ?>   
        </div>
        <div class="col-xs-8" align="center">
          <p style="font-size: 20px; color: white; margin-top: 10px; font-family:Nunito_regular;"><?php foreach($principal as $row) { echo $row->Name;} ?><br>Principal</p>
        </div>
        <div class="col-xs-2">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>
      </div>
      
    </div>
    <div class="col-xs-12" style=" margin-top: 20px;">
      <div class="col-xs-12" id="sidebaritems">
      <button onclick="location.href='<?php echo site_url('principal/ea') ?>'"><img src="<?php echo base_url('assets/icons/employees.svg'); ?>" class="icon">Employee Attendance</button><br>
      <button onclick="location.href='<?php echo site_url('principal/classwiseattendance') ?>'"><img src="<?php echo base_url('assets/icons/checklist.svg'); ?>" class="icon"> Classwise Attendance</button><br>
      <button onclick="location.href='<?php echo site_url('principal/tt') ?>'"><img src="<?php echo base_url('assets/icons/calendar.svg'); ?>" class="icon">Teachers Timetable</button><br>
      
      </div>
           <div class="col-xs-12" id="sidebaritems">
            <button onclick="location.href='<?php echo site_url('principal/viewstudents'); ?>'"><img src="<?php echo base_url('assets/icons/student.svg'); ?>" class="icon">View Students</button><br>
      <button onclick="location.href='<?php echo site_url('principal/strength'); ?>'"><img src="<?php echo base_url('assets/icons/team.svg'); ?>" class="icon">School Strength</button><br>
      </div>
      <div class="col-xs-12" id="sidebaritems">
      <button onclick="location.href='<?php echo site_url('principal/busroutes'); ?>'"><img src="<?php echo base_url('assets/icons/bus.svg'); ?>" class="icon">Buses Routes</button><br>
      <button onclick="location.href='<?php echo site_url('principal/busdetail'); ?>'"><img src="<?php echo base_url('assets/icons/busdetail.svg'); ?>" class="icon">School Buses</button>
      </div>
      <div class="col-xs-12" id="sidebaritems">
        <button onclick="location.href='<?php echo site_url('principal/settings'); ?>'"><img src="<?php echo base_url('assets/icons/settings.svg'); ?>" class="icon">Settings</button><br>
      <button onclick="location.href='<?php echo site_url('principal/signout'); ?>'"><img src="<?php echo base_url('assets/icons/logout.svg'); ?>" class="icon">LOG OUT</button><br>
      </div>
    </div>
     
</div>
 <div id="main">
       <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); color: #FFFFFF; border-bottom: 5px solid; border-color:rgba(41, 149, 191, 0.7);">
    
      <div class="col-xs-1" align="left" style="padding:5px 0px 0px 5px;">
        <span style="font-size:30px;cursor:pointer;" onclick="  openNav()"><i class="fa fa-navicon" style="font-size:24px"></i></span>
      </div>
      <div class="col-xs-10" style="padding: 0px;">
          <p align="center" style="padding-top: 10px; margin-bottom: 0px; font-size: 25px; font-family:BAHNSCHRIFT;">FUTURE BRIGHT SCHOOL</p>
                    
        
        </div>
        
        <div class="col-xs-1" style="padding: 5px 5px 0px 0px;" align="right">
          
        </div>
   </div>

     <div class="col-xs-12" style="padding: 0px; margin-top: 20px;" align="center">
            <p style="background: #F95555; font-family:CIRCULARSTD-BOOK; font-size: 25px; padding-top: 5px; text-transform: uppercase; width: 90%;  border-radius: 5px; color: rgba(255, 255, 255, 0.85); padding-left: 20px; padding-right: 20px; letter-spacing: 2px; font-weight: 900;" >
               <?php foreach ($principal as $row) { echo $row->Name; } ?>
            </p>
            <p style="font-size: 25px;">Ongoing Classes</p>

            </div>
            <div class="col-xs-12">
              
            </div>


</div>
   
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "75%";
  document.body.style.backgroundColor = "#ffffff";
  document.getElementById("main").style.filter = "blur(2px)";
  
}

function closeNav() {
   document.getElementById("mySidenav").style.width = "0";
  document.body.style.backgroundColor = "#ffffff";
 document.getElementById("main").style.filter = "blur(0px)";
}
</script>
</body>
</html>