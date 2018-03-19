$(document).ready(function() {
	function MailKontrol(email)
	{
	var kontrol = new RegExp(/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/i);
	return kontrol.test(email);
	}
	$("#number").keypress(function (e) {if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {return false;} });
		$( "form" ).submit(function( event ) {
	  var money = $( "input#number" ).val();
	  var email = $( "input#email" ).val();
	  if(money == ""){
	  	$("#alert_danger").html('<div class="cX-alert alert alert-danger fade in"><p><strong>'+alert_1+'</strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>');		  	
	  	$( "input#number" ).focus();
	  	event.preventDefault();
	  }
	  else if(email == ""){
	  	$("#alert_danger").html('<div class="cX-alert alert alert-danger fade in"><p><strong>'+alert_2+'</strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>');
	  	$( "input#email" ).focus();
	  	event.preventDefault();
	  }
	  else if(!MailKontrol(email)){
	  	$("#alert_danger").html('<div class="cX-alert alert alert-danger fade in"><p><strong>'+alert_3+'</strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>');
	  	$( "input#email" ).focus();
	  	event.preventDefault();
	  }
	  else{		  	
	  	$("#alert_danger").html('')
	  	return;
	  }
	});

} );