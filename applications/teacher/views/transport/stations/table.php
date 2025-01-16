<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Name</th>
		<th>Type</th>
		<th>Charges</th>
		<th>
		    
		</th>
	</tr>
	</thead>
	<tbody class="dataTableBody">
	<?php if (isset($stations)) {?>
	<?php foreach ($stations as $station) { ?>
		<tr>
			<td><?php echo $station->stationname; ?></td>
			<td>
			    <?php echo $station->type; ?>
			</td>
			<td><?php echo $station->charges; ?></td>
			<td>
			     <form method="POST" action="<?php echo site_url('station/addPassenger') ?>">
        				<input type="hidden" name="station_id" value="<?php echo $station->id ?>"
        					<div align="center" style="margin-top: 20px;">
        						<button style="background: white; border: 1px solid #f95555; color: #f95555; border-radius: 5px; padding: 5px 10px 5px 10px; ">
        							Add Students
        						</button>
        					</div>
				        </form>
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
				"order": [[2, "asc"]],
				responsive: true,
			});
		});
	});
</script>
<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure ?");
		if (r == true) {
			location.href = '<?php echo site_url('student/delete/') ?>' + id;
		} else {
			javascript:void (0);
		}
	}
</script>

