<?php 
session_start();
      $md=md5(rand(0,999));
       $captcha=substr($md, 15,5);
       $_SESSION['captcha']=$captcha;
       $mailto =$_POST['email'];
       // $mailto ="rakeshkusrivastav@gmail.com";
       $mailSub = "Traveller : social website";
       $mailMsg = "This is a social website sending you a otp please donot share it with any one $captcha";
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
      
      if($mail->Send())
      {
      	$data['check']=1;
      }
      else
      {
      	$data['check']=0;
      }
      echo json_encode($data);
?>