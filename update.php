<?php
session_start();

include('dbcon.php');
$name=$_POST['name'];        
$about=$_POST['about'];
$qry=" UPDATE `student` SET name='$name',about='$about' WHERE id='$_SESSION[id]'"; 
$result=mysqli_query($con,$qry);
echo $name,$about;
?>   