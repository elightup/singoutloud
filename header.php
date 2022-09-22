<!DOCTYPE html>
<html class="no-js" <?php language_attributes() ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ) ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700&family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
	<?php wp_head() ?>
</head>

<body <?php body_class() ?>>
	<?php wp_body_open(); ?>
	<?php
	if ( is_page_template( 'page-templates/home-page.php' ) ) {
		$class = 'white-header';
	} else {
		$class = '';
	}
	?>
		<!-- nội dung header -->
	<div class="header <?= esc_attr( $class );?>">
		<div class="header-login">
			<?php if ( ! is_user_logged_in() ) : ?>
				<a class="signin " href="<?php echo esc_url( home_url() ); ?>/dang-nhap">Đăng nhập</a>
				<a class="signup" href="<?php echo esc_url( home_url() ); ?>/dang-ky">Đăng ký</a>
				<?php
			else :
				$user_current = wp_get_current_user();
				?>
				<span>Chào bạn, <?php echo esc_html( $user_current->display_name ); ?></span>
			<?php endif ?>
			<?php if ( is_user_logged_in() ) : ?>
				<div class="menu-account d-flex">
					<a class=" btn-drop-down" href="#popup-logout">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/drop-down.png" />
					</a>
					<div class="menu-account__wrapper">
						<ul>
							<li>
								<?php SingOutLoud_Icons::render( 'upload' ); ?>
								<a class="" href="<?php echo esc_html( home_url() ) ?>/up-bai-du-thi/">Up bài dự thi</a>
							</li>
							<li>
								<?php SingOutLoud_Icons::render( 'logout' ); ?>
								<a class="popup-modal" href="#popup-logout">Đăng xuất</a>
							</li>
						</ul>
					</div>
				</div>
				<div id="popup-logout" class="popup-logout mfp-hide white-popup-block">
					<h3>Xin xác nhận</h3>
					<p>Bạn có muốn chắc đăng xuất.</p>
					<a class="btn-secondary wp-block-button__link popup-modal-dismiss">Không</a>
					<a class="btn-primary wp-block-button__link" href="<?= esc_url( wp_logout_url( '/' ) ); ?>">Có</a>
				</div>
			<?php endif ?>
		</div>
		<div class="d-flex space-between">
			<div class="header__inner space-between">
				<div class="header__logo">
					<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
						<?php
						$logo_white = get_theme_mod( 'singoutloud_logo_white' );
						$logo_black = get_theme_mod( 'singoutloud_logo_black' );
						if ( empty( $logo_black ) && empty( $logo_white ) ) :
							bloginfo( 'name' );
						else :
							?>
							<img class="navbar-logo" src="<?= esc_url( $logo_black ); ?>" alt="Logo">
							<img class="navbar-logo white-logo" src="<?= esc_url( $logo_white ); ?>" alt="Logo">
						<?php endif; ?>
					</a>
				</div>
				<div class="header__menu">
					<?php
					if ( ! is_user_logged_in() ) :
						wp_nav_menu(
							array(
								'theme_location' => 'header-guest',
								'menu_id'        => 'primary-menu',
								'container'      => false,
							)
						);
					else :
						wp_nav_menu(
							array(
								'theme_location' => 'header-user',
								'menu_id'        => 'primary-menu',
								'container'      => false,
							)
						);
					endif
					?>

					<button class="menu-toggle header-icon" aria-controls="primary-menu" aria-expanded="false">
						<?php SingOutLoud_Icons::render( 'menu' ) ?>
					</button>
				</div>
			</div>
			<div class="header__btn">
				<div class="header-email">
					<?php
					$email = get_theme_mod( 'singoutloud_custom_email' );
					$phone = get_theme_mod( 'singoutloud_custom_phone' );
					if ( empty( $email ) && empty( $phone ) ) :
						return;
					else :
						?>
						<a href="mailto:<?= esc_attr( $email ); ?>"><?php SingOutLoud_Icons::render( 'email' ); ?> <?= esc_html( $email ); ?></a>
						<a href="tel:<?= esc_attr( $phone ); ?>"><?php SingOutLoud_Icons::render( 'phone' ); ?> <?= esc_html( $phone ); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="bgDart "></div>

	<main class="main" role="main">
