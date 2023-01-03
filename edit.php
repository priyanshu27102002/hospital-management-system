<?php 
//Database Connection
include('../includes/link.php');
if(isset($_POST['submit']))
  {
  	$pid=$_POST['ID'];
  	//Getting Post Values
    $dname=$_POST['dname'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $age=$_POST['age']; 
    $dob=$_POST['dob'];
    $gen=$_POST['gender'];
    $med=$_POST['medicines'];
    $doc=$_POST['doname'];
    
    //Query for data updation
     $query=mysqli_query($conn, "update  clienttable set dname='$dname', firstname='$fname', lastname='$lname', age='$age', dateofbirth='$dob', med='$med', sex='$gen', doc='$doc', ID='$pid'");
    if ($query==true) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='Details.php'; </script>";
  	}
  else
    {
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
		<form  method="post" >
        <?php
        $pid=$_GET['editid'];
        $ret=mysqli_query($conn,"select * from clienttable where ID='$pid'");
        while ($row=mysqli_fetch_array($ret)){
        ?>
            <h2>Update </h2>
		    <p class="hint-text">Update your info.</p>
			<br/>
            <div class="form-group">
			    <img src="paitentpics/<?php  echo $row['propics'];?>" width="120" height="120">
        <br/>
			    <a href="change-image.php?userid=<?php echo $row['ID'];?>">Change Image</a>
		    </div>
			<br/>
			<label for="ID"> Paitent Unique Id:</label> &nbsp; <input type="text" id="ID" name="ID" value="<?php  echo $row['ID'];?>">
			<br/>
           	<br/>
			<label for="department">Paitent of Concering department</label>
			<br/>
			<select id="dname" name="dname">
			<option value="<?php  echo $row['dname'];?>"><?php  echo $row['dname'];?></option>	
                <option value="Neurology">Neuralogy</option>
				<option value="Cardiology">Cardiology</option>
				<option value="Gynaecology">Gynaecology</option>
				<option value="Orthopedics">Orthopedics</option>
				<option value="Dentistry">Dentistry</option>
		     </select>
			 <br/>
			 <br/>
			<label for="fname">First name of paitent</label> &nbsp; <label for="lname">Last name of paitent</label> 
			<br/>
			<input type="text" id="fname" name="fname" value="<?php  echo $row['firstname'];?>">&nbsp; <input type="text" id="lname" name="lname" value="<?php  echo $row['lastname'];?>">
			<br/>
			<label for="age">Age</label>
			<br/>
			<input type="number" id="age" name="age" value="<?php  echo $row['age'];?>">
			<br/>
			<label for="dob">Date Of Birth</label>
			<br/>
			<input type="date" id="dob" name="dob" value="<?php  echo $row['dateofbirth'];?>">
			<br/>
			<label for="gender">Sex</label>
			<br/>
			<select id="gender" name="gender">
			    <option value="<?php  echo $row['sex'];?>"><?php  echo $row['sex'];?></option>	
                <option value="Male">Male</option>
				<option value="Female">Female</option>
		    </select>
			<br/>
			<br/>
			<label for="reportdetails">Picture of concering Paitent(Only .pdf )</label>
			<br/>
			<iframe src="reportpics/<?php  echo $row['repics'];?>" width="500" height="500"></iframe>
            <br/>
			<a href="change-reports.php?userid=<?php echo $row['ID'];?>">Change Image</a>
		   	<br/>			
            <p><label for="medicines">Medicines Paitent Is Taking</label></p>
            <textarea id="medicines" name="medicines" required="true" rows="4" cols="50">
			<?php  echo $row['med'];?>
            </textarea>
            <br/>
            <br/>
            <label for="doname">Doctor Paitent is Consulting With (Dr)</label> &nbsp; <input type="text" id="doname" name="doname" value="<?php  echo $row['doc'];?>"> 
			<br/>
            <?php 
            }?>
			<br/>
            <button type="submit" name="submit">Update</button>
			<br/>
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