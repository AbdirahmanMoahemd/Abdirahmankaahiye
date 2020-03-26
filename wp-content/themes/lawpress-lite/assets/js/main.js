// format numbers
( function( $ ) {

	$( document ).ready(function() {
		$('.case-settlement').text(function(index, value) {
			formated = numberWithCommas(value);
			return value.replace(value, formated);
		});
		$('.settlement-number').text(function(index, value) {
			formated = numberWithCommas(value);
			return value.replace(value, formated);
		});	
	});

	
} )( jQuery );
	
// separate numbers
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// home carousel
jQuery(document).ready(function(){
	if ( jQuery.isFunction(jQuery.fn.owlCarousel) ){
		jQuery(".owl-carousel.lplite-hero-carousel").owlCarousel(
		{
			loop:true,
			margin:0,
			nav:true,
			autoplay:true,
			autoplayHoverPause:true,
			autoplayTimeout:4000,
			dots:false,
			responsive:{
				0:{
					items:1
				},
			}
		}
		);
	}
});