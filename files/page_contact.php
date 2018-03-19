<?php include("system/functions.php");
$donate_data = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'smtp' ");
$donate = json_decode($donate_data->setting_value,JSON_UNESCAPED_UNICODE);
$seo_page_date = $db->get_row("SELECT seo FROM seo WHERE page_flag = 'page_contact' ");
$seo_page = json_decode($seo_page_date->seo,JSON_UNESCAPED_UNICODE); ?>
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
							<li><?php echo $system_xml->contact_1->text; ?></li>
						</ul>
					</div>	
					<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 pull-right">
						<div id="cX-content" class="cX-content">							
							<div class="cX-contactarea">								
								<div class="row">
									<form method="post">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
												<div class="form-group">
													<input type="text" name="firstname" id="firstname" class="form-control" placeholder="<?php echo $system_xml->contact_2->text; ?>">
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
												<div class="form-group">
													<input type="text" name="lastname" id="lastname" class="form-control" placeholder="<?php echo $system_xml->contact_3->text; ?>">
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
												<div class="form-group">
													<input type="text" name="email" id="email" class="form-control" placeholder="<?php echo $system_xml->contact_4->text; ?>">
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
												<div class="form-group">
													<input type="text" name="subject" id="subject" class="form-control" placeholder="<?php echo $system_xml->contact_5->text; ?>">
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="form-group">
													<textarea name="comment" id="comment" class="form-control" placeholder="<?php echo $system_xml->contact_6->text; ?>"></textarea>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<button name="gd" type="submit" class="cX-btn" type="button"><?php echo $system_xml->contact_7->text; ?></button>
												<div class="cX-dbsectionspace cX-haslayout cX-alertexamples" id="alert_danger"></div>
											</div>
										</div>
									</form>
									<?php 
										if(isset($_POST['gd'])){				
											$firstname=postCR($_POST['firstname']);
											$lastname=postCR($_POST['lastname']);				
											$email=postCR($_POST['email']);				
											$subject=postCR($_POST['subject']);
											$comment=postCR($_POST['comment']);
											$email=postCR($_POST['email']);

											$smtp_host=$donate[smtp_host];
											$smtp_port=$donate[smtp_port];
											$smtp_mail=$donate[smtp_mail];
											$smtp_password=$donate[smtp_password];
											$smtp_secure=$donate[smtp_secure];
											$smtp_auth=$donate[smtp_auth];


											require 'system/mail/mail_setting.php';							

											$mail->setFrom($donate[smtp_mail], 'Contact US'); 
											$mail->addReplyTo($email, $firstname." ".$lastname); 

											$mail->addAddress($site_setting[contact_mail], "Contact US"); 

											$mail->Subject = 'Contact US - '.date("d-m-Y H:i:s");
											$mail->CharSet = 'utf-8';  
											require 'system/mail/mail_contact.php';	
											if (!$mail->send()) {echo "Mailer Error: " . $mail->ErrorInfo;} else {?>
											<div class="cX-alert alert alert-success fade in"><p><strong><?php echo $system_xml->contact_14->text; ?></strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>
										<?php }	}?>
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
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/normalize.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/icomoon.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/transitions.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/scrollbar.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/cX.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/color.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/assets/css/responsive.css">
	<!-- CxCoin CryptoCurrency Script - CSS FILES -->	

	<!-- CxCoin CryptoCurrency Script - JAVASCRIPT FILES -->
	<script src="<?php echo $site_url; ?>/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/vendor/jquery-library.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/vendor/bootstrap.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery.flagstrap.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery.vide.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery.collapse.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/scrollbar.min.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/jquery-ui.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/appear.js"></script>
	<script src="<?php echo $site_url; ?>/assets/js/cX.js"></script>
	<script type="text/javascript">	
		/*Language*/
		var alert_1="<?php echo $system_xml->contact_8->text; ?>";
		var alert_2="<?php echo $system_xml->contact_9->text; ?>";
		var alert_3="<?php echo $system_xml->contact_10->text; ?>";
		var alert_4="<?php echo $system_xml->contact_11->text; ?>";
		var alert_5="<?php echo $system_xml->contact_12->text; ?>";
		var alert_6="<?php echo $system_xml->contact_13->text; ?>";
		/*Language*/
	</script>
	<script src="<?php echo $site_url; ?>/assets/js/cX-contact.js"></script>
	<!-- CxCoin CryptoCurrency Script - JAVASCRIPT FILES -->
	<?php echo base64_decode($ad_code[body_code]); ?>

</body>
</html>