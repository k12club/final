<?php @include "system/session_cont.php";
$var_cat = $db->get_var("SELECT count(*) FROM seo order by id ASC");
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
						<i class="icon-gear position-left"></i> SEO Setting
					</div>
					<ul class="breadcrumb">
						<li><a href="index.c">Dashboards</a></li>
						<li>Settings</li>						
						<li class="active">SEO Setting</li>
					</ul>				
				</div>
			</div>
			
			<div class="container-fluid page-content">
			
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					
						<div class="panel panel-flat">
							

							<table class="table datatable">

								<thead>
									<tr>
										<th>Page Name</th>
										<th class="text-center"></th>
									</tr>
								</thead>
								<tbody>		

								<?php if($var_cat!=0){
			                      $datas_f = $db->get_results("SELECT * FROM seo order by id ASC");
			                      foreach( $datas_f as $d_f ){
			                    ?>												
									
									<tr>

										<td><?=$d_f->page_name?></td>		
																														
										<td class="text-center">
											<ul class="icons-list">
												<li><a href="setting_seo.c?i=edit&id=<?=$d_f->id?>" data-popup="tooltip" title="Edit" data-placement="bottom"><i class="icon-pencil"></i></a></li>		
											</ul>
										</td>
									</tr>	

									<?php }} ?>						
								</tbody>
							</table>
						</div>
						
					</div>		
					
					<?php if($i_bilgi =="edit") {
					$coin_d_id=getCR_NUM($_GET['id']);
					$coin_d = $db->get_row("SELECT * FROM seo WHERE id = '$coin_d_id' ");
					if($coin_d->id !=""){
						$faq = json_decode($coin_d->seo,JSON_UNESCAPED_UNICODE);

					?>

				<div class="col-md-12 col-sm-12" id="sag_bolum">
							<form class="form-horizontal" method="post">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h4 class="panel-title"><strong><?=$coin_d->page_name?></strong>  - SEO Setting</h4>							
									</div>
									<div class="panel-body">
										<div class="tabbable">
											<ul class="nav nav-tabs nav-tabs-solid nav-justified">	
												<?php 
													 $datas_f = $db->get_results("SELECT * FROM languages where lang_status = 1 order by lang_order ASC");
			                      					 foreach( $datas_f as $d_f ){
												?>
												<li<?php if($d_f->lang_order == 1){ ?> class="active"<?php } ?>><a href="#faqpage_tab_<?=$d_f->lang_order?>" data-toggle="tab"><?=$d_f->lang_name?><span class="label label-danger pull-right"><?=$d_f->lang_flag?></span></a></li>
												<?php } ?>
												
											</ul>

											<div class="tab-content">
												<?php 
													 $datas_f = $db->get_results("SELECT * FROM languages where lang_status = 1 order by lang_order ASC");
			                      					 foreach( $datas_f as $d_f ){
												?>
												<div class="tab-pane<?php if($d_f->lang_order == 1){ ?> active<?php } ?>" id="faqpage_tab_<?=$d_f->lang_order?>">
													<div class="row">
														<div class="col-md-6 col-sm-6">
															<div class="panel-body no-padding-bottom">
																<div class="form-group">
																	<label class="control-label col-lg-4">Meta - Title</label>
																	<div class="col-lg-8">
																		<input name="meta_title[<?=$d_f->lang_flag?>]" type="text" class="form-control" value="<?=@$faq[$d_f->lang_flag][m_title]?>">
																	</div>
																</div>
																<div class="form-group">
																	<label class="control-label col-lg-4">Meta - Description</label>
																	<div class="col-lg-8">
																		<input name="meta_desc[<?=$d_f->lang_flag?>]" type="text" class="form-control" value="<?=@$faq[$d_f->lang_flag][m_desc]?>">
																	</div>
																</div>
																<div class="form-group">
																	<label class="control-label col-lg-4">Meta - Keyword</label>
																	<div class="col-lg-8">
																		<input name="meta_key[<?=$d_f->lang_flag?>]" type="text" class="form-control" value="<?=@$faq[$d_f->lang_flag][m_key]?>">
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-6 col-sm-6">
															<?php if($coin_d_id==2){?>
																<div class="panel-body">										
																	<div class="alert alert-info alert-styled-right alert-bordered">
																		<span class="text-semibold">Coin Name = </span> {coin_name}<br>
																		<span class="text-semibold">Coin Symbol = </span> {coin_symbol}<br>
																		<span class="text-semibold">Coin Price = </span> {coin_price}<br>
																	</div>
																</div>

															<?php } ?>
														</div>
													</div>
												</div>
												<?php } ?>
											

												
											</div>

										</div>	
								</div>
							</div>
							<div class="panel-body">																	
								<?php if (@getCR_ST($_GET['m']) == 1){?>
								<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
									<span class="text-semibold">Successfully Updated</span>
								</div>
								<?php } ?>
							</div>
							
							<div class="form-group">
									<div class="col-lg-12">
										<button name="gd" type="submit" class="btn bg-primary btn-lg pull-right"><i class="icon-checkmark position-left"></i> Edit</button>
									</div>
								</div>
							</form>
							<?php 
								if(isset($_POST['gd'])){
									 $c=array();
									 $datas_f = $db->get_results("SELECT * FROM languages where lang_status = 1 order by lang_order ASC");
			                         foreach( $datas_f as $d_f ){
			                         	$c[$d_f->lang_flag][m_title]=postCR($_POST['meta_title'][$d_f->lang_flag]);
			                         	$c[$d_f->lang_flag][m_desc]=postCR($_POST['meta_desc'][$d_f->lang_flag]);
			                         	$c[$d_f->lang_flag][m_key]=postCR($_POST['meta_key'][$d_f->lang_flag]);
			                         	$c[$d_f->lang_flag][desc]=base64_encode($_POST['editor'][$d_f->lang_flag]);

			                         }
			                        $c_son = postCR(json_encode($c,JSON_UNESCAPED_UNICODE));
			                      

									$db->query("UPDATE seo SET  seo='$c_son' WHERE id = '$coin_d_id'");
									header("Location: ?i=edit&id=".$coin_d_id."&m=1");
								}
							 ?>	
					<?php } } ?>														
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