<?php
session_start();
  include('dbcon.php');
  $query="SELECT * FROM student WHERE email='$_POST[email]' AND password='$_POST[password]'";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
   if($row!=0)
   {     
    $data['check']=1;
   $go=mysqli_fetch_assoc($run);
    $_SESSION['id']=$go['id'];
     }  
  else
  {
    $data['check']=0;
  }
  echo json_encode($data);
 
?>