jQuery(function ($) {
	$(".open_search-js").click(function () {
		$(".container-wrapper.nav").addClass("active-js");
	});
	$(".close_search-js").click(function () {
		$(".container-wrapper.nav").removeClass("active-js");
	});

	$('.slide_wrapper_top .slider1').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		dots: false,
		infinite: true,
		prevArrow: $('.slide_wrapper_top .prev'),
		nextArrow: $('.slide_wrapper_top .next'),
	});
	$('.slide_wrapper_bottom .slider2').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 4000,
		dots: false,
		infinite: true,
		prevArrow: $('.slide_wrapper_bottom .prev'),
		nextArrow: $('.slide_wrapper_bottom .next'),
	});
});