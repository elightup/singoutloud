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
	$class = '';
	if ( is_page_template( 'page-templates/home-page.php' ) ) {
		$class = 'white-header';
	}
	?>
		<!-- nội dung header -->
	<div class="header <?= esc_attr( $class );?>">
		<?php // get_template_part( 'template-parts/header/login' ); ?>
		<div class="d-flex space-between">
			<div class="header__inner space-between">
				<?php get_template_part( 'template-parts/header/logo' ); ?>
				<?php get_template_part( 'template-parts/header/menu' ); ?>
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
