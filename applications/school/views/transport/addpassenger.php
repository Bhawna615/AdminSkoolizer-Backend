<?php $this->view('header'); ?>
<style type="text/css">
	 th
    {
      background: #EBEBEC;
      font-family: Nunito-Semibold; 
      text-transform: uppercase;
      color: black;
      border-right: 1px solid;
      border-color: #C5C5C5;
  
    }
    td
    {
      border: 1px solid;
      border-color: #C5C5C5;
      font-family: Nunito;

    }
    input[type=submit]{
    	border: 1px solid #f95555;
    	background: none;
    	color: #f95555;
    	width: 50%;
    }
</style>
<div class="col-md-12" style="padding: 30px;">
	<table class="table table-responsive">
		<tr>
			<th>Name</th>
			<th>Class</th>
			<th></th>
		</tr>
		
	
	<?php foreach($students as $row) { ?>
		<form method="POST" action="<?php echo site_url('passenger/insert'); ?>">
	
		<tr>
			<td><?php echo $row->Name; ?>
			<input type="hidden" name="station" value="<?php echo $station; ?>">
			<input type="hidden" name="route" value="<?php echo $route; ?>"></td>
			<input type="hidden" name="id" value="<?php echo $row->id; ?>">
		    <input type="hidden" name="name" value="<?php echo $row->Name; ?>">
			<td><?php echo $row->Class; ?></td>
			<td style="text-align: center;"><input type="submit" value="Add" name=""></td>
		</tr>
		
		</form>
	<?php } ?>
	</table>
</div>
	
<?php $this->view('footer');
