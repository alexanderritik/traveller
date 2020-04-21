<?php
include("dbcon.php");
session_start();
$query="INSERT INTO follow_unfollow(follower_id,following_id) VALUES ('$_SESSION[id]','$_POST[id]') ";
$run=mysqli_query($con,$query)or die("dead");
?>