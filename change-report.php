<?php 
//Database Connection
include('../includes/link.php');
if(isset($_POST['submit']))
  {
  	$uid=$_GET['userid'];
  	//getting the post values
  $repic=$_FILES['reportpics']['name'];
   $oldppic=$_POST['oldre'];
$oldprofilepic="reportpics"."/".$oldppic;
// get the image extension
$extensions = substr($repic,strlen($repic)-4,strlen($repic));
// allowed extensions
$allowed_extension = array(".jpg","jpeg",".png",".gif",".pdf");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extensions,$allowed_extension))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$docnewfile=$docnewfile.time().$extensions;
// Code for move image into directory
move_uploaded_file($_FILES['reportpics']['tmp_name'],"reportpics/".$docnewfile);
  // Query for data insertion
     $query=mysqli_query($conn, "update clienttable set repics='$docnewfile' where id='$uid' ");
    if ($query) {
    	//Old pic
    	unlink($oldrepic);
    echo "<script>alert('Profile pic updated successfully');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>PHP Crud Operation!!</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	background: url("../images/photo_bg.jpg") no-repeat center center fixed;
	background-size: cover;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
</head>
<body>
<div class="signup-form">
    <form  method="POST" enctype="multipart/form-data">
 <?php
$eid=$_GET['userid'];
$ret=mysqli_query($conn,"select * from clienttable where ID='$eid'");
while ($row=mysqli_fetch_array($ret)) {
?>
		<h2>Update </h2>
		<p class="hint-text">Update your profile pic.</p>
<input type="hidden" name="oldre" value="<?php  echo $row['repics'];?>">
	<div class="form-group">
<img src="reportpicspics/<?php  echo $row['repics'];?>" width="500" height="500">
		</div>

         <div class="form-group">
        	<input type="file" class="form-control" name="reportpics"  required="true">
        	<span style="color:red; font-size:12px;">Only .pdf format allowed.</span>
        </div> 



		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
        </div>
              <?php 
}?>
    </form>

</div>
</body>
</html>