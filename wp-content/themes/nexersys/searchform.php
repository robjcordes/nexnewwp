<?php $sq = get_search_query() ? get_search_query() : ''; ?>
<form method="get" class="search-form" id="searchform" action="<?php bloginfo('url'); ?>" >
	<fieldset>
		<div class="text">
			<input type="text" name="s" value="<?php echo $sq; ?>" />
			<input class="btn-search" type="submit" value="Submit" />
		</div>
	</fieldset>
</form>