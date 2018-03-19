<?php 
date_default_timezone_set('Europe/Istanbul');
header('Content-Type: charset=utf-8');
require 'mail_system/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();                                     
$mail->Host = $smtp_host; 
if($smtp_auth==1){
	$mail->SMTPAuth = true;
}else {
	$mail->SMTPAuth = false;
}

$mail->Username = $smtp_mail;                 
$mail->Password = $smtp_password;                          
$mail->SMTPSecure = $smtp_secure;                            
$mail->Port = $smtp_port;   
?>