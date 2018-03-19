<?php
include("../functions.php");
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'coins';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => 'coin_rank', 'dt' => 0 ),

	array( 'db' => 'coin_name', 'dt' => 1,
	'formatter' => function( $d, $row ) {
			global $db;
			$xxx = $db->get_row("SELECT coin_flag FROM coins WHERE coin_name = '".postCR($d)."' ");
			$GLOBALS["coin_flag_index"]=$xxx->coin_flag;
			return '<a href="'.$site_url.'currencies/'.$GLOBALS["coin_flag_index"].'"><span class="currency-logo-sprite"><img src="'.$site_url.'assets/images/coin/16/'.$GLOBALS["coin_flag_index"].'.png"></span>'.$d.'</a>';
		} ),


	array( 'db' => 'coin_price',  'dt' => 2, 
	'formatter' => function( $d, $row ) {
			global $system_currency_symbol;
			global $currency_cx;
			return '<a href="'.$site_url.'currencies/'.$GLOBALS["coin_flag_index"].'"><sup>'.$system_currency_symbol.'</sup>'.($d*$currency_cx).'</a>';
			
		} ),


	array( 'db' => 'coin_all_price',   'dt' => 3, 
	'formatter' => function( $d, $row ) {
			$json_index_coin_links = json_decode($d,JSON_UNESCAPED_UNICODE);
			global $system_currency_symbol;
			global $currency_cx;
			if($json_index_coin_links[market_cap_usd]==null) {return "-";}else{
				return '<a href="'.$site_url.'currencies/'.$GLOBALS["coin_flag_index"].'"><sup>'.$system_currency_symbol.'</sup>'.price($json_index_coin_links[market_cap_usd]*$currency_cx).'</a>';
			}
		} ),

	array( 'db' => 'coin_all_price',     'dt' => 4, 
	'formatter' => function( $d, $row ) {
			$json_index_coin_links = json_decode($d,JSON_UNESCAPED_UNICODE);
			global $system_currency_symbol;
			global $currency_cx;
			if($json_index_coin_links['24h_volume_usd']==null) {return "-";}else{
				return '<a href="'.$site_url.'currencies/'.$GLOBALS["coin_flag_index"].'"><sup>'.$system_currency_symbol.'</sup>'.price($json_index_coin_links['24h_volume_usd']*$currency_cx).'</a>';
			}
		} ),


	array( 'db' => 'coin_all_price',     'dt' => 5, 
	'formatter' => function( $d, $row ) {
			$json_index_coin_links = json_decode($d,JSON_UNESCAPED_UNICODE);
			if($json_index_coin_links[percent_change_24h]==null) {return "-";}else{
				if(substr($json_index_coin_links[percent_change_24h], 0,1)=="-"){$color="red";} else{$color="green";}
				return '<a href="'.$site_url.'currencies/'.$GLOBALS["coin_flag_index"].'"><span class="'.$color.'">'.$json_index_coin_links[percent_change_24h]."%</span></a>";
			}
		} ),


	array( 'db' => 'coin_history_day',     'dt' => 6, 
	'formatter' => function( $d, $row ) {
			  global $currency_cx;
			  $json_index_coin_history = json_decode($d,JSON_UNESCAPED_UNICODE);
	      	  $coin_history="";
	      	  for ($i = 0; $i < count($json_index_coin_history); $i++) {
	      	  $coin_history.=($json_index_coin_history[$i][high]*$currency_cx).",";			                      	  	
	      	  }
			return '<span class="sparklines" sparkType="line"><!-- '.substr($coin_history,0,-1).' --></span>';
		} )
);

// SQL server connection information
$sql_details = array(
	'user' => $db_u,
	'pass' => $db_p,
	'db'   => $db_n,
	'host' => $db_host
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
	SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
);


