<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="search-form-widget">
		<input type="text" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo esc_html__( 'Search', 'cloux' ); ?>" name="s" id="s" class="searchform-text" />
		<button id="searchsubmit"><?php echo esc_html__( 'Search', 'cloux' ); ?></button>
	</div>
</form>