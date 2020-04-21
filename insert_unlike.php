<?php
include("dbcon.php");
session_start();
 
$query="DELETE FROM like_comment WHERE liked_by='$_SESSION[id]' AND post_id='$_POST[id_of_post]' ";
$run=mysqli_query($con,$query)or die("error");


$qry1=" SELECT * from `post`  WHERE id='$_POST[id_of_post]' ";   
  $result1=mysqli_query($con,$qry1);
$go1=mysqli_fetch_assoc($result1);
$no_of_like=$go1['post_like'];
$no_of_like--;

$qry2=" UPDATE `post` SET post_like='$no_of_like' WHERE id='$_POST[id_of_post]' ";   
$result2=mysqli_query($con,$qry2);

?> 