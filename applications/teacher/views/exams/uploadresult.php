<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
	<form method="POST" action="<?php echo site_url('exam/uploadmarks'); ?>">
		<table class="table table-responsive table-bordered">
			<thead class="dataTableHead">
			<tr>
				<th>Roll No.</th>
				<th>Name</th>
				<th>Marks Obtained</th>
			</tr>
			</thead>
			<tbody class="dataTableBody">
			<input type="hidden" name="code" value="<?php if (isset($code)) {
				echo $code;
			} ?>">
			<input type="hidden" name="class" value="<?php if (isset($exam)) {
				echo $exam->Class;
			} ?>">
			<input type="hidden" name="examType" value="<?php echo $examType ?>" />
			<?php if (isset($students)) { ?>
				<?php foreach ($students as $row) { ?>
					<tr>
						<td><?php echo $row->Rollno; ?></td>
						<td><?php echo $row->Name; ?></td>
						<td><input type="hidden" name="name[]" value="<?php echo $row->Name; ?>">
							<input type="hidden" name="rollno[]" value="<?php echo $row->Rollno; ?>">
							<input type="hidden" name="id[]" value="<?php echo $row->id ?>" />
							<input
									type="text"
									step="any"
									name="marks[]"
									max="<?php if (isset($exam)) echo $exam->Maxmarks ?>"
									placeholder="<?php echo $row->Name; ?>"
							/>
							<?php if (form_error('marks[]')) { ?>
								<?php echo form_error('marks[]',
										'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
										'</div>')
								?>
							<?php } ?>
						</td>
					</tr>
				<?php } ?>
			<?php } ?>
			</tbody>
		</table>
		<div class="col-md-12" align="center">
			<button type="submit"
					style="background: #f95555; font-family: Nunito-Semibold; border-radius: 5px; color: white; font-size: 20px; border: none; padding: 5px 30px 5px 30px;">
				Upload
			</button>
		</div>
	</form>
</div>
<?php $this->view('footer'); ?>
