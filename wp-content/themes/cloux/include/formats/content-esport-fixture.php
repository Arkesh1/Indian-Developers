<?php
/*
	* The template used for displaying single esport fixture content
*/
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-content-wrapper">
		<?php
			if ( function_exists( 'rwmb_meta' ) ) {
				$url = get_post_meta( get_the_ID(), 'esport-fixture-match-video', true );
				$args = ['width' => 640];
				$embed = wp_oembed_get( $url, $args );
				if ( ! $embed ) {
					$embed = $GLOBALS['wp_embed']->shortcode( $args, $url );
				}
				if ( $embed ) {
					$video = rwmb_meta( 'esport-fixture-match-video' );
					if( !empty( $video ) ) {
						echo '<div class="esport-fixture-video content-box"">';
							echo rwmb_meta( 'esport-fixture-match-video' );
						echo '</div>';
					}
				}
			}
		?>
		<div class="single-content content-box">
			<?php
				if ( function_exists( 'rwmb_meta' ) ) {
					$featured_image = get_theme_mod( 'cloux_esport_fixture_image' );
					if ( $featured_image == '1' ) {
						echo cloux_featured_content( $post = get_the_ID() );
					}
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
				$posts_share = get_theme_mod( 'cloux_esport_fixture_share' );
				if ( $posts_share == '1' ) {
					echo '<div class="social-share content-box ' . esc_attr( $layout_style ) . '">';
						echo cloux_social_share();
					echo '</div>';
				}
			}
		?>
	</div>
</div>