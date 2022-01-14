<?php
/**
	* The template for displaying woocommerce page
*/
get_header(); ?>
	<?php
		if ( function_exists( 'rwmb_meta' ) ) {
			$hide_page_banner = rwmb_meta( 'hide-page-banner' );
			if( !$hide_page_banner == "1" ) {
				echo cloux_page_banner();
			}
		} else {
			echo cloux_page_banner();
		}
	?>

	<?php cloux_container_before( $extra_class = "main-container" ); ?>
		<?php cloux_row_before( $extra_class = "main-row" ); ?>
			<?php cloux_content_before(); ?>
				<?php get_template_part( 'include/formats/content-woo' ); ?>
			<?php cloux_content_after(); ?>
			<?php
				if ( is_active_sidebar( 'cloux-shop-sidebar' ) )  {
					cloux_sidebar_before();
						dynamic_sidebar( 'cloux-shop-sidebar' );
					cloux_sidebar_after();
				}
			?>
		<?php cloux_row_after(); ?>
	<?php cloux_container_after(); ?>

<?php get_footer();