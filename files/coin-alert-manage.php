<?php include("system/functions.php");
require('system/scripts/westsworld.datetime.class.php');
require('system/scripts/timeago.inc.php');
$seo_page_date = $db->get_row("SELECT seo FROM seo WHERE page_flag = 'coin_alert_manage' ");
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
								<li><?php echo $system_xml->alert_12->text; ?></li>
							</ul>
						</div>	
						<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 pull-right">
							<div id="cX-content" class="cX-content">
								<div class="cX-post cX-detail cX-postdetail">								
									<div class="cX-description">										
										<div class="cX-logingarea">
											<h2><?php echo $system_xml->alert_13->text; ?></h2>
											<form id="manage_alert" method="post" class="cX-formtheme cX-formloging">
												<fieldset>
													<div class="form-group cX-inputwithicon">
														<i class="icon-envelope"></i>
														<input type="text" name="email" id="email" class="form-control" placeholder="<?php echo $system_xml->alert_2->text; ?>">
													</div>
													<button name="gd" type="submit" class="cX-btn" type="button"><?php echo $system_xml->alert_14->text; ?></button>
													<div class="cX-dbsectionspace cX-haslayout cX-alertexamples" id="alert_danger"></div>
												</fieldset>
											</form>
										</div>
										<?php 
												if(isset($_POST['gd'])){													
													$email=postCR($_POST['email']);
													$var_alert = $db->get_var("SELECT count(*) FROM coin_alert where email='$email'");
													if($var_alert==0){?>
														<div class="cX-alert alert alert-danger fade in"><p><strong><?php echo $system_xml->alert_21->text; ?> </strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>
													<?php }
													else {?>
													<table id="coinHistory" class="cell-border hover compact dataTable dtr-inline" cellspacing="0" width="100%" role="grid" style="width: 100%;">
											        <thead>
											            <tr>
											                <th><?php echo $system_xml->alert_15->text; ?></th>
											                <th><?php echo $system_xml->alert_16->text; ?></th>
											                <th><?php echo $system_xml->alert_17->text; ?></th>
											                <th><?php echo $system_xml->alert_18->text; ?></th>
											            </tr>
											        </thead>
											        <tfoot>
											            <tr>
											                <th><?php echo $system_xml->alert_15->text; ?></th>
											                <th><?php echo $system_xml->alert_16->text; ?></th>
											                <th><?php echo $system_xml->alert_17->text; ?></th>
											                <th><?php echo $system_xml->alert_18->text; ?></th>
											            </tr>
											        </tfoot>
											        <tbody>
													<?php 
													$datas = $db->get_results("SELECT * FROM coin_alert where email='$email' order by id desc");
			               							foreach( $datas as $data ){			               								
													$times=date('Y/m/d H:i:s', $data->alert_time);
													$timeAgo = new TimeAgo();
													$coin_details = $db->get_row("SELECT coin_name,coin_flag FROM coins WHERE coin_symbol = '".$data->coin."' ");
			               								?>
											        <tr class="odd">
											            <td><?php echo $timeAgo->inWords($times,date("Y/m/d H:i:s"));?></td>
											            <td class="currency-name"><span class="currency-logo-sprite"><img src="<?php echo $site_url; ?>/assets/images/coin/16/<?php echo $coin_details->coin_flag; ?>.png"></span><?php echo $coin_details->coin_name; ?></td>
											            <td><sup>$</sup><?php echo number_format($data->price); ?> <?php if($data->price_status==1){ ?><span class="cX-alert_span green">(<?php echo $system_xml->alert_3->text;?>)</span><?php  } else{?><span class="cX-alert_span red">(<?php echo $system_xml->alert_4->text; ?>)</span><?php } ?></td>
											            <td><?php  if($data->alert_status==0){ ?><span class="cX-alert-success"><?php echo $system_xml->alert_19->text; ?></span><?php  } else {?><span class="cX-alert-danger"><?php echo $system_xml->alert_20->text; ?></span><?php } ?></td>
											        </tr>
											        <?php } ?>
											        
											    </tbody></table>
													<?php }
														
											}?>						 											
									</div>
								</div>
								
							</div>
						</div>
						<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
							<aside id="cX-sidebar" class="cX-sidebar">								
								<div class="cX-widget cX-widgettrendingposts">
									<div class="cX-sidebartitle"><h2>Cryptocurrency Price Alerts</h2></div>
									<div class="cX-widgetcontent">
										<ul>
											<li>
												<a href="<?php echo $site_url; ?>/coin-price-alert" title="Coin Price Alerts">
													<span>- <?php echo $system_xml->alert_11->text; ?></span>
												</a>
											</li>
											<li>
												<a href="<?php echo $site_url; ?>/coin-price-alert-manage" title="Manage Alerts">
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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.0/b-colvis-1.5.0/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/rr-1.2.3/datatables.min.css"/>
	<!-- CxCoin CryptoCurrency Script - CSS FILES -->	

	<!-- CxCoin CryptoCurrency Script - JAVASCRIPT FILES -->
	<script src="<?php echo $site_url; ?>/assets/js/vendor/jquery-library.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/vendor/bootstrap.min.js"></script>	
	<script src="<?php echo $site_url; ?>/assets/js/jquery.flagstrap.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/backgroundstretch.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery.vide.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery.collapse.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/scrollbar.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery-ui.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/appear.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/cX.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.0/b-colvis-1.5.0/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/rr-1.2.3/datatables.min.js"></script>
	<script type="text/javascript">	
		/*Language*/
		var alert_1="<?php echo $system_xml->alert_7->text; ?>";
		var alert_2="<?php echo $system_xml->alert_8->text; ?>";
		/*Language*/
	</script>
	<script src="assets/js/cX-alert-manage.js"></script>
	<!-- CxCoin CryptoCurrency Script - JAVASCRIPT FILES -->
	<?php echo base64_decode($ad_code[body_code]); ?>
</body>
</html>