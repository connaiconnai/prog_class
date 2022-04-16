
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="field" name="s" id="s" onblur="if (value == '')  {value = '検索...';}" onfocus="if (value == 'Search...') value = '';" />
		<input type="submit" class="btn btn-detail" name="submit" value="検索" />
	</form>
	