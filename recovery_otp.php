<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <title></title>
</head>
<style >
  .jumbotron.text-center {
    height: 17em;
}

input.form-control.col-md-6 {
    width: 50%;
    margin-right: 1em;
    display: inline;
}

div#notes {
    margin-top: 2%;
    width: 98%;
    margin-left: 1%;
}

@media (min-width: 991px) {
  .col-md-9.col-sm-12 {
      margin-left: 12%;
  }
}
</style>
<body>
  
  <h1 style="color: black; " align="center"><b><a href="index.php">TRAVELLER</a></b></h1>
  <hr>
<div class="container">
  <!-- Instructions -->
  <div class="row">
    <div class="alert alert-success col-md-12" role="alert" id="notes">
      <h4>NOTES</h4>
      <ul>
        <li>enter the recovery otp passowrd.</li>
        <li>If somehow, you did not recieve the verification email then <a href="#">resend the verification email</a></li>
      </ul>
    </div>
  </div>
  <!-- Verification Entry Jumbotron -->
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron text-center">
        <h2>Enter the recovery verification code</h2>
        <form action="recovery_otp.php" method="POST" >
          <div class="col-md-9 col-sm-12">
            <div class="form-group form-group-lg">
              <input type="text" class="form-control col-md-6 col-sm-6 col-sm-offset-2" name="verifyCode" required>
              <input class="btn btn-primary btn-lg col-md-2 col-sm-2" name="submit"  type="submit" value="Verify">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


</html>
<?php
session_start();
if (isset($_POST['submit']))

{
  include('dbcon.php');
 $otp1=$_POST['verifyCode'];
 if ($otp1==$captcha) 
 {
   $captcha=$_SESSION['recovery_captcha']; 
$md=md5(rand(0,999));
       $unique=substr($md, 15,5);
  $_SESSION['unique']=$unique;
header('location:change_password.php');
 }
 else
 {
  echo "<script> alert('OTP IS WORNG try again')</script>";
 }

}
?>