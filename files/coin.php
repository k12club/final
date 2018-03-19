<?php include("system/functions.php");
$seo_page_date = $db->get_row("SELECT seo FROM seo WHERE page_flag = 'coinpage' ");
$seo_page = json_decode($seo_page_date->seo,JSON_UNESCAPED_UNICODE);

$get_flag=getCR_ST($_GET['flag']);
$coin_details = $db->get_row("SELECT * FROM coins WHERE coin_flag = '".$get_flag."' ");
if($coin_details->id==""){@header("Location: ".$site_url);}

$json_coindetails_links = json_decode($coin_details->coin_all_price,JSON_UNESCAPED_UNICODE);
$json_coin = json_decode($coin_details->coin_details,JSON_UNESCAPED_UNICODE);
$json_index_coin_history = json_decode($coin_details->coin_history_day,JSON_UNESCAPED_UNICODE);
if(substr($json_coindetails_links[percent_change_24h], 0,1)=="-"){$color_coin="red";} else{$color_coin="green";}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo str_replace(array('{coin_name}','{coin_symbol}','{coin_price}'), array($coin_details->coin_name, $coin_details->coin_symbol, $coin_details->coin_price*$currency_cx.' '.$system_currency_symbol), $seo_page[$system_language][m_title]); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="<?php echo str_replace(array('{coin_name}','{coin_symbol}','{coin_price}'), array($coin_details->coin_name, $coin_details->coin_symbol, $coin_details->coin_price*$currency_cx.' '.$system_currency_symbol), $seo_page[$system_language][m_desc]); ?>">
	<meta name="keywords" content="<?php echo str_replace(array('{coin_name}','{coin_symbol}','{coin_price}'), array($coin_details->coin_name, $coin_details->coin_symbol, $coin_details->coin_price*$currency_cx.' '.$system_currency_symbol), $seo_page[$system_language][m_key]); ?>" />
    <meta name="googlebot" content="index, follow" />
    <meta name="robots" content="index, follow" />
    <meta name="robots" content="noodp">  
    <meta name="revisit-after" content="1 day" />
    <meta name="google" value="notranslate">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php echo base64_decode($ad_code[head_code]); ?>
</head>
<body>	
	<div id="cX-wrapper" class="cX-wrapper cX-haslayout">
		<?php @include("system/include_pages/header.php"); ?>
		<section class="cX-haslayout text-center">
			<div class="cX-adbanner">
				<?php echo base64_decode($ad_code[ad_code_1]); ?>
			</div>
		</section>	
		<main id="cX-main" class="cX-main cX-haslayout">
			<div class="container">
				<div class="row">						
						<div class="col-xs-12 col-sm-7 col-md-8 col-lg-8 pull-right">
							<div id="cX-content" class="cX-content">
								<div class="cX-ad cX-detail cX-addetail">
									<div class="cX-adcontent">
										<div class="row">
											<ul class="cX-pagesequence">
												<li><a href="<?php echo $site_url; ?>"><?php echo $system_xml->header_2->text; ?></a></li>
												<li><span class="currency-logo-sprite2"><img src="<?php echo $site_url; ?>/assets/images/coin/16/<?php echo $coin_details->coin_flag; ?>.png"></span> <?php echo $coin_details->coin_name; ?> (<?php echo $coin_details->coin_symbol; ?>)</li>
											</ul>
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 cX-adtitle">
												<h2><sup><?php echo $system_currency_symbol; ?></sup><?php echo $coin_details->coin_price*$currency_cx; ?> <span class="<?php echo $color_coin; ?>">(<?php echo $json_coindetails_links[percent_change_24h]; ?>%)</span> </h2>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 cX-adtitle">
												<?php if($coin_details->coin_affilate_link!=""){ ; ?><a href="<?php echo $coin_details->coin_affilate_link; ?>" target="_blank" rel="nofollow" class="cX-like cX-liked"><i class="fa fa-shopping-cart"><?php echo $system_xml->coin_11->text; ?></i></a><?php }; ?>											
												<a href="<?php echo $site_url; ?>/coin-price-alert?coin=<?php echo $coin_details->coin_symbol; ?>" target="_blank" class="cX-like cX-liked"><i class="fa fa-bell"><?php echo $system_xml->coin_10->text; ?></i></a>
											</div>
										</div>
										<div class="row cX-coindetaill">
											<div class="col-md-3">
												<h2><?php echo $system_xml->coin_12->text; ?></h2>
												<p><sup><?php echo $system_currency_symbol; ?></sup><?php echo price($json_coindetails_links[market_cap_usd]*$currency_cx); ?></p>
											</div>
											<div class="col-md-3">
												<h2><?php echo $system_xml->coin_13->text; ?></h2>
												<p><sup><?php echo $system_currency_symbol; ?></sup><?php echo price($json_coindetails_links["24h_volume_usd"]*$currency_cx); ?></p>
											</div>
											<div class="col-md-3">
												<h2><?php echo $system_xml->coin_14->text; ?></h2>
												<p><?php echo price($json_coindetails_links[available_supply]); ?> BTC</p>
											</div>
											<div class="col-md-3">
												<h2><?php echo $system_xml->coin_15->text; ?></h2>
												<p><?php echo price($json_coindetails_links[max_supply]); ?> BTC</p>
											</div>
										</div>
											<div id="cX-cointabs" style="width: 105% !important">
											  <ul>
											    <li><a href="#coin-charts"><i class="icon-stats-dots"></i> <?php echo $system_xml->coin_16->text; ?></a></li>
											    <li><a href="#tabs-2"><i class="icon-earth"></i> <?php echo $system_xml->coin_17->text; ?></a></li>
											    <li><a href="#tabs-3"><i class="icon-stats-bars2"></i> <?php echo $system_xml->coin_18->text; ?></a></li>
											  </ul>
											  <div id="coin-charts" style="width:100%; height:400px;">
											  </div>
											  <div id="tabs-2">
													<div class="row">
													    <div class="col-md-6">
											 				<a class="twitter-timeline" data-lang="en" data-width="500" data-height="500" data-dnt="true" href="<?php echo $json_coin[twitter]; ?>?ref_src=twsrc%5Etfw">Tweets by <?php echo $coin_details->coin_name; ?></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
													    </div>
													    <div class="col-md-6">

														<div id="fb-root"></div>
														<script>(function(d, s, id) {
														  var js, fjs = d.getElementsByTagName(s)[0];
														  if (d.getElementById(id)) return;
														  js = d.createElement(s); js.id = id;
														  js.src = 'https://connect.facebook.net/en_EN/sdk.js#xfbml=1&version=v2.11';
														  fjs.parentNode.insertBefore(js, fjs);
														}(document, 'script', 'facebook-jssdk'));</script>

														<div class="fb-comments" data-width="auto" data-href="<?php echo $site_url; ?>/currencies/<?php echo $get_flag; ?>" data-numposts="10"></div>
													    </div>
													</div>
											  </div>
											  <div id="tabs-3">
											  	<table id="coinHistory" class="cell-border hover compact" cellspacing="0" width="100%">
											        <thead>
											            <tr>
											                <th><?php echo $system_xml->coin_23->text; ?></th>
											                <th><?php echo $system_xml->coin_24->text; ?></th>
											                <th><?php echo $system_xml->coin_25->text; ?></th>
											                <th><?php echo $system_xml->coin_26->text; ?></th>
											            </tr>
											        </thead>
											        <tfoot>
											            <tr>
											                <th><?php echo $system_xml->coin_23->text; ?></th>
											                <th><?php echo $system_xml->coin_24->text; ?></th>
											                <th><?php echo $system_xml->coin_25->text; ?></th>
											                <th><?php echo $system_xml->coin_26->text; ?></th>
											            </tr>
											        </tfoot>
											        <tbody>								
											    </tbody></table>
											  </div>
											</div>																																	
										</div>
									</div>
								</div>
							</div>
							<?php 
								require('system/scripts/westsworld.datetime.class.php');
								require('system/scripts/timeago.inc.php');
								$times=date('Y/m/d H:i:s', $json_coindetails_links[last_updated]);
			                    $timeAgo = new TimeAgo();
							?>
							<div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
								<aside id="cX-sidebar" class="cX-sidebar">
									<div class="cX-sellercontactdetail">
										<div class="cX-sellertitle"><h1><?php echo $coin_details->coin_name; ?> <?php echo $system_xml->coin_1->text; ?></h1></div>
										<div class="cX-sellercontact">										
											<div class="cX-memberinfobox">
												<figure><a href="javascript:void(0);"><img src="<?php echo $site_url; ?>/assets/images/coin/64/<?php echo $coin_details->coin_flag; ?>.png" alt="<?php echo $coin_details->coin_name; ?>"></a></figure>
												<div class="cX-memberinfo">
													<h3><a href="javascript:void(0);"><?php echo $coin_details->coin_name; ?> (<?php echo $coin_details->coin_symbol; ?>)</a></h3>
													<span><?php echo $system_xml->coin_2->text; ?>: <?php echo $timeAgo->inWords($times,date("Y/m/d H:i:s"));?></span>
												</div>
											</div>
											<?php for ($i = 0; $i <= count($json_coin)-2 ; $i++) {
												$coin_link_data=$json_coin[$i];
											?>
											<a class="cX-btnphone" href="<?php echo $coin_link_data[link];?>" target="_blank" rel="nofollow">
												<i class="<?php echo $coin_list_icon[$coin_link_data[type]]; ?>"></i>
												<span>
													<em><?php echo $coin_list_icon_name[$coin_link_data[type]]; ?></em>
												</span>
											</a>
											<?php } ?>

										</div>
									</div>
								</aside>							
						</div>
					</div>
		</main>
		<section class="cX-haslayout text-center">
			<div class="cX-adbanner2">
				<?php echo base64_decode($ad_code[ad_code_2]); ?>
			</div>
		</section>
		<?php @include("system/include_pages/footer.php"); ?>

	</div>
	<!-- CxCoin CryptoCurrency Script - CSS FILES -->	
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/normalize.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/icomoon.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/transitions.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/scrollbar.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/cX.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/color.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/responsive.css">	
	<script src="<?php echo $site_url; ?>/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.0/b-colvis-1.5.0/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/rr-1.2.3/datatables.min.css"/>	
	<!-- CxCoin CryptoCurrency Script - CSS FILES -->	

	<!-- CxCoin CryptoCurrency Script - JAVASCRIPT FILES -->	
	<script src="<?php echo $site_url; ?>/assets/js/vendor/jquery-library.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/vendor/bootstrap.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/backgroundstretch.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/owl.carousel.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery.vide.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery.collapse.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/scrollbar.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/chartist.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery-ui.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/countTo.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/appear.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/cX.js"></script>
	<script src="https://code.highcharts.com/stock/highstock.js"></script>
	<script src="https://code.highcharts.com/stock/highcharts-more.js"></script>
	<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.0/b-colvis-1.5.0/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/rr-1.2.3/datatables.min.js"></script>
	<script type="text/javascript">	
		/*Language*/
		var pagination_next="<?php echo $system_xml->coin_28->text; ?>";
		var pagination_prev="<?php echo $system_xml->coin_27->text; ?>";
		var site_url="<?php echo $site_url; ?>";
		var coin_flag="<?php echo $get_flag; ?>";
		var charts_title="<?php echo $coin_details->coin_name; ?> <?php echo $system_xml->coin_19->text; ?>";
		var charts_subtitle_1="<?php echo $system_xml->coin_20->text; ?>";
		var charts_subtitle_2="<?php echo $system_xml->coin_21->text; ?>";
		var charts_xasis_title="<?php echo $coin_details->coin_name; ?> <?php echo $system_xml->coin_22->text; ?>";
		var charts_line="<?php echo $system_xml->coin_22->text; ?>";
		/*Language*/
	</script>	
	<script src="<?php echo $site_url; ?>/assets/js/cX-coin.js"></script>
	<!-- CxCoin CryptoCurrency Script - JAVASCRIPT FILES -->	
	<?php echo base64_decode($ad_code[body_code]); ?>	
</body>
</html>