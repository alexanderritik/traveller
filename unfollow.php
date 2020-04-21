<?php
include("dbcon.php");
session_start();
         $unfollow_id=$_POST['id'];
         $query3="DELETE FROM follow_unfollow WHERE follower_id='$_SESSION[id]' AND following_id='$unfollow_id' ";
        $run3=mysqli_query($con,$query3);
?> 