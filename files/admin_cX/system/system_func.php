<?php 
	@ob_start(); @session_start();
	@date_default_timezone_set('Europe/Istanbul');
	@include "ez_sql_setting.php";
	@include "system_func_fix.php";
	
	$mocrea_admin=base64_decode(getCR_ST($_COOKIE['mcr_ad']));
	$mocrea_time=intval(base64_decode($_COOKIE['mcr_ti']));
	$mocrea_totaltime=intval(base64_decode($_COOKIE['mcr_time']));
//
	
 ?>