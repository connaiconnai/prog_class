<?php
/*
Template Name: labor-regulations　〜トップページ〜
*/
get_header(); ?>

<?php $post_id = $post->ID; ?>
<link href="<?php echo get_template_directory_uri(); ?>/css/support.css" rel="stylesheet" />
<script>
$(function(){$(".hamburger").click(function(){$(this).toggleClass("active");if($(this).hasClass("active")){$(".globalMenuSp").addClass("active")}else{$(".globalMenuSp").removeClass("active")}})});
</script>

	<!-- start #support -->
	<div id="support" class="container-fluid">	
	
		<div class="row">
			<div class="col-lg-12">
					<div class="title">
						<div class="outline">
							<div class="bg-img">
								<div class="bg-white">
									<h1>起業支援について</h1>
								</div>
							</div>
						</div>
					</div>
			</div><!-- col-12 -->
		</div><!-- /row -->
		<div class="row">
			<div class="col-12">
				<div class="nayami">
					<div class="nayami-title origin-button">
						ワンストップサービス起業支援
					</div>
					<div class="pc-flex">
						<div class="img">
							<img src="<?php echo get_template_directory_uri(); ?>/images/img/img_04.jpg" alt="ワンストップサービス起業支援">
						</div>
						<div class="text">
							<h3>
								税理士、社会保険労務士、司法書士、行政書士などの<br>
								士業がワンストップで起業支援を行います。<br>
								<br>
								具体的には、法人設立や開業時に必要な許認可、<br>
								定款認証、登記、税務、年金・社会保険、<br>
								入国管理等の各種手続にスピーディーに対応します。<br>
								開業前のご相談から開業後の各種支援まで<br>
								ワンストップでサポートいたします。
							</h3>
						</div><!-- /text -->
					</div><!-- /pc-flex -->
				</div><!-- /nayami -->
			</div><!-- col-12 -->
		</div><!-- /row -->
		<div class="row">
			<div class="col-12">
				<div class="attention">
					<h3>随時、相談会やセミナーを開催しておりますのでお気軽にお問合せください</h3>
				</div>
			</div>
		</div><!-- /row -->
		<div class="row">
			<div class="col-12">
				<div class="contact">
					<div class="sec-title">
						<h1>お問い合わせは</h1>
					</div>
					<div class="pc-flex">
						<div class="number">
							<a href="tel:093-612-7750">
								<h1>TEL 093-612-7750</h1>
							</a>
							<a href="fax:093-612-7751">
								<h1>FAX 093-612-7751</h1>
							</a>
						</div>
						<div class="form">
							<a href="<?php echo home_url('contact'); ?>">
								<button class="origin-button">お問い合わせフォーム ▶</button>
							</a>
						</div>
					</div><!-- /pc-flex -->
				</div><!-- contact -->
			</div><!-- /col-12 -->
		</div><!-- /row -->

	</div><!-- end #support -->
	
	

<?php get_footer(); ?>
