<?php
/*
	* The template used for displaying no content
*/
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-content-wrapper">
		<div class="single-content content-box no-content">
			<?php echo cloux_title( $title = esc_html__( 'No Content', 'cloux' ), $style = "style-3", $align = "center" ); ?>
			<?php
				if ( is_home() && current_user_can( 'publish_posts' ) ) {
					$get_started_here = esc_html__( 'Get started here.', 'cloux' );
					echo '<p>';
						echo esc_html__( "Any div doesn't exist in the site. Ready to publish your first post?", "cloux" );
						echo ' ' . '<a href="' . admin_url( 'post-new.php' ) . '">' . $get_started_here . '</a>';
					echo '</p>';
				} elseif ( is_search() ) {
					echo '<p>';
						echo esc_html__( "Sorry, but nothing matched your search terms. Please try again with different keywords.", "cloux" );
					echo '</p>';
					echo cloux_search_form();
				} else {
					echo '<p>';
						echo esc_html__( "It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.", "cloux" );
					echo '</p>';
					echo cloux_search_form();
				}
			?>
		</div>
	</div>
</div>