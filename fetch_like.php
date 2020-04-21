<?php 
include("dbcon.php");
  $query1="SELECT * FROM post WHERE  id='$_POST[id_of_post]'";
  $run1=mysqli_query($con,$query1);
  $row1=mysqli_num_rows($run1);
  if($row1!=0)
   {     
    $go1=mysqli_fetch_assoc($run1);
    $post_like=$go1['post_like'];
   }
   echo $post_like;

?>