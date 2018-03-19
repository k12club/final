<?php include("system/functions.php");
$currencies_data = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'curreny_setting' ");
$currencies_data2 = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'curreny_data' ");
$d_4 = json_decode($currencies_data->setting_value,JSON_UNESCAPED_UNICODE);
$d_3 = json_decode($currencies_data2->setting_value,JSON_UNESCAPED_UNICODE);
$seo_page_date = $db->get_row("SELECT seo FROM seo WHERE page_flag = 'coin_calculator' ");
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
								<li><a href="javascript:void(0);"><?php echo $system_xml->header_2->text; ?></a></li>
								<li><?php echo $system_xml->calculator_1->text; ?></li>
							</ul>
						</div>	
						<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 pull-right">
							<div id="cX-content" class="cX-content">
								<div class="cX-post cX-detail cX-postdetail">								
									<div class="cX-description">										
										<div class="cX-logingarea">
											<h2><?php echo $system_xml->calculator_1->text; ?></h2>
											<form class="cX-formtheme cX-formloging" method="post">
												<input type="hidden" id="islem" name="islem" value="1">
												<fieldset>
													<div class="row">	
														<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
															<div class="form-group">
												          		<div class="form-group cX-inputwithicon">
																	<i class="fa fa-money"></i>
																	<input maxlength="10" type="text" name="number" id="number" class="form-control" placeholder="<?php echo $system_xml->calculator_2->text; ?>">
																</div>
												          	</div>
												        </div>
												 		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
															<a class="cX-btn cX-change" type="button"><i class="fa fa-exchange"></i></a>
												        </div>
												    </div>
													<div class="row">	
														<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left" id="islem_1">
															<div class="form-group">
												          		<div class="cX-selected">
																	<select name="select_1" class="selectpicker" data-live-search="true">
																		<?php for ($i = 0; $i <= count($d_4)-1 ; $i++) {
																			if($d_4[$i][status]==1){?><option<?php if($d_4[$i][code]=="USD"){?> selected="selected"<?php } ?> value="m-<?php echo $d_4[$i][code]; ?>-<?php echo $d_3[USD.$d_4[$i][code]]; ?>"><?php echo $d_4[$i][name]; ?> (<?php echo $d_4[$i][code]; ?>)</option><?php }} ?>
																		<?php
													                      $datas_f = $db->get_results("SELECT coin_name,coin_price,coin_symbol FROM coins order by coin_rank ASC");
													                      foreach( $datas_f as $d_f ){?><option value="c-<?php echo $d_f->coin_symbol;?>-<?php echo $d_f->coin_price;?>"><?php echo $d_f->coin_name; ?> (<?php echo $d_f->coin_symbol; ?>)</option><?php } ?>
																	</select>
																</div>
												          	</div>
												        </div>
												 		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right" id="islem_2">
															<div class="form-group">
																<div class="cX-selected">
																	<select name="select_2" class="selectpicker" data-live-search="true">
																	<?php for ($i = 0; $i <= count($d_4)-1 ; $i++) {
																			if($d_4[$i][status]==1){?><option value="m-<?php echo $d_4[$i][code]; ?>-<?php echo $d_3[USD.$d_4[$i][code]]; ?>"><?php echo $d_4[$i][name];?> (<?php echo $d_4[$i][code]; ?>)</option><?php }} ?>
																		<?php
													                      $datas_f = $db->get_results("SELECT coin_name,coin_price,coin_symbol FROM coins order by coin_rank ASC");
													                      foreach( $datas_f as $d_f ){?><option<?php if($d_f->coin_symbol=="BTC"){?> selected="selected"<?php } ?> value="c-<?php echo $d_f->coin_symbol; ?>-<?php echo $d_f->coin_price;?>"><?php echo $d_f->coin_name; ?> (<?php echo $d_f->coin_symbol; ?>)</option><?php } ?>
																	</select>
																</div>
															</div>
												        </div>
												        <div class="clearfix"></div>
												 		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
															<div class="form-group">
																<button name="gd" type="submit" class="cX-btn" type="button"><?php echo $system_xml->calculator_3->text; ?></button>
															</div>
															<div class="cX-dbsectionspace cX-haslayout cX-alertexamples" id="alert_danger"></div>
												        </div>
												    </div>
												</fieldset>
											<?php 
												if(isset($_POST['gd'])){
													$islem=getCR_NUM($_POST['islem']);
													$money=getCR_NUM($_POST['number']);
													$select_1=getCR_NUM($_POST['select_1']);
													$select_2=getCR_NUM($_POST['select_2']);

													if($islem==1){
														$s_1=$select_1;
														$s_2=$select_2;
														$cikti=substr($s_1, 0,1).".".substr($s_2, 0,1);
													}

													if($islem==2){
														$s_1=$select_2;
														$s_2=$select_1;
														$cikti=substr($s_1, 0,1).".".substr($s_2, 0,1);
													}

													$select_1_new=str_replace(array("c-","m-"), "", $s_1);
													$select_1_new_c=explode("-", $select_1_new);
													$select_1_new=$select_1_new_c[1];

													$select_2_new=str_replace(array("c-","m-"), "", $s_2);
													$select_2_new_c=explode("-", $select_2_new);
													$select_2_new=$select_2_new_c[1];
													
													switch ($cikti) {
														case "c.c":
															$cx_1=number_format((double)($select_1_new*$money)/$select_2_new, 8);
															break;
														case "c.m":
															$cx_1=number_format((double)($select_1_new*$money)*$select_2_new, 8);
															break;
														case "m.c":
															$cx_1=number_format((double)($money/$select_1_new)/($select_2_new), 8);
															break;
														case "m.m":
															$cx_1=number_format((double)((1/$select_1_new)*$money)*$select_2_new, 4);
															break;
														
														default:
															// code...56413395950
															break;
													}

													?>
														<div class="cX-alert alert alert-success fade in"><p><strong><?php echo number_format($money)." ".$select_1_new_c[0];?> = <?php echo $cx_1." ".$select_2_new_c[0]; ?>  </strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>
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
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/bootstrap-select.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/normalize.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/icomoon.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/transitions.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/owl.carousel.css">
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/owl.carousel.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery.vide.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery.collapse.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/scrollbar.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery-ui.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/appear.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/cX.js"></script>
	<script type="text/javascript">	
		/*Language*/
		var alert="<?php echo $system_xml->calculator_4->text; ?>";
		/*Language*/
	</script>	
	<script src="<?php echo $site_url; ?>/assets/js/cX-coin-calculator.js"></script>
	<!-- CxCoin CryptoCurrency Script - JAVASCRIPT FILES -->	
	<?php echo base64_decode($ad_code[body_code]); ?>

</body>
</html>