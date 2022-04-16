<?php
/*
Template Name: Q&A 〜 よくある質問 〜
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
					トップライン
				=============================================== -->
				<?php get_template_part( 'content', 'topline' ); ?>
				
				<!-- ==============================================
					ヘッダー
				=============================================== -->
				<?php get_template_part( 'content', 'nav' ); ?>
				
				<!-- ==============================================
					コンテンツ
				=============================================== -->
				<div class="row qa top-contents ft-family1 site-width">
					<section>
						<div class="col-lg-12">
						
							<h1 style="text-align:center;">404 NOT FONUND</h1>
							<h2 style="text-align:center;">お探しのページは見つかりませんでした。</h2>
							
						</div><!-- end .col -->
					</section>
				</div><!-- end .row -->
			
			</div><!-- .col -->
		
		</div><!-- .row -->
		
	</div><!-- end #page -->

<?php get_footer(); ?>