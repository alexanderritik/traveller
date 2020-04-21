<?php
session_start();
$id=$_SESSION['id'];
include('dbcon.php');

$image=$_FILES['img']['name'];

$tempname=$_FILES['img']['tmp_name'];

$imgtype=$_FILES['img']['type'];
$description=$_POST['description'];

move_uploaded_file($tempname,"post/$image");
$query="INSERT INTO post(id_by,image,comment,post_like) VALUES ('$id','$image','$description',0) ";
$run=mysqli_query($con,$query) or die('eroor');

header('user_index.php');

?>