<?php
/*
Template Name: Contact 〜 お問合せ 〜
*/
get_header(); ?>

<link href="<?php echo get_template_directory_uri(); ?>/css/contact.css" rel="stylesheet" />

<div class="site-title">
<?php // echo bloginfo('name'); ?>
</div>

	<!-- start #contact -->
	<div id="contact" class="container">	
	
		<div class="row">
			<div class="col-12">
				<h2>ご依頼や資料請求は、<span class="sp"><br></span>お気軽にお問い合わせください。</h2>
			</div>

			<div class="col-12">

				
				<div class="row news top-contents ft-family1 site-width">

					<section id="post-contents">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
							<?php
								/* $post_id = 50; */
								/* $post = get_post($post_id); */
								/* $form =  apply_filters('the_content',$post->post_content); */
								echo do_shortcode('[contact-form-7 id="50" title="問い合わせ用"]');
							?>
							
						</div>
					</section>
				</div><!-- end .row -->
			</div><!-- .col -->
		</div><!-- .row -->


		<div class="row">
			<div class="col-12">
				<div class="pc-flex">
					<div class="txt">
						<a href="tel:093-612-7750">
							<h3>TEL 093-612-7750</h3>
						</a>
						<a href="fax:093-632-6045">
							<h3>FAX 093-612-7751</h3>
						</a>
						<h2>組合所在地</h2>
						<p>福岡県北九州市八幡西区里中2-12-17</p>
					</div>
					<div class="map" id="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3313.8181198071197!2d130.73653671594047!3d33.84280083618421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3543cec6df79fe0f%3A0x334224ed0897972c!2z44CSODA3LTA4NDYg56aP5bKh55yM5YyX5Lmd5bee5biC5YWr5bmh6KW_5Yy66YeM5Lit77yS5LiB55uu77yR77yS4oiS77yR77yX!5e0!3m2!1sja!2sjp!4v1640399293785!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>
			</div><!-- col-12 -->
		</div><!-- row -->
	</div><!-- end #page -->

<?php get_footer(); ?>
