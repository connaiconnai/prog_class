<?php
/*
Template Name: News 〜 お知らせ 〜
*/
get_header(); ?>
<div class="stripe">
</div>
<div class="site-title">
<?php echo bloginfo('name'); ?>
</div>

	<!-- start #page -->
	<div id="page" class="container">	
	
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
				
				<div class="row blog top-contents ft-family1 site-width">
					<section>
						<div class="col-lg-12">
							
							<div class="row">
							
								<div class="col-lg-12">
									<?php
									$args = array(
									     'post_type' => 'news', /* 投稿タイプを指定 */
									     'paged' => $paged,
									); ?>
									<?php query_posts( $args ); ?>
									<?php if (have_posts()) : ?>
									    <?php while (have_posts()) : the_post(); 
									    /* ループ開始 */ ?>
									    
									    <section id="post-contents" class="scrollFade">
												<div class="post-title">		
													<h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
													<h3 style="font-size:0.8em;"><?php the_author_nickname(); ?>　<?php the_time("Y年m月j日"); ?></h3>	
												</div><!--post-title-->
													
												<div class="post-content">
													<?php the_content();?>
												</div><!--post-contetn-->
											</section>
									    
									    <?php endwhile; ?>     
									<?php else : ?>
									    <div class="post">
									        <h3>記事がありません</h3>
									        <p>表示する記事はありませんでした。</p>
									    </div>
									<?php endif; ?>				
									
									<?php if (function_exists("pagination")) pagination($additional_loop->max_num_pages); ?>
							
								</div><!-- end .col -->
																				
							</div><!-- end .row -->	
							
						</div><!-- end .col -->
					</section>
				</div><!-- end コンテンツ -->
			
			</div><!-- .col -->
		
		</div><!-- .row -->
		
	</div><!-- end #page -->

<?php get_footer(); ?>