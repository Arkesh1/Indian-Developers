<?php
/**
	* The template for displaying single
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
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'include/formats/content', get_post_format() ); ?>
					<?php endwhile; ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
							$posts_comment = get_theme_mod( 'cloux_posts_comment', '1' );
							if ( $posts_comment == '1' ) {
								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}
							}
						?>
					<?php endwhile; ?>
				<?php cloux_content_after(); ?>
				<?php get_sidebar(); ?>
			<?php cloux_row_after(); ?>
		
	<?php cloux_container_after(); ?>

<?php get_footer();