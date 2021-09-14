jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast'
	});
});

function township_lite_menu_open() {
	jQuery(".side-menu").addClass('open');
}
function township_lite_menu_close() {
	jQuery(".side-menu").removeClass('open');
}

(function( $ ) {
	$(window).scroll(function(){
		var sticky = $('.sticky-header'),
		scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed-header');
		else sticky.removeClass('fixed-header');
	});

	// Back to top
	jQuery(document).ready(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 0) {
  				jQuery('.scrollup').fadeIn();
			} else {
		  		jQuery('.scrollup').fadeOut();
			}
		});
		jQuery('.scrollup').click(function () {
			jQuery("html, body").animate({
		  		scrollTop: 0
			}, 600);
			return false;
		});
	});
	
	// Window load function
	window.addEventListener('load', (event) => {
		$(".preloader").delay(2000).fadeOut("slow");
	});
})( jQuery );

( function( window, document ) {
	function township_lite_keepFocusInMenu() {
		document.addEventListener( 'keydown', function( e ) {
			const township_lite_nav = document.querySelector( '.side-menu' );

			if ( ! township_lite_nav || ! township_lite_nav.classList.contains( 'open' ) ) {
				return;
			}

			const elements = [...township_lite_nav.querySelectorAll( 'input, a, button' )],
				township_lite_lastEl = elements[ elements.length - 1 ],
				township_lite_firstEl = elements[0],
				township_lite_activeEl = document.activeElement,
				tabKey = e.keyCode === 9,
				shiftKey = e.shiftKey;

			if ( ! shiftKey && tabKey && township_lite_lastEl === township_lite_activeEl ) {
				e.preventDefault();
				township_lite_firstEl.focus();
			}

			if ( shiftKey && tabKey && township_lite_firstEl === township_lite_activeEl ) {
				e.preventDefault();
				township_lite_lastEl.focus();
			}
		} );
	}

	township_lite_keepFocusInMenu();
} )( window, document );