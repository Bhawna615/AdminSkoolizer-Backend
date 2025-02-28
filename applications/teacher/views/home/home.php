
<!-- <div class="col-md-12" style="padding: 20px;">
        
         <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

</div> -->




<!-- 
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



                            <a href="<?php echo site_url('sms/absenttemplate'); ?>" style="color:black;">
	<div class="col-md-5 cardview" style="background: #fff; padding: 0px;  margin-left: 50px;">
		<div class="col-md-4" style="background: #797979; padding: 20px;" align="center">
			<i class="las la-exclamation-triangle" style="font-size: 70px; color: white;"></i>
		</div>
		<div class="col-md-8" style="background: #fff;">
			<p style="font-family: Nunito_regular; font-size: 18px; padding: 10px; margin: 0px;">
				STUDENTS ABSENT</p>
			<p style="padding-left: 10px; font-size: 40px; font-family: Rubik-Medium; margin: 0px;"><?php echo $absentstudents; ?></p>
		</div>
	</div>

    <a href="<?php echo site_url('sms/birthdaytemplate'); ?>" style="color:black;">
	<div class="col-md-5 cardview" style="background: #fff; padding: 0px; margin-top: 30px; margin-left: 50px;">
		<div class="col-md-4" style="background: #797979; padding: 20px;" align="center">
			<i class="las la-gift" style="font-size: 70px; color: white;"></i>
		</div>
		<div class="col-md-8" style="background: #fff;">
			<p style="font-family: Nunito_regular; font-size: 18px; padding: 10px; margin: 0px;">
				BIRTHDAYS TODAY</p>
			<p style="padding-left: 10px; font-size: 40px; font-family: Rubik-Medium; margin: 0px;"><?php echo $birthdaycount; ?></p>
		</div>
	</div>
</a>
</a>
</div> -->














<?php $this->view('header') ?>

<style>
    /* Blink Background & Scale Effect */
    @keyframes blinkScale {
        0% {
            background-color: #add8e6;
            transform: scale(1);
        }

        /* Light Blue */
        50% {
            background-color: #87cefa;
            transform: scale(1.1);
        }

        /* Sky Blue */
        100% {
            background-color: #add8e6;
            transform: scale(1);
        }
    }

    .sidebar-menu-item.notification-pending {
        animation: blinkScale 1s infinite alternate ease-in-out;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        position: relative;
        border-radius: 8px;
        transition: transform 0.3s ease;
        color: white;
        /* Change icon text to white when notification is active */
    }

    .sidebar-menu-item.notification-pending a {
        color: white;
        /* Make sure the link text is white */
    }

    /* Light Blue Notification Count */
    .notification-count {
        position: absolute;
        top: 5px;
        right: 10px;
        background-color: white;
        /* White background for notification count circle */
        color: #1e90ff;
        /* Dodger Blue color for the number inside the circle */
        font-size: 12px;
        font-weight: bold;
        padding: 2px 6px;
        border-radius: 50%;
    }

    /* When notification is seen, reset colors */
    .sidebar-menu-item.seen {
        color: inherit;
        /* Reset icon text color */
    }

    .sidebar-menu-item.seen .notification-count {
        background-color: #1e90ff;
        /* Dodger Blue for the background of the count circle */
        color: white;
        /* White text for the number inside the circle */
    }
</style>
<div class="col-xs-12 col-sm-12 page-content">
    <!-- Icon links below the navbar (3 columns, 4 rows) -->
    <div class="icon-links-container">

        <div class="sidebar-menu-item orange-background">
            <a href="<?php echo site_url('student/viewmany') ?>">
            <img src="<?php echo base_url('assets/icons/student.png'); ?>" alt="Exams Icon">
            
                <p style="margin-bottom:60px;">View Students</p>
            </a>
        </div>

        <div
            class="sidebar-menu-item orange-background <?php echo ($recentMessages > 0) ? 'notification-pending' : ''; ?>">
            <a href="<?php echo site_url('student/viewLeaveRequests') ?>">
            <img src="<?php echo base_url('assets/icons/personal.png'); ?>" alt="Exams Icon">
                <p>Leave Requests</p>
                <?php if ($recentMessages > 0) {
                    echo "<span class='notification-count'>{$recentMessages}</span>";
                } ?>
            </a>
        </div>

        <div class="sidebar-menu-item <?php echo ($recentAssignments > 0) ? 'notification-pending' : ''; ?>">
            <a href="<?php echo site_url('attendance/getRollCall') ?>">
                <img src="<?php echo base_url('assets/icons/mark.png'); ?>" alt="Assignment Icon">
                <p>Mark Attendance</p>
                <?php if ($recentAssignments > 0) {
                    echo "<span class='notification-count'>{$recentAssignments}</span>";
                } ?>
            </a>
        </div>
        <div class="sidebar-menu-item <?php echo ($recentExams > 0) ? 'notification-pending' : ''; ?>">
            <a href="<?php echo site_url('attendance/view') ?>">
                <img src="<?php echo base_url('assets/icons/view.png'); ?>" alt="Exams Icon">
                <p>View Attendance</p>
                <?php if ($recentExams > 0) {
                    echo "<span class='notification-count'>{$recentExams}</span>";
                } ?>
            </a>
        </div>
        <div
            class="sidebar-menu-item orange-background <?php echo ($recentSchoolPosts > 0) ? 'notification-pending' : ''; ?>">
            <a href="<?php echo site_url('attendance/viewbymonth') ?>">
                <img src="<?php echo base_url('assets/icons/attendance.png'); ?>" alt="Exams Icon">
                <p>Attendance Sheet</p>
                <?php if ($recentSchoolPosts > 0) {
                    echo "<span class='notification-count'>{$recentSchoolPosts}</span>";
                } ?>
            </a>
        </div>
        <div
            class="sidebar-menu-item blue-background <?php echo ($recentClassPosts > 0) ? 'notification-pending' : ''; ?>">
            <a href="<?php echo site_url('timetable/view') ?>">
                <img src="<?php echo base_url('assets/icons/timetable.png'); ?>" alt="Exams Icon">
                <p>View Timetable</p>
                <?php if ($recentClassPosts > 0) {
                    echo "<span class='notification-count'>{$recentClassPosts}</span>";
                } ?>
            </a>
        </div>
        <div class="sidebar-menu-item orange-background ">
            <a href="<?php echo site_url('exam/newExam') ?>">
                <img src="<?php echo base_url('assets/icons/exams.png'); ?>" alt="Exams Icon" style=" width: 95%;">
                <p>New Exam</p>
            </a>
        </div>
        <div class="sidebar-menu-item blue-background <?php echo ($recentEvents > 0) ? 'notification-pending' : ''; ?>">
            <a href="<?php echo site_url('exam/selectClass') ?>">
                <img src="<?php echo base_url('assets/icons/all_exams.png'); ?>" alt="Exams Icon">
                <p>All Exams</p>
                <?php if ($recentEvents > 0) {
                    echo "<span class='notification-count'>{$recentEvents}</span>";
                } ?>
            </a>
        </div>

        <div
            class="sidebar-menu-item blue-background <?php echo ($recentPayments > 0) ? 'notification-pending' : ''; ?>">
            <a href="<?php echo site_url('metrics') ?>">
                <img src="<?php echo base_url('assets/icons/metrics.png'); ?>" alt="Exams Icon">
                <p>Metrics</p>
                <?php if ($recentPayments > 0) {
                    echo "<span class='notification-count'>{$recentPayments}</span>";
                } ?>
            </a>
        </div>

        <div class="sidebar-menu-item ">
            <a href="https://kkblossomschool.org">
                <img src="<?php echo base_url('assets/icons/website.png'); ?>" alt="Home Icon">
                <p>School Website</p>
            </a>
        </div>
        
        <div class="sidebar-menu-item blue-background ">
            <a href="<?php echo site_url('exam/classWiseReport'); ?>">
                <img src="<?php echo base_url('assets/icons/reports.png'); ?>" alt="Exams Icon" style=" height: 50%;">
                <p style="  margin-top: 6px;">Classwise Exam Report</p>
            </a>
        </div>
        <div class="sidebar-menu-item orange-background ">
            <a href="<?php echo site_url('exam/generateClassWiseMetrics'); ?>">
                <img src="<?php echo base_url('assets/icons/class_metrics.png'); ?>" alt="Exams Icon">
                <p>Classwise Metrics</p>
            </a>
        </div>

        <div class="sidebar-menu-item orange-background ">
            <a href="<?php echo site_url('homework/homework'); ?>">
                <img src="<?php echo base_url('assets/icons/homework.png'); ?>" alt="Exams Icon">
                <p>Assign
                Homework</p>
            </a>
        </div>

        <div class="sidebar-menu-item orange-background ">
            <a href="<?php echo site_url('homework/view'); ?>">
                <img src="<?php echo base_url('assets/icons/view_homework.png'); ?>" alt="Exams Icon">
                <p>View Homework</p>
            </a>
        </div>

        <div class="sidebar-menu-item orange-background ">
            <a href="<?php echo site_url('message/view'); ?>">
                <img src="<?php echo base_url('assets/icons/texts.png'); ?>" alt="Exams Icon">
                <p>In-App
                Messaging</p>
            </a>
        </div>

        <div class="sidebar-menu-item orange-background ">
            <a href="<?php echo site_url('post/view'); ?>">
                <img src="<?php echo base_url('assets/icons/posts.png'); ?>" alt="Exams Icon">
                <p>Posts</p>
            </a>
        </div>

        <div class="sidebar-menu-item orange-background ">
            <a href="<?php echo site_url('sms/absenttemplate'); ?>">
                <img src="<?php echo base_url('assets/icons/absence.png'); ?>" alt="Exams Icon">
                <p>Student Absent</p>
            </a>
        </div>

        <div class="sidebar-menu-item orange-background ">
            <a href="<?php echo site_url('sms/birthdaytemplate'); ?>">
                <img src="<?php echo base_url('assets/icons/birthday.png'); ?>" alt="Exams Icon">
                <p>Birthday Today</p>
            </a>
        </div>




        <!-- <div class="sidebar-menu-item orange-background ">
            <a href="https://play.google.com/store/apps/details?id=com.macmer.kkblossom">
                <img src="<?php echo base_url('assets/icons/thumb-up.png'); ?>" alt="Exams Icon">
                <p>Rate Us</p>
            </a>
        </div> -->

    </div>

</div>
</div>







<script>
    document.querySelectorAll('.sidebar-menu-item').forEach(item => {
        item.addEventListener('click', function () {
            if (this.classList.contains('notification-pending')) {
                this.classList.remove('notification-pending');
                this.classList.add('seen'); // Add the seen class to revert the notification appearance
                let countBadge = this.querySelector('.notification-count');
                if (countBadge) countBadge.remove();

                let notificationType = this.querySelector('p').innerText;
                markNotificationAsRead(notificationType);
            }
        });
    });

    function markNotificationAsRead(notificationType) {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "<?php echo site_url('student/notifications'); ?>", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send("notificationType=" + notificationType);
    }




</script>



<!-- <?php $this->view('student/layouts/footer') ?> -->