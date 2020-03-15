

	<!-- footer-menu -->
	<div id="footer-menu">
			<div class="inner">
				<div class="footer-logo"><a href="/">TF-30</a></div>
				<div class="footer-sub">サブタイトルが入りますサブタイトルが入ります</div>
				
			<!-- 動的フッター -->
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


     <?php if(is_single()): ?> <!-- 投稿ページの時のみ -->
		<!-- footer-sns -->
		<div class="footer-sns">
		<div class="inner">

		<div class="footer-sns-head">この記事をシェアする</div><!-- /footer-sns-head -->

		<nav class="footer-sns-buttons">
		
		<ul> <!-- 二つ目のhttpsをphpに置き換える -->
		<li><a class="m_twitter"
		href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); //タイトルを表示 ?>" rel="nofollow"
		target="_blank"><img src="<?php echo get_template_directory_uri() ?>/img/icon-twitter.png" alt=""></a>
		                          <!-- get_template_directory_uriはこのファイルまでのパス -->
		</li>
		<li><a class="m_facebook" href="https://www.facebook.com/share.php?u=https://example.com/archive/123/"
		rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/img/icon-facebook.png"
		alt=""></a></li>
		<li><a class="m_hatena"
		href="https://b.hatena.ne.jp/add?mode=confirm&url=https://example.com/archive/123/&title=記事のタイトルが入ります"
		rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/img/icon-hatena.png"
		alt=""></a></li>
		<li><a class="m_line" href="https://social-plugins.line.me/lineit/share?url=https://example.com/archive/123/"
		rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/img/icon-line.png"
		alt=""></a></li>
		<li><a class="m_pocket" href="https://getpocket.com/edit?url=https://example.com/archive/123/" rel="nofollow"
		target="_blank"><img src="<?php echo get_template_directory_uri() ?>/img/icon-pocket.png" alt=""></a></li>
		</ul>
		</nav><!-- /footer-sns-buttons -->

		</div><!-- /inner -->
		</div><!-- /footer-sns -->
    <?php endif; ?>





	<div class="floating">
		<a href="#"><i class="fas fa-chevron-up"></i></a>
    </div>
    
    <?php wp_footer(); ?>

</body>

</html>