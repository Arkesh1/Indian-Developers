<?php
/*
	* The template used for displaying attachment
*/
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-content-wrapper">
		<div class="single-content content-box">
			<?php echo wp_get_attachment_link( get_the_ID(), 'full', true, true ); ?>
			<?php the_content(); ?>
		</div>
		<?php
			$share = get_theme_mod( 'cloux_archives_attachments_share', '1' );
			if ( $share == '1' ) {
				echo '<div class="social-share content-box">';
					echo cloux_social_share();
				echo '</div>';
			}
		?>
	</div>
</div>