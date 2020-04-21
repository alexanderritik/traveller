<?php
session_start();
$id=$_SESSION['id'];
include('dbcon.php');
if(isset($_POST['submit']))
{
$image=$_FILES['img']['name'];

$tempname=$_FILES['img']['tmp_name'];

$imgtype=$_FILES['img']['type'];
$description=$_POST['description'];
move_uploaded_file($tempname,"meme/$image");
$query="INSERT INTO meme(id_by,image,comment) VALUES ('$id','$image','$description') ";
$run=mysqli_query($con,$query) or die('eroor');
echo"<script>alert('MEME HAS BEEN UPLOADED')</script>";
echo "<script> window.open('photos.php','_self')</script>";
exit();
}
?>