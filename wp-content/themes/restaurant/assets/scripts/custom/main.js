jQuery( document ).ready( function () {

	var widthBrowser = $( window ).width();

	var gridWidthSmDevice = 991;

	var numberSlideToShow = 3;

	if ( widthBrowser <= gridWidthSmDevice ) {

		numberSlideToShow = 2;
	}

	/* slick function in Home page */
	jQuery( ' .menu-overview-slick ' ).slick( {
		slidesToShow: numberSlideToShow,
		slidesToScroll: 1,
		spead: 500,
		autoplay: false,
		prevArrow:"<span class='icon slick-arrow-left' style='cursor:pointer;'><i class='fas fa-angle-left'></i></span>",
    	nextArrow:"<span class='icon slick-arrow-right' style='cursor:pointer;'><i class='fas fa-angle-right'></i></span>",
	} );

	/* slick function in Menu page */
	jQuery( ' .menu-slick ' ).slick( {
		slidesToShow: 1,
		slidesToScroll: 1,
		spead: 500,
		autoplay: false,
		prevArrow:"<span class='icon slick-arrow-left' style='cursor:pointer;'><i class='fas fa-angle-left'></i></span>",
    	nextArrow:"<span class='icon slick-arrow-right' style='cursor:pointer;'><i class='fas fa-angle-right'></i></span>",
	} );
	
});
