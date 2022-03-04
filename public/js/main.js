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
jQuery(function ($) {

    $("document").ready(function() {
        $("[data-fancybox]").fancybox({
            baseClass: "awesome-gally",
            protect: true,
            toolbar: true,
            preventCaptionOverlap: true,
            // infobar: true,
            idleTime: 100,
            thumbs : {
                autoStart : true,
                axis: "x"
            },
            zoomOpacity: false,
            animationEffect: false,
            buttons: [
                "share",
                "download",
                "close"
            ],
            lang: "en",
            i18n: {
                en: {
                    CLOSE: "Закрыт",
                    NEXT: "Следующий",
                    PREV: "Предыдущий",
                    FULL_SCREEN: "Полноэкранный режим",
                    DOWNLOAD: "Скачать",
                    SHARE: "Поделиться",
                    ZOOM: "Увеличить"
                },
            },
        });
    });

    jQuery(document).pjax("#p0 a", {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#p0"});
    jQuery(document).off("submit", "#p0 form[data-pjax]").on("submit", "#p0 form[data-pjax]", function (event) {jQuery.pjax.submit(event, {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#p0"});});
    jQuery(document).pjax("#p1 a", {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#p1"});
    jQuery(document).off("submit", "#p1 form[data-pjax]").on("submit", "#p1 form[data-pjax]", function (event) {jQuery.pjax.submit(event, {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#p1"});});
    jQuery(document).pjax("#p2 a", {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#p2"});
    jQuery(document).off("submit", "#p2 form[data-pjax]").on("submit", "#p2 form[data-pjax]", function (event) {jQuery.pjax.submit(event, {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#p2"});});
    jQuery(document).pjax("#p3 a", {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#p3"});
    jQuery(document).off("submit", "#p3 form[data-pjax]").on("submit", "#p3 form[data-pjax]", function (event) {jQuery.pjax.submit(event, {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#p3"});});

    $("document").ready(function() {
        $("[data-fancybox]").fancybox({
            baseClass: "awesome-gally",
            protect: true,
            toolbar: true,
            preventCaptionOverlap: true,
            // infobar: true,
            idleTime: 100,
            thumbs : {
                autoStart : true,
                axis: "x"
            },
            zoomOpacity: false,
            animationEffect: false,
            buttons: [
                "share",
                "download",
                "close"
            ],
            lang: "en",
            i18n: {
                en: {
                    CLOSE: "Закрыт",
                    NEXT: "Следующий",
                    PREV: "Предыдущий",
                    FULL_SCREEN: "Полноэкранный режим",
                    DOWNLOAD: "Скачать",
                    SHARE: "Поделиться",
                    ZOOM: "Увеличить"
                },
            },
        });
    });

    jQuery('#w0').tab();
    jQuery('#w1').yiiActiveForm([{"id":"searchform-text","name":"text","container":".field-searchform-text","input":"#searchform-text","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"«Калит сўз» ни тўлдириш шарт."});yii.validation.string(value, messages, {"message":"«Калит сўз» қиймати satr бўлиши керак.","min":3,"tooShort":"«Калит сўз» қиймати камида 3 белгидан ташкил топиши керак","max":255,"tooLong":"«Калит сўз» қиймати 255 белгидан ошмаслиги керак","skipOnEmpty":1});}}], []);
});

