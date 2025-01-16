<?php $this->view('header'); ?>
<div class="col-md-12" style="padding: 30px;">
	<?php foreach($stations as $row) { ?>
		<div class="col-md-12" style="background: #ffffff; border-radius: 4px; margin-top: 40px; padding-top: 10px; border: 1px solid; border-color: rgba(134, 134, 134, 0.17);" align="center">
			<p style="font-family: Nunito-Semibold; font-size: 20px; text-transform: uppercase; color: #000000; width: 100%; text-align: center; "><?php echo $row->stationname; ?></p>
			<div class="col-md-6" align="left">
				<?php foreach($passengers as $key) { if ($key->Stationid==$row->id) { ?>
	<p style="font-family: Questrial-Regular; font-size: 18px; color: #000; margin-bottom: 20px;"><?php echo $key->Name; ?></p>
	<?php } } ?>
			</div>
			<div class="col-md-6" align="center" style="font-family: Nunito_regular; font-size: 18px;">
				<?php foreach($passengers as $key) { if ($key->Stationid==$row->id) { ?>
		<?php if ($key->Presence) { ?>
		<p style="margin-bottom: 20px; background: #76ff03; width: 30%; color: white; border-radius: 5px;">On Board</p>
		 <?php } else { ?> 
		 	<p style="margin-bottom: 20px; background: #f44336; width: 30%; color: white; border-radius: 5px;">Off Board</p>
		 <?php } ?>
	<?php } } ?>
			</div>
	</div>
<?php } ?>
</div>
<?php $this->view('footer'); ?>