
<?php
include('dbcon.php');
if(isset($_POST['submit']))
{
  $sendername=$_POST['name3'];
	$m=$_POST['message'];
	$recivername=$_POST['name'];
	$query="SELECT * FROM student WHERE name='$recivername'";
         $run=mysqli_query($con,$query);
     
         $row=mysqli_num_rows($run);
          if($row!=0)
       {
	$qry=" UPDATE `student` SET confession='$m',cp='$sendername' WHERE name='$recivername' "; 
    
   //$qry="INSERT INTO student (confession) VALUES ('$m') WHERE name='$n' ";
   $result=mysqli_query($con,$qry);
    ?>
    <script>
      alert('your confession is sent'); 
       window.open('profile.php','self');
  </script>
    <?php
    }
    else
    {
    	 ?> 

     <script>
      alert('NAME OF THE PERSON IS NOT FOUND IN DATABASE'); 
       window.open('confessionpage.php','self');
  </script>
       
     <?php
    }
 }

?>