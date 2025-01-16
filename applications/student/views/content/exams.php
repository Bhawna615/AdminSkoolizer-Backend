<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <link href="https://fonts.googleapis.com/css?family=Oregano" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans+JP|Noto+Sans+KR|Roboto+Condensed|Oswald|Thasadith|Lato|Open+Sans|Ubuntu" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>

    <style type="text/css">
        @font-face{
            font-family: Markprol;
            src: url(<?php echo base_url("assets/fonts/Markprol.otf"); ?>);
        }
          @font-face{
        font-family: CarroisCaps;
        src: url(<?php echo base_url("assets/fonts/CarroisCaps.ttf"); ?>);
    }
     @font-face{
        font-family: CircularStd-Medium;
        src: url(<?php echo base_url("assets/fonts/CircularStd-Medium.otf"); ?>);
    }
     @font-face{
        font-family: MARKPROEXTRALIGHT;
        src: url(<?php echo base_url("assets/fonts/MARKPROEXTRALIGHT.otf"); ?>);
    }
    
    </style>
    <style type="text/css">
     select
      {
        background: rgba(41, 149, 191, 0.9);
        color: white;
        border: 1px solid white;
        font-family: CarroisCaps;
        font-size: 20px;
        width: 60%;
        padding: 5px 2px 5px 2px;
        margin-top: 20px;
      }
      select:focus
      {
        outline: none;
      }
      th
      {
        background: #F95555;
        font-family: MARKPROEXTRALIGHT;
      }
      tr#info
      {
        background: #E8F0FE;
        border: 1px solid;
        border-color: #EFB2BA;
        color: #282828;

      }
      td
      {
        border: 1px solid;
        border-color: #EFB2BA;
        color: #282828;
      }
      p#max
      {
        background: rgba(41, 149, 191, 0.9);
        color: white;
        border: 1px solid white;
        font-family: CarroisCaps;
        font-size: 20px;
        width: 90%;
        padding: 3px 2px 3px 2px;
        margin-top: 20px;
        text-align: left;
      }
      </style>
</head>
<body  style="background: rgba(41, 149, 191, 0.75);">
    

    <div class="visible-xs visible-sm">
      <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); color: #FFFFFF; border-bottom: 5px solid; border-color:rgba(41, 149, 191, 0.7); padding: 8px 0 0 0;">
            <div class="col-xs-1" style="padding-left: 15px;">
                <i class="material-icons" onclick="goBack()" style="font-size: 25px; color: #FFFFFF;padding-top:5px; ">arrow_back</i>
            </div>
            <div class="col-xs-9" style="padding-left: 10px;">
                <p style="font-size: 25px; color: #FFFFFF; margin: 0px; padding: 0px; font-family: Markprol; "> Exam Report</p>
            </div>
             <div class="col-xs-2" style="" align="right">
                <i class="material-icons" style="font-size: 30px; color: #FFFFFF;padding-top:5px;">person</i>
            </div>
         </div>
         
          <div class="col-xs-6">
            <select id="code">
              <option selected="selected">Exam</option>
              <?php foreach ($exam as $row) { ?>
                <option id="<?php echo $row->Maxmarks; ?>" value="<?php echo $row->id; ?>"><?php echo $row->Examname; ?></option>
           <?php   } ?>
             
           </select>
          </div>
        
          
       
         
       
          <div class="col-xs-6" align="right">
            <p id="max">Max Marks: </p>
          </div>
          <div class="col-xs-12" style="margin-top: 40px;" align="center">
            <p style="font-family: CircularStd-Medium; font-size: 25px; color: white;" id="ename"></p>
            </div>
         <div id="content">
         
         </div>
  </div>
   
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript">
  $('#code').on('change',function(){
      var code=$('#code option:selected').val();
      var max=$('#code option:selected').attr('id');
      var ename=$('#code option:selected').text();
      $("#content").load('<?php echo site_url('teacher/display/'); ?>'+code);
      $('p#max').html("Max Marks: "+max);
      $('p#ename').html(ename);
  });
  
</script>
<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>