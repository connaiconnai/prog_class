<?php get_header(); ?>

	<!-- start #page -->
	<div id="page" class="container">	
	
		<div class="row">
		
			<div class="col-lg-12">
		
				<!-- ==============================================
					トップライン
				=============================================== -->
				<div class="row top-line site-width">
						<section>
							<div class="col-lg-6 col-md-6 col-sm-6 t-left">
								<p class="left">東京都 代官山の自然治癒力整体院「リーフ整体院」　代官山駅徒歩5分</p>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 t-right ft-family1">
								<p class="center">TEL:03-1234-5678</p>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 t-center">
								<a class="right">アクセス・ご予約</a>
							</div>
						</section>
				</div><!-- end トップライン -->
				
				<!-- ==============================================
					ヘッダー
				=============================================== -->
				<?php get_template_part( 'content', 'nav' ); ?>
				
				<!-- ==============================================
					コンテンツ
				=============================================== -->
				<div class="row blog top-contents ft-family1 site-width">
					<section>
						<div class="col-lg-12">
						
							<div class="scrollFade title">
								<h1 class="title">Blog</h1>
								<p class="sub-title" >ブログ</p>
							</div>
							
							<div class="row">
							
								<div class="col-lg-9 col-md-9 col-sm-8">
													
										<div>検索結果：<?php the_search_query(); ?></div>
										<?php
											global $query_string;
											query_posts($query_string . "&post_type=post");
										?>
										<?php if (have_posts()) : ?>
								    <?php while (have_posts()) : the_post(); ?>	 <!-- キーワードに合った記事を表示させる処理 -->
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
							　　	<?php endwhile; ?>
										
										<?php else: ?>    <!--  キーワードが見つからないときの処理 -->
										    	<p>キーワードはみつかりません。</p>
										<?php endif; ?>
							
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