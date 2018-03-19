<?php include("system/functions.php");
$get_symbol=getCR_ST($_GET['coin']);
$seo_page_date = $db->get_row("SELECT seo FROM seo WHERE page_flag = 'coin_alert' ");
$seo_page = json_decode($seo_page_date->seo,JSON_UNESCAPED_UNICODE);
 ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $seo_page[$system_language][m_title]; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="<?php echo $seo_page[$system_language][m_desc]; ?>">
	<meta name="keywords" content="<?php echo $seo_page[$system_language][m_key]; ?>" />
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
		<div id="cX-innerbanner" class="cX-innerbanner cX-haslayout">	
		<main id="cX-main" class="cX-main cX-haslayout">
			<div class="container">
				<div class="row">
						<div class="cX-adcontent">
							<ul class="cX-pagesequence">
								<li><a href="<?php echo $site_url; ?>"><?php echo $system_xml->header_2->text; ?></a></li>
								<li><?php echo $system_xml->alert_11->text; ?></li>
							</ul>
						</div>	
						<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 pull-right">
							<div id="cX-content" class="cX-content">
								<div class="cX-post cX-detail cX-postdetail">								
									<div class="cX-description">										
										<div class="cX-logingarea">
											<h2><?php echo $system_xml->alert_1->text; ?></h2>
											<form method="post" class="cX-formtheme cX-formloging">
												<fieldset>
													<div class="form-group cX-inputwithicon">
														<i class="icon-envelope"></i>
														<input type="text" name="email" id="email" class="form-control" placeholder="<?php echo $system_xml->alert_2->text; ?>">
													</div>

													<div class="form-group">
														<div class="cX-selected">
															<select name="coin" class="selectpicker" data-live-search="true">
															<?php $datas_f = $db->get_results("SELECT coin_name,coin_price,coin_symbol FROM coins order by coin_rank ASC");
											                      foreach( $datas_f as $d_f ){?><option<?php if($get_symbol==$d_f->coin_symbol){?> selected="selected"<?php } ?> value="<?php echo $d_f->coin_symbol; ?>"><?php echo $d_f->coin_name; ?> (<?php echo $d_f->coin_symbol; ?>)</option><?php } ?>
															</select>
														</div>
													</div>
													<div class="row">	
														<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
															<div class="form-group">
												          		<input type="checkbox" name="type" value="1" data-toggle="toggle" data-on="<?php echo $system_xml->alert_3->text;?>" data-off="<?php echo $system_xml->alert_4->text; ?>" data-onstyle="success" data-offstyle="danger" checked>
												          	</div>
												        </div>
												 		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
															<div class="form-group cX-inputwithicon">
																<i>$</i>
																<input type="text" name="number" id="number" class="form-control" placeholder="140000">
															</div>
												        </div>
												    </div>

													<button type="submit" name="gd" class="cX-btn" type="button"><?php echo $system_xml->alert_5->text;?></button>
													<div class="cX-dbsectionspace cX-haslayout cX-alertexamples" id="alert_danger"></div>
												</fieldset>
												<?php 
												if(isset($_POST['gd'])){													
													$islem=getCR_NUM($_POST['type']);
													$money=getCR_NUM($_POST['number']);
													$coin=postCR($_POST['coin']);
													$email=postCR($_POST['email']);
													$db->query("INSERT INTO coin_alert (email, coin, price, price_status, alert_status, alert_time, alert_details) VALUES ('$email','$coin','$money','$islem','0','".time()."','')");

													?>
														<div class="cX-alert alert alert-success fade in"><p><strong><?php echo $system_xml->alert_9->text;?></strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>
													<?php
												}
											?>
											</form>
										</div>
										
									</div>
								</div>
								
							</div>
						</div>
						<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
							<aside id="cX-sidebar" class="cX-sidebar">								
								<div class="cX-widget cX-widgettrendingposts">
									<div class="cX-sidebartitle"><h2><?php echo $system_xml->alert_10->text; ?></h2></div>
									<div class="cX-widgetcontent">
										<ul>
											<li>
												<a href="<?php echo $site_url;?>/coin-price-alert" title="Coin Price Alerts">
													<span>- <?php echo $system_xml->alert_11->text; ?></span>
												</a>
											</li>
											<li>
												<a href="<?php echo $site_url;?>/coin-price-alert-manage" title="Manage Alerts">
													<span>- <?php echo $system_xml->alert_12->text; ?></span>
												</a>
											</li>
										</ul>
									</div>
								</div>
								
								<?php @include("system/include_pages/left_siderbar.php"); ?>
								
							</aside>
						</div>					
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
	<link rel="stylesheet" href="<?php echo $site_url;?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $site_url;?>/assets/css/bootstrap-select.css">
	<link rel="stylesheet" href="<?php echo $site_url;?>/assets/css/normalize.css">
	<link rel="stylesheet" href="<?php echo $site_url;?>/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $site_url;?>/assets/css/icomoon.css">
	<link rel="stylesheet" href="<?php echo $site_url;?>/assets/css/transitions.css">
	<link rel="stylesheet" href="<?php echo $site_url;?>/assets/css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo $site_url;?>/assets/css/scrollbar.css">
	<link rel="stylesheet" href="<?php echo $site_url;?>/assets/css/cX.css">
	<link rel="stylesheet" href="<?php echo $site_url;?>/assets/css/color.css">
	<link rel="stylesheet" href="<?php echo $site_url;?>/assets/css/responsive.css">
	<script src="<?php echo $site_url;?>/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	<!-- CxCoin CryptoCurrency Script - CSS FILES -->	

	<!-- CxCoin CryptoCurrency Script - JAVASCRIPT FILES -->
	<script src="<?php echo $site_url;?>/assets/js/vendor/jquery-library.js"></script>
	<script src="<?php echo $site_url;?>/assets/js/vendor/bootstrap.min.js"></script>	
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
	<script src="<?php echo $site_url;?>/assets/js/backgroundstretch.js"></script>
	<script src="<?php echo $site_url;?>/assets/js/jquery.vide.min.js"></script>
	<script src="<?php echo $site_url;?>/assets/js/jquery.collapse.js"></script>
	<script src="<?php echo $site_url;?>/assets/js/scrollbar.min.js"></script>
	<script src="<?php echo $site_url;?>/assets/js/jquery-ui.js"></script>
	<script src="<?php echo $site_url;?>/assets/js/appear.js"></script>
	<script src="<?php echo $site_url;?>/assets/js/cX.js"></script>
	<script type="text/javascript">	
		/*Language*/
		var alert_1="<?php echo $system_xml->alert_6->text; ?>";
		var alert_2="<?php echo $system_xml->alert_7->text; ?>";
		var alert_3="<?php echo $system_xml->alert_8->text; ?>";
		/*Language*/
	</script>
	<script src="assets/js/cX-alert-home.js"></script>
	<!-- CxCoin CryptoCurrency Script - JAVASCRIPT FILES -->
	<?php echo base64_decode($ad_code[body_code]); ?>
</body>
</html>