<?php 
header("Content-Type: text/html; charset=utf-8");
@include "cronjobs_functions.php"; 
@include "../functions.php";

$sitem = getir("https://api.coinmarketcap.com/v1/ticker/?limit=2000");
$json = json_decode($sitem,JSON_UNESCAPED_UNICODE);

$x=0;
$y=0;

for ($i = 0; $i < count($json) ; $i++) {

	$json_data = $json[$i];
	$d1=postCR($json_data[id]); //flag
	$d2=postCR($json_data[name]); //name
	$d3=postCR($json_data[symbol]); //symbol
	$d4=postCR($json_data[rank]); //rank
	$d5=postCR($json_data[price_usd]); //price

	$price_all=array();
	$price_all['price']=$json_data[price_usd];
	$price_all['price_btc']=$json_data[price_btc];
	$price_all['24h_volume_usd']=$json_data['24h_volume_usd'];
	$price_all['market_cap_usd']=$json_data[market_cap_usd];
	$price_all['available_supply']=$json_data[available_supply];
	$price_all['total_supply']=$json_data[total_supply];
	$price_all['max_supply']=$json_data[max_supply];
	$price_all['percent_change_1h']=$json_data[percent_change_1h];
	$price_all['percent_change_24h']=$json_data[percent_change_24h];
	$price_all['percent_change_7d']=$json_data[percent_change_7d];
	$price_all['last_updated']=$json_data[last_updated];
	$json_price_all = postCR(json_encode($price_all,JSON_UNESCAPED_UNICODE));


	$coin_control = $db->get_row("SELECT coin_flag,coin_history_day FROM coins WHERE coin_flag = '".$json_data[id]."'"); 
	$json_22 = json_decode($coin_control->coin_history_day,JSON_UNESCAPED_UNICODE);

	if($json_22[0][date]!=date("d.m.Y") and count($json_22)!=0){
		$new_json=array("date"=> date("d.m.Y"),"high" => $json_data[price_usd], "low" => $json_data[price_usd], "market_cap" => $json_data[market_cap_usd]);
		@array_unshift($json_22,$new_json);
		unset($json_22[count($json_22)-1]);
		$json_22 = @array_values($json_22);
		$json_history_son = postCR(json_encode($json_22,JSON_UNESCAPED_UNICODE));
	}
	else{
		$json_history_son = postCR(json_encode($json_22,JSON_UNESCAPED_UNICODE));	
	}

	if($coin_control->coin_flag == ""){

		$coin_new_control = $db->get_row("SELECT coin_flag FROM coin_new WHERE coin_flag = '".$json_data[id]."'"); 
		if($coin_new_control->coin_flag == ""){
			$db->query("INSERT INTO coin_new ( coin_name, coin_flag, coin_symbol, coin_rank, coin_price, coin_all_price) VALUES ('$d2','$d1','$d3','$d4','$d5','$json_price_all')");
			$x=$x+1;
		}
	}
	else {
		$db->query("UPDATE coins SET  coin_rank='$d4', coin_price='$d5', coin_all_price='$json_price_all', coin_history_day='$json_history_son' WHERE coin_flag = '".$json_data[id]."'");
		$y=$y+1;
		
	}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cron</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>Update Coin</th>
			<td><?=$y?></td>
		</tr>
		<tr>
			<th>New Coin</th>
			<td><?=$x?></td>
		</tr>
	</table>
</body>
</html>
<?php 
$curreny_json = getir("https://api.coinmarketcap.com/v1/global/");
$db->query("UPDATE settings SET  setting_value='$curreny_json' WHERE setting_name = 'market_value'");
?>