<?php
session_start();

$otp=$_POST['otp'];
// $otp="36d56";

if($_SESSION['captcha']==$otp)
{
 $data['check']=1;
}
else
{
 $data['check']=0; 
}
      
echo json_encode($data);

?>