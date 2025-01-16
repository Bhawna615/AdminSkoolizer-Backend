<?php $this->view('header') ?>
	<?php if (isset($metric)) { ?>
		<form method="POST" action="<?php echo site_url('metrics/update') ?>">
			<input type="hidden" name="id" value="<?php echo $metric->metric_id ?>">
			<p>Metric</p>
			<input type="text" name="name" value="<?php echo $metric->metric_name ?>" />
			<p>Ability</p>
			<input type="text" name="ability" value="<?php echo $metric->ability ?>">
			<button type="submit">Update</button>
		</form>
	<?php } ?>
<?php $this->view('footer') ?>
