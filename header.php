<!DOCTYPE html>
<html class="no-js" <?php
					language_attributes() ?>>

<head>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head() ?>
</head>

<body <?php body_class() ?>>
	<?php wp_body_open(); ?>

	<!-- nội dung header -->
	<div class="header">
		<div class="header__btn">
			<a href="#" class="signin">Đăng nhập</a>
			<a href="#" class="signup">Đăng ký</a>
		</div>
		<div class="header__inner">
			<div class="header__logo">
				<?php the_custom_logo() ?>
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
			</div>
			<div class="header__contact">

				<div class="header__contact-info">
					<p>
						<?php dynamic_sidebar('header'); ?>
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<main class="main" role="main">