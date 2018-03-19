<?php @include "system/session_cont.php";
$data_1 = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'setting_color' ");
$data_2 = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'setting_code' ");
$data_3 = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'setting' ");
$currencies_data = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'curreny_setting' ");


$d_1 = json_decode($data_1->setting_value,JSON_UNESCAPED_UNICODE);
$d_2 = json_decode($data_2->setting_value,JSON_UNESCAPED_UNICODE);
$d_3 = json_decode($data_3->setting_value,JSON_UNESCAPED_UNICODE);
$d_4 = json_decode($currencies_data->setting_value,JSON_UNESCAPED_UNICODE);

?><!doctype html>
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
						<i class="icon-cog position-left"></i> Site Setting
					</div>
					<ul class="breadcrumb">
						<li><a href="index.c">Dashboards</a></li>
						<li>Settings</li>						
						<li class="active"> Site Setting</li>
					</ul>			
				</div>
			</div>
			
			<div class="container-fluid page-content">
			
				<div class="row">					
					
					

					<div class="col-md-6 col-sm-6">				
						
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h4 class="panel-title"><strong>Site Setting</h4>							
							</div>
							<div class="panel-body">
								<form class="form-horizontal form-validate" method="post" enctype="multipart/form-data">									

								<div class="form-group">
									<label class="control-label col-lg-4">Logo <span class="label label-success">PNG - 315x65</span></label>
									<div class="col-lg-8">
										<input name="logo" type="file" class="file-styled-primary" placeholder="aaa">
									</div>
								</div>									

								<div class="form-group">
									<label class="control-label col-lg-4">Default Language</label>
									<div class="col-lg-8 input-group">
										<select name="languages" class="bootstrap-select" data-width="18%">
											<?php 
											 $datas_f = $db->get_results("SELECT lang_flag,lang_name FROM languages where lang_status = 1 order by lang_order ASC");
	                      					 foreach( $datas_f as $d_f ){
											?>
											<option<?php if(@$d_3[language]==$d_f->lang_flag) {?> selected="selected"<?php }?> value="<?=@$d_f->lang_flag?>"><?=@$d_f->lang_name?></option>
											<?php } ?>
										</select>

										<div class="input-group-btn">
											<a href="languages.c" class="btn bg-indigo btn-icon"><i class="icon-gear"></i></a>
										</div>
									</div>
								</div>								

								<div class="form-group">
									<label class="control-label col-lg-4">Default Currency</label>
									<div class="col-lg-8 input-group">
										<select name="currency" class="bootstrap-select" data-width="18%">
											<?php for ($i = 0; $i <= count($d_4)-1 ; $i++) {
												if(@$d_4[$i][status]==1){
											?>
											<option<?php if(@$d_3[currency]==@$d_4[$i][code]) {?> selected="selected"<?php }?> value="<?=@$d_4[$i][code]?>"><?=@$d_4[$i][name]?></option>
											<?php }} ?>
										</select>

										<div class="input-group-btn">
											<a href="currencies.c" class="btn bg-indigo btn-icon"><i class="icon-gear"></i></a>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4">Currency - API</label>
									<div class="col-lg-7">
										<input name="currency_api" type="text" class="form-control" placeholder="https://currencylayer.com/ - API" value="<?=@$d_3[currency_api]?>">										
									</div>
									<div class="col-lg-1 input-group-btn">
											<a href="https://currencylayer.com/" target="_blank" class="btn bg-indigo btn-icon"><i class="icon-gear"></i></a>
										</div>
								</div>	

								<div class="form-group">
									<label class="control-label col-lg-4">Contact Form - Mail</label>
									<div class="col-lg-8">
										<input name="contact_mail" type="text" class="form-control" value="<?=@$d_3[contact_mail]?>">
									</div>
								</div>	

								<div class="form-group">
									<div class="col-lg-12">
										<button name="gd1" type="submit" class="btn bg-primary btn-lg pull-right"><i class="icon-checkmark position-left"></i> Update</button>
									</div>
								</div>									
								</form>	

								<div class="panel-body">										
									
										<?php if (@getCR_ST($_GET['m1']) == 1){?>
										<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
											<span class="text-semibold">Successfully Updated</span>
										</div>
										<?php } ?>
										<?php if (@getCR_ST($_GET['m1']) == 2){?>
										<div class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered">
											<span class="text-semibold">Only PNG</span>
										</div>
										<?php } ?>
									</div>


								<?php 
									if(isset($_POST['gd1'])){

										if($_FILES['logo'][error]==4){ 
											$logo=$d_3[logo];
										}
											else {
												@unlink($d_3[logo]);
												$logo=file_upload("logo","png,PNG","../assets/images","logo_".time(),"setting_site.c?m1=2");
												//echo $logo;
											}								

										$s_setting=array();

										$languages=postCR($_POST['languages']);
										$currency=postCR($_POST['currency']);
										$currency_api=postCR($_POST['currency_api']);
										$contact_mail=postCR($_POST['contact_mail']);

										$s_setting[logo]=postCR($logo);
										$s_setting[language]=$languages;
										$s_setting[currency]=$currency;
										$s_setting[currency_api]=$currency_api;
										$s_setting[contact_mail]=$contact_mail;

										$s_son = postCR(json_encode($s_setting,JSON_UNESCAPED_UNICODE));

										$db->query("UPDATE settings SET  setting_value='$s_son' WHERE setting_name = 'setting'");
										header("Location: ?m1=1");
									}
								 ?>	
								
								
						</div>									
					</div>				
						
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h4 class="panel-title"><strong>Site Color</h4>							
							</div>
							<div class="panel-body">
								<form class="form-horizontal form-validate" method="post" enctype="multipart/form-data">									
								

								<div class="form-group">
									<label class="control-label col-lg-4">Site Color</label>
									<div class="col-lg-8 input-group">
									<input name="color1" type="text" class="form-control colorpicker-palette-only" value="<?=@$d_1[site_color]?>">
									</div>
								</div>								

								<div class="form-group">
									<label class="control-label col-lg-4">Header & Footer Color</label>
									<div class="col-lg-8 input-group">
									<input name="color2" type="text" class="form-control colorpicker-palette-only2" value="<?=@$d_1[header_color]?>">
									</div>
								</div>	

								<div class="form-group">
									<label class="control-label col-lg-4">Homepage Slider Image <span class="label label-success">PNG,JPG - 1000x500</span></label>
									<div class="col-lg-8">
										<input name="logo" type="file" class="file-styled-primary" placeholder="aaa">
									</div>
								</div>	

								<div class="form-group">
									<div class="col-lg-12">
										<button name="gd2" type="submit" class="btn bg-primary btn-lg pull-right"><i class="icon-checkmark position-left"></i> Update</button>
									</div>
								</div>									
								</form>

									<div class="panel-body">										
									
										<?php if (@getCR_ST($_GET['m2']) == 1){?>
										<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
											<span class="text-semibold">Successfully Updated</span>
										</div>
										<?php } ?>
									</div>


								<?php 
									if(isset($_POST['gd2'])){
										$s_color=array();
										$color1=postCR($_POST['color1']);
										$color2=postCR($_POST['color2']);
										$color3=postCR($_POST['color3']);
										$s_color[site_color]=$color1;
										$s_color[header_color]=$color2;
										$s_color[footer_color]=$color3;

										if($_FILES['logo'][error]==4){ 
											$logo=$d_1[slider_image];
										}
										else {
											@unlink($d_1[slider_image]);
											$logo=file_upload("logo","png,PNG,jpg,JPG,jpeg,JPEG","../assets/images","slider_".time(),"setting_site.c?m1=2");
											//echo $logo;
										}
										
										$s_color[slider_image]=postCR($logo);
										$color_son = postCR(json_encode($s_color,JSON_UNESCAPED_UNICODE));

										$db->query("UPDATE settings SET  setting_value='$color_son' WHERE setting_name = 'setting_color'");
										header("Location: ?m2=1");
									}
								 ?>	
								
								
						</div>									
					</div>																			
				</div>

					<div class="col-md-6 col-sm-6">				
						
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h4 class="panel-title"><strong>Codes</strong></h4>							
							</div>
							<div class="panel-body">
								<form class="form-horizontal form-validate" method="post">									

								<div class="form-group">
									<label class="control-label col-lg-4">Ad Code - Header </label>
									<div class="col-lg-8">
										<textarea name="code_1" rows="4" cols="5" name="textarea" class="form-control" placeholder="728x90"><?=@base64_decode($d_2[ad_code_1])?></textarea>
									</div>
								</div>										

								<div class="form-group">
									<label class="control-label col-lg-4">Ad Code - Footer </label>
									<div class="col-lg-8">
										<textarea name="code_2" rows="4" cols="5" name="textarea" class="form-control" placeholder="728x90"><?=@base64_decode($d_2[ad_code_2])?></textarea>
									</div>
								</div>									

								<div class="form-group">
									<label class="control-label col-lg-4">Extra Code / <?=htmlspecialchars("<head>")?></label>
									<div class="col-lg-8">
										<textarea name="code_3" rows="4" cols="5" name="textarea" class="form-control"><?=@base64_decode($d_2[head_code])?></textarea>
									</div>
								</div>									

								<div class="form-group">
									<label class="control-label col-lg-4">Extra Code / <?=htmlspecialchars("</body>")?></label>
									<div class="col-lg-8">
										<textarea name="code_4" rows="4" cols="5" name="textarea" class="form-control"><?=@base64_decode($d_2[body_code])?></textarea>
									</div>
								</div>

								<div class="form-group">
									<div class="col-lg-12">
										<button name="gd3" type="submit" class="btn bg-primary btn-lg pull-right"><i class="icon-checkmark position-left"></i> Update</button>
									</div>
								</div>									
								</form>	

									<div class="panel-body">										
									
										<?php if (@getCR_ST($_GET['m3']) == 1){?>
										<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
											<span class="text-semibold">Successfully Updated</span>
										</div>
										<?php } ?>
									</div>


								<?php 
									if(isset($_POST['gd3'])){
										$s_code=array();

										$code_1=base64_encode($_POST['code_1']);
										$code_2=base64_encode($_POST['code_2']);
										$code_3=base64_encode($_POST['code_3']);
										$code_4=base64_encode($_POST['code_4']);
										$s_code[ad_code_1]=$code_1;
										$s_code[ad_code_2]=$code_2;
										$s_code[head_code]=$code_3;
										$s_code[body_code]=$code_4;

										$code_son = postCR(json_encode($s_code,JSON_UNESCAPED_UNICODE));

										$db->query("UPDATE settings SET  setting_value='$code_son' WHERE setting_name = 'setting_code'");
										header("Location: ?m3=1");
									}
								 ?>	
								
								
						</div>									
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
<!-- Page scripts -->	

<script src="js/pages/form_inputs_basic.js"></script>
<script src="js/forms/bootstrap_select.min.js"></script>
<script src="js/pages/form_bootstrap_selects.js"></script>


<script type="text/javascript" src="js/moment.min.js"></script>
<script type="text/javascript" src="js/legacy.js"></script>
<script type="text/javascript" src="js/forms/daterangepicker.js"></script>
<script type="text/javascript" src="js/forms/picker.js"></script>
<script type="text/javascript" src="js/forms/picker.date.js"></script>
<script type="text/javascript" src="js/forms/picker.time.js"></script>
<script type="text/javascript" src="js/forms/spectrum.js"></script>
<script type="text/javascript" src="js/pages/pickers.js"></script>


<!-- /page scripts -->
</body>
</html>