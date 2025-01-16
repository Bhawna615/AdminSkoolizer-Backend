<?php if ($attendance==NULL) { ?>
	<p style="font-family: Questrial-Regular; text-align: center;font-size: 18px;">Attendance not Marked</p>

<?php } foreach($attendance as $row) { ?>
<div class="col-xs-12" style="background: #2995bf; border-radius: 5px; color: white; font-family: Questrial-Regular; padding: 20px; font-size: 16px; margin-bottom: 20px;">
	<p>Class <?php echo $row->Class; ?></p>
	<p>Total Absents: <?php echo $row->Absent; ?></p>
	<p>On Leave:  <?php echo $row->onLeave; ?></p>
	<p>Total Present:  <?php echo $row->Present; ?></p>
	<p>Strength: <?php echo $row->Strength; ?></p>
</div>

<?php } ?>