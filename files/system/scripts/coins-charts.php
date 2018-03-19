<?php 
header("content-type: application/json"); 
date_default_timezone_set('UTC');
include("../functions.php");
@include "../cronjobs/cronjobs_functions.php";
$monty=array("Jan"=>"1", "Feb"=>"2", "Mar"=>"3", "Apr"=>"4", "May"=>"5", "Jun"=>"6", "Jul"=>"7", "Aug"=>"8", "Sep"=>"9", "Oct"=>"10", "Nov"=>"11", "Dec"=>"12");
$monty2=array("01"=>"1", "02"=>"2", "03"=>"3", "04"=>"4", "05"=>"5", "06"=>"6", "07"=>"7", "08"=>"8", "09"=>"9", "10"=>"10", "11"=>"11", "12"=>"12");

$get_flag=getCR_ST($_GET['flag']);
$coin_details = $db->get_row("SELECT id,coin_flag FROM coins WHERE coin_flag = '".$get_flag."' ");
if($coin_details->id==""){@header("Location: ".$site_url);}
else{
	echo "".$_GET['callback']."([\n";
	?><?php
	$sitem = getir("https://coinmarketcap.com/currencies/".$coin_details->coin_flag."/historical-data/?start=".(date("Y")-1).date("md")."&end=".date("Ymd")."");
	$c3=str_replace(array(' class="text-right"',' class="text-left"'), "", $sitem);


	$a4='#<tr>(.*?)</tr>#si';
	preg_match_all($a4,$c3,$a5);
	$a6=$a5[1]; 
	$history_data=array();
	$y=0;
	$history_data_week=array();

	for ($i = 1; $i <count($a6) ; $i++) {
		echo "[";
		$veri=$a6[$i];

		$j1='#<td(.*?)</td>#si';
		preg_match_all($j1,$veri,$j2);
		$j3=$j2[1]; 
		//print_r($j3);
		
		//$data_x=$j3[0]; //date
		$data_3_x=explode('>', $j3[2]); //high
		$data_3=$data_3_x[1];

		$data_4_x=explode('>', $j3[3]); //low
		$data_4=$data_4_x[1];

		$data_7_x=explode('>', $j3[6]); //market cap
		$data_7=$data_7_x[1];	

		$date_x_x=str_replace(",", "", $j3[0]);
		$date_x=str_replace(">", "", $date_x_x);
		$date_x=explode(" ",$date_x);
		$date_ay=$monty[$date_x[0]];
		$date_gun=str_replace(array("01","02","03","04","05","06","07","08","09"), array("1","2","3","4","5","6","7","8","9"), $date_x[1]);
		$date_yil=$date_x[2];
		$date_son=$date_yil.",".$date_ay.",".$date_gun; //date

		$history_data[$i]['date']=$date_son;
		$history_data[$i]['high']=$data_3;
		$history_data[$i]['low']=$data_4;
		$history_data[$i]['market_cap']=$data_7;

		echo (strtotime($date_yil."-".$date_x[0]."-".$date_x[1])*1000).",";
		echo $data_3."]";
		if($i!=count($a6)-1){echo ",\n";}


	}

	$json_history_1 = postCR(json_encode($history_data_week,JSON_UNESCAPED_UNICODE)); // all time data
	$json_history_2 = postCR(json_encode($history_data,JSON_UNESCAPED_UNICODE)); // week data

	echo "\n]);";
}
?>