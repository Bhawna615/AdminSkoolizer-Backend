<?php $this->view('header'); ?>
<style>
    textarea
    {
        background: #f95555;
        border-radius: 5px;
        font-family: Questrial-Regular;
        font-size: 18px;
        width: 100%;
        outline: none;
        padding: 20px;
        color: white;
        border: none;

    }
    ::placeholder
    {
      color: white;
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
input[type=file]{
    font-family: Questrial-Regular;
    border: 1px solid;
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
    <p>Dear parent,<br>Your Message here<br>FBPS Desk</p>
  </div>
            <form method="POST" action="<?php echo site_url('sms/sendcustomsms'); ?>" enctype="multipart/form-data">
<textarea name="message" rows="5" placeholder="Write here... Note: Do not use Dear Parent and School name. It has been already added in template." maxlength="136"></textarea>
<div id="the-count">
    <span id="current">0</span>
    <span id="maximum">/ 136</span>
  </div>
<div class="col-md-12" style="margin-top: 30px;">
    <p style="font-family: Nunito_regular; font-size: 25px; color: black; text-align: center;">Select Recipients</p>
   
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


<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
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
<script type="text/javascript">
    $('textarea').keyup(function() {
    
  var characterCount = $(this).val().length,
      current = $('#current'),
      maximum = $('#maximum'),
      theCount = $('#the-count');
    
  current.text(characterCount);
 
  
  /*This isn't entirely necessary, just playin around*/
  if (characterCount < 70) {
    current.css('color', '#666');
  }
  if (characterCount > 70 && characterCount < 90) {
    current.css('color', '#6d5555');
  }
  if (characterCount > 90 && characterCount < 100) {
    current.css('color', '#793535');
  }
  if (characterCount > 100 && characterCount < 120) {
    current.css('color', '#841c1c');
  }
  if (characterCount > 120 && characterCount < 139) {
    current.css('color', '#8f0001');
  }
  
  if (characterCount >= 140) {
    maximum.css('color', '#8f0001');
    current.css('color', '#8f0001');
    theCount.css('font-weight','bold');
  } else {
    maximum.css('color','#666');
    theCount.css('font-weight','normal');
  }
  
      
});
</script>
<?php $this->view('footer'); ?>
