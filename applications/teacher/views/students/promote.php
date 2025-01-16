<?php $this->view('header') ?>
<div class="innerview">
	<div class="col-md-12 message">
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
	<form method="POST" action="<?php echo site_url('student/updateClass') ?>">
		<div>
			<label>
				<p>Class</p>
				<select id="change-class">
					<?php if (!empty($classes)) { ?>
						<?php foreach ($classes as $class) { ?>
							<option value="<?php echo $class->Classname ?>">
								<?php echo $class->Classname; ?>
							</option>
						<?php } ?>
					<?php } ?>
				</select>
			</label>
			<label>
				<p>To</p>
				<select name="toClass">
					<?php if (!empty($classes)) { ?>
						<?php foreach ($classes as $class) { ?>
							<option value="<?php echo $class->Classname ?>">
								<?php echo $class->Classname; ?>
							</option>
						<?php } ?>
						<option value="passed_out">
							Passed Out
						</option>
					<?php } ?>
				</select>
			</label>
		</div>
		<table class="table table-responsive">
			<thead class="dataTableHead">
			<tr>
				<th>
					<input type="checkbox" id="check-all" checked/>
				</th>
				<th>
					Id
				</th>
				<th>Name</th>
				<th>
					Class
				</th>
				<th>
					Roll No
				</th>
				<th>
					Admission No.
				</th>
			</tr>
			</thead>
			<tbody class="dataTableBody">
				<?php if (form_error('ids[]')) { ?>
					<?php echo form_error('ids[]',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>
			</tbody>
		</table>
		<div class="col-md-12 side-btn-bar">
			<div class="col-md-8"></div>
			<div class="col-md-4" align="right">
				<button class="side-btn" type="submit">
					<p>
						<i class="las la-redo btn-icon"></i>
						Promote
					</p>
				</button>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$("#check-all").click(function () {
			$(".check-id").prop('checked', $(this).prop('checked'));
		});
		$.getJSON("<?php echo site_url('student/getByClassJSON/')?>" + $("#change-class").val(), function (result) {
			var student = '';
			$.each(result, function (i, field) {
				student += '<tr><td><input type="checkbox" name="ids[]" class="check-id" checked value="' + field.id + '" </td>';
				student += '<td>' + field.id + '</td>';
				student += '<td>' + field.Name + '</td>';
				student += '<td>' + field.Class + '</td>';
				student += '<td>' + field.Rollno + '</td>';
				student += '<td>' + field.Admno + '</td>';
				student += '</tr>';
			});
			$('.dataTableBody').append(student);
		});

		$("#change-class").on('change', function () {

			$.getJSON("<?php echo site_url('student/getByClassJSON/')?>" + $(this).val(), function (result) {
				var student = '';
				$.each(result, function (i, field) {
					student += '<tr><td><input type="checkbox" name="ids[]" class="check-id" checked value="' + field.id + '" </td>';
					student += '<td>' + field.id + '</td>';
					student += '<td>' + field.Name + '</td>';
					student += '<td>' + field.Class + '</td>';
					student += '<td>' + field.Rollno + '</td>';
					student += '<td>' + field.Admno + '</td>';
					student += '</tr>';
				});
				$('.dataTableBody').empty().append(student);
			});
		});
	});
</script>
<?php $this->view('footer') ?>
