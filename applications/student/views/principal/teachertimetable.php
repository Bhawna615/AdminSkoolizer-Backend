<!DOCTYPE html>
<html>
<head>
	<title>Employee Attendance</title>
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
		.icon
		{
			height: 20px;
			width: 20px;
			padding-top: 5px;
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
		<p style="color: white; font-size:20px; font-family: Nunito-Light; "><?php foreach($timetable as $row){ echo $row->Teachername;} ?></p>
	</div>
</div>
 <div class="col-xs-12">
    <div class="col-xs-12" style="background-color: rgba(255, 255, 255, 0.19); margin-top: 40px; border-radius: 5px; border: 1px solid; border-color: white; padding-bottom: 20px;">
                <div class="col-xs-12" align="center">
                    <p style="font-family: Nunito_regular; font-size: 22px; background-color: #F95555; position: relative; bottom: 20px; padding-top: 5px; width: fit-content; padding-left: 15px; padding-right: 15px;  border-radius: 5px; color: rgba(255, 255, 255, 0.85); letter-spacing: 2px; font-weight: 900;">CLASSES</p>
                </div>
        <div class="col-xs-12" style="font-family:Nunito_regular; font-size: 18px; color: white;">
                <div class="col-xs-6">
                  
                         <p style="font-size: 20px;"><b>DAY</b>
                        </p>
                </div>
                <div class="col-xs-6" align="right">
                         <p style="font-size: 20px; text-transform: uppercase;"><b><?php foreach($timetable as $row) { echo $row->Day; } ?></b></p>
                        
                </div>
    </div>

    <?php foreach ($timetable as $row) {    ?>  
   <div class="col-xs-12" style=" font-size: 18px; text-transform: uppercase; font-weight: 900; margin-top: 20px; ">       
                            <br>
                          <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); border-radius: 5px; padding-bottom: 20px;">
                    <div class="col-xs-12" align="center">
                   <p style="background-color:#F95555; position: relative; bottom: 13px;   width: fit-content; padding-left: 15px; padding-right: 15px;  border-radius: 5px; color: rgba(255, 255, 255, 0.85); font-family: RedhatR; font-size: 20px; letter-spacing: 2px; font-weight: 900; padding-top: 5px;" ><?php $stime=date('g:i A',strtotime($row->Stime));
                   $etime=date('g:i A',strtotime($row->Etime));

                     echo $stime; echo " - "; echo $etime; ?></p>
                </div>
                    <p align="center" style="font-family: Nunito_regular"></p>
                    <div class="col-xs-6" align="left" style="font-family:RedhatR; font-size: 18px; color: white; ">
                        <?php echo "Class "; echo $row->Class; ?>
                    </div>
                    <div class="col-xs-6" align="right" style="font-family:RedhatR; font-size: 18px; color: white;">
                        <?php  echo $row->Subjectname; ?>
                    </div>
                </div>  
             </div>
  <?php } ?>  
        </div>
    </div>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>