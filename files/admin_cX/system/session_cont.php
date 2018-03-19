<?php 
@include "system_func.php";
if( $mocrea_admin!="" and ($mocrea_time=="" or $mocrea_totaltime=="") ) {header("Location: session.php?q=lookscreen");}
if($mocrea_admin!=""){
	$awdscx = $db->get_row("SELECT * FROM users WHERE user_hash='$mocrea_admin'"); $say_awdscx=count($awdscx);
	if($say_awdscx==0) {header("location: session.php?q=lagout");}
	else {
		//oturum açıksa
		if($mocrea_time < time()) {
			setcookie ("mcr_ti", "", time() - 3600);
			setcookie ("mcr_time", "", time() - 3600);
			header("location: session.php?q=lookscreen");
		}
	}
}
else {header("Location: session.php?q=lagout");}
?>