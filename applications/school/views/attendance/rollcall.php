<?php $this->view('header'); ?>
<div class="col-md-12" style="padding: 30px;">
	<p class="headings">Date: <?php if(isset($date)) { echo $date; } ?></p>
	<p class="headings">Class: <?php if(isset($class)) { echo $class; } ?></p>
	<form method="POST" action="<?php echo site_url('attendance/submit') ?>">
		<input type="hidden" name="date" value="<?php echo $date ?>" />
		<table class="table table-responsive table-bordered">
			<thead class="dataTableHead">
			<tr>
			    <th>Id</th>
				<th>Roll No.</th>
				<th>Name</th>
				<th>Leave Requests</th>
				<th>Mark</th>
			</tr>
			</thead>
			<tbody class="dataTableBody">
			<?php if (isset($students)) { ?>
			<?php foreach ($students as $student) { ?>
				<tr>
				<input type="hidden" name="ids[]" value="<?php echo $student->id; ?>">
				<input type="hidden" name="roll[]" value="<?php echo $student->Rollno; ?>">
				<input type="hidden" name="class" value="<?php echo $student->Class; ?>">
				<td><?php echo $student->id ?></td>
				<td><?php echo $student->Rollno ?></td>
				<td><?php echo $student->Name ?></td>
				<td>
				<?php if (isset($leaveRequests)) { ?>
					<?php foreach ($leaveRequests as $request) { ?>
						<?php if ($request->student_id == $student->id && $request->status == true)
						{ echo "Leave Request Approved"; }?>
						<?php } ?>
					<?php } ?>
					</td>
					<td>
						<select name="mark[]" class="form-select">
							<option value="Present" selected>Present</option>
							<option value="Absent">Absent</option>
							<option value="Leave">Leave</option>
						</select>
					</td>
					</tr>
				<?php } ?>
			<?php } ?>
			</tbody>
		</table>

		<div class="col-md-12">
			<button type="submit" class="form-submit">Submit</button>
		</div>

	</form>
</div>

<?php $this->view('footer'); ?>
