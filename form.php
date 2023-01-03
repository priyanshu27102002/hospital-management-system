<?php 
//Databse Connection file
include('../includes/link.php');
if(isset($_POST['ok']))
  {
  //getting the post values  
  $pid=$_POST['ID'];
  $dname=$_POST['dname'];
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $age=$_POST['age']; 
  $dob=$_POST['dob'];
  $gen=$_POST['gender'];
  $ppic=$_FILES['paitentpics']['name'];
  $repic=$_FILES['reportpics']['name'];
  $med=$_POST['medicines'];
  $doc=$_POST['doname'];
  
  // get the image extension
  $extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
  // allowed or valid extensions
  $allowed_extensions = array(".jpg","jpeg",".png",".gif",".pdf");
    // get the image extension
	
	$extensions = substr($repic,strlen($repic)-4,strlen($repic));
	// allowed or valid extensions
	$allowed_extension = array(".jpg","jpeg",".png",".gif",".pdf");
  // Validation for allowed extensions .in_array() function searches an array for a specific value.

 
  $imgnewfile=$ppic.time().$extension;
  // Code for move image into directory
  move_uploaded_file($_FILES['paitentpics']['tmp_name'],"paitentpics/".$imgnewfile);
  // Query for data insertion
   //rename the image file
   $docnewfile=$repic.time().$extensions;
   // Code for move image into directory
   move_uploaded_file($_FILES['reportpics']['tmp_name'],"reportpics/".$docnewfile);
   // Query for data insertion
  $sql="insert into clienttable( ID, dname, firstname, lastname, age, dateofbirth,sex, propics, repics, med, doc) values('$pid','$dname','$fname','$lname', '$age', '$dob', '$gen','$imgnewfile','$docnewfile','$med','$doc' )";
  $query=mysqli_query($conn, $sql);
  if ($query==true) {
  echo "<script>alert('You have successfully inserted the data');</script>";
  echo "<script type='text/javascript'> document.location ='form.php'; </script>";
  } else{
  echo "<script>alert('Something Went Wrong. Please try again');</script>";
  }
  }
?> 
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Form</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Form for new paitent record</h2>
			</div>
		<form  action="form.php" method="post" enctype="multipart/form-data">
			<label for="doname">Paitent ID</label> &nbsp; <input type="text" id="ID" name="ID"> 
			<br/>
			<label for="department">Paitent of Concering department</label>
			<br/>
			<select id="dname" name="dname">
			<option value="">Select The Department</option>	
                <option value="Neuralogy">Neuralogy</option>
				<option value="Cardiology">Cardiology</option>
				<option value="Gynaecology">Gynaecology</option>
				<option value="Orthopedics">Orthopedics</option>
				<option value="Dentistry">Dentistry</option>
		     </select>
			 <br/>
			 <br/>
			<label for="fname">First name of paitent</label> &nbsp; <label for="lname">Last name of paitent</label> 
			<br/>
			<input type="text" id="fname" name="fname">&nbsp; <input type="text" id="lname" name="lname">
			<br/>
			<label for="age">Age</label>
			<br/>
			<input type="number" id="age" name="age">
			<br/>
			<label for="dob">Date Of Birth</label>
			<br/>
			<input type="date" id="dob" name="dob">
			<br/>
			<label for="gender">Sex</label>
			<br/>
			<select id="gender" name="gender">
			<option value="">Select Gender</option>	
                <option value="Male">Male</option>
				<option value="Female">Female</option>
			
		     </select>
			<br/>
			<br/>
			<br/>
			<label for="paitentpics">Picture of concering Paitent(Only jpg / jpeg/ png /gif format allowed.)</label>
			<br/>
			<input type="file" id="paitentpics" name="paitentpics" required="true">
			<br/>
			<br/>
			<label for="reportdetails">Picture of concering Paitent(Only .pdf )</label>
			<br/>
			<input type="file" id="reportdetails" name="reportpics" required="true">
			<br/>
			
            <p><label for="medicines">Medicines Paitent Is Taking</label></p>

            <textarea id="medicines" name="medicines" rows="4" cols="50">

            </textarea>
            <br/>
            <br/>
            <label for="doname">Doctor Paitent is Consulting With (Dr)</label> &nbsp; <input type="text" id="doname" name="doname"> 
			<br/>
			<br/>
            <button type="submit" name="ok">Submit</button>
			<br/>
			<a href="index.php"><p class="small"><h3>Go Back</h3></p></a>
        </form>
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