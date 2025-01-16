<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css")  ?>">
    <link href="https://fonts.googleapis.com/css?family=Oregano" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans+KR|Oswald|Thasadith|Lato" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
</head>
<body background="<?php echo base_url("assets/images/background.png") ?>">
    

    <div class="visible-xs visible-sm">
        <?php echo form_open('principal/submit','method="GET"'); ?>
        Date<input type="Date" name="Date">
        Time<input type="time" name="Time">
        Venue<input type="text" name="Venue">
        People 

        <?php
            foreach($faculty as $row)
        {
           $arr=array();
           $arr=$row->id;


          echo "<input type='checkbox' name='teachers[]' value='$row->id'> $row->Teachername ($row->Post)";
        }

        ?>
        Topic<input type="text" name="Topic">
        <input type="submit" value="Conduct" name="">
    </form>
    </div>
</body>
</html>