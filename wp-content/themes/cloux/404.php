<?php
/*
	* The template for displaying 404 page
*/
get_header(); ?>

	<?php echo cloux_page_banner(); ?>

	<?php cloux_container_before( $extra_class = "main-container" ); ?>

	<div class="content-box">
		<div class="error404-content">
			<i class="fas fa-exclamation-circle"></i>
			<?php echo cloux_title( $title = esc_html__( 'Page Not', 'cloux' ), $style = "style-1", $align = "center", $colored_title = esc_html__( 'Found', 'cloux' ) ); ?>
			<p><?php echo esc_html__( 'Page not found! The page you are looking for cannot be found.', 'cloux' ); ?></p>
		</div>
	</div>

	<?php cloux_container_after(); ?>

<?php get_footer();