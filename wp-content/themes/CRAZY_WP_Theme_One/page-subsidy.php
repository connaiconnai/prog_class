<?php
/*
Template Name: subsidy　〜トップページ〜
*/
get_header(); ?>

<?php $post_id = $post->ID; ?>
<link href="<?php echo get_template_directory_uri(); ?>/css/subsidy.css" rel="stylesheet" />
<script>
$(function(){$(".hamburger").click(function(){$(this).toggleClass("active");if($(this).hasClass("active")){$(".globalMenuSp").addClass("active")}else{$(".globalMenuSp").removeClass("active")}})});
</script>

	<!-- start #subsidy -->
	<div id="subsidy" class="container-fluid">	
	
		<div class="row">
			<div class="col-lg-12">
					<div class="title">
						<div class="outline">
							<div class="bg-img">
								<div class="bg-white">
									<h1>助成金について</h1>
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
						こんなお悩みありませんか？
					</div>
					<ul>
						<li>・助成金の種類が多く、どの助成金が自社に合致するか分からない。</li>
						<li>・新設の助成金情報が伝わらず、あまり知られていない。
</li>
						<li>・要件が追加・変更されるなど制度変更が頻繁に行なわれ、利用しにくい。
</li>
						<li>・申請手続が煩雑で手間も掛かるため、人手を割けず社内で手続をする人がいない。</li>
					</ul>
				</div><!-- /nayami -->
			</div><!-- col-12 -->
		</div><!-- /row -->
		<div class="row">
			<div class="col-12">
				<div class="about">
					<div class="what">
						<h2 class="blue"> 助成金とは</h2>
						<div class="pc-flex">
							<div class="img">
								<img src="<?php echo get_template_directory_uri(); ?>/images/img/img_05.jpg" alt="助成金とは">
							</div>
							<div class="txt">
								<p>
								 一般的に厚生労働省所管で取扱っている支援金のことを助成金と呼んでいます。<br>
								厚生労働省で取扱っている支援金は条件さえ満たせばどんな会社様や個人事業主様でも貰うことができ、返済する必要はありません。<br>
								国から支援を受けられるものには、助成金の他に、補助金や公的融資と呼ばれるものがあります。助成金と補助金や公的融資の違いは、補助金は主に経済産業省が所管しており、研究開発やIT企業など特殊で専門的な分野を対象としています。補助金は公募制が多く審査が行われますので、条件を満たせば誰でも貰えるものではありません。審査を通過すると返済不要で国から支給されます。公的融資は国民生活金融公庫などの返済が必要な支援金になります。その他、民間団体が運営している支援金や地方公共団体が運営している支援金もあります。雇用関連の助成金は、「新たな人材育成制度を導入した場合」「パートタイマーの待遇改善措置を講じた場合」「期間契約社員を正社員に切り替えた場合」等、雇用の促進や雇用管理の改善、能力開発などの人的な意義ある活動をしている企業や事業主が申請した場合に支給されます。つまり中小企業の健全な発展を目的に創設されたものです。しかしながら、雇用関連の助成金は十分に活用されていません。
								</p>
							</div><!-- /txt -->
						</div><!-- /pc-flex -->
					</div><!-- /what -->
				</div><!-- /about -->
			</div><!-- col-12 -->
			<div class="col-12 sec">
				<div class="sec-title">
					<h2>申請の際のポイント</h2>
					<div class="sec-title-under"></div>
				</div>
			</div>
		</div><!-- /row -->
		<div class="row">
			<div class="col-12">
					<div class="txt1 pc-flex">
						<div class="column">
							<div class="col-title">
								<h2>①雇用保険への加入</h2>
							</div>
							<div class="col-txt">
								<p>
									雇用関連助成金の財源は雇用保険料です。<br>
									多くの助成金は雇用保険に加入していることが条件になります。<br>
									又、労働保険料の滞納や労働保険料を納入していない会社や<br>
									事業主は、支給を受けられないことがあります。
								</p>
							</div>
						</div>
						<div class="column">
							<div class="col-title">
								<h2>②出勤簿・賃金台帳などが必要</h2>
							</div>
							<div class="col-txt">
								<p>
									助成金の支給申請において出勤簿や賃金台帳、就業規則などの<br>
									提出を求められる場合があります。労働者名簿も必要です。<br>
									これらの帳簿を作成していない、又、整備していなかった<br>
									ために、助成金の申請期限に間に合わず、受給できなかったと<br>
									いうことにもなりかねません。
								</p>
							</div>
						</div>
					</div><!-- /txt1 -->
					<div class="txt2 pc-flex">
						<div class="column">
							<div class="col-title">
									<h2>③会社都合による解雇は要注意</h2>
							</div>
							<div class="col-txt">
								<p>
									雇用関連助成金の目的の1つは、労働者の雇用促進や<br>
									雇用維持にあります。過去に解雇等事業主都合による<br>
									離職者が生じた場合は受給できない場合があります。
								</p>
							</div><!-- /col-txt -->
						</div><!-- /column -->
						<div class="column">
							<div class="col-title">
									<h2>④期限後申請は受付けない</h2>
							</div>
							<div class="col-txt">
								<p>
									多くの助成金は申請期限が厳密に定められており、<br>
									期限後申請は受付けません。初回の手続きから最後の申請まで<br>
									長い期間を要する場合がありますので、タイミングを逃さないように、<br>
									しっかりとしたスケジュール管理を行なう必要があります。
								</p>
							</div><!-- /col-txt -->
						</div><!-- /column -->
					</div><!-- /txt2 -->
			</div><!-- /col-12 -->
		</div><!-- /row -->
		<div class="row">
			<div class="col-12 sec" style="margin-bottom:30px;">
				<div class="sec-title">
					<h2>助成金申請のメリット</h2>
					<div class="sec-title-under"></div>
				</div>
				<div class="sec-txt">
					<p>
						種類も多く、申請手続が煩雑で手間もかかる助成金ですが、申請する際の注意すべきポイントがいくつかあります。
					</p>
				</div>
			</div><!-- /sec -->
		</div><!-- /row -->
		<div class="row melit">
			<div class="col-12">
				<div class="column">
					<div class="col-title red">
						<h2>①助成金は返済不要</h2>
					</div>
					<div class="col-txt">
						<p>
							助成金は国から支給されるお金なので、公的融資とは違い『返済は不要』です。<br>
							当然、返済できるか等の審査もありませんので、社員教育や研究開発など会社のために自由に使えます。<br>
							助成金は会社にとってプラスになることはあっても、マイナスになることはないのです。<br>
							手続きは決して簡単なものではありませんが、返す必要のないお金ですので、要件を満たしていれば、<br>
							計画的に申請して受給をすることが可能です。
						</p>
					</div>
				</div>
				<div class="column">
					<div class="col-title">
						<h2>②資金繰りに活用</h2>
					</div>
					<div class="col-txt">
						<p>
							創業時や新しい事業の実施、新たに人を雇い入れたときは、資金不足の場合がよくあります。設備資金や運転資金が不十分なまま<br>
							開業や新規事業に着手せざるを得ないからです。このようなときに返済不要の助成金は非常に助かるものです。<br>
							また、融資ではないので返済の必要がなく、経理上は雑収入になります。これは助成金を受けた金額が、そのまま利益を上げた<br>
							金額になるという事を意味しています。<br>
							100万円の利益を上げる為にどの程度、資金を投資しなければならないのでしょうか。<br>
							助成金による収入の意味を経常利益率から考えてみましょう。仮に経常利益率が10％の会社で、助成金による収入が100万円<br>
							あったとします。経常利益÷経常利益率＝売上高となりますから、助成金による100万円の収入は、100万円÷10％で1,000万円の<br>
							売上高に匹敵する効果を損益計算書にもたらします。<br>
							1,000万円の売上をあげることがどれほど大変なことか、経営者様ならお分かりになることと思います。<br>
							助成金の金額は数万円のものから数百万円のものと多岐に渡りますが、いずれのものでも基本的に事業主様には<br>
							「得になること」しかありません。<br>
							せっかく要件をクリアしているのに、助成金を知らず申請しないままでいるのは、あまりにも勿体ないことがお分かりになるでしょう。
						</p>
					</div>
				</div>
				<div class="column">
					<div class="col-title">
							<h2>③信用力の向上</h2>
					</div>
					<div class="col-txt">
						<p>
							助成金は国の厳しい審査を受けて支給決定されます。つまり、事前にしっかりと計画を立て、雇用の拡大、雇用管理の改善や<br>
							人的能力開発等、事業の継続と発展が期待された上での支給決定です。<br>
							助成金の審査を通過すると言うことは、国の審査に通過したということであり、対外的な信用度が高まります。<br>
							 他の助成金制度の審査のみならず、公的融資制度を利用する際にも有利になることがあります。<br>
							助成金をもらうためにある制度を導入したことが、従業員の福利厚生の向上や進んだ制度を取り入れた企業として、<br>
							国からお墨付きをもらったということでもあるのです。
						</p>
					</div><!-- /col-txt -->
				</div><!-- /column -->
			</div><!-- /col-12 -->
		</div><!-- /row -->

		<div class="row bg-gray">
			<div class="col-12 sec">
				<div class="sec-title">
					<h2>助成金申請の流れ</h2>
				</div>
				<div class="flow">
					<p>
						まず、幣事務所がどの助成金に該当するかを無料で診断し、経営者様にアドバイスいたします。<br>
						アドバイスを参考にして、経営者様は助成金申請を幣事務所に改めてご依頼ください。<br>
						申請書類の作成や役所との折衝は、全て幣事務所が行いますので、経営者様は本業に専念されてください。<br>
						申請書類と添付書類を提出すると、行政機関は提出された書類に間違いが無いか？要件に適合しているか？などの審査に入ります。<br>
						要件の審査は年々厳しくなっており、助成金の中には要件をクリアするのが非常に難しいものもあります。<br>
						書類に不備がなく要件もクリアしている場合には、助成金の支給が決定され、会社宛てに支給決定通知書が送付されます。<br>
						支給決定通知書が届いた後、2週間以内に事業主様の指定された口座に助成金が振り込まれます。
					</p>
				</div><!-- /flow -->
			</div><!-- /col-12 -->
		</div><!-- /row -->

	</div><!-- end #subsidy -->
	
	

<?php get_footer(); ?>
