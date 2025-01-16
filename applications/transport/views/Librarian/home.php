<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="rgba(41, 149, 191, 0.9)">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <link href="https://fonts.googleapis.com/css?family=Oregano" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans+JP|Noto+Sans+KR|Roboto+Condensed|Oswald|Thasadith|Lato|Open+Sans|Ubuntu" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>


<style type="text/css">
    
        @font-face
        {
            font-family:Nunito_regular;
            src: url(<?php echo base_url("assets/fonts/Nunito_regular.ttf"); ?>);
        }
        @font-face
        {
          font-family: Nunito-Light;
          src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
        }
         @font-face
        {
          font-family: Nunito-Semibold;
          src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
        }
    @font-face{
      font-family: RedhatR;
      src: url(<?php echo base_url("assets/fonts/RedhatR.ttf"); ?>);
    }
    @font-face{
      font-family: Rubik-Medium;
      src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
    }
    @font-face{
      font-family: Montserrat-Medium;
      src: url(<?php echo base_url("assets/fonts/Montserrat-Medium.ttf"); ?>);
    }
    
    .icon
    {
      height: 20px;
      width: 20px;
      padding-top: 5px;
    }
    .return
    {
      border: none;
      outline: none;
      background: #f95555;
      width: 70%;
      border:1px solid;
      border-radius: 5px;
      color: white; 
      padding: 5px 0 5px 0;

    }


</style>
<style>

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}
.sidenav button{
  background: #F7F7F9;
outline: none;
   font-family: Nunito-Light;
  font-size: 18px;
  margin-bottom: 15px;
  border: none;

}
.sidenav button:focus{
  border: none;
  outline: none;
}

.sidenav a {
  font-size: 18px;
  text-decoration: none;
  color: black;
}



.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: relative;
 right: 10px;
 top: 10px;
  color: white;
  font-size: 36px;
  margin-left: 20px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

<style type="text/css">
  #sidebaritems
  {
    border-bottom: 1px solid;
    border-color: #c9c9c9;
    margin-top: 5px;
  }
  .icon{
    height: 25px;
    width: 25px;
    margin-right: 20px;
    color: #363636;
    position: relative;
    bottom: 3px;
  }
  
</style>

</head>
<body style="background:white; ">
<div class="visible-xs visible-sm">
  <div id="mySidenav" class="sidenav" style="background:#F7F7F9; padding: 0px;">
    <div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9);">
      
      <div class="col-xs-12" style="padding: 0px;">
        <div class="col-xs-2" align="left" style="padding: 0px;">
            <?php  foreach ($result as $row) { $image=$row->image; } ?>
                <?php if ($image!=NULL) { ?>
                   <img src="<?php  echo base_url('assets/images/librarian/').$row->image; ?>"  style="font-size: 60px; border: 1px solid; border-radius: 50%; height: 60px; color: white; width: 60px; position: relative;top: 7px;">
                <?php } else { ?>
                    <i class='material-icons' style='color: white; font-size: 60px;  position: relative;top: 7px;'>account_circle</i>
                <?php } ?>   
        </div>
        <div class="col-xs-8" align="center">
          <p style="font-size: 20px; color: white; margin-top: 10px; font-family:Nunito_regular;"><?php foreach($result as $row) { echo $row->Name;} ?><br>Librarian</p>
        </div>
        <div class="col-xs-2">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>
      </div>
</div>
    <div class="col-xs-12" style=" margin-top: 20px;">
      <div class="col-xs-12" id="sidebaritems">
        <button onclick="location.href='<?php echo site_url('librarian/issuebook'); ?>'"><img src="<?php echo base_url('assets/icons/issuebook.svg'); ?>" class="icon"> Issue a Book</button><br>
        <button onclick="location.href='<?php echo site_url('librarian/issuedbook'); ?>'"><img src="<?php echo base_url('assets/icons/issuedbook.svg'); ?>" class="icon"> Issued Books</button><br>
        <button onclick="location.href='<?php echo site_url('librarian/studentdetailform'); ?>'"><img src="<?php echo base_url('assets/icons/search-for-staff.svg'); ?>" class="icon">Search Students</button><br>
        <button onclick="location.href='<?php echo site_url('librarian/showbook'); ?>'"><img src="<?php echo base_url('assets/icons/searchbook.svg'); ?>" class="icon">Library Books</button><br>
        <button onclick="location.href='<?php echo site_url('librarian/addbookform'); ?>'"><img src="<?php echo base_url('assets/icons/addbook.svg'); ?>" class="icon">Add a Book</button><br>
      </div>

      <div class="col-xs-12" id="sidebaritems">
        <button onclick="location.href='<?php echo site_url('librarian/settings'); ?>'"><img src="<?php echo base_url('assets/icons/settings.svg'); ?>" class="icon">Settings</button><br>
      <button onclick="location.href='<?php echo site_url('librarian/signout'); ?>'"><img src="<?php echo base_url('assets/icons/logout.svg'); ?>" class="icon">LOG OUT</button><br>
      </div>
    </div>
</div>
<div id="main">
		<div class="col-xs-12" style="background: rgba(41, 149, 191, 0.9); color: #FFFFFF; border-bottom: 5px solid; border-color:rgba(41, 149, 191, 0.7);">
		
			<div class="col-xs-1" align="left" style="padding:10px 0px 0px 5px;">
				<span style="font-size:30px;cursor:pointer;" onclick="  openNav()"><i class="fa fa-navicon" style="font-size:24px"></i></span>
			</div>
			<div class="col-xs-10" style="padding: 0px;">
					<p align="center" style="padding-top: 15px; margin-bottom: 0px; font-size: 25px; font-family: Nunito-Semibold;">D.A.V PUBLIC SCHOOL</p>
                    
				
				</div>
				<div class="col-xs-1" style="padding: 20px 5px 0px 0px;" align="right">
          <i onclick="location.href='<?php echo site_url('Librarian/messages'); ?>'" class="material-icons" style="font-size: 24px;">notifications</i>
				</div>
	</div>
<?php if(!empty($overduebooks)) { ?>
<div class="col-xs-12" style="padding-top: 30px; padding-bottom: 30px;">
  <p style="text-align: center; font-family: Rubik-Medium; font-size: 20px; margin-bottom: 30px;">OVERDUE BOOKS</p>
  <?php foreach($overduebooks  as $row) { ?>
  <div class="col-xs-12" style="background:rgba(228, 228, 228, 0.6); color: #666666; font-family: RedhatR; font-size: 18px; margin-bottom: 20px; padding-bottom: 20px; " align="center">
  <p align="center" style="font-family: Rubik-Medium;"><?php echo $row->TransactionId.". ".$row->Title; ?></p>
  <div class="col-xs-6" align="left">
    <p>Issued To</p>
    <p>Class</p>
    <p>Borrower Id</p>
    <p>From : <?php $issuedate=date('d M',strtotime($row->IssueDate)); echo $issuedate; ?></p>
  </div>
  <div class="col-xs-6">
    <p><?php echo $row->Name; ?></p>
    <p><?php echo $row->Class; ?></p>
    <p><?php echo $row->BorrowerId; ?></p>
    <p style="color: red;">To: <?php $duedate=date('d M',strtotime($row->DueDate)); echo $duedate; ?></p>
  </div>
  <?php if ($row->ReturnDate==NULL) { ?>
    <button class="return" onclick="ConfirmDelete(<?php echo $row->TransactionId; ?>)">Return</button>
  <?php } else { ?>
    <p style="color: #00CC00;">Returned on: <?php echo $row->ReturnDate; ?></p>
  <?php } ?>
  
</div>
<?php }?>
</div>
<?php } else { ?>
  <div class="col-xs-12" align="center" style="padding-top: 30px; padding-bottom: 30px;">
    <img src="<?php echo base_url('assets/icons/hourglass.png'); ?>" style="height: 250px; width: 250px;">
    <p style="color:#1e81ce ; font-family: Nunito-Semibold; font-size: 25px; margin-top: 30px; ">NO OVERDUE BOOKS</p>
  </div>
<?php } ?>
</div>

</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "75%";
  document.body.style.backgroundColor = "#ffffff";
  document.getElementById("main").style.filter = "blur(2px)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.body.style.backgroundColor = "#ffffff";
 document.getElementById("main").style.filter = "blur(0px)";

}
</script>
<script type="text/javascript">
  function ConfirmDelete(TransactionId)
    {
      var x= confirm("Are you Sure?");
      if (x)
        location.href="<?php echo site_url('librarian/returnbook/'); ?>"+TransactionId;
      else
        return false;
    }
</script>
</body>
</html>