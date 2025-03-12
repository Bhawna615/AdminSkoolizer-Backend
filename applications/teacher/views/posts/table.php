<style>
	/* Styling the table container */

	.innerview {
		/* margin: 20px;
		padding: 20px !important; */
		background: #ffffff;
		border-radius: 10px;
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		transition: 0.3s ease-in-out;
		width: 100%;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		height: max-content;
	}

	#table {
		width: 100%;
		height: max-content;
		border-collapse: collapse;
		background: white;
		box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
		border-radius: 8px;
		overflow: hidden;
		animation: fadeIn 0.5s ease-in-out;
	}

	/* Table header styling */
	.dataTableHead {
		background: #87CEFA;
		/* Light Blue */
		color: white;
		font-size: 0.7rem;
		text-transform: uppercase;
		font-weight: bold;
	}

	/* Table row styling */
	.dataTableBody tr {
		transition: all 0.3s ease-in-out;
	}

	/* Alternating row colors */
	.dataTableBody tr:nth-child(even) {
		background: #f8f9fa;
	}

	.dataTableBody tr:nth-child(odd) {
		background: #ffffff;
	}

	/* Hover effect */
	.dataTableBody tr:hover {
		background: #d1ecff;
		transform: scale(1.02);
		box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
	}

	/* Table cells styling */
	th,
	td {
		/* padding: 12px; */
		text-align: left;
		font-size: 0.6rem;
		border-bottom: 1px solid #ddd;
	}

	/* Styling the file link */
	td a {
		color: #007bff;
		font-weight: bold;
		text-decoration: none;
		transition: color 0.3s;
	}

	td a:hover {
		color: #0056b3;
		text-decoration: underline;
	}

	/* Action button styling */
	.dt-action-btn {
		background: #ff4d4d;
		color: white;
		border: none;
		padding: 8px 12px;
		border-radius: 5px;
		cursor: pointer;
		transition: all 0.3s ease;
	}

	.dt-action-btn:hover {
		background: #cc0000;
	}

	.btn-icon {
		font-size: 1.2rem;
	}

	/* Animation for fade-in effect */
	@keyframes fadeIn {
		from {
			opacity: 0;
			transform: translateY(-10px);
		}

		to {
			opacity: 1;
			transform: translateY(0);
		}
	}
</style>


<div class="loader hidden">
	<img src="<?php echo base_url('assets/gif/giphy.gif') ?>" alt="Loading..." />
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
			<?php if (isset($posts)) { ?>
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
			javascript: void (0);
		}
	}
</script>