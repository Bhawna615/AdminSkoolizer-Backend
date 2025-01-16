<?php $this->view('header'); ?>
<style type="text/css">
	       .headings
    {
    	font-family: Nunito_regular;
    	font-size: 20px;
    }
    select
    {
    	font-family: Nunito_regular;
    	outline: none;
    	border: 1px solid;
    	font-size: 20px;
    	margin-bottom: 30px;
    }atte
</style>
<div class="col-md-12" style="padding: 30px;" >
		<form method="POST" action="<?php echo site_url('sms/attendancetemplatesms') ?>">
			<div class="col-md-12">
				<p class="headings">Class</p>
	<select name="class">
				<?php foreach($classes as $row) { ?>
				<option value="<?php echo $row->Classname; ?>"><?php echo "Class ".$row->Classname; ?></option>
				<?php } ?>
			</select>

			</div>
	<div class="col-md-12">
		<input type="submit" name="" value="Go" style="background: #f95555; color: white; font-family: Nunito-Semibold; border: none; width: 10%; font-size: 20px; padding: 5px 0 5px 0; border-radius: 5px;">
	</div>


</form>
	</div>

<?php $this->view('footer'); ?>
