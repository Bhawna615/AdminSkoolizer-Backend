<?php $this->view('header') ?>
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
</style>
 <style type="text/css">
    *{padding:0;margin:0;}
.float{
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#f95555;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  box-shadow: 2px 2px 3px #999;
  z-index: 1;
}

.my-float{
  margin-top:22px;
}
  </style>
<div class="col-md-12" style="padding: 30px;">
  <div class="col-md-12" style="font-family: RedhatR; font-size: 16px; border: 1px solid; border-color: #f95555; border-radius: 5px; padding-top: 10px; margin-bottom: 20px;">
    <p style="color: green;">Preview</p>
    <p>Dear Parent, You are notified that your ward  is absent from school today. Regards, SPIPS</p>
  </div>
	<form method="POST" action="<?php echo site_url('sms/sendabsentsms') ?>">
	<table class="table table-responsive">
		<tr>
			<th><input type="checkbox" name="" id="selectall"> Select All</th>
			<th>Count</th>
			<th>Absentee</th>
			<th>Class</th>
			<th>Roll No.</th>
			<th>Contact</th>
		</tr>

		<?php 
		$i = 1;
		foreach($absentees as $row) { ?>
			<tr>
				<td><input type="checkbox" name="id[]" value="<?php echo $row->id; ?>"></td>
				<td><?php echo $i; ?> </td>
				<td><?php echo $row->Name; ?></td>
				<td><?php echo $row->Class; ?></td>
				<td><?php echo $row->Rollno; ?></td>
				<td><?php echo $row->Smsno; ?></td>
			</tr>
		<?php $i = $i + 1 ;} unset($i); ?>
	</table>
	<button class="float" title="Send" style="border: none;"><i class="material-icons" style="font-size: 30px; position: relative; left: 3px; top: 2px;">
send
</i></button>
</form>
</div>


<script type="text/javascript">
  $(document).ready(function(){
$("#selectall").click(function(){
        if(this.checked){
            $('input[type=checkbox]').each(function(){
                $("input[type=checkbox]").prop('checked', true);
            })
        }else{
            $('input[type=checkbox]').each(function(){
                $("input[type=checkbox]").prop('checked', false);
            })
        }
    });
});

  function encode() {
  var obj = document.getElementById('dencoder');
  var unencoded = obj.value;
  obj.value = encodeURIComponent(unencoded).replace(/'/g,"%27").replace(/"/g,"%22");  
}
</script>
<?php $this->view('footer'); ?>
