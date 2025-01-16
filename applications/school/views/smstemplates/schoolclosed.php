<?php $this->view('header'); ?>
<div class="col-md-12" style="padding: 30px;">
  <div class="col-md-12" style="font-family: RedhatR; font-size: 16px; border: 1px solid; border-color: #f95555; border-radius: 5px; padding-top: 10px; margin-bottom: 20px;">
    <p style="color: green;">Preview</p>
    <p>Dear Parent,<br>the school will remian closed on 7 Jan,2015 due to All India Strike.Thanks.<br>FBPS desk</p>
  </div>
	 <form method="POST" action="<?php echo site_url('sms/sendschoolclosedsms'); ?>" enctype="multipart/form-data">
<div class="col-md-12" style="margin-top: 30px;">
    <p style="font-family: Nunito_regular; font-size: 25px; color: black; text-align: center;">Select Recipients</p>
    <p class="details">Date</p>
   <input type="date" name="date">
   <p class="details">Reason</p>
   <input type="text" name="reason" placeholder="e.g Petrol Strike">
<p style="font-family: Nunito_regular; font-size: 18px; color: black;"> <input type="checkbox" name="" id="selectall" value=""> Select All</p>

   <?php foreach($classes as $key) { ?>
    <div class="col-md-12" style="margin-bottom: 30px;">
<p style="font-family: Nunito_regular; font-size: 18px; color: black;"><input type="checkbox" name="" id=""> <?php echo "Class ".$key->Classname; ?></p>
<div class="col-md-12">
   
        <table class="table table-responsive">
            <tr>
                <th>Select</th>
                <th>Roll No.</th>
                <th>Name</th>
                <th>Contact</th>
            </tr>
            <?php foreach($students as $row) { 
    if ($key->Classname==$row->Class) { ?>
            <tr>
                <td>
                    <input type="checkbox" name="numbers[]" class="<?php echo $row->Class; ?>" value="<?php echo $row->Smsno; ?>" >
                </td>
                <td><?php echo $row->Rollno; ?></td>
                <td><?php echo $row->Name; ?></td>
                <td><?php echo $row->Smsno; ?></td>
            </tr>
            <?php } ?>
            <?php } ?> 
        </table>



</div>

</div>
<?php } ?> 


</div>
<button class="float" title="Send" style="border: none;"><i class="material-icons" style="font-size: 30px; position: relative; left: 3px; top: 2px;">
send
</i></button>
</form>
</div>

<?php foreach($classes as $row) { ?>
<script type="text/javascript">
  $(document).ready(function(){
$("#<?php echo $row->Classname; ?>").click(function(){
        if(this.checked){
            $('.<?php echo $row->Classname; ?>').each(function(){
                $(".<?php echo $row->Classname; ?>").prop('checked', true);
            })
        }else{
            $('.<?php echo $row->Classname; ?>').each(function(){
                $(".<?php echo $row->Classname; ?>").prop('checked', false);
            })
        }
    });
});

</script>
<?php } ?>

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
</script>
<?php $this->view('footer'); ?>
