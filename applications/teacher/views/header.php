<!DOCTYPE html>
<html lang="en">
<head>
	<title>Skoolizer ERP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styles.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.js'); ?>"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet"
		  href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="icon" href="<?php echo base_url('assets/favicon/favicon.ico') ?>" type="image/ico"/>
	<style type="text/css">
		@font-face {
			font-family: Nunito_regular;
			src: url(<?php echo base_url("assets/fonts/Nunito_regular.ttf"); ?>);
		}

		@font-face {
			font-family: Nunito-Light;
			src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
		}

		@font-face {
			font-family: Nunito-Semibold;
			src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
		}

		@font-face {
			font-family: Questrial-Regular;
			src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
		}

		@font-face {
			font-family: RedhatR;
			src: url(<?php echo base_url("assets/fonts/RedhatR.ttf"); ?>);
		}

		@font-face {
			font-family: Rubik-Medium;
			src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
		}

		@font-face {
			font-family: Montserrat-Medium;
			src: url(<?php echo base_url("assets/fonts/Montserrat-Medium.ttf"); ?>);
		}

		@font-face {
			font-family: Rubik-Regular;
			src: url(<?php echo base_url("assets/fonts/Rubik-Regular.ttf"); ?>);
		}
		
		.sidenav {
          height: 100%;
          width: 0;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #2C56BB;
          overflow-x: hidden;
          transition: 0.5s;
          padding-top: 60px;
          border: 1px solid #FFAE10;
        }
        
        .sidenav a {
          padding: 8px 8px 8px 32px;
          text-decoration: none;
          font-size: 25px;
          color: #818181;
          display: block;
          transition: 0.3s;
        }
        
        .sidenav a:hover {
          color: #f1f1f1;
        }
        
        .sidenav .closebtn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
          margin-left: 50px;
        }
        
        @media screen and (max-height: 450px) {
          .sidenav {padding-top: 15px;}
          .sidenav a {font-size: 18px;}
        }

	</style>
	<script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
        }
        
        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</head>
<body>
<div class="col-md-12 top-level-container">
	<div class="col-md-3 brand-logo-container hide-in-sm">
		<i>
			<img
					src="<?php echo base_url('assets/images/logo/skoolizer.png') ?>"
					class="brand-logo"
					onclick="location.href='<?php echo site_url('home') ?>'"
					alt="Skoolizer Logo"
			/>
		</i>
	</div>
	<div class="col-md-9 school-name-container">
	   <span style="font-size:30px;cursor:pointer" class="hide-in-lg" onclick="openNav()">&#9776;</span>
		<div class="school-logo-container">
				<img
						src="<?php echo base_url('assets/images/logo/'.$this->config->item('schoolLogo')) ?>"
						class="school-logo"
						alt="School Logo"
				/>
		</div>
		<p class="school-name">
			<?php echo $this->config->item('schoolName') ?>
			<button
					class="icon-btn"
					onclick="location.href='<?php echo site_url('auth/signout'); ?>'"
					title="Log Out"
			>
				<i class="las la-door-open"></i>
			</button>
		</p>
	</div>
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <button class="side-bar-btn"
				onclick="location.href='<?php echo site_url('student/viewmany'); ?>'">
					<i class="las la-eye"></i>
						View Students
		</button>
		   <br>
               <button class="side-bar-btn"
                     onclick="location.href='<?php echo site_url('student/viewLeaveRequests'); ?>'">
                       <i class="las la-basketball-ball"></i>
                         Leave Requests
               </button>
               <button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('attendance/getRollCall'); ?>'">
								<i class="las la-check-square"></i>
								Mark Attendance
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('attendance/view'); ?>'">
								<i class="las la-eye"></i>
								View Attendance
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('attendance/viewbymonth'); ?>'">
								<i class="las la-file-alt"></i>
								Attendance Sheet
							</button>
							<br>
								<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('timetable/view'); ?>'">
								<i class="las la-eye"></i>
								View Timetable
							</button>
							<br>
								<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('exam/newExam'); ?>'">
								<i class="las la-plus-square"></i>
								New Exam
							</button>
							<br>
							<button class="side-bar-btn" onclick="location.href='<?php echo site_url('exam/selectClass'); ?>'">
								<i class="las la-eye"></i>
								All Exams
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('metrics'); ?>'">
								<i class="las la-hospital-symbol"></i>
								Metrics
							</button>
							<br/>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('exam/classWiseReport'); ?>'">
								<i class="las la-paperclip"></i>
								Classwise Exam Report
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('exam/generateClassWiseMetrics'); ?>'">
								<i class="las la-paperclip"></i>
								Classwise Metrics
							</button>
							<br>
								<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('homework/homework'); ?>'">
								<i class="las la-list-ul"></i>
								Assign
								Homework
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('homework/view'); ?>'">
								<i class="las la-eye"></i>
								View Homework
							</button>
							<br>
								<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('message/view'); ?>'">
								<i class="las la-mobile"></i>
								In-App
								Messaging
							</button>
							<br>
							<button
									class="side-bar-btn"  data-parent="#accordion"
									href="#"
									onclick="location.href='<?php echo site_url('post/view') ?>'"
							>
								<i class="las la-rss"></i>
								Posts
							</button>
							<br>
</div>


	
    	<div class="col-md-12 " style="padding: 0px;">
		<div class="col-md-3 hide-in-sm" style="background: #2C56BB; padding: 0px; padding-left: 20px; ">
		<div class="panel-group" id="accordion">
				<div class="panel panel-default" style="background: #2C56BB; border: none;">
					<div class="panel-heading" style="background: #2C56BB; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse2">
								<i class="las la-graduation-cap"></i>
								Students
							</button>
						</h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('student/viewmany'); ?>'">
								<i class="las la-eye"></i>
								View Students
							</button>
							       <br>
                            <button class="side-bar-btn"
                                    onclick="location.href='<?php echo site_url('student/viewLeaveRequests'); ?>'">
                                <i class="las la-basketball-ball"></i>
                                Leave Requests
                            </button>
						</div>
					</div>
				</div>

				<div class="panel panel-default" style="background: #2C56BB; border: none;">
					<div class="panel-heading" style="background: #2C56BB; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse4">
								<i class="las la-list-alt"></i>
								Attendance
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse4" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('attendance/getRollCall'); ?>'">
								<i class="las la-check-square"></i>
								Mark Attendance
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('attendance/view'); ?>'">
								<i class="las la-eye"></i>
								View Attendance
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('attendance/viewbymonth'); ?>'">
								<i class="las la-file-alt"></i>
								Attendance Sheet
							</button>
							<br></div>
					</div>
				</div>

				<div class="panel panel-default" style="background: #2C56BB; border: none;">
					<div class="panel-heading" style="background: #2C56BB; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse5">
								<i class="las la-calendar"></i>
								Schedule
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse5" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('timetable/view'); ?>'">
								<i class="las la-eye"></i>
								View Timetable
							</button>
							<br>
						</div>
					</div>
				</div>


				

				<div class="panel panel-default" style="background: #2C56BB; border: none;">
					<div class="panel-heading" style="background: #2C56BB; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse7">
								<i class="las la-tachometer-alt"></i>
								Exams
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse7" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('exam/newExam'); ?>'">
								<i class="las la-plus-square"></i>
								New Exam
							</button>
							<br>
							<button class="side-bar-btn" onclick="location.href='<?php echo site_url('exam/selectClass'); ?>'">
								<i class="las la-eye"></i>
								All Exams
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('metrics'); ?>'">
								<i class="las la-hospital-symbol"></i>
								Metrics
							</button>
							<br/>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('exam/classWiseReport'); ?>'">
								<i class="las la-paperclip"></i>
								Classwise Exam Report
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('exam/generateClassWiseMetrics'); ?>'">
								<i class="las la-paperclip"></i>
								Classwise Metrics
							</button>
							<br>
	
						</div>
					</div>
				</div>

				<div class="panel panel-default" style="background: #2C56BB; border: none;">
					<div class="panel-heading" style="background: #2C56BB; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse8">
								<i class="las la-edit"></i>
								Homework
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse8" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('homework/homework'); ?>'">
								<i class="las la-list-ul"></i>
								Assign
								Homework
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('homework/view'); ?>'">
								<i class="las la-eye"></i>
								View Homework
							</button>
							<br>
						</div>
					</div>
				</div>

				<div class="panel panel-default" style="background: #2C56BB; border: none;">
					<div class="panel-heading" style="background: #2C56BB; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse10">
								<i class="las la-sms"></i>
								Messaging
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse10" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('message/view'); ?>'">
								<i class="las la-mobile"></i>
								In-App
								Messaging
							</button>
							<br>
		
						</div>
					</div>
				</div>

				<div class="panel panel-default" style="background: #2C56BB; border: none;">
					<div class="panel-heading" style="background: #2C56BB; border: none;">
						<h4 class="panel-title">
							<button
									class="side-bar-btn"  data-parent="#accordion"
									href="#"
									onclick="location.href='<?php echo site_url('post/view') ?>'"
							>
								<i class="las la-rss"></i>
								Posts
							</button>
							<br>
						</h4>
					</div>
				</div>

				<div class="panel panel-default" style="background: #2C56BB; border: none;">
					<div class="panel-heading" style="background: #2C56BB; border: none;">
						<h4 class="panel-title">
							<button class="side-bar-btn" data-toggle="collapse" data-parent="#accordion"
									href="#collapse11">
								<i class="las la-info-circle"></i>
								More
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse11" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('home/terms'); ?>'">
								<i class="las la-file-alt"></i>
								Terms &
								Conditions
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('home/privacy'); ?>'">
								<i class="las la-user-secret"></i>
								Privacy Policy
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('home/docs'); ?>'">
								<i class="las la-book"></i>
								Documentation
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-md-9" style="padding: 0px;">
