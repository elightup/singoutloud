<!DOCTYPE html>
<html class="no-js" <?php language_attributes() ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ) ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700&family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
	<?php wp_head() ?>
</head>

<body <?php body_class() ?>>
	<?php wp_body_open(); ?>

	<!-- nội dung header -->
	<div class="header">
		<div class="container">
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
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								'container'      => false,
							)
						);
						?>
						<button class="menu-toggle header-icon" aria-controls="primary-menu" aria-expanded="false">
							<?php SingOutLoud_Icons::render( 'menu' ) ?>
						</button>
					</div>
				</div>
				<div class="header__btn">
					<div class="header-login">
						<a href="<?= esc_url( home_url() . '/dang-nhap' );?>" class="signin">Đăng nhập</a>
						<a href="<?= esc_url( home_url() . '/dang-ky' );?>" class="signup">Đăng ký</a>
					</div>
					<div class="header-email">
						<?php
						$email = get_theme_mod( 'singoutloud_custom_email' );
						$phone = get_theme_mod( 'singoutloud_custom_phone' );
						if ( empty( $email ) && empty( $phone ) ) :
							return;
						else :
							?>
							<a href="mailto:<?= esc_attr( $email );?>"><?php SingOutLoud_Icons::render( 'email' ); ?> <?= esc_html( $email );?></a>
							<a href="tel:<?= esc_attr( $phone );?>"><?php SingOutLoud_Icons::render( 'phone' ); ?> <?= esc_html( $phone );?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<main class="main" role="main">
