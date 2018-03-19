<?php 
header("Content-Type: text/html; charset=utf-8");
@include "cronjobs_functions.php"; 
@include "../functions.php";
$monty=array("Jan"=>"1", "Feb"=>"2", "Mar"=>"3", "Apr"=>"4", "May"=>"5", "Jun"=>"6", "Jul"=>"7", "Aug"=>"8", "Sep"=>"9", "Oct"=>"10", "Nov"=>"11", "Dec"=>"12");

$coin_count = $db->get_var("SELECT count(*) FROM coin_new");
echo $coin_count;
if($coin_count!=0){

	$sonuclar = $db->get_results("SELECT * FROM coin_new limit 3");
	foreach ( $sonuclar as $sonuc )
	{ 
		$sitem = getir("https://coinmarketcap.com/currencies/".$sonuc->coin_flag."/");

		$a1='#<ul class="list-unstyled">(.*?)</ul>#si';
		preg_match($a1,$sitem,$a2);
		$a3=trim($a2[1]);

		$a4='#<li>(.*?)</a></li>#si';
		preg_match_all($a4,$a3,$a5);
		$a6=$a5[1]; 

		$coin_links=array();

		for ($i = 0; $i < count($a6) ; $i++) {
			$veri=$a6[$i];

			$c1='#glyphicon glyphicon-(.*?) text-gray#si';
			preg_match($c1,$veri,$c2);
			$c3=trim($c2[1]); 

			$c4='#<a href="(.*?)"#si';
			preg_match($c4,$veri,$c5);
			$c6=trim($c5[1]); 

			$coin_links[$i]['type']=$c3;
			$coin_links[$i]['link']=$c6;

		}
		$a7='# <a class="twitter-timeline" href="(.*?)"#si';
		preg_match($a7,$sitem,$a8);
		$a9=postCR($a8[1]); //coin socil media link

		$coin_links['twitter']=$a9;
		$json_coin_links = postCR(json_encode($coin_links,JSON_UNESCAPED_UNICODE)); // coin details


		dosya_indir("https://files.coinmarketcap.com/static/img/coins/16x16/".$sonuc->coin_flag.".png",$sonuc->coin_flag,"16");
		dosya_indir("https://files.coinmarketcap.com/static/img/coins/32x32/".$sonuc->coin_flag.".png",$sonuc->coin_flag,"32");
		dosya_indir("https://files.coinmarketcap.com/static/img/coins/64x64/".$sonuc->coin_flag.".png",$sonuc->coin_flag,"64");
		dosya_indir("https://files.coinmarketcap.com/static/img/coins/128x128/".$sonuc->coin_flag.".png",$sonuc->coin_flag,"128");

		/* HISTORY */

			$sitem2 = getir("https://coinmarketcap.com/currencies/".$sonuc->coin_flag."/historical-data/");
			$v3=str_replace(array(' class="text-right"',' class="text-left"'), "", $sitem2);


			$n4='#<tr>(.*?)</tr>#si';
			preg_match_all($n4,$v3,$n5);
			$n6=$n5[1]; 
			$history_data=array();

			for ($cx = 1; $cx <= 7 ; $cx++) {
				
				$veri=$n6[$cx];

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

				$history_data[$cx-1]['date']=$date_son;
				$history_data[$cx-1]['high']=$data_3;
				$history_data[$cx-1]['low']=$data_4;
				$history_data[$cx-1]['market_cap']=$data_7;				
			}
			//print_r($history_data);
			$json_history_2 = postCR(json_encode($history_data,JSON_UNESCAPED_UNICODE)); // week data

		/* HISTORY */


		$db->query("INSERT INTO coins ( coin_name, coin_flag, coin_symbol, coin_rank, coin_price, coin_all_price, coin_details, coin_history_day) VALUES ('".postCR($sonuc->coin_name)."','".postCR($sonuc->coin_flag)."','".postCR($sonuc->coin_symbol)."','".postCR($sonuc->coin_rank)."','".postCR($sonuc->coin_price)."','".postCR($sonuc->coin_all_price)."','$json_coin_links','$json_history_2')");

		$db->query("INSERT INTO notification ( nt_name, nt_text, nt_time) VALUES ('New Coin','".postCR($sonuc->coin_symbol)."','".time()."')");

		$db->query("DELETE FROM coin_new WHERE id='".$sonuc->id."'");

		header( "Refresh:2; url=?");


	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Cron</title>
	</head>
	<body>
		<table border=1>
				
				<tr>
				<td><a href="https://coinmarketcap.com/currencies/<?=$sonuc->coin_flag?>/" target="_blank"><?=$sonuc->coin_name?></a></td>
				<td><?=$sonuc->coin_flag?></td>
				<td><img src="https://files.coinmarketcap.com/static/img/coins/16x16/<?=$sonuc->coin_flag?>.png"><img src="https://files.coinmarketcap.com/static/img/coins/32x32/<?=$sonuc->coin_flag?>.png"><img src="https://files.coinmarketcap.com/static/img/coins/64x64/<?=$sonuc->coin_flag?>.png"><img src="https://files.coinmarketcap.com/static/img/coins/128x128/<?=$sonuc->coin_flag?>.png"></td>
				<td><?=$json_coin_links?></td>
			</tr>
			
		</table>
	</body>
	</html>
	<?php 
	}
} 
?>