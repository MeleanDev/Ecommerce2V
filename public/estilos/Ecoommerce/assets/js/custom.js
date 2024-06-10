jQuery( document ).ready(function( $ ) {


	"use strict";


		$('.owl-carousel').owlCarousel({
		    items:4,
		    lazyLoad:true,
		    loop:true,
		    dots:true,
		    margin:20,
		    responsiveClass:true,
			    responsive:{
			        0:{
			            items:1,
			        },
			        600:{
			            items:2,
			        },
			        1000:{
			            items:4,
			        }
			    }
		});
 
});
