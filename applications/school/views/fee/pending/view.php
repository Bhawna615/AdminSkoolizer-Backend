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
    <p>Dear Parent, The school fee of your ward is pending. You are requested to pay fee before due date to avoid late fee charges.</p>
  </div>
            <form method="POST" action="<?php echo site_url('sms/sendFeeReminder'); ?>" enctype="multipart/form-data">
  </div>
<div class="col-md-12" style="margin-top: 30px;">
<p style="font-family: Nunito_regular; font-size: 18px; color: black;"> <input type="checkbox" name="" id="selectall" value=""> Select All</p>

    <div class="col-md-12" style="margin-bottom: 30px;">
<div class="col-md-12">
   
        <table class="table table-responsive">
            <tr>
                <th>Select</th>
                <th>Payment Id</th>
                <th>Name</th>
                <th>Admission No</th>
                <th>Class</th>
                <th>Amount</th>
                <th>Period</th>
                <th>Status</th>
            </tr>
            <?php foreach($pendingPayments as $payment) { ?>
            <tr>
                <td>
                    <input type="checkbox" name="id[]" class="<?php echo $payment->student_id; ?>" value="<?php echo $payment->student_id; ?>" >
                </td>
                <td><?php echo $payment->feeid; ?></td>
                <td><?php echo $payment->admission_number; ?></td>
                <td><?php echo $payment->studentname; ?></td>
                <td><?php echo $payment->class; ?></td>
                <td><?php echo $payment->amount; ?></td>
                <td><?php echo $payment->period; ?></td>
                <td><?php if($payment->status == 0 || $payment->status == null){ echo "Pending"; }else {echo "Paid";} ?></td>
            </tr>
       
            <?php } ?> 
        </table>



</div>

</div>



</div>
<button class="float" title="Send" style="border: none;"><i class="material-icons" style="font-size: 30px; position: relative; left: 3px; top: 2px;">
send
</i></button>
</form>
    </div>


<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
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
