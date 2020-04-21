<?php 
session_start();
if(isset($_SESSION['recovery_captcha']))
{

}
else
{
header('location:index.php'); 
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<style >.form-gap {
    padding-top: 70px;
}</style>
<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 
 <div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Change Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" action="change_password.php" method="post" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input name="password" placeholder="new passord" class="form-control"  type="password">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>



<?php
include('dbcon.php');
if (isset($_POST['submit']))

{
 
  $query="UPDATE `student` SET password='$_POST[password]' WHERE id='$_SESSION[change__password_id]' ";   
  $run=mysqli_query($con,$query)or die('error');
   $row=mysqli_num_rows($run);
  if($row!=0)
  {
     echo "<script> alert('Password is changed')</script>";
  }

}
                      