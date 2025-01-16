<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <link href="https://fonts.googleapis.com/css?family=Oregano" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans+KR|Roboto+Condensed|Oswald|Thasadith|Lato|Open+Sans|Ubuntu" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>

    <style type="text/css">
  @font-face{
        font-family: CarroisCaps;
        src: url(<?php echo base_url("assets/fonts/CarroisCaps.ttf"); ?>);
    }
    @font-face{
            font-family: sofia;
            src: url(<?php echo base_url("assets/fonts/Sofialight.ttf"); ?>);
        }
         @font-face{
            font-family: utm;
            src: url(<?php echo base_url("assets/fonts/UTMAvo.woff"); ?>);
        }
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
            font-family: Alegreyab;
            src: url(<?php echo base_url("assets/fonts/Alegreyab.ttf"); ?>);
        }
        button
        {
            background: rgba(41, 149, 191, 0.9);
            border: 0px; 
            border-radius: 2px; 
            color: #FFFFFF; 
            padding-left: 10px; 
            padding-right: 10px; 
            font-family: CarroisCaps;
        }

    </style>
</head>
<body  style="background: rgba(41, 149, 191, 0.75);">
    

    <div class="">
        <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); padding: 0px; margin-bottom: 20px;">
            <div class="col-xs-1" style="padding-left: 15px;">
                <i class="material-icons" onclick="goBack()" style="font-size: 25px; color: #FFFFFF;padding-top:5px; ">arrow_back</i>
            </div>
            <div class="col-xs-9" style="padding-left: 10px;">
                <p style="font-size: 25px; color: #FFFFFF; margin: 0px; padding: 0px; font-family: sofia; ">  Re-Mark Attendence</p>
            </div>
             <div class="col-xs-2" style="" align="right">
                <i class="material-icons" style="font-size: 30px; color: #FFFFFF;padding-top:5px;">person</i>
            </div>
         </div>
        <form action="<?php echo site_url('teacher/mark'); ?>">
     <?php
        if ($mark=='present') {
            ?>
            <div class="col-xs-12" style=" font-size: 20px;   margin-top: 20px;">
            <div class="col-xs-12" align="center">
            <div class="col-xs-12" style="background: rgba(255, 255, 255, 0.19); border-radius: 5px; margin-bottom: 50px; padding-bottom: 20px;">

                    <p style="background-color:#E61550; position: relative; bottom: 13px;   width: fit-content; padding-left: 15px; padding-right: 15px;  border-radius: 5px; color: rgba(255, 255, 255, 0.85); font-family: scratchy; font-size: 23px; letter-spacing: 2px; font-weight: 900; padding-top: 5px;" >
                        PRESENTEES
                    </p>
                    <?php
            foreach ($_SESSION['present'] as $key => $value) {
                   ?>
                   <p style="font-family: sofia; font-size: 18px; text-transform: uppercase; "> 
               <?php echo $key; ?>
            <?php echo $value;?> </p>
                
             
                <input type="hidden" name="" id="roll" value="<?php echo $key; ?>">
            <div class="col-xs-12">
                <div class="col-xs-6" style="">
                    <button id="Absent" value="<?php echo $key; ?>">Absent</button>
                </div>
                <div class="col-xs-6" style="">
                    <button id="Leave" value="<?php echo $key; ?>">Leave</button>
                </div>
        </div>

            <br>

                <?php
            }?>

        </div>
        <input type="submit" name="" value="SUBMIT" style="font-family: sofia; background: rgba(41, 149, 191, 0.9); color: #FFFFFF; padding: 5px 10px 5px 10px; border-radius: 2px; border: 0px;">
    </div>
</div>
<?php

        }
        else if ($mark=='absent') {?>

              <div class="col-xs-12" style=" font-size: 20px;   margin-top: 20px;">
            <div class="col-xs-12" align="center">
            <div class="col-xs-12" style="background: rgba(255, 255, 255, 0.19); border-radius: 5px; margin-bottom: 50px; padding-bottom: 20px;">

                    <p style="background-color:#E61550; position: relative; bottom: 13px;   width: fit-content; padding-left: 15px; padding-right: 15px;  border-radius: 5px; color: rgba(255, 255, 255, 0.85); font-family: scratchy; font-size: 23px; letter-spacing: 2px; font-weight: 900; padding-top: 5px; " >
                        ABSENTEES
                    </p>
                    <?php
            foreach ($_SESSION['absent'] as $key => $value) {
                   ?>
                   <p style="font-family: sofia; font-size: 18px; text-transform: uppercase; "> 
               <?php echo $key."."; ?>
            <?php echo $value;?> </p>
                
             
                <input type="hidden" name="" id="roll" value="<?php echo $key; ?>">
            <div class="col-xs-12">
                <div class="col-xs-6" style="">
                    <button id="Present" value="<?php echo $key; ?>" >Present</button>
                </div>
                <div class="col-xs-6">
                      <button id="Leave" value="<?php echo $key; ?>">Leave</button>
                </div>
                
            </div>
            
          

            <br>

                <?php
            }?>
            
        </div>
        <input type="submit" name="" value="SUBMIT" style="font-family: sofia; background: rgba(41, 149, 191, 0.9); color: #FFFFFF; padding: 5px 10px 5px 10px; border-radius: 2px; border: 0px;">
    </div>
</div>
        <?php
        }
     else if ($mark=='leave') {
        ?>
          <div class="col-xs-12" style=" font-size: 20px;  margin-top: 20px;">
            <div class="col-xs-12" align="center">
            <div class="col-xs-12" style="background: rgba(255, 255, 255, 0.19); border-radius: 5px; margin-bottom: 50px; padding-bottom: 20px;">

                    <p style="background-color:#E61550; position: relative; bottom: 13px;   width: fit-content; padding-left: 15px; padding-right: 15px;  border-radius: 5px; color: rgba(255, 255, 255, 0.85); font-family: scratchy; font-size: 23px; letter-spacing: 2px; font-weight: 900; padding-top: 5px; " >
                        ON LEAVE
                    <?php
            foreach ($_SESSION['leave'] as $key => $value) {
                   ?>
                   <p style="font-family: sofia; font-size: 18px; text-transform: uppercase; "> 
               <?php echo $key; ?>
            <?php echo $value;?> </p>
                
             
                <input type="hidden" name="" id="roll" value="<?php echo $key; ?>">
        <div class="col-xs-12">
            <div class="col-xs-6" style="">
                <button id="Absent" value="<?php echo $key; ?>">Absent</button>
            </div>
                <div class="col-xs-6" style="">
                    <button id="Present" value="<?php echo $key; ?>">Present</button>
                </div>
        </div>
            <br>

                <?php
            }?>
        </div>
        <input type="submit" name="" value="SUBMIT" style="font-family: sofia; background: rgba(41, 149, 191, 0.9); color: #FFFFFF; padding: 5px 10px 5px 10px; border-radius: 2px; border: 0px;">
    </div>
</div>
      
                <?php
        }

     ?>
     
 </form>
    </div>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script type="text/javascript">
       $(document).ready(function(){
      
        $('button').click(function(){
            var mark= $(this).attr('id');
             var roll1=$(this).val();
    
             
       
        $.ajax({
        url: "<?php echo base_url(); ?>"+"student.php/teacher/assign",
        type: "POST",
        dataType:'json',
        data: {roll: roll1,mark: mark}
      
    })

            $(this).html("<i class='material-icons' style='position:relative; top: 5px;'>done</i>"+mark);
         return false;
        });
    });
    </script>
     <script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>
