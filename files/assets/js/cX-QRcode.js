$(document).ready(function() {
		$( "form#qr_code_form" ).submit(function( event ) {
	  var wallet = $( "input#wallet" ).val();
	  if(wallet == ""){
	  	$("#alert_danger").html('<div class="cX-alert alert alert-danger fade in"><p><strong>'+alert_1+' </strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>');
	  	$( "input#wallet" ).focus();
	  	event.preventDefault();
	  }
	  else{		  	
	  	$("#alert_danger").html('')		  	
	  	var coin = $( "select[name=coin-type]" ).val();
	  	var qr_code=coin+':'+wallet;
	  	$('#qr_code').attr('src','http://chart.apis.google.com/chart?cht=qr&chs=256x256&chl='+qr_code+'&chld=H|0&choe=UTF-8');
	  	$('#qr_link').attr('href',site_url+'/qr-dowloand.php?qr={'+qr_code+'}');
	  	event.preventDefault();
	  }
	});
} );