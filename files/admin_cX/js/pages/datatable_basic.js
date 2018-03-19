'use strict';

$(function() {
	$('.styled').uniform();
});
$(function() {

	// DataTable setup			
	$('.datatable').DataTable({
		autoWidth: true,
		
		
		dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
		language: {
			search: '<span>Search:</span> _INPUT_',
			lengthMenu: '<span>Show:</span> _MENU_',
			paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
		},
	});
	
	$('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');

	$('.dataTables_length select').select2({
		minimumResultsForSearch: Infinity,
		width: '60px'
	});
});
