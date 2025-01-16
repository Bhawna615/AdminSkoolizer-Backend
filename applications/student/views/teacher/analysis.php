<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <link href="https://fonts.googleapis.com/css?family=Oregano" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans+JP|Noto+Sans+KR|Roboto+Condensed|Oswald|Thasadith|Lato|Open+Sans|Ubuntu" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>

    <style type="text/css">
        @font-face
        {
            font-family: sketch;
            src: url(<?php echo base_url("assets/fonts/Sketch_Block.ttf"); ?>);
        }
        @font-face
        {
            font-family: aux;
            src: url(<?php echo base_url("assets/fonts/Aaux.otf"); ?>);

        }
    </style>
    <style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background: url(<?php echo base_url("assets/images/background.png") ?>);
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: black;
  display: block;
  transition: 0.3s;
  font-family: Roboto Condensed;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body  style="background:#FF2341;">
    

    <div class="visible-xs visible-sm">
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    </div>
    <div class="col-xs-12">
        
            <div class="col-xs-2" align="left" style="padding-top: 20px;">
                <span style="font-size:30px;cursor:pointer;" onclick="openNav()"><i class="fa fa-navicon" style="font-size:24px"></i></span>
            </div>
            <div class="col-xs-8">
                    <p align="center" style="padding-top: 15px; font-size: 18px; font-family: 'Roboto Condensed', sans-serif;">LORETO CONVENT SCHOOL,SHIMLA</p>
                
                </div>
                
                <div class="col-xs-2">
                    <i class="fa fa-search" style="font-size:24px; padding-top: 30px;"></i>
                </div>
            </div>


                        <div class="col-xs-12">
    <div class="col-xs-12" style="background-color: rgba(255, 204, 231, 0.67); margin-top: 40px;">
          <div class="col-xs-12"  align="center">
              <p style="font-family: sketch; font-size: 30px; background-color: #FF4500; color: white; position: relative; bottom: 20px; padding-top: 5px; width: 90%;">EXAM ANALYSIS
              </p>
              <?php /*
                        </div>
                  
           <div class="col-xs-12" style="font-family: 'Noto Sans JP', sans-serif;background-color: rgba(126, 211, 33, 0.42); margin-bottom: 30px; font-size: 15px; font-weight: 900;">
                    <div class="col-xs-12" align="center">
                    <p style="background-color:#B8E986; position: relative; bottom: 13px; font-family: 'Montserrat', sans-serif; width: 50%; font-size: 25px;"><?php
                                           echo "SUMMARY" ?></p>
                </div>
                <p align="center" style=" text-transform: uppercase;"><b>Maximum Marks: <?php echo $max; ?></b></p>
                    <?php
                        foreach ($exam[1] as $row) 
                        {
                          ?>
                        <p align="center" style="font-family: 'Ubuntu', sans-serif;">HIGHEST SCORE: <?php echo $row->Marksobtained; echo " ($row->Name)";  ?></p>

                          <?php
                            
                        }
          ?>
                    <?php
                    foreach ($exam[2] as $row) 
                        {
                          ?>
                    <p align="center" style="font-family: 'Ubuntu', sans-serif;">LOWEST SCORE: <?php echo $row->Marksobtained; echo " ($row->Name)";  ?></p>
                    <?php
                  }
                  ?>
                  <p align="center" style="font-family: 'Ubuntu', sans-serif;">RESULT PERCENTAGE: <?php echo $percent; echo "%";  ?></p>

                </div>
      <table class="table" style="font-family: 'Noto Sans JP', sans-serif; text-transform: uppercase; font-size: 15px; border: 1px solid black;">
   <thead style="border: 1px solid black;">
      <tr>
        <th style="border: 1px solid black;">ROLL NO.</th>
        <th style="border: 1px solid black;">STUDENT NAME</th>
        <th style="border: 1px solid black;">MARKS</th>
      </tr>
      
      <?php
foreach ($exam[0] as $row) 
{
  ?>
<tr>
  <td style="border: 1px solid black;" align="center"><?php echo $row->Rollno; ?></td>
  <td style="border: 1px solid black;"><?php echo $row->Name; ?></td>
  <td style="border: 1px solid black;" align="center"><?php echo $row->Marksobtained; ?></td>
</tr>
</thead> 
  <?php
}
      ?>
    
              </table>


      </div>
  </div>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</body>
</html>
*/