<?php
	@include_once "ez_sql_core.php";
	@include_once "ez_sql_pdo.php";
	@include_once "../system/config.php";
	$db = new ezSQL_pdo('mysql:host='.$db_host.';dbname='.$db_n, $db_u, $db_p);
	$db->query("SET NAMES UTF8");
	$db->query("SET CHARACTER SET utf8");
	$db->query("SET COLLATION_CONNECTION = 'utf8_general_ci' "); 
	
?>
