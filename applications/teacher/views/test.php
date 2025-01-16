<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<form method="POST" action="<?php echo site_url('home/uploadmarks'); ?>">
	<?php foreach ($students as $row) {  ?>
	<p><?php echo $row->Name; ?></p>
	<p><?php echo $row->Class; ?></p>
	<p><?php echo $row->Rollno; ?></p>
	<input type="hidden" name="name[]" value="<?php echo $row->Name; ?>">
	<input type="hidden" name="class[]" value="<?php echo $row->Class; ?>">
	<input type="hidden" name="rollno[]" value="<?php echo $row->Rollno; ?>">
	<input type="text" name="marks[]">
<?php	} ?>
<button type="submit">Upload</button>
</form>
</body>
</html>