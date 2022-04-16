<?php
/*
Template Name: 2colum(4×8) 
*/
get_header(); ?>

<?php $post_id = $post->ID; ?>

<div class="stripe">
</div>
<div class="site-title">
<?php echo bloginfo('name'); ?>
</div>

	<!-- start #page -->
	<div id="page" class="container 2colum-container">	
	
		<div class="row">
		
			<div class="col-lg-12">
				
				
				<!-- ==============================================
					ヘッダー
				=============================================== -->
				<?php get_template_part( 'content', 'nav' ); ?>
				
				<!-- ==============================================
					コンテンツ
				=============================================== -->
				<div class="row">
					<div class="scrollFade page-title col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h1 class="title"><?php echo get_the_title(); ?></h1>
					</div>
				</div>
				
				<div class="row top-contents ft-family1 site-width">
					<section>
						<div class="col-lg-12">
							
							<div class="row scrollFade">
							
								<div class="col-lg-4 col-md-4 col-sm-5" id="left-colum">
									<?php
								  		for($i = 1; $i <= 5; $i++){
								  			$img = get_post_meta($post_id,'top_baner'.$i,true);
												if(!empty($img)) {
										?>
							      	<img src="<?php echo $img; ?>" class="img-responsive radius">
									 <?php } }?>
								</div>
							
								<div class="col-lg-8 col-md-8 col-sm-7">
									<section id="post-contents">
									
										<?php if (have_posts()) : // WordPress ループ
										while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
										<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<?php the_content(); ?>
										</div>
										<?php endwhile; // 繰り返し処理終了
										else : // ここから記事が見つからなかった場合の処理 ?>
										<div class="post">
										<h2>記事はありません</h2>
										<p>お探しの記事は見つかりませんでした。</p>
										</div>
										<?php endif; // WordPress ループ終了 ?>

									</section>
								</div><!-- end .col -->
																				
							</div><!-- end .row -->	
							
						</div><!-- end .col -->
					</section>
				</div><!-- end .row -->
			
			</div><!-- .col -->
		
		</div><!-- .row -->
		
	</div><!-- end #page -->

<?php get_footer(); ?>