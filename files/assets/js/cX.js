"use strict";
jQuery(document).on('ready', function() {
	function collapseMenu(){
		jQuery('.cX-navigation ul li.menu-item-has-children, .cX-navdashboard ul li.menu-item-has-children, .cX-navigation ul li.menu-item-has-mega-menu').prepend('<span class="cX-dropdowarrow"><i class="fa fa-angle-down"></i></span>');
		jQuery('.cX-navigation ul li.menu-item-has-children span, .cX-navdashboard ul li.menu-item-has-children span, .cX-navigation ul li.menu-item-has-mega-menu span').on('click', function() {
			jQuery(this).parent('li').toggleClass('cX-open');
			jQuery(this).next().next().slideToggle(300);
		});
	}
	collapseMenu();
	if(jQuery('#cX-categoriesslider').length > 0){
		var _tg_postsslider = jQuery('#cX-categoriesslider');
		_tg_postsslider.owlCarousel({
			items : 5,
			nav: true,
			loop: true,
			dots: false,
			center: true,
			autoplay: false,
			dotsClass: 'cX-sliderdots',
			navClass: ['cX-prev', 'cX-next'],
			navContainerClass: 'cX-slidernav',
			navText: ['<span class="icon-chevron-left"></span>', '<span class="icon-chevron-right"></span>'],
			responsive:{
				0:{ items:1, center:false},
				480:{ items:2, center:false},
				568:{ items:3, center:false},
				768:{ items:5, },
			}
		});
	}
	if(jQuery('.cX-panelheading').length > 0){
		var _tg_panelheading = jQuery('.cX-panelheading');
		_tg_panelheading.on('click',function () {
			jQuery('.panel-heading').removeClass('active');
			jQuery(this).parents('.panel-heading').addClass('active');
			jQuery('.panel').removeClass('active');
			jQuery(this).parent().addClass('active');
		});
	}
	if(jQuery('.cX-statistics').length > 0){
		jQuery('.cX-statistics').appear(function () {
			jQuery('.cX-statistics > li > h3').countTo();
		});
	}
	if(jQuery('#cX-narrowsearchcollapse').length > 0){
		var _openFirst = jQuery('#cX-narrowsearchcollapse');
		_openFirst.collapse({
			open: function() {this.slideDown(300);},
			close: function() {this.slideUp(300);},
		});
		_openFirst.trigger('open');
	}
	if(jQuery('#cX-productrangeslider').length > 0){
		jQuery("#cX-productrangeslider").slider({
			range: true,
			min: 0,
			max: 6000,
			values: [ 1500, 4500 ],
			slide: function( event, ui ) {
				jQuery( "#cX-productrangeamount" ).val(ui.values[ 0 ] + 'km' + ' - ' + ui.values[ 1 ] + 'km');
			}
		});
		jQuery( "#cX-productrangeamount" ).val(jQuery( "#cX-productrangeslider" ).slider( "values", 0 ) + 'km' + ' - ' + jQuery( "#cX-productrangeslider" ).slider( "values", 1 ) + 'km');
	}
	if(jQuery('#cX-safetytipsslider').length > 0){
		var _tg_safetytipsslider = jQuery('#cX-safetytipsslider');
		_tg_safetytipsslider.on('changed.owl.carousel', function(event) {
			var items = event.item.count;
			var item = event.item.index + 1;
			jQuery('.cX-currentandtotalslides').html('0'+ item +' / 0'+ items +'');
		});
		_tg_safetytipsslider.owlCarousel({
			items : 1,
			nav: true,
			dots: false,
			autoplay: true,
			dotsClass: 'cX-sliderdots',
			navClass: ['cX-prev', 'cX-next'],
			navContainerClass: 'cX-slidernav',
			navText: ['<span class="icon-chevron-left"></span>', '<span class="icon-chevron-right"></span>'],
		});
	}
	if(jQuery('#cX-trendingpostsslider').length > 0){
		var _tg_trendingpostsslider = jQuery('#cX-trendingpostsslider');
		_tg_trendingpostsslider.owlCarousel({
			items : 1,
			nav: true,
			loop: true,
			dots: false,
			autoplay: true,
			dotsClass: 'cX-sliderdots',
			navClass: ['cX-prev', 'cX-next'],
			navContainerClass: 'cX-slidernav',
			navText: ['<span class="icon-chevron-left"></span>', '<span class="icon-chevron-right"></span>'],
		});
	}
	if(jQuery('#cX-themecollapse').length > 0){
		var _tg_themecollapse = jQuery('#cX-themecollapse');
		_tg_themecollapse.collapse({
			accordion: true,
			query: '.cX-collaptabpane h3',
			close: function() {this.slideUp(300);},
			open: function() {this.slideDown(300);},
		});
	}
	if(jQuery('.cX-verticalscrollbar').length > 0){
		var _tg_verticalscrollbar = jQuery('.cX-verticalscrollbar');
		_tg_verticalscrollbar.mCustomScrollbar({
			axis:"y",
		});
	}
	if(jQuery('.cX-horizontalthemescrollbar').length > 0){
		var _tg_horizontalthemescrollbar = jQuery('.cX-horizontalthemescrollbar');
		_tg_horizontalthemescrollbar.mCustomScrollbar({
			axis:"x",
			advanced:{autoExpandHorizontalScroll:true},
		});
	}
	if(jQuery('#cX-dbcategoriesslider').length > 0){
		var _tg_postsslider = jQuery('#cX-dbcategoriesslider');
		_tg_postsslider.owlCarousel({
			items : 4,
			nav: true,
			loop: true,
			dots: false,
			autoplay: false,
			dotsClass: 'cX-sliderdots',
			navClass: ['cX-prev', 'cX-next'],
			navContainerClass: 'cX-slidernav',
			navText: ['<span class="icon-chevron-left"></span>', '<span class="icon-chevron-right"></span>'],
			responsive:{
				0:{ items:2, },
				640:{ items:3, },
				768:{ items:4, },
			}
		});
	}
	if(jQuery('#cX-productgallery').length > 0){
		var gallery = new $.ThumbnailGallery(jQuery('#cX-productgallery'), {
			count: 9,
			breakpoint: 600,
			shadowStrength: 0.5,
			imageType: 'jpg',
			thumbImageType: 'jpg',
			thumbImages: 'images/gallery/thumbs/thumb',
			smallImages: 'images/gallery/small/image',
			largeImages: 'images/gallery/large/image',
		});
	}
	jQuery("a[data-rel]").each(function () {
		jQuery(this).attr("rel", jQuery(this).data("rel"));
	});
	jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
		animation_speed: 'normal',
		theme: 'dark_square',
		slideshow: 3000,
		autoplay_slideshow: false,
		social_tools: false
	});

	 
});

$('#cX_select_language').on('change', function () {
  var url =  $('#cX_select_language option:selected').val();
  if (url) {
      window.location = url; 
  }
  return false;
});

$('#cX_select_currency').on('change', function () {
  var url =  $('#cX_select_currency option:selected').val();
  if (url) {
      window.location = url; 
  }
  return false;
});