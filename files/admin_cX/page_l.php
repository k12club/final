<?php @include "system/session_cont.php";
$var_cat = $db->get_var("SELECT count(*) FROM pages order by id ASC");
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
						<i class="icon-stack position-left"></i> Page List
					</div>
					<ul class="breadcrumb">
						<li><a href="index.c">Dashboards</a></li>
						<li>Page</li>						
						<li class="active">Page List</li>
					</ul>	
					<div class="elements">
						<a type="button" href="page_a.c" class="btn btn-sm btn-success btn-labeled"><b><i class="icon-plus3"></i></b> Page / Add</a>
					</div>				
				</div>
			</div>
			
			<div class="container-fluid page-content">
			
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					
						<div class="panel panel-flat">
							

							<table class="table datatable">

								<thead>
									<tr>
										<?php 
										 $datas_f = $db->get_results("SELECT lang_name FROM languages where lang_status = 1 order by lang_order ASC");
                      					 foreach( $datas_f as $d_f ){
										?>
										<th><?=$d_f->lang_name?></th>
										<?php } ?>										
										<th class="text-center"></th>
									</tr>
								</thead>
								<tbody>		

								<?php if($var_cat!=0){
			                      $datas_x = $db->get_results("SELECT * FROM pages order by id ASC");
			                      foreach( $datas_x as $d_x ){
			                      	$p_namex = json_decode($d_x->p_name,JSON_UNESCAPED_UNICODE);
			                    ?>												
									
									<tr>
										<?php 
										 $datas_f = $db->get_results("SELECT lang_name,lang_flag FROM languages where lang_status = 1 order by lang_order ASC");
                      					 foreach( $datas_f as $d_f ){
										?>
										<td><?=stripslashes(base64_decode($p_namex[$d_f->lang_flag]))?></td>
										<?php } ?>		
																														
										<td class="text-center">
											<ul class="icons-list">
												<li><a href="page_e.c?id=<?=$d_x->id?>" data-popup="tooltip" title="Edit" data-placement="bottom"><i class="icon-pencil"></i></a></li>	
												<li><a href="delete.c?q=page&id=<?=$d_x->id?>" data-popup="tooltip" title="Delete" data-placement="bottom"><i class="icon-cross2"></i></a></li>	
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
<script src="js/pages/datatable_basic.js"></script>

<!-- /page scripts -->
</body>
</html>