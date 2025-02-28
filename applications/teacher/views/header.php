<!-- <!DOCTYPE html>
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


		<div class="col-md-9" style="padding: 0px;"> -->






		<!DOCTYPE html>

<head>
    <title><?php if (isset($title))
        echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styles.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/student.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.js'); ?>"></script>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url('assets/favicon/favicon.ico') ?>" type="image/ico" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

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
</style>

<style>
    body {
        background-color: #EDE8F5;
    }

    /* sledebar */

    #cross {
        margin-right: 10px;
        transition: .2s linear;

    }

    #cross.fa-x {
        transform: rotate(180deg);
    }

    .menu-icon {
        font-size: 1.8rem;
        cursor: pointer;
    }

	.sidebar {
    position: fixed;
    top: 0;
    left: -250px;
    width: 250px;
    height: 100vh;
    background-color: #124E66;
    color: white;
    transition: left 0.4s ease-in-out;
    padding-left: 10px; /* Left se gap */
    padding-right: 10px; /* Right se bhi same gap */
    box-sizing: border-box; /* Padding ko width ke andar count karega */
}


    .sidebar.show {
        left: 0;
    }

    .sidebar a {
        display: block;
        color: white;
        text-decoration: none;
        padding: 15px;
        border-bottom: 1px solid rgb(44, 125, 157);
        /* transition: background 0.3s; */
    }

    .sidebar a i {
        margin-right: 10px;
        /* Space between icon and text */
    }

    .sidebar a:hover {
        background-color: #EDE8F5;
        color: #124E66;
    }

    .close-btn {
        font-size: 1.5rem;
        cursor: pointer;
        padding: 10px;
        text-align: right;
    }

    /* sledebar */

    /* Navbar styling */
    .navbar {

        background-color: #124E66;
        /* Deep Orange */
        color: #FFFFFF;
        /* White text for contrast */
        padding: 10px 20px;
        height: 70px;
        width: 100%;
        border-bottom: 1px solid #ddd;
    }

    /* Navbar center: page title */
    .navbar-center {
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: center;
    }

    .school-name {
        font-size: 2.5rem;

    }

    .school-logo {
        cursor: pointer;
    }

    /* navbar styling */







    /* Icon links container styling */
    .icon-links-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        /* 3 columns */
        gap: 20px;
        /* Space between items */
        justify-items: center;
        /* Center the icons horizontally */
        align-items: center;
        /* Center the icons vertically */

    }

    .sidebar-menu-item {
        padding-top: 80px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 400px;
        /* Fixed size for icons */
        height: 400px;
        background-color: #f5f5f5;
        /* Light grey background */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        /* Subtle shadow */
        transition: transform 0.3s, box-shadow 0.3s;
        /* Smooth hover effect */
    }

    .sidebar-menu-item img {
        width: 80%;
        height: 60%;

    }

    .sidebar-menu-item:hover {
        transform: scale(1.1);
        /* Slight zoom-in effect */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        /* Enhanced shadow */
    }




    .icon-btn1 {
        all: unset;
        /* Yeh sari default styling ko reset kar dega */
        display: inline-block;
        /* Image ko inline rakhne ke liye */
        cursor: pointer;
        /* Pointer banane ke liye, agar click hona chahiye */
    }

    .icon-btn1 img {
        display: block;
        /* Image ke around extra space hata dega */

        height: 45px;
        width: 55px;
    }

    .sidebar-menu-item a {
        text-decoration: none;
        color: #202124;
        /* Dark grey color */

    }

    .sidebar-menu-item a p {
        margin-top: 10px;
    }

    .sidebar-menu-item a:hover {
        text-decoration: underline;
        /* Underline on hover */
    }

    .las {
        font-size: 4.5rem;

    }



    .school-logo-container {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
		gap: 10px;
	   
    }

    .text-primary{
        font-size: 1.3rem;
        color: #124E66;
        font-family: Nunito-Semibold;
        text-transform: lowercase;
        font-weight: bold;
    }

    .text-primary::first-letter {
        text-transform: uppercase;
    }

    










    @media (max-width: 768px) {

        /* Adjust navbar layout for smaller screens */
        .container-fluid {
            display: flex;
        }

        .sidebar-student-detail-container {
            height: 90px;
            width: 70px;
        }

        .icon {
            width: 100%;
            /* Take the full width of the box */
            height: 100%;
            /* Take the full height of the box */
            object-fit: cover;
        }

        .sidebar-student-info {
            height: 90px;
            width: 90px;
            font-size: 12px;
        }

        .navbar-center p {
            font-size: 1.8rem;
        }

        .icon-links-container {

            grid-template-columns: repeat(2, 1fr);

            /* 3 columns */
        }

        .sidebar-menu-item {
            width: 100%;
            /* Fixed size for icons */
            height: 170px;
            padding-top: 60px;
        }

        .icon-links-container {
            gap: 10px;
        }

        .school-name {
            font-size: 2rem;

        }

        .icon-btn1 img {


            height: 40px;
            width: 50px;
        }


    }
</style>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">


        <!-- Navbar Center: Page Title -->
        <div class="navbar-center text-center flex-grow-1">
            <div class="school-logo-container">
                <img src="<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>"
                    class="school-logo" alt="School Logo" onclick="location.href='<?php echo site_url('home') ?>'" />
            </div>
            <div class="school-name">
                <?php echo $this->config->item('schoolName') ?>
            </div>
            <i class="fas fa-bars menu-icon" id='cross' onclick="toggleSidebar()"></i>

        </div>



        <!-- Navbar Right: Logout Button -->
        <!-- <div class="navbar-right">
                    <i class="las la-door-open nav-icon"
                        onclick="location.href='<?php echo site_url('auth/logout') ?>'"></i>
                </div> -->

    </nav>

    <div class="sidebar" id="sidebar">
        <div class="close-btn btn_log" onclick="toggleSidebar()"></div>
        <div class="school-logo-container" style=" width:100%; height: max-content; background-color:  #EDE8F5; padding:10px; box-shadow: inset 0 4px 8px rgba(0, 0, 0, 0.3); ">
            <img src="<?php echo base_url('assets/images/teachers/') . $teacherdetail->image; ?>"
                class="school-logo" style="width:100px; height:100px; border-radius:50%;" alt="School Logo"
                onclick="location.href='<?php echo site_url('home') ?>'" />
            <div class="loginDetail">
                <h2 class="text-primary" style=" color: #124E66;  font-size: 1.1rem;"><?php echo $teacherdetail->Teachername; ?></h2>
                <p class="text-primary" style=" color: #124E66;  font-size: 1.1rem;">Post: <?php echo $teacherdetail->Post; ?></p>
                <p class="text-primary" style=" color: #124E66; font-size: 1.1rem;">Class: <?php echo $teacherdetail->Classteacher; ?></p>
            </div>
        </div>
        <a href="<?php echo site_url('auth/logout'); ?>"> <i class="fas fa-sign-out-alt"></i> Logout</a>
        <!-- <button class="icon-btn1" onclick="location.href='<?php echo site_url('auth/logout') ?>'">
            <img src="<?php echo base_url('assets/icons/logout.png'); ?>" alt="Logout Icon">
        </button> -->
        <a href="https://play.google.com/store/apps/details?id=com.macmer.kkblossom"> <i class="fas fa-star"></i> Rate
            Us</a>
        <!-- <a href="<?php echo site_url('student/accounts'); ?>"><i class="fas fa-user"></i> Manage Account</a> -->
    </div>




    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("show");
            document.getElementById("cross").classList.toggle("fa-x");
        }
    </script>


</body>
