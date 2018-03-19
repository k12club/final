<?php 
@include "system/system_func.php"; 
if($mocrea_admin!=""){
  $awdscx = $db->get_row("SELECT * FROM users WHERE user_hash='$mocrea_admin'"); $say_awdscx=count($awdscx);
  if($say_awdscx==1) {header("location: session.php?q=lookscreen");} else{header("location: session.php?q=lagout");}
}?>
<!doctype html>
<html style="height:100%">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>cX Admin</title>	

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
				<div class="panel panel-body login-form border-left border-left-lg border-left-info">							
					<div class="text-center m-b-20">
						<div class="icon-object bg-info"><i class="icon-user"></i></div>
						<h5>Login</h5>
					</div>

					<div class="form-group has-feedback has-feedback-left">
						<input type="text" class="form-control" placeholder="Username or Email" name="user" required="required">
						<div class="form-control-feedback">
							<i class="icon-user text-muted"></i>
						</div>
					</div>

					<div class="form-group has-feedback has-feedback-left">
						<input type="password" class="form-control" placeholder="Password" name="pass" required="required">
						<div class="form-control-feedback">
							<i class="icon-lock text-muted"></i>
						</div>
					</div>

					<div class="login-options">
						<div class="row">
							<div class="col-sm-6">
								<div class="checkbox m-l-5">
									
								</div>
							</div>

							
						</div>
					</div>

					<div class="form-group">
						<button name="a" type="submit" class="btn btn-info btn-labeled btn-labeled-right btn-block"><b><i class="icon-enter"></i></b> Login</button>								
					</div>
					<?php if(@getCR_ST($_GET['i'])==2){ ?>
					<div class="alert alert-danger alert-styled-left alert-bordered">
						<span class="text-semibold">Ciphers can not be empty!</span>
					</div>
					<?php }  if(@getCR_ST($_GET['i'])==1){  ?>
					<div class="alert alert-danger alert-styled-left alert-bordered">
						<span class="text-semibold">Your password is wrong!</span>
					</div>
					<?php } ?>

				</div>
				
			</form>

			<?php
		    if(isset($_POST['a'])){
		     $a_user=postCR($_POST['user']);
		     $a_pass=postCR($_POST['pass']);
		     $times=array();
		     $times[]=date("d-m-Y");
		     $times[]=date("H:i");
		     $times[]=GetIP();
		     $son_giris=postCR(json_encode($times,JSON_UNESCAPED_UNICODE));

		     if($a_user=="" or $a_pass=="") {header(" Location: ?i=2"); }
		     
		     else {
		        $admns_info = $db->get_row("SELECT id,username,timer FROM users WHERE pass='".passFuc($a_pass)."' and (username='$a_user' or email='$a_user')"); $say=count($admns_info);
		        if($say == 1 ) { 

		        	$sure=($admns_info->timer)*60;
		            setcookie("mcr_ad", base64_encode(passFuc($admns_info->username)), time() + 604800);
		            setcookie("mcr_ti", base64_encode(time() + $sure), time() + $sure);
		            setcookie("mcr_time", base64_encode($sure), time() + $sure);
		            $loc=getCR_ST($_GET['loc']);
		            if($loc == "") {$loc_adress="index.c";} else {$loc_adress=$loc;}
		            $db->query("UPDATE users SET login_data = '$son_giris' WHERE id = '".$admns_info->id."'");
		            @header("Location: ".$loc_adress);
		        } else { header("Location: ?i=1"); }
		      }
		    }
		    ?>
			<!-- /simple login form -->


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
<!-- /global scripts -->
</body>
</html>