 <?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
	<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
	return;
}

// add a microid to all the comments
function comment_add_microid($classes) {
	$c_email=get_comment_author_email();
	$c_url=get_comment_author_url();
	if (!empty($c_email) && !empty($c_url)) {
		$microid = 'microid-mailto+http:sha1:' . sha1(sha1('mailto:'.$c_email).sha1($c_url));
		$classes[] = $microid;
	}
	return $classes;	
}
add_filter('comment_class','comment_add_microid');

// show the comments
if ( have_comments() ) : ?>
	<div id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments' );?></div>
	<ul class="commentlist" id="singlecomments">	
		<?php wp_list_comments(array('avatar_size'=>40, 'reply_text'=>'Reply')); ?>
	</ul>	
	<div class="comment-navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) :
		// If comments are open, but there are no comments.
	else : 
		// comments are closed 
	endif;
endif; 

if ('open' == $post-> comment_status) : 

// show the form
?>
<div id="respond" style="margin-top:20px;">

 
 <?php cancel_comment_reply_link('Cancel'); ?> 
 

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

<p>
	You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.
</p>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" style="width:100%;">

	<?php if ( $user_ID ) : ?>
	<div class="twelve columns">
		<p>ログイン中： <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
		<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">ログアウト &raquo;</a></p>
		<label>コメント</label> 
		<p><textarea name="comment" id="comment" class="comment-form-input-fields"  cols="200" rows="5" tabindex="4" style="width:80%;"></textarea></p>
	</div>	
	<?php else : ?>	
	<div class="six columns" style="padding-right:20px;">	
		<label>名前</label><?php if ($req) echo "<small>必須</small>"; ?>
		<p><input type="text" name="author" id="author"  size="40" value="<?php echo $comment_author; ?>" class="comment-form-input-fields"  tabindex="1" style="width:80%;"/></p>
		
		<label>Email</label><?php if ($req) echo "<small>必須</small>"; ?>
		<p><input type="text" name="email" id="email"  size="40" value="<?php echo $comment_author_email; ?>" class="comment-form-input-fields" tabindex="2" style="width:80%;"/> </p>
		
		<label>Website</label> 
		<p><input type="text" name="url" id="url"  size="40" value="<?php echo $comment_author_url; ?>" class="comment-form-input-fields"  tabindex="3" style="width:80%;"/></p>
	</div><!--end six columns-->
	<div class="six columns">
		<label>コメント</label>
		<p><textarea name="comment" id="comment" class="comment-form-input-fields"  cols="200" rows="5" tabindex="4" style="width:80%;"></textarea></p>
	</div><!--end six columns-->
	<?php endif; ?>	

<div style="display:none;">
<?php comment_id_fields(); ?>
<input type="hidden" name="redirect_to" value="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" />
</div>



<?php if (get_option("comment_moderation") == "1") { ?>
<p><small><strong>Please note:</strong> Comment moderation is enabled and may delay your comment. There is no need to resubmit your comment.</small></p>
<?php } ?>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="送信" class="btn btn-detail button success" /></p>
<?php do_action('comment_form', $post->ID); ?>

</form>
<?php endif; ?>
</div>
<?php 
endif;
