<!DOCTYPE html>
<html>
<head>
    <title>Conduct an Exam</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/js/jqueryui/jquery-ui.css"); ?>">
     <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
     <script type="text/javascript" src="<?php echo base_url("assets/js/jqueryui/jquery-ui.js"); ?>"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
  } );
  </script>

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
    <style type="text/css">
      select
        input#datepicker
      {
        background: white;
        color: black;
        border: 1px solid black;
        font-size: 15px;
        width: 75%;
        padding: 2px 0 0 5px;
        margin-top: 5px;
        
      }
      input
      {
        background: white;
        color: black;
        border: 1px solid black;
        font-size: 15px;
        width: 75%;
        padding: 2px 0 0 5px;
        margin-top: 5px;
      }
      input:focus
      {
        outline: none;
      }

      input::placeholder {
        color: white;
  
    }
    textarea:focus
    {
      outline: none;
    }
    #headings{
        font-family: Nunito-Semibold;
        font-size: 13px;
        color: #4F6476;
        margin: 0px;
        margin-left: 2px;
      }
      .col-xs-3
      {
        padding: 0px;
      }

       select
      {
        background: transparent;
        color: black;
        border: 1px solid white;
        font-family: Nunito_regular;
        font-size: 16px;
        width: 80%;
         -webkit-appearance: none;
    -moz-appearance: none;
      }
      select:focus
      {
        outline: none;
      }
    </style>
</head>
<body style="background: white;">
    
    <div class="">
        <div class="">
         <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); padding-top: 10px;">
  <div class="col-xs-1" style="padding: 0px;">
    <img onclick="goBack()" src="<?php echo base_url('assets/icons/left-arrow.svg'); ?>" class="icon">
  </div>
  <div class="col-xs-11" style="padding: 0px;">
    <p style="color: white; font-size:20px; font-family: Nunito-Light; ">Conduct Exam</p>
  </div>
</div>
<form method="POST" name="exam" action="<?php echo site_url('teacher/conduct') ?>">
<div class="col-xs-12" style="padding-top: 20px; border-bottom: 1px solid #B3B9BE;">
  <div class="col-xs-3">
    <p id="headings">CLASS</p>
    <select id="class" name="class">
      <option>Select</option>
      <?php foreach($classes as $row) { ?>
        <option value="<?php echo $row->Class; ?>"><?php echo "Class ".$row->Class; ?></option>
      <?php }?>
    </select><img src="<?php echo base_url('assets/icons/down-arrow.svg'); ?>" style="height: 10px; width: 10px;">
  </div>
  <div class="col-xs-3">
    <p id="headings">SUBJECT</p>
    <select id="subject" name="subject"></select>
    <img src="<?php echo base_url('assets/icons/down-arrow.svg'); ?>" style="height: 10px; width: 10px;">
  </div>
  <div class="col-xs-3">
    <p id="headings">DATE</p>
    <input type="text" id="datepicker" name="date" readonly>
  </div>
  <div class="col-xs-3">
    <p id="headings">MAX. MARKS</p>
    <input type="number" name="marks" id="marks">
  </div>
</div>


<div class="col-xs-12" style="padding-top: 30px;" align="center">
   <div class="col-xs-12" style="background: #5789D6; border: 1px solid; border-radius: 4px; border-color: #B3B9BE; padding: 0px; ">
    <div class="col-xs-4" style="color: white; font-family: Nunito-Semibold; font-size: 15px; text-transform: uppercase; padding-top: 40px;" align="center">
      <p>EXAM TOPIC</p>
    </div>
    <div class="col-xs-8" style="background: #ffffff; font-family: Questrial-Regular; font-size: 15px; color: black; padding: 10px;" align="center">
      <textarea name="topic" id="topic" style="width: 100%; border: none;" placeholder="Write here" rows="4"></textarea>
    </div>
  </div>
  <button style="border: none;outline: none;width: 100%; font-family: Rubik; color: white; background: #5789D6; border-radius: 4px; padding-top: 10px; padding-bottom: 10px; margin-top: 30px; font-size: 18px;" type="submit" id="btn">Submit</button>
</form>
</div>       

  
</div>

 <script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#class").on("change",function(){
      var cls=$(this).val();
      if (cls) {
        $.ajax({
          url:"<?php echo site_url('teacher/selection'); ?>",
          type:"POST",
          data:"class="+cls,
          success:function(html){
            $("#subject").html(html);
          }
        });
      }
    });
    
  });

  $("#btn").click(function(e){
      var cls=$("#class option:selected").val();
      if (cls=='Select') { alert("Select a Class First"); e.preventDefault(); }
      var subject=$("#subject option:selected").val();
      if (subject.length<1) {alert("Select a Subject First"); e.preventDefault();}
      var marks=$("#marks").val();
      if (marks.length<1) {alert("Enter Valid Marks"); e.preventDefault();}
      var topic=$("#topic").val();
      if (topic.length<1) { alert("Homework is required"); e.preventDefault();}
      var date=$('#datepicker').val();
      if (date.length<1) { alert("Enter a Valid date"); e.preventDefault();}
      else
      {
        $("#hw").submit();
      }
    });
    
</script>
</body>
</html>