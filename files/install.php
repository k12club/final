<?php
@include "system/config.php";
$step=@intval($_GET['step']);
if($step!=2){$step=1;}

if($step!=2){
	$cx=@mysql_connect($db_host, $db_u, $db_p);
	$bx=@mysql_select_db($db_n);
	if($cx){header("Location: install.php?step=2");}
	if($bx){header("Location: install.php?step=2");}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quick Install</title>

    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row" style="margin: auto!important; max-width: 750px!important;">
		<div class="col-md-12">
			<div class="jumbotron">
				<h2>
					<strong>Quick Install</strong>
				</h2>
				<p>
					Coin Market Capitalizations and Cryptocurrency Tools (Price Alert, Converter Calculator, QR Code Generator)
				</p>
				<p>
					<a class="btn btn-primary btn-large" href="https://www.youtube.com/watch?v=i73Tj-n3e2c" target="_blank">Watch Install Video</a>
				</p>
			</div>
			<?php if($step!=2){ if($site_url==""){@header("Location: ?step=2");} ?>
			<div class="row">
				<div class="col-md-12">
					<form method="post">
						<div class="form-group">							 
							<label for="exampleInputEmail1">
								Database Host
							</label>
							<input id="db_host" name="db_host" type="text" class="form-control" placeholder="localhost" value="localhost">
						</div>
						<div class="form-group">							 
							<label for="exampleInputEmail1">
								Database Username
							</label>
							<input id="db_user" name="db_user" type="text" class="form-control" placeholder="root">
						</div>
						<div class="form-group">							 
							<label for="exampleInputEmail1">
								Database Password
							</label>
							<input id="db_pass" name="db_pass" type="text" class="form-control" placeholder="password">
						</div>
						<div class="form-group">							 
							<label for="exampleInputEmail1">
								Database Name
							</label>
							<input id="db_name" name="db_name" type="text" class="form-control" placeholder="db_name">
						</div>
						<div class="form-group">							 
							<label for="exampleInputEmail1">
								Site URL
							</label>
							<input id="site_url" name="site_url" type="text" class="form-control" placeholder="http://www.sitename.com" value="http://www.">
						</div>
						<div class="form-group">							 
							<label for="exampleInputEmail1">
								Site URL
							</label>
							<select name="ssl" id="ssl" class="form-control">
								<option selected="selected" value="false">False</option>
								<option value="true">True</option>
							</select>
						</div>
						
						<button name="gd" type="submit" class="btn btn-default">Submit</button>
					</form>
					<?php 
					if(isset($_POST['gd'])){				
						$db_host=trim(strip_tags($_POST['db_host']));
						$db_user=trim(strip_tags($_POST['db_user']));				
						$db_pass=trim(strip_tags($_POST['db_pass']));				
						$db_name=trim(strip_tags($_POST['db_name']));
						$site_url_old=trim(strip_tags($_POST['site_url']));
						$ssl=trim(strip_tags($_POST['ssl']));

						if($ssl=="true"){
							if(!strstr("https://", $site_url_old)){
								$new_url=str_replace("http://", "https://", $site_url_old);
							}
							else{
								$new_url=$site_url_old;
							}
						}
						else{
							$new_url=$site_url_old;
						}

						$alert='<br><div class="alert alert-danger alert-dismissable" id="alert_danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Warning!</strong> Could Not Connect To Database</div>';
						$alert_2='<br><div class="alert alert-danger alert-dismissable" id="alert_danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Warning!</strong> Something went wrong. Please manually install</div>';
						$alert_3='<meta http-equiv="refresh" content="0; url=install.php?step=2" />';
						
							$filename = 'database_cX.sql';
							$mysql_host = $db_host;
							$mysql_username = $db_user;
							$mysql_password = $db_pass;
							$mysql_database = $db_name;

							@mysql_connect($mysql_host, $mysql_username, $mysql_password) or die($alert);
							@mysql_select_db($mysql_database) or die($alert);
							
							echo $alert_3;

							$data='<?php
/* Database Host */
$db_host="'.$db_host.'"; 
/* Database Host */

/* Database name */
$db_n="'.$db_name.'";
/* Database name */

/* Database username */
$db_u="'.$db_user.'";
/* Database username */

/* Database password */
$db_p="'.$db_pass.'";
/* Database password */

/* Site URL */
$site_url="'.$new_url.'";
/* Site URL */

/* SSL */
$ssl_status='.$ssl.';
/* SSL */

/* CREATE DATE: '.date("d-m-Y H:i:s").' */
?>';
							$filecontent=file_get_contents('system/config.php');
							$pos=strpos($filecontent, '?>');
							$filecontent=substr($filecontent, 0, $pos)."\r\n".$data."\r\n".substr($filecontent, $pos);
							file_put_contents("system/config.php", $data);							
						
					}?>
					<br>
					<div id="alert_danger"></div>

				</div>
			</div>
			<?php } else{ if(strstr($_SERVER['SERVER_NAME'], $site_url)) {header("Location: ?step=2");}?>
		<div class="col-md-12">
			<div class="list-group">
				<a href="#" class="list-group-item active"><span>Step 1 - <strong>SQL Import</strong></span></a>
				<div class="list-group-item">
					<h5 class="list-group-item-heading">
						<p><strong><?php echo $db_n; ?></strong> Import <u>database_cX.sql</u></p>
					</h5>
				</div>
			</div>

			<div class="list-group">
				 <a href="#" class="list-group-item active"><span>Step 2 - <strong>Cron job</strong></span></a>
				<div class="list-group-item">
					<h5 class="list-group-item-heading">
						wget -O /dev/null <?php echo $site_url; ?>/system/cronjobs/coinmarketcap_update.php > /dev/null<br>
						<img src="assets/images/cron_1.png" alt="">
					</h5>
					<h5 class="list-group-item-heading">
						wget -O /dev/null <?php echo $site_url; ?>/system/cronjobs/coinmarketcap_newcoin.php > /dev/null<br>
						<img src="assets/images/cron_2.png" alt="">
					</h5>
					<h5 class="list-group-item-heading">
						wget -O /dev/null <?php echo $site_url; ?>/system/cronjobs/coin_alert_control.php > /dev/null<br>
						<img src="assets/images/cron_2.png" alt="">
					</h5>
					<h5 class="list-group-item-heading">
						wget -O /dev/null <?php echo $site_url; ?>/system/cronjobs/currencylayer_api.php > /dev/null<br>
						<img src="assets/images/cron_2.png" alt="">
					</h5>
				</div>				
			</div>
			<div class="list-group">
				 <a href="#" class="list-group-item active"><span><span>Step 3 - <strong>Coin Images Zip</strong></span></a>
				<div class="list-group-item">
					<h5 class="list-group-item-heading">
						<a href="assets/images/coin/coin.php" target="_blank" class="btn btn-lg btn-danger btn-block">Extract Zip</a>
					</h5>
				</div>
			</div>
			<div class="list-group">
				 <a href="#" class="list-group-item active"><span><span>Step 4 - <strong>Currencies Api</strong></span></a>
				<div class="list-group-item">
					<h5 class="list-group-item-heading">
						<p><strong>1-</strong> Make the currency API active</p>
						<p><strong>2-</strong> <a href="https://currencylayer.com/" target="_blank">https://currencylayer.com/</a>	</p>					
						<p><strong>3-</strong> Create New Account > Free Plan > Your API Access Key</p>					
						<p><strong>4-</strong> Admin Panel > Settings > Site Setting > Currency - API > Update</p>
					</h5>
				</div>
			</div>
			<div class="list-group">
				 <a href="#" class="list-group-item active"><span>Admin</span></a>
				<div class="list-group-item">
					<h5 class="list-group-item-heading">
						<p><strong>Admin URL:</strong> <a href="<?php echo $site_url; ?>/admin_cX" target="_blank"><?php echo $site_url; ?>/admin_cX</a>	</p>					
						<p><strong>Username:</strong> cx</p>					
						<p><strong>Password:</strong> cx</p>
					</h5>
				</div>
			</div>
			<div class="list-group">
				 <a href="#" class="list-group-item active"><span>Finish</span></a>
				<div class="list-group-item">
					<h5 class="list-group-item-heading">
						<p><strong>1-</strong> Change your admin information</p>					
						<p><strong>2-</strong> Finish cronjob transactions</p>					
						<p><strong>3-</strong> <a href="https://currencylayer.com/" target="_blank">currencylayer.com</a> API</p>					
						<p><strong>4-</strong> Extract Coin Zip</p>					
						<p><strong>4-</strong> Delete to install.php</p>
					</h5>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" class="init">	
	$(document).ready(function() {
 		$( "form" ).submit(function( event ) {
		  var db_host = $( "input#db_host" ).val();
		  var db_user = $( "input#db_user" ).val();
		  var db_pass = $( "input#db_pass" ).val();
		  var db_name = $( "input#db_name" ).val();
		  var site_url = $( "input#site_url" ).val();

		  if(db_host == ""){
		  	$("#alert_danger").addClass('alert alert-danger alert-dismissable').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Warning!</strong> Database Host');
		  	$( "input#db_host" ).focus();
		  	event.preventDefault();
		  }

		  else if(db_user == ""){
		  	$("#alert_danger").addClass('alert alert-danger alert-dismissable').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Warning!</strong> Database Username');
		  	$( "input#db_user" ).focus();
		  	event.preventDefault();
		  }

		  else if(db_name == ""){
		  	$("#alert_danger").addClass('alert alert-danger alert-dismissable').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Warning!</strong> Database Name');
		  	$( "input#db_name" ).focus();
		  	event.preventDefault();
		  }

		  else if(site_url == "" || site_url == "http://www."){
		  	$("#alert_danger").addClass('alert alert-danger alert-dismissable').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Warning!</strong> Site URL');
		  	$( "input#site_url" ).focus();
		  	event.preventDefault();
		  }
		  else{		  	
		  	$("#alert_danger").html('')
		  	return;
		  }
		});

	} );

	</script>
  </body>
</html>