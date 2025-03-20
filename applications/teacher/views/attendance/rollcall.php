<?php $this->view('header'); ?>
<!-- <div class="col-md-12" style="padding: 30px;">
	<p class="headings"><?php echo date('d F,Y'); ?></p>
	<form method="POST" action="<?php echo site_url('attendance/submit') ?>">
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
						       <?php if (isset($leaveRequests)) { ?>
                					<?php foreach ($leaveRequests as $request) { ?>
                						<?php if ($request->student_id == $student->id && $request->status == true){  ?>
                						 	<option value="Leave" selected>Leave</option>
                					    <?php  } ?>
                					<?php } ?>
            					<?php } ?>
							<option value="Present">Present</option>
							<option value="Absent">Absent</option>
							<option value="Leave">Leave</option>
						</select>
					</td>
					</tr>
				<?php } ?>
			<?php } ?>
			</tbody>
		</table>

		<div class="col-md-12" align="center">
			<button type="submit" class="form-submit">Submit</button>
		</div>

	</form>
</div> -->


<div class="attendance-container">
<p class="headings">Date: <?php if(isset($date)) { echo $date; } ?></p>
<p class="headings">Class: <?php if(isset($class)) { echo $class; } ?></p>
    <form method="POST" action="<?php echo site_url('attendance/submit') ?>">
    <input type="hidden" name="date" value="<?php echo $date ?>" />
        <table class="attendance-table">
            <thead>
			<tr>
                    <th  class="th-border"><span class="th-content"><i class="las la-id-badge"></i> ID</span></th>
                    <th  class="th-border"><span class="th-content"><i class="las la-list-ol"></i> Roll No.</span></th>
                    <th  class="th-border"><span class="th-content"><i class="las la-user"></i> Name</span></th>
                    <th  class="th-border"><span class="th-content"><i class="las la-check-square"></i> Mark</span></th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($students)) { ?>
                <?php foreach ($students as $student) { ?>
                    <tr>
                        <input type="hidden" name="ids[]" value="<?php echo $student->id; ?>">
                        <input type="hidden" name="roll[]" value="<?php echo $student->Rollno; ?>">
                        <input type="hidden" name="class" value="<?php echo $student->Class; ?>">
                        <td><?php echo $student->id ?></td>
                        <td><?php echo $student->Rollno ?></td>
                        <td><?php echo $student->Name ?></td>
                        <!-- <td>
                            <?php if (isset($leaveRequests)) { ?>
                                <?php foreach ($leaveRequests as $request) { ?>
                                    <?php if ($request->student_id == $student->id && $request->status == true) { ?>
                                        <span class="leave-approved">Leave Request Approved</span>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </td> -->
                        <td>
                            <select name="mark[]" class="form-select">
                                <?php if (isset($leaveRequests)) { ?>
                                    <?php foreach ($leaveRequests as $request) { ?>
                                        <?php if ($request->student_id == $student->id && $request->status == true) {  ?>
                                            <option value="Leave" selected>Leave</option>
                                        <?php  } ?>
                                    <?php } ?>
                                <?php } ?>
								
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>
                                <option value="Leave">Leave</option>
                            </select>
                        </td>
                    </tr>
                <?php } ?>
                <?php } ?>
            </tbody>
        </table>
       
            <button type="submit" class="form-submit"><i class="las la-paper-plane"></i> Submit</button>
       
    </form>
</div>

<style>
    .attendance-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        width: 100%;
        margin: auto;
    }
    .headings {
        font-size: 24px;
        font-weight: bold;
        color: #124E66;
        margin-bottom: 20px;
    }
  

    .attendance-table {
        width: 100%;
        background:  #EDE8F5;
        border-radius: 10px;
        overflow: hidden;
    }
    .attendance-table th, .attendance-table td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }
    .attendance-table th {
        background: #4F6476;
        color: white;
        border: 1px solid #cccccc;
    }

	.th-border {
        border: 1px solid #cccccc;
    }
    .leave-approved {
        color: green;
        font-weight: bold;
    }
    .form-select {
        padding: 5px;
        border-radius: 5px;
    }
    /* .submit-container {
        margin-top: 20px;
    } */
    .form-submit {
		display: inline-block;
		margin-top: 10px;
		padding: 8px 12px;
		background: #4F6476 ;
		color: #ffffff;
		text-decoration: none;
		border-radius: 5px;
		transition: background 0.3s;
    }
    .form-submit:hover {
        background: #218838;
    }
	.th-content {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
	   
    }

	@media (max-width: 768px) {
		.attendance-container {
			width: 90%;
		}

		.attendance-table th {
       font-size: 1rem;
    }
	.attendance-table th i {
		font-size: 1.3rem;
	}

	.form-submit{
		width: 60%;
		

	}
	.la-paper-plane{
		font-size: 3rem;
	}

	.headings {
        font-size: 20px;
	}

	
	}

</style>

<?php $this->view('footer'); ?>





