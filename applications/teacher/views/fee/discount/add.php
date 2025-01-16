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
		    <th>Roll No</th>
			<th>Name</th>
			<th>Class</th>
			<th></th>

		</tr>
		
		<form method="POST" action="<?php echo site_url('fee/createStudentDiscount'); ?>">
	
	<?php foreach($students as $row) { ?>
	
		<tr>
		    <td>
		        <input type="checkbox" name="id[]" value="<?php echo $row->id ?>" ?>
		    </td>
		   
		    <input type="hidden" name="discountId" value="<?php echo $discountId ?>" />
		    <td><?php echo $row->Rollno ?></td>
			<td><?php echo $row->Name; ?>
			<td><?php echo $row->Class; ?></td>
			<td style="text-align: center;"></td>
		</tr>
		    
		
	<?php } ?>
	<input type="submit" value="Add" name="">
	</form>
	</table>
</div>
	
<?php $this->view('footer');
