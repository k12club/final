<?php 
@include "system/session_cont.php";
$coin_d_id=getCR_NUM($_GET['id']);
$coin_d = $db->get_row("SELECT lang_xml,id FROM languages WHERE id = '$coin_d_id' ");
if($coin_d->id !=""){

	header("Content-type: text/xml; charset: UTF-8");
	header("Content-Transfer-Encoding: Binary"); 
	header("Content-disposition: attachment; filename=".$coin_d->lang_xml.""); 
	readfile("../system/languages/".$coin_d->lang_xml); 
	exit();
}
?>