<?php 
$qr=strip_tags($_GET['qr']);
$qr=str_replace(array("{","}"), "", $qr);
$file_url = 'http://chart.apis.google.com/chart?cht=qr&chs=256x256&chl='.$qr.'&chld=H|0&choe=UTF-8';
header('Content-Type: images/png');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=qr-".time().".png"); 
readfile($file_url); 
exit();
?>