		<!-- ==============================================
		FOOTER
		=============================================== -->	
		
		<div class="row footer" id="footer" style="margin:0;">
				<footer>
					<div class="row">
						<div class="col-12">
							<div class="logo">
								<a href="<?php echo home_url(); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/images/S__28491778.png" alt="コネコネ">
								</a>
							</div>
							<div class="col-12">
								<p>Copyright &copy; connai connai All Rights Reserved.</p>
							</div>
						</div>
					</div>
				</footer>
		</div><!-- end .row -->
		
		<a id="pageTop" href="#page">ページの先頭へ</a>

		<!-- ==============================================
		JavaScript
		=============================================== -->	
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		
		<!-- jqueryが読み込まれなかった場合にファイルから読み込む -->
		<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/bs/js/libs/jquery-1.8.2.min.js">\x3C/script>')</script>
		
		<!-- BootStrap読込み -->
		<script src="<?php echo get_template_directory_uri(); ?>/bs/js/libs/bootstrap.min.js"></script>
		
		
		<!-- フッターをウィンドウ下部へ固定するjsを読込み -->
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/footerFixed.js"></script>
		
		<!-- 画像スライダー -->
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider-min.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		
				<!-- パララックス -->
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/parallax.js"></script>
		
		<!-- スライドナビ -->
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/side-nav.js"></script>
		
		
		<!-- スクロール表示 -->

		
		<!--  スライドメニュー  -->

		
		<!-- スライダーはフッター側に記述しないと変な挙動をする -->

<script>
$(function(){$(".hamburger").click(function(){$(this).toggleClass("active");if($(this).hasClass("active")){$(".globalMenuSp").addClass("active")}else{$(".globalMenuSp").removeClass("active")}})});
</script>
		<script type="text/javascript">
			//document.radyにしないと画像が一瞬全部表示されてしまう
		jQuery(document).ready(function() {

			//スライダー
				$('.slick').slick({
					autoplay: true,
					autoplaySpeed: 2000,
					speed: 8000, 
					fade:true,
					infinite: true  
				});
				//スマホ用スライドメニュー
				$("#menu-toggle").click(function(){
			    $("#top-menu").slideToggle();
			  });
			
				//画像スライダー
			  //$('.flexslider').flexslider();
			  
			  //スクロール表示
			  //$( '.scrollFade' ).scrollFade();		  
			  
			  //ページトップへ戻る
			  var topBtn = $('#pageTop');
				topBtn.hide();
				$(window).scroll(function () {
					if ($(this).scrollTop() > 100) {
						topBtn.fadeIn();
					} else {
						topBtn.fadeOut();
					}
				});
				$('#pageTop').click(function () {
					$('body, html').animate({ scrollTop: 0 }, 500); //0.5秒かけてトップへ戻る
					return false;
				});
		});
		</script>
		
	</body>
	
</html>
