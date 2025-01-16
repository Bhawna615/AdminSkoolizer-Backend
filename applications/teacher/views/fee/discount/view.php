<?php $this->view('header'); ?>
<div class="col-md-12 innerview">
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

	<div class="col-md-12 side-btn-bar">
		<div class="col-md-8"></div>
		<div class="col-md-4" align="right">
			<button class="side-btn"
					type="button"
					onclick="location.href = '<?php echo site_url('fee/createDiscount') ?>'  "
			>
				<p>
					<i class="material-icons btn-icon">add</i>
					Add Discount
				</p>
			</button>
		</div>
	</div>
	<table class="table table-responsive table-bordered dataTableFull" id="table">
		<thead class="dataTableHead">
		<tr>
			<th>Id</th>
			<th>Fee Type</th>
			<th>Amount</th>
			<th>Actions</th>
		</tr>
		</thead>
		<tbody class="dataTableBody">
		<?php if (isset($discounts)) { ?>
			<?php foreach ($discounts as $discount) { ?>
				<tr>
					<td><?php echo $discount->id; ?></td>
					<td><?php echo $discount->fee_type; ?></td>
					<td><?php echo $discount->amount; ?></td>
					<td>
					    <form method="POST" action="<?php echo site_url('fee/addStudentToDiscount') ?>">
        					<input type="hidden" name="discount_id" value="<?php echo $discount->id; ?>">
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
</div>

<script type="text/javascript">
	$(function () {
		$('#table').DataTable({
			"order": [[0, "desc"]],
			responsive: true
		});
	});
</script>

<script type="text/javascript">
	function myFunction(id) {
		var r = confirm("Are you sure ?");
		if (r === true) {
			location.href = '<?php echo site_url('fee/delete/') ?>' + id;
		} else {
			void (0);
		}
	}
</script>
<?php $this->view('footer'); ?>
