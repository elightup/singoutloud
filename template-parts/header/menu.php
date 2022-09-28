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
