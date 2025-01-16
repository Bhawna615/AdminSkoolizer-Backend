<div class="col-xs-12" style="margin-top: 20px;">
	
	<?php foreach($students as $row) { ?>
		<div class="col-xs-12" style="background: #2995bf; padding: 20px; border-radius: 5px; margin-bottom: 20px; color: white;">
			<div class="col-xs-4">
				<img src="<?php echo base_url('assets/icons/user.svg'); ?>" style="width: 100px; height: 100px;">
			</div>
			<div class="col-xs-8" style="font-family: Questrial-Regular; font-size: 16px;">
					<p><?php echo $row->Name; ?></p>
			<p>Rollno: <?php echo $row->Rollno; ?></p>
			<p>Father's name: <?php echo $row->Fname; ?></p>
			<p>Contact: <?php echo $row->Contact; ?></p>
			</div>
		</div>
	<?php } ?>
</div>