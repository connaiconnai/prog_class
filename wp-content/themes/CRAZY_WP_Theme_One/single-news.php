<?php get_header(); ?>
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
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2 ">
							
							<div class="row">
							
								<!-- メインコンテンツ -->
								<div class="col-lg-12">
								
									<!-- ループ開始 -->
									<?php if (have_posts()) : ?>
							    <?php while (have_posts()) : the_post();?>
								    
						        <section id="post-contents">
											<div class="post-title">		
												<h3 style="font-size:0.8em;"><?php the_author_nickname(); ?>　<?php the_time("Y年m月j日"); ?></h3>	
											</div><!--post-title-->
										  	
										  <div class="post-content">
										  	<?php the_content(); ?>
											</div><!-- .post-content -->
											
										</section>

							
								    <?php endwhile; ?>
										<?php else : ?>
							
						        <h3>記事がありません</h3>
						        <p>表示する記事はありませんでした。</p>
									
									<?php endif; ?><!-- ループ終了 -->
																		
								</div><!--end .col-->
																				
							</div><!-- end .row -->	
							
						</div><!-- end .col -->
					</section>
				</div><!-- end コンテンツ -->
			
			</div><!-- .col -->
		
		</div><!-- .row -->
		
	</div><!-- end #page -->

<?php get_footer(); ?>