<?php

// カスタムヘッダー画像の設置
$custom_header_defaults = array(
		'default-image'          => get_bloginfo('template_url').'/images/headers/logo.png',
		'header-text'            => false,	//ヘッダー画像上にテキストをかぶせる
);
add_theme_support( 'custom-header', $custom_header_defaults ); //カスタムヘッダー機能を有効にする

 //ページネーション
 function pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;//表示するページ数（５ページを表示）

     global $paged;//現在のページ値
     if(empty($paged)) $paged = 1;//デフォルトのページ

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;//全ページ数を取得
         if(!$pages)//全ページ数が空の場合は、１とする
         {
             $pages = 1;
         }
     }

     if(1 != $pages)//全ページが１でない場合はページネーションを表示する
     {
         echo "<div class=\"pagenation\">\n";
         echo "<ul>\n";
         //Prev：現在のページ値が１より大きい場合は表示
         if($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged - 1)."'>Prev</a></li>\n";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                //三項演算子での条件分岐
                echo ($paged == $i)? "<li class=\"active\">".$i."</li>\n":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
             }
         }
        //Next：総ページ数より現在のページ値が小さい場合は表示
        if ($paged < $pages) echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged + 1)."\">Next</a></li>\n";
        echo "</ul>\n";
        echo "</div>\n";
     }
}

//投稿の一枚目画像を取得する
function getPostImage($mypost){
	if(empty($mypost)){ return(null); }
	
	if(preg_match('/<img([ ]+)([^>]*)src\=["|\']([^"|^\']+)["|\']([^>]*)>/',$mypost->post_content,$img_array)){
	
		// imgタグで直接画像にアクセスしているものがある
		$dummy=preg_match('/<img([ ]+)([^>]*)alt\=["|\']([^"|^\']+)["|\']([^>]*)>/',$mypost->post_content,$alt_array);
		$resultArray["url"] = $img_array[3];
		$resultArray["alt"] = $alt_array[3];
		
	}else{
	
		// 直接imgタグにてアクセスされていない場合は紐づけられた画像を取得
		$files = get_children(array('post_parent' => $mypost->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image'));
		if(is_array($files) && count($files) != 0){
			$files=array_reverse($files);
			$file=array_shift($files);
			$resultArray["url"] = wp_get_attachment_url($file->ID);
			$resultArray["alt"] = $file->post_title;
		}else{
			return(null);
		}
	}
	return($resultArray);
}

/*投稿ページ等への投稿ページを追加するためのアクションフック*/
add_action('admin_menu', 'add_custom_inputbox');

/*追加した表示項目のデータ更新・保存のためのアクションフック*/
add_action('save_post', 'save_custom_postdata');

/*入力項目がどの投稿タイプのページに表示されるのかの設定*/
function add_custom_inputbox() {
	//第一引数：編集画面のhtmlに挿入されるid属性名　、第二引数：管理画面に表示されるカスタムフィールド名、　第三引数：メタボックスの中に出力される関数名、第四引数：管理画面に表示するカスタムフィールドの場所（postなら投稿、pageなら固定ページ）、第五引数：配置される順序
  add_meta_box( 'myid','施術の流れ', 'custom_area', 'page', 'normal' );
  add_meta_box( 'access_id','アクセス', 'custom_area2', 'page', 'normal' );
  add_meta_box( 'top_baner_id','トップバナー', 'custom_area3', 'page', 'normal' );
  add_meta_box( 'fb_id','facebook', 'custom_area4', 'page', 'normal' );
  add_meta_box( 'prof','プロフィール', 'custom_area5', 'page', 'normal' );
}

/*実際、管理画面に表示される内容*/
function custom_area(){
 
  //これがないと入力欄が更新されない！
   global $post;
	
	for($i = 1; $i <= 8; $i++){
		echo 'タイトル'.$i.'：<input type="text" name="title'.$i.'" value="'.get_post_meta($post->ID,'title'.$i,true).'"><br>';
		echo '本文'.$i.'　　：<textarea cols="50" rows="5" name="msg'.$i.'">'.get_post_meta($post->ID,'msg'.$i,true).'</textarea><br>';
		echo '画像'.$i.'　　：<input type="text" name="img'.$i.'" value="'.get_post_meta($post->ID,'img'.$i,true).'"><br><br>';
	}
	
}
function custom_area2(){
 
  //これがないと入力欄が更新されない！
  global $post;
  echo '住所<br /><textarea cols="70" rows="5" name="addr" style="margin-bottom:10px;">'.get_post_meta($post->ID,'addr',true).'</textarea><br>';
  echo 'アクセス<br /><input type="text" name="access" value="'.get_post_meta($post->ID,'access',true).'" style="width:50%;margin-bottom:10px;"><br>';	
  echo '駐車場<br /><input type="text" name="parking" value="'.get_post_meta($post->ID,'parking',true).'" style="width:50%;margin-bottom:10px;"><br>';	
  echo '電話番号<br /><input type="text" name="tel" value="'.get_post_meta($post->ID,'tel',true).'" style="margin-bottom:10px;"><span style="color:#aaa;">例：03-1234-5678</span><br>';	
  echo '電話予約ボタン備考<br /><textarea cols="70" rows="5" name="tel_remarks" style="margin-bottom:10px;">'.get_post_meta($post->ID,'tel_remarks',true).'</textarea><br>';
  echo 'インターネット予約ボタンリンク先URL<br /><input type="text" name="reserve" value="'.get_post_meta($post->ID,'reserve',true).'" style="width:50%;margin-bottom:10px;"><br>';
  echo 'インターネット予約ボタン備考<br /><textarea cols="70" rows="5" name="reserve_remarks" style="margin-bottom:10px;">'.get_post_meta($post->ID,'reserve_remarks',true).'</textarea><br>';
	echo '地図<br /><textarea cols="70" rows="5" name="map">'.get_post_meta($post->ID,'map',true).'</textarea><br>
								<span style="color:#aaa;">　　　　　　　　　　　　　　　　　　　　　　　　　　　Googleマップなどからそのまま貼り付け可能です</span><br>';
	
	$week = array('月曜','火曜','水曜','木曜','金曜','土曜','日曜');
	
	for($i = 1; $i <= 2; $i++){
		echo '時間'.$i.'　：<input type="text" name="time'.$i.'" value="'.get_post_meta($post->ID,'time'.$i,true).'"> <span style="color:#aaa;">例：9:00〜18:00</span><br><br>';
		for($k = 0; $k <= 6; $k++){
			echo $week[$k].$i.'　：<input type="text" name="week'.$i.$k.'" value="'.get_post_meta($post->ID,'week'.$i.$k,true).'"><span style="color:#aaa;">例：○</span><br><br>';
		}	
	}
	
}
function custom_area3(){
 
  //これがないと入力欄が更新されない！
   global $post;
	
	for($i = 1; $i <= 5; $i++){
		echo '画像'.$i.'　　：<input type="text" name="top_baner'.$i.'" value="'.get_post_meta($post->ID,'top_baner'.$i,true).'"><br><br>';
	}
	
}
function custom_area4(){
 
  //これがないと入力欄が更新されない！
   global $post;
	
		echo 'Facebookコード　　：<textarea cols="50" rows="5" name="fb_id" style="width:80%">'.get_post_meta($post->ID,'fb_id',true).'</textarea><br>';
	
}
function custom_area5(){
 
  //これがないと入力欄が更新されない！
   global $post;
	
		echo '肩書　　：<input type="text" name="katagaki" >'.get_post_meta($post->ID,'katagaki',true).'<br><br>';
		echo '名前　　：<input type="text" name="name" >'.get_post_meta($post->ID,'name',true).'<br><br>';
	
}


/*投稿ボタンを押した際のデータ更新と保存*/
function save_custom_postdata($post_id){

	/* 	施術の流れ
	-------------------------*/
	$title = array(); $msg = array(); $img = array();
	for($i = 1; $i <= 8; $i++){
		//title
		if(isset($_POST['title'.$i])){
			$title[$i] = $_POST['title'.$i]; 
		}else{
			$title[$i] = ''; 
		}
		//-1になると項目が変わったことになるので、項目を更新する
		if( $title[$i] != get_post_meta($post_id, 'title'.$i, true)){
			update_post_meta($post_id, 'title'.$i,$title[$i]);
		}elseif($title[$i] == ""){
			delete_post_meta($post_id, 'title'.$i,get_post_meta($post_id,'title'.$i,true));
		}
	
		//msg
		if(isset($_POST['msg'.$i])){
			$msg[$i] = $_POST['msg'.$i];
		}else{
			$msg[$i] = '';
		}
		if($msg[$i] != get_post_meta($post_id, 'msg'.$i, true)){
			update_post_meta($post_id, 'msg'.$i,$msg[$i]);
		}elseif($msg[$i] == ""){
			delete_post_meta($post_id, 'msg'.$i,get_post_meta($post_id,'msg'.$i,true));
		}
		
		//img
		if(isset($_POST['img'.$i])){
			$img[$i] = $_POST['img'.$i];
		}else{
			$img[$i] = '';
		}
		if($img[$i] != get_post_meta($post_id, 'img'.$i, true)){
			update_post_meta($post_id, 'img'.$i,$img[$i]);
		}elseif($img[$i] == ""){
			delete_post_meta($post_id, 'img'.$i,get_post_meta($post_id,'img'.$i,true));
		}
		
	}
	
	/* 	アクセス
	-------------------------*/
	$addr = ''; $tel = ''; $map = '';
	$time = array(); $week = array();
	
	//addr
	if(isset($_POST['addr'])){
		$addr = $_POST['addr']; 
	}else{
		$addr = ''; 
	}
	//-1になると項目が変わったことになるので、項目を更新する
	if( $addr != get_post_meta($post_id, 'addr', true)){
		update_post_meta($post_id, 'addr',$addr);
	}elseif($addr == ""){
		delete_post_meta($post_id, 'addr',get_post_meta($post_id,'addr',true));
	}
	
	//access
	if(isset($_POST['access'])){
		$access = $_POST['access']; 
	}else{
		$access = ''; 
	}
	//-1になると項目が変わったことになるので、項目を更新する
	if( $access != get_post_meta($post_id, 'access', true)){
		update_post_meta($post_id, 'access',$access);
	}elseif($access == ""){
		delete_post_meta($post_id, 'access',get_post_meta($post_id,'access',true));
	}
	
	//reserve
	if(isset($_POST['reserve'])){
		$reserve = $_POST['reserve']; 
	}else{
		$reserve = ''; 
	}
	//-1になると項目が変わったことになるので、項目を更新する
	if( $reserve != get_post_meta($post_id, 'reserve', true)){
		update_post_meta($post_id, 'reserve',$reserve);
	}elseif($reserve == ""){
		delete_post_meta($post_id, 'reserve',get_post_meta($post_id,'reserve',true));
	}
	
	//reserve_remarks
	if(isset($_POST['reserve_remarks'])){
		$reserve_remarks = $_POST['reserve_remarks']; 
	}else{
		$reserve_remarks = ''; 
	}
	//-1になると項目が変わったことになるので、項目を更新する
	if( $reserve_remarks != get_post_meta($post_id, 'reserve_remarks', true)){
		update_post_meta($post_id, 'reserve_remarks',$reserve_remarks);
	}elseif($reserve_remarks == ""){
		delete_post_meta($post_id, 'reserve_remarks',get_post_meta($post_id,'reserve_remarks',true));
	}

	//parking
	if(isset($_POST['parking'])){
		$parking = $_POST['parking']; 
	}else{
		$parking = ''; 
	}
	//-1になると項目が変わったことになるので、項目を更新する
	if( $parking != get_post_meta($post_id, 'parking', true)){
		update_post_meta($post_id, 'parking',$parking);
	}elseif($parking == ""){
		delete_post_meta($post_id, 'parking',get_post_meta($post_id,'parking',true));
	}

	
	//tel
	if(isset($_POST['tel'])){
		$tel = $_POST['tel']; 
	}else{
		$tel = ''; 
	}
	//-1になると項目が変わったことになるので、項目を更新する
	if( $tel != get_post_meta($post_id, 'tel', true)){
		update_post_meta($post_id, 'tel',$tel);
	}elseif($tel == ""){
		delete_post_meta($post_id, 'tel',get_post_meta($post_id,'tel',true));
	}
	
	//tel
	if(isset($_POST['tel_remarks'])){
		$tel_remarks = $_POST['tel_remarks']; 
	}else{
		$tel_remarks = ''; 
	}
	//-1になると項目が変わったことになるので、項目を更新する
	if( $tel_remarks != get_post_meta($post_id, 'tel_remarks', true)){
		update_post_meta($post_id, 'tel_remarks',$tel_remarks);
	}elseif($tel_remarks == ""){
		delete_post_meta($post_id, 'tel_remarks',get_post_meta($post_id,'tel_remarks',true));
	}

	
	//map
	if(isset($_POST['map'])){
		$map = $_POST['map']; 
	}else{
		$map = ''; 
	}
	//-1になると項目が変わったことになるので、項目を更新する
	if( $map != get_post_meta($post_id, 'map', true)){
		update_post_meta($post_id, 'map',$map);
	}elseif($map == ""){
		delete_post_meta($post_id, 'map',get_post_meta($post_id,'map',true));
	}
	
	//time
	for($i = 1; $i <= 2; $i++){

		if(isset($_POST['time'.$i])){
			$time[$i] = $_POST['time'.$i]; 
		}else{
			$time[$i] = ''; 
		}
		//-1になると項目が変わったことになるので、項目を更新する
		if( $time[$i] != get_post_meta($post_id, 'time'.$i, true)){
			update_post_meta($post_id, 'time'.$i,$time[$i]);
		}elseif($time[$i] == ""){
			delete_post_meta($post_id, 'time'.$i,get_post_meta($post_id,'time'.$i,true));
		}
	}
	
	//week
	for($i = 1; $i <= 2; $i++){
		for($k = 0; $k <= 6; $k++){
		
			if(isset($_POST['week'.$i.$k])){
				$week[$i][$k] = $_POST['week'.$i.$k]; 
			}else{
				// $time[$i][$k] = ''; 
			}
			//-1になると項目が変わったことになるので、項目を更新する
			if( $week[$i][$k] != get_post_meta($post_id, 'week'.$i.$k, true)){
				update_post_meta($post_id, 'week'.$i.$k,$week[$i][$k]);
			}elseif($week[$i][$k] == ""){
				delete_post_meta($post_id, 'week'.$i.$k,get_post_meta($post_id,'week'.$i.$k,true));
			}
			
		}
	}
	
	/* 	トップバナー
	-------------------------*/
	$top_baner_img = array();
	for($i = 1; $i <= 5; $i++){
	
		if(isset($_POST['top_baner'.$i])){
			$top_baner_img[$i] = $_POST['top_baner'.$i];
		}else{
			$top_baner_img[$i] = '';
		}
		if($top_baner_img[$i] != get_post_meta($post_id, 'top_baner'.$i, true)){
			update_post_meta($post_id, 'top_baner'.$i,$top_baner_img[$i]);
		}elseif($top_baner_img[$i] == ''){
			delete_post_meta($post_id, 'top_baner'.$i,get_post_meta($post_id,'top_baner'.$i,true));
		}
		
	}
	
	/* 	Facebookコード
	-------------------------*/
	$fb_code = array();
	
	if(isset($_POST['fb_id'])){
		$fb_code = $_POST['fb_id'];
	}else{
		$fb_code = '';
	}
	if($fb_code != get_post_meta($post_id, 'fb_id', true)){
		update_post_meta($post_id, 'fb_id',$fb_code);
	}elseif($fb_code == ''){
		delete_post_meta($post_id, 'fb_id',get_post_meta($post_id,'fb_id',true));
	}
	
	/* 	プロフィール
	-------------------------*/
	$katagaki = array();
	$name = array();
	
	if(isset($_POST['katagaki'])){
		$katagaki = $_POST['katagaki'];
	}else{
		$katagaki = '';
	}
	if($katagaki != get_post_meta($post_id, 'katagaki', true)){
		update_post_meta($post_id, 'katagaki',$katagaki);
	}elseif($katagaki == ''){
		delete_post_meta($post_id, 'katagaki',get_post_meta($post_id,'katagaki',true));
	}
	
	if(isset($_POST['name'])){
		$name = $_POST['name'];
	}else{
		$name = '';
	}
	if($name != get_post_meta($post_id, 'name', true)){
		update_post_meta($post_id, 'name',$name);
	}elseif($name == ''){
		delete_post_meta($post_id, 'name',get_post_meta($post_id,'name',true));
	}
	
		
	
}

//カスタム投稿タイプ
add_action('init', 'register_post_type_and_taxonomy'); // // 最初にregister_post_type_and_taxonomy関数を実行
function register_post_type_and_taxonomy() {
  register_post_type( // カスタム投稿タイプを定義するための関数
    'news', // カスタム投稿タイプ名
    array(
      'labels' => array(
        'name' => 'ニュース', //ダッシュボードに表示される名前
        'add_new_item' => 'ニュースを新規追加', // 新規追加画面に表示される名前
        'edit_item' => 'ニュースの編集', // 編集画面に表示される名前
      ),
      'public' => true, // ダッシュボードに表示するか否か
      'hierarchical' => true, // 階層型にするか否か
      'has_archive' => true, // アーカイブ（一覧表示機能）を持つか否か
      'supports' => array( // カスタム投稿ページに表示される項目
        'title', // タイトル　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
        'editor', // 本文　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
        'custom-fields', // カスタムフィールド
        'thumbnail', // アイキャッチ画像　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
      ),
      'menu_position' => 5, // ダッシュボードで投稿の下に表示
      'rewrite' => array('with_front' => false), // パーマリンクの編集（newsの前の階層URLを消して表示）
    )
   );
   /*
   register_post_type( // カスタム投稿タイプを定義するための関数
    'voice', // カスタム投稿タイプ名
    array(
      'labels' => array(
        'name' => 'お客様の声', //ダッシュボードに表示される名前
        'add_new_item' => 'お客様の声を新規追加', // 新規追加画面に表示される名前
        'edit_item' => 'お客様の声の編集', // 編集画面に表示される名前
      ),
      'public' => true, // ダッシュボードに表示するか否か
      'hierarchical' => true, // 階層型にするか否か
      'has_archive' => true, // アーカイブ（一覧表示機能）を持つか否か
      'supports' => array( // カスタム投稿ページに表示される項目
        'title', // タイトル　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
        'editor', // 本文　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
        'custom-fields', // カスタムフィールド
        'thumbnail', // アイキャッチ画像　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
      ),
      'menu_position' => 5, // ダッシュボードで投稿の下に表示
      'rewrite' => array('with_front' => false), // パーマリンクの編集（newsの前の階層URLを消して表示）
    )

  );
  register_post_type( // カスタム投稿タイプを定義するための関数
    'recommend', // カスタム投稿タイプ名
    array(
      'labels' => array(
        'name' => 'オススメ', //ダッシュボードに表示される名前
        'add_new_item' => 'オススメを新規追加', // 新規追加画面に表示される名前
        'edit_item' => 'オススメの編集', // 編集画面に表示される名前
      ),
      'public' => true, // ダッシュボードに表示するか否か
      'hierarchical' => true, // 階層型にするか否か
      'has_archive' => true, // アーカイブ（一覧表示機能）を持つか否か
      'supports' => array( // カスタム投稿ページに表示される項目
        'title', // タイトル　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
        'editor', // 本文　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
        'custom-fields', // カスタムフィールド
        'thumbnail', // アイキャッチ画像　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
      ),
      'menu_position' => 5, // ダッシュボードで投稿の下に表示
      'rewrite' => array('with_front' => false), // パーマリンクの編集（newsの前の階層URLを消して表示）
    )

  );
	*/
}

//カスタムメニュー使用
register_nav_menu('mainmenu', 'メインメニュー');

//ウィジェットエリア定義
function arphabet_widgets_init() {

	register_sidebar( array(
		'name' => 'right sidebar',
		'id' => 'my_sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	));
	register_sidebar( array(
		'name' => 'オススメ',
		'id' => 'osusume_widget',
		'before_widget' => '<div>',
		'after_widget' => '</div>'
	));
	register_sidebar( array(
		'name' => 'セクションエリア（トップ）',
		'id' => 'tuyomi_widget',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	));
	register_sidebar( array(
		'name' => 'アクセス',
		'id' => 'access_widget',
		'before_widget' => '<div>',
		'after_widget' => '</div>'
	));
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

//ウィジェット作成
class MyWidgetItem extends WP_Widget {
    function __construct() {
        parent::WP_Widget(false, $name = '２カラムウィジェット');
    }
    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        $img = apply_filters( 'widget_img', $instance['img'] );
        $body = apply_filters( 'widget_body', $instance['body'] );
        $link = apply_filters( 'widget_link', $instance['link'] );
        ?>
        <?php if ( $title ) ?>
        
        
        <div class="col-lg-6 col-md-6 col-sm-4=6 col-xs-12">
        	<div class="stripe"></div>
					<section class="scrollFade ctn panel panel-3col">
						<div class="panel-head">
							<h2 class="title"><?php echo $title; ?></h2>
						</div>
						<div class="panel-body row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<img src="<?php echo $img; ?>" class="img-responsive"/>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<?php if(!empty($body)){ ?>
								<p class="description"><?php echo nl2br($body); ?></p>
								<?php } ?>
								<?php if(!empty($link)){ ?>
								<div style="text-align:left;">
									<a href="<?php echo $link; ?>" class="btn btn-detail"><i class="fa fa-arrow-circle-o-right" style="padding-right:5px;"></i>詳しくはこちら</a>
								</div>
								<?php } ?>
							</div>
						</div>
					</section>
					<div class="stripe"></div>
				</div><!-- end .col -->
				
<?php
    }
    function update($new_instance, $old_instance) {
	    $instance = $old_instance;
	    $instance['title'] = strip_tags($new_instance['title']); //サニタイズ
	    $instance['img'] = trim($new_instance['img']); //サニタイズ
	    $instance['body'] = trim($new_instance['body']); //サニタイズ
	    $instance['link'] = strip_tags($new_instance['link']); //サニタイズ

      return $instance;
    }
    function form($instance) {
        $title = esc_attr($instance['title']);
        $img = esc_attr($instance['img']);
        $body = esc_attr($instance['body']);
        $link = esc_attr($instance['link']);
        ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>">
          <?php echo 'タイトル:'; ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        
        <p>
          <label for="<?php echo $this->get_field_id('img'); ?>">
          <?php echo '画像のURL:'; ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" type="text" value="<?php echo $img; ?>" />
          <p>※メディアライブラリからアップロードした画像を選択すると右側に「URL」が出てくるので、それをコピー＆ペ―ストしてください</p>
        </p>

        <p>
           <label for="<?php echo $this->get_field_id('body'); ?>">
           <?php echo '内容:'; ?>
           </label>
           <textarea  class="widefat" rows="16" colls="20" id="<?php echo $this->get_field_id('body'); ?>" name="<?php echo $this->get_field_name('body'); ?>"><?php echo $body; ?></textarea>
        </p>
        
        <p>
          <label for="<?php echo $this->get_field_id('link'); ?>">
          <?php echo 'リンク先URL:'; ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" />
        </p>
        <?php
    }
}
add_action('widgets_init', create_function('', 'return register_widget("MyWidgetItem");'));

class MyWidgetItem2 extends WP_Widget {
    function MyWidgetItem() {
        parent::WP_Widget(false, $name = '２カラムウィジェット');
    }
    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        $img = apply_filters( 'widget_img', $instance['img'] );
        $body = apply_filters( 'widget_body', $instance['body'] );
        $link = apply_filters( 'widget_link', $instance['link'] );
        ?>
        <?php if ( $title ) ?>
        
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<section class="scrollFade ctn panel panel-3col">
						<div class="panel-head">
							<h2 class="title"><?php echo $title; ?></h2>
						</div>
						<div class="panel-body row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<img src="<?php echo $img; ?>" class="img-responsive"/>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<?php if(!empty($body)){ ?>
								<p class="description"><?php echo $body; ?></p>
								<?php } ?>
								<?php if(!empty($link)){ ?>
								<div style="text-align:right;">
									<a href="<?php echo $link; ?>" class="btn btn-detail">詳しくはこちら<i class="fa fa-angle-right" style="padding-left:5px;"></i></a>
								</div>
								<?php } ?>
							</div>
						</div>
					</section>
				</div><!-- end .col -->
<?php
    }
    function update($new_instance, $old_instance) {
	    $instance = $old_instance;
	    $instance['title'] = strip_tags($new_instance['title']); //サニタイズ
	    $instance['img'] = trim($new_instance['img']); //サニタイズ
	    $instance['body'] = trim($new_instance['body']); //サニタイズ
	    $instance['link'] = strip_tags($new_instance['link']); //サニタイズ

      return $instance;
    }
    function form($instance) {
        $title = esc_attr($instance['title']);
        $img = esc_attr($instance['img']);
        $body = esc_attr($instance['body']);
        $link = esc_attr($instance['link']);
        ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>">
          <?php echo 'タイトル:'; ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        
        <p>
          <label for="<?php echo $this->get_field_id('img'); ?>">
          <?php echo '画像のURL:'; ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" type="text" value="<?php echo $img; ?>" />
          <p>※メディアライブラリからアップロードした画像を選択すると右側に「URL」が出てくるので、それをコピー＆ペ―ストしてください</p>
        </p>

        <p>
           <label for="<?php echo $this->get_field_id('body'); ?>">
           <?php echo '内容:'; ?>
           </label>
           <textarea  class="widefat" rows="16" colls="20" id="<?php echo $this->get_field_id('body'); ?>" name="<?php echo $this->get_field_name('body'); ?>"><?php echo $body; ?></textarea>
        </p>
        
        <p>
          <label for="<?php echo $this->get_field_id('link'); ?>">
          <?php echo 'リンク先URL:'; ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" />
        </p>
        <?php
    }
}
add_action('widgets_init', create_function('', 'return register_widget("MyWidgetItem");'));

class MyWidgetItem1 extends WP_Widget {
    function __construct() {
        parent::WP_Widget(false, $name = '強みウィジェット');
    }
    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        $body = apply_filters( 'widget_body', $instance['body'] );
        
         if ( $title ) ?>
        
        <div class="row ">
					<div class="scrollFade col-lg-12">
						<h1><i class="fa fa-check"></i><?php echo $title; ?></h1>
						<p><?php echo $body; ?></p>
					</div>
				</div>

<?php
    }
    function update($new_instance, $old_instance) {
	    $instance = $old_instance;
	    $instance['title'] = strip_tags($new_instance['title']); //サニタイズ
	    $instance['body'] = trim($new_instance['body']); //サニタイズ

      return $instance;
    }
    function form($instance) {
        $title = esc_attr($instance['title']);
        $body = esc_attr($instance['body']);
        ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>">
          <?php echo 'タイトル:'; ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
           <label for="<?php echo $this->get_field_id('body'); ?>">
           <?php echo '内容:'; ?>
           </label>
           <textarea  class="widefat" rows="16" colls="20" id="<?php echo $this->get_field_id('body'); ?>" name="<?php echo $this->get_field_name('body'); ?>"><?php echo $body; ?></textarea>
        </p>
        
        <?php
    }
}
add_action('widgets_init', create_function('', 'return register_widget("MyWidgetItem1");')); ?>
