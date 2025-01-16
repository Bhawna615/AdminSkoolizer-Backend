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
<body background="<?php echo base_url("assets/images/background.png") ?>">
    

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
              <p style="font-family: sketch; font-size: 30px; background-color: #b4ea7b; position: relative; bottom: 20px; padding-top: 5px; width: 60%;"><?php echo $class;?>TH CLASS
              </p>
          </div>
           <?php
           if ($exam!=FALSE) 
           {
foreach ($exam as $row)
{
  ?>
        <a href="<?php echo site_url('teacher/analysis/'.$row->id.'/'.$row->Maxmarks); ?>" style="text-decoration: none; color: black;">
          <div class="col-xs-12" style="background-color: rgba(126, 211, 33, 0.42); margin-bottom: 30px; text-transform: uppercase;">
                    <div class="col-xs-12" align="center">
                    <p style="background-color:#B8E986; position: relative; bottom: 13px; font-family: 'Montserrat', sans-serif; width: 50%; font-size: 25px;"><?php

                     echo $row->Examname; ?></p>
                </div>
                    <p align="center" style="font-family: 'Ubuntu', sans-serif; font-size: 18px;"><?php  echo $row->Subject; ?></p>
                    <div class="col-xs-6" align="left" style="font-family: 'Ubuntu', sans-serif; font-size: 18px; ">
                        <?php echo "Date <br>"; echo $row->Date; ?>
                    </div>
                    <div class="col-xs-6" align="right" style="font-family: 'Ubuntu', sans-serif; font-size: 18px;">
                        <?php echo "Max. Marks<br>";  echo $row->Maxmarks; ?>
                    </div>

                </div>
            </a>
                  <?php
                }
           }
           else{
            echo "Not yet Uploaded. Check back Later.";
           }
      ?>
   
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