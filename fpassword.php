<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit']))
  {
    $username=$_POST['username'];
    $email=$_POST['email'];
$password=md5($_POST['newpassword']);
        $query=mysqli_query($con,"select id from admntable where  Email='$email' and AdminUsername='$username' ");
        
    $ret=mysqli_num_rows($query);
    if($ret>0){
      $query1=mysqli_query($con,"update admntable set AdminPassword='$password'  where  Email='$email' && AdminUsername='$username' ");
       if($query1)
   {
echo "<script>alert('Password successfully changed');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";

   }
     
    }
    else{
    
      echo "<script>alert('Invalid Details. Please try again.');</script>";
    }
  }

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Forgot Password</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<label for="username">Username</label>
			<br/>
			<input type="text" id="username" name="username">
			<br/>
			<label for="username">Email</label>
			<br/>
			<input type="text" id="username" name="email">
			<br/>
			<label for="password"> New Password</label>
			<br/>
			<input type="password" id="password" name="newpassword">
			<br/>
			<label for="password">Confirm Password</label>
			<br/>
			<input type="password" id="password" name="confirmpassword">
			<br/>
			<button type="submit" name="submit">Reset </button>
			<br/>	
			<br/>	
			<a href="../index.php"><i class="mdi mdi-home"></i> Back Home</a>	
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