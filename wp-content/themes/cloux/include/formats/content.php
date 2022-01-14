<?php
/*
	* The template used for displaying single content
*/
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-content-wrapper">
		<div class="single-content content-box">
			<?php echo cloux_featured_content( $post = get_the_ID() ); ?>
			<?php the_content(); ?>
			<?php echo cloux_post_details( $post = get_the_ID(), $author = "true", $author = "true", $category = "true", $date = "true", $style = "style-1" ); ?>
			<?php
				wp_link_pages(
					array(
						'before' => '<div class="post-pages"><div class="title">' . esc_html__( 'Pages', 'cloux' ) . ':</div>',
						'after' => '</div>',
						'link_before' => '<span>',
						'link_after' => '</span>',
					)
				);
			?>
			<?php
				$posts_tags = get_theme_mod( 'cloux_posts_tags', '1' );
				if ( $posts_tags == '1' ) {
					the_tags( '<div class="post-tags"><ul class="list"><li class="title">' . esc_html__( 'Tags:', 'cloux' ) . '</li><li>', '</li><li>', '</li></ul></div>' ); 
				}
			?>
		</div>
		<?php echo cloux_post_review( $post = get_the_ID() ); ?>
		<?php
			$posts_share = get_theme_mod( 'cloux_posts_share', '1' );
			if ( $posts_share == '1' ) {
				echo '<div class="social-share content-box">';
					echo cloux_social_share();
				echo '</div>';
			}
		?>
		<?php
			$author_biography = get_theme_mod( 'cloux_posts_author_biography', '1' );
			if ( $author_biography == '1' ) {
				echo cloux_post_author();
			}
		?>
		<?php
			$posts_related = get_theme_mod( 'cloux_posts_related', '1' );
			if ( $posts_related == '1' ) {
				echo cloux_related_posts( $post = get_the_ID() );
			}
		?>
		<?php
			$posts_navigation = get_theme_mod( 'cloux_posts_navigation', '1' );
			if ( $posts_navigation == '1' ) {
				echo cloux_post_navigation();
			}
		?>
	</div>
</div>