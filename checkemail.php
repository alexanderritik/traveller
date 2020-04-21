<?php 
      include_once("dbcon.php");
      $email=$_POST['email'];

      $check_email="SELECT * from student where email='$email'";
      $run_email=mysqli_query($con,$check_email);
      $check=mysqli_num_rows($run_email);
      
      if($check>0)
      {
      	$data['check']=1;
      }

      else{
       

       $data['check']=0;
      
      }

      echo json_encode($data);
mysqli_close($con);
?>