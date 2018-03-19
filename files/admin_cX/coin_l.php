<?php @include "system/session_cont.php";
$var_cat = $db->get_var("SELECT count(*) FROM coins order by id ASC");
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
						<i class="icon-reddit position-left"></i> Coin List
					</div>
					<ul class="breadcrumb">
						<li><a href="index.c">Dashboards</a></li>
						<li>Coins</li>						
						<li class="active">Coin List</li>
					</ul>			
				</div>
			</div>
			
			<div class="container-fluid page-content">
			
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					
						<div class="panel panel-flat">
							

							<table class="table table-hover invoice-list" id="datatable">
								<thead>
									<tr>
										<th>ID</th>	
										<th>Icon</th>
										<th>Coin Name</th>										
										<th>Coin Symbol</th>		
										<th>Price</th>	
										<th>Last Update</th>
										<th class="text-center"></th>
									</tr>
								</thead>
								<tbody>		

								<?php if($var_cat!=0){
			                      $datas_f = $db->get_results("SELECT id,coin_name,coin_flag,coin_symbol,coin_price,coin_all_price FROM coins order by coin_rank ASC");
			                      foreach( $datas_f as $d_f ){
			                      $json_coin_links = json_decode($d_f->coin_all_price,JSON_UNESCAPED_UNICODE);			                  
			                      $times=@date('Y/m/d H:i:s', $json_coin_links[last_updated]);
			                      $timeAgo = new TimeAgo();
			                    ?>												
									
									<tr>

										<td><?=$d_f->id?></td>	
										<td><img src="../assets/images/coin/32/<?=$d_f->coin_flag?>.png" alt=""></td>	
										<td><?=$d_f->coin_name?></td>		
										<td><?=$d_f->coin_symbol?></td>		
										<td><?=$d_f->coin_price?> $</td>	
										<td><?php echo $timeAgo->inWords($times,date("Y/m/d H:i:s"));?></td>	
																														
										<td class="text-center">
											<ul class="icons-list">
												<li><a href="../currencies/<?=$d_f->coin_flag?>" target="_blank" data-popup="tooltip" title="View" data-placement="bottom"><i class="icon-eye2"></i></a></li>	
												<li><a href="coin_a_l.c?i=edit&coin=<?=$d_f->id?>" target="_blank" data-popup="tooltip" title="Edit Affilate Link" data-placement="bottom"><i class="icon-pencil"></i></a></li>	
											</ul>
										</td>
									</tr>	

									<?php }} ?>						
								</tbody>
							</table>
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
<script src="js/tables/datatables/datatables.min.js"></script>
<script src="js/tables/datatables/extensions/autofill.min.js"></script>
<script src="js/tables/datatables/extensions/select.min.js"></script>
<script src="js/pages/datatable_extension_autofill.js"></script>
<!-- /page scripts -->

<script src="js/pages/projects_list.js"></script>
<!-- /page scripts -->
</body>
</html>