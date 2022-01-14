<?php
/*
	* The template used for displaying single content
*/
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-content-wrapper">
		<div class="single-content content-box">
			<?php
				if ( function_exists( 'rwmb_meta' ) ) {
					$esport_players_image = get_theme_mod( 'cloux_esport_players_image' );
					if ( $esport_players_image == '1' ) {
						echo cloux_featured_content( $post = get_the_ID() );
					}
				}
			?>
			<?php
				if ( function_exists( 'rwmb_meta' ) ) {
					$username = rwmb_meta( 'esport-player-username' );
					if( !empty( $username ) ) {
						echo '<div class="esport-player-single-username">';
							echo esc_attr( $username );
						echo '</div>';
					}
				}
			?>
			<?php echo cloux_esport_player_social_link(); ?>
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
				$posts_share = get_theme_mod( 'cloux_esport_players_share' );
				if ( $posts_share == '1' ) {
					echo '<div class="social-share content-box ' . esc_attr( $layout_style ) . '">';
						echo cloux_social_share();
					echo '</div>';
				}
			}
		?>
	</div>
</div>