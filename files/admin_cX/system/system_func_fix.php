<?php 
function postCR($caf) {
    global $db;
	//$caf_son=str_replace(array("'","\""), array("",""), $caf);
	$caf_son=@strip_tags($caf);
	$caf_son=$db->escape($caf_son);
	return $caf_son;
}
function getCR_ST($caf) {
    global $db;
	$caf_son=str_replace(array("'",'"','\"'), array("","",""), $caf);
	$caf_son=@strip_tags($caf_son);
	$caf_son=$db->escape($caf_son);
	return $caf_son;
}
function getCR_NUM($caf) {
    global $db;
	$caf_son=@strip_tags($caf);
	$caf_son=@intval($caf);
    $caf_son=str_replace(array("'",'"','\"'), array("","",""), $caf);
    $caf_son=$db->escape($caf_son);
	return $caf_son;
}

function GetIP(){
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



function sefTrue($deger) {
	$turkce=array("ş","Ş","ı","(",")","'","ü","Ü","ö","Ö","ç","Ç"," ","/","*","?","ş","Ş","ı","ğ","Ğ","İ","ö","Ö","Ç","ç","ü","Ü","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","R","S","T","U","V","Y","Z","W","X","Q");
	$duzgun=array("s","s","i","","","","u","u","o","o","c","c","-","-","-","","s","s","i","g","g","i","o","o","c","c","u","u","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","r","s","t","u","v","y","z","w","x","q");
	$deger=@str_replace($turkce,$duzgun,$deger);
	$deger = @preg_replace("@[^A-Za-z0-9\-_]+@i","",$deger);
	return $deger;
}

function passFuc($pass){
return @md5(@sha1(@md5("abc".$pass."123")));
}

function file_upload($files_name,$file_type,$upload_files,$upload_name,$error_location){
	$kaynak=$_FILES[$files_name]['tmp_name'];
	$isim=$_FILES[$files_name]['name']; 
	$tip=$_FILES[$files_name]['type']; 
	$buyukluk=$_FILES[$files_name]['size']; 
	$ext = pathinfo($isim);
	$uzanti=$ext['extension'];
	$rand =$upload_name.".".$uzanti;
		if (!in_array ($uzanti, explode(',', $file_type))){
			@header("Location: ".$error_location);
		}
		else {
			$dosya = $upload_files . "/".$rand;
			if (move_uploaded_file ($kaynak, $dosya)){
				return $dosya;
			}
		}
}

function strto($to, $str) {
 //strto('lower, upper, ucfirst, ucwords veya capitalizefirst', 'İşlem Yapılacak Metin');
    define('cs', 'utf-8');

    if (!function_exists('rp')):

        function rp($i, $str) {

            $B = array('I', 'Ğ', 'Ü', 'Ş', 'İ', 'Ö', 'Ç');
            $k = array('ı', 'ğ', 'ü', 'ş', 'i', 'ö', 'ç');
            $Bi = array(' I', ' ı', ' İ', ' i');
            $ki = array(' I', ' I', ' İ', ' İ');

            if ($i == 1):
                return str_replace($B, $k, $str);
            elseif ($i == 2):
                return str_replace($k, $B, $str);
            elseif ($i == 3):
                return str_replace($Bi, $ki, $str);
            endif;
        }

    endif;

    if (!function_exists('cf')):

        function cf($c = array(), $str) {
            foreach ($c as $cc) {
                $s = explode($cc, $str);
                foreach ($s as $k => $ss) {
                    $s[$k] = strto('ucfirst', $ss);
                }
                $str = implode($cc, $s);
            }
            return $str;
        }

    endif;

    if (!function_exists('te')):

        function te() {
            return trigger_error('Lütfen geçerli bir strto() parametresi giriniz.', E_USER_ERROR);
        }

    endif;

    $to = explode('|', $to);

    if ($to):
        foreach ($to as $t) {
            if ($t == 'lower'):
                $str = mb_strtolower(rp(1, $str), cs);
            elseif ($t == 'upper'):
                $str = mb_strtoupper(rp(2, $str), cs);
            elseif ($t == 'ucfirst'):
                $str = mb_strtoupper(rp(2, mb_substr($str, 0, 1, cs)), cs) . mb_substr($str, 1, mb_strlen($str, cs) - 1, cs);
            elseif ($t == 'ucwords'):
                $str = ltrim(mb_convert_case(rp(3, ' ' . $str), MB_CASE_TITLE, cs));
            elseif ($t == 'capitalizefirst'):
                $str = cf(array('. ', '.', '? ', '?', '! ', '!', ': ', ':'), $str);
            else:
                $str = te();
            endif;
        }
    else:
        $str = te();
    endif;

    return $str;
}


function price($price){
    return number_format($price, 0, '.', '.');
}

function url_flush($a){
	return str_replace(array("http://","https://","www.","www"), "", $a);
}

function url_flush_name($a){
	$v1=str_replace(array("http://","https://","www.","www"), "", $a);
	$c2=explode("?", $v1);
	$c3=explode("/", $c2[0]);
	return $c3[0];
}

function url_base64(){
    $server_port=$_SERVER['SERVER_PORT'];
    if($server_port==80){
        $url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }
    else{
        $url = 'http://'.$_SERVER['SERVER_NAME'].":".$server_port.$_SERVER['REQUEST_URI'];
    }
    return base64_encode($url);    
}

function rgb2hex2rgb($color){ 
   if(!$color) return false; 
   $color = trim($color); 
   $color = str_replace(array("rgb(", ")"), "", $color);
   $result = false; 
  if(preg_match("/^[0-9ABCDEFabcdef\#]+$/i", $color)){
      $hex = str_replace('#','', $color);
      if(!$hex) return false;
      if(strlen($hex) == 3):
         $result['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
         $result['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
         $result['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
      else:
         $result['r'] = hexdec(substr($hex,0,2));
         $result['g'] = hexdec(substr($hex,2,2));
         $result['b'] = hexdec(substr($hex,4,2));
      endif;       
   }elseif (preg_match("/^[0-9]+(,| |.)+[0-9]+(,| |.)+[0-9]+$/i", $color)){ 
      $rgbstr = str_replace(array(',',' ','.'), ':', $color); 
      $rgbarr = explode(":", $rgbstr);
      $result = '#';
      $result .= str_pad(dechex($rgbarr[0]), 2, "0", STR_PAD_LEFT);
      $result .= str_pad(dechex($rgbarr[1]), 2, "0", STR_PAD_LEFT);
      $result .= str_pad(dechex($rgbarr[2]), 2, "0", STR_PAD_LEFT);
      $result = strtoupper($result); 
   }else{
      $result = false;
   }
          
   return $result; 
} 

$site_themes=array("","mirage","mirage_light","mirage_light_sidebar","mirage_light_topbar","burnt_sienna_dark","burnt_sienna_light","burnt_sienna_light_sidebar","amethyst_dark","amethyst_light","amethyst_light_sidebar","fuchsiablue_dark","fuchsiablue_light","fuchsiablue_light_sidebar","pictonblue_dark","pictonblue_light","pictonblue_light_sidebar","junglegreen_dark","junglegreen_light","junglegreen_light_sidebar","fern_dark","fern_light","fern_light","fern_light_sidebar","sunglow_dark","sunglow_light","sunglow_light_sidebar","regentgrey_dark","regentgrey_light","regentgrey_light_sidebar");

$users_pic=array();
$users_name=array();
$datas_yy = $db->get_results("SELECT picture,id,name_surname FROM ".$t_p."users");
foreach( $datas_yy as $d_yy ){
$users_pic[$d_yy->id]=$d_yy->picture;
$users_name[$d_yy->id]=$d_yy->name_surname;
}

//GET VERİLERİ
$i_bilgi=getCR_ST($_GET['i']); // login sayfası uyarı çıktıları
//GET VERİLERİ



//PLUGİN//
require('plugin/westsworld.datetime.class.php');
require('plugin/timeago.inc.php');

//$timeAgo = new TimeAgo();
//echo $timeAgo->inWords("2010/4/26 00:00:00","2010/5/10 00:00:00"); //kullanım

 ?>