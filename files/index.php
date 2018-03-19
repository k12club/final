<?php include("system/functions.php");
$cX_coin_count = $db->get_var("SELECT count(*) FROM coins");
$seo_page_date = $db->get_row("SELECT seo FROM seo WHERE page_flag = 'homepage' ");
$seo_page = json_decode($seo_page_date->seo,JSON_UNESCAPED_UNICODE);
$sitcolor_data = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'setting_color' ");
$sitecolor = json_decode($sitcolor_data->setting_value,JSON_UNESCAPED_UNICODE);
$market_value_data = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'market_value' ");
$market_value = json_decode($market_value_data->setting_value,JSON_UNESCAPED_UNICODE);
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $seo_page[$system_language][m_title];?></title>
	<meta name="description" content="<?php echo $seo_page[$system_language][m_desc];?>">
	<meta name="keywords" content="<?php echo $seo_page[$system_language][m_key];?>" />
    <meta name="googlebot" content="index, follow" />
    <meta name="robots" content="index, follow" />
    <meta name="robots" content="noodp">  
    <meta name="revisit-after" content="1 day" />
    <meta name="google" value="notranslate">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<?php echo base64_decode($ad_code[head_code]);?>   
 	
</head>
<body class="cX-home cX-homeone">
	<div id="cX-wrapper" class="cX-wrapper cX-haslayout">		
		<?php @include("system/include_pages/header.php"); ?>				
		<div id="cX-homebanner" class="cX-homebanner cX-haslayout" style="background-image: url(<?php echo $site_url;?>/<?php echo substr($sitecolor[slider_image],3); ?>);">					
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-push-1 col-lg-10">
						<div class="cX-features cX-cnt">
							<li>
								<div class="cX-feature">
									<div class="cX-featureicon"><i class="icon-pulse2"></i></div>
									<div class="cX-title"><h3><?php echo $system_xml->other_3->text; ?></h3></div>
									<div class="cX-description">
										<p><sup><?php echo $system_currency_symbol; ?></sup><?php echo price($market_value[total_market_cap_usd]*$currency_cx); ?></p>
									</div>
								</div>
							</li>
							<li>
								<div class="cX-feature">
									<div class="cX-featureicon"><i class="icon-stats-dots"></i></div>
									<div class="cX-title"><h3><?php echo $system_xml->other_4->text; ?></h3></div>
									<div class="cX-description">
										<p><sup><?php echo $system_currency_symbol; ?></sup><?php echo price($market_value[total_24h_volume_usd]*$currency_cx); ?></p>
									</div>
								</div>
							</li>
							<li>
								<div class="cX-feature">
									<div class="cX-featureicon"><i class="fa fa-btc"></i></div>
									<div class="cX-title"><h3><?php echo $system_xml->other_5->text; ?></h3></div>
									<div class="cX-description">
										<p><?php echo $market_value[bitcoin_percentage_of_market_cap]; ?>%</p>
									</div>
								</div>
							</li>
							<li>
								<div class="cX-feature">
									<div class="cX-featureicon"><i class="icon-coins"></i></div>
									<div class="cX-title"><h3><?php echo $system_xml->index_8->text; ?></h3></div>
									<div class="cX-description">
										<p><?php echo $cX_coin_count; ?></p>
									</div>
								</div>
							</li>
							
						</div>
					</div>
				</div>
			</div>
		</div>
				
		<main id="cX-main" class="cX-main cX-haslayout">
			<section class="cX-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-push-1 col-lg-10">
							<div class="cX-categoriessearch">
								<div class="cX-title">
									<h2><?php echo $system_xml->index_1->text; ?></h2>
								</div>
								<div id="cX-categoriesslider" class="cX-categoriesslider cX-categories owl-carousel">
									<div class="cX-category">
										<a href="<?php echo $site_url; ?>/coin-price-alert">
											<div class="cX-categoryholder">
												<figure><img src="<?php echo $site_url; ?>/assets/images/icon/4.png" alt="Coin Alert"></figure>
												<h3><?php echo $system_xml->index_4->text; ?></h3>
											</div>
										</a>
									</div>
									<div class="cX-category">
										<a href="<?php echo $site_url; ?>/qr-code-generator">
											<div class="cX-categoryholder">
												<figure><img src="<?php echo $site_url; ?>/assets/images/icon/5.png" alt="QR Code Generator"></figure>
												<h3><?php echo $system_xml->index_5->text; ?></h3>
											</div>
										</a>
									</div>
									<div class="cX-category">
										<a href="<?php echo $site_url; ?>/exchange-sites">
											<div class="cX-categoryholder">
												<figure><img src="<?php echo $site_url; ?>/assets/images/icon/7.png" alt="Exchange Sites"></figure>
												<h3><?php echo $system_xml->index_6->text; ?></h3>
											</div>
										</a>
									</div>
									<div class="cX-category">
										<a href="<?php echo $site_url; ?>/">
											<div class="cX-categoryholder">
												<figure><img src="<?php echo $site_url; ?>/assets/images/icon/1.png" alt="Market Capitalizations"></figure>
												<h3><?php echo $system_xml->index_2->text; ?></h3>
											</div>
										</a>
									</div>
									<div class="cX-category">
										<a href="<?php echo $site_url; ?>/converter-calculator">
											<div class="cX-categoryholder">
												<figure><img src="<?php echo $site_url; ?>/assets/images/icon/2.png" alt="Coin Converter Calculator"></figure>
												<h3><?php echo $system_xml->index_3->text; ?></h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

		<section class="cX-sectionspace cX-haslayout">
			<section class="cX-haslayout text-center">
				<div class="cX-adbanner">
					<?php echo base64_decode($ad_code[ad_code_1]); ?>
				</div>
			</section>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="cX-sectionhead">
								<div class="cX-title">
									<h2><?php echo $system_xml->index_7->text; ?></h2>
								</div>
								<div class="cX-description">
									<p><?php echo $system_xml->index_8->text; ?>: <?php echo $cX_coin_count; ?></p>
								</div>
							</div>
						</div>
						<div class="cX-ads">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<table id="marketCapHome" class="cell-border hover compact" cellspacing="0" width="100%">
							        <thead>
							            <tr>
							                <th><?php echo $system_xml->index_9->text; ?></th>
							                <th><?php echo $system_xml->index_10->text; ?></th>
							                <th><?php echo $system_xml->index_11->text; ?></th>
							                <th><?php echo $system_xml->index_12->text; ?></th>
							                <th><?php echo $system_xml->index_13->text; ?></th>
							                <th><?php echo $system_xml->index_14->text; ?></th>
							                <th><?php echo $system_xml->index_15->text; ?></th>
							            </tr>
							        </thead>
							        <tfoot>
							            <tr>
							                <th><?php echo $system_xml->index_9->text; ?></th>
							                <th><?php echo $system_xml->index_10->text; ?></th>
							                <th><?php echo $system_xml->index_11->text; ?></th>
							                <th><?php echo $system_xml->index_12->text; ?></th>
							                <th><?php echo $system_xml->index_13->text; ?></th>
							                <th><?php echo $system_xml->index_14->text; ?></th>
							                <th><?php echo $system_xml->index_15->text; ?></th>
							            </tr>
							        </tfoot>
							        <tbody>
									<?php 
				                      $datas_index_coin = $db->get_results("SELECT coin_name,coin_flag,coin_symbol,coin_price,coin_all_price,coin_rank,coin_history_day FROM coins order by coin_rank ASC limit 50");
				                      foreach( $datas_index_coin as $d_i_c ){
			                      	  $json_index_coin_links = json_decode($d_i_c->coin_all_price,JSON_UNESCAPED_UNICODE);
			                      	  $json_index_coin_history = json_decode($d_i_c->coin_history_day,JSON_UNESCAPED_UNICODE);
			                      	  $coin_history="";
			                      	  for ($i = 0; $i < count($json_index_coin_history); $i++) {
			                      	  $coin_history.=($json_index_coin_history[$i][high]*$currency_cx).",";			                      	  	
			                      	  }
			                      	  $coin_link=$site_url."/currencies/".$d_i_c->coin_flag;
			                      	  if(substr($json_index_coin_links[percent_change_24h], 0,1)=="-"){$color_index_coin="red";} else{$color_index_coin="green";}
				                    ?>
							        <tr class="odd">
							            <td><?php echo $d_i_c->coin_rank; ?></td>
							            <td class="currency-name"><a href="<?php echo $coin_link; ?>" title="<?php echo $d_i_c->coin_name; ?>"><span class="currency-logo-sprite"><img src="<?php echo $site_url; ?>/assets/images/coin/16/<?php echo $d_i_c->coin_flag; ?>.png" alt="<?php echo $d_i_c->coin_name; ?>"></span><?php echo $d_i_c->coin_name; ?></a></td>
							            <td><a href="<?php echo $coin_link; ?>" title="<?php echo $d_i_c->coin_name; ?>"><sup><?php echo $system_currency_symbol; ?></sup><?php echo ($d_i_c->coin_price*$currency_cx); ?></a></td>
							            <td><a href="<?php echo $coin_link; ?>" title="<?php echo $d_i_c->coin_name; ?>"><sup><?php echo $system_currency_symbol; ?></sup><?php echo price($json_index_coin_links[market_cap_usd]*$currency_cx); ?></a></td>
							            <td><a href="<?php echo $coin_link; ?>" title="<?php echo $d_i_c->coin_name; ?>"><sup><?php echo $system_currency_symbol; ?></sup><?php echo price($json_index_coin_links['24h_volume_usd']*$currency_cx); ?></a></td>
							            <td><a href="<?php echo $coin_link; ?>" title="<?php echo $d_i_c->coin_name; ?>"><span class="<?php echo $color_index_coin; ?>"><?php echo $json_index_coin_links[percent_change_24h]; ?>%</span></a></td>
							            <td><span class="sparklines2" sparkType="line"><!-- <?php echo substr($coin_history,0,-1); ?> --></span></td>
							        </tr>
							        <?php } ?>							      
							    </tbody></table>
							</div>							
					</div>
				</div>
			</section>			
		</main>

			<section class="cX-haslayout text-center">
				<div class="cX-adbanner2">
					<?php base64_decode($ad_code[ad_code_2]); ?>
				</div>
			</section>

		<?php @include("system/include_pages/footer.php"); ?>		
	</div>
	<!-- CxCoin CryptoCurrency Script - CSS FILES -->	
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/normalize.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/icomoon.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/transitions.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/cX.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/color.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/responsive.css">
	<script src="<?php echo $site_url; ?>/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.0/b-colvis-1.5.0/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/rr-1.2.3/datatables.min.css"/>
	<!-- CxCoin CryptoCurrency Script - CSS FILES -->	

	<!-- CxCoin CryptoCurrency Script - JAVASCRIPT FILES -->
	<script src="<?php echo $site_url; ?>/assets/js/vendor/jquery-library.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $site_url; ?>/assets/js/jquery.sparkline.js"></script>
	<script type="text/javascript" src="<?php echo $site_url; ?>/assets/js/jquery.sparkline.min.js"></script>	
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.0/b-colvis-1.5.0/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/rr-1.2.3/datatables.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/backgroundstretch.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/owl.carousel.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery.vide.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery.collapse.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/scrollbar.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery-ui.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/countTo.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/appear.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/cX.js"></script>
	<script type="text/javascript">	
		/*Language*/
		var system_currency_symbol="<?php echo $system_currency_symbol; ?>";
		var search_text="<?php echo $system_xml->index_18->text; ?>";
		var loading_text="Loading..";
		var pagination_next="<?php echo $system_xml->index_17->text; ?>";
		var pagination_prev="<?php echo $system_xml->index_16->text; ?>";
		var site_url="<?php echo $site_url; ?>";
		/*Language*/
	</script>
	<script src="<?php echo $site_url; ?>/assets/js/cX-home.js"></script>
	<!-- CxCoin CryptoCurrency Script - JAVASCRIPT FILES -->
<?php base64_decode($ad_code[body_code]); ?>
</body>
</html>



