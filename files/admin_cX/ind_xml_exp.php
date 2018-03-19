<?php 
header("Content-type: text/xml; charset: UTF-8");
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=sample_language.xml"); 
readfile("pages/sample_language.xml"); 
exit();
?>