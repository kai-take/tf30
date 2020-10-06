<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">

	<title>TF-30</title>
	<meta name="description" content="">

	<meta property="og:title" content="TF-30">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://example.com/">
	<meta property="og:image" content="https://example.com/img/ogp.png">
	<meta property="og:site_name" content="TF-30">
	<meta property="og:description" content="">
	<meta name="twitter:card" content="summary_large_image">

    <?php wp_head(); ?> <!-- headの直前に入れる。これでhead内に必要な情報を出力する。 --> 
	<link rel="icon" href="./img/icon-home.png">

</head>

<body>

	<!-- header -->
	<header id="header">
		<div class="inner">


<!--<h1 class="header-logo"><a href="/">blog title</a></h1>
<div class="header-sub">サブタイトルが入りますサブタイトルが入ります</div>ここを動的に置き換える-->


<!-- 動的ロゴ --><!--  -->

	<?php if (is_home() || is_front_page() ) : // トップページではロゴをh1に、「||」は条件のどちらか一方（もしくは両方）を満たしたときに表示するという意味 ?>
	<h1 class="header-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1> <!-- 管理画面の一般設定に設定されたサイトタイトルを表示 -->
	<?php else : // それ以外のページではdivに ?>
	<div class="header-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></div>
	<?php endif; ?>

	<div class="header-sub"><?php bloginfo('description'); //ブログのdescriptionを表示 ?></div><!-- /header-sub -->

<!-- /動的ロゴ -->

    <!-- 動的ドロワー -->
	    	<!-- drawer -->
			<div class="drawer">
				<div class="drawer-icon">
					<span class="drawer-open"><i class="fas fa-bars"></i></span><!-- /drawer-open -->
					<span class="drawer-close"><i class="fas fa-times"></i></span><!-- drawer-close -->
				</div><!-- /drawer-icon -->

				   <!-- ドロワーの中身 -->
						<!-- drawer-content -->
						<div class="drawer-content">
						<?php // 以下の記述でHTMLを生成する
						//.drawer-navを置き換えて、スマホ用メニューを動的に表示する
						wp_nav_menu(
						array(
						'depth' => 1, //メニュー階層を指定、※0の場合は全階層
						'theme_location' => 'drawer', // functions.phpで設定した値を指定し、動的化
						'container' => 'nav', // コンテナの要素を指定、ここではnavで囲ったメニューを作る事を宣言、あくまで元々作った静的なモノを引き継ぐ
						'container_class' => 'drawer-nav', //コンテナにclassを付与
						'menu_class' => 'drawer-list', // メニュー(li要素)にclassを付与
						)
						);
						?>
						</div><!-- /drawer-content -->
				</div><!-- /drawer -->
		</div><!-- /inner -->
	</header><!-- /header -->


<!-- 動的ヘッダーメニュー-->

	<!-- header-nav -->
	<nav class="header-nav">
	<div class="inner">
	<?php
	wp_nav_menu(
	// .header-listを置き換えて、PC用メニューを動的に表示する
	array(
	'depth' => 1,
	'theme_location' => 'global', // グローバルメニューをここに表示すると指定
	'container' => 'false', // navで既に囲ってるため不要、だからfalse
	'menu_class' => 'header-list',
	)
	);
	?>
	</div><!-- /inner -->
	</nav><!-- header-nav -->