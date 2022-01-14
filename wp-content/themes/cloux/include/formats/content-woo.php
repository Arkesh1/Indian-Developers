<?php
/*
	* The template used for displaying single content
*/
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-content-wrapper">
		<?php
			if( is_page() ) {
				$layout_style = "style-1";
				if ( function_exists( 'rwmb_meta' ) ) {
					$layout_style = rwmb_meta( 'layout-style' );

					if( empty( $layout_style ) ) {
						$layout_style = 'style-1';
					}
				}
			} else {
				$layout_style = "style-1";				
			}
		?>
		<div class="page-content content-box <?php echo esc_attr( $layout_style ); ?>">
			<?php woocommerce_content(); ?>
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
	</div>
</div>