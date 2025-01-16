<!DOCTYPE html>
<html>
<head>
    <title>Forgot your Password?</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="theme-color" content="rgba(41, 149, 191, 0.71)">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css")  ?>">
</head>
<body>
<form class="form">
<input type="text" name="email" id="email" placeholder="Email">
<input type="submit" name="" value="Submit" id="submit">
</form>
<div id="content">
    

</form>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript">
     $(document).ready(function(){
    $('#submit').click(function(){
        $('#content').html('<p>A link has been sent to your Email ID</p>');
        var email=$("#email").val();
     
          $.ajax({ 
        url: "<?php echo base_url(); ?>"+"index.php/teacher/email",
        type: "POST",
        dataType:'json',
        data: {email: email}
    })
       return false; 
    })
})
</script>
</body>
</html>