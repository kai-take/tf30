	  <?php get_header(); ?> <!-- ヘッダー取得 -->
	  
	  	<!-- content -->
	<div id="content">
		<div class="inner">

			
			<!-- primary -->
			<main id="primary">

				<!-- breadcrumb -->
				<div class="breadcrumb">
				<?php bcn_display(); //BreadcrumbNavXTのパンくずを表示するための記述 ?>
				</div><!-- /breadcrumb -->

				<div class="archive-head m_description">
				<div class="archive-lead">ARCHIVE</div>
				<h1 class="archive-title m_category"><?php the_archive_title(); //一覧ページ名を表示 ?></h1><!-- /archive-title -->
				<div class="archive-description">
				<p><?php the_archive_description(); //説明を表示 ?></p>
				</div><!-- /archive-description -->
				</div><!-- /archive-head -->
					
	
	
        		<?php
                 //記事があればentriesブロック以下を表示
				 if (have_posts() ) : ?>  <!-- 投稿画面から作った記事があれば、それをSQLから取得 -->

	      <!-- entries -->
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
			
			<!-- カテゴリー1つ目の名前を表示 -->
			<div class="entry-item-tag"><?php my_the_post_category( false ); ?></div><!-- /entry-item-tag -->
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


                <?php get_template_part('../template-parts/pagenation.php'); ?>

			</main><!-- /primary -->

			<?php get_sidebar(); ?>

		</div><!-- /inner -->
	</div><!-- /content -->

    <?php get_footer(); ?>

			