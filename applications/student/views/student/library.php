<!DOCTYPE html>
<html>
<head>
    <title>My Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
   
     <style type="text/css">
     select
      {
        background: transparent;
        color: black;
        border: 1px solid white;
        font-family: Nunito_regular;
        font-size: 16px;
        width: auto;
         -webkit-appearance: none;
    -moz-appearance: none;
      }
      select:focus
      {
        outline: none;
      }
  
      </style>
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
  </style>
</head>
<body style="background: white;">
   <div class="visible-xs visible-sm">
         <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); padding-top: 10px;">
  <div class="col-xs-1" style="padding: 0px;">
    <img onclick="goBack()" src="<?php echo base_url('assets/icons/left-arrow.svg'); ?>" class="icon">
  </div>
  <div class="col-xs-11" style="padding: 0px;">
    <p style="color: white; font-size:20px; font-family: Nunito-Light; ">My Library</p>
  </div>
</div>
<div class="col-xs-12" align="center" style="padding-top: 30px;">
<?php if ($info!=NULL) {
 foreach($info as $row) { ?>

    <p style="font-family: Rubik-Medium; font-size: 20px;">BOOKS ISSUED</p>
    <div class="col-xs-12" style="background: #5789D6;padding: 0px;   border: 1px solid; border-radius: 4px; border-color: #B3B9BE;">
        <div class="col-xs-4" style="padding-top: 40px; color: white; font-family: Rubik">
            <p style="margin: 0px;">Issued On:</p>
            <p><?php echo $row->IssueDate; ?></p>
        </div>
        <div class="col-xs-8" style="background: white; padding:10px; color: black;">
            <p style="font-family: Nunito-Semibold; color: black;"><?php echo $row->Title; ?></p>
            <p style="text-align: left; font-family: Questrial-Regular;">Accession No<span style="float: right;"><?php echo $row->AccessionNo; ?></span></p>
            <p style="text-align: left; font-family: Questrial-Regular;">Due Date<span style="float: right;"><?php $date=date('D, d F',strtotime($row->DueDate)); echo $date; ?></span></p>
            <?php if ($row->ReturnDate!=NULL) { ?>
             <p style="text-align: left; font-family: Questrial-Regular;">Return Date<span style="float: right;"><?php $date=date('D, d F',strtotime($row->ReturnDate)); echo $date; ?></span></p>
            <?php } ?>
        </div>
    </div>
<?php } } ?>
</div>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>