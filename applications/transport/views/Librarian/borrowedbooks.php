<div class="col-xs-12" style="font-family: Nunito_regular; background: #f95555; color: white; margin-top: 50px;">
	<p align="center" style="font-family: Nunito_regular; font-size: 22px;">Issued Books</p>
	<?php foreach($borrower as $row) { ?>
		<div style="margin-bottom: 80px;">
			<p align="center" style="font-size: 20px;"><?php echo $row->TransactionId.". ".$row->Title; ?></p>
	<div class="col-xs-6">
		From: <?php echo $row->IssueDate; ?>
	</div>
	<div class="col-xs-6" align="right">
		To: <?php  echo $row->DueDate; ?>
	</div>
		</div>
	
<?php } ?>
</div>