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

        <!-- カテゴリー1つ目の名前を表示 --> 
        <div class="entry-label"><?php my_the_post_category( true ); ?></div><!-- /entry-item-tag -->

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



        </article> <!-- /entry -->
        
    <?php endwhile; endif;  ?>
                  
			</main><!-- /primary -->


		</div><!-- /inner -->
	</div><!-- /content -->

    <?php get_footer(); ?>