<?php $this->view('header'); ?>
<style type="text/css">
	select {
		border: 1px solid;
		border-color: #A1A1A1;
		width: 90%;
		font-family: Questrial-Regular, serif;
		outline: none;
		font-size: 18px;
		margin-bottom: 10px;
	}
</style>
<div class="col-md-12" style="padding: 30px;">
	<form method="POST" action="<?php echo site_url('SubRoute/insert'); ?>">
		<div class="col-md-12">
			<div class="col-md-4">
				<p class="details">
					Sub Route
				</p>
				<select name="name">
					<option>Morning</option>
					<option>Evening</option>
				</select>

				<p class="details">
					Departure Time
				</p>
				<input
						type="time"
						name="stime"
						class="form-input"
						value="<?php echo set_value('stime') ?>"
				/>
				<?php if (form_error('stime')) { ?>
					<?php echo form_error('stime',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>

				<p class="details">
					Arrival Time
				</p>
				<input
						type="time"
						name="etime"
						class="form-input"
						value="<?php echo set_value('etime') ?>"
				/>
				<?php if (form_error('etime')) { ?>
					<?php echo form_error('etime',
							'<div class="invalid-bar"><i class="las la-exclamation-triangle"></i> ',
							'</div>')
					?>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<p class="details">
					First Station
				</p>
				<select name="fstation">
					<?php foreach ($stations as $row) { ?>
						<option value="<?php echo $row->stationname; ?>"><?php echo $row->stationname; ?></option>
					<?php } ?>
				</select>

				<p class="details">
					Last Station
				</p>
				<select name="lstation">
					<?php foreach ($stations as $row) { ?>
						<option value="<?php echo $row->stationname; ?>"><?php echo $row->stationname; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col-md-4">
				<input
						type="hidden"
						name="routeid"
						value="<?php echo $routeid; ?>"
				/>
			</div>
		</div>
		<div class="col-md-12" style="padding: 20px">
			<input type="hidden" name="routeid" value="<?php echo $routeid; ?>">
			<button type="submit" class="form-submit">Add Subroute</button>
		</div>
	</form>
</div>

<?php $this->view('footer'); ?>
