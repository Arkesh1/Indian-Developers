<?php
/*
	* The template used for displaying single content
*/
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-content-wrapper">
		<?php
			$layout_style = "style-1";
			if ( function_exists( 'rwmb_meta' ) ) {
				$layout_style = rwmb_meta( 'layout-style' );

				if( empty( $layout_style ) ) {
					$layout_style = 'style-1';
				}
			}
		?>
		<div class="page-content content-box <?php echo esc_attr( $layout_style ); ?>">
			<?php
				$page_image = get_theme_mod( 'cloux_pages_image', '1' );
					if( $page_image == "1" ) {
						echo cloux_featured_content( $post = get_the_ID() );
					}
 				?>
			<?php the_content(); ?>
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
		</div>
		<?php
			if ( function_exists( 'rwmb_meta' ) ) {
				$posts_share = get_theme_mod( 'cloux_pages_share', '1' );
				$hide_social_share = rwmb_meta( 'hide-social-share' );
				if ( $posts_share == '1' ) {
					if ( !$hide_social_share == '1' ) {
						echo '<div class="social-share content-box ' . esc_attr( $layout_style ) . '">';
							echo cloux_social_share();
						echo '</div>';
					}
				}
			}
		?>
	</div>
</div>