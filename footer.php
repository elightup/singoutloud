</main>
<footer class="footer " role="contentinfo">

	<!-- nội dung footer -->
	<div class="footer__inner">
		<div class="footer__logo">
			<?php the_custom_logo() ?>
		</div>
		<div class="footer__title">
			Thông tin liên hệ:
		</div>
		<div class="footer__info">
			<?php dynamic_sidebar('footer') ?>
		</div>
		<div class="footer__social">
			<div>
				<?php dynamic_sidebar('footer-social'); ?>
			</div>
			<p>Bản quyền thuộc Swinburne Việt Nam</p>
		</div>
	</div>

</footer>

<?php wp_footer(); ?>
</body>

</html>