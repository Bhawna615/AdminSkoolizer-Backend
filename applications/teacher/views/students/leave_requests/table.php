<!-- <table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Id</th>
		<th>Student Id</th>
		<th>Name</th>
		<th>Class</th>
		<th>Roll No</th>
		<th>Date</th>
		<th>Reason</th>
		<th>Status</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (isset($leaveRequests)) { ?>
	<?php foreach ($leaveRequests as $request) { ?>
		<tr>
			<td><?php echo $request->id; ?></td>
			<td><?php echo $request->student_id; ?></td>
			<td><?php echo $request->student_name; ?></td>
			<td><?php echo $request->student_class; ?></td>
			<td><?php echo $request->student_roll_no; ?></td>
			<td><?php echo $request->date; ?></td>
			<td><?php echo $request->reason; ?></td>
			<td><?php if($request->status) {echo "Approved"; } else { echo "Unapproved";} ?></td>
			<td>
			<?php if(!($request->status)) { ?>
				<button  onclick="myFunction(<?php echo $request->id ?>)" class="dt-action-btn" title="Approve">
					<i class="las la-check btn-icon"></i>
				</button>
			<?php } ?>
			</td>
		</tr>
	<?php } ?>
	<?php } ?>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function () {
		$(function () {
			$('#table').DataTable({
				"order": [[0, "asc"]],
				responsive: true,
			});
		});
	});
</script>

<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure you want to approve this request ?");
		if (r == true) {
			location.href = '<?php echo site_url('student/approveLeaveRequest/') ?>' + id;
		} else {
			javascript:void (0);
		}
	}
</script> -->



<style>
	.student-cards-container {
		display: flex;
		flex-wrap: wrap;
		gap: 20px;
		justify-content: center;
		align-items: center;
		height: max-content;
		width: 100%;

	}

	.student-card {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		gap: 20px;
		border: 1px solid #e3e3e3;
		border-radius: 10px;
		padding: 15px;
		box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
		transition: all 0.3s ease;
		width: 100%;
	}
	.student-card.approved {
        background: #BEE3F8 /* Light green for approved */
    }
    .student-card.unapproved {
        background: #f8d7da; /* Light red for unapproved */
    }

	.student-card:hover {
		transform: translateY(-5px);
		box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
	}

	/* Animated Heading */
	.animated-heading {
		display: flex;
		align-items: center;
		justify-content: center;
		font-family: Nunito-Semibold;
		color: #4F6476;
		font-size: 28px;
		margin-bottom: 25px;
		animation: slideDown 1s ease-in-out;
	}

	.animated-heading i {
		font-size: 30px;
		color: #6C63FF;
		margin-right: 12px;
		animation: bounce 1.5s infinite ease-in-out;
	}

	.student-table {
		width: 100%;
		margin-top: 10px;

	}

	.student-table td {
		padding: 5px;
		text-align: left;
		font-size: 1.2rem;
		font-family: Nunito-Semibold;
		color: #333;
	}

	.view-btn {
		display: inline-block;
		margin-top: 10px;
		padding: 8px 12px;
		background: #4F6476;
		color: #ffffff;
		text-decoration: none;
		border-radius: 5px;
		transition: background 0.3s;
	}

	.view-btn:hover {
		background: #0056b3;
	}
</style>



<div class="col-md-12 innerview">
<div class="animated-heading">
		<i class="las la-check-circle"></i>Approve Request
	</div>
    <div class="message">
        <?php if ($this->session->flashdata('error')) { ?>
            <div class="col-md-12 error-bar">
                <i class="las la-exclamation-triangle"></i>
                <?php echo $this->session->flashdata('error') ?>
                <?php $this->session->unset_userdata('error') ?>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="col-md-12 col-lg-12 success-bar">
                <i class="las la-check-square"></i>
                <?php echo $this->session->flashdata('success') ?>
                <?php $this->session->unset_userdata('success') ?>
            </div>
        <?php } ?>
    </div>

    <div class="student-cards-container">
        <?php if (isset($leaveRequests)) { 
			 usort($leaveRequests, function($a, $b) {
                return $a->status - $b->status;
            });
			?>
            <?php foreach ($leaveRequests as $request) { ?>
                <div class="student-card <?php echo $request->status ? 'approved' : 'unapproved'; ?>">
                    <h3 style="padding: 10px; font-weight:bold; font-size:1.5rem; color: #124E66; text-transform:capitalize; background-color: #fff"><?php echo $request->student_name; ?></h3>
                    <table  class="student-table" border="1" cellspacing="0" cellpadding="10"
					style="width: 100%; text-align: left; border-collapse: collapse;">
                        <tr style="border:none;"><th style="padding: 10px; font-size:1.1rem;"><strong>Student ID:</strong></th><td style="padding: 10px; font-size:1.1rem;"><?php echo $request->student_id; ?></td></tr>
                        <tr style="border:none;"><th style="padding: 10px; font-size:1.1rem;"><strong>Class:</strong></th><td style="padding: 10px; font-size:1.1rem;"><?php echo $request->student_class; ?></td></tr>
                        <tr style="border:none;"><th style="padding: 10px; font-size:1.1rem;"><strong>Roll No:</strong></th><td style="padding: 10px; font-size:1.1rem;"><?php echo $request->student_roll_no; ?></td></tr>
                        <tr style="border:none;"><th style="padding: 10px; font-size:1.1rem;"><strong>Date:</strong></th><td style="padding: 10px; font-size:1.1rem;"><?php echo $request->date; ?></td></tr>
                        <tr style="border:none;"><th style="padding: 10px; font-size:1.1rem;"><strong>Reason:</strong></th><td style="padding: 10px; font-size:1.1rem;"><?php echo $request->reason; ?></td></tr>
                        <tr style="border:none;"><th style="padding: 10px; font-size:1.1rem;"><strong>Status:</strong></th><td style="padding: 10px; font-size:1.5rem; font-weight:bold; color: #124E66;"><?php echo $request->status ? "Approved" : "Unapproved"; ?></td></tr>
                    </table>
                    <?php if(!$request->status) { ?>
                        <button onclick="myFunction(<?php echo $request->id ?>)" class="view-btn" title="Approve">
                            Approve
                        </button>
                    <?php } ?>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>



<script type="text/javascript">
    function myFunction(id) {
        var r = confirm("Are you sure you want to approve this request?");
        if (r == true) {
            location.href = '<?php echo site_url('student/approveLeaveRequest/') ?>' + id;
        }
    }
</script>


