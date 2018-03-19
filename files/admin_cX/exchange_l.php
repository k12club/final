<?php @include "system/session_cont.php";
$var_cat = $db->get_var("SELECT count(*) FROM exchange order by id ASC");
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
						<i class="icon-loop position-left"></i> Exchange List
					</div>
					<ul class="breadcrumb">
						<li><a href="index.c">Dashboards</a></li>
						<li>Exchange</li>						
						<li class="active">Exchange List</li>
					</ul>	
					<div class="elements">
						<a type="button" href="exchange_a.c" class="btn btn-sm btn-success btn-labeled"><b><i class="icon-plus3"></i></b> Exchange Site / Add</a>
					</div>				
				</div>
			</div>
			
			<div class="container-fluid page-content">
			
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					
						<div class="panel panel-flat">
							

							<table class="table datatable">

								<thead>
									<tr>
										<th>Exchange Site</th>	
										<th>Description</th>
										<th>Link</th>										
										<th class="text-center"></th>
									</tr>
								</thead>
								<tbody>		

								<?php if($var_cat!=0){
			                      $datas_f = $db->get_results("SELECT * FROM exchange order by id ASC");
			                      foreach( $datas_f as $d_f ){
			                    ?>												
									
									<tr>

										<td><?=$d_f->e_name?></td>	
										<td><?=$d_f->e_desc?></td>		
										<td><?=$d_f->e_link?></td>		
																														
										<td class="text-center">
											<ul class="icons-list">
												<li><a href="exchange_l.c?i=edit&id=<?=$d_f->id?>" data-popup="tooltip" title="Edit" data-placement="bottom"><i class="icon-pencil"></i></a></li>	
												<li><a href="delete.c?q=exchange1&id=<?=$d_f->id?>" data-popup="tooltip" title="Delete" data-placement="bottom"><i class="icon-cross2"></i></a></li>	
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
					$coin_d = $db->get_row("SELECT * FROM exchange WHERE id = '$coin_d_id' ");
					if($coin_d->id !=""){

					?>

					<div class="col-md-6 col-sm-6" id="sag_bolum">
					<!--sağ kolon başlangıç-->
					
						
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h4 class="panel-title"><strong><?=$coin_d->e_name?></strong>  - Edit</h4>							
							</div>
							<div class="panel-body">
								<form class="form-horizontal form-validate" method="post" id="site_add">									

								<div class="form-group">
										<label class="control-label col-lg-4">Exchange Site</label>
										<div class="col-lg-8">
											<input name="aff1" type="text" class="form-control" value="<?=$coin_d->e_name?>">
										</div>
									</div>									

								<div class="form-group">
										<label class="control-label col-lg-4">Description</label>
										<div class="col-lg-8">
											<input name="aff2" type="text" class="form-control" value="<?=$coin_d->e_desc?>">
										</div>
									</div>									

								<div class="form-group">
										<label class="control-label col-lg-4">Affilate Link</label>
										<div class="col-lg-8">
											<input name="aff3" type="text" class="form-control" value="<?=$coin_d->e_link?>">
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
										$coin_aff1=postCR($_POST['aff1']);
										$coin_aff2=postCR($_POST['aff2']);
										$coin_aff3=postCR($_POST['aff3']);
										$db->query("UPDATE exchange SET  e_name='$coin_aff1', e_desc='$coin_aff2', e_link='$coin_aff3' WHERE id = '$coin_d_id'");
										header("Location: ?i=edit&id=".$coin_d_id."&m=1");
									}
								 ?>	
										
							</div>
						</div>									
					</div>

					<?php } } ?>														
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