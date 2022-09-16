jQuery( function ( $ ) {
	let slickSlide = () => {
		$( '.banner' ).slick( {
			slidesToShow: 1,
			dots: false,
			arrows: false,
			autoplay: true,
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
					breakpoint: 600,
					settings: {
						dots: true,
						slidesToShow: 1
					}
				}
			]
		} );
	};
	function counter_number() {
		var a = 0;
		if ( $( 'body' ).hasClass( 'page-template-home-page' ) ) {
			$( window ).scroll( function () {
				var oTop = $( '.number-home' ).offset().top - window.innerHeight;
				if ( a == 0 && $( window ).scrollTop() > oTop ) {
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
					a = 1;
				}
			} );
		};
	}
	function scrollDown() {
		if ( $( 'body' ).hasClass( 'page-template-front-page' ) ) {
			$( '.scrooldow a' ).each( function () {
				var id = $( this ).attr( 'href' );
				if ( id.includes( 'tel' ) ) {
					return;
				}
				$( this ).click( function ( e ) {
					e.preventDefault();

					if ( !id || '#' === id ) {
						return false;
					}

					$( 'html, body' ).animate( {
						scrollTop: $( id ).offset().top - 100
					}, 50 );
					return false;
				} );
			} );
		}
	}
	function scrollMenu() {
		$( window ).scroll( function () {
			if ( $( this ).scrollTop() > 50 ) {
				$( '#masthead' ).addClass( 'mnfixed' );

			} else {
				$( '#masthead' ).removeClass( 'mnfixed' );
			}
		} );
	}
	function toggleMenu() {
		const nav = document.querySelector( '.header__menu' );
		if ( !nav ) {
			return;
		}
		const menu = nav.querySelector( 'ul' ),
			button = document.querySelector( '.menu-toggle' );

		menu.setAttribute( 'aria-expanded', 'false' );
		button.addEventListener( 'click', () => {
			nav.classList.toggle( 'is-open' );
		} );
	}

	toggleMenu();
	slickSlide();
	counter_number();
	scrollDown();
	scrollMenu();
} );