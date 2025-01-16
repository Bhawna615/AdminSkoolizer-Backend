<?php $this->view('header'); ?>
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
    input[type=text],input[type=date]{
	border: 1px solid black;
	margin-bottom: 20px;
	font-family: Questrial-Regular;
	font-size: 16px;
	width: 30%;
	height: 25px;
}
.details{
	margin-bottom: 20px;
	font-family: Rubik-Regular;
	font-size: 18px;
}
  </style>
<div class="col-md-12" style="padding: 30px;">
	 <form method="POST" action="<?php echo site_url('home/sendptmsms'); ?>" enctype="multipart/form-data">
<div class="col-md-12" style="margin-top: 30px;">
    <p style="font-family: Nunito_regular; font-size: 25px; color: black; text-align: center;">Select Recipients</p>
    <p class="details">From</p>
   <input type="time" name="from">
   <p class="details">To</p>
   <input type="time" name="to">

   <p class="details">Date</p>
   <input type="date" name="date">
<p style="font-family: Nunito_regular; font-size: 18px; color: black;"> <input type="checkbox" name="" id="selectall" value=""> Select All</p>

   <?php foreach($classes as $key) { ?>
    <div class="col-md-12" style="margin-bottom: 30px;">
<p style="font-family: Nunito_regular; font-size: 18px; color: black;"><input type="checkbox" name="" id="<?php echo $key->Classname.$key->Section; ?>"> <?php echo "Class ".$key->Classname; ?></p>
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