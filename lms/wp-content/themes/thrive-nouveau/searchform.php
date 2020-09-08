<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
		<label class="screen-reader-text" for="s">
			<?php _e( 'Search for:', 'thrive-nouveau' ); ?>
		</label>

		<div class="thrive-search-input">
			<i class="material-icons search-icon">search</i>
			<input placeholder="<?php _e("Search", "thrive-nouveau"); ?>" type="search" value="<?php echo get_search_query(); ?>" name="s" id="s" />
		</div>

		<input type="submit" id="searchsubmit" value="<?php  esc_attr_e( 'Search', 'thrive-nouveau' ); ?>" />
	</div>
</form>