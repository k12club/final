$(document).ready(function() {

				$('.sparklines2').sparkline('html', { 
		       	enableTagOptions: true,
		       	width: '184',
		      	height: '50',
				lineColor: '#e74c3c',
				fillColor: null,
				drawNormalOnTop: true, 
	    		spotRadius: 2,    		
				highlightSpotColor: '#000000',
				highlightLineColor: '#000000',
        		tooltipFormat: system_currency_symbol+' {{y:val}}'

	        });	     


	    $('#marketCapHome').DataTable( {
	    	"scrollX": true,
	        "processing": true,
	        "serverSide": true,
	        "bInfo": false,
	        "bLengthChange": false,
	        "ajax": {
	            "url": site_url+"/index-coins-data/",
	            "type": "POST"
	        },
	        "pageLength": 50,	        
	        "deferLoading": 57,
	        "jQueryUI": true,

	        "createdRow": function( row, data, dataIndex ) {
		        $( row ).find('td:eq(1)').addClass('currency-name');
		    },
		    "language": {
		    	"search":search_text,
		    	"processing": loading_text,

			    "paginate": {
			      "previous": pagination_prev,			      
			      "next": pagination_next
			    }
			  },

	        "fnDrawCallback": function (oSettings) {
			    $('.sparklines').sparkline('html', { 
			       	enableTagOptions: true,
			       	width: '184',
			      	height: '50',
					lineColor: '#e74c3c',
					fillColor: null,
					drawNormalOnTop: true, 
		    		spotRadius: 2,    		
					highlightSpotColor: '#000000',
					highlightLineColor: '#000000',
        			tooltipFormat: system_currency_symbol+' {{y:val}}'
	        	}),

				$('#marketCapHome').on('page.dt', function() {
				  $('html, body').animate({
				    scrollTop: $(".dataTables_wrapper").offset().top
				   }, 'slow');
				});

			}
	    } );
	   


	} );