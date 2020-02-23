<?php get_header(); ?> <!-- ヘッダー取得 -->
	  
	  	<!-- content -->
	<div id="content">
		<div class="inner">

			
			<!-- primary -->
			<main id="primary">

            <?php if ( function_exists( 'bcn_display' ) ) : ?> <!-- 'bcn_display'が定義されているか確認のための関数 -->
				<!-- breadcrumb -->
				<div class="breadcrumb">
				<?php bcn_display(); //BreadcrumbNavXTのパンくずを表示するための記述 ?>
                </div><!-- /breadcrumb -->
            <?php endif; ?>
                
            
  <!-- 以下を動的に -->

  <?php
    if ( have_posts() ) :
    while ( have_posts() ) :
    the_post();
    ?>

	 <!-- entry -->
      <article class="entry">

        <!-- entry-header -->
        <div class="entry-header">

        <?php
        // カテゴリー１つ目の名前を表示
        $category = get_the_category();
        if ( $category[0] ) : ?>        <!-- なぜこれはdivの外に書くのか、外に書いておくと便利そう、php構文を2文書いてるから？-->
        <div class="entry-label"><a href="<?php echo esc_url ( get_category_link( $category[0]->term_id ) ); ?>"><?php echo $category[0]->cat_name; ?></a></div> 
                                          <!-- esc_urlは無効なurlを生成しないため -->   <!-- get_category_link( $category_id ) が定形分 -->

         <!-- カテゴリーのurlと名前を取得する際、若干取得のコードが異なる(当たり前だけどね) -->
        <?php endif; ?>

            <h1 class="entry-title"><?php the_title(); //タイトルを表示 ?></h1><!-- /entry-title -->

            <!-- entry-meta -->
            <div class="entry-meta">
                <time class="entry-published" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
                <time class="entry-updated" datetime="<?php the_modified_time( 'c' ); ?>">最終更新日 <?php the_modified_time( 'Y/n/j' ); ?></time>
            </div><!-- /entry-meta -->

            <!-- entry-img -->
            <div class="entry-img">
            <?php
            if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'large' ); /* noimageを設定しない場合は、これだけ簡潔で大丈夫 */
            }
            ?>
            </div><!-- /entry-img -->

        </div><!-- /entry-header -->

  <!---- 記事の中身 ---->
       <!-- entry-body -->
        <div class="entry-body">
            <?php
            //本文の表示
            the_content(); ?>
            <?php
            //改ページを有効にするための記述
            wp_link_pages(
            array(
            'before' => '<nav class="entry-links">',
            'after' => '</nav>',
            'link_before' => '',
            'link_after' => '',
            'next_or_number' => 'number',
            'separator' => '',));?>
        </div><!-- /entry-body -->


   <!--- タグ --->
   <?php $post_tags = get_the_tags(); ?>
        <div class="entry-tag-items">
            <div class="entry-tag-head">タグ</div><!-- /entry-tag-head -->
            <?php if ( $post_tags ) : ?>
            <?php foreach ( $post_tags as $tag ) : ?>
             <div class="entry-tag-item"><a href="<?php echo esc_url( get_tag_link($tag->term_id) ); ?>"><?php echo esc_html( $tag->name ); ?></a></div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div><!-- /entry-tag-items -->


        <div class="entry-related">
            <div class="related-title">関連記事</div>

            <div class="related-items">

                <a class="related-item" href="">
                    <div class="related-item-img"><img src="img/entry1.png" alt=""></div><!-- /related-item-img -->
                    <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div><!-- /related-item-title -->
                </a><!-- /related-item -->

                <a class="related-item" href="">
                    <div class="related-item-img"><img src="img/entry1.png" alt=""></div><!-- /related-item-img -->
                    <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div><!-- /related-item-title -->
                </a><!-- /related-item -->

                <a class="related-item" href="">
                    <div class="related-item-img"><img src="img/entry1.png" alt=""></div><!-- /related-item-img -->
                    <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div><!-- /related-item-title -->
                </a><!-- /related-item -->

                <a class="related-item" href="">
                    <div class="related-item-img"><img src="img/entry1.png" alt=""></div><!-- /related-item-img -->
                    <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div><!-- /related-item-title -->
                </a><!-- /related-item -->

                <a class="related-item" href="">
                    <div class="related-item-img"><img src="img/entry1.png" alt=""></div><!-- /related-item-img -->
                    <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div><!-- /related-item-title -->
                </a><!-- /related-item -->

                <a class="related-item" href="">
                    <div class="related-item-img"><img src="img/entry1.png" alt=""></div><!-- /related-item-img -->
                    <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div><!-- /related-item-title -->
                </a><!-- /related-item -->

                <a class="related-item" href="">
                    <div class="related-item-img"><img src="img/entry1.png" alt=""></div><!-- /related-item-img -->
                    <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div><!-- /related-item-title -->
                </a><!-- /related-item -->

                <a class="related-item" href="">
                    <div class="related-item-img"><img src="img/entry1.png" alt=""></div><!-- /related-item-img -->
                    <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div><!-- /related-item-title -->
                </a><!-- /related-item -->

            </div><!-- /related-items -->
        </div><!-- /entry-related -->

        </article> <!-- /entry -->
        
    <?php endwhile; endif;  ?>
                  
			</main><!-- /primary -->

			<?php get_sidebar(); ?>

		</div><!-- /inner -->
	</div><!-- /content -->

    <?php get_footer(); ?>