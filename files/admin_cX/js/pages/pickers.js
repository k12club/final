'use strict';

$(function() {				
	
	// Single picker
	$('.daterange-single').daterangepicker({ 
		singleDatePicker: true			
	});

	// Display date dropdowns
	$('.daterange-datemenu').daterangepicker({
		showDropdowns: true,
		opens: "left",
		applyClass: 'bg-slate',
		cancelClass: 'btn-default'
	});
	
	// Display time picker
	$('.daterange-time').daterangepicker({
		timePicker: true,
		applyClass: 'bg-slate',
		cancelClass: 'btn-default',
		opens: "left",
		locale: {
			format: 'MM/DD/YYYY h:mm a'
		}
	});

	// Initialize with options
	$('.daterange-predefined').daterangepicker(
		{
			startDate: moment().subtract('days', 29),
			endDate: moment(),
			minDate: '01/01/2014',
			maxDate: '12/31/2016',
			dateLimit: { days: 60 },
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
				'Last 7 Days': [moment().subtract('days', 6), moment()],
				'Last 30 Days': [moment().subtract('days', 29), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
			},
			opens: 'left',
			applyClass: 'btn-small bg-slate',
			cancelClass: 'btn-small btn-default'
		},
		function(start, end) {
			$('.daterange-predefined span').html(start.format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + end.format('MMMM D, YYYY'));
			$.jGrowl('Date range has been changed', { header: 'Update', theme: 'bg-primary', position: 'center', life: 1500 });
		}
	);
	// Display date format
	$('.daterange-predefined span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + moment().format('MMMM D, YYYY'));

	
	// Pick-a-date picker
	// ------------------------------
	// Basic options
	$('.pickadate').pickadate();
			
	// Dropdown selectors
	$('.pickadate-selectors').pickadate({
		selectYears: true,
		selectMonths: true
	});

	// Date limits
	$('.pickadate-limits').pickadate({
		min: [2016,3,28],
		max: [2017,4,30]
	});

	// Disable date range
	$('.pickadate-disable-range').pickadate({
		disable: [
			1
		]
	});

	// Pick-a-time time picker
	// ------------------------------
	// Default functionality
	$('.pickatime').pickatime();
	
	// Time limits
	$('.pickatime-limits').pickatime({
		min: [9,30],
		max: [18,0]
	});

	// Disabling ranges
	$('.pickatime-range').pickatime({
		disable: [
			1,
			[1, 30, 'inverted'],
			{ from: [4, 30], to: [10, 30] },
			[6, 30, 'inverted'],
			{ from: [8, 0], to: [9, 0], inverted: true }
		]
	});
	
	// Color palette
	var demoPalette = [
		["#F03434","#EC644B","#D24D57","#F22613","#D91E18","#96281B","#EF4836","#D64541","#C0392B"],
		["#CF000F","#E74C3C","#D64541","#DB0A5B","#F64747","#F1A9A0","#D2527F","#E08283","#F62459"],
		["#947CB0","#DCC6E0","#663399","#AEA8D3","#9A12B3","#BF55EC","#BE90D4","#9B59B6","#8E44AD"],
		["#446CB3","#4183D7","#59ABE3","#81CFE0","#52B3D9","#C5EFF7","#22A7F0","#3498DB","#19B5FE"],
		["#6BB9F0","#1E8BC3","#3A539B","#2574A9","#1F3A93","#89C4F4","#4B77BE","#5C97BF","#91B496"],
		["#4ECDC4","#A2DED0","#87D37C","#90C695","#26A65B","#03C9A9","#68C3A3","#65C6BB","#1BBC9B"],
		["#66CC99","#36D7B7","#C8F7C5","#86E2D5","#2ECC71","#16A085","#3FC380","#03A678","#2ABB9B"],
		["#F5D76E","#F7CA18","#F4D03F","#FABE58","#E9D460","#FDE3A7","#F89406","#EB9532","#E87E04"],
		["#F4B350","#F2784B","#EB974E","#F5AB35","#F39C12","#F9690E","#F9BF3B","#F27935","#E67E22"],
		["#95A5A6","#BFBFBF"]
	]


		var demoPalette2 = [
		["#013243","#2C3E50","#336E7B","#22313F","#34495E","#67809F","#1BA39C","#019875"],
		["#D35400","#6C7A89","#674172","#674172","#363b4d","#34495e"]
	]

	// Basic examples
	// ------------------------------
	// Basic setup
	$(".colorpicker-basic").spectrum();

	// Display color formats
	$(".colorpicker-show-input").spectrum({
		showInput: true
	});

	// Display alpha channel
	$(".colorpicker-show-alpha").spectrum({
		showAlpha: true
	});

	// Display initial color
	$(".colorpicker-show-initial").spectrum({
		showInitial: true
	});

	// Full featured color picker
	$(".colorpicker-full").spectrum({
		showInitial: true,
		showInput: true,
		showAlpha: true,
		allowEmpty: true
	});

	// Container color
	$(".colorpicker-container-class").spectrum({
		containerClassName: 'bg-slate'
	});

	
	// Color palettes
	// ------------------------------
	// Display color palette
	$(".colorpicker-palette").spectrum({
		showPalette: true,
		palette: demoPalette
	});

	// Display palette only
	$(".colorpicker-palette-only").spectrum({
    	preferredFormat: "hex",
		showPalette: true,
		palette: demoPalette
	});

	// Display palette only
	$(".colorpicker-palette-only2").spectrum({
    	preferredFormat: "hex",
		showPalette: true,
		palette: demoPalette2
	});

	// Display palette only
	$(".colorpicker-palette-only3").spectrum({
    	preferredFormat: "hex",
		showPalette: true,
		palette: demoPalette2
	});
});
