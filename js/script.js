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

	function translateValidateForm() {
		if ( $body.hasClass( 'page-template-register' ) ) {
			$.extend( $.validator.messages, {
				required: "Trường này là bắt buộc. Bạn hãy nhập lại!",
				pattern: "Hãy nhập đúng định dạng"
			} );
		}
	}

	function checkOtp() {
		$( '.form-otp input' ).on( 'keydown', function ( e ) {
			if ( e.keyCode == 13 ) {
				var user_id = OTP.user_id;
				$.ajax( {
					type: 'post',
					dataType: 'json',
					url: OTP.ajaxURL,
					data: {
						action: 'sol_check_otp',
						user_id: user_id,
						otp: $( this ).val(),
					},
					success: function ( response ) {
						if ( !response.success ) {
							$( '.form-otp__message' ).html( response.data );
							return;
						}
						$( '.form-otp__message' ).html( response.data );
						setTimeout( () => {
							location.href = response.data.url;
						}, 5000 );
					},
					error: function ( jqXHR, textStatus, errorThrown ) {
						console.log( 'Lỗi' );
					}
				} );
			}
		} );
		$( '.form-otp a.btn' ).on( 'click', function ( e ) {
			e.preventDefault();
			var user_id = OTP.user_id;
			$.ajax( {
				type: 'post',
				dataType: 'json',
				url: OTP.ajaxURL,
				data: {
					action: 'sol_check_otp',
					user_id: user_id,
					otp: $( this ).prev().val(),
				},
				success: function ( response ) {
					//console.log( response );
					if ( !response.success ) {
						$( '.form-otp__message' ).html( response.data );
						return;
					}
					$( '.form-otp__message' ).html( response.data.message );
					setTimeout( () => {
						location.href = response.data.url;
					}, 5000 );
				},
				error: function ( jqXHR, textStatus, errorThrown ) {
					console.log( 'Lỗi gửi otp' );
				}
			} );
		} );
	}

	function resend_otp() {
		$( '.form-otp-resend a' ).on( 'click', function ( e ) {
			e.preventDefault();
			var user_id = OTP.user_id;
			console.log( 'user_id', user_id );
			$.ajax( {
				type: 'post',
				dataType: 'json',
				url: OTP.ajaxURL,
				data: {
					action: 'sol_resend_otp',
					user_id: user_id,
				},
				success: function ( response ) {
					console.log( response );
					if ( !response.success ) {
						$( '.form-otp__message' ).html( response.data );
						return;
					}
					$( '.form-otp__message' ).html( response.data );
				},
				error: function ( jqXHR, textStatus, errorThrown ) {
					console.log( 'Lỗi' );
				}
			} );
		} );
	}

	toggleMenu();
	toggleAccount();
	popupLogout();
	slickSlide();
	counterNumber();
	translateValidateForm();
	checkOtp();
	resend_otp();
} );