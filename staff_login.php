<?php
 session_start();
//Database Configuration File
include('includes/link.php');
//error_reporting(0);
if(isset($_POST['login']))
{
     // Getting username/ email and password
     $uname=$_POST['username']; 
    $password=$_POST['password'];
    // Fetch data from database on the basis of username/email and password
 $sql =mysqli_query($conn,"SELECT * FROM admntable WHERE adminusername='$uname' and adminpassword='$password'");
  $num=mysqli_fetch_array($sql);
if($num>=1)
{
$_SESSION['login']=$_POST['username'];
//$_SESSION['utype']=$num['usertype'];
    echo "<script type='text/javascript'>document.location='admin/index.php'; </script>";
}
else{
echo "<script>alert('Invalid Details');</script>";
  }
 
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title> Sign In</title>

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
			<form method="post" action="">
				<label for="username">Username</label> 
				<br/>
				<input type="text" id="username" name="username" placeholder="Username or Email">
				<br/>
				<label for="password">Password</label>
				<br/>
				<input type="password" id="password" name="password"placeholder="Password">
				<br/>
				<button type="submit" name="login">Sign In</button>
			</form>
			<br/>
			<a href="admin/fpassword.php"><p class="small">Forgot your password?</p></a>
			<br/>
			<a href="index.php"><p class="small">Back Home</p></a>
           
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