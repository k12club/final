<?php @include "system/session_cont.php"; echo url_base64(); ?><!doctype html>
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
					<div class="page-title"><i class="icon-display4"></i> Dashboards</div>
					<ul class="breadcrumb">
						<li class="active">Dashboards</li>
					</ul>					
				</div>
			</div>		
			<!--/Page Header-->
			<?php 
				$var_cat = $db->get_var("SELECT count(*) FROM notification order by id desc");
			?>
			<div class="container-fluid page-content">	
																								
				<div class="row">				
					
					<div class="col-md-12 col-sm-12">
						<div class="panel panel-flat no-border">
							<div class="panel-heading p-t-15 p-l-20">
								<h4 class="panel-title"><i class="icon-reddit position-left"></i>New Coins</h4>				
							</div>
							<div class="table-responsive">
								<table class="table table-condensed table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Icon</th>
											<th>Coin Name</th>
											<th>Coin Price</th>
										</tr>
									</thead>
									<tbody>
								<?php if($var_cat!=0){
			                      $datas_f = $db->get_results("SELECT * FROM notification where nt_name='New Coin' order by id desc limit 20");
			                      foreach( $datas_f as $d_f ){
								 $coin_d = $db->get_row("SELECT * FROM coins WHERE coin_symbol = '".$d_f->nt_text."' ");								 			                  
			                      $times=date('Y/m/d H:i:s', $d_f->nt_time);
			                      $timeAgo = new TimeAgo();
			                    ?>	
										<tr>
											<td><? echo $timeAgo->inWords($times,date("Y/m/d H:i:s"));?></td>
											<td><img src="../assets/images/coin/32/<?=$coin_d->coin_flag?>.png" alt=""></td>
											<td><a href="../currencies/<?=$coin_d->coin_flag?>" target="_blank"><?=$coin_d->coin_name?> (<?=$coin_d->coin_symbol?>)</a></td>
											<td><sup>$</sup><?=$coin_d->coin_price?></td>
										</tr>

										<?php } }?>
									</tbody>
								</table>
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
<script src="https://www.google.com/jsapi"></script>	
<script src="js/maps/jvectormap/jvectormap.min.js"></script>
<script src="js/maps/jvectormap/map_files/world.js"></script>
<script src="js/pages/dashboard_default.js"></script>

</body>
</html>
