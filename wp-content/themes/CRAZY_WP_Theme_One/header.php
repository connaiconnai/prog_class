<?php 
//以下は<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />の記述の代わり
if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
    header('X-UA-Compatible: IE=edge,chrome=1');
?>
<!DOCTYPE html>
	<head>	
	
	<!-- ==============================================
	　 サイトタイトル
	=============================================== -->
	<title><?php wp_title('|', true, 'right'); bloginfo('name');?></title>
	
	<!-- ==============================================
		metaタグ
	=============================================== -->
	
	<!-- パフォーマンスのために使用する文字のエンコーディングを記述 -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	
	<!-- IE8+に対して「IE=edge」と指定することで、利用できる最も互換性の高い最新のエンジンを使用するよう指示できる -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<!-- モバイル端末への対応、ページをビューポートの幅に合わせてレンダリング（Android, iOS6以降）。ズームを許可しない設定「user-scalable=no」は加えない方がよい -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- content属性にページの紹介文を記述-->
	<meta name="description" content="">
	 
	<!-- content属性にページの著者情報を記述 -->
	<meta name="author" content="">
	
	<!-- iOSなどスマホで電話番号を自動で電話リンクへ書き換えるのを防ぐ -->
	<meta name="format-detection" content="telephone=no">
	
	<!-- ==============================================
	　CSS
	=============================================== -->	
	<link href="<?php echo get_template_directory_uri(); ?>/bs/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="<?php echo get_template_directory_uri(); ?>/bs/css/font-awesom.css" rel="stylesheet" media="screen">
	<link href="<?php echo get_template_directory_uri(); ?>/css/custom.css" rel="stylesheet" media="screen">
	<!-- フォントアイコン -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet" media="screen">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	
	<!-- 画像スライダー -->
	
	<!-- スライドメニュー -->
	<link href="<?php echo get_template_directory_uri(); ?>/js/jquery.sidr.light.css" rel="stylesheet" />
		

	<!-- wordpressスタイルシート -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	
	<!-- IE8以下用に2つのスクリプトを記述
     html5shiv.js: IE8以下にHTML5の要素を認識するようにさせる
     respond.js: IE8以下にMedia Queriesの代替え機能を提供 -->
	<!--[if lt IE 9]>
	<script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<!-- ==============================================
	　Favicons
	=============================================== -->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/bs/assets/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/bs/assets/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/bs/assets/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/bs/assets/apple-touch-icon-114x114.png">
		
	
	<!-- ==============================================
	　Fonts
	=============================================== -->
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>
	
	<!-- ==============================================
	　JavaScript
	=============================================== -->
	
	
	<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php

	//固定ページhomeのカスタムフィールドより入力されたTELを他ページでも使用可能にする
	global $shop_tel;
	$get_page_id = get_page_by_path("home");
	$get_page_id = $get_page_id->ID;
	$shop_tel =  get_post_meta($get_page_id,'tel' ,true); 
	
?>
<div class="container-fluid">
		<div class="row">
		
			<div class="col-lg-12">

				<header>
					<div class="flex">
						<div class="text">
							<div class="logo">
								<a href="<?php echo home_url(); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/images/S__28491778.png" alt="コネコネ">
								</a>
							</div>
						</div><!-- /text -->
						<div class="button-menu">
							<div class="pc">
								<div class="to-contact">
									<a href="<?php echo home_url('contact'); ?>">
											<button class="contact origin-button">お問い合わせフォーム ▶</button>
										</a>
								</div>
							</div><!-- /pc -->
							<div class="sp">
								<div class="menu">
<!--
    <div class="hamburger-menu">
        <input type="checkbox" id="menu-btn-check">
				<label for="menu-btn-check" class="menu-btn"><span></span></label>
        <div class="menu-content">
            <ul>
							<li><a href="<?php echo home_url(); ?>">ホーム</a></li>
							<li><a href="<?php echo home_url('greeting') ?>">代表挨拶</a></li>
							<li><a href="<?php echo home_url('labor-regulations'); ?>">就業規則　</a></li>
							<li><a href="<?php echo home_url('subsidy'); ?>">助成金</a></li>
							<li><a href="<?php echo home_url('corporate-support'); ?>">起業支援</a></li>
							<li><a href="<?php echo home_url('contact'); ?>">お問い合わせ</a></li>
            </ul>
        </div>
    </div>
-->
								</div><!-- menu -->
							</div><!-- /sp -->
						</div><!-- /button-menu -->
					</div><!-- /flex -->
				</header>

				<!-- ==============================================
					navバー
				=============================================== -->				
				<div class="pc">
					<?php get_template_part( 'content', 'nav' ); ?>
				</div>

			</div><!-- .col -->
		</div>
</div>
