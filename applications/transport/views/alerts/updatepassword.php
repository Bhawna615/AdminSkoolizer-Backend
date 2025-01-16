<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>"/>
     <style type="text/css">
        @font-face{
      font-family: Rubik;
      src: url(<?php echo base_url("assets/fonts/Rubik-Regular.ttf"); ?>);
    }
     </style>
</head>
<body style="background: #fff;">
   <div class="visible-xs visible-sm">
    <div class="col-xs-12" align="center" style="padding-top: 150px; padding-bottom: 150px;">
      <img src="<?php echo base_url('assets/images/success.svg'); ?>" style="width: 300px; height: 300px;">
      <button style="background: transparent; outline: none; border-radius: 4px; width: 70%; font-family: Rubik; font-size: 20px; border: 2px solid #25ae88; text-transform: uppercase; color: #25ae88; margin-top: 20px;">Password Updated</button>
    </div>

</div>
<script type="text/javascript">
 
 setTimeout(function () {
   window.location.href= '<?php echo site_url('home'); ?>'; // the redirect goes here

},2500); // 5 seconds
</script>
</body>
</html>