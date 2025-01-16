<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
   
      <style type="text/css">
    @font-face{
      font-family: Nunito_regular;
      src: url(<?php echo base_url("assets/fonts/Nunito_regular.ttf"); ?>);
    }
    @font-face{
      font-family: Nunito-Light;
      src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
    }
    @font-face{
      font-family: RedhatR;
      src: url(<?php echo base_url("assets/fonts/RedhatR.ttf"); ?>);
    }
    @font-face{
      font-family: Nunito-Semibold;
      src: url(<?php echo base_url("assets/fonts/Nunito-Semibold.ttf"); ?>);
    }
    @font-face{
      font-family: Questrial-Regular;
      src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
    }
    @font-face{
      font-family: Rubik-Medium;
      src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
    }
    @font-face{
      font-family: Rubik;
      src: url(<?php echo base_url("assets/fonts/Rubik-Regular.ttf"); ?>);
    }
  
    .icon
    {
      height: 20px;
      width: 20px;
      padding-top: 5px;
    }
    #headings
    {
      font-family: Rubik;
      font-size: 14px;
      color: rgba(0,0,0,0.70);
    }
     input[type=Password]
        {
          border: 0px;
          border-bottom: 1px solid;
          border-color: #666666;
          background: #fff;
          width: 100%;
          font-size: 16px;
          font-family: Rubik;
          margin-top: 20px;
        }
        input:focus
        {
          outline: none;
        }
        #values
        {
          border: 0px;
          border-bottom: 1px solid;
          border-color: #666666;
          background: #fff;
          width: 100%;
          font-size: 18px;
          font-family: Questrial-Regular;
        }
          ::placeholder
        {
          color: #363636;
        }
  </style>
</head>
<body style="background: white;">
   <div class="visible-xs visible-sm">
         <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); padding-top: 10px;">
  <div class="col-xs-1" style="padding: 0px;">
    <img onclick="goBack()" src="<?php echo base_url('assets/icons/left-arrow.svg'); ?>" class="icon">
  </div>
  <div class="col-xs-11" style="padding: 0px;">
    <p style="color: white; font-size:20px; font-family: Nunito-Light; ">Change Password</p>
  </div>
</div>
 <div class="col-xs-12" style="margin-top: 20px;">
  <?php foreach($password as $row) { ?>
    <div class="col-xs-12">
      <p id="headings">Email ID</p>
           <p id="values"><?php foreach ($password as $row) { echo $row->Email; } ?></p>
           <p id="headings">PHONE NUMBER</p>
           <p id="values"><?php foreach ($password as $row) { echo $row->Contact; } ?></p>
           <form name="password" method="POST" action="<?php echo site_url('transport/updatepassword'); ?>">
           <input type="password" id="old" name="old" placeholder="Old Password">
           <input type="password" name="new" id="pass" placeholder="New Password">
           <input type="password" name="confirm" placeholder="Confirm Password" style="margin-bottom: 50px;">
    </div>
           
           <div class="col-xs-6">
             <input type="submit" value="Save" style="border:none;border-radius: 5px; color: white;background: #5789D6; font-size: 16px; font-family: Rubik; padding: 5px 42px 5px 42px;" name="">
           </div>
         </form>
           <div class="col-xs-6">
             <input onclick="goBack()" type="submit" value="Cancel" style="color: #363636; border: 1px solid; border-color: #363636; border-radius: 5px;font-size: 16px; font-family: Rubik; padding: 4px 40px 4px 40px; background: #fff;" name="">
           </div>
         <?php } ?>
         </div>

</div>
<script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery-validation/dist/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript">
  $(function(){
   var old= $('#old').val();
  $("form[name='password']").validate({
    rules: {
      
      new: {
        required: true,
        minlength:8,

      },
      confirm:{
    
        equalTo: "#pass"
      },
      old:{
        required: true,
        minlength:8,
      }
  },
  messages:{
    new: {
      required: "Password required",
      minlength: "Must contain minimum 8 characters"
    },
    confirm: {
      
      equalTo: "Do not Match"

    },
    old: {
      required: "Password required",
      minlength: "Must contain minimum 8 characters"
    }
  },
  submitHandler: function(form){
    form.submit();
  }
});
});


</script>
</body>
</html>