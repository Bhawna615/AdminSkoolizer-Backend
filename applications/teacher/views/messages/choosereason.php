<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
	<div class="col-md-12" style="font-family: RedhatR; font-size: 18px; margin-bottom: 20px;">
		Balance:
		<?php
		if (isset($response)) {
			foreach ($response as $key => $value) {
				if ($key == 'sms') {
					echo $value . " sms left";
				}
			}
		} ?>
	</div>
	<div onclick="location.href='<?php echo site_url('sms/absenttemplate'); ?>'" class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase;">
		Absent
	</div>
	<div onclick="location.href='<?php echo site_url('sms/attendancetemplate') ?>'" class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-left: 20px;">
		Attendance
	</div>
	<div onclick="location.href='<?php echo site_url('sms/holidaytemplate'); ?>'" class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-left: 20px;">
		Holiday
	</div>
	<div onclick="location.href='<?php echo site_url('sms/schoolclosedtemplate') ?>'" class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-top: 20px;">
		School Closed
	</div>
	<div onclick="location.href='<?php echo site_url('sms/vacationtemplate'); ?>'" class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-left: 20px; margin-top: 20px;">
		Vacation
	</div>
	<div onclick="location.href='<?php echo site_url('sms/feeremindertemplate'); ?>'" class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-left: 20px; margin-top: 20px;">
		Fee Reminder
	</div>
	<div onclick="location.href='<?php echo site_url('sms/busdelaytemplate'); ?>'" class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-top: 20px;">
		Bus Delay
	</div>
	<div onclick="location.href='<?php echo site_url('sms/ptmtemplate'); ?>'" class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-top: 20px;margin-left: 20px;">
		PTM
	</div>
	<div onclick="location.href='<?php echo site_url('sms/birthdaytemplate'); ?>'" class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-top: 20px; margin-left: 20px;">
		Birthday
	</div>
    <div onclick="location.href='<?php echo site_url('sms/scheduled'); ?>'" class="col-md-3"
         style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-top: 20px;">
        Scheduled SMS
    </div>
</div>
<?php $this->view('footer'); ?>
