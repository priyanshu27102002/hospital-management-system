<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
 header('location:../index.php');
}
else{
    ?>
    <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>login</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo"><span></span></span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>What Do You Want To Do?</h2>
			</div>
			<a href="form.php"><p class="small"><h3>Enter Paitent Details</h3></p></a>
			<br/>
			<br/>
			<a href="Details.php"><p class="small"><h3>Veiw Details Of Existing Paitents</h3></p></a>
			<br/>
			<br/>
			<a href="logout.php"><p class="small"><h3>Log Out</h3></p></a>
			<br/>
			
		</div>
	</div>
</body>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown'); 
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>
    <?php } ?>