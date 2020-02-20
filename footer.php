

	<!-- footer-menu -->
	<div id="footer-menu">
			<div class="inner">
			<!-- 動的フッター、タイトル -->
				<!-- <div class="footer-logo"><a href="/">TF-30</a></div>/footer-logo
				<div class="footer-sub">サブタイトルが入りますサブタイトルが入ります</div>/footer-sub
			

	<?php if (is_home() || is_front_page() ) :  ?>
	<<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?>
	<?php else : ?>
	<div class="header-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></div>
	<?php endif; ?>
	<div class="header-sub"><?php bloginfo('description'); //ブログのdescriptionを表示 ?></div><!-- /header-sub -->




				<?php
					wp_nav_menu(
					array(
					'depth' => 1,
					'theme_location' => 'footer',
					'container' => 'nav', // 結局は元々作った奴を参考にするから、navで作ってれば、navと書けば良い
					'container_class' => 'footer-nav', // footer-navというクラスを命名してたから、それを引き継ぐ
					'menu_class' => 'footer-list', // ulのクラス
					)
					);
					?>

			</div><!--/inner -->
		</div><!-- /footer-menu -->



	<!-- footer -->
	<footer id="footer">
		<div class="inner">
			<div class="copy">&copy; daily-trial WordPress theme All rights reserved.</div><!-- /copy -->
			<div class="by">Presented by <a href="https://tokyofreelance.jp/" rel="noopener" target="_blank">東京フリーランス</a>
			</div><!-- /by -->

		</div><!-- /inner -->
	</footer><!-- /footer -->

	<div class="floating">
		<a href="#"><i class="fas fa-chevron-up"></i></a>
    </div>
    
    <?php wp_footer(); ?>

</body>

</html>