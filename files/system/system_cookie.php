<?php 
/*ISSET LANGUAGE*/
if($_COOKIE[md5($site_url)."_Language"]==""){
	$lang_details_old = $db->get_row("SELECT id FROM languages WHERE lang_flag = '".$site_setting[language]."' ");
	$id_Language=passFuc($lang_details_old->id);
	setcookie(md5($site_url)."_Language", $id_Language, time() + (86400 * 30*7));
	$cookie_Lang=1;
}
/*ISSET LANGUAGE*/

/*ISSET CURRENCY*/
if($_COOKIE[md5($site_url)."_Curreny"]==""){
	$id_Curreny=md5($site_setting[currency]);
	setcookie(md5($site_url)."_Curreny", $id_Curreny, time() + (86400 * 30*7));
	$cookie_Curr=1;
}
/*ISSET CURRENCY*/
	
	/*SYSTEM CONTROL */
	if($cookie_Lang==1){$lang_cX=$id_Language;} else{$lang_cX=$_COOKIE[md5($site_url)."_Language"];}

	if($cookie_Curr==1){$curr_cX=$id_Curreny;} else{$curr_cX=$_COOKIE[md5($site_url)."_Curreny"];}
	/*SYSTEM CONTROL */


	$currencies_data = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'curreny_setting' ");
	$d_h_c = json_decode($currencies_data->setting_value,JSON_UNESCAPED_UNICODE);
	for ($i = 0; $i <= count($d_h_c)-1 ; $i++) {
		if($d_h_c[$i][status]==1){
			if(md5($d_h_c[$i][code])==$curr_cX){
				$result_a=$d_h_c[$i][code];
			}
		}
	}

	$lang_detail = $db->get_row("SELECT lang_flag,lang_xml FROM languages WHERE lang_secure = '$lang_cX' ");

	$system_language=$lang_detail->lang_flag;
	$system_currency=$result_a;
	$system_currency_symbol=curreny_symbol($result_a);
	$currency_data_db = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'curreny_data' ");
	$currency_data_json = json_decode($currency_data_db->setting_value,JSON_UNESCAPED_UNICODE);
	$curreny_new_seymbol=str_replace("USDUSD", "USD", "USD".$system_currency);
	$currency_cx=price2($currency_data_json[USD.$system_currency]);

	$system_xml= simplexml_load_file('system/languages/'.$lang_detail->lang_xml);

?>