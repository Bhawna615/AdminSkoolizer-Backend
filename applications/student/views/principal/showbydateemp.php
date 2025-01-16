<div class="col-xs-12">
	<table class="table table-responsive">
		<tr>
			<th>S.No</th>
			<th>Employee</th>
			<th>Post</th>
			<th>Mark</th>
		</tr>

		<?php foreach($employee as $row) { ?>
			<tr>
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->empname; ?></td>
				<td><?php echo $row->Post; ?></td>
				<td>
					<?php if ($attendance!=NULL) {
						
					 $mark='Present'; foreach ($attendance as $value) { 
						foreach($absentees as $key)
						{
							if ($key->empid==$row->id) {
								$mark='Leave';
							}
						}
					} echo $mark; ?>
				</td>
			</tr>
		<?php } else{
			echo "Attendance not marked";
		} } ?>
	</table>
	
</div>