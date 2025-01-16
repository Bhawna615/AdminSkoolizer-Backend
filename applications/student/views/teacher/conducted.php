<!DOCTYPE html>
<html>
<head>
    <title>Uploaded</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <link href="https://fonts.googleapis.com/css?family=Oregano" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans+KR|Roboto+Condensed|Oswald|Thasadith|Lato|Open+Sans|Ubuntu" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>

    <style type="text/css">
    
        @font-face
        {
            font-family: seguisb;
            src: url(<?php echo base_url("assets/fonts/seguisb.ttf"); ?>);

        }
        @font-face
        {
            font-family: bahnschrift;
            src: url(<?php echo base_url("assets/fonts/bahnschrift.ttf"); ?>);
        }
           @font-face{
        font-family: CarroisCaps;
        src: url(<?php echo base_url("assets/fonts/CarroisCaps.ttf"); ?>);

    }
     @font-face{
        font-family: MONTSERRAT-LIGHT;
        src: url(<?php echo base_url("assets/fonts/MONTSERRAT-LIGHT.ttf"); ?>);

    }
    
    </style>
    <style type="text/css">
        p#summary
        {
            font-family: MONTSERRAT-LIGHT;
            font-size: 20px;
            color: white;
            width: 100%;
        }
    </style>
    
</head>
<body style="background: rgba(41, 149, 191, 0.75);">
    <div class="">
        <div class="col-xs-12" align="center">
            <i class="material-icons" style="font-size: 200px; color: #FFFFFF; margin-top: 10px;">check_circle_outline</i>
            <p style="font-family: bahnschrift; font-size: 33px; color: #FFFFFF; margin-top: 20px;">UPLOADED</p>
            <div class="col-xs-12" style="border: 2px solid white; border-radius: 5px; margin-top: 40px; margin-bottom: 30px; padding-bottom: 20px;" align="center">
                
                <p style="border: 2px solid white; border-radius: 5px; font-size: 25px; position: relative; bottom: 20px; background: #5EAFCF; width: 40%; color: white; font-family: CarroisCaps; padding-top: 5px; ">Summary</p>
                <div class="col-xs-12" align="left">
                <p id="summary">Class : <?php echo $Class; ?></p>
                <p id="summary">Exam Topic : <?php echo $Examname; ?></p>
                <p id="summary">Exam Date : <?php $date=date('d M,y',strtotime($Date)); echo $date; ?></p>
                <p id="summary">Max. Marks : <?php echo $Maxmarks; ?></p>
                </div>
             
                
            </div>
            <div style="margin-bottom: 20px;">
            <a style="color: #FFFFFF; font-size: 25px; border: 2px solid white; border-radius: 5px; font-family: seguisb;padding: 3px 8px 3px 8px;" href="<?php echo site_url('teacher'); ?>" ><i class="material-icons" style="position: relative; top: 4px; right: 3px;"> open_in_new </i>GO TO HOME</a>
        </div>
        </div>
    </div>


</body>
</html>
