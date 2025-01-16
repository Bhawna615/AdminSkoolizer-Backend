<div class="col-xs-12" style="font-family: Nunito-Light; font-size: 20px; padding-top: 50px;">
	<?php if ($student!=NULL) {
		 foreach($student as $row){ if ($row->image==NULL) { ?>
		<i class='material-icons' style='color: #2995BF; font-size: 60px;  position: relative;top: 7px;'>account_circle</i>
	<?php } else { ?>
		<img src="<?php echo $row->image; ?>">
<?php } ?>
	<p style="font-family: Nunito_regular;">Name: <?php  echo $row->Name; ?></p>
	<p>Class: <?php echo $row->Class; ?></p>
	<p>Roll No: <?php echo $row->Rollno; ?></p>
	<?php if ($row->BorrowerId==NULL) { ?>
		<p style="color: #f95555;">Borrower Id Doesn't exists</p>
	<?php } else { ?>
	<p>Borrower Id: <?php echo $row->BorrowerId; ?></p>
	<input type="hidden" name="borrowerid" value="<?php echo $row->BorrowerId; ?>" id="borrowerid">
<?php } ?>
<?php } } else { ?>
	<p style="color: #f95555;">Student not found.</p>

<?php } ?>
</div>