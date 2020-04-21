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
  <h3 style="color: green;" align="center">Forgot password</h3>
  <hr>
<div class="container">
  <!-- Instructions -->
  <div class="row">
    <div class="alert alert-success col-md-12" role="alert" id="notes">
      <h4>NOTES</h4>
      <ul>
        <li>In case you forgot your password you can recover it by sending otp on your gmail account.</li>
        <li>Please respect the indivisuality of a person<a href="#">resend the verification email</a></li>
      </ul>
    </div>
  </div>
  <!-- Verification Entry Jumbotron -->
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron text-center">
        <h2>Enter the  Email id</h2>
        <form action="forgot_password.php" method="POST" >
          <div class="col-md-9 col-sm-12">
            <div class="form-group form-group-lg">
              <input type="text" class="form-control col-md-6 col-sm-6 col-sm-offset-2" name="email" required>
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
include('dbcon.php');
session_start();
if (isset($_POST['submit']))
{

 $query="SELECT * FROM student WHERE email='$_POST[email]'";
 $run=mysqli_query($con,$query);
 $row=mysqli_num_rows($run);
   if($row!=0)
   { 
      $go=mysqli_fetch_assoc($run);
     $_SESSION['change__password_id']=$go['id'];
    $md=md5(rand(0,999));
       $captcha=substr($md, 15,5);
       $_SESSION['recovery_captcha']=$captcha;
       $mailto =$_POST['email'];
       $mailSub = "Traveller : social website";
       $mailMsg = "This is a recovery password from website one $captcha";
       require 'PHPMailer-master/PHPMailerAutoload.php';
       $mail = new PHPMailer();
       $mail ->IsSmtp();
       $mail ->SMTPDebug = 0;
       $mail ->SMTPAuth = true;
       $mail ->SMTPSecure = 'ssl';
       $mail ->Host = "smtp.gmail.com";
       $mail ->Port = 465; // or 587
       $mail ->IsHTML(true);
       $mail ->Username = "rakeshkusrivastav@gmail.com";
       $mail ->Password = "Ritik@9839";
       $mail ->SetFrom("rakeshkusrivastav@gmail.com");
       $mail ->Subject = $mailSub;
       $mail ->Body = $mailMsg;
       $mail ->AddAddress($mailto);

       if(!$mail->Send())
       {
           echo "<script> alert('OTP IS Sent')</script>";
           header('location:recovery_otp.php');
       }
   }

   else
   {

    echo "<script> alert('email is wrong')</script>";
   }    
}

?>