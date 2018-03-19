<?php 
header("Content-Type: text/html; charset=utf-8");
@include "cronjobs_functions.php"; 
@include "../functions.php";
$curreny_json = getir("http://www.apilayer.net/api/live?access_key=".$site_setting[currency_api]."&format=1");
$curreny_json=json_decode($curreny_json,JSON_UNESCAPED_UNICODE);
$curreny_json=postCR(json_encode($curreny_json[quotes],JSON_UNESCAPED_UNICODE));
$db->query("UPDATE settings SET  setting_value='$curreny_json' WHERE setting_name = 'curreny_data'");
?>
