$(document).on('ready', function() {
	new WOW( { offset: 100 } ).init();

	var search_form_opened = false;
	$('.topbar .search-icon').on( 'click', function() {
		var $searchbox = $('.main-search-form');
		search_form_opened = true;
		$searchbox.fadeIn( 200 );
		return false;
	} );
	$('.main-search-form .search-button').on( 'click', function() {
		$('.main-search-form .search-form').submit();
		return false;
	} );
	$('.main-search-form').on( 'click', function() {
		return false;
	} );
	$('html, body').on( 'click', function( event) {
		if( search_form_opened && !$( event.target ).closest( 'header a' ).length ) {
			search_form_opened = false;
			$('.main-search-form').fadeOut( 200 );
			return false;
		}
	} );

	/*  Mobile header */
	function close_mobile_menu() {
		$('.sm-mobile-header .menu-toggle').removeClass( 'btn-close' );
		$('.mobile-menu .sub-menu' ).slideUp( 400 );
		$('.mobile-menu').slideUp( 400 );
		$('.mobile-menu li').removeClass( 'opened' );
	}
	$('.sm-mobile-header .menu-toggle').on( 'click', function() {
		var $this = $(this);
		if( $this.hasClass( 'btn-close' ) ) {
			close_mobile_menu();
		} else {
			$this.addClass( 'btn-close' );
			$('.mobile-menu').slideDown( 400 );
		}
		return false;
	} );
	$('.sm-mobile-header .chevron').on( 'click', function() {
		var $this = $(this);
		var menuitem = $this.closest( 'li' );
		var submenu = menuitem.children( '.sub-menu' );
		if( submenu.length > 0 ) {
			if( menuitem.hasClass( 'opened' ) ) {
				menuitem.removeClass( 'opened' );
				menuitem.find( 'li' ).removeClass( 'opened' );
				menuitem.find( '.sub-menu' ).slideUp( 300 );
			} else {
				menuitem.addClass( 'opened' );
				submenu.slideDown( 300 );
			}
			return false;
		}
	} );
	$('.sm-mobile-header .search-icon').on( 'click', function() {
		$('.sm-mobile-header .search-form').submit();
	} );
	// Close when mobile menu item is clicked
	$('.sm-mobile-header li.menu-item a').on( 'click', function() {
		close_mobile_menu();
	} );

	$('.footer-nav-mobile li > span').on( 'click', function() {
		var $li = $(this).closest('li');
		$li.toggleClass('open').find('ul').slideToggle();
	} );
	$('.sidebar-block.collapsible .block-heading').on( 'click', function() {
		var $block = $(this).closest('.sidebar-block');
		$block.find('ul').slideToggle(function() {
			$block.toggleClass('collapsed');
		});
	} );

	if ( $("[rel^='prettyPhoto']").length > 0) {
		$("[rel^='prettyPhoto']").prettyPhoto();
	}

	if ( $('#main-slider').length > 0 ) {
		var main_slider = new Swiper( '#main-slider .swiper-container', {
			direction: 'horizontal',
			loop: true,
			speed: 600,
			autoplay: 6000,
			preventClicksPropagation: false,
			pagination: $('#main-slider .page-controls'),
			paginationClickable: true,
			paginationHide: false,
			paginationBulletRender: function (index, className) {
				return '<a class="page-control ' + className + '" href="#"></a>';
			}
		} );
	};

	featured_carousel_responsive_init();
	wl_carousel_responsive_init();

	$(window).on( "resize", function() {
		featured_carousel_responsive_init();
		wl_carousel_responsive_init();
		
		$sticky_nav = $('.sticky-nav:visible');
	});

	var sticky_pos = 0;
	var $sticky_nav = $('.sticky-nav:visible');
	if( $('header').length > 0 && $sticky_nav.length > 0 ) {
		sticky_pos = $('header').offset().top + $sticky_nav.height();
	}
	$(window).on( 'scroll', function() {
		/* Sticky menu */
		if( $(window).scrollTop() > sticky_pos + 150 ) {
			if( !$sticky_nav.hasClass( 'sticky' ) ) {
				if( ! $('header').hasClass( 'transparent' ) ) {
					var margin_top = $sticky_nav.height();
					$('body').css( 'padding-top', margin_top );
				}
				$sticky_nav.addClass( 'sticky animated short slideInDown' );
			}
		} else {
			$('body').css( 'padding-top', 0 );
			$('.sticky-nav').removeClass( 'sticky animated short slideInDown' );
		}
		
	} );
});

var featured_slides = 0;
var featured_carousel = false;
function featured_carousel_responsive_init() {
	if( $('.featured-products-wrapper').length > 0 ) {
		var wrapper_width = $('.featured-products-wrapper').width();
		var item_width = $('#featured-carousel .featured-item').width();
		var item_margin = $(window).width() >= 768 ? 80 : 30;
		var slides = Math.floor( ( wrapper_width + item_margin ) / ( item_width + item_margin ) );
		if( slides != featured_slides ) {
			if( featured_carousel != false ) {
				featured_carousel.destroy();
			}
			featured_slides = slides;
			$('#featured-carousel').width( slides * item_width + ( slides - 1 ) * item_margin );
			$('#featured-carousel').find( '.swiper-slide' ).css( 'margin-right', 0 );
			featured_carousel = new Swiper( '#featured-carousel', {
				direction: 'horizontal',
				loop: true,
				speed: 600,
				slidesPerView: slides,
				spaceBetween: item_margin,
				pagination: $('.featured-products-wrapper .page-controls'),
				paginationClickable: true,
				paginationHide: true,
				paginationBulletRender: function (index, className) {
					return '<a class="page-control ' + className + '" href="#"></a>';
				}
			} );
		}
	}
}

var wl_slides = 0;
var wl_carousel = false;
function wl_carousel_responsive_init() {
	if( $('.wl-wrapper').length > 0 ) {
		var wrapper_width = $('.wl-wrapper').width();
		var item_width = $('#wl-carousel .wl-item').width();
		var item_margin = $(window).width() >= 768 ? 90 : 30;
		var slides = Math.floor( ( wrapper_width + item_margin ) / ( item_width + item_margin ) );
		if( slides != wl_slides ) {
			if( wl_carousel != false ) {
				wl_carousel.destroy();
			}
			wl_slides = slides;
			$('#wl-carousel').width( slides * item_width + ( slides - 1 ) * item_margin );
			$('#wl-carousel').find( '.swiper-slide' ).css( 'margin-right', 0 );
			wl_carousel = new Swiper( '#wl-carousel', {
				direction: 'horizontal',
				loop: true,
				speed: 600,
				slidesPerView: slides,
				spaceBetween: item_margin,
				pagination: $('.wl-wrapper .page-controls'),
				paginationClickable: true,
				paginationHide: true,
				paginationBulletRender: function (index, className) {
					return '<a class="page-control ' + className + '" href="#"></a>';
				}
			} );
		}
	}
}