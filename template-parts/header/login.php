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
