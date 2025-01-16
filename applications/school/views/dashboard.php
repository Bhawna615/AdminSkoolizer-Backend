<a href="<?php echo site_url('student/viewMany'); ?>" style="color:black;">
	<div class="col-md-5 cardview" style="background: #fff; padding: 0px; margin-right: 50px;">
		<div class="col-md-4" style="background: #FFAE10; padding: 20px;" align="center">
			<i class="las la-graduation-cap" style="font-size: 70px; color: white;"></i>
		</div>
		<div class="col-md-8" style="background: #fff;">
			<p style="font-family: Nunito_regular; font-size: 18px; padding: 10px; margin: 0px;">STUDENTS</p>
			<p style="padding-left: 10px; font-size: 40px; font-family: Rubik-Medium; margin: 0px;"><?php echo $studentcount; ?></p>
		</div>
	</div>
</a>

<a href="<?php echo site_url('teacher/view'); ?>" style="color:black;">
	<div class="col-md-5 cardview" style="background: #fff; padding: 0px;">
		<div class="col-md-4" style="background: #2C56BB; padding: 20px;" align="center">
			<i class="las la-chalkboard-teacher" style="font-size: 70px; color: white;"></i>
		</div>
		<div class="col-md-8" style="background: #fff;">
			<p style="font-family: Nunito_regular; font-size: 18px; padding: 10px; margin: 0px;">TEACHERS</p>
			<p style="padding-left: 10px; font-size: 40px; font-family: Rubik-Medium; margin: 0px;"><?php echo $teachercount; ?></p>
		</div>
	</div>
</a>

<a href="<?php echo site_url('classs/classes'); ?>" style="color:black;">
	<div class="col-md-5 cardview" style="background: #fff; padding: 0px; margin-top: 30px;">
		<div class="col-md-4" style="background: #797979; padding: 20px;" align="center">
			<i class="las la-users" style="font-size: 70px; color: white;"></i>
		</div>
		<div class="col-md-8" style="background: #fff;">
			<p style="font-family: Nunito_regular; font-size: 18px; padding: 10px; margin: 0px;">CLASSES</p>
			<p style="padding-left: 10px; font-size: 40px; font-family: Rubik-Medium; margin: 0px;"><?php echo $classescount; ?></p>
		</div>
	</div>
</a>

<a href="<?php echo site_url('employee/view'); ?>" style="color:black;">
	<div class="col-md-5 cardview" style="background: #fff; padding: 0px; margin-top: 30px; margin-left: 50px;">
		<div class="col-md-4" style="background: #FFAE10; padding: 20px;" align="center">
			<i class="las la-user-tie" style="font-size: 70px; color: white;"></i>
		</div>
		<div class="col-md-8" style="background: #fff;">
			<p style="font-family: Nunito_regular; font-size: 18px; padding: 10px; margin: 0px;">EMPLOYEES</p>
			<p style="padding-left: 10px; font-size: 40px; font-family: Rubik-Medium; margin: 0px;"><?php echo $employeecount; ?></p>
		</div>
	</div>
</a>
<a href="<?php echo site_url('route/activeroutes'); ?>" style="color:black;">
	<div class="col-md-5 cardview" style="background: #fff; padding: 0px; margin-top: 30px;">
		<div class="col-md-4" style="background: #2C56BB; padding: 20px;" align="center">
			<i class="las la-bus-alt" style="font-size: 70px; color: white;"></i>
		</div>
		<div class="col-md-8" style="background: #fff;">
			<p style="font-family: Nunito_regular; font-size: 18px; width: 100%; padding: 10px; margin: 0px;">
				ROUTES ACTIVE</p>
			<p style="padding-left: 10px; font-size: 40px; font-family: Rubik-Medium; margin: 0px;"><?php echo $activeroutes; ?></p>
		</div>
	</div>
</a>

<a href="<?php echo site_url('sms/absenttemplate'); ?>" style="color:black;">
	<div class="col-md-5 cardview" style="background: #fff; padding: 0px; margin-top: 30px; margin-left: 50px;">
		<div class="col-md-4" style="background: #797979; padding: 20px;" align="center">
			<i class="las la-exclamation-triangle" style="font-size: 70px; color: white;"></i>
		</div>
		<div class="col-md-8" style="background: #fff;">
			<p style="font-family: Nunito_regular; font-size: 18px; padding: 10px; margin: 0px;">
				STUDENTS ABSENT</p>
			<p style="padding-left: 10px; font-size: 40px; font-family: Rubik-Medium; margin: 0px;"><?php echo $absentstudents; ?></p>
		</div>
	</div>
</a>

<a href="<?php echo site_url('employee/viewattendance'); ?>" style="color:black;">
	<div class="col-md-5 cardview" style="background: #fff; padding: 0px; margin-top: 30px;">
		<div class="col-md-4" style="background: #FFAE10; padding: 20px;" align="center">
			<i class="las la-exclamation-triangle" style="font-size: 70px; color: white;"></i>
		</div>
		<div class="col-md-8" style="background: #fff;">
			<p style="font-family: Nunito_regular; font-size: 18px; padding: 10px; margin: 0px;">
				EMPLOYEES ABSENT</p>
			<p style="padding-left: 10px; font-size: 40px; font-family: Rubik-Medium; margin: 0px;"><?php echo $empabsents; ?></p>
		</div>
	</div>
</a>

<a href="<?php echo site_url('exam/selectClass'); ?>" style="color:black;">
	<div class="col-md-5 cardview" style="background: #fff; padding: 0px; margin-top: 30px; margin-left: 50px;">
		<div class="col-md-4" style="background: #2C56BB; padding: 20px;" align="center">
			<i class="las la-tachometer-alt" style="font-size: 70px; color: white;"></i>
		</div>
		<div class="col-md-8" style="background: #fff;">
			<p style="font-family: Nunito_regular; font-size: 18px; padding: 10px; margin: 0px;">EXAMS TODAY</p>
			<p style="padding-left: 10px; font-size: 40px; font-family: Rubik-Medium; margin: 0px;"><?php echo $examcount; ?></p>
		</div>
	</div>
</a>

<a href="<?php echo site_url('sms/birthdaytemplate'); ?>" style="color:black;">
	<div class="col-md-5 cardview" style="background: #fff; padding: 0px; margin-top: 30px;">
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

<a href="<?php echo site_url('fee/selectPendingPaymentsPeriod'); ?>" style="color:black;">
	<div class="col-md-5 cardview" style="background: #fff; padding: 0px; margin-top: 30px; margin-left: 50px;">
		<div class="col-md-4" style="background: #FFAE10; padding: 20px;" align="center">
			<i class="las la-rupee-sign" style="font-size: 70px; color: white;"></i>
		</div>
		<div class="col-md-8" style="background: #fff;">
			<p style="font-family: Nunito_regular; font-size: 18px; padding: 10px; margin: 0px;">
				Fee Pending</p>
			<p style="padding-left: 10px; font-size: 40px; font-family: Rubik-Medium; margin: 0px;"><?php echo $feeCount; ?></p>
		</div>
	</div>
</a>

<a href="<?php echo site_url('student/viewLeaveRequests'); ?>" style="color:black;">
	<div class="col-md-5 cardview" style="background: #fff; padding: 0px; margin-top: 30px; ">
		<div class="col-md-4" style="background: #2995bf; padding: 20px;" align="center">
			<i class="las la-exclamation-triangle" style="font-size: 70px; color: white;"></i>
		</div>
		<div class="col-md-8" style="background: #fff;">
			<p style="font-family: Nunito_regular; font-size: 18px; padding: 10px; margin: 0px;">
				LEAVE REQUEST</p>
			<p style="padding-left: 10px; font-size: 40px; font-family: Rubik-Medium; margin: 0px;"><?php echo $leaveRequestCount; ?></p>
		</div>
	</div>
</a>

