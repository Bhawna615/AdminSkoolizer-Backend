<!DOCTYPE html>
<html>
<head>
	<title>Sign In to the Wild</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<style type="text/css">
		.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: white;
    overflow-x: hidden;
    transition: 1.0s;
    padding-top: 60px;
    font-size: 20px;
    
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: black;
    display: block;
    transition: 0.3s;

}

.sidenav a:hover{
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
input:focus{
	outline: none;
}
select:focus{
	outline: none;
}
button:focus{
	outline: none;
}
</style>



<style type="text/css">
	.text{
		width:25px;
		-webkit-transition:width 0.4s ease-in-out;
		background: url(images/searchicon.png);
		background-repeat: no-repeat;
		background-size: 26px;
		border: 0px;
		margin-top: 15px;
			}
.text:focus{
width: 100%;
height 100%;
border: 1px solid white;
color: white;
text-align: center;
border-radius: 5px;
}

</style>

</head>




<body style="background: url(images/horse.jpg); background-size: auto;">
<div class="visible-md visible-lg">

<p>Only for small screen. Please resize your browser to see the website.</p>
</div>

<div class="visible-xs visible-sm">

<div id="mySidenav" class="sidenav">
 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

   <a href="signin">Sign In</a>
   <a href="contact">Contact Us</a>

</div>



<nav style="border: 1px solid; height: 50px; background: #141414;">
	<div class="col-xs-12">
			<div class="col-xs-2" style="padding: 0px;">
		<button style=" margin-top: 5px; border: 0px; background: #141414; color: white;">
		<span onclick="openNav()" style="font-size: 25px;">&#9776;</span>
		
		</button>
	</div>

<div class="col-xs-10" align="right" style="padding: 0px;">
	<input type="text" name="" class="text">
</div>

	</div>


</nav>

<div class="col-xs-12" style="margin-top: 50px; padding: 50px;">

	<div class="col-xs-12" style="padding: 0px; ">



<div class="col-xs-12" align="center" style=" background: #141413; color: white; opacity: 0.8; border-radius: 10px; padding: 10px;" >


<h1>Thanks for Joining the Wild. <a href="signin">Sign In</a> Now.</h1>


</div>

</div>






</div>







</body>
</html>
