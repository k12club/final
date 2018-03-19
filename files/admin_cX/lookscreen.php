<?php @include "system/system_func.php";
if($mocrea_admin!=""){
  $awdscx = $db->get_row("SELECT * FROM users WHERE user_hash='$mocrea_admin'"); $say_awdscx=count($awdscx);
  if($say_awdscx==0) {header("location: session.php?q=lagout");}
  
}
else {header("Location: session.php?q=lagout");}
?>
<!doctype html>
<html style="height:100%">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>cX Admin</title

	<link type="text/css" rel="stylesheet" href="assets/fonts/fonts.css">
    <link type="text/css" rel="stylesheet" href="assets/icons/icomoon/icomoon.css">    
	<link type="text/css" rel="stylesheet" href="css/bootstrap.css">   
	<link type="text/css" rel="stylesheet" href="css/core.css">
	<link type="text/css" rel="stylesheet" href="css/bootstrap-extended.css">	    		
	<link type="text/css" rel="stylesheet" href="css/plugins.css">	    		
	<link type="text/css" rel="stylesheet" href="css/color-system.css">

</head>
<body style="height:100%; background:url('assets/images/assets/login_bg.jpg') no-repeat 0 0; background-size:cover;">
	<div class="login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Simple login form -->
			<form method="post">			
				<div class="panel panel-body login-form border-left border-left-lg border-left-warning">							
					<div class="text-center m-b-20">
						<img src="assets/images/faces/face<?=$awdscx->picture?>.png" class="img-responsive img-rounded max-width-100" alt="">						
						<h2><?=$awdscx->name_surname?></h2>
						<h5>Lock Screen</h5>
					</div>

					<div class="form-group has-feedback has-feedback-left">
						<input type="password" class="form-control" placeholder="Password" name="pass" required="required">
						<div class="form-control-feedback">
							<i class="icon-lock text-muted"></i>
						</div>
					</div>					

					<div class="form-group">
						<button name="a" type="submit" class="btn btn-warning btn-labeled btn-labeled-right btn-block"><b><i class="icon-unlocked"></i></b> Login</button>								
					</div><?php if(getCR_ST($_GET['i'])==2){ ?>
					<div class="alert alert-danger alert-styled-left alert-bordered">
						<span class="text-semibold">Your information is incorrect!</span>
					</div>
					<? }  if(getCR_ST($_GET['i'])==1){  ?>
					<div class="alert alert-danger alert-styled-left alert-bordered">
						<span class="text-semibold">Your information is incorrect!</span>
					</div>
					<? } ?>

					<div class="col-sm-12 text-right m-t-10">
						<a href="session.c?q=lagout">Forget Me</a>
					</div>


				</div>
				
			</form>
			<?php
		      if(isset($_POST['a'])){
		         $a_pass=$db->escape($_POST['pass']);
			     $times=array();
			     $times[]=date("d-m-Y");
			     $times[]=date("H:i");
			     $times[]=GetIP();
			     $son_giris=postCR(json_encode($times,JSON_UNESCAPED_UNICODE));

		       if($a_pass=="") {header(" Location: lookscreen.c?i=2"); }
		       
		       else {
		          $admns_info = $db->get_row("SELECT id,username,timer FROM users WHERE pass='".passFuc($a_pass)."' and user_hash='$mocrea_admin' "); $say=count($admns_info);
		          if($say == 1 ) { 
		          	  $sure=($admns_info->timer)*60;
		              setcookie("mcr_ad", base64_encode(passFuc($admns_info->username)), time() + 604800);
		              setcookie("mcr_ti", base64_encode(time() + $sure), time() + $sure);
		              setcookie("mcr_time", base64_encode($sure), time() + $sure);
		              $loc=getCR_ST($_GET['loc']);
		              if($loc == "") {$loc_adress="index.c";} else {$loc_adress=$loc;}
		              $db->query("UPDATE users SET login_data = '$son_giris' WHERE id = '".$admns_info->id."'");
		              @header("Location: ".$loc_adress);
		          } else {header(" Location: lookscreen.c?i=1"); }
		        }
		      }
		    ?>


			<!-- Footer -->
			<div class="footer">
			</div>
			<!-- /footer -->

		</div>
		<!-- /page content -->

	</div>

<!-- Global scripts -->
<script type="text/javascript" src="js/jquery.js"></script>	
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/forms/uniform.min.js"></script>	
<!-- /global scripts -->

<script>
$(function() {
	$(".styled, .multiselect-container input").uniform({
		radioClass: 'choice'
	});
	$('input,textarea').focus(function(){
	   $(this).data('placeholder',$(this).attr('placeholder'))
			  .attr('placeholder','');
	}).blur(function(){
	   $(this).attr('placeholder',$(this).data('placeholder'));
	});
});
</script>	
</body>
</html>