<?php 
/* ERROR LOG */ 
@error_reporting(0);
@ini_set('display_errors', 0);
/* ERROR LOG */ 

/* DEFAULT SYSTEM SETTINGS */ 
@ob_start(); @session_start();
@date_default_timezone_set('Europe/Istanbul'); 
/* DEFAULT SYSTEM SETTINGS */ 

/* SYSTEM INCLUDE PAGE */ 
@include_once "ez_sql_core.php";
@include_once "ez_sql_pdo.php";
@include_once "ez_sql_setting.php";
require_once "scripts/cX_Mobile.php";
$detect = new Mobile_Detect;
/* SYSTEM INCLUDE PAGE */ 

/* ALL FUNCTION */ 
function postCR($data) { //$_POST data variables of protection > String
    global $db;
	$data_son=@strip_tags($data);
	$data_son=$db->escape($data_son);
	return $data_son;
}

function getCR_ST($data) { //$_GET data variables of protection > String
    global $db;
	$data_son=str_replace(array("'",'"','\"'), array("","",""), $data);
	$data_son=@strip_tags($data_son);
	$data_son=$db->escape($data_son);
	return $data_son;
}

function getCR_NUM($data) { //$_GET data variables of protection > Integer
    global $db;
	$data_son=@strip_tags($data);
	$data_son=@intval($data);
    $data_son=str_replace(array("'",'"','\"'), array("","",""), $data);
    $data_son=$db->escape($data_son);
	return $data_son;
}

function GetIP(){ //Used to identify the user's IP address
	if(getenv("HTTP_CLIENT_IP")) {
		$ip = getenv("HTTP_CLIENT_IP");
	} elseif(getenv("HTTP_X_FORWARDED_FOR")) {
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	if (strstr($ip, ',')) {
		$tmp = explode (',', $ip);
		$ip = trim($tmp[0]);
	}} else {
		$ip = getenv("REMOTE_ADDR");
    }return $ip;}

function sefTrue($valueData) { //Used to create a sef link
	$turkce=array("ş","Ş","ı","(",")","'","ü","Ü","ö","Ö","ç","Ç"," ","/","*","?","ş","Ş","ı","ğ","Ğ","İ","ö","Ö","Ç","ç","ü","Ü","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","R","S","T","U","V","Y","Z","W","X","Q");
	$duzgun=array("s","s","i","","","","u","u","o","o","c","c","-","-","-","","s","s","i","g","g","i","o","o","c","c","u","u","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","r","s","t","u","v","y","z","w","x","q");
	$valueData=@str_replace($turkce,$duzgun,$valueData);
	$valueData = @preg_replace("@[^A-Za-z0-9\-_]+@i","",$valueData);
	return $valueData;
}

function passFuc($pass){ //Generate encrypted data
    return @md5(@sha1(@md5("abc".$pass."123")));
}

function price($price){ //Edit price data
    return number_format((float)$price, 0, '.', '.');
}
function price2($price){ //Edit price data
    return number_format((float)$price, 2, '.', '.');
}

function subx($a,$b){
    if($b==1){
        if(strlen($a)<=16){
            return $a;
        }
        else{
            return mb_substr($a, 0,16, 'UTF-8')."..";
        }
    }
}

function curreny_symbol($symbol){ //currency symbols
    if($symbol=="USD"){
        return "$";
    }
    else if($symbol=="EUR"){        
        return "€";
    }
    else if($symbol=="GBP"){        
        return "£";
    }
    else{
        return $symbol;
    }
}

function full_link(){ //Fetch existing url
    if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||  isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    $protocol = 'https://';}
    else {$protocol = 'http://';}
    $current_link = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    return $current_link;
}
/* ALL FUNCTION */ 

/* SITE SETTINGS DATAS*/ 
$site_setting_data = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'setting' ");
$site_setting = json_decode($site_setting_data->setting_value,JSON_UNESCAPED_UNICODE);
$add_code_data = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'setting_code' ");
$ad_code = json_decode($add_code_data->setting_value,JSON_UNESCAPED_UNICODE);
/* SITE SETTINGS DATAS*/ 

/* COOKIE FILE*/ 
@include ("system_cookie.php");
/* COOKIE FILE*/ 

/* COIN ICON SETTINGS*/ 
$coin_list_icon=array("link"=>"icon-link", "search"=>"icon-search4", "list"=>"fa fa-commenting-o", "bullhorn"=>"fa fa-bullhorn", "globe"=>"fa fa-comments-o", "hdd"=>"fa fa-git");
$coin_list_icon_name=array("link"=>$system_xml->coin_3->text, "search"=>$system_xml->coin_4->text, "list"=>$system_xml->coin_5->text, "bullhorn"=>$system_xml->coin_8->text, "globe"=>$system_xml->coin_6->text, "hdd"=>$system_xml->coin_7->text);
/* COIN ICON SETTINGS*/ 
?>