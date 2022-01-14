<?php
/**
	* The template for displaying eSport fixture single
*/
get_header(); ?>

	<?php echo cloux_page_banner(); ?>

	<?php cloux_container_before( $extra_class = "main-container" ); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php echo cloux_esport_fixture_style_1( $match = get_the_ID(), $games = "true", $excerpt = "false", $date = "true", $time = "true", $score = "true", $home_team = "true", $away_team = "true" ); ?>
			<?php cloux_row_before( $extra_class = "main-row" ); ?>
				<?php cloux_content_before(); ?>
					<?php get_template_part( 'include/formats/content-esport-fixture' ); ?>
				<?php cloux_content_after(); ?>
				<?php get_sidebar(); ?>
			<?php cloux_row_after(); ?>
			<?php
				$posts_comment = get_theme_mod( 'cloux_esport_fixture_comment' );
				if ( $posts_comment == '1' ) {
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
			?>
		<?php endwhile; ?>
	<?php cloux_container_after(); ?>

<?php get_footer();