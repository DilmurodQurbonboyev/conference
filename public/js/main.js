window.addEventListener("load", function(event) {
	// ================================
	$('.owl-news .owl-carousel').owlCarousel({
	    loop:true,
	    margin:15,
	    nav:true,
	    dots: false,
	    navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
	    responsive:{
	        0:{
	            items:1
	        },
	        768:{
	            items:2
	        },
	        992:{
	            items:3
	        },
	        1200:{
	            items:3
	        },
	        1600:{
	            items:4
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
	$('.menu .navbar-nav .dropdown').mouseenter(function (argument) {
		if (width >= 1200) {
			$(this).children('.dropdown-menu').addClass('show');
		}
	})
	$('.menu .navbar-nav .dropdown').mouseleave(function (argument) {
		if (width >= 1200) {
			$(this).children('.dropdown-menu').removeClass('show');
		}
	})
	$('.menu-ly .navbar-nav .dropdown').mouseenter(function (argument) {
		if (width >= 1200) {
			$(this).children('.dropdown-menu').addClass('show');
		}
	})
	$('.menu-ly .navbar-nav .dropdown').mouseleave(function (argument) {
		if (width >= 1200) {
			$(this).children('.dropdown-menu').removeClass('show');
		}
	})
	// ================================
    $('#breakout_session option').each(function() {
        var my_str = $(this).text();
        if(my_str.length > 5){$(this).text(my_str.substring(5));}
        console.log(my_str);
    });
	// ================================
	// ================================
	// ================================
});

