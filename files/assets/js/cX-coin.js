$(document).ready(function() {
    $( "#cX-cointabs" ).tabs();
} );
  $('#coinHistory').DataTable( {
	"responsive": true,
    "searching": false,
    "bInfo": false,
    "bLengthChange": false,
    "pageLength": 15,
    "order": [[ 0, 'desc' ]],
    "language": {
	    "paginate": {
	      "previous": pagination_prev,			      
	      "next": pagination_next
	    }
	  },
	 "ajax": {
	    "url": site_url+"/coin-history-data/"+coin_flag+".json",
	    "type": "POST" },
        "columns": [
            { data: "date" },
            { data: "high" },
            { data: "low" },
            { data: "market_cap" }
        ]
	} );	

	$.getJSON(site_url+'/coin-charts/'+coin_flag+'.json?callback=?', function (data) {	
 		    Highcharts.chart('coin-charts', {
		        chart: {
		            zoomType: 'x'
		        },
				rangeSelector: {
				            allButtonsEnabled: true,
				            selected: 2
				        },
		        title: {
		            text: charts_title
		        },
		        subtitle: {
		            text: document.ontouchstart === undefined ?
		                    charts_subtitle_1 : charts_subtitle_2
		        },
		        xAxis: {
		            type: 'datetime'
		        },
		        yAxis: {
		            title: {
		                text: charts_xasis_title
		            }
		        },
		        legend: {
		            enabled: false
		        },
		        plotOptions: {
		            area: {
		                fillColor: {
		                    linearGradient: {
		                        x1: 0,
		                        y1: 0,
		                        x2: 0,
		                        y2: 1
		                    },
		                    stops: [
		                        [0, Highcharts.getOptions().colors[0]],
		                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
		                    ]
		                },
		                marker: {
		                    radius: 2
		                },
		                lineWidth: 1,
		                states: {
		                    hover: {
		                        lineWidth: 1
		                    }
		                },

		                threshold: null
		            }
		        },
		        responsive: {
				  rules: [{
				    condition: {
				      maxWidth: 500
				    },
				    chartOptions: {
				      legend: {
				        enabled: false
				      }
				    }
				  }]
				},
		        series: [{
		        	showInNavigator: true,
		            type: 'line',
		            name: charts_line,
		            data: data
		        }]
		    });
	});
