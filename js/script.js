jQuery( function ( $ ) {
	var clickEvent = 'ontouchstart' in window ? 'touchstart' : 'click';

	let $window = $( window ),
		$body = $( 'body' );

	function slickSlide() {
		$( '.banner' ).slick( {
			slidesToShow: 1,
			dots: false,
			arrows: false,
			autoplay: true,
			rows: 0,
			autoplaySpeed: 3000,
		} );
		$( '.register-page__image' ).slick( {
			slidesToShow: 1,
			dots: true,
			arrows: false,
			autoplay: true,
			rows: 0,
			autoplaySpeed: 3000,
		} );
		$( '.moment-slider' ).slick( {
			slidesToShow: 1,
			dots: true,
			arrows: false,
			autoplay: false,
			rows: 0,
			autoplaySpeed: 3000,
		} );
		$( '.new-home__inner' ).slick( {
			slidesToShow: 4,
			dots: false,
			arrows: true,
			autoplay: false,
			rows: 0,
			autoplaySpeed: 4000,
			responsive: [
				{
					breakpoint: 991,
					settings: {
						slidesToShow: 3,
					}
				},
				{
					breakpoint: 600,
					settings: {
						dots: true,
						slidesToShow: 1
					}
				}
			]
		} );
	};

	function counterNumber() {
		var run = false;
		if ( !$body.hasClass( 'page-template-home-page' ) ) {
			return;
		}

		$window.scroll( function () {
			var top = $( '.number-home' ).offset().top - window.innerHeight;

			if ( run || $window.scrollTop() <= top ) {
				return;
			}

			$( '.count' ).each( function () {
				$( this ).prop( 'Counter', 0 ).animate( {
					Counter: $( this ).text()
				}, {
					duration: 4000,
					easing: 'swing',
					step: function ( now ) {
						$( this ).text( Math.ceil( now ) );
					}
				} );
			} );

			run = true;
		} );
	}

	function popupLogout() {
		$( '.popup-modal' ).magnificPopup( {
			type: 'inline',
			preloader: false,
			modal: true
		} );
		$( document ).on( 'click', '.popup-modal-dismiss', function ( e ) {
			e.preventDefault();
			$.magnificPopup.close();
		} );
	}

	function toggleAccount() {
		$( '.menu-account a ' ).on( clickEvent, function ( e ) {
			console.log( 'ádf' );
			e.stopPropagation(); // do not trigger event on .site
			$( '.menu-account__wrapper' ).toggleClass( 'menu-account-open' );
		} );
	}

	function toggleMenu() {
		const nav = document.querySelector( '.header__menu' );
		const bg = document.querySelector( '.bgDart' );
		if ( !nav ) {
			return;
		}
		const menu = nav.querySelector( 'ul' ),
			button = document.querySelector( '.menu-toggle' );

		menu.setAttribute( 'aria-expanded', 'false' );
		button.addEventListener( 'click', () => {
			nav.classList.toggle( 'is-open' );
			bg.classList.toggle( 'open' );
		} );
		bg.addEventListener( 'click', () => {
			nav.classList.remove( 'is-open' );
			bg.classList.remove( 'open' );
		} );
	}

	toggleMenu();
	toggleAccount();
	popupLogout();
	slickSlide();
	counterNumber();
} );