<?php
function register_post_type_voted_zanchi() {
	$labels = [
		'name'          => 'Bình chọn',
		'singular_name' => 'Bình chọn',
	];
	$args   = [
		'labels'      => $labels,
		'supports'    => [ 'title', 'thumbnail', 'editor', 'comments' ],
		'public'      => true,
		'has_archive' => true,
		'menu_icon'   => 'dashicons-admin-users',
	];
	register_post_type( 'votes', $args );

	$labels2 = [
		'name'          => __( 'Cuộc thi', 'elu-shop' ),
		'singular_name' => __( 'Cuộc thi', 'elu-shop' ),
	];
	$args2   = [
		'labels'            => $labels2,
		'hierarchical'      => true,
		'public'            => true,
		'show_admin_column' => true,
	];
	register_taxonomy( 'kind-votes', 'votes', $args2 );
}
add_action( 'init', 'register_post_type_voted_zanchi' );

// add shortcode
if ( ! function_exists( 'general_voted_html' ) ) {  // start if function
	function general_voted_html( $atts ) {
		extract(shortcode_atts([
			'post_type'  => 'votes',
			'cuocthi'    => 'kind-votes',
			'tencuocthi' => '',
		], $atts));

		$html = '';

		if ( $_GET['order'] ) {
			$arg = [
				'post_type'              => $post_type,
				'paged'                  => max( 1, get_query_var( 'paged' ) ),
				'posts_per_page'         => 12,
				'meta_key'               => 'voted_number',
				'orderby'                => 'meta_value_num',
				'order'                  => 'DESC',
				'tax_query'              => array(
					'relation' => 'AND',
					array(
						'taxonomy' => $cuocthi,
						'field'    => 'slug',
						'terms'    => $tencuocthi,
					),
				),
				'update_post_term_cache' => false,
			];
		} else {
			$arg = [
				'post_type'              => $post_type,
				'paged'                  => max( 1, get_query_var( 'paged' ) ),
				'posts_per_page'         => 15,
				'tax_query'              => array(
					'relation' => 'AND',
					array(
						'taxonomy' => $cuocthi,
						'field'    => 'slug',
						'terms'    => $tencuocthi,
					),
				),
				// 'no_found_rows'          => true,
				'update_post_term_cache' => false,
			];
		}
		$query = new WP_Query( $arg );

		while ( $query->have_posts() ) :
			$query->the_post();
			$html .= vote_post();
			endwhile;
		$html     .= '</div>';
			$html .= '<div class="nav-links">';
			$pages = paginate_links(
				array(
					'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
					'format'       => '?paged=%#%',
					'current'      => max( 1, get_query_var( 'paged' ) ),
					'total'        => $query->max_num_pages,
					'show_all'     => false,
					'end_size'     => 2,
					'mid_size'     => 1,
					'prev_next'    => true,
					'prev_text'    => '<',
					'next_text'    => '>',
					'add_args'     => false,
					'add_fragment' => '',
				)
			);
		$html     .= $pages;
		wp_reset_postdata();

		return $html;

	}
	add_shortcode( 'votes_event', 'general_voted_html' );
} // end if function

function vote_post() {
	$voted_number = (int) get_post_meta( get_the_ID(), 'voted_number', true );
	ob_start();
	?>
	<article id="voted-<?= get_the_ID() ?>" class="meta-voted ">
		<div class="voted-inner">
			<div class="entry-voted-number"><span><a href="<?php the_permalink() ?>">Vote</a></span></div>
			<div class="entry-thumb">
				<a class="voted-item voted-<?= get_the_ID() ?>" href="<?php the_permalink() ?>">
					<?php the_post_thumbnail( 'full' ) ?>
				</a>
			</div>
			<div class="voted-content">
				<div class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>

				<div class="number-voted"><?= $voted_number ?></div>
			</div>
		</div>
	</article>
	<?php
	return ob_get_clean();
}

if ( ! function_exists( 'general_tab_vote_area_html' ) ) {
	function general_tab_vote_area_html( $atts ) {
		extract(shortcode_atts([
			'tencuocthi' => '',
		], $atts));

		if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
			if ( $_GET['voted-search'] ) {
				return query_search_vote_text();
			}
		}
		ob_start();
		?>
		<div class="competition__inner">
			<?= do_shortcode( "[votes_event tencuocthi='" . $tencuocthi . "']" ); ?>
		</div>
		<?php
		$page = ob_get_contents();
		ob_end_clean();
		return $page;
	};
	add_shortcode( 'cuoc_thi', 'general_tab_vote_area_html' );
}

// Kết quả tìm kiếm
function query_search_vote_text() {
	$html  = '';
	$html .= '<div class="title-heading-search"><span>Từ Khóa tìm kiếm: ' . $_GET['voted-search'] . '</span></div>';
	$query = new WP_Query(array(
		'post_type'              => 'votes',
		'paged'                  => get_query_var( 'paged' ),
		'posts_per_page'         => 6,
		's'                      => $_GET['voted-search'],
		'tax_query'              => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'kind-votes',
				'field'    => 'slug',
				'terms'    => $_GET['tencuocthi'],
			),
		),
		'no_found_rows'          => true,
		'update_post_term_cache' => false,
	));
	$html .= '<div  class="votes_event container" >';
	$html .= '<div class="competition__inner">';
	while ( $query->have_posts() ) :
		$query->the_post();
		$html .= vote_post();
		endwhile;
		$html .= '<div class="nav-links">';
		$pages = paginate_links(
			array(
				'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				'format'       => '?paged=%#%',
				'current'      => max( 1, get_query_var( 'paged' ) ),
				'total'        => $query->max_num_pages,
				'show_all'     => false,
				'end_size'     => 2,
				'mid_size'     => 1,
				'prev_next'    => true,
				'prev_text'    => '<',
				'next_text'    => '>',
				'add_args'     => false,
				'add_fragment' => '',
			)
		);
		$html .= $pages;
		$html .= '</div>';
		wp_reset_postdata();
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<style>.voted-candidates{display: grid;grid-template-columns: repeat(3,1fr);grid-gap: 25px;}.meta-voted{padding: 30px 5px;padding-top: 0;}.voted-content{position: relative;}.entry-title{text-align: left;justify-content: left;width: 74%;margin: 0;padding: 0;}.entry-title a{color: #898989;font-size: 18px;font-weight: 700;}.entry-voted-number{position: absolute;top: -25px;z-index: 1;text-align: right;width: 100px;color: #898989;font-size: 13px;font-weight: 700;}.entry-thumb{overflow: hidden;}.entry-thumb img{transition: .5s;}.meta-voted:hover img{transform: scale(1.3);} .nav-links {display: flex;justify-content: center;margin: 50px 0}.page-numbers.current {background: #f7df6b;}.page-numbers{min-width: 30px;padding: 5px;height: 30px;margin: 0 3px;border: 1px  solid   #f7df6b;display: flex;justify-content: center;align-items: center;font-weight: 600;}</style>';

	return $html;
}

// shortcode filter search
if ( ! function_exists( 'general_voted_filter' ) ) {
	function general_voted_filter( $atts ) {
		extract( shortcode_atts([
			'tencuocthi' => '',
		], $atts));

		ob_start();
		?>
		<div class="voted-filter">
			<div class="box-search">
				<form id="searchform-voted" method="get" action="<?php echo get_the_permalink(); ?>">
					<div class="input-text-search">
						<input type="text" name="voted-search" id="s" size="15"  placeholder="Tìm kiếm" />
						<input type="hidden" name="tencuocthi"  value="<?= $tencuocthi ?>" />
					</div>
					<div class="input-button">
						<input type="submit" value="Kiểm tra" />
					</div>
				</form>
			</div>
			<div class="voted-filter__form">
				<a class="click-voted voted-most" href="?order=votes">VOTE nhiều nhất </a>
				<a class="click-voted voted-new" href="?voted-new=1">Mới nhất </a>
			</div>
		</div>

		<?php
		return ob_get_clean();
	};
	add_shortcode( 'cuoc_thi_filter_voted', 'general_voted_filter' );
}

// content single vote
if ( ! function_exists( 'content_vote' ) ) {
	function content_vote( $content ) {
		if ( ! is_singular( 'votes' ) ) {
			return $content;
		}
		ob_start();
		$voted_number = (int) get_post_meta( get_the_ID(), 'voted_number', true );
		?>

		<div class="click-voted-post">
			<a class="click-voted" data-toggle="modal" data-target="#modal-<?php echo get_the_ID(); ?>" href="#" data-id="<?php echo get_the_ID(); ?>">Vote cho thí sinh</a>
		</div>
		<div class="number-voted" style="text-align: center; margin: 10px 0;">Số lượt vote: <?= $voted_number ?></div>

		<div class="modal myModal-voted-post fade" id="modal-<?php echo get_the_ID(); ?>" role="dialog">
			<div class="modal-dialog">
				<form action="?" method="POST" class="modal-content">
					<?php echo wp_nonce_field( 'vote-' . get_the_ID(), 'nonce', true, false ); ?>
					<input type="hidden" name="user_id" value="" class="user_id">
					<input type="hidden" name="access_token" value="" class="access_token">
					<input type="hidden" name="id" value="<?php echo get_the_ID(); ?>">
					<div class="statufb text-center">Bạn cần đăng nhập Facebook để vote</div>
					<div class="text-center button-fb">
					<!-- <div class="fb-login-button" data-width="" data-size="large" data-button-type="login_with" data-layout="rounded" data-auto-logout-link="false" data-use-continue-as="false"></div> -->
						<div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false" onlogin="checkLoginState();"></div>
					</div>
					<div style="display: none;" class="modal-footer">

						<button class="btn btn-primary float-right">Vote</button>
					</div>
				</form>
			</div><!-- -->
		</div>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" async></script>
		<script>
		// This is called with the results from from FB.getLoginStatus().
		function statusChangeCallback(response) {
			var token = response.authResponse.accessToken,
				userID = response.authResponse.userID;
				console.log(response);
			if (response.status !== 'connected') {

				return;
			}
			FB.api('/me', function(response) {
				jQuery('.statufb').html('Bạn đã đăng nhập Facebook với tên <strong>' + response.name + '</strong>.<br/>Hiện bạn có thể tiến hành vote cho thí sinh.');
			});
			jQuery( '.user_id' ).attr( 'value', userID );
			jQuery( '.access_token' ).attr( 'value', token );
			jQuery( '.button-fb' ).hide();
			jQuery( '.modal-footer' ).show();
		}

		function checkLoginState() {               // Called when a person is finished with the Login Button.
			FB.getLoginStatus(function(response) {   // See the onlogin handler
				statusChangeCallback(response);
			});
		}

		window.fbAsyncInit = function() {
			FB.init({
			appId      : '606172131214972',
			cookie     : true,
			xfbml      : true,
			version    : 'v13.0'
			});

			//FB.AppEvents.logPageView();
			FB.getLoginStatus(function(response) {
				statusChangeCallback(response);
			});

		};

		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "https://connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>

		<?php
		$page = ob_get_contents();
		ob_end_clean();
		$content .= $page;
		return $content;
	}
	add_filter( 'the_content', 'content_vote' );

}

// xu ly  voted
function process_vote() {
	verify_vote();
	check_timeout_vote();
	check_repeat_vote();
	update_vote();
}

function verify_vote() {
	$id    = filter_input( INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT );
	$nonce = filter_input( INPUT_POST, 'nonce', FILTER_SANITIZE_STRING );
	$token = filter_input( INPUT_POST, 'access_token', FILTER_SANITIZE_STRING );
	$uid   = filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_STRING );

		// Check ID.
	if ( ! $id || ! is_numeric( $id ) ) {
		wp_die( 'Yêu cầu id không hợp lệ.' );
	}

		// Check nonce.
	if ( ! wp_verify_nonce( $nonce, "vote-$id" ) ) {
		wp_die( 'Yêu cầu none voted không hợp lệ.' );
	}

		// Check unique ID.
	if ( ! $uid && ! $token ) {
		wp_die( 'Yêu cầu uid token không hợp lệ.' );
	}
		$response = wp_remote_retrieve_body( wp_remote_get( 'https://graph.facebook.com/oauth/access_token_info', array(
			'body' => array(
				'client_id'    => '400133594983721',
				'access_token' => $token,
			),
		) ) );

		$response = json_decode( $response, true );
	if ( ! empty( $response['error'] ) ) {
		wp_die( 'Xác thực tài khoản qua Facebook không hợp lệ.' );
	}

}

function check_repeat_vote() {

	$post_id = get_the_ID();
	$option  = get_option( 'vote_log_member', [] );
	$uid     = filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_STRING );

	foreach ( $option[ $uid ] as $key => $value ) {
		$post_vote = $value;
		if ( $post_vote !== $post_id ) {
			$option[ $uid ][] = $post_id;
			update_option( 'vote_log_member', $option );
		} else {
			wp_die( 'Bạn đã bình chọn cho thí sinh này rồi.<a class="back-voted" href="' . $_SERVER['REQUEST_URI'] . '">Nhấn vào đây</a> để về trang trước.' );
		}
	}

}

function check_timeout_vote() {
	$option = get_option( 'vote_timeout_member', array() );
	$uid    = filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_STRING );

	$current_time  = time();
	$previous_time = isset( $option[ $uid ] ) ? $option[ $uid ] : 0;
	$previous_time = (int) $previous_time;

	if ( $current_time - $previous_time < 10 ) {
		wp_die( 'Bạn <strong>đã vote quá nhanh</strong>. <a class="back-voted" href="' . $_SERVER['REQUEST_URI'] . '">Nhấn vào đây</a> để về trang trước.' );
	}

	$option[ $uid ] = $current_time;
	update_option( 'vote_timeout_member', $option );
}

function update_vote() {
	$uid = filter_input( INPUT_POST, 'user_id', FILTER_SANITIZE_STRING );
	if ( $uid == '400133594983721' ) {
		return;
	}

	$id    = filter_input( INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT );
	$voted = (int) get_post_meta( $id, 'voted_number', true );
	$voted = $voted + 1;
	update_post_meta( $id, 'voted_number', $voted );
	wp_die( 'Cảm ơn bạn đã bình chọn. Bạn vui lòng <a class="back-voted" href="' . $_SERVER['REQUEST_URI'] . '">CLICK VÀO ĐÂY</a> để về trang trước.' );
}

function add_check_voted_number() {
	if ( ! is_singular( 'votes' ) ) {
		return;
	}
	if ( ! empty( $_POST['id'] ) ) {
		process_vote();
	}
}
add_action( 'get_header', 'add_check_voted_number' );

// hiển thi số voted

function set_custom_votes_columns( $columns ) {
	$columns['voted'] = __( 'Voted', 'poly' );
	return $columns;
}
add_filter( 'manage_votes_posts_columns', 'set_custom_votes_columns' );

function custom_column_vote( $column ) {

	if ( $column === 'voted' ) {
		$post_id = get_the_ID();
		$count   = get_post_meta( $post_id, 'voted_number', true );
		echo $count == 0 ? '0 voted' : "$count voted";
	}

}
add_action( 'manage_votes_posts_custom_column', 'custom_column_vote' );

add_action( 'rwmb_frontend_after_save_post', function( $object ) {

	$city = rwmb_meta( 'city', '', $object->post_id );
	$kind = rwmb_meta( 'cuoc_thi', '', get_the_ID() );

	wp_set_object_terms( $object->post_id, $city->name, $city->taxonomy );
	wp_set_object_terms( $object->post_id, $kind->name, 'kind-votes' );

}, 10, 2 );
