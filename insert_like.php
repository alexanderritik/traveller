<?php
session_start();
include("dbcon.php"); 
echo $_POST["id_of_posted_once"]," ",$_POST["id_of_post"];

 $query1="SELECT * FROM like_comment WHERE  post_id='$_POST[id_of_post]' AND liked_by='$_SESSION[id]'";
  $run1=mysqli_query($con,$query1);
  $row1=mysqli_num_rows($run1);
  echo " ",$row1;
if ($row1 ==0) 
{
	$query="INSERT INTO like_comment(posted_id , post_id, liked_by) VALUES ('$_POST[id_of_posted_once]' , '$_POST[id_of_post]' , '$_SESSION[id]')";
$run=mysqli_query($con,$query) or die('eroor');
echo "successfull";

$qry1=" SELECT * from `post`  WHERE id='$_POST[id_of_post]' ";   
  $result1=mysqli_query($con,$qry1);
$go1=mysqli_fetch_assoc($result1);
$no_of_like=$go1['post_like'];
$no_of_like++;

$qry2=" UPDATE `post` SET post_like='$no_of_like' WHERE id='$_POST[id_of_post]' ";   
$result2=mysqli_query($con,$qry2);
}




?>