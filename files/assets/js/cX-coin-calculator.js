$(document).ready(function() {
	$("#number").keypress(function (e) {if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {return false;} });
		$( "form" ).submit(function( event ) {
	  var money = $( "input#number" ).val();
	  if(money == ""){
	  	$("#alert_danger").html('<div class="cX-alert alert alert-danger fade in"><p>'+alert+'</strong></p><div class="cX-anchors"><a href="#" class="close" data-dismiss="alert">&times;</a></div></div>')
	  	event.preventDefault();
	  }
	  else{		  	
	  	$("#alert_danger").html('')
	  	return;
	  }
	});
	$( "a.cX-btn" ).on( "click", function() {		 
	  var islem = $( "input#islem" ).val();
	  if(islem==1){
	  	$( "input#islem" ).val("2");
	  	$('#islem_1').removeClass('col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left').addClass('col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right');
	  	$('#islem_2').removeClass('col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right').addClass('col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left');
	  }
	  else{
	  	$( "input#islem" ).val("1");
	  	$('#islem_2').removeClass('col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left').addClass('col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right');
	  	$('#islem_1').removeClass('col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right').addClass('col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left');
	  }
	});
} );