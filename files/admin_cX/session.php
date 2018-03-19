<?php 
@include "system/system_func.php"; 
$islem=getCR_ST($_GET['q']);
$time=intval($_GET['time']);
$redirect=getCR_ST($_GET['redirect']);
$loc_adress=base64_decode(getCR_ST($_GET['loc']));
if($islem=="lagout"){
	setcookie ("mcr_ad", "", time() - 3600);
	setcookie ("mcr_ti", "", time() - 3600);
	setcookie ("mcr_time", "", time() - 3600);
	header("Location: login.c");
}
if($islem=="lookscreen"){
	setcookie ("mcr_ti", "", time() - 3600);
	setcookie ("mcr_time", "", time() - 3600);
	header("Location: lookscreen.c?redirect=".$redirect);
}
if($islem=="extratime"){
	switch ($time) {
		case 1:
            setcookie("mcr_ti", base64_encode(time() + 1800), time() + 1800);
            setcookie("mcr_time", base64_encode(1800), time() + 1800);
            @header("Location: ".$loc_adress);
			break;
		case 2:
            setcookie("mcr_ti", base64_encode(time() + 3600), time() + 3600);
            setcookie("mcr_time", base64_encode(3600), time() + 3600);
            @header("Location: ".$loc_adress);
			break;
		case 3:
            setcookie("mcr_ti", base64_encode(time() + 10800), time() + 10800);
            setcookie("mcr_time", base64_encode(10800), time() + 10800);
            @header("Location: ".$loc_adress);
			break;
		case 4:
            setcookie("mcr_ti", base64_encode(time() + 21600), time() + 21600);
            setcookie("mcr_time", base64_encode(21600), time() + 21600);
            @header("Location: ".$loc_adress);
			break;
		
		default:
			@header("Location: ".$loc_adress);
			break;
	}
}
?>