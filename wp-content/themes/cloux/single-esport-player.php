<?php
/**
	* The template for displaying eSport player single
*/
get_header(); ?>

	<?php echo cloux_page_banner(); ?>

	<?php cloux_container_before( $extra_class = "main-container" ); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php cloux_row_before( $extra_class = "main-row" ); ?>
				<?php cloux_content_before(); ?>
					<?php get_template_part( 'include/formats/content-esport-player' ); ?>
				<?php cloux_content_after(); ?>
				<?php get_sidebar(); ?>
			<?php cloux_row_after(); ?>
			<?php
				$posts_comment = get_theme_mod( 'cloux_esport_players_comment' );
				if ( $posts_comment == '1' ) {
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
			?>
		<?php endwhile; ?>
	<?php cloux_container_after(); ?>

<?php get_footer();