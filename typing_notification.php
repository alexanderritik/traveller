<?php
session_start();
include("dbcon.php");
 $typing=$_POST['typing'];
  
  $qry6=" UPDATE `student` SET typing='$typing' WHERE id='$_SESSION[id]' ";   
  $result6=mysqli_query($con,$qry6);
  echo "succesful";

?>