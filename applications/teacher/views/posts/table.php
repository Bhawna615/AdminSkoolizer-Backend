<div class="loader hidden">
	<img src="<?php echo base_url('assets/gif/giphy.gif') ?>"  alt="Loading..."/>
	<span class="loader-message" id="loader-message">Loading...</span>
</div>
<table class="table table-responsive table-bordered dataTableFull" id="table">
	<thead class="dataTableHead">
	<tr>
		<th>Id</th>
		<th>Recipient Group</th>
		<th>Text</th>
		<th>File</th>
		<th>Created At</th>
		<th>Action</th>
	</tr>

	</thead>
	<tbody class="dataTableBody">
	<?php if( isset($posts)) { ?>
		<?php foreach ($posts as $post) { ?>
			<tr>
				<td><?php echo $post->id; ?></td>
				<td><?php echo $post->recipient_group ?></td>
				<td><?php echo $post->text ?></td>
				<td>
					<?php if (!empty($post->url)) { ?>
						<a href="<?php echo $post->url ?>" target="_blank">
							View File
						</a>
					<?php } ?>
				</td>
				<td><?php echo $post->created_at; ?></td>
				<td>
						<button class="dt-action-btn" onclick="myFunction(<?php echo $post->id ?>)">
							<i class="las la-trash btn-icon"></i>
						</button>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
	</tbody>
</table>

<script type="text/javascript">
	$(function () {
		$('#table').DataTable({
			"order": [[4, "desc"]],
			responsive: true,
		});
	});
</script>
<script type="text/javascript">
	function myFunction(id) {

		var r = confirm("Are you sure ?");
		if (r == true) {
			location.href = '<?php echo site_url('post/delete/') ?>' + id;
		} else {
			javascript:void (0);
		}
	}
</script>
