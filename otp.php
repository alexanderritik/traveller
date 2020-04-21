<?php
  session_start();
  include('dbcon.php');
  $name=$_POST['name'];             
  $email=$_POST['email'];             
  $password=$_POST['password'];           
  $phoneno=$_POST['phoneno'];              
  $about=$_POST['about'];                 
  $rand=rand(1,2);
  
       

if($rand==1)
  {
    $image='1';
  }
  else
  {
    $image='2';
  }

$query="INSERT INTO student(name,password,phoneno,about,day,month,year,image,email,confession,cp,typing,login_check) VALUES('$name','$password','$phoneno','$about', '', '', '','$image','$email', '', '', '0', '0') ";
  $run=mysqli_query($con,$query)or die(" error");  

?>