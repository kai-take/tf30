
<?php
/**
* テーマのセットアップ
* 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support#HTML5
**/
function my_setup()
{
add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
add_theme_support('title-tag'); // タイトルタグ自動生成
add_theme_support(
'html5',
array( //HTML5でマークアップ
'search-form',
'comment-form',
'comment-list',
'gallery',
'caption',
)
);
}

add_action('after_setup_theme', 'my_setup');
// セットアップの書き方の型
// function custom_theme_setup() {
// add_theme_support( $feature, $arguments );
// }
// add_action( 'after_setup_theme', 'custom_theme_setup' );




/**
* CSSとJavaScriptの読み込み
*
* @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
*/
function my_script_init()
{
wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array(), '5.8.2', 'all');
wp_enqueue_style('my', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all');
wp_enqueue_script('my', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.0', true);  /* scriptである事に注意 */
if( is_single() )/* 投稿ページであるか確認する条件分岐式 */{
    wp_enqueue_script('sns', get_template_directory_uri() . '/js/sns.js', array( 'jquery' ), '1.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'my_script_init');



/**
* メニューの登録
*
* 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
*/
function my_menu_init()
{
register_nav_menus(
array(
'global' => 'ヘッダーメニュー',
'drawer' => 'ドロワーメニュー',
'footer' => 'フッターメニュー',
)
);
}
add_action('init', 'my_menu_init');



/**
* アーカイブタイトル書き換え
*
* @param string $title 書き換え前のタイトル.
* @return string $title 書き換え後のタイトル.
*/
function my_archive_title( $title ) {

    if ( is_category() ) { // カテゴリーアーカイブの場合
    $title = '' . single_cat_title( '', false ) . '';
    } elseif ( is_tag() ) { // タグアーカイブの場合
    $title = '' . single_tag_title( '', false ) . '';
    } elseif ( is_post_type_archive() ) { // 投稿タイプのアーカイブの場合
    $title = '' . post_type_archive_title( '', false ) . '';
    } elseif ( is_tax() ) { // タームアーカイブの場合
    $title = '' . single_term_title( '', false );
    } elseif ( is_author() ) { // 作者アーカイブの場合
    $title = '' . get_the_author() . '';
    } elseif ( is_date() ) { // 日付アーカイブの場合
    $title = '';
    if ( get_query_var( 'year' ) ) {
    $title .= get_query_var( 'year' ) . '年';
    }
    if ( get_query_var( 'monthnum' ) ) {
    $title .= get_query_var( 'monthnum' ) . '月';
    }
    if ( get_query_var( 'day' ) ) {
    $title .= get_query_var( 'day' ) . '日';
    }
    }
    return $title;
    };
    add_filter( 'get_the_archive_title', 'my_archive_title' );


/**
* カテゴリーを1つだけ表示
*
* @param boolean $anchor aタグで出力するかどうか.
* @param integer $id 投稿id.
* @return void
*/

    function my_the_post_category( $anchor = true, $id = 0 ) {
        global $post; // グローバル変数として定義

        //ここはあまり理解していない、結局、投稿idを取得するということ？
        //引数が渡されなければ投稿IDを見るように設定
        if ( 0 === $id ) {
        $id = $post->ID;
        }

        //カテゴリー一覧を取得
        $this_categories = get_the_category( $id );
        if ( $this_categories[0] ) {
        if ( $anchor ) { //引数がtrueならリンク付きで出力
        echo '<a href="' . esc_url( get_category_link( $this_categories[0]->term_id ) ) . '">' . esc_html( $this_categories[0]->cat_name ) . '</a>';
        } else { //引数がfalseならカテゴリー名のみ出力
        echo esc_html( $this_categories[0]->cat_name );
        }
        }
    }




/**
* タグ取得
*
* @param integer $id 投稿id.
* @return void
*/
    function my_get_post_tags( $id = 0 ) { // $idに0を代入
        global $post;

        //引数が渡されなければ投稿IDを見るように設定
        if ( 0 === $id ) {
        $id = $post->ID; // その投稿のidを取得
        }

        //タグ一覧を取得
        $tags = get_the_tags( $id ); // 引数に投稿idを指定して、他の場所でも使える様にする
        
        if ( $tags ) { // このif文は、直前で定義した変数が入る
        foreach( $tags as $tag ){ // 取得したタグを一つ一つ出力
        echo '<div class="entry-tag-item"><a href="'. esc_url( get_tag_link($tag->term_id) ) .'">'. esc_html( $tag->name ) .'</a></div><!-- /entry-tag-item -->';
        }
        }
     }
    