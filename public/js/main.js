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
	
	function online(argument) {
		let date = new Date();
		let date_from = new Date('03 03 2022 10:30:00');
		let date_to = new Date('03 03 2022 20:00:00');
		if (date <= date_from) {
			let day = parseInt((date_from - date) / (60 * 60 * 24 * 1000));
			let hours = parseInt((date_from - date) / (60 * 60 * 1000)) - day * 24;
			let minutes = 59 - date.getMinutes();
			let seconds = 59 - date.getSeconds();
			let html = `<div class="online-time-number">
							<span>` + day + `</span>
							<span>Дней</span>
						</div>
						<div class="online-time-dots">
							<span>:</span>
						</div>
						<div class="online-time-number">
							<span>` + hours + `</span>
							<span>Часов</span>
						</div>
						<div class="online-time-dots">
							<span>:</span>
						</div>
						<div class="online-time-number">
							<span>` + minutes + `</span>
							<span>Минут</span>
						</div>
						<div class="online-time-dots">
							<span>:</span>
						</div>
						<div class="online-time-number">
							<span>` + seconds + `</span>
							<span>Секунд</span>
						</div>`
			$('.online-time-date').html(html);
		}
		if ((date_from < date) && (date <= date_to)) {
			console.log(2);
			let date_b = parseInt((date_to - date) / (60 * 60 * 24 * 1000));
		}
		if (date_to < date) {
			console.log(3);
		}
		let date_b = parseInt((date_from - date) / (1000));
		let year = date.getFullYear();
		let month = date.getMonth() + 1;
		let day = date.getDate();
		let hours = date.getHours();
		let minutes = date.getMinutes();
		let seconds = date.getSeconds();
	}
	setInterval(online, 1000);
	// ================================
	// ================================
	// ================================
});
