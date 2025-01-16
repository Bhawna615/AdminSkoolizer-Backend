<!DOCTYPE html>
<html>
<head>
    <title>Sign UP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css")  ?>">
    <link href="https://fonts.googleapis.com/css?family=Oregano" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans+KR|Oswald|Thasadith|Lato" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
</head>
<body>
    <form action="<?php echo site_url('home/tsignup'); ?>" method="POST">
    <input type="text" name="Name" placeholder="Name">
    <input type="text" name="Post" placeholder="Post">
    <input type="text" name="Subjectcode" placeholder="Subjectcode">
    <input type="text" name="Class" placeholder="Classes">
    <input type="text" name="Email" placeholder="Email">
    <input type="password" name="Password" placeholder="Password">
    <input type="submit" name="">
</form>


</body>
</html>

