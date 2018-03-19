<?php @include "system/session_cont.php"; 
$sayfa=strip_tags($_GET['q']);
$data=intval($_GET['id']); if($data == 0) {header("Location: index.php");}
$loc=intval($_GET['loc']);
$gonder_id=intval($_GET['gonder_id']);

if($sayfa == "exchange1"){
	$db->query("DELETE FROM exchange WHERE id = '$data' ");
	header("Location: exchange_l.c");
}
if($sayfa == "exchange2"){
	$db->query("DELETE FROM exchange WHERE id = '$data' ");
	header("Location: exchange_a.c");
}
if($sayfa == "alert"){
	$db->query("DELETE FROM coin_alert WHERE id = '$data' ");
	header("Location: coin_alert.c");
}
if($sayfa == "page"){
	$db->query("DELETE FROM pages WHERE id = '$data' ");
	header("Location: page_l.c");
}
if($sayfa == "lang"){
	$db->query("DELETE FROM languages WHERE id = '$data' ");
	header("Location: languages.c");
}

?>