      <?php get_header(); ?>



                <!-- entries -->
                

        		<?php
                 //記事があればentriesブロック以下を表示
                 if (have_posts() ) : ?>  <!-- 投稿画面から作った記事があれば、それをSQLから取得 -->

				<div class="entries m_horizontal">

                <?php
                    //記事数ぶんループ
                    while ( have_posts() ) :
                    the_post(); ?>


           <!------ 記事のテンプレ ------>

					<!-- entry-item -->
                    <a href="<?php the_permalink(); //記事のリンク ?>" class="entry-item">

						<!-- entry-item-img -->
						<div class="entry-item-img">
                        <?php
                            if (has_post_thumbnail() ) {
                                the_post_thumbnail('large');} // アイキャッチ画像が設定されてれば大サイズで表示
                            else {// なければnoimage画像をデフォルトで表示
                            echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';}?>
                            </div><!-- /entry-item-img -->

						<!-- entry-item-body -->
			<div class="entry-item-body">
			<div class="entry-item-meta">
			<?php
				// カテゴリー１つ目の名前を表示
				$category = get_the_category();
				if ($category[0] ) {
				echo '<div class="entry-item-tag">' . $category[0]->cat_name . '</div><!-- /entry-item-tag -->';}?>
                
				<!-- 日付の取得 -->
			<time class="entry-item-published" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time><!-- /entry-item-published -->
			</div><!-- /entry-item-meta -->

			<h2 class="entry-item-title"><?php the_title(); //タイトルを表示 ?></h2><!-- /entry-item-title -->
			<div class="entry-item-excerpt">
	        <?php the_excerpt(); //本文の抜粋を表示 ?>
			</div><!-- /entry-item-excerpt -->
			</div><!-- /entry-item-body -->
			</a><!-- /entry-item --> 
           <!------ /記事のテンプレ ------>
            

                    

                    <?php endwhile;?> <!--忘れずに-->
                  </div><!-- /entries -->
                <?php endif; ?>


                <?php if (paginate_links() ) : //ページが1ページ以上あれば以下を表示 ?>
                <!-- pagenation -->
                <div class="pagenation">
                <?php
                echo
                paginate_links(
                array(
                'end_size' => 0,
                'mid_size' => 1,
                'prev_next' => true,
                'prev_text' => '<i class="fas fa-angle-left"></i>',
                'next_text' => '<i class="fas fa-angle-right"></i>',
                )
                );
                ?>
                </div><!-- /pagenation -->
                <?php endif; ?>

			</main><!-- /primary -->

			<!-- secondary -->
			<aside id="secondary">

				<!-- widget -->
				<div class="widget widget_text widget_custom_html">
					<div class="widget-title">プロフィール</div>

					<div class="wprofile">
						<div class="wprofile-img"><img src="img/profile.png" alt=""></div>
						<div class="wprofile-content">
							<p>
								テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
							</p>
						</div>
						<!-- /wprofile-content -->
						<nav class="wprofile-sns">
							<div class="wprofile-sns-item m_twitter"><a href="" rel="noopener noreferrer" target="_blank"><i
										class="fab fa-twitter"></i></a></div>
							<div class="wprofile-sns-item m_facebook"><a href="" rel="noopener noreferrer" target="_blank"><i
										class="fab fa-facebook-f"></i></a></div>
							<div class="wprofile-sns-item m_instagram"><a href="" rel="noopener noreferrer" target="_blank"><i
										class="fab fa-instagram"></i></a></div>
						</nav>
					</div><!-- /wprofile -->
				</div><!-- /widget -->


				<!-- widget -->
				<div class="widget widget_search">
					<div class="widget-title">検索</div>
					<!-- search-form -->
					<form method="get" class="search-form" action="#">
						<input type="search" class="search-field" value="" placeholder="キーワード" name="s" id="s">
						<button type="submit" class="search-submit"><i class="fas fa-search"></i></button>
					</form><!-- /search-form -->
				</div><!-- /widget -->


				<!-- widget -->
				<div class="widget widget_popular">
					<div class="widget-title">人気記事</div>

					<div class="wpost-items m_ranking">

						<!-- wpost-item -->
						<a class="wpost-item" href="#">
							<div class="wpost-item-img"><img src="img/entry2.png" alt=""></div>
							<div class="wpost-item-body">
								<div class="wpost-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div>
							</div><!-- /wpost-item-body -->
						</a><!-- /wpost-item -->

						<!-- wpost-item -->
						<a class="wpost-item" href="#">
							<div class="wpost-item-img"><img src="img/entry1.png" alt=""></div>
							<div class="wpost-item-body">
								<div class="wpost-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div>
							</div><!-- /wpost-item-body -->
						</a><!-- /wpost-item -->

						<!-- wpost-item -->
						<a class="wpost-item" href="#">
							<div class="wpost-item-img"><img src="img/entry3.png" alt=""></div>
							<div class="wpost-item-body">
								<div class="wpost-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div>
							</div><!-- /wpost-item-body -->
						</a><!-- /wpost-item -->

						<!-- wpost-item -->
						<a class="wpost-item" href="#">
							<div class="wpost-item-img"><img src="img/entry4.png" alt=""></div>
							<div class="wpost-item-body">
								<div class="wpost-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div>
							</div><!-- /wpost-item-body -->
						</a><!-- /wpost-item -->

						<!-- wpost-item -->
						<a class="wpost-item" href="#">
							<div class="wpost-item-img"><img src="img/entry5.png" alt=""></div>
							<div class="wpost-item-body">
								<div class="wpost-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div>
							</div><!-- /wpost-item-body -->
						</a><!-- /wpost-item -->

					</div><!-- /wpost-items -->
				</div><!-- /widget -->



				<!-- widget -->
				<div class="widget widget_recent">
					<div class="widget-title">新着記事</div>

					<div class="wpost-items">

						<!-- wpost-item -->
						<a class="wpost-item" href="#">
							<div class="wpost-item-img"><img src="img/entry7.png" alt=""></div>
							<div class="wpost-item-body">
								<div class="wpost-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div>
							</div><!-- /wpost-item-body -->
						</a><!-- /wpost-item -->

						<!-- wpost-item -->
						<a class="wpost-item" href="#">
							<div class="wpost-item-img"><img src="img/entry6.png" alt=""></div>
							<div class="wpost-item-body">
								<div class="wpost-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div>
							</div><!-- /wpost-item-body -->
						</a><!-- /wpost-item -->

						<!-- wpost-item -->
						<a class="wpost-item" href="#">
							<div class="wpost-item-img"><img src="img/entry10.png" alt=""></div>
							<div class="wpost-item-body">
								<div class="wpost-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div>
							</div><!-- /wpost-item-body -->
						</a><!-- /wpost-item -->

						<!-- wpost-item -->
						<a class="wpost-item" href="#">
							<div class="wpost-item-img"><img src="img/entry7.png" alt=""></div>
							<div class="wpost-item-body">
								<div class="wpost-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div>
							</div><!-- /wpost-item-body -->
						</a><!-- /wpost-item -->

						<!-- wpost-item -->
						<a class="wpost-item" href="#">
							<div class="wpost-item-img"><img src="img/entry9.png" alt=""></div>
							<div class="wpost-item-body">
								<div class="wpost-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div>
							</div><!-- /wpost-item-body -->
						</a><!-- /wpost-item -->

					</div><!-- /wpost-items -->
				</div><!-- /widget -->

				<div class="widget widget_archive">
					<div class="widget-title">アーカイブ</div>
					<ul>
						<li><a href="#">テキストテキストテキスト</a></li>
						<li><a href="#">テキストテキストテキスト</a></li>
						<li><a href="#">テキストテキストテキスト</a></li>
					</ul>
				</div><!-- /widget -->

			</aside><!-- secondary -->


		</div><!-- /inner -->
	</div><!-- /content -->

	<!-- footer-menu -->
	<div id="footer-menu">
		<div class="inner">
			<div class="footer-logo"><a href="/">TF-30</a></div><!-- /footer-logo -->
			<div class="footer-sub">サブタイトルが入りますサブタイトルが入ります</div><!-- /footer-sub -->

			<nav class="footer-nav">
				<ul class="footer-list">
					<li class="menu-item"><a href="#">メニュー1</a></li>
					<li class="menu-item"><a href="#">メニュー2</a></li>
					<li class="menu-item"><a href="#">メニュー3</a></li>
					<li class="menu-item"><a href="#">メニュー4</a></li>
					<li class="menu-item"><a href="#">メニュー5</a></li>
				</ul>
			</nav>

		</div><!-- /inner -->
	</div><!-- /footer-menu -->



	<!-- footer -->
	<footer id="footer">
		<div class="inner">
			<div class="copy">&copy; daily-trial WordPress theme All rights reserved.</div><!-- /copy -->
			<div class="by">Presented by <a href="https://tokyofreelance.jp/" rel="noopener" target="_blank">東京フリーランス</a>
			</div><!-- /by -->

		</div><!-- /inner -->
	</footer><!-- /footer -->



	<!-- footer-sns -->
	<div class="footer-sns">
		<div class="inner">
			<div class="footer-sns-head">この記事をシェアする</div><!-- /footer-sns-head -->

			<nav class="footer-sns-buttons">
				<ul>
					<li><a class="m_twitter" href="https://twitter.com/share?url=https://example.com/category/a/&text=カテゴリー名"
							rel="nofollow" target="_blank"><img src="img/icon-twitter.png" alt=""></a></li>
					<li><a class="m_facebook" href="https://www.facebook.com/share.php?u=https://example.com/category/a/"
							rel="nofollow" target="_blank"><img src="img/icon-facebook.png" alt=""></a></li>
					<li><a class="m_hatena"
							href="https://b.hatena.ne.jp/add?mode=confirm&url=https://example.com/category/a/&title=カテゴリー名"
							rel="nofollow" target="_blank"><img src="img/icon-hatena.png" alt=""></a></li>
					<li><a class="m_line" href="https://social-plugins.line.me/lineit/share?url=https://example.com/category/a/"
							rel="nofollow" target="_blank"><img src="img/icon-line.png" alt=""></a></li>
					<li><a class="m_pocket" href="https://getpocket.com/edit?url=https://example.com/category/a/" rel="nofollow"
							target="_blank"><img src="img/icon-pocket.png" alt=""></a></li>
				</ul>
			</nav><!-- /footer-sns-buttons -->

		</div><!-- /inner -->
	</div><!-- /footer-sns -->


	<div class="floating">
		<a href="#"><i class="fas fa-chevron-up"></i></a>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="js/script.js"></script>

</body>

</html>