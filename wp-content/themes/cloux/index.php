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
						cloux_post_listing();
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