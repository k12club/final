<?php 
function getir($url)
{
$ch = curl_init();
$timeout = 10;
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_HEADER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,1);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt($ch,CURLOPT_TIMEOUT,1000);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}
function dosya_indir($link,$name=null, $yol)
{
 
$link_info = pathinfo($link);  
$uzanti = "png"; 
$file = ($name) ? $name.'.'.$uzanti : $link_info['basename'];
$yolcuk = "../../assets/images/coin/".$yol."/".$file; 
$curl = curl_init($link);
$fopen = fopen($yolcuk,'w');
 
curl_setopt($curl, CURLOPT_HEADER,0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl, CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_0);
curl_setopt($curl, CURLOPT_FILE, $fopen);
 
curl_exec($curl);
curl_close($curl);
fclose($fopen);
 
}
?>