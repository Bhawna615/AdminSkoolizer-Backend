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
									onclick="location.href='<?php echo site_url('exam/examDetails'); ?>'">
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