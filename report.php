<?php               //for avoid to login again
    session_start();
  if(isset($_SESSION['uid']))
{

header('location:index.php');
}
 else
{
 

}
?>
<?php

$to=$_POST['name'];

$to1=$_POST['name1'];
$to2=$_POST['name2'];
$to3=$_POST['name3'];

include('dbcon.php');
$query=" INSERT INTO report(reportname,reportconfession,reportby,reportemail) VALUES ('$to','$to1','$to2','$to3') ";
$result=mysqli_query($con,$query);


?> 
<script>
      alert('YOUR REPORT IS SUBMITTED SORRY FOR INCONVINENCE'); 
      window.open('profile.php','auto');
 </script>
   
