<?php
include("../functions.php");
$id_Language=passFuc(getCR_NUM($_GET['lang']));
$lang_details = $db->get_row("SELECT * FROM languages WHERE lang_secure = '".$id_Language."' ");
if($lang_details->id!=""){
	setcookie(md5($site_url)."_Language", $id_Language, time() + (86400 * 30*7));
	header("Location: ".base64_decode($_GET['loc']));
}
else{echo ":(";}

?>
