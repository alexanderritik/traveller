<?php
session_start();
include("dbcon.php"); 

$query12="INSERT INTO message(sender_id,message,receiver_id,seen) VALUES ('$_SESSION[id]','$_POST[message]','$_POST[receiverid]','0') ";
$run12=mysqli_query($con,$query12) or die('eroor');

?>