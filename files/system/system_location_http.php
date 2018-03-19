<?php 

if($ssl_status){
	if (strstr($site_url,"www") and !strstr($_SERVER["HTTP_HOST"],"www")){ @header("Location: ".$site_url.$_SERVER['REQUEST_URI']); }
	$myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
	if(!strstr($myUrl,"https") ) {@header("Location: ".$site_url.$_SERVER['REQUEST_URI']);}
}
else{
	if (strstr($site_url,"www") and !strstr($_SERVER["HTTP_HOST"],"www")){ @header("Location: ".$site_url.$_SERVER['REQUEST_URI']); }
	$myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
	if(strstr($myUrl,"https") ) {@header("Location: ".$site_url.$_SERVER['REQUEST_URI']);}
}

?>