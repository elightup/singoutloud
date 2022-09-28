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
