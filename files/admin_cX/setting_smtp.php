<?php @include "system/session_cont.php"; @$i_bilgi=getCR_ST($_GET['i']);
$donate_data = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'smtp' ");
$donate = json_decode($donate_data->setting_value,JSON_UNESCAPED_UNICODE);	?><!doctype html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>cX Admin</title>	

	<link type="text/css" rel="stylesheet" href="assets/fonts/fonts.css">
    <link type="text/css" rel="stylesheet" href="assets/icons/icomoon/icomoon.css">
    <link type="text/css" rel="stylesheet" href="css/animate.min.css">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.css">   
	<link type="text/css" rel="stylesheet" href="css/core.css">	
	<link type="text/css" rel="stylesheet" href="css/layout.css">	
	<link type="text/css" rel="stylesheet" href="css/bootstrap-extended.css">	    
	<link type="text/css" rel="stylesheet" href="css/components.css">
	<link type="text/css" rel="stylesheet" href="css/plugins.css">
	<link type="text/css" rel="stylesheet" href="css/loaders.css">
	<link type="text/css" rel="stylesheet" href="css/responsive.css">
	<link type="text/css" rel="stylesheet" href="css/color-system.css">		
	<link type="text/css" rel="stylesheet" href="css/fancybox/jquery.fancybox.css">
	<link type="text/css" rel="stylesheet" href="css/themes/<?=$site_themes[$awdscx->theme]?>.css">

	<link type="text/css" rel="stylesheet" href="css/snippets.css">
</head>
<body class="material-menu" id="top">
	<div id="preloader">
		<div id="status">
			<div class="loader">
				<div class="loader-inner ball-pulse">
				  <div class="bg-blue"></div>
				  <div class="bg-amber"></div>
				  <div class="bg-success"></div>
				</div>
			</div>
		</div>
	</div>
	
	<?php @include("pages/i_header.php"); ?>

	<?php @include("pages/i_left.php"); ?>
	
	<!--Page Container-->
	<section class="main-container">	
			<!--Page Header-->
			<div class="header">
				<div class="header-content">
					<div class="page-title">
						<i class="icon-gear position-left"></i> SMTP Setting
					</div>
					<ul class="breadcrumb">
						<li><a href="index.c">Dashboards</a></li>
						<li>Settings</li>						
						<li class="active"> SMTP Setting</li>
					</ul>					
				</div>
			</div>
		
			<div class="container-fluid page-content">
						
				<div class="row">
					

					<div class="col-md-6 col-sm-6" id="sag_bolum">
					<!--sağ kolon başlangıç-->
					
	
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h4 class="panel-title"><strong>SMTP Setting</strong></h4>							
							</div>
							<div class="panel-body">
								<form class="form-horizontal form-validate" method="post" id="site_add">									

								<div class="form-group">
									<label class="control-label col-lg-4">SMTP HOST</label>
									<div class="col-lg-8">
										<input name="smtp_host" type="text" class="form-control" placeholder="Example: smtp.yandex.com" value="<?=@$donate[smtp_host]?>">
									</div>
								</div>								

								<div class="form-group">
									<label class="control-label col-lg-4">SMTP PORT</label>
									<div class="col-lg-8">
										<input name="smtp_port" type="text" class="form-control" placeholder="Example: 587" value="<?=@$donate[smtp_port]?>">
									</div>
								</div>										

								<div class="form-group">
									<label class="control-label col-lg-4">SMTP Username</label>
									<div class="col-lg-8">
										<input name="smtp_mail" type="text" class="form-control" placeholder="email@website.com" value="<?=@$donate[smtp_mail]?>">
									</div>
								</div>									

								<div class="form-group">
									<label class="control-label col-lg-4">SMTP Password</label>
									<div class="col-lg-8">
										<input name="smtp_password" type="password" class="form-control" value="<?=@$donate[smtp_password]?>">
									</div>
								</div>	

								<div class="form-group">
									<label class="control-label col-lg-4">SMTP Secure</label>
									<div class="col-lg-8">
										<select name="smtp_secure" class="bootstrap-select" data-width="100%">
											<option<?php if(@$donate[smtp_secure]=="tls"){?> selected="selected"<?php } ?> value="tls">TLS</option>
											<option<?php if(@$donate[smtp_secure]=="ssl"){?> selected="selected"<?php } ?> value="ssl">SSL</option>
											<option<?php if(@$donate[smtp_secure]=="none"){?> selected="selected"<?php } ?> value="none">None</option>
										</select>
									</div>
								</div>	

								<div class="form-group">
									<label class="control-label col-lg-4">SMTP Authentication</label>
									<div class="col-lg-8">
										<select name="smtp_auth" class="bootstrap-select" data-width="100%">
											<option<?php if(@$donate[smtp_auth]==1){?> selected="selected"<?php } ?> value="1">Yes</option>
											<option<?php if(@$donate[smtp_auth]==2){?> selected="selected"<?php } ?> value="2">No</option>
										</select>
									</div>
								</div>


								<div class="form-group">
									<div class="col-lg-12">
										<button name="gd" type="submit" class="btn bg-primary btn-lg pull-right"><i class="icon-checkmark position-left"></i> Update</button>
									</div>
								</div>									
								</form>	

									<div class="panel-body">										
									
										<?php if (@getCR_ST($_GET['m']) == 1){?>
										<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
											<span class="text-semibold">Successfully Updated</span>
										</div>
										<?php } ?>
									</div>


								<?php 
									if(isset($_POST['gd'])){
										$smtp_host=postCR($_POST['smtp_host']);
										$smtp_port=postCR($_POST['smtp_port']);
										$smtp_mail=postCR($_POST['smtp_mail']);
										$smtp_password=postCR($_POST['smtp_password']);
										$smtp_secure=postCR($_POST['smtp_secure']);
										$smtp_auth=postCR($_POST['smtp_auth']);

										$c=array();
										$c[smtp_host]=$smtp_host;
										$c[smtp_port]=$smtp_port;
										$c[smtp_mail]=$smtp_mail;
										$c[smtp_password]=$smtp_password;
										$c[smtp_secure]=$smtp_secure;
										$c[smtp_auth]=$smtp_auth;

										$c_son = postCR(json_encode($c,JSON_UNESCAPED_UNICODE));

										$db->query("UPDATE settings SET  setting_value='$c_son' WHERE setting_name = 'smtp'");
										header("Location: ?m=1");
									}
								 ?>		

							</div>
						</div>


				</div>

				<div class="col-md-6 col-sm-6" id="sag_bolum">
										
						
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h4 class="panel-title"><strong>Test SMTP</strong></h4>							
							</div>
							<div class="panel-body">
								<form class="form-horizontal form-validate" method="post" id="site_add">									

								<div class="form-group">
										<label class="control-label col-lg-4">E-mail</label>
										<div class="col-lg-8">
											<input name="email" type="text" class="form-control" placeholder="email@website.com">
										</div>
									</div>		

								<div class="form-group">
									<div class="col-lg-12">
										<button name="gd2" type="submit" class="btn bg-primary btn-lg pull-right"><i class="icon-checkmark position-left"></i> Test</button>
									</div>
								</div>									
								</form>	
								<?php 
									if(isset($_POST['gd2'])){
										$email=postCR($_POST['email']);
										$smtp_host=@$donate[smtp_host];
										$smtp_port=@$donate[smtp_port];
										$smtp_mail=@$donate[smtp_mail];
										$smtp_password=@$donate[smtp_password];
										$smtp_secure=@$donate[smtp_secure];
										$smtp_auth=@$donate[smtp_auth];


										require '../system/mail/mail_setting.php';							

										$mail->setFrom(@$donate[smtp_mail], 'Test Mail'); // gönderen mail
										$mail->addReplyTo(@$donate[smtp_mail], "Test Mail"); // cevaplanıcak mail

										$mail->addAddress($email, $email); // alıcı mail

										$mail->Subject = 'Test Mail - '.date("d-m-Y H:i:s"); // başlık
										$mail->CharSet = 'utf-8';  
										$mail->msgHTML('Test Mail'); // mail içeriği

										if (!$mail->send()) {echo "Mailer Error: " . $mail->ErrorInfo;} else {?>
											<div class="panel-body">																												
												<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
													<span class="text-semibold">Successfully</span>
												</div>
											</div>

										<?php }
										//echo $email;
									}
								?>
										
							</div>
						</div>									
					</div>

										
				
		</div>
	
<?php @include("pages/i_footer.php"); ?>

<a id="scrollTop" href="#top"><i class="icon-arrow-up12"></i></a>	
<a id="scrollGeri" href="javascript:history.back(-1)"><i class="icon-arrow-left12"></i></a>

<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/timer.js"></script>
<script type="text/javascript">gerisay(<?=$mocrea_time - time()?>,<?=$mocrea_totaltime?>,"<?=$_SERVER['REQUEST_URI']?>")</script>
<script type="text/javascript">

$( "#uzat_sure" ).click(function() {
  $( "#sure_uzat" ).trigger( "click" );
});
</script>

<!-- Global scripts -->
<script src="js/jquery.js"></script>	
<script src="js/bootstrap.js"></script>
<script src="js/jquery.ui.js"></script>
<script src="js/nav.accordion.js"></script>	
<script src="js/hammerjs.js"></script>
<script src="js/jquery.hammer.js"></script>
<script src="js/scrollup.js"></script>	
<script src="js/jquery.slimscroll.js"></script>	
<script src="js/smart-resize.js"></script>
<script src="js/blockui.min.js"></script>		
<script src="js/wow.min.js"></script>					
<script src="js/fancybox.min.js"></script>
<script src="js/venobox.js"></script>
<script src="js/forms/uniform.min.js"></script>
<script src="js/forms/switchery.js"></script>
<script src="js/forms/select2.min.js"></script>	
<script src="js/core.js"></script>

<script type="text/javascript" src="js/forms/jquery.validate.js"></script>
<script type="text/javascript" src="js/forms/switch.min.js"></script>
<script type="text/javascript" src="js/pages/form_validations.js"></script>

<script src="js/pages/form_inputs_basic.js"></script>
<script src="js/forms/bootstrap_select.min.js"></script>
<script src="js/pages/form_bootstrap_selects.js"></script>
<script src="js/full.min.js"></script>	
<script src="js/pages/form_select2.js"></script>
<script src="js/pages/profile_snippets.js"></script>

</body>
</html>