<?php
/**
	* The template for displaying single
*/
get_header(); ?>

	<?php
		if ( function_exists( 'rwmb_meta' ) ) {
			$hide_page_banner = rwmb_meta( 'hide-page-banner' );
			if( !$hide_page_banner == "1" ) {
				echo cloux_page_banner();
			}
		} else {
			echo cloux_page_banner();
		}
	?>

	<?php
		$genre = wp_get_post_terms( get_the_ID(), 'genre' );
		$category = wp_get_post_terms( get_the_ID(), 'category' );
		$company = wp_get_post_terms( get_the_ID(), 'company' );
		$platform = wp_get_post_terms( get_the_ID(), 'platform' );
		$mode = wp_get_post_terms( get_the_ID(), 'mode' );
		$language = wp_get_post_terms( get_the_ID(), 'language' );
	?>

	<?php cloux_container_before( $extra_class = "main-container" ); ?>
		<?php while ( have_posts() ) { the_post(); ?>
			<?php cloux_row_before( $extra_class = "main-row" ); ?>
				<?php cloux_content_before(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="single-content-wrapper">
							<?php
								$media_tab = get_theme_mod( 'cloux_games_media_tab', '1' );
								if ( $media_tab == '1' ) {
									echo cloux_game_media();
								}
							?>
							<?php
								$price_list = get_theme_mod( 'cloux_games_price_list', '1' );
								if ( $price_list == '1' ) {
									echo cloux_game_price_list();
								}
							?>
							<?php 
								$content = get_the_content();
								if( !empty( $content ) ) {
									echo '<div class="single-content content-box">';
										echo cloux_title( $title = esc_html__( 'About', 'cloux' ), $style = "style-4", $align = "left", $colored_title = get_the_title() );
										the_content();
									echo '</div>';
								}
							?>
							<?php
								$system_requirements = get_theme_mod( 'cloux_games_system_requirements', '1' );
								if ( $system_requirements == '1' ) {
									echo cloux_system_requirements();
								}
							?>
							<?php
								$content_boxes = get_theme_mod( 'cloux_games_content_boxes', '1' );
								if ( $content_boxes == '1' ) {
									echo cloux_game_content_boxes();
								}
							?>
							<?php echo cloux_post_review( $post = get_the_ID() ); ?>
							<?php
								$posts_share = get_theme_mod( 'cloux_games_share', '1' );
								if ( $posts_share == '1' ) {
									echo '<div class="social-share content-box">';
										echo cloux_social_share();
									echo '</div>';
								}
							?>
							<?php
								$related_games = get_theme_mod( 'cloux_games_related_games', '1' );
								if ( $related_games == '1' ) {
									echo cloux_related_games( $game = get_the_ID() );
								}
							?>
						</div>
					</article>
				<?php cloux_content_after(); ?>
		<?php } ?>
		<?php while ( have_posts() ) { the_post(); ?>
				<?php cloux_sidebar_before(); ?>
					<?php
						$game_details = get_theme_mod( 'cloux_games_game_details', '1' );
						if ( $game_details == '1' ) {
							echo cloux_game_details_box();
						}
					?>
					<?php
						$game_poster = get_theme_mod( 'cloux_games_game_poster', '1' );
						if ( $game_poster == '1' ) {
							echo cloux_game_poster();
						}
					?>
					<?php
						$game_languages = get_theme_mod( 'cloux_games_game_languages', '1' );
						if ( $game_languages == '1' ) {
							echo cloux_game_languages();
						}
					?>
					<?php
						$game_reviews = get_theme_mod( 'cloux_games_game_reviews', '1' );
						if ( $game_reviews == '1' ) {
							echo cloux_game_reviews();
						}
					?>
					<?php
						$image_information = get_theme_mod( 'cloux_games_image_information', '1' );
						if ( $image_information == '1' ) {
							echo cloux_game_image_info();
						}
					?>
					<?php
						$sidebar_boxes = get_theme_mod( 'cloux_games_sidebar_boxes', '1' );
						if ( $sidebar_boxes == '1' ) {
							echo cloux_game_sidebar_boxes();
						}
					?>
					<?php
						$related_news = get_theme_mod( 'cloux_games_related_news', '1' );
						if ( $related_news == '1' ) {
							echo cloux_game_related_news();
						}
					?>
					<?php
						$contact_box = get_theme_mod( 'cloux_games_contact_box', '1' );
						if ( $contact_box == '1' ) {
							echo cloux_game_contact();
						}
					?>
				<?php cloux_sidebar_after(); ?>
			<?php cloux_row_after(); ?>
			<?php
				$posts_comment = get_theme_mod( 'cloux_games_comment', '1' );
				if ( $posts_comment == '1' ) {
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
			?>
		<?php } ?>
	<?php cloux_container_after(); ?>

		

<?php get_footer();