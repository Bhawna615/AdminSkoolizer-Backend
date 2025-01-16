<?php $this->view('header') ?>
<?php if (isset($metric)) { ?>
	<form method="POST" action="<?php echo site_url('metrics/save') ?>">
		<input type="hidden" name="metricId" value="<?php echo $metric->metric_id ?>">
		<input type="hidden" name="studentId" value="<?php if (isset($studentId)) echo $studentId ?>">
		<p>Metric</p>
		<p><?php echo $metric->metric_name ?></p>
		<p>Ability</p>
		<p><?php echo $metric->ability ?></p>
		<p>Mark</p>
		<input type="text" name="mark" value="<?php if (isset($studentMetric)) echo $studentMetric->mark?>">
		<button type="submit">Submit</button>
	</form>
<?php } ?>
<?php $this->view('footer') ?>
