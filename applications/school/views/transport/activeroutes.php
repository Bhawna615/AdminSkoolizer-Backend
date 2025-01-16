<?php $this->view('header'); ?>
<div class="col-md-12" style="padding: 30px;">

	<?php if ($routes==NULL) { ?>
		<p style="font-family: Questrial-Regular; font-size: 30px; text-align: center; margin-top: 50px;">No Routes are Active.</p>
	<?php } ?>
<?php foreach($routes as $row) {?>
	<a href="<?php echo site_url('route/activeroutedetails/').$row->routeid; ?>">
	<div class="col-md-4" style="background: #f95555; border-radius:5px; color: white; padding: 20px; ">
		<p style="font-family: Nunito-Semibold; text-transform: uppercase; font-size: 20px;"><?php echo $row->routename; ?></p>
		<p style="font-family: Questrial-Regular; font-size: 20px;">Status: <span style="color: #76ff03;">Active</span></p>
		<p style="font-family: Questrial-Regular; font-size: 16px;">Started at: <?php $time=date('h:i A d M,Y',strtotime($row->Startedat)); echo $time; ?></p>
	</div>
</a>

<?php } ?>	
</div>

<?php $this->view('footer'); ?>
