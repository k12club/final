<?php 
header("content-type: application/json"); 
include("../functions.php");
@include "../cronjobs/cronjobs_functions.php";
$monty=array("Jan"=>"1", "Feb"=>"2", "Mar"=>"3", "Apr"=>"4", "May"=>"5", "Jun"=>"6", "Jul"=>"7", "Aug"=>"8", "Sep"=>"9", "Oct"=>"10", "Nov"=>"11", "Dec"=>"12");
$monty2=array("01"=>"1", "02"=>"2", "03"=>"3", "04"=>"4", "05"=>"5", "06"=>"6", "07"=>"7", "08"=>"8", "09"=>"9", "10"=>"10", "11"=>"11", "12"=>"12");

$get_flag=getCR_ST($_GET['flag']);
$coin_details = $db->get_row("SELECT id,coin_flag FROM coins WHERE coin_flag = '".$get_flag."' ");
if($coin_details->id==""){@header("Location: ".$site_url);}
else{
	?><?php
	$curl_link="https://coinmarketcap.com/currencies/".$coin_details->coin_flag."/historical-data/?start=".(date("Y")-6).date("md")."&end=".date("Ymd")."";
	$sitem = getir($curl_link);
	$v3=str_replace(array(' class="text-right"',' class="text-left"'), "", $sitem);

	$n4='#<tr>(.*?)</tr>#si';
	preg_match_all($n4,$v3,$n5);
	$n6=$n5[1]; 
	$history_data=array();
	$y=0;
	$history_data_week=array();

	for ($i = 0; $i <count($n6) ; $i++) {
		
		$veri=$n6[$i];

		$j1='#<td(.*?)</td>#si';
		preg_match_all($j1,$veri,$j2);
		$j3=$j2[1]; 
		
		//$data_x=$j3[0]; //date
		$data_3_x=explode('>', $j3[2]); //high
		$data_3=$data_3_x[1];

		$data_4_x=explode('>', $j3[3]); //low
		$data_4=$data_4_x[1];

		$data_7_x=explode('>', $j3[6]); //market cap
		$data_7=$data_7_x[1];		

		//

		$date_x_x=str_replace(",", "", $j3[0]);
		$date_x=str_replace(">", "", $date_x_x);
		$date_x=explode(" ",$date_x);

		$date_ay=$monty[$date_x[0]];
		$date_gun=$date_x[1];
		$date_yil=$date_x[2];
		$date_son=$date_yil."-".$date_ay."-".$date_gun; //date

		$history_data[data][$i]['date']=$date_son;
		$history_data[data][$i]['high']="<sup>".$system_currency_symbol."</sup>".($data_3*$currency_cx);
		$history_data[data][$i]['low']="<sup>".$system_currency_symbol."</sup>".($data_4*$currency_cx);
		$history_data[data][$i]['market_cap']="<sup>".$system_currency_symbol."</sup>".price(str_replace(",", "", $data_7)*$currency_cx);		
		


	}

	$json_history_2 = json_encode($history_data); // week data
	echo stripslashes(str_replace("'\'", "", $json_history_2));
}
?>