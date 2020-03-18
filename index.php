

<?php get_header(); ?>

<!-- ここはindex専用 -->
<?php get_template_part('template-parts/pickup_by_tag'); ?>
 <!-- /index専用 -->


 <!------ archiveはここから同様に作る ------>

	<!-- content -->
	<div id="content">
		<div class="inner">

			
<!-- primary -->
<main id="primary">

			<?php
			//記事があればentriesブロック以下を表示
			if (have_posts() ) : ?>  <!-- 投稿画面から作った記事があれば、それをSQLから取得 -->

			<!-- entries -->
			<div class="entries">
			<?php
			//投稿された記事数ぶんループ
			while ( have_posts() ) : /* 取得した記事を表示 */
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

			<!-- trueを引数として渡すとリンク付き、falseを渡すとリンクなし -->
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



			<?php
			endwhile;
			?>
			</div><!-- /entries -->
			<?php endif; ?>


			<?php get_template_part('template-parts/pagenation'); ?>

			</main><!-- /primary -->

<?php get_sidebar(); ?>

		</div><!-- /inner -->
	</div><!-- /content -->

    <?php get_footer(); ?>