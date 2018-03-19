$(document).ready(function() {
	function MailKontrol(email)
	{
	var kontrol = new RegExp(/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/i);
	return kontrol.test(email);
	}

	$( "#manage_alert" ).submit(function( event ) {
	  var email = $( "input#email" ).val();
	  if(email == ""){
	  	$("#alert_danger").html('<div class="cX-alert alert alert-danger fade in"><p><strong>'+alert_1+' </strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>');
	  	$( "input#email" ).focus();
	  	event.preventDefault();
	  }
	  else if(!MailKontrol(email)){
	  	$("#alert_danger").html('<div class="cX-alert alert alert-danger fade in"><p><strong>'+alert_2+' </strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>');
	  	$( "input#email" ).focus();
	  	event.preventDefault();
	  }
	  else{		  	
	  	$("#alert_danger").html('')
	  	return;
	  }
	});
	$('#coinHistoxry').DataTable( {
    	"responsive": true,
        "searching": false,
        "bInfo": false,
        "bLengthChange": false,
        "pageLength": 25 
    } );
} );