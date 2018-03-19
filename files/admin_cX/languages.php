<?php @include "system/session_cont.php";
$site_setting_data = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'setting' ");
$site_setting = json_decode($site_setting_data->setting_value,JSON_UNESCAPED_UNICODE);
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
						<i class="icon-loop position-left"></i> Languages
					</div>
					<ul class="breadcrumb">
						<li><a href="index.c">Dashboards</a></li>					
						<li class="active">Languages</li>
					</ul>	
					<div class="elements">
						<a type="button" href="languages.c?i=add" class="btn btn-sm btn-success btn-labeled"><b><i class="icon-plus3"></i></b> Language / Add</a>
					</div>				
				</div>
			</div>
			
			<div class="container-fluid page-content">
			
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					
						<div class="panel panel-flat">
							

							<table class="table datatable">

								<thead>
									<tr>
										<th>Order No.</th>
										<th>Lang. Name</th>	
										<th>Lang. Symbol</th>
										<th></th>										
									</tr>
								</thead>
								<tbody>		

								<?php 
			                      $datas_f = $db->get_results("SELECT * FROM languages order by lang_order ASC");
			                      foreach( $datas_f as $d_f ){
			                    ?>												
									
									<tr>
										<td width="5"><?=$d_f->lang_order?></td>
										<td><?=$d_f->lang_name?><?php if(@$site_setting[language]==$d_f->lang_flag) {echo " - <b><a href='setting_site.c'>Default</a></b>";}?></td>	
										<td><?=$d_f->lang_flag?></td>		
																														
										<td class="text-center">
											<ul class="icons-list">
												<li><a href="languages.c?i=edit&id=<?=$d_f->id?>" data-popup="tooltip" title="Edit" data-placement="bottom"><i class="icon-pencil"></i></a></li>	
												<?php if(@$site_setting[language]!=$d_f->lang_flag) {?><li><a href="delete.c?q=lang&id=<?=$d_f->id?>" data-popup="tooltip" title="Delete" data-placement="bottom"><i class="icon-cross2"></i></a></li>	<?php } ?>
											</ul>
										</td>
									</tr>	

									<?php } ?>						
								</tbody>
							</table>
						</div>
						
					</div>		
					
					<?php if($i_bilgi =="edit") {
					$coin_d_id=getCR_NUM($_GET['id']);
					$coin_d = $db->get_row("SELECT * FROM languages WHERE id = '$coin_d_id' ");
					if($coin_d->id !=""){

					?>

					<div class="col-md-6 col-sm-6" id="sag_bolum">
					<!--sağ kolon başlangıç-->
					
						
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h4 class="panel-title"><strong><?=$coin_d->lang_name?></strong>  - Edit</h4>							
							</div>
							<div class="panel-body">
								<form class="form-horizontal form-validate" method="post" id="site_add" enctype="multipart/form-data">									

								<div class="form-group">
										<label class="control-label col-lg-4">Lang Name</label>
										<div class="col-lg-8">
											<input name="aff1" type="text" class="form-control" value="<?=$coin_d->lang_name?>">
										</div>
									</div>									

								<div class="form-group">
										<label class="control-label col-lg-4">Lang Symbol</label>
										<div class="col-lg-8">
											<input type="text" class="form-control" value="<?=$coin_d->lang_flag?>" disabled="disabled">
										</div>
									</div>									

								<div class="form-group">
										<label class="control-label col-lg-4">Order</label>
										<div class="col-lg-8">
											<input name="aff3" type="text" class="form-control" value="<?=$coin_d->lang_order?>">
										</div>
									</div>	

								<div class="form-group">					

									<label class="control-label col-lg-5">Lang. Status</label>

									<div class="col-lg-1 checkbox checkbox-switchery"><label><input value="1" name="status" type="checkbox" class="switchery" <?php if ($coin_d->lang_status==1) {?> checked="checked"<?php } ?>></label></div>
									
									<div class="col-lg-6">
									</div>
								</div>	

								<div class="form-group">
									<label class="control-label col-lg-4">Lang XML <a href="ind_xml_dow.php?id=<?=$coin_d->id?>"><span class="label label-success">XML Download</label></a></span>
									<div class="col-lg-8">
										<input name="logo" type="file" class="file-styled-primary">
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
									<?php if (@getCR_ST($_GET['m']) == 2){?>
									<div class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered">
										<span class="text-semibold">XML File is Wrong</span>
									</div>
									<?php } ?>
								</div>

								<?php 
									if(isset($_POST['gd'])){
										$coin_aff1=postCR($_POST['aff1']);
										$coin_aff2=$coin_d->lang_flag;
										$coin_aff3=postCR($_POST['aff3']);
										$status=getCR_NUM($_POST['status']);

										if($_FILES['logo'][error]==4){ 
											$xml_name=$coin_d->lang_xml;
										}
										else {
											@unlink("../system/languages/".$coin_d->lang_xml);
											$xml=file_upload("logo","xml,XML","../system/languages",$coin_aff2."_".time(),"languages.c?i=edit&id=".$coin_d_id."&m=2");
											$xml_x=explode("/", $xml);
											$xml_name=$xml_x[count($xml_x)-1];
										}


										$db->query("UPDATE languages SET  lang_name='$coin_aff1', lang_order='$coin_aff3', lang_status='$status', lang_xml='$xml_name' WHERE id = '$coin_d_id'");
										header("Location: ?i=edit&id=".$coin_d_id."&m=1");
									}
								 ?>	
										
							</div>
						</div>									
					</div>

					<?php }  } ?>			@					

					<?php if($i_bilgi =="add") {?>

					<div class="col-md-6 col-sm-6" id="sag_bolum">
					<!--sağ kolon başlangıç-->
					
						
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h4 class="panel-title"><strong>Language / Add</strong> </h4>							
							</div>
							<div class="panel-body">
								<form class="form-horizontal form-validate" method="post" id="site_add" enctype="multipart/form-data">									

								<div class="form-group">
										<label class="control-label col-lg-4">Lang Name</label>
										<div class="col-lg-8">
											<input name="aff1" type="text" class="form-control" placeholder="English">
										</div>
									</div>									

								<div class="form-group">
										<label class="control-label col-lg-4">Lang Symbol</label>
										<div class="col-lg-8">
											<input name="aff2" type="text" class="form-control" placeholder="en">
										</div>
									</div>									

								<div class="form-group">
										<label class="control-label col-lg-4">Order</label>
										<div class="col-lg-8">
											<input name="aff3" type="text" class="form-control">
										</div>
									</div>

								<div class="form-group">
									<label class="control-label col-lg-4">Lang XML <a href="ind_xml_exp.php"><span class="label label-success">SAMPLE XML</label></a></span>
									<div class="col-lg-8">
										<input name="logo" type="file" class="file-styled-primary">
									</div>
								</div>	

								<div class="form-group">
									<div class="col-lg-12">
										<button name="gd" type="submit" class="btn bg-primary btn-lg pull-right"><i class="icon-checkmark position-left"></i> Add</button>
									</div>
								</div>									
								</form>	

								<div class="panel-body">										
									
									<?php if (@getCR_ST($_GET['m']) == 1){?>
									<div class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered">
										<span class="text-semibold">XML Files is wrong</span>
									</div>
									<?php } ?>
									<?php if (@getCR_ST($_GET['m']) == 2){?>
									<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
										<span class="text-semibold">Successfully</span>
									</div>
									<?php } ?>
								</div>

								<?php 
									if(isset($_POST['gd'])){
										$coin_aff1=postCR($_POST['aff1']);
										$coin_aff2=postCR($_POST['aff2']);
										$coin_aff3=postCR($_POST['aff3']);

										if($_FILES['logo'][error]==4){ 
											header("Location: ?i=add&m=1");
										}
										else {

												$xml=file_upload("logo","xml,XML","../system/languages",$coin_aff2."_".time(),"languages.c?i=add&m=1");
												$xml_x=explode("/", $xml);
												$xml_name=$xml_x[count($xml_x)-1];
												$db->query("INSERT INTO languages (lang_name, lang_flag, lang_xml, lang_order, lang_status) VALUES ('$coin_aff1','$coin_aff2','$xml_name','$coin_aff3','1')");
												$s_id=$db->insert_id;
												$db->query("UPDATE languages SET  lang_secure='".passFuc($s_id)."' WHERE id = '$s_id'");

												header("Location: ?i=add&m=2");
										}

										

									}
								 ?>	
										
							</div>
						</div>									
					</div>

					<?php }  ?>														
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


<script src="js/pages/form_inputs_basic.js"></script>
<script src="js/forms/bootstrap_select.min.js"></script>
<script src="js/pages/form_bootstrap_selects.js"></script>

<!-- /page scripts -->
</body>
</html>