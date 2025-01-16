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
    </style>
    
</head>
<body style="background: rgba(41, 149, 191, 0.75);">
    <div class="">
        <div class="col-xs-12" align="center">
            <i class="material-icons" style="font-size: 200px; color: #FFFFFF; margin-top: 80px;">check_circle_outline</i>
            <p style="font-family: bahnschrift; font-size: 33px; color: #FFFFFF; margin-top: 60px;">ATTENDENCE SUBMITTED</p>
            <div style="margin-top: 80px;">
            <a style="color: #FFFFFF; font-size: 25px; border: 3px solid white; border-radius: 5px; font-family: seguisb;padding: 3px 8px 3px 8px;" href="<?php echo site_url('teacher'); ?>" ><i class="material-icons" style="position: relative; top: 4px; right: 3px;"> open_in_new </i>GO TO HOME</a>
        </div>
        </div>
    </div>


</body>
</html>
