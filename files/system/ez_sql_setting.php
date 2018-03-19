<?php
	@include_once "ez_sql_core.php";
	@include_once "ez_sql_pdo.php";
	@include_once "config.php";
	@include_once "system_location_http.php";

	$db = new ezSQL_pdo('mysql:host='.$db_host.';dbname='.$db_n, $db_u, $db_p);
	$db->query("SET NAMES UTF8");
	$db->query("SET CHARACTER SET utf8");
	$db->query("SET COLLATION_CONNECTION = 'utf8_general_ci' "); 

	/*DB CONTROL*/
	$cx=@mysql_connect($db_host, $db_u, $db_p);
	$bx=@mysql_select_db($db_n);

	if (!$cx or !$bx) {
	    header("Location: install.php");
	    exit();
	}
	@mysql_close();
	/*DB CONTROL*/

?>
