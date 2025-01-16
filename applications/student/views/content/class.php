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
          @font-face
        {
            font-family: scratchy;
            src: url(<?php echo base_url("assets/fonts/scratchy.ttf"); ?>);
        }
        @font-face
        {
            font-family: malgunsl;
            src: url(<?php echo base_url("assets/fonts/malgunsl.ttf"); ?>);
        }
         @font-face
        {
            font-family: malgunbd;
            src: url(<?php echo base_url("assets/fonts/malgunbd.ttf"); ?>);
        }
         @font-face
        {
            font-family: malgun;
            src: url(<?php echo base_url("assets/fonts/malgun.ttf"); ?>);
        }
           @font-face
        {
            font-family: segoeui;
            src: url(<?php echo base_url("assets/fonts/segoeui.ttf"); ?>);
        }
           @font-face
        {
            font-family: Alegreyab;
            src: url(<?php echo base_url("assets/fonts/Alegreyab.ttf"); ?>);
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
  background: white;
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
<style type="text/css">
    a{
        text-decoration: none; 
        color: black;
        font-family: Roboto Condensed;
        font-size: 35px; 
        font-weight: 900;
        
    }
</style>
</head>
<body style="background: rgba(41, 149, 191, 0.75);">
    

    <div class="visible-xs visible-sm">
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="col-xs-12">
        <div class="col-xs-12" style="border: 1px solid white; background: rgba(126, 211, 33, 0.71);">
            <i class="material-icons" style="font-size:60px; position: relative; bottom: 30px; left:45%; border: 2px solid white; border-radius: 50px; color: white; background:rgb(248, 126, 11);">person</i>
            <div class="col-xs-12" style="border: 2px solid white; border-radius: 2px; margin-bottom: 30px;">
            <p align="center" style="font-family: sketch; font-size: 30px; margin: 0px;">
           <?php
            foreach ($myclass[2] as $row) {
                echo $row->Teachername;
            }
           ?>
            </p>
            <p align="center" style="font-family: 'Ubuntu', sans-serif; font-size: 20px;">
            <?php
            echo "- ";
            foreach ($myclass[2] as $row) {
                echo $row->Post;
            }
           ?>
            </p>
            </div>

      <p align="center" style="font-family: Roboto Condensed; font-size: 20px;">Manage My Classes</p>
      <?php
         foreach ($myclass[0] as $key => $value) {
           
          echo anchor(site_url('teacher/exploreclass/'.$value),'Class '.$value);
                    echo "</a>";
          
       }
          

      ?> 
      <a href="<?php echo site_url('teacher'); ?>">HOME</a>
    <a href="<?php echo site_url('teacher/signout'); ?>">SIGNOUT</a>      
</div>
</div>
    </div>
<div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); color: #FFFFFF;">
    
      <div class="col-xs-2" align="left" style="padding-top: 0px;">
        <span style="font-size:30px;cursor:pointer;" onclick="openNav()"><i class="fa fa-navicon" style="font-size:24px"></i></span>
      </div>
      <div class="col-xs-8">
          <p align="center" style="padding-top: 5px; font-size: 18px; font-family: Alegreyab;">DAV PUBLIC SCHOOL</p>
        
        </div>
        
        <div class="col-xs-2">
          <a href="" style="color: #FFFFFF;"><i class="fa fa-user" style="font-size:24px; padding-top: 10px;"></i></a>
        </div>
        
    
      
    </div>


                        <div class="col-xs-12">
    <div class="col-xs-12" style="background-color: rgba(255, 255, 255, 0.19); margin-top: 40px;font-family: 'Roboto Condensed'; border-radius: 5px;" align="center">
          <div class="col-xs-12"  align="center">
              <p style="font-family: scratchy; font-size: 25px; background-color: #E61550; position: relative; bottom: 20px; padding-top: 5px; width: fit-content; padding-left: 15px; padding-right: 15px;  border-radius: 5px; color: rgba(255, 255, 255, 0.85); letter-spacing: 2px; font-weight: 900;"><?php echo $class; echo "TH CLASS"; ?>
              </p>
            </div>
                <?php echo anchor(site_url('teacher/viewstudents/').base64_encode($this->encryption->encrypt($value)),'View Students')?>
                    </a>
<br>
<br>
                <?php echo anchor(site_url('teacher/takeattendence/').$class,'Take Attendence'); ?>
                    </a>
<br>
<br>
                <?php echo anchor('teacher/loadform/'.$class,'Conduct an Exam'); ?>
                    </a>
<br>
<br>
                <?php echo anchor('teacher/attendence/'.$class,'Attendence List'); ?>
                    </a>
<br>
<br>
                <?php echo anchor('teacher/exam/'.$class,'Exam Report'); ?>
                    </a>
<br>
<br>
                <?php echo anchor('teacher/analyze/'.$class,'Analyze Results'); ?>
                    </a>
<br>
<br>
                <?php echo anchor('teacher/assignhw/'.$class,'Assign Homework'); ?>
                    </a>
<br>
<br>
      

</div>
</div>

</div>
<script type="text/javascript">
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</body>
</html>