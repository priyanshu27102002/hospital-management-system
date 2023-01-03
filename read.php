<?php
include('../includes/link.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hospital Management System</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 100px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);

}
.table-wrapper {
    min-width: 1200px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    font-size: 15px;
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-height: 45px;
}
.table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
}
.table-title select {
    border-color: #ddd;
    border-width: 0 0 1px 0;
    padding: 3px 10px 3px 5px;
    margin: 0 5px;
}
.table-title .show-entries {
    margin-top: 7px;
}
.search-box {
    position: relative;
    float: right;
}
.search-box .input-group {
    min-width: 100px;
    position: absolute;
    right: 0;
}
.search-box .input-group-addon, .search-box input {
    border-color: #ddd;
    border-radius: 0;
}
.search-box .input-group-addon {
    border: none;
    border: none;
    background: transparent;
    position: absolute;
    z-index: 9;
}
.search-box input {
    height: 34px;
    padding-left: 28px;     
    box-shadow: none !important;
    border-width: 0 0 1px 0;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    font-size: 19px;
    position: relative;
    top: 8px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}    
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 13px;
    min-width: 30px;
    min-height: 30px;
    padding: 0 10px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
}
.pagination li a:hover {
    color: #666;
}   
.pagination li.active a {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 10px;
    font-size: 13px;
}
</style>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Paitent <b>Details</b></h2>
                    </div>
                        <?php
                        $pid=$_GET['viewid'];
                        $ret=mysqli_query($conn,"select * from clienttable where ID='$pid'");
                        while ($row=mysqli_fetch_array($ret)) {

            ?>

                                <div class="col-sm-7" align-right>
                                    <a href="edit.php?editid=<?php echo htmlentities ($row['ID']);?>" class="btn btn-primary"><span>Edit User Details</span></a>
                                                    
                                </div>
                            </div>
                        </div>
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                        
            <tbody>
                <tr>
                    <th width="200">Profile Pic</th>
                    <td><img src="paitentpics/<?php  echo $row['propics'];?>" width="80" height="80"></td>
                    <th width="200">Creation Date</th>
    <td><?php  echo $row['Creationdate'];?></td>
    </tr>


            <tr>
                <th>First Name</th>
                <td><?php  echo $row['firstname'];?></td>
                <th>Last Name</th>
                <td><?php  echo $row['lastname'];?></td>
            </tr>
            <tr>
                <th>Department</th>
                <td><?php  echo $row['dname'];?></td>
                <th>Gender</th>
                <td><?php  echo $row['sex'];?></td>
            </tr>
            <tr>
                <th>Date Of Birth </th>
                <td><?php  echo $row['dateofbirth'];?></td>
                <th>Age</th>
                <td><?php  echo $row['age'];?></td> 
            </tr>
            <tr>
                <th>Medicines Taken By The Paitent </th>
                <td><?php  echo $row['med'];?></td>
                <th>Doctor he/she is Consulting With</th>
                <td><?php  echo $row['doc'];?></td> 
            </tr>
            <?php 
            }?>
                            
            </tbody>
            </table>
        </div>

            <?php
            $pid=$_GET['viewid'];
            $ret=mysqli_query($conn,"select * from clienttable where ID ='$pid'");
            while ($row=mysqli_fetch_array($ret)) {

            ?>
            <div class="table-wrapper2">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <tbody>
                <tr>
                    <th>Reports Of the Paitent </th>
                    <td><iframe src="reportpics/<?php  echo $row['repics'];?>" width="1000" height="1000">Veiw Details</iframe></td>
                </tr> 
                <?php 
                }?>

                </tbody>
                </table>
                <a href="Details.php"><p class="small"><h3>Go Back</h3></p></a>    
            </div>
       
        
    </div>
</div> 

</body>
</html>