$(document).ready(function() {
	function MailKontrol(email)
	{
	var kontrol = new RegExp(/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/i);
	return kontrol.test(email);
	}
	  $( "form" ).submit(function( event ) {
	  var firstname = $( "input#firstname" ).val();
	  var lastname = $( "input#lastname" ).val();
	  var email = $( "input#email" ).val();
	  var subject = $( "input#subject" ).val();
	  var comment = $( "#comment" ).val();
	  if(firstname == ""){
	  	$("#alert_danger").html('<div class="cX-alert alert alert-danger fade in"><p><strong>'+alert_1+' </strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>');
	  	$( "input#firstname" ).focus();
	  	event.preventDefault();
	  }
	  else if(lastname == ""){
	  	$("#alert_danger").html('<div class="cX-alert alert alert-danger fade in"><p><strong>'+alert_2+' </strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>');
	  	$( "input#lastname" ).focus();
	  	event.preventDefault();
	  }
	  else if(email == ""){
	  	$("#alert_danger").html('<div class="cX-alert alert alert-danger fade in"><p><strong>'+alert_3+' </strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>');
	  	$( "input#email" ).focus();
	  	event.preventDefault();
	  }
	  else if(!MailKontrol(email)){
	  	$("#alert_danger").html('<div class="cX-alert alert alert-danger fade in"><p><strong>'+alert_4+' </strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>');
	  	$( "input#email" ).focus();
	  	event.preventDefault();
	  }
	  else if(subject == ""){
	  	$("#alert_danger").html('<div class="cX-alert alert alert-danger fade in"><p><strong>'+alert_5+' </strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>');
	  	$( "input#subject" ).focus();
	  	event.preventDefault();
	  }
	  else if(comment == ""){
	  	$("#alert_danger").html('<div class="cX-alert alert alert-danger fade in"><p><strong>'+alert_6+' </strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>');
	  	$( "#comment" ).focus();
	  	event.preventDefault();
	  }
	  else{		  	
	  	$("#alert_danger").html('')
	  	return;
	  }
	});
} );