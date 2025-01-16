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
        <ul id="nav">
        <?php
            foreach ($faculty as $row) 
            {
                echo $row->Teachername;
                echo $row->Post;
                echo $row->Class;
                echo "<a href='$row->id'>View Details</a>";
            }
        ?>
    </ul>
    <div id="content">

    </div>


    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $('ul#nav a').click(function(){
            var page= $(this).attr('href');
            
            $('#content').load('<?php echo site_url('principal/teacherReport/') ?>' + page);
            return false;
        });
    });

</script>
</body>
</html>