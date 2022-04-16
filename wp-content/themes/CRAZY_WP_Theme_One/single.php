<?php get_header(); ?>
<div class="stripe">
</div>
<div class="site-title">
<?php echo bloginfo('name'); ?>
</div>

	<!-- start #page -->
	<div id="page" class="container">	
		<link href="<?php echo get_template_directory_uri(); ?>/css/single.css" rel="stylesheet" />
	
		<div class="row">
		
			<div class="col-lg-12">
		
				
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
							
								<div class="col-lg-9 col-md-9 col-sm-8">
									
										 
									  	<?php if(has_post_thumbnail()) { echo the_post_thumbnail(); } ?>

									  	
									  <div class="post-content">
									  	<?php the_content(); ?>
										</div><!-- .post-content -->
									</section>
                       
                  <?php endwhile; ?>
                      
                  <div class="nav-below">
                    <span class="nav-previous"><?php previous_post_link('%link', '古い記事へ'); ?></span>
                    <span class="nav-next"><?php next_post_link('%link', '新しい記事へ'); ?></span>
                   </div><!-- /.nav-below -->

<!-- Commetns -->                       
                   <?php // comments_template(); ?>
                   
                  <?php else : ?>
                   
                      <h2 class="title">記事が見つかりませんでした。</h2>
                      <p>検索で見つかるかもしれません。</p><br />
                      <?php get_search_form(); ?>
                   
                  <?php endif; ?>							
									
								</div><!--end .col-->
					
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
