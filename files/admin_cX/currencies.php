<?php @include "system/session_cont.php"; @$i_bilgi=getCR_ST($_GET['i']);
$d1 = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'curreny_data' ");
$d2 = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'curreny_setting' ");

$d_1 = json_decode($d1->setting_value,JSON_UNESCAPED_UNICODE);
$d_2 = json_decode($d2->setting_value,JSON_UNESCAPED_UNICODE);

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
						<i class="icon-coin-dollar position-left"></i> Currencies
					</div>
					<ul class="breadcrumb">
						<li><a href="index.c">Dashboards</a></li>
						<li>Currencies</li>						
						<li class="active"> Currencies - Update</li>
					</ul>					
				</div>
			</div>
		
			<div class="container-fluid page-content">
						
				<div class="row">
					

					<div class="col-md-6 col-sm-6" id="sol_bolum">
					<!--sağ kolon başlangıç-->
					
	
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h4 class="panel-title"><strong>Currencies - Active / Passive</strong></h4>							
							</div>
							<div class="panel-body">
								<form class="form-horizontal form-validate" method="post" id="site_add">									

							<?php for ($i = 0; $i <= count($d_2)-1 ; $i++) { ?>
								<input type="hidden" name="code[]" value="<?=@$d_2[$i][code]?>">
								<input type="hidden" name="name[]" value="<?=@$d_2[$i][name]?>">

								<div class="form-group">							
									<div class="col-lg-1 checkbox checkbox-switchery"><label><input value="1" name="status[<?=@$d_2[$i][code]?>]" type="checkbox" class="switchery" <?php if (@$d_2[$i][status]==1) {?> checked="checked"<?php } ?>></label></div>		

									<label class="control-label col-lg-5"><?=@$d_2[$i][name]?></label>
									
									<div class="col-lg-6">
										<input name="aff1" type="text" class="form-control" value="<?=@$d_2[$i][code]?> - <?=@$d_1[USD.$d_2[$i][code]]?>" disabled>
									</div>
								</div>	

							<?php } ?>


								

								<div class="form-group">
									<div class="col-lg-12">
										<button name="gd" type="submit" class="btn bg-primary btn-lg pull-right"><i class="icon-checkmark position-left"></i> Update</button>
									</div>
								</div>									
								</form>	

									<div id="cxx" class="panel-body">										
									
										<?php if (@getCR_ST($_GET['m']) == 1){?>
										<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
											<span class="text-semibold">Successfully Updated</span>
										</div>
										<?php } ?>
									</div>


								<?php 
									if(isset($_POST['gd'])){

										$c=array();
										for ($i = 0; $i <= count($d_2)-1 ; $i++) { 
											$c[$i][code]=postCR($_POST['code'][$i]);
											$c[$i][name]=postCR($_POST['name'][$i]);
											$c[$i][status]=intval(postCR($_POST['status'][$_POST['code'][$i]]));
										}


										$c_son = postCR(json_encode($c,JSON_UNESCAPED_UNICODE));



										$db->query("UPDATE settings SET  setting_value='$c_son' WHERE setting_name = 'curreny_setting'");
										header("Location: ?m=1#cxx");
									}
								 ?>	
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