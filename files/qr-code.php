<?php include("system/functions.php");
$seo_page_date = $db->get_row("SELECT seo FROM seo WHERE page_flag = 'qr_code_page' ");
$seo_page = json_decode($seo_page_date->seo,JSON_UNESCAPED_UNICODE) ?>
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
								<li><a href="<?php echo $site_url;?>"><?php echo $system_xml->header_2->text; ?></a></li>
								<li><?php echo $system_xml->qrcode_1->text; ?></li>
							</ul>
						</div>	
						<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 pull-right">
							<div id="cX-content" class="cX-content">
								<div class="cX-post cX-detail cX-postdetail">								
									<div class="cX-description">										
										<div class="cX-logingarea">
											<h2><?php echo $system_xml->qrcode_1->text; ?></h2>
											<form id="qr_code_form" method="post" class="cX-formtheme cX-formloging">
												<fieldset>
													<div class="row">
														<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left">	
															<div class="form-group">
																<input type="text" name="wallet" id="wallet" class="form-control" style="padding-left: 20px !important" placeholder="<?php echo $system_xml->qrcode_2->text; ?>">
															</div>
															<div class="form-group">
												          		<div class="cX-select">
																	<select name="coin-type" id="coin">
																		<option value="bitcoin">Bitcoin</option>
																		<option value="ethereum">Ethereum</option>
																		<option value="litecoin">Litecoin</option>
																		<option value="dogecoin">Dogecoin</option>
																	</select>
																</div>
												          	</div>
												          	<div class="form-group">
																<button name="gd" type="submit" class="cX-btn" type="submit"><?php echo $system_xml->qrcode_3->text; ?></button>
																<div class="cX-dbsectionspace cX-haslayout cX-alertexamples" id="alert_danger"></div>
															</div>															
												        </div>
														<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center cX-qr_link">
															<a id="qr_link" href="javascript:;" rel="nofollow">
																<img rel="nofollow" id="qr_code" src="<?php echo $site_url;?>/assets/images/qr.png" class="center-block">
																<i class="fa fa-floppy-o" aria-hidden="true"></i><?php echo $system_xml->qrcode_4->text; ?>
															</a>
												        </div>												 		
												    </div>													
												</fieldset>
											</form>
										</div>										
									</div>
								</div>								
							</div>
						</div>
						<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
							<aside id="cX-sidebar" class="cX-sidebar">																
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
	<script src="<?php echo $site_url;?>/assets/js/jquery.flagstrap.min.js"></script>
	<script src="<?php echo $site_url;?>/assets/js/jquery.vide.min.js"></script>
	<script src="<?php echo $site_url;?>/assets/js/jquery.collapse.js"></script>
	<script src="<?php echo $site_url;?>/assets/js/scrollbar.min.js"></script>
	<script src="<?php echo $site_url;?>/assets/js/jquery-ui.js"></script>
	<script src="<?php echo $site_url;?>/assets/js/appear.js"></script>
	<script type="text/javascript">	
		/*Language*/
		var alert_1="<?php echo $system_xml->qrcode_5->text; ?>";
		var site_url="<?php echo $site_url;?>";
		/*Language*/
	</script>
	<script src="assets/js/cX-QRcode.js"></script>
	<!-- CxCoin CryptoCurrency Script - JAVASCRIPT FILES -->
	<?php echo base64_decode($ad_code[body_code]); ?>
</body>
</html>