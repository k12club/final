<?php include("system/functions.php");
$seo_page_date = $db->get_row("SELECT seo FROM seo WHERE page_flag = 'exchange_page' ");
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
		<main id="cX-main" class="cX-main cX-haslayout">
			<div class="container">
				<div class="row">
						<div class="cX-adcontent">
							<ul class="cX-pagesequence">
								<li><a href="<?php echo $site_url; ?>"><?php echo $system_xml->header_2->text; ?></a></li>
								<li><?php echo $system_xml->exchange_1->text; ?></li>
							</ul>
						</div>					
						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 pull-right">
							<div id="cX-content" class="cX-content">
								<div class="cX-ads">
									<div class="row">
										<?php 
										$var_ext = $db->get_var("SELECT count(*) FROM exchange");
										if($var_ext!=0) {
										$datas_ext = $db->get_results("SELECT * FROM exchange order by e_name ASC");
				                      		foreach( $datas_ext as $data ){?>
										<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 cX-verticaltop">
											<div class="cX-ad cX-verifiedad">
												<div class="cX-adcontent">
													<ul class="cX-productcagegories">
														<li><a href="<?php echo $data->e_link; ?>" rel="nofollow"><?php echo $data->e_name; ?></a></li>
													</ul>
													<div class="cX-adtitle2">
														<h3><a href="<?php echo $data->e_link; ?>" rel="nofollow"><?php echo $data->e_desc; ?></a></h3>
													</div>
													<div class="cX-phonelike">
														<a class="cX-btnphone" href="<?php echo $data->e_link; ?>" rel="nofollow">
															<i class="icon-star-full"></i>
															<span data-toggle="tooltip" data-placement="top" title="Go to site"><em><?php echo $system_xml->exchange_2->text; ?></em></span>
														</a>
													</div>
												</div>
											</div>
										</div>
										<?php } }?>
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
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/normalize.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/icomoon.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/transitions.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/scrollbar.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/cX.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/color.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/responsive.css">	
	<script src="<?php echo $site_url; ?>/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	<!-- CxCoin CryptoCurrency Script - CSS FILES -->	

	<!-- CxCoin CryptoCurrency Script - JAVASCRIPT FILES -->	
	<script src="<?php echo $site_url; ?>/assets/js/vendor/jquery-library.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/vendor/bootstrap.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/JS/responsivethumbnailgallery.html"></script>
	<script src="<?php echo $site_url; ?>/assets/js/owl.carousel.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery.vide.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery.collapse.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/scrollbar.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery-ui.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/appear.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/cX.js"></script>
	<!-- CxCoin CryptoCurrency Script - JAVASCRIPT FILES -->

	<?php echo base64_decode($ad_code[body_code]); ?>
</body>
</html>