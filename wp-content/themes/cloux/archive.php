<?php
/*
	* The template for displaying archive
*/
get_header(); ?>

	<?php echo cloux_page_banner(); ?>

	<?php cloux_container_before( $extra_class = "main-container" ); ?>
		<?php cloux_row_before( $extra_class = "main-row" ); ?>
			<?php cloux_content_before(); ?>
				<?php
					if ( have_posts() ) {
						if ( is_post_type_archive( 'game' ) or is_tax( 'genre' ) or is_tax( 'game-category' ) or is_tax( 'game-tag' ) or is_tax( 'company' ) or is_tax( 'platform' ) or is_tax( 'os' ) or is_tax( 'mode' ) or is_tax( 'language' ) ) {
							cloux_game_listing();
						} elseif ( is_post_type_archive( 'esport-player' ) or is_tax( 'esport-game' ) ) {
							cloux_esport_player_listing();
						} elseif ( is_post_type_archive( 'esport-fixture' ) or is_tax( 'esport-team' )  or get_post_type( 'esport-fixture' ) or is_tax( 'esport-fixture-category' ) ) {
							cloux_esport_fixture_listing();
						} else {
							cloux_post_listing();
						}
						cloux_pagination();		
					} else {
						get_template_part( 'include/formats/content', 'none' );
					}
				?>
			<?php cloux_content_after(); ?>
			<?php get_sidebar(); ?>
		<?php cloux_row_after(); ?>
	<?php cloux_container_after(); ?>
	
<?php get_footer();