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
									onclick="location.href='<?php echo site_url('student/create'); ?>'">
								<i class="las la-plus-square"></i>
								New Admission
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('student/viewmany'); ?>'">
								<i class="las la-eye"></i>
								View Students
							</button>
							<br>
                            <button class="side-bar-btn"
                                    onclick="location.href='<?php echo site_url('student/listSelect'); ?>'">
                                <i class="las la-list-ol"></i>
                                List of Students
                            </button>
                            <br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('movement/select'); ?>'">
								<i class="las la-arrow-circle-right"></i>
								Check In/Out
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('movement/view'); ?>'">
								<i class="las la-book"></i>
								Log Book
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('student/promote'); ?>'">
								<i class="las la-redo"></i>
								Promote Students
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('metrics'); ?>'">
								<i class="las la-hospital-symbol"></i>
								Metrics
							</button>
							<br>
                            <button class="side-bar-btn"
                                    onclick="location.href='<?php echo site_url('sport'); ?>'">
                                <i class="las la-basketball-ball"></i>
                                Sports
                            </button>
                            <br>
                            <button class="side-bar-btn"
                                    onclick="location.href='<?php echo site_url('student/viewTransferredStudents'); ?>'">
                                <i class="las la-basketball-ball"></i>
                                SLCs
                            </button>
                             <br>
                            <button class="side-bar-btn"
                                    onclick="location.href='<?php echo site_url('student/viewCharacterCertificates'); ?>'">
                                <i class="las la-basketball-ball"></i>
                                Character Certificates
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
									href="#collapse3">
								<i class="las la-chalkboard-teacher"></i>
								Teachers
							</button>
							<br>
						</h4>
					</div>
					<div id="collapse3" class="panel-collapse collapse">
						<div class="panel-body">
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('teacher/add'); ?>'">
								<i class="las la-plus-square"></i>
								Add Teacher
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('teacher/view'); ?>'">
								<i class="las la-eye"></i>
								View Teachers
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('teacher/viewFormer'); ?>'">
								<i class="las la-sign-out-alt"></i>
								Former Teachers
							</button>
							<br>
							<button class="side-bar-btn"
								onclick="location.href='<?php echo site_url('teacher/experienceCertificate'); ?>'">
								<i class="las la-sign-out-alt"></i>
								Experience Certificates
							</button>
							<br>
							</div>
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
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('timetable/add'); ?>'">
								<i class="las la-plus-square"></i>
								New Time Period
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('classs/classes'); ?>'">
								<i class="las la-users"></i>
								Classes
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('event'); ?>'">
								<i class="las la-calendar-check"></i>
								Events
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
									onclick="location.href='<?php echo site_url('exam/newexam'); ?>'">
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
							<button class="side-bar-btn" onclick="location.href='<?php echo site_url('quiz'); ?>'">
								<i class="las la-list-ol"></i>
								Quizzes
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('questionPaper/view'); ?>'">
								<i class="las la-paperclip"></i>
								Question Papers
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('exam/classWiseReport'); ?>'">
								<i class="las la-paperclip"></i>
								Classwise Exam Report
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('exam/classWiseMetrics'); ?>'">
								<i class="las la-paperclip"></i>
								Classwise Metrics
							</button>
							<br>
							<button class="side-bar-btn"
									onclick="location.href='<?php echo site_url('exam/customReportCard'); ?>'">
								<i class="las la-paperclip"></i>
								Custom Report Card
							</button>
						</div>
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