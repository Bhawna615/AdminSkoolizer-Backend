<?php $this->view('header'); ?>
	<div class="col-md-12 innerview">
		<p class="headings"><?php echo date('d F,Y'); ?></p>
		<form method="POST" action="<?php echo site_url('employee/submitattendance') ?>">
			<table class="table table-responsive table-bordered">
				<thead class="dataTableHead">
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Mark</th>
				</tr>
				</thead>
				<tbody class="dataTableBody">
				<?php if (isset($employees)) { ?>
					<?php foreach($employees as $row) { ?>
							<tr>
								<td><?php echo $row->id ?></td>
								<td><?php echo $row->empname ?></td>
								<td>
									<input type="hidden" name="id[]" value="<?php echo $row->id; ?>">
									<select name="mark[]" class="form-select">
										<option value="Present">Present</option>
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
	</div>
<?php $this->view('footer'); ?>
