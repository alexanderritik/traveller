<?php   
session_start();
#for checking user is online or ogline
  include('dbcon.php');    
  $qry6=" UPDATE `student` SET login_check='0' WHERE id='$_SESSION[id]' ";   
  $result6=mysqli_query($con,$qry6)or die("nort updated");


 //for avoid to login again

session_destroy();
header('location:index.php');
?>