<?php
include("../functions.php");
$result_a=0;
$id_curreny=getCR_ST($_GET['curreny']);

$currencies_data = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'curreny_setting' ");
$d_h_c = json_decode($currencies_data->setting_value,JSON_UNESCAPED_UNICODE);
for ($i = 0; $i <= count($d_h_c)-1 ; $i++) {
	if($d_h_c[$i][status]==1){
		if($d_h_c[$i][code]==$id_curreny){
			$result_a=1;
		}
	}
}
if($result_a==1){
	setcookie(md5($site_url)."_Curreny", md5($id_curreny), time() + (86400 * 30*7));
	header("Location: ".base64_decode($_GET['loc']));
}
else{echo ":(";}


?>
