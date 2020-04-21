<?php
session_start();
include("dbcon.php");

$typing1=$_POST['typing'];
  
$query="SELECT * FROM student WHERE id='$typing1'";
   $run=mysqli_query($con,$query);
    $row=mysqli_num_rows($run);
   if($row!=0)
   { 
   $go=mysqli_fetch_assoc($run);
   
   $typing=$go['typing'];
   if($typing=='1')
   {
    echo "typing...";
   }
   else{
     
  
   }
   }

?>
