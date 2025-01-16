<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      font-family: Questrial-Regular;
      src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
    }
    @font-face{
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
<body style="background:white; ">
<div class="visible-xs visible-sm">
  <div id="mySidenav" class="sidenav" style="background:#F7F7F9; padding: 0px;">
    <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9);">
      
      <div class="col-xs-12" style="padding: 0px;">
        <div class="col-xs-2" align="left" style="padding: 0px;">
           <?php  foreach ($result as $row) { $image=$row->image; } ?>
                <?php if ($image!=NULL) { ?>
                   <img src="<?php  echo base_url('assets/images/students/').$row->image; ?>"  style="font-size: 60px; border-radius: 50%;  height: 60px; width: 60px; position: relative;top: 7px;">
                <?php } else { ?>
                    <i class='material-icons' style='color: white; font-size: 60px;  position: relative;top: 7px;'>account_circle</i>
                <?php } ?>   
        </div>
        <div class="col-xs-8" align="center">
          <p style="font-size: 20px; color: white; margin-top: 10px; font-family:Nunito_regular;"><?php foreach($result as $row) { echo $row->Name;} ?><br>Student</p>
        </div>
        <div class="col-xs-2">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>
      </div>
      
    </div>
    <div class="col-xs-12" style=" margin-top: 20px;">
      <div class="col-xs-12" id="sidebaritems">
      <button onclick="location.href='<?php echo site_url('student/showAssignments') ?>'"><img src="<?php echo base_url('assets/icons/Assignments.svg'); ?>" class="icon">Assignments</button><br>
      <button onclick="location.href='<?php echo site_url('student/upexams') ?>'"><img src="<?php echo base_url('assets/icons/exam.svg'); ?>" class="icon">Upcoming Exams</button><br>
    
      </div>
      <div class="col-xs-12" id="sidebaritems">
      <button onclick="location.href='<?php echo site_url('student/results') ?>'"><img src="<?php echo base_url('assets/icons/result.svg'); ?>" class="icon">Results</button><br>
      </div>
      <div class="col-xs-12" id="sidebaritems">
      <button onclick="location.href='<?php echo site_url('student/transport'); ?>'"><img src="<?php echo base_url('assets/icons/bus-student.svg'); ?>" class="icon">My Transport</button><br>
      </div>
      <div class="col-xs-12" id="sidebaritems">
        <button onclick="location.href='<?php echo site_url('student/settings'); ?>'"><img src="<?php echo base_url('assets/icons/settings.svg'); ?>" class="icon">Settings</button><br>
        <button onclick="location.href='<?php echo site_url('student/signout'); ?>'"><img src="<?php echo base_url('assets/icons/logout.svg'); ?>" class="icon">LOG OUT</button><br>
      </div>
      
      </div>
    </div>
     

<div id="main">
		<div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); color: #FFFFFF; border-bottom: 5px solid; border-color:rgba(41, 149, 191, 0.7);">
		
			<div class="col-xs-1" align="left" style="padding:13px 0px 0px 5px;">
				<span style="font-size:30px;cursor:pointer;" onclick="  openNav()"><i class="fa fa-navicon" style="font-size:24px"></i></span>
			</div>
			<div class="col-xs-10" style="padding: 0px; padding-top: 20px;" align="center">
					<p style="font-family: Nunito-Semibold; font-size: 23px;">SARASWATI VIDYA MANDIR</p>
				
				</div>
				
				<div class="col-xs-1" style="padding: 13px 5px 0px 0px;" align="right">
					<a href="<?php echo site_url('student/messages'); ?>" style="color: #FFFFFF;"><i class="material-icons" style="font-size:30px; padding-top: 8px;">notifications</i></a>
				</div>
	</div>
		
		<div class="col-xs-12" style="padding: 0px; margin-top: 20px;" align="center">
			
<?php  
/*if ($attend[0]==0) {
    $percent=0;
}
else
{
    $percent=$attend[1]/$attend[0]*100; 
}*/
?>
</div>

		<!--		<div class="col-xs-12" style="margin-top: 20px;">
					<div class="col-xs-8" style="padding: 0px; font-size: 20px; font-family: NotoSansTeluguUI; color: #FFFFFF; ">
			<p ><b>Current Attendence</b></p>
			<p ><b>Total Attendence</b></p>
			<p ><b>Percentage
				</b></p>
			</div>
			<div class="col-xs-2" style="font-size: 20px; color: #FFFFFF;">
				<p >
					<b>:</b>
				</p>
				<p >
					<b>:</b>
				</p>
				<p >
					<b>:</b>
				</p>
				
			</div>
			<div class="col-xs-2" align="left" style="font-size: 20px; font-family: NotoSansTeluguUI; color: #FFFFFF;">
				<p >
					<b><?php echo $attend[1]; ?></b>
				</p>
				<p >
					<b><?php echo $attend[0]; ?></b>
				</p>
				<p >
					<b><?php echo intval($percent);  ?>%</b>
				</p>
				
			</div>
					
				</div> -->
<div class="col-xs-12">
  <div class="col-xs-12" style="border: 1px solid; border-radius: 4px; border-color: #B3B9BE; font-family: Questrial-Regular; font-size: 16px; margin-bottom: 20px;">
    <p style="text-align: center; font-family: Rubik-Medium; font-size: 20px; margin-bottom: 30px;">CLASSES TODAY</p>
    <p>Date<span style="float: right;"><?php echo date('d F Y'); ?></span></p>
    <p>Day<span style="float: right;"><?php echo date('l'); ?></span></p>
  </div>
  <?php foreach($timetable as $row) { ?>
  <div class="col-xs-12" style="background: #5789D6; border: 1px solid; border-radius: 4px; border-color: #B3B9BE; padding: 0px; margin-bottom: 30px;">
    <div class="col-xs-4" style="color: white; font-family: Nunito-Semibold; font-size: 15px; text-transform: uppercase; padding-top: 30px;" align="center">
      <p><?php echo $row->Subjectname; ?></p>
    </div>
    <div class="col-xs-8" style="background: #ffffff; font-family: Questrial-Regular; font-size: 15px; color: black; padding: 10px;" align="center">
      <p><?php $stime=date('g:i A',strtotime($row->Stime)); $etime=date('G:i A',strtotime($row->Etime)); echo $stime." - ".$etime; ?></p>
      <p style="text-align: left;">Teacher<span style="float: right;"><?php echo $row->Teachername; ?></span></p>
    </div>
  </div>
<?php }  ?>
</div>

</div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
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