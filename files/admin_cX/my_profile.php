<?php @include "system/session_cont.php"; $i_bilgi=getCR_ST($_GET['i']);
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
						<i class="icon-gear position-left"></i> My Profile
					</div>
					<ul class="breadcrumb">
						<li><a href="index.c">Dashboards</a></li>
						<li class="active"> My Profile</li>
					</ul>					
				</div>
			</div>
		
			<div class="container-fluid page-content">
						
				<div class="row">
					

					<div class="col-md-6 col-sm-6" id="sag_bolum">
					<!--sağ kolon başlangıç-->
					
	
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h4 class="panel-title"><strong>My Profile</strong></h4>							
							</div>
							<div class="panel-body">
								<form class="form-horizontal form-validate" method="post" id="site_add">									

								<div class="form-group">
									<label class="control-label col-lg-4">Profil Name</label>
									<div class="col-lg-8">
										<input name="u_name" type="text" class="form-control" value="<?=$awdscx->name_surname?>">
									</div>
								</div>								

								<div class="form-group">
									<label class="control-label col-lg-4">Username</label>
									<div class="col-lg-8">
										<input name="u_username" type="text" class="form-control" value="<?=$awdscx->username?>">
									</div>
								</div>										

								<div class="form-group">
									<label class="control-label col-lg-4">E-mail</label>
									<div class="col-lg-8">
										<input name="u_email" type="text" class="form-control" placeholder="email@website.com" value="<?=$awdscx->email?>">
									</div>
								</div>									

								

								<div class="form-group">
									<div class="col-lg-12">
										<button name="gd" type="submit" class="btn bg-primary btn-lg pull-right"><i class="icon-checkmark position-left"></i> Update</button>
									</div>
								</div>									
								</form>	

									<div class="panel-body">										
									
										<?php if (getCR_ST($_GET['m']) == 1){?>
										<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
											<span class="text-semibold">Successfully Updated</span>
										</div>
										<? } ?>
										<?php if (getCR_ST($_GET['m']) == 3){?>
										<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
											<span class="text-semibold">Successfully Updated</span>
										</div>
										<? } ?>
										<?php if (getCR_ST($_GET['m']) == 2){?>
										<div class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered">
											<span class="text-semibold">Old Passwords Wrong</span>
										</div>
										<? } ?>
									</div>


								<?php 
									if(isset($_POST['gd'])){
										$u_name=postCR($_POST['u_name']);
										$u_username=postCR($_POST['u_username']);
										$u_email=postCR($_POST['u_email']);

										$db->query("UPDATE users SET  name_surname='$u_name', username='$u_username', email='$u_email', user_hash='".passFuc($u_username)."' WHERE id = '".$awdscx->id."'");
										header("Location: ?m=1");
									}
								 ?>		

							</div>
						</div>


				</div>

				<div class="col-md-6 col-sm-6" id="sag_bolum">
										
						
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h4 class="panel-title"><strong>Change Password</strong></h4>							
							</div>
							<div class="panel-body">
								<form class="form-horizontal form-validate" method="post" id="site_add">									

								<div class="form-group">
										<label class="control-label col-lg-4">Old Passwords</label>
										<div class="col-lg-8">
											<input name="a_1" type="password" class="form-control">
										</div>
									</div>										

								<div class="form-group">
										<label class="control-label col-lg-4">New Passwords</label>
										<div class="col-lg-8">
											<input name="a_2" type="password" class="form-control">
										</div>
									</div>		

								<div class="form-group">
									<div class="col-lg-12">
										<button name="gd2" type="submit" class="btn bg-primary btn-lg pull-right"><i class="icon-checkmark position-left"></i> Update</button>
									</div>
								</div>									
								</form>	
								<?php 
									if(isset($_POST['gd2'])){
										$a_1=passFuc(postCR($_POST['a_1']));
										$a_2=passFuc(postCR($_POST['a_2']));

										if($a_1!=$awdscx->pass){
											header("Location: ?m=2");
										}
										else if($a_2!=""){
										$db->query("UPDATE users SET  pass='$a_2' WHERE id = '".$awdscx->id."'");
										
										header("Location: ?m=3");
										}



										
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