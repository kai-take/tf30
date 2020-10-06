<?php get_header(); ?>
<!-- ヘッダー取得 -->

<!-- content -->
<div id="content">
    <div class="inner">


        <!-- primary -->
        <main id="primary">

            <?php if (function_exists('bcn_display')) : ?>
                <!-- 'bcn_display'が定義されているか確認のための関数 -->
                <!-- breadcrumb -->
                <div class="breadcrumb">
                    <?php bcn_display(); //BreadcrumbNavXTのパンくずを表示するための記述 
                    ?>
                </div><!-- /breadcrumb -->
            <?php endif; ?>


            <!-- 以下を動的に -->

            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
            ?>

                    <!-- entry -->
                    <article class="entry">

                        <!-- entry-header -->
                        <div class="entry-header">

                            <!-- カテゴリー1つ目の名前を表示 -->
                            <div class="entry-label"><?php my_the_post_category(true); ?></div><!-- /entry-item-tag -->

                            <!-- タイトルを表示 -->
                            <h1 class="entry-title"><?php the_title(); ?></h1><!-- /entry-title -->

                            <!-- entry-meta -->
                            <div class="entry-meta">
                                <time class="entry-published" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
                                <time class="entry-updated" datetime="<?php the_modified_time('c'); ?>">最終更新日 <?php the_modified_time('Y/n/j'); ?></time>
                            </div><!-- /entry-meta -->

                            <!-- entry-img -->
                            <div class="entry-img">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('large'); /* noimageを設定しない場合は、これだけ簡潔で大丈夫 */
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
                                    'separator' => '',
                                )
                            ); ?>
                        </div><!-- /entry-body -->


                        <!--- タグ --->
                        <!-- entry-tag-items -->
                        <div class="entry-tag-items">
                            <div class="entry-tag-head">タグ</div><!-- /entry-tag-head -->
                            <?php my_get_post_tags(); ?>
                        </div><!-- /entry-tag-items -->


                        <!-- entry-related -->
                        <div class="entry-related">
                            <div class="related-title">関連記事</div>

                            <!-- 現在表示している記事の持っている全カテゴリーを取得 -->

                            <?php if (has_category()) { // カテゴリーを持っているかの判定
                                $post_cats = get_the_category(); // 現在表示している投稿が持つ全カテゴリーを配列として一括取得
                                $cat_ids = array(); // 配列が代入されるよっていう宣言？
                                //所属カテゴリーのIDリストを作っておく
                                foreach ($post_cats as $cat)/* 配列を一つずつ取り出し、要素に格納しながら、以下の処理を実行 */ {
                                    $cat_ids[] = $cat->term_id; // cat_idsには配列としてカテゴリーのターム情報を一つ一つ入れる
                                }
                            }

                            // 条件設定、WP_Queryにパラメーターを渡す
                            $myposts = get_posts(array( // 取得する投稿の条件設定
                                'post_type' => 'post', // 投稿タイプ
                                'posts_per_page' => '8', // ８件を取得, 表示では無く取得である事に注意
                                'post__not_in' => array($post->ID), // 表示中の投稿を除外
                                'category__in' => $cat_ids, // この投稿と同じカテゴリーに属する投稿の中から
                                'orderby' => 'rand' // ランダムに
                            ));
                            if ($myposts) : ?>

                                <div class="related-items">
                                    <?php foreach ($myposts as $post) : setup_postdata($post); ?>
                                        <!-- mypostsには8件のデータが格納されてる、それを一つずつ$postに格納 -->
                                        <a class="related-item" href="<?php the_permalink(); ?>">
                                            <div class="related-item-img">
                                                <?php
                                                if (has_post_thumbnail()) {
                                                    // アイキャッチ画像が設定されてればミディアムサイズで表示
                                                    the_post_thumbnail('medium');
                                                } else {
                                                    // なければnoimage画像をデフォルトで表示
                                                    echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
                                                }
                                                ?>
                                            </div>
                                            <div class="related-item-title"><?php the_title(); ?></div><!-- /related-item-title -->
                                        </a><!-- /related-item -->
                                    <?php endforeach;
                                    wp_reset_postdata(); ?>
                                </div><!-- /related-items -->

                            <?php endif; ?>
                        </div><!-- /entry-related -->

                    </article> <!-- /entry -->

            <?php endwhile;
            endif;  ?>

        </main><!-- /primary -->

        <?php get_sidebar(); ?>

    </div><!-- /inner -->
</div><!-- /content -->

<?php get_footer(); ?>