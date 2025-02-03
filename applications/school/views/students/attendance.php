<?php $this->view('header'); ?>
<div class="col-md-12" style="padding: 30px;">
	<?php foreach($info as $row) { ?>
	<div class="col-md-12" style=" border: 1px solid; border-radius: 5px; border-color: #EBEBEC; padding: 0px;">
		<div class="col-md-12" style=" padding: 0px; border-bottom: 1px solid; border-color: #EBEBEC;">
			<div class="col-md-4" style="background: #f95555; padding: 10px 0 10px 0;" align="center">
			<?php if ($row->image!=NULL) { ?>
				<img src="<?php echo base_url('assets/images/students/').$row->image; ?>" style="height: 150px; width: 150px; border-radius: 50%;">
			<?php } else { ?>
				<img src="<?php echo base_url('assets/icons/user.svg'); ?>" style="height: 150px; width: 150px;">
			<?php } ?>
			
		</div>
		<div class="col-md-8" style="padding: 20px; font-family: Questrial-Regular; font-size: 20px;">
			<p><?php echo $row->Name; ?></p>
			<p>Class: <?php echo $row->Class; ?></p>
			<p>Rollno: <?php echo $row->Rollno; ?></p>
		</div>
		</div>
		
		<div class="col-md-12" style="padding: 20px;">
			<p style="font-size: 30px; text-transform: uppercase; font-family: Nunito-Semibold;" align="center">Attendance Details</p>
			<p style="font-family: RedhatR; font-size: 25px;"><span style="font-size: 48px;"><?php echo $attendance[1]; ?></span> out of <span style="font-size: 48px;"><?php echo $attendance[0]; ?></span> days</p>
			<p style="font-family: RedhatR; font-size: 48px;"><?php if ($attendance[0]!=0) {
				$percent=$attendance[1]/$attendance[0]*100;

			}
			else{
				$percent=0;
			} echo intval($percent)."%"; ?></p>
			<p style="font-family: RedhatR; font-size: 20px;">Was absent on following dates: </p>
			<?php foreach($attendance[2] as $key) { ?>
			<p style="font-family: RedhatR; font-size: 20px;"><?php $date=date('d F, Y',strtotime($key->Date)); echo $date; ?></p>
		<?php } ?>
		</div>
	</div>
<?php } ?>
</div>

<?php $this->view('footer'); ?>