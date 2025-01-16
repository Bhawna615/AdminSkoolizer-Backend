<?php $this->view('header'); ?>
<style type="text/css">
	.details
    {
    	font-family: Nunito_regular;
    	font-size: 15px;
    	text-transform: uppercase;
    }
</style>
<div class="col-md-12 innerview">
	<table class="table table-responsive table-bordered dataTableFull" id="table">
		<thead class="dataTableHead">
		<tr>
			<th>Roll No.</th>
			<th>Name</th>
			<th>Class</th>
			<th>Actions</th>
		</tr>
		</thead>
		<tbody class="dataTableBody">
		<?php foreach ($students as $row) { ?>
		<tr>
			<td><?php echo $row->Rollno; ?></td>
			<td>
				<a href="<?php echo site_url('student/view/') . $row->id; ?>" style="color: black;">
					<?php echo $row->Name; ?>
				</a>
			</td>
			<td><?php echo $row->Class; ?></td>
			<td>
				<div class="dropdown">
					<i class="material-icons dropdown-toggle" title="More" type="button" data-toggle="dropdown"
					   style="cursor: pointer;">more_vert</i>
					<ul class="dropdown-menu" style="font-family: Questrial-Regular;">
						<li><a>
								<form method="POST" action="<?php echo site_url('student/examreport') ?>">
									<input type="hidden" name="id" value="<?php echo $row->id; ?>">
									<input type="hidden" name="roll" value="<?php echo $row->Rollno; ?>">
									<input type="hidden" name="class" value="<?php echo $row->Class; ?>">

									<input type="submit" title="Exam Report" name="" value="Exam Report"
										   style="background: transparent; border: none; text-align: right;">
								</form>
							</a></li>
						<li><a href="<?php echo site_url('attendance/studentattendance/') . $row->id; ?>">Attendance</a></li>
						<li><a href="<?php echo site_url('student/generatetc/') . $row->id; ?>">Transfer Certificate</a></li>
						<li><a href="<?php echo site_url('student/transportdetails/') . $row->id; ?>">Transport</a></li>
						<li><a href="<?php echo site_url('exam/getdetails/') . $row->id; ?>">Exams</a></li>
						<li><a href="<?php echo site_url('fee/getfeedetails/') . $row->id; ?>">Fee</a></li>
						<li><a href="<?php echo site_url('message/get/') . $row->id; ?>">Messages</a></li>
						<li><a onclick="myFunction(<?php echo $row->id; ?>)" style="cursor: pointer;">Delete</a></li>
					</ul>
				</div>
			</td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
	$(function(){
		$('#table').DataTable({
			"order": [[ 2, "desc" ]],
			responsive: true
		});
	});
</script>
<?php $this->view('footer'); ?>
