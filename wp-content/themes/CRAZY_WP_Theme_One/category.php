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
						<h1 class="title">ブログ（カテゴリー別）</h1>
					</div>
				</div>
				
				<div class="row blog top-contents ft-family1 site-width">
					<section>
						<div class="col-lg-12">
							
							<div class="row">
							
								<div class="col-lg-9 col-md-9 col-sm-8">
													
										<?php if(have_posts()):?>
										<?php while(have_posts()):the_post();?>
										<section id="post-contents" class="scrollFade">
											<div class="post-title">		
												<h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
												<h3 style="font-size:0.8em;"><?php the_author_nickname(); ?>　<?php the_time("Y年m月j日"); ?>　<?php single_cat_title('カテゴリー： ');?></h3>	
											</div><!--post-title-->
												
											<div class="post-content">
												<?php the_content();?>
												<div class="social" style="text-align:right;">
													<a href="<?php the_permalink();?>">コメント<span class="label label-default" style="margin-left:5px;"><?php echo get_comments_number(); ?></span></a>
												</div>
											</div><!--post-contetn-->
										</section>
										<?php endwhile; //end wile have_post?>
										
										<?php endif; //end have_post?>						
										
										<?php if (function_exists("pagination")) pagination($additional_loop->max_num_pages); ?>
							
								</div><!-- end .col -->
								
								<div class="col-lg-3 col-md-3 col-sm-4">
									<?php include(TEMPLATEPATH . '/sidebar.php'); ?>
								</div>
																				
							</div><!-- end .row -->	
							
						</div><!-- end .col -->
					</section>
				</div><!-- end コンテンツ -->
			
			</div><!-- .col -->
		
		</div><!-- .row -->
		
	</div><!-- end #page -->

<?php get_footer(); ?>