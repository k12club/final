<?php 
header("Content-Type: text/html; charset=utf-8");
@include "../functions.php";

$donate_data = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'smtp' ");
$donate = json_decode($donate_data->setting_value,JSON_UNESCAPED_UNICODE);								
$smtp_host=$donate[smtp_host];
$smtp_port=$donate[smtp_port];
$smtp_mail=$donate[smtp_mail];
$smtp_password=$donate[smtp_password];
$smtp_secure=$donate[smtp_secure];
$smtp_auth=$donate[smtp_auth];
require '../mail/mail_setting.php';

$var_pages = $db->get_var("SELECT count(*) FROM coin_alert where alert_status = '0' ");
if($var_pages!=0) {
$datas_pages = $db->get_results("SELECT * FROM coin_alert where alert_status = '0' ");
foreach( $datas_pages as $data_page ){

$email=$data_page->email;
$coin=$data_page->coin;
$price=$data_page->price;
$price_status=$data_page->email;
$a_time=$data_page->alert_time;

$coin_details = $db->get_row("SELECT coin_price,coin_name,coin_flag,coin_symbol FROM coins WHERE coin_symbol = '".$coin."' ");



if($coin_details->coin_price >= $price){

	$coin_flag=$coin_details->coin_flag;
	$new_price=$coin_details->coin_price;
	$new_name=$coin_details->coin_name." (".$coin_details->coin_symbol.")";
	$mail->setFrom($donate[smtp_mail], 'Price Alert'); 
	$mail->addReplyTo($email, "Price Alert");
	$mail->addAddress($email, "Price Alert");
	$mail->Subject = 'Price Alert - '.date("d-m-Y H:i:s"); 
	$mail->CharSet = 'utf-8';  
	require '../mail/mail_alert.php';	
	if (!$mail->send()) {echo "Mailer Error: " . $mail->ErrorInfo;} else {
	 echo "ok<br>";
	 $db->query("UPDATE coin_alert SET alert_status='1' WHERE id = '".$data_page->id."'");
	}
}



else if($coin_details->coin_price <=$price){

	$coin_flag=$coin_details->coin_flag;
	$new_price=$coin_details->coin_price;
	$new_name=$coin_details->coin_name." (".$coin_details->coin_symbol.")";
	$mail->setFrom($donate[smtp_mail], 'Price Alert');
	$mail->addReplyTo($email, "Price Alert");
	$mail->addAddress($email, "Price Alert");
	$mail->Subject = 'Price Alert - '.date("d-m-Y H:i:s"); 
	$mail->CharSet = 'utf-8';  
	require '../mail/mail_alert.php';	
	if (!$mail->send()) {echo "Mailer Error: " . $mail->ErrorInfo;} else {
	 echo "ok<br>";
	 $db->query("UPDATE coin_alert SET alert_status='1' WHERE id = '".$data_page->id."'");
	}
}
}}
?>
