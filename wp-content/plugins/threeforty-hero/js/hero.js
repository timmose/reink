/*---------------------------------------*/
/* Slick HERO Inline JS (Fallback)       */
/*---------------------------------------*/

jQuery(document).ready(function($) {

	"use strict";

	var slidestoshow = $(".hero.carousel").attr("data-slidestoshow");
	var slidenum = $(".hero.carousel").attr("data-slides");
	var slickdots = $(".hero.carousel").attr("data-initial-status");
	var bodyclass = "has-slick-dots-1200";
	if ( slickdots == 'active' ) {
		var bodyclass = "has-slick-dots";
	}
	if ( slidestoshow == 4 && slickdots == 'inactive' ) {
		bodyclass = "has-slick-dots-1600";
	}
	if ( slidestoshow == 2 && slickdots == 'inactive' ) {
		bodyclass = "has-slick-dots-768";
	}

	// Calculate slidestoshow breakpoints

	var slidestoshow_three = 3;
	if ( slidestoshow_three > slidestoshow ) {
		slidestoshow_three = slidestoshow;
	}
	var slidestoshow_two = 2;
	if ( slidestoshow_two > slidestoshow ) {
		slidestoshow_two = slidestoshow;
	}


	if ($("body").hasClass("rtl")) {

		// RTL
	
	$(".hero.slider")

	.on("init", function() {
		$("body").addClass("has-slick-dots");
	})

	.slick({
		dots: true,
		infinite: true,
		autoplay: true,
		autoplaySpeed: 3000,
		speed: 800,
		rtl: true,
		slidesToShow: 1,
	}); 

	$(".hero.carousel")

		.on("init", function() {
		    $("body").addClass("" + bodyclass + "");
		})

		.slick({
			dots: true,
			infinite: true,
			autoplay: true,
			autoplaySpeed: 3000,
			speed: 800,
			slidesToShow: + slidestoshow,
			rtl: true,
			responsive: [
				{
					breakpoint: 1601,
					settings: {
						slidesToShow: + slidestoshow_three,
					}
				},
				{
					breakpoint: 1201,
					settings: {
						slidesToShow: + slidestoshow_two,
					}
				},
				{
					breakpoint: 769,
					settings: {
						slidesToShow: 1,
					}
				},
			]
		}); 

	} else { // LTR

		$(".hero.slider")

		.on("init", function() {
			$("body").addClass("has-slick-dots");
		})

		.slick({
			dots: true,
			infinite: true,
			autoplay: true,
			autoplaySpeed: 3000,
			speed: 800,
			slidesToShow: 1,
		}); 

		$(".hero.carousel")

		.on("init", function() {
		    $("body").addClass("" + bodyclass + "");
		})

		.slick({
			dots: true,
			infinite: true,
			autoplay: true,
			autoplaySpeed: 3000,
			speed: 800,
			slidesToShow: + slidestoshow,
			responsive: [
				{
					breakpoint: 1601,
					settings: {
						slidesToShow: + slidestoshow_three,
					}
				},
				{
					breakpoint: 1201,
					settings: {
						slidesToShow: + slidestoshow_two,
					}
				},
				{
					breakpoint: 769,
					settings: {
						slidesToShow: 1,
					}
				},
			]
		}); 

	}
});
