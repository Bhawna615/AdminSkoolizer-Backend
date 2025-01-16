<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
	<div class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase;">
		Absent
	</div>
	<div class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-left: 20px;">
		Attendance
	</div>
	<div class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-left: 20px;">
		Holiday
	</div>
	<div class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-top: 20px;">
		School Closed
	</div>
	<div class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-left: 20px; margin-top: 20px;">
		Vacation
	</div>
	<div class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-left: 20px; margin-top: 20px;">
		Fee Reminder
	</div>

	<div class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-top: 20px;">
		Transport Fee
	</div>
	<div class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-top: 20px; margin-left: 20px;">
		Bus Delay
	</div>
	<div class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-top: 20px; margin-left: 20px;">
		PTM
	</div>
	<div class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-top: 20px;">
		Event
	</div>
	<div class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-top: 20px; margin-left: 20px;">
		Exam
	</div>
	<div class="col-md-3"
		 style="background: #f95555; padding: 20px; font-size: 20px; font-family: Nunito-Semibold; color: white; border-radius: 5px; text-transform: uppercase; margin-top: 20px; margin-left: 20px;">
		Result
	</div>
	<form method="POST" action="<?php echo site_url('sms/sendinboxmessage'); ?>" enctype="multipart/form-data">
		<textarea name="message" rows="5" placeholder="Write here..."></textarea>
		<div class="col-md-12" style="margin-top: 30px;">
			<p style="font-family: Nunito_regular; font-size: 25px; color: black; text-align: center;">Select
				Recipients</p>

			<p style="font-family: Nunito_regular; font-size: 18px; color: black;"><input type="checkbox" name="" id="selectall" value="">
				Select All</p>
			<?php if (isset($classes)) { ?>
			<?php foreach ($classes as $key) { ?>
				<div class="col-md-12" style="margin-bottom: 30px;">
					<p style="font-family: Nunito_regular; font-size: 18px; color: black;">
						<input
								type="checkbox"
								name=""
								id="<?php echo $key->Classname . $key->Section; ?>"> <?php echo "Class " . $key->Classname; ?>
					</p>
					<div class="col-md-12">

						<table class="table table-responsive">
							<tr>
								<th>Select</th>
								<th>Roll No.</th>
								<th>Name</th>
								<th>Contact</th>
							</tr>
							<?php foreach ($recieptents as $row) {
								if ($key->Classname == $row->Class) { ?>
									<tr>
										<td>
											<input type="checkbox" name="numbers[]" class="<?php echo $row->Class; ?>"
												   value="<?php echo $row->Smsno; ?>">
										</td>
										<td><?php echo $row->Rollno; ?></td>
										<td><?php echo $row->Name; ?></td>
										<td><?php echo $row->Smsno; ?></td>
									</tr>
								<?php } ?>
							<?php } ?>
						</table>


					</div>

				</div>
			<?php } ?>
			<?php } ?>
		</div>
		<button class="float" title="Send" style="border: none;"><i class="material-icons" style="font-size: 30px; position: relative; left: 3px; top: 2px;">
				send
			</i></button>
	</form>
</div>


<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<?php foreach ($classes as $row) { ?>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#<?php echo $row->Classname; ?>").click(function () {
				if (this.checked) {
					$('.<?php echo $row->Classname; ?>').each(function () {
						$(".<?php echo $row->Classname; ?>").prop('checked', true);
					})
				} else {
					$('.<?php echo $row->Classname; ?>').each(function () {
						$(".<?php echo $row->Classname; ?>").prop('checked', false);
					})
				}
			});
		});

	</script>
<?php } ?>

<script type="text/javascript">
	$(document).ready(function () {
		$("#selectall").click(function () {
			if (this.checked) {
				$('input[type=checkbox]').each(function () {
					$("input[type=checkbox]").prop('checked', true);
				})
			} else {
				$('input[type=checkbox]').each(function () {
					$("input[type=checkbox]").prop('checked', false);
				})
			}
		});
	});
</script>
<?php $this->view('footer'); ?>
