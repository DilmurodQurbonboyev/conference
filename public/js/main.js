window.addEventListener("load", function(event) {
	// ================================
	$('.owl-news .owl-carousel').owlCarousel({
	    loop:true,
	    margin:15,
	    nav:false,
	    dots: false,
	    responsive:{
	        0:{
	            items:1
	        },
	        576:{
	            items:2
	        },
	        992:{
	            items:3
	        },
	        1200:{
	            items:4
	        },
	        1500:{
	            items:5
	        }
	    }
	})
	// ================================
	$('.owl-link .owl-carousel').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    autoplay: true,
	    navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
	    responsive:{
	        0:{
	            items:1
	        },
	        576:{
	            items:2
	        },
	        992:{
	            items:3
	        },
	        1200:{
	            items:4
	        },
	        1600:{
	            items:5
	        }
	    }
	})
	// ================================
	$('.owl-detail .owl-carousel').owlCarousel({
	    loop:true,
	    margin:0,
	    nav:false,
	    dots: false,
	    autoHeight: true,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:1
	        },
	        1000:{
	            items:1
	        }
	    }
	})
	// ================================
	let width = $(window).width();
	$('.navbar-nav .dropdown').mouseenter(function (argument) {
		if (width >= 1200) {
			$(this).children('.dropdown-menu').addClass('show');
		}
	})
	$('.navbar-nav .dropdown').mouseleave(function (argument) {
		if (width >= 1200) {
			$(this).children('.dropdown-menu').removeClass('show');
		}
	})
	// ================================
	// ================================
	// ================================
	// ================================
});

