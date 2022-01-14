<?php

/*======
*
* Game Listing
*
======*/
function cloux_game_listing_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'game-ids' => '',
			'offset' => '',
			'game-count' => '',
			'order' => '',
			'order-type' => '',
			'pagination' => '',
			'exclude-games' => '',
			'exclude-categories' => '',
			'exclude-tags' => '',
			'exclude-genres' => '',
			'exclude-companies' => '',
			'exclude-platforms' => '',
			'exclude-os' => '',
			'exclude-modes' => '',
			'exclude-languages' => '',
			'include-categories' => '',
			'include-tags' => '',
			'include-genres' => '',
			'include-companies' => '',
			'include-platforms' => '',
			'include-os' => '',
			'include-modes' => '',
			'include-languages' => '',
			'game-style' => '',
			'column' => '',
			'game-platform' => '',
			'game-genre' => '',
			'game-price' => '',
			'game-description' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		/*====== Exclude Categories ======*/
		$exclude_categories_array = "";

		if( !empty( $atts['exclude-categories'] ) ) {
			$exclude_categories = $atts['exclude-categories'];
			$exclude_categories = explode( ',', $exclude_categories );
		} else {
			$exclude_categories = "";
		}

		if( !empty( $exclude_categories ) ) {
			$exclude_categories_array = array(
				'taxonomy' => 'game-category',
				'field' => 'term_id',
				'terms' => $exclude_categories,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Tags ======*/
		$exclude_tags_array = "";

		if( !empty( $atts['exclude-tags'] ) ) {
			$exclude_tags = $atts['exclude-tags'];
			$exclude_tags = explode( ',', $exclude_tags );
		} else {
			$exclude_tags = "";
		}

		if( !empty( $exclude_tags ) ) {
			$exclude_tags_array = array(
				'taxonomy' => 'game-tag',
				'field' => 'term_id',
				'terms' => $exclude_tags,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Genres ======*/
		$exclude_genres_array = "";

		if( !empty( $atts['exclude-genres'] ) ) {
			$exclude_genres = $atts['exclude-genres'];
			$exclude_genres = explode( ',', $exclude_genres );
		} else {
			$exclude_genres = "";
		}

		if( !empty( $exclude_genres ) ) {
			$exclude_genres_array = array(
				'taxonomy' => 'genre',
				'field' => 'term_id',
				'terms' => $exclude_genres,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Companies ======*/
		$exclude_companies_array = "";

		if( !empty( $atts['exclude-companies'] ) ) {
			$exclude_companies = $atts['exclude-companies'];
			$exclude_companies = explode( ',', $exclude_companies );
		} else {
			$exclude_companies = "";
		}

		if( !empty( $exclude_companies ) ) {
			$exclude_companies_array = array(
				'taxonomy' => 'company',
				'field' => 'term_id',
				'terms' => $exclude_companies,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Platforms ======*/
		$exclude_platforms_array = "";

		if( !empty( $atts['exclude-platforms'] ) ) {
			$exclude_platforms = $atts['exclude-platforms'];
			$exclude_platforms = explode( ',', $exclude_platforms );
		} else {
			$exclude_platforms = "";
		}

		if( !empty( $exclude_platforms ) ) {
			$exclude_platforms_array = array(
				'taxonomy' => 'platform',
				'field' => 'term_id',
				'terms' => $exclude_platforms,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude OS ======*/
		$exclude_os_array = "";

		if( !empty( $atts['exclude-os'] ) ) {
			$exclude_os = $atts['exclude-os'];
			$exclude_os = explode( ',', $exclude_os );
		} else {
			$exclude_os = "";
		}

		if( !empty( $exclude_os ) ) {
			$exclude_os_array = array(
				'taxonomy' => 'os',
				'field' => 'term_id',
				'terms' => $exclude_os,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Modes ======*/
		$exclude_modes_array = "";

		if( !empty( $atts['exclude-modes'] ) ) {
			$exclude_modes = $atts['exclude-modes'];
			$exclude_modes = explode( ',', $exclude_modes );
		} else {
			$exclude_modes = "";
		}

		if( !empty( $exclude_modes ) ) {
			$exclude_modes_array = array(
				'taxonomy' => 'mode',
				'field' => 'term_id',
				'terms' => $exclude_modes,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Languages ======*/
		$exclude_languages_array = "";

		if( !empty( $atts['exclude-languages'] ) ) {
			$exclude_languages = $atts['exclude-languages'];
			$exclude_languages = explode( ',', $exclude_languages );
		} else {
			$exclude_languages = "";
		}

		if( !empty( $exclude_languages ) ) {
			$exclude_languages_array = array(
				'taxonomy' => 'language',
				'field' => 'term_id',
				'terms' => $exclude_languages,
				'operator' => 'NOT IN',
			);
		}

		/*====== Include Categories ======*/
		$include_categories_array = "";

		if( !empty( $atts['include-categories'] ) ) {
			$include_categories = $atts['include-categories'];
			$include_categories = explode( ',', $include_categories );
		} else {
			$include_categories = "";
		}

		if( !empty( $include_categories ) ) {
			$include_categories_array = array(
				'taxonomy' => 'game-category',
				'field' => 'term_id',
				'terms' => $include_categories,
				'operator' => 'IN',
			);
		}

		/*====== Include Tags ======*/
		$include_tags_array = "";

		if( !empty( $atts['include-tags'] ) ) {
			$include_tags = $atts['include-tags'];
			$include_tags = explode( ',', $include_tags );
		} else {
			$include_tags = "";
		}

		if( !empty( $include_tags ) ) {
			$include_tags_array = array(
				'taxonomy' => 'game-tags',
				'field' => 'term_id',
				'terms' => $include_tags,
				'operator' => 'IN',
			);
		}

		/*====== Include Genres ======*/
		$include_genres_array = "";

		if( !empty( $atts['include-genres'] ) ) {
			$include_genres = $atts['include-genres'];
			$include_genres = explode( ',', $include_genres );
		} else {
			$include_genres = "";
		}

		if( !empty( $include_genres ) ) {
			$include_genres_array = array(
				'taxonomy' => 'genre',
				'field' => 'term_id',
				'terms' => $include_genres,
				'operator' => 'IN',
			);
		}

		/*====== Include Companies ======*/
		$include_companies_array = "";

		if( !empty( $atts['include-companies'] ) ) {
			$include_companies = $atts['include-companies'];
			$include_companies = explode( ',', $include_companies );
		} else {
			$include_companies = "";
		}

		if( !empty( $include_companies ) ) {
			$include_companies_array = array(
				'taxonomy' => 'company',
				'field' => 'term_id',
				'terms' => $include_companies,
				'operator' => 'IN',
			);
		}

		/*====== Include Platforms ======*/
		$include_platforms_array = "";

		if( !empty( $atts['include-platforms'] ) ) {
			$include_platform = $atts['include-platforms'];
			$include_platform = explode( ',', $include_platform );
		} else {
			$include_platform = "";
		}

		if( !empty( $include_platform ) ) {
			$include_platforms_array = array(
				'taxonomy' => 'platform',
				'field' => 'term_id',
				'terms' => $include_os,
				'operator' => 'IN',
			);
		}

		/*====== Include OS ======*/
		$include_os_array = "";

		if( !empty( $atts['include-os'] ) ) {
			$include_os = $atts['include-os'];
			$include_os = explode( ',', $include_os );
		} else {
			$include_os = "";
		}

		if( !empty( $include_os ) ) {
			$include_os_array = array(
				'taxonomy' => 'os',
				'field' => 'term_id',
				'terms' => $include_os,
				'operator' => 'IN',
			);
		}

		/*====== Include Modes ======*/
		$include_modes_array = "";

		if( !empty( $atts['include-modes'] ) ) {
			$include_modes = $atts['include-modes'];
			$include_modes = explode( ',', $include_modes );
		} else {
			$include_modes = "";
		}

		if( !empty( $include_modes ) ) {
			$include_modes_array = array(
				'taxonomy' => 'mode',
				'field' => 'term_id',
				'terms' => $include_modes,
				'operator' => 'IN',
			);
		}

		/*====== Include Languages ======*/
		$include_languages_array = "";

		if( !empty( $atts['include-languages'] ) ) {
			$include_languages = $atts['include-languages'];
			$include_languages = explode( ',', $include_languages );
		} else {
			$include_languages = "";
		}

		if( !empty( $include_languages ) ) {
			$include_languages_array = array(
				'taxonomy' => 'language',
				'field' => 'term_id',
				'terms' => $include_languages,
				'operator' => 'IN',
			);
		}

		/*====== Main Query ======*/
		$arg = array(
			'posts_per_page' => $atts['game-count'],
			'offset' => $atts['offset'],
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'post_type' => 'game',
			'tax_query' => array (
				'relation' => 'AND',
				$exclude_categories_array,
				$exclude_tags_array,
				$exclude_genres_array,
				$exclude_companies_array,
				$exclude_platforms_array,
				$exclude_os_array,
				$exclude_modes_array,
				$exclude_languages_array,
				$include_categories_array,
				$include_tags_array,
				$include_genres_array,
				$include_companies_array,
				$include_platforms_array,
				$include_os_array,
				$include_modes_array,
				$include_languages_array,
			)
		);

		/*====== Pagination ======*/
		if( !empty( $atts['pagination'] ) ) {
			$pagination = $atts['pagination'];
		} else {
			$pagination = "true";
		}

		if( $pagination == "true" ) {
			$paged = is_front_page() ? get_query_var( 'page', 1 ) : get_query_var( 'paged', 1 );
			if( empty( $paged ) ) { $paged = 1; }

			$extra_query = array(
				'paged' => $paged,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Order & Order By ======*/
		if( $atts["order"] == "ASC" ) {
			$order = "ASC";
		} else {
			$order = "DESC";
		}

		if( !empty( $order ) ) {
			$extra_query = array(
				'order' => $order,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		if( $atts["order-type"] == "popular-comment" ) {
			$order_by = "comment_count";
		} elseif( $atts["order-type"] == "id" ) {
			$order_by = "ID";
		} elseif( $atts["order-type"] == "popular" ) {
			$order_by = "comment_count";
		} elseif( $atts["order-type"] == "title" ) {
			$order_by = "title";
		} elseif( $atts["order-type"] == "menu_order" ) {
			$order_by = "menu_order";
		} elseif( $atts["order-type"] == "rand" ) {
			$order_by = "rand";
		} elseif( $atts["order-type"] == "none" ) {
			$order_by = "none";
		} else {
			$order_by = "date";
		}

		if( !empty( $order_by ) ) {
			$extra_query = array(
				'orderby' => $order_by,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Exclude Games ======*/
		if( !empty( $atts['exclude-games'] ) ) {
			$exclude_games = $atts['exclude-games'];
			$exclude_games = explode( ',', $exclude_games );
		} else {
			$exclude_games = "";
		}

		if( !empty( $exclude_games ) ) {
			$extra_query = array(
				'post__not_in' => $exclude_games,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Game IDs & Include Games ======*/
		if( !empty( $atts['game-ids'] ) ) {
			$game_ids = $atts['game-ids'];
			$include_posts = explode( ',', $game_ids );
		} else {
			$include_posts = "";
		}

		if( !empty( $include_posts ) ) {
			$extra_query = array(
				'post__in' => $include_posts,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Platform Status ======*/
		if( !empty( $atts['game-platform'] ) ) {
			$platform_status = $atts['game-platform'];
		} else {
			$platform_status = "true";
		}

		/*====== Genre Status ======*/
		if( !empty( $atts['game-genre'] ) ) {
			$genre_status = $atts['game-genre'];
		} else {
			$genre_status = "true";
		}

		/*====== Price Status ======*/
		if( !empty( $atts['game-price'] ) ) {
			$price_status = $atts['game-price'];
		} else {
			$price_status = "true";
		}

		/*====== Description Status ======*/
		if( !empty( $atts['game-description'] ) ) {
			$description_status = $atts['game-description'];
		} else {
			$description_status = "true";
		}

		/*====== Description Status ======*/
		if( !empty( $atts['column'] ) ) {
			$column = $atts['column'];
		} else {
			$column = "column-1";
		}


		/*====== HTML Output ======*/
		$wp_query = new WP_Query( $arg );
		if( $wp_query->have_posts() ) {
			$output .= '<div class="game-listing">';
				$output .= '<div class="game-list-style-1 game-list ' . esc_attr( $column ) . '">';
					while ( $wp_query->have_posts() ) {
						$wp_query->the_post();
						if( $atts['game-style'] == "style-2" ) {
							$output .= cloux_game_style_2( $game = get_the_ID(), $platform = $platform_status, $price = $price_status, $genre = $genre_status );
						} elseif( $atts['game-style'] == "style-3" ) {
							$output .= cloux_game_style_3( $game = get_the_ID(), $image = "true", $platform = $platform_status, $price = $price_status, $genre = $genre_status, $excerpt = $description_status );
						} else {
							$output .= cloux_game_style_1( $game = get_the_ID(), $poster = "true", $genre = $genre_status, $platform = $platform_status, $price = $price_status, $excerpt = $description_status );
						}
					}
				$output .= '</div>';

				if( $pagination == "true" ) {
					$output .= cloux_element_pagination( $paged = $paged, $query = $wp_query, $style = "style-1" );
				}
			$output .= '</div>';

		}
		wp_reset_postdata();

		return $output;

	}

}
add_shortcode( "cloux_game_listing", "cloux_game_listing_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Game Listing', 'cloux' ),
			"base" => "cloux_game_listing",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/game-listing.svg',
			"description" => esc_html__( 'Game listing element for games.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Game IDs", 'cloux' ),
					"description" => esc_html__( 'You can enter game ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "game-ids",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Games', 'cloux' ),
					"description" => esc_html__( 'You can enter game ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-games",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Offset', 'cloux' ),
					"description" => esc_html__( 'You can enter offset number.', 'cloux' ),
					"param_name" => "offset",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Game Count', 'cloux' ),
					"description" => esc_html__( 'You can enter game count.', 'cloux' ),
					"param_name" => "game-count",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order', 'cloux' ),
					"description" => esc_html__( 'You can choose a order.', 'cloux' ),
					"param_name" => "order",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'DESC', 'cloux' ) => 'DESC',
						esc_html__( 'ASC', 'cloux' ) => 'ASC',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order Type', 'cloux' ),
					"description" => esc_html__( 'You can choose a order type.', 'cloux' ),
					"param_name" => "order-type",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'Added Date', 'cloux' ) => 'added-date',
						esc_html__( 'Popular by Comment', 'cloux' ) => 'popular-comment',
						esc_html__( 'ID', 'cloux' ) => 'id',
						esc_html__( 'Title', 'cloux' ) => 'title',
						esc_html__( 'Menu Order', 'cloux' ) => 'menu_order',
						esc_html__( 'Random', 'cloux' ) => 'rand',
						esc_html__( 'None', 'cloux' ) => 'none',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Pagination', 'cloux' ),
					"description" => esc_html__( 'You can choose status of pagination.', 'cloux' ),
					"param_name" => "pagination",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Categories', 'cloux' ),
					"description" => esc_html__( 'You can enter category ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-categories",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Tags', 'cloux' ),
					"description" => esc_html__( 'You can enter tag ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-tags",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Genres', 'cloux' ),
					"description" => esc_html__( 'You can enter genre ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-genres",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Companies', 'cloux' ),
					"description" => esc_html__( 'You can enter company ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-companies",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Platforms', 'cloux' ),
					"description" => esc_html__( 'You can enter platform ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-platforms",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude OS', 'cloux' ),
					"description" => esc_html__( 'You can enter OS ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-os",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Modes', 'cloux' ),
					"description" => esc_html__( 'You can enter mode ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-modes",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Languages', 'cloux' ),
					"description" => esc_html__( 'You can enter language ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-languages",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Categories', 'cloux' ),
					"description" => esc_html__( 'You can enter category ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-categories",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Tags', 'cloux' ),
					"description" => esc_html__( 'You can enter tag ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-tags",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Genres', 'cloux' ),
					"description" => esc_html__( 'You can enter genre ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-genres",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Companies', 'cloux' ),
					"description" => esc_html__( 'You can enter company ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-companies",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Platforms', 'cloux' ),
					"description" => esc_html__( 'You can enter platform ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-platforms",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include OS', 'cloux' ),
					"description" => esc_html__( 'You can enter OS ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-os",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Modes', 'cloux' ),
					"description" => esc_html__( 'You can enter mode ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-modes",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Languages', 'cloux' ),
					"description" => esc_html__( 'You can enter language ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-languages",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a game list style.', 'cloux' ),
					"param_name" => "game-style",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
						esc_html__( 'Style 3', 'cloux' ) => 'style-3',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Column', 'cloux' ),
					"description" => esc_html__( 'You can choose a column.', 'cloux' ),
					"param_name" => "column",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( '1 Column', 'cloux' ) => 'column-1',
						esc_html__( '2 Column', 'cloux' ) => 'column-2',
						esc_html__( '3 Column', 'cloux' ) => 'column-3',
						esc_html__( '4 Column', 'cloux' ) => 'column-4',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Platform', 'cloux' ),
					"description" => esc_html__( 'You can choose status of platform detail.', 'cloux' ),
					"param_name" => "game-platform",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Genre', 'cloux' ),
					"description" => esc_html__( 'You can choose status of genre detail.', 'cloux' ),
					"param_name" => "game-genre",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Price', 'cloux' ),
					"description" => esc_html__( 'You can choose status of price detail.', 'cloux' ),
					"param_name" => "game-price",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Description', 'cloux' ),
					"description" => esc_html__( 'You can choose status of game description.', 'cloux' ),
					"param_name" => "game-description",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
			),
		)
	);
}



/*======
*
* Categorized Games
*
======*/
function cloux_categorized_games_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'element-type' => '',
			'game-ids' => '',
			'offset' => '',
			'game-count' => '',
			'order' => '',
			'order-type' => '',
			'exclude-games' => '',
			'empty-taxonomies' => '',
			'childless' => '',
			'exclude-categories' => '',
			'exclude-tags' => '',
			'exclude-genres' => '',
			'exclude-companies' => '',
			'exclude-platforms' => '',
			'exclude-os' => '',
			'exclude-modes' => '',
			'exclude-languages' => '',
			'include-categories' => '',
			'include-tags' => '',
			'include-genres' => '',
			'include-companies' => '',
			'include-platforms' => '',
			'include-os' => '',
			'include-modes' => '',
			'include-languages' => '',
			'game-style' => '',
			'column' => '',
			'game-platform' => '',
			'game-genre' => '',
			'game-price' => '',
			'game-description' => '',
			'cat-list-align' => '',
			'all-tab' => '',
			'all-tab-all' => '',
			'all-tab-all-games' => '',
			'all-games-link-other' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		/*====== Exclude Categories ======*/
		$exclude_categories_array = "";

		if( !empty( $atts['exclude-categories'] ) ) {
			$exclude_categories = $atts['exclude-categories'];
			$exclude_categories = explode( ',', $exclude_categories );
		} else {
			$exclude_categories = "";
		}

		if( !empty( $exclude_categories ) ) {
			$exclude_categories_array = array(
				'taxonomy' => 'game-category',
				'field' => 'term_id',
				'terms' => $exclude_categories,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Tags ======*/
		$exclude_tags_array = "";

		if( !empty( $atts['exclude-tags'] ) ) {
			$exclude_tags = $atts['exclude-tags'];
			$exclude_tags = explode( ',', $exclude_tags );
		} else {
			$exclude_tags = "";
		}

		if( !empty( $exclude_tags ) ) {
			$exclude_tags_array = array(
				'taxonomy' => 'game-tag',
				'field' => 'term_id',
				'terms' => $exclude_tags,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Genres ======*/
		$exclude_genres_array = "";

		if( !empty( $atts['exclude-genres'] ) ) {
			$exclude_genres = $atts['exclude-genres'];
			$exclude_genres = explode( ',', $exclude_genres );
		} else {
			$exclude_genres = "";
		}

		if( !empty( $exclude_genres ) ) {
			$exclude_genres_array = array(
				'taxonomy' => 'genre',
				'field' => 'term_id',
				'terms' => $exclude_genres,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Companies ======*/
		$exclude_companies_array = "";

		if( !empty( $atts['exclude-companies'] ) ) {
			$exclude_companies = $atts['exclude-companies'];
			$exclude_companies = explode( ',', $exclude_companies );
		} else {
			$exclude_companies = "";
		}

		if( !empty( $exclude_companies ) ) {
			$exclude_companies_array = array(
				'taxonomy' => 'company',
				'field' => 'term_id',
				'terms' => $exclude_companies,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Platforms ======*/
		$exclude_platforms_array = "";

		if( !empty( $atts['exclude-platforms'] ) ) {
			$exclude_platforms = $atts['exclude-platforms'];
			$exclude_platforms = explode( ',', $exclude_platforms );
		} else {
			$exclude_platforms = "";
		}

		if( !empty( $exclude_platforms ) ) {
			$exclude_platforms_array = array(
				'taxonomy' => 'platform',
				'field' => 'term_id',
				'terms' => $exclude_platforms,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude OS ======*/
		$exclude_os_array = "";

		if( !empty( $atts['exclude-os'] ) ) {
			$exclude_os = $atts['exclude-os'];
			$exclude_os = explode( ',', $exclude_os );
		} else {
			$exclude_os = "";
		}

		if( !empty( $exclude_os ) ) {
			$exclude_os_array = array(
				'taxonomy' => 'os',
				'field' => 'term_id',
				'terms' => $exclude_os,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Modes ======*/
		$exclude_modes_array = "";

		if( !empty( $atts['exclude-modes'] ) ) {
			$exclude_modes = $atts['exclude-modes'];
			$exclude_modes = explode( ',', $exclude_modes );
		} else {
			$exclude_modes = "";
		}

		if( !empty( $exclude_modes ) ) {
			$exclude_modes_array = array(
				'taxonomy' => 'mode',
				'field' => 'term_id',
				'terms' => $exclude_modes,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Languages ======*/
		$exclude_languages_array = "";

		if( !empty( $atts['exclude-languages'] ) ) {
			$exclude_languages = $atts['exclude-languages'];
			$exclude_languages = explode( ',', $exclude_languages );
		} else {
			$exclude_languages = "";
		}

		if( !empty( $exclude_languages ) ) {
			$exclude_languages_array = array(
				'taxonomy' => 'language',
				'field' => 'term_id',
				'terms' => $exclude_languages,
				'operator' => 'NOT IN',
			);
		}

		/*====== Include Categories ======*/
		$include_categories_array = "";

		if( !empty( $atts['include-categories'] ) ) {
			$include_categories = $atts['include-categories'];
			$include_categories = explode( ',', $include_categories );
		} else {
			$include_categories = "";
		}

		if( !empty( $include_categories ) ) {
			$include_categories_array = array(
				'taxonomy' => 'game-category',
				'field' => 'term_id',
				'terms' => $include_categories,
				'operator' => 'IN',
			);
		}

		/*====== Include Tags ======*/
		$include_tags_array = "";

		if( !empty( $atts['include-tags'] ) ) {
			$include_tags = $atts['include-tags'];
			$include_tags = explode( ',', $include_tags );
		} else {
			$include_tags = "";
		}

		if( !empty( $include_tags ) ) {
			$include_tags_array = array(
				'taxonomy' => 'game-tags',
				'field' => 'term_id',
				'terms' => $include_tags,
				'operator' => 'IN',
			);
		}

		/*====== Include Genres ======*/
		$include_genres_array = "";

		if( !empty( $atts['include-genres'] ) ) {
			$include_genres = $atts['include-genres'];
			$include_genres = explode( ',', $include_genres );
		} else {
			$include_genres = "";
		}

		if( !empty( $include_genres ) ) {
			$include_genres_array = array(
				'taxonomy' => 'genre',
				'field' => 'term_id',
				'terms' => $include_genres,
				'operator' => 'IN',
			);
		}

		/*====== Include Companies ======*/
		$include_companies_array = "";

		if( !empty( $atts['include-companies'] ) ) {
			$include_companies = $atts['include-companies'];
			$include_companies = explode( ',', $include_companies );
		} else {
			$include_companies = "";
		}

		if( !empty( $include_companies ) ) {
			$include_companies_array = array(
				'taxonomy' => 'company',
				'field' => 'term_id',
				'terms' => $include_companies,
				'operator' => 'IN',
			);
		}

		/*====== Include Platforms ======*/
		$include_platforms_array = "";

		if( !empty( $atts['include-platforms'] ) ) {
			$include_platform = $atts['include-platforms'];
			$include_platform = explode( ',', $include_platform );
		} else {
			$include_platform = "";
		}

		if( !empty( $include_platform ) ) {
			$include_platforms_array = array(
				'taxonomy' => 'platform',
				'field' => 'term_id',
				'terms' => $include_os,
				'operator' => 'IN',
			);
		}

		/*====== Include OS ======*/
		$include_os_array = "";

		if( !empty( $atts['include-os'] ) ) {
			$include_os = $atts['include-os'];
			$include_os = explode( ',', $include_os );
		} else {
			$include_os = "";
		}

		if( !empty( $include_os ) ) {
			$include_os_array = array(
				'taxonomy' => 'os',
				'field' => 'term_id',
				'terms' => $include_os,
				'operator' => 'IN',
			);
		}

		/*====== Include Modes ======*/
		$include_modes_array = "";

		if( !empty( $atts['include-modes'] ) ) {
			$include_modes = $atts['include-modes'];
			$include_modes = explode( ',', $include_modes );
		} else {
			$include_modes = "";
		}

		if( !empty( $include_modes ) ) {
			$include_modes_array = array(
				'taxonomy' => 'mode',
				'field' => 'term_id',
				'terms' => $include_modes,
				'operator' => 'IN',
			);
		}

		/*====== Include Languages ======*/
		$include_languages_array = "";

		if( !empty( $atts['include-languages'] ) ) {
			$include_languages = $atts['include-languages'];
			$include_languages = explode( ',', $include_languages );
		} else {
			$include_languages = "";
		}

		if( !empty( $include_languages ) ) {
			$include_languages_array = array(
				'taxonomy' => 'language',
				'field' => 'term_id',
				'terms' => $include_languages,
				'operator' => 'IN',
			);
		}

		/*====== Main Query ======*/
		$arg = array(
			'posts_per_page' => $atts['game-count'],
			'offset' => $atts['offset'],
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'post_type' => 'game',
			'tax_query' => array (
				'relation' => 'AND',
				$exclude_categories_array,
				$exclude_tags_array,
				$exclude_genres_array,
				$exclude_companies_array,
				$exclude_platforms_array,
				$exclude_os_array,
				$exclude_modes_array,
				$exclude_languages_array,
				$include_categories_array,
				$include_tags_array,
				$include_genres_array,
				$include_companies_array,
				$include_platforms_array,
				$include_os_array,
				$include_modes_array,
				$include_languages_array,
			)
		);

		$tab_arg = array(
			'posts_per_page' => $atts['game-count'],
			'offset' => $atts['offset'],
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'post_type' => 'game',
		);

		/*====== Order & Order By ======*/
		if( $atts["order"] == "ASC" ) {
			$order = "ASC";
		} else {
			$order = "DESC";
		}

		if( !empty( $order ) ) {
			$extra_query = array(
				'order' => $order,
			);
			$arg = wp_parse_args( $arg, $extra_query );
			$tab_arg = wp_parse_args( $tab_arg, $extra_query );
		}

		if( $atts["order-type"] == "popular-comment" ) {
			$order_by = "comment_count";
		} elseif( $atts["order-type"] == "id" ) {
			$order_by = "ID";
		} elseif( $atts["order-type"] == "popular" ) {
			$order_by = "comment_count";
		} elseif( $atts["order-type"] == "title" ) {
			$order_by = "title";
		} elseif( $atts["order-type"] == "menu_order" ) {
			$order_by = "menu_order";
		} elseif( $atts["order-type"] == "rand" ) {
			$order_by = "rand";
		} elseif( $atts["order-type"] == "none" ) {
			$order_by = "none";
		} else {
			$order_by = "date";
		}

		if( !empty( $order_by ) ) {
			$extra_query = array(
				'orderby' => $order_by,
			);
			$arg = wp_parse_args( $arg, $extra_query );
			$tab_arg = wp_parse_args( $tab_arg, $extra_query );
		}

		/*====== Exclude Games ======*/
		if( !empty( $atts['exclude-games'] ) ) {
			$exclude_games = $atts['exclude-games'];
			$exclude_games = explode( ',', $exclude_games );
		} else {
			$exclude_games = "";
		}

		if( !empty( $exclude_games ) ) {
			$extra_query = array(
				'post__not_in' => $exclude_games,
			);
			$arg = wp_parse_args( $arg, $extra_query );
			$tab_arg = wp_parse_args( $tab_arg, $extra_query );
		}

		/*====== Game IDs & Include Games ======*/
		if( !empty( $atts['game-ids'] ) ) {
			$game_ids = $atts['game-ids'];
			$include_posts = explode( ',', $game_ids );
		} else {
			$include_posts = "";
		}

		if( !empty( $include_posts ) ) {
			$extra_query = array(
				'post__in' => $include_posts,
			);
			$arg = wp_parse_args( $arg, $extra_query );
			$tab_arg = wp_parse_args( $tab_arg, $extra_query );
		}

		/*====== All Tab Control ======*/
		if( !empty( $atts['cat-list-align'] ) ) {
			$cat_list_align = $atts['cat-list-align'];
		} else {
			$cat_list_align = "left";
		}

		/*====== All Tab Control ======*/
		if( !empty( $atts['all-tab'] ) ) {
			$all_tab = $atts['all-tab'];
		} else {
			$all_tab = "true";
		}

		/*====== All Link Control for All Tab ======*/
		if( !empty( $atts['all-tab-all'] ) ) {
			$all_tab_all = $atts['all-tab-all'];
		} else {
			$all_tab_all = "true";
		}

		/*====== Platform Status ======*/
		if( !empty( $atts['game-platform'] ) ) {
			$platform_status = $atts['game-platform'];
		} else {
			$platform_status = "true";
		}

		/*====== Genre Status ======*/
		if( !empty( $atts['game-genre'] ) ) {
			$genre_status = $atts['game-genre'];
		} else {
			$genre_status = "true";
		}

		/*====== Price Status ======*/
		if( !empty( $atts['game-price'] ) ) {
			$price_status = $atts['game-price'];
		} else {
			$price_status = "true";
		}

		/*====== Description Status ======*/
		if( !empty( $atts['game-description'] ) ) {
			$description_status = $atts['game-description'];
		} else {
			$description_status = "true";
		}

		/*====== Description Status ======*/
		if( !empty( $atts['column'] ) ) {
			$column = $atts['column'];
		} else {
			$column = "column-1";
		}

		/*====== All Link Control for All Tab ======*/
		if( !empty( $atts['all-games-link-other'] ) ) {
			$all_games_link_others = $atts['all-games-link-other'];
		} else {
			$all_games_link_others = "true";
		}

		/*====== Empty Categories ======*/
		if( $atts['empty-taxonomies'] == 'false' ) {
			$empty_taxonomies = false;
		} else {
			$empty_taxonomies = true;
		}

		/*====== Childless ======*/
		if( $atts['childless'] == 'false' ) {
			$childless = false;
		} else {
			$childless = true;
		}

		/*====== Element Type Chooser & Taxonomy Query ======*/
		if( $atts['element-type'] == "tag" ) {
			$taxonomy = "game-tag";
		} elseif( $atts['element-type'] == "genre" ) {
			$taxonomy = "genre";
		} elseif( $atts['element-type'] == "company" ) {
			$taxonomy = "company";
		} elseif( $atts['element-type'] == "platform" ) {
			$taxonomy = "platform";
		} elseif( $atts['element-type'] == "os" ) {
			$taxonomy = "os";
		} elseif( $atts['element-type'] == "mode" ) {
			$taxonomy = "mode";
		} elseif( $atts['element-type'] == "language" ) {
			$taxonomy = "language";
		} else {
			$taxonomy = "game-category";
		}

		$terms = get_terms(
			array(
				'taxonomy' => $taxonomy,
				'exclude' => $exclude_categories,
				'include' => $include_categories,
				'hide_empty' => $empty_taxonomies,
				'childless' => $childless
			)
		);


		/*====== HTML Output ======*/
		$output .= '<div class="categorized-games">';
			/*====== Tabs ======*/
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				$output .= '<ul class="nav cloux-tabs categorized-games-tabs cloux-first-tab ' . esc_attr( $cat_list_align ) . '" role="tablist">';
					/*====== All Tab ======*/
					if( $all_tab == "true" ) {
						$output .= '<li><a data-toggle="tab" href="#categorized-all" role="tab" aria-controls="categorized-all">' . esc_html__( 'All', 'cloux' ) . '</a></li>';
					}

					/*====== Tabs of Terms ======*/
					if( !empty( $terms ) ) {
						foreach ( $terms as $term ) {
							if( !empty( $term ) ) {
								$tab_term_name = $term->name;
								$tab_term_slug = $term->slug;
								if( !empty( $tab_term_slug ) ) {
									$output .= '<li>';
										$output .= '<a data-toggle="tab" href="#categorized-' . esc_attr( $tab_term_slug ) . '" aria-controls="categorized-' . esc_attr( $tab_term_slug ) . '" role="tab">';
											if( !empty( $tab_term_name ) ) {
												$output .= $tab_term_name;
											}
										$output .= '</a>';
									$output .= '</li>';
								}
							}
						}
					}
				$output .= '</ul>';
			}

			/*====== Content of Tabs ======*/
			$output .= '<div class="tab-content categorized-games-tab-content cloux-first-tab">';
				/*====== All Tab Content ======*/
				if( $all_tab == "true" ) {
					$output .= '<div class="tab-pane fade" id="categorized-all" role="tabpanel" aria-labelledby="categorized-all">';
						$wp_query = new WP_Query( $arg );
						if( $wp_query->have_posts() ) {
							$output .= '<div class="game-list-style-1 game-list ' . esc_attr( $column ) . '">';
								while ( $wp_query->have_posts() ) {
									$wp_query->the_post();
									if( $atts['game-style'] == "style-2" ) {
										$output .= cloux_game_style_2( $game = get_the_ID(), $platform = $platform_status, $price = $price_status, $genre = $genre_status );
									} elseif( $atts['game-style'] == "style-3" ) {
										$output .= cloux_game_style_3( $game = get_the_ID(), $image = "true", $platform = $platform_status, $price = $price_status, $genre = $genre_status, $excerpt = $description_status );
									} else {
										$output .= cloux_game_style_1( $game = get_the_ID(), $poster = "true", $genre = $genre_status, $platform = $platform_status, $price = $price_status, $excerpt = $description_status );
									}
								}
							$output .= '</div>';
						}
						wp_reset_postdata();

						if( $all_tab_all == "true" ) {
							if( !empty( $atts["all-tab-all-games"] ) ) {
								$all_href = $atts["all-tab-all-games"];
								$all_href = vc_build_link( $all_href );
								if( !empty( $all_href["target"] ) ) {
									$all_target = $all_href["target"];
								} else {
									$all_target = "_parent";
								}

								$output .= '<div class="cloux-button style-1 center">';
									$output .= '<a href="' . esc_url( $all_href["url"] ) . '" title="' . esc_attr( $all_href["title"] ) . '" target="' . esc_attr( $all_target ) . '"><span>' . esc_attr( $all_href["title"] ) . '</span></a>';
								$output .= '</div>';
							}
						}
					$output .= '</div>';
				}

				/*====== Games of Terms ======*/
				if( !empty( $terms ) ) {
					foreach ( $terms as $content_term ) {
						if( !empty( $content_term ) ) {
							$content_term_name = $content_term->name;
							$content_term_slug = $content_term->slug;
							$content_term_term_id = $content_term->term_id;

							if( !empty( $content_term_slug ) ) {
								$output .= '<div class="tab-pane fade" id="categorized-' . esc_attr( $content_term_slug ) . '" role="tabpanel" aria-labelledby="categorized-' . esc_attr( $content_term_slug ) . '">';

									$tax_extra_query = array(
										'tax_query' => array(
											array(
												array(
													'taxonomy' => $taxonomy,
													'field' => 'slug',
													'terms' => array( $content_term_slug ),
												),
											),
										),
									);
									$tab_arg_tab = wp_parse_args( $tab_arg, $tax_extra_query );

									$wp_query_tab = new WP_Query( $tab_arg_tab );
									if( !empty( $wp_query_tab ) ) {
										$output .= '<div class="game-list-style-1 game-list ' . esc_attr( $column ) . '">';
											while ( $wp_query_tab->have_posts() ) {
												$wp_query_tab->the_post();
												if( $atts['game-style'] == "style-2" ) {
													$output .= cloux_game_style_2( $game = get_the_ID(), $platform = $platform_status, $price = $price_status, $genre = $genre_status );
												} elseif( $atts['game-style'] == "style-3" ) {
													$output .= cloux_game_style_3( $game = get_the_ID(), $image = "true", $platform = $platform_status, $price = $price_status, $genre = $genre_status, $excerpt = $description_status );
												} else {
													$output .= cloux_game_style_1( $game = get_the_ID(), $poster = "true", $genre = $genre_status, $platform = $platform_status, $price = $price_status, $excerpt = $description_status );
												}
											}
										$output .= '</div>';
									}
									wp_reset_postdata();

									if( $all_games_link_others == "true" ) {
										$output .= '<div class="cloux-button style-1 center">';
											$output .= '<a href="' . esc_url( get_term_link( $content_term_term_id ) ) . '" title="' . esc_attr( $content_term_name ) . '"><span>' . esc_html__( 'All', 'cloux' ) . ' ' . esc_attr( $content_term_name ) . ' ' . esc_html__( 'Games', 'cloux' ) . '</span></a>';
										$output .= '</div>';
									}

								$output .= '</div>';
							}
						}
					}
				}
			$output .= '</div>';
		$output .= '</div>';

		return $output;

	}

}
add_shortcode( "cloux_categorized_games", "cloux_categorized_games_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Categorized Games', 'cloux' ),
			"base" => "cloux_categorized_games",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/categorized-games.svg',
			"description" => esc_html__( 'Categorized games element for games.', 'cloux' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Element Type', 'cloux' ),
					"description" => esc_html__( 'You can choose a element type.', 'cloux' ),
					"param_name" => "element-type",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'Categorize with Categories', 'cloux' ) => 'category',
						esc_html__( 'Categorize with Tags', 'cloux' ) => 'tag',
						esc_html__( 'Categorize with Genres', 'cloux' ) => 'genre',
						esc_html__( 'Categorize with Companies', 'cloux' ) => 'company',
						esc_html__( 'Categorize with Platforms', 'cloux' ) => 'platform',
						esc_html__( 'Categorize with OS', 'cloux' ) => 'os',
						esc_html__( 'Categorize with Modes', 'cloux' ) => 'mode',
						esc_html__( 'Categorize with Languages', 'cloux' ) => 'language',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Game IDs", 'cloux' ),
					"description" => esc_html__( 'You can enter game ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "game-ids",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Games', 'cloux' ),
					"description" => esc_html__( 'You can enter game ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-games",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Offset', 'cloux' ),
					"description" => esc_html__( 'You can enter offset number.', 'cloux' ),
					"param_name" => "offset",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Game Count', 'cloux' ),
					"description" => esc_html__( 'You can enter game count.', 'cloux' ),
					"param_name" => "game-count",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order', 'cloux' ),
					"description" => esc_html__( 'You can choose a order.', 'cloux' ),
					"param_name" => "order",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'DESC', 'cloux' ) => 'DESC',
						esc_html__( 'ASC', 'cloux' ) => 'ASC',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order Type', 'cloux' ),
					"description" => esc_html__( 'You can choose a order type.', 'cloux' ),
					"param_name" => "order-type",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'Added Date', 'cloux' ) => 'added-date',
						esc_html__( 'Popular by Comment', 'cloux' ) => 'popular-comment',
						esc_html__( 'ID', 'cloux' ) => 'id',
						esc_html__( 'Title', 'cloux' ) => 'title',
						esc_html__( 'Menu Order', 'cloux' ) => 'menu_order',
						esc_html__( 'Random', 'cloux' ) => 'rand',
						esc_html__( 'None', 'cloux' ) => 'none',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Empty Taxonomies', 'cloux' ),
					"description" => esc_html__( 'You can choose visible status of empty taxonomies. If you choose true option empty taxonomies will be hide.', 'cloux' ),
					"param_name" => "empty-taxonomies",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Childless', 'cloux' ),
					"description" => esc_html__( 'You can choose status of childless.', 'cloux' ),
					"param_name" => "childless",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Categories', 'cloux' ),
					"description" => esc_html__( 'You can enter category ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-categories",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Tags', 'cloux' ),
					"description" => esc_html__( 'You can enter tag ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-tags",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Genres', 'cloux' ),
					"description" => esc_html__( 'You can enter genre ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-genres",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Companies', 'cloux' ),
					"description" => esc_html__( 'You can enter company ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-companies",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Platforms', 'cloux' ),
					"description" => esc_html__( 'You can enter platform ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-platforms",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude OS', 'cloux' ),
					"description" => esc_html__( 'You can enter OS ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-os",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Modes', 'cloux' ),
					"description" => esc_html__( 'You can enter mode ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-modes",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Languages', 'cloux' ),
					"description" => esc_html__( 'You can enter language ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-languages",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Categories', 'cloux' ),
					"description" => esc_html__( 'You can enter category ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-categories",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Tags', 'cloux' ),
					"description" => esc_html__( 'You can enter tag ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-tags",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Genres', 'cloux' ),
					"description" => esc_html__( 'You can enter genre ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-genres",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Companies', 'cloux' ),
					"description" => esc_html__( 'You can enter company ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-companies",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Platforms', 'cloux' ),
					"description" => esc_html__( 'You can enter platform ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-platforms",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include OS', 'cloux' ),
					"description" => esc_html__( 'You can enter OS ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-os",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Modes', 'cloux' ),
					"description" => esc_html__( 'You can enter mode ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-modes",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Languages', 'cloux' ),
					"description" => esc_html__( 'You can enter language ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-languages",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a game list style.', 'cloux' ),
					"param_name" => "game-style",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
						esc_html__( 'Style 3', 'cloux' ) => 'style-3',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Column', 'cloux' ),
					"description" => esc_html__( 'You can choose a column.', 'cloux' ),
					"param_name" => "column",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( '1 Column', 'cloux' ) => 'column-1',
						esc_html__( '2 Column', 'cloux' ) => 'column-2',
						esc_html__( '3 Column', 'cloux' ) => 'column-3',
						esc_html__( '4 Column', 'cloux' ) => 'column-4',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Platform', 'cloux' ),
					"description" => esc_html__( 'You can choose status of platform detail.', 'cloux' ),
					"param_name" => "game-platform",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Genre', 'cloux' ),
					"description" => esc_html__( 'You can choose status of genre detail.', 'cloux' ),
					"param_name" => "game-genre",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Price', 'cloux' ),
					"description" => esc_html__( 'You can choose status of price detail.', 'cloux' ),
					"param_name" => "game-price",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Description', 'cloux' ),
					"description" => esc_html__( 'You can choose status of game description.', 'cloux' ),
					"param_name" => "game-description",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Category List Align', 'cloux' ),
					"description" => esc_html__( 'You can choose align of category list.', 'cloux' ),
					"param_name" => "cat-list-align",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'Left', 'cloux' ) => 'left',
						esc_html__( 'Center', 'cloux' ) => 'center',
						esc_html__( 'Right', 'cloux' ) => 'right',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'All Tab', 'cloux' ),
					"description" => esc_html__( 'You can choose status of all tab.', 'cloux' ),
					"param_name" => "all-tab",
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'All Link for All Tab', 'cloux' ),
					"description" => esc_html__( 'You can choose status of all link for all tab.', 'cloux' ),
					"param_name" => "all-tab-all",
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'All Games Link for All Tab', 'cloux' ),
					"description" => esc_html__( 'You can enter all games link for all tab.', 'cloux' ),
					"param_name" => "all-tab-all-games",
					"group" => esc_html__( 'Design', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'All Games Link for Other Tabs', 'cloux' ),
					"description" => esc_html__( 'You can choose status of all games link for other tabs.', 'cloux' ),
					"param_name" => "all-games-link-other",
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
			),
		)
	);
}



/*======
*
* Game Slider
*
======*/
function cloux_game_slider_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'game-ids' => '',
			'exclude-games' => '',
			'offset' => '',
			'game-count' => '',
			'exclude-categories' => '',
			'exclude-tags' => '',
			'exclude-genres' => '',
			'exclude-companies' => '',
			'exclude-platforms' => '',
			'exclude-os' => '',
			'exclude-modes' => '',
			'exclude-languages' => '',
			'include-categories' => '',
			'include-tags' => '',
			'include-genres' => '',
			'include-companies' => '',
			'include-platforms' => '',
			'include-os' => '',
			'include-modes' => '',
			'include-languages' => '',
			'autoplay' => '',
			'autoplay-speed' => '',
			'arrows' => '',
			'dots' => '',
			'fade' => '',
			'button-style' => '',
			'order' => '',
			'order-type' => '',
			'game-price' => '',
			'game-genre' => '',
			'game-platform' => '',
			'game-description' => '',
			'game-detail-button' => '',
			'game-detail-button-text' => '',
			'buy-now-button' => '',
			'buy-now-button-text' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		/*====== Autoplay ======*/
		if( !empty( $atts['autoplay'] ) ) {
			$autoplay = $atts['autoplay'];
		} else {
			$autoplay = "true";
		}

		/*====== Autoplay Speed ======*/
		if( !empty( $atts['autoplay-speed'] ) ) {
			$autoplay_speed = $atts['autoplay-speed'];
		} else {
			$autoplay_speed = "7000";
		}

		/*====== Arrows ======*/
		if( !empty( $atts['arrows'] ) ) {
			$arrows = $atts['arrows'];
		} else {
			$arrows = "true";
		}

		/*====== Button Style ======*/
		if( !empty( $atts['button-style'] ) ) {
			$button_style = $atts['button-style'];
		} else {
			$button_style = "style-2";
		}

		/*====== Dots ======*/
		if( !empty( $atts['dots'] ) ) {
			$dots = $atts['dots'];
		} else {
			$dots = "true";
		}

		/*====== Fade ======*/
		if( !empty( $atts['fade'] ) ) {
			$fade = $atts['fade'];
		} else {
			$fade = "true";
		}

		/*====== Game Price ======*/
		if( !empty( $atts['game-price'] ) ) {
			$game_price = $atts['game-price'];
		} else {
			$game_price = "true";
		}

		/*====== Game Genre ======*/
		if( !empty( $atts['game-genre'] ) ) {
			$game_genre = $atts['game-genre'];
		} else {
			$game_genre = "true";
		}

		/*====== Game Platform ======*/
		if( !empty( $atts['game-platform'] ) ) {
			$game_platform = $atts['game-platform'];
		} else {
			$game_platform = "true";
		}

		/*====== Game Description ======*/
		if( !empty( $atts['game-description'] ) ) {
			$game_description = $atts['game-description'];
		} else {
			$game_description = "true";
		}

		/*====== Game Detail Button ======*/
		if( !empty( $atts['game-detail-button'] ) ) {
			$game_detail_button = $atts['game-detail-button'];
		} else {
			$game_detail_button = "true";
		}

		/*====== Game Detail Button Text ======*/
		if( !empty( $atts['game-detail-button-text'] ) ) {
			$game_detail_button_text = $atts['game-detail-button-text'];
		} else {
			$game_detail_button_text = esc_html__( 'Game Details', 'cloux' );
		}

		/*====== Buy Now Button ======*/
		if( !empty( $atts['buy-now-button'] ) ) {
			$buy_now_button = $atts['buy-now-button'];
		} else {
			$buy_now_button = "true";
		}

		/*====== Buy Now Button Text ======*/
		if( !empty( $atts['buy-now-button-text'] ) ) {
			$buy_now_button_text = $atts['buy-now-button-text'];
		} else {
			$buy_now_button_text = esc_html__( 'Buy Now', 'cloux' );
		}

		/*====== Exclude Categories ======*/
		$exclude_categories_array = "";

		if( !empty( $atts['exclude-categories'] ) ) {
			$exclude_categories = $atts['exclude-categories'];
			$exclude_categories = explode( ',', $exclude_categories );
		} else {
			$exclude_categories = "";
		}

		if( !empty( $exclude_categories ) ) {
			$exclude_categories_array = array(
				'taxonomy' => 'game-category',
				'field' => 'term_id',
				'terms' => $exclude_categories,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Tags ======*/
		$exclude_tags_array = "";

		if( !empty( $atts['exclude-tags'] ) ) {
			$exclude_tags = $atts['exclude-tags'];
			$exclude_tags = explode( ',', $exclude_tags );
		} else {
			$exclude_tags = "";
		}

		if( !empty( $exclude_tags ) ) {
			$exclude_tags_array = array(
				'taxonomy' => 'game-tag',
				'field' => 'term_id',
				'terms' => $exclude_tags,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Genres ======*/
		$exclude_genres_array = "";

		if( !empty( $atts['exclude-genres'] ) ) {
			$exclude_genres = $atts['exclude-genres'];
			$exclude_genres = explode( ',', $exclude_genres );
		} else {
			$exclude_genres = "";
		}

		if( !empty( $exclude_genres ) ) {
			$exclude_genres_array = array(
				'taxonomy' => 'genre',
				'field' => 'term_id',
				'terms' => $exclude_genres,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Companies ======*/
		$exclude_companies_array = "";

		if( !empty( $atts['exclude-companies'] ) ) {
			$exclude_companies = $atts['exclude-companies'];
			$exclude_companies = explode( ',', $exclude_companies );
		} else {
			$exclude_companies = "";
		}

		if( !empty( $exclude_companies ) ) {
			$exclude_companies_array = array(
				'taxonomy' => 'company',
				'field' => 'term_id',
				'terms' => $exclude_companies,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Platforms ======*/
		$exclude_platforms_array = "";

		if( !empty( $atts['exclude-platforms'] ) ) {
			$exclude_platforms = $atts['exclude-platforms'];
			$exclude_platforms = explode( ',', $exclude_platforms );
		} else {
			$exclude_platforms = "";
		}

		if( !empty( $exclude_platforms ) ) {
			$exclude_platforms_array = array(
				'taxonomy' => 'platform',
				'field' => 'term_id',
				'terms' => $exclude_platforms,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude OS ======*/
		$exclude_os_array = "";

		if( !empty( $atts['exclude-os'] ) ) {
			$exclude_os = $atts['exclude-os'];
			$exclude_os = explode( ',', $exclude_os );
		} else {
			$exclude_os = "";
		}

		if( !empty( $exclude_os ) ) {
			$exclude_os_array = array(
				'taxonomy' => 'os',
				'field' => 'term_id',
				'terms' => $exclude_os,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Modes ======*/
		$exclude_modes_array = "";

		if( !empty( $atts['exclude-modes'] ) ) {
			$exclude_modes = $atts['exclude-modes'];
			$exclude_modes = explode( ',', $exclude_modes );
		} else {
			$exclude_modes = "";
		}

		if( !empty( $exclude_modes ) ) {
			$exclude_modes_array = array(
				'taxonomy' => 'mode',
				'field' => 'term_id',
				'terms' => $exclude_modes,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Languages ======*/
		$exclude_languages_array = "";

		if( !empty( $atts['exclude-languages'] ) ) {
			$exclude_languages = $atts['exclude-languages'];
			$exclude_languages = explode( ',', $exclude_languages );
		} else {
			$exclude_languages = "";
		}

		if( !empty( $exclude_languages ) ) {
			$exclude_languages_array = array(
				'taxonomy' => 'language',
				'field' => 'term_id',
				'terms' => $exclude_languages,
				'operator' => 'NOT IN',
			);
		}

		/*====== Include Categories ======*/
		$include_categories_array = "";

		if( !empty( $atts['include-categories'] ) ) {
			$include_categories = $atts['include-categories'];
			$include_categories = explode( ',', $include_categories );
		} else {
			$include_categories = "";
		}

		if( !empty( $include_categories ) ) {
			$include_categories_array = array(
				'taxonomy' => 'game-category',
				'field' => 'term_id',
				'terms' => $include_categories,
				'operator' => 'IN',
			);
		}

		/*====== Include Tags ======*/
		$include_tags_array = "";

		if( !empty( $atts['include-tags'] ) ) {
			$include_tags = $atts['include-tags'];
			$include_tags = explode( ',', $include_tags );
		} else {
			$include_tags = "";
		}

		if( !empty( $include_tags ) ) {
			$include_tags_array = array(
				'taxonomy' => 'game-tags',
				'field' => 'term_id',
				'terms' => $include_tags,
				'operator' => 'IN',
			);
		}

		/*====== Include Genres ======*/
		$include_genres_array = "";

		if( !empty( $atts['include-genres'] ) ) {
			$include_genres = $atts['include-genres'];
			$include_genres = explode( ',', $include_genres );
		} else {
			$include_genres = "";
		}

		if( !empty( $include_genres ) ) {
			$include_genres_array = array(
				'taxonomy' => 'genre',
				'field' => 'term_id',
				'terms' => $include_genres,
				'operator' => 'IN',
			);
		}

		/*====== Include Companies ======*/
		$include_companies_array = "";

		if( !empty( $atts['include-companies'] ) ) {
			$include_companies = $atts['include-companies'];
			$include_companies = explode( ',', $include_companies );
		} else {
			$include_companies = "";
		}

		if( !empty( $include_companies ) ) {
			$include_companies_array = array(
				'taxonomy' => 'company',
				'field' => 'term_id',
				'terms' => $include_companies,
				'operator' => 'IN',
			);
		}

		/*====== Include Platforms ======*/
		$include_platforms_array = "";

		if( !empty( $atts['include-platforms'] ) ) {
			$include_platform = $atts['include-platforms'];
			$include_platform = explode( ',', $include_platform );
		} else {
			$include_platform = "";
		}

		if( !empty( $include_platform ) ) {
			$include_platforms_array = array(
				'taxonomy' => 'platform',
				'field' => 'term_id',
				'terms' => $include_os,
				'operator' => 'IN',
			);
		}

		/*====== Include OS ======*/
		$include_os_array = "";

		if( !empty( $atts['include-os'] ) ) {
			$include_os = $atts['include-os'];
			$include_os = explode( ',', $include_os );
		} else {
			$include_os = "";
		}

		if( !empty( $include_os ) ) {
			$include_os_array = array(
				'taxonomy' => 'os',
				'field' => 'term_id',
				'terms' => $include_os,
				'operator' => 'IN',
			);
		}

		/*====== Include Modes ======*/
		$include_modes_array = "";

		if( !empty( $atts['include-modes'] ) ) {
			$include_modes = $atts['include-modes'];
			$include_modes = explode( ',', $include_modes );
		} else {
			$include_modes = "";
		}

		if( !empty( $include_modes ) ) {
			$include_modes_array = array(
				'taxonomy' => 'mode',
				'field' => 'term_id',
				'terms' => $include_modes,
				'operator' => 'IN',
			);
		}

		/*====== Include Languages ======*/
		$include_languages_array = "";

		if( !empty( $atts['include-languages'] ) ) {
			$include_languages = $atts['include-languages'];
			$include_languages = explode( ',', $include_languages );
		} else {
			$include_languages = "";
		}

		if( !empty( $include_languages ) ) {
			$include_languages_array = array(
				'taxonomy' => 'language',
				'field' => 'term_id',
				'terms' => $include_languages,
				'operator' => 'IN',
			);
		}

		/*====== Main Query ======*/
		$arg = array(
			'posts_per_page' => $atts['game-count'],
			'offset' => $atts['offset'],
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'post_type' => 'game',
			'tax_query' => array (
				'relation' => 'AND',
				$exclude_categories_array,
				$exclude_tags_array,
				$exclude_genres_array,
				$exclude_companies_array,
				$exclude_platforms_array,
				$exclude_os_array,
				$exclude_modes_array,
				$exclude_languages_array,
				$include_categories_array,
				$include_tags_array,
				$include_genres_array,
				$include_companies_array,
				$include_platforms_array,
				$include_os_array,
				$include_modes_array,
				$include_languages_array,
			)
		);

		/*====== Game IDs & Include Posts ======*/
		if( !empty( $atts['game-ids'] ) ) {
			$game_ids = $atts['game-ids'];
			$include_posts = explode( ',', $game_ids );
		} else {
			$include_posts = "";
		}

		if( !empty( $include_posts ) ) {
			$extra_query = array(
				'post__in' => $include_posts,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Exclude Games ======*/
		if( !empty( $atts['exclude-games'] ) ) {
			$exclude_games = $atts['exclude-games'];
			$exclude = explode( ',', $exclude_games );
		} else {
			$exclude = "";
		}

		if( !empty( $exclude ) ) {
			$extra_query = array(
				'post__not_in' => $exclude,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Order ======*/
		if( $atts["order"] == "ASC" ) {
			$order = "ASC";
		} else {
			$order = "DESC";
		}

		if( !empty( $order ) ) {
			$extra_query = array(
				'order' => $order,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Order By ======*/
		if( $atts["order-type"] == "popular-comment" ) {
			$order_by = "comment_count";
		} elseif( $atts["order-type"] == "id" ) {
			$order_by = "ID";
		} elseif( $atts["order-type"] == "popular" ) {
			$order_by = "comment_count";
		} elseif( $atts["order-type"] == "title" ) {
			$order_by = "title";
		} elseif( $atts["order-type"] == "menu_order" ) {
			$order_by = "menu_order";
		} elseif( $atts["order-type"] == "rand" ) {
			$order_by = "rand";
		} elseif( $atts["order-type"] == "none" ) {
			$order_by = "none";
		} else {
			$order_by = "date";
		}

		if( !empty( $order_by ) ) {
			$extra_query = array(
				'orderby' => $order_by,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== HTML of Arrows ======*/
		$prev_button = '<div class="prev arrow"></div>';
		$next_button = '<div class="next arrow"></div>';

		$wp_query = new WP_Query( $arg );

		/*====== HTML Output ======*/
		if( $wp_query->have_posts() ) {
			$output .= '<div class="cloux-slider cloux-game-slider" data-autoplay="' . esc_attr( $autoplay ) . '" data-autospeed="' . esc_attr( $autoplay_speed ) . '" data-fade="' . esc_attr( $fade ) . '" data-item="1" data-dots="'. esc_attr( $dots ) . '" data-arrows="'. esc_attr( $arrows ) . '" data-prevarrow="' . esc_attr( $prev_button ) . '" data-nextarrow="' . esc_attr( $next_button ) . '" data-slidetoitem="1">';
				while ( $wp_query->have_posts() ) {
					$wp_query->the_post();

					$slider_image = rwmb_meta( 'game-slider-image' );
					if( !empty( $slider_image ) ) {
						foreach ( $slider_image as $image ) {
							if( !empty( $image ) ) {
								$image_url = wp_get_attachment_image_src( esc_attr( $image["ID"] ), 'cloux-slider-1' );
								$image_url = $image_url[0];
							} else {
								$image_url = "";
							}
						}
					} else {
						if ( has_post_thumbnail() ) {
							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'cloux-slider-1' );
							$image_url = $image_url[0];
						} else {
							$image_url = "";
						}
					}

					$excerpt = get_the_excerpt();

					$output .= '<div class="item">';
						$output .= '<div class="wrap" style="background-image:url(' . esc_url( $image_url ) . ');">';
							$output .= '<div class="inner">';
								if( $game_platform == "true" or $game_genre == "true" or $game_price == "true" ) {
									$output .= cloux_game_details( $game = get_the_ID(), $platform = $game_platform, $genre = $game_genre, $style = "style-1", $price = $game_price );
								}

								$output .= '<div class="title">' . get_the_title() . '</div>';

								if ( !empty( $excerpt ) and $game_description == "true" ) {
									$output .= '<div class="excerpt">' . $excerpt . '</div>';
								}

								if( $buy_now_button == "true" or $game_detail_button == "true" ) {
									$output .= '<div class="buttons">';
										if( $game_detail_button == "true" ) {
											$output .= '<div class="cloux-button ' . esc_attr( $button_style ) . '">';
												$output .= '<a href="' . get_permalink() . '" title="' . esc_attr( $game_detail_button_text ) . '">' . esc_attr( $game_detail_button_text ) . '</a>';
											$output .= '</div>';
										}
										if( $buy_now_button == "true" ) {
											$output .= '<div class="cloux-button ' . esc_attr( $button_style ) . '">';
												$output .= '<a href="' . get_permalink() . '#buynow" title="' . esc_attr( $buy_now_button_text ) . '">' . esc_attr( $buy_now_button_text ) . '</a>';
											$output .= '</div>';
										}
									$output .= '</div>';
								}
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				}
				wp_reset_postdata();
			$output .= '</div>';
		}

		return $output;

	}

}
add_shortcode( "cloux_game_slider", "cloux_game_slider_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Game Slider', 'cloux' ),
			"base" => "cloux_game_slider",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/game-slider.svg',
			"description" => esc_html__( 'Game slider element for games.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Game IDs", 'cloux' ),
					"description" => esc_html__( 'You can enter game ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "game-ids",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Games', 'cloux' ),
					"description" => esc_html__( 'You can enter game ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-games",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Offset', 'cloux' ),
					"description" => esc_html__( 'You can enter offset number.', 'cloux' ),
					"param_name" => "offset",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Game Count', 'cloux' ),
					"description" => esc_html__( 'You can enter game count.', 'cloux' ),
					"param_name" => "game-count",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order', 'cloux' ),
					"description" => esc_html__( 'You can choose a order.', 'cloux' ),
					"param_name" => "order",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'DESC', 'cloux' ) => 'DESC',
						esc_html__( 'ASC', 'cloux' ) => 'ASC',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order Type', 'cloux' ),
					"description" => esc_html__( 'You can choose a order type.', 'cloux' ),
					"param_name" => "order-type",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'Added Date', 'cloux' ) => 'added-date',
						esc_html__( 'Popular by Comment', 'cloux' ) => 'popular-comment',
						esc_html__( 'ID', 'cloux' ) => 'id',
						esc_html__( 'Title', 'cloux' ) => 'title',
						esc_html__( 'Menu Order', 'cloux' ) => 'menu_order',
						esc_html__( 'Random', 'cloux' ) => 'rand',
						esc_html__( 'None', 'cloux' ) => 'none',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Categories', 'cloux' ),
					"description" => esc_html__( 'You can enter category ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-categories",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Tags', 'cloux' ),
					"description" => esc_html__( 'You can enter tag ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-tags",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Genres', 'cloux' ),
					"description" => esc_html__( 'You can enter genre ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-genres",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Companies', 'cloux' ),
					"description" => esc_html__( 'You can enter company ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-companies",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Platforms', 'cloux' ),
					"description" => esc_html__( 'You can enter platform ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-platforms",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude OS', 'cloux' ),
					"description" => esc_html__( 'You can enter OS ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-os",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Modes', 'cloux' ),
					"description" => esc_html__( 'You can enter mode ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-modes",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Languages', 'cloux' ),
					"description" => esc_html__( 'You can enter language ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-languages",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Categories', 'cloux' ),
					"description" => esc_html__( 'You can enter category ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-categories",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Tags', 'cloux' ),
					"description" => esc_html__( 'You can enter tag ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-tags",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Genres', 'cloux' ),
					"description" => esc_html__( 'You can enter genre ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-genres",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Companies', 'cloux' ),
					"description" => esc_html__( 'You can enter company ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-companies",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Platforms', 'cloux' ),
					"description" => esc_html__( 'You can enter platform ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-platforms",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include OS', 'cloux' ),
					"description" => esc_html__( 'You can enter OS ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-os",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Modes', 'cloux' ),
					"description" => esc_html__( 'You can enter mode ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-modes",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Languages', 'cloux' ),
					"description" => esc_html__( 'You can enter language ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-languages",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Platform', 'cloux' ),
					"description" => esc_html__( 'You can choose status of platform detail.', 'cloux' ),
					"param_name" => "game-platform",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Genre', 'cloux' ),
					"description" => esc_html__( 'You can choose status of genre detail.', 'cloux' ),
					"param_name" => "game-genre",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Price', 'cloux' ),
					"description" => esc_html__( 'You can choose status of price detail.', 'cloux' ),
					"param_name" => "game-price",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Description', 'cloux' ),
					"description" => esc_html__( 'You can choose status of game description.', 'cloux' ),
					"param_name" => "game-description",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Autoplay', 'cloux' ),
					"description" => esc_html__( 'You can choose status of autoplay.', 'cloux' ),
					"param_name" => "autoplay",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Autoplay Speed', 'cloux' ),
					"description" => esc_html__( 'You can enter a autoplay speed. Example: 7000.', 'cloux' ),
					"param_name" => "autoplay-speed",
					"group" => esc_html__( 'Design', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Arrows', 'cloux' ),
					"description" => esc_html__( 'You can choose status of arrows.', 'cloux' ),
					"param_name" => "arrows",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Dots', 'cloux' ),
					"description" => esc_html__( 'You can choose status of dots.', 'cloux' ),
					"param_name" => "dots",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Fade Effect', 'cloux' ),
					"description" => esc_html__( 'You can choose status of fade effect.', 'cloux' ),
					"param_name" => "fade",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Button Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a button style.', 'cloux' ),
					"param_name" => "button-style",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
						esc_html__( 'Style 3', 'cloux' ) => 'style-3',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Detail Button', 'cloux' ),
					"description" => esc_html__( 'You can choose status of game detail button.', 'cloux' ),
					"param_name" => "game-detail-button",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Game Detail Button Text', 'cloux' ),
					"description" => esc_html__( 'You can enter a text for button. Default: Game Details.', 'cloux' ),
					"param_name" => "game-detail-button-text",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Buy Now Button', 'cloux' ),
					"description" => esc_html__( 'You can choose status of buy now button.', 'cloux' ),
					"param_name" => "buy-now-button",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Buy Now Button Text', 'cloux' ),
					"description" => esc_html__( 'You can enter a text for button. Default: Buy Now.', 'cloux' ),
					"param_name" => "buy-now-button-text",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
				),
			),
		)
	);
}



/*======
*
* Game Carousel
*
======*/
function cloux_game_carousel_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'game-ids' => '',
			'exclude-games' => '',
			'offset' => '',
			'game-count' => '',
			'exclude-categories' => '',
			'exclude-tags' => '',
			'exclude-genres' => '',
			'exclude-companies' => '',
			'exclude-platforms' => '',
			'exclude-os' => '',
			'exclude-modes' => '',
			'exclude-languages' => '',
			'include-categories' => '',
			'include-tags' => '',
			'include-genres' => '',
			'include-companies' => '',
			'include-platforms' => '',
			'include-os' => '',
			'include-modes' => '',
			'include-languages' => '',
			'column' => '',
			'autoplay' => '',
			'autoplay-speed' => '',
			'arrows' => '',
			'dots' => '',
			'button-style' => '',
			'order' => '',
			'order-type' => '',
			'game-price' => '',
			'game-genre' => '',
			'game-platform' => '',
			'game-description' => '',
			'game-detail-button' => '',
			'game-detail-button-text' => '',
			'buy-now-button' => '',
			'buy-now-button-text' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		/*====== Column ======*/
		if( !empty( $atts['column'] ) ) {
			$column = $atts['column'];
		} else {
			$column = "1";
		}

		/*====== Autoplay ======*/
		if( !empty( $atts['autoplay'] ) ) {
			$autoplay = $atts['autoplay'];
		} else {
			$autoplay = "true";
		}

		/*====== Autoplay Speed ======*/
		if( !empty( $atts['autoplay-speed'] ) ) {
			$autoplay_speed = $atts['autoplay-speed'];
		} else {
			$autoplay_speed = "7000";
		}

		/*====== Arrows ======*/
		if( !empty( $atts['arrows'] ) ) {
			$arrows = $atts['arrows'];
		} else {
			$arrows = "true";
		}

		/*====== Dots ======*/
		if( !empty( $atts['dots'] ) ) {
			$dots = $atts['dots'];
		} else {
			$dots = "true";
		}
		if( $dots == "true" ) {
			$dots_active = "dots-active";
		} else {
			$dots_active = "dots-deactive";
		}

		/*====== Game Price ======*/
		if( !empty( $atts['game-price'] ) ) {
			$game_price = $atts['game-price'];
		} else {
			$game_price = "true";
		}

		/*====== Game Genre ======*/
		if( !empty( $atts['game-genre'] ) ) {
			$game_genre = $atts['game-genre'];
		} else {
			$game_genre = "true";
		}

		/*====== Game Platform ======*/
		if( !empty( $atts['game-platform'] ) ) {
			$game_platform = $atts['game-platform'];
		} else {
			$game_platform = "true";
		}

		/*====== Exclude Categories ======*/
		$exclude_categories_array = "";

		if( !empty( $atts['exclude-categories'] ) ) {
			$exclude_categories = $atts['exclude-categories'];
			$exclude_categories = explode( ',', $exclude_categories );
		} else {
			$exclude_categories = "";
		}

		if( !empty( $exclude_categories ) ) {
			$exclude_categories_array = array(
				'taxonomy' => 'game-category',
				'field' => 'term_id',
				'terms' => $exclude_categories,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Tags ======*/
		$exclude_tags_array = "";

		if( !empty( $atts['exclude-tags'] ) ) {
			$exclude_tags = $atts['exclude-tags'];
			$exclude_tags = explode( ',', $exclude_tags );
		} else {
			$exclude_tags = "";
		}

		if( !empty( $exclude_tags ) ) {
			$exclude_tags_array = array(
				'taxonomy' => 'game-tag',
				'field' => 'term_id',
				'terms' => $exclude_tags,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Genres ======*/
		$exclude_genres_array = "";

		if( !empty( $atts['exclude-genres'] ) ) {
			$exclude_genres = $atts['exclude-genres'];
			$exclude_genres = explode( ',', $exclude_genres );
		} else {
			$exclude_genres = "";
		}

		if( !empty( $exclude_genres ) ) {
			$exclude_genres_array = array(
				'taxonomy' => 'genre',
				'field' => 'term_id',
				'terms' => $exclude_genres,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Companies ======*/
		$exclude_companies_array = "";

		if( !empty( $atts['exclude-companies'] ) ) {
			$exclude_companies = $atts['exclude-companies'];
			$exclude_companies = explode( ',', $exclude_companies );
		} else {
			$exclude_companies = "";
		}

		if( !empty( $exclude_companies ) ) {
			$exclude_companies_array = array(
				'taxonomy' => 'company',
				'field' => 'term_id',
				'terms' => $exclude_companies,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Platforms ======*/
		$exclude_platforms_array = "";

		if( !empty( $atts['exclude-platforms'] ) ) {
			$exclude_platforms = $atts['exclude-platforms'];
			$exclude_platforms = explode( ',', $exclude_platforms );
		} else {
			$exclude_platforms = "";
		}

		if( !empty( $exclude_platforms ) ) {
			$exclude_platforms_array = array(
				'taxonomy' => 'platform',
				'field' => 'term_id',
				'terms' => $exclude_platforms,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude OS ======*/
		$exclude_os_array = "";

		if( !empty( $atts['exclude-os'] ) ) {
			$exclude_os = $atts['exclude-os'];
			$exclude_os = explode( ',', $exclude_os );
		} else {
			$exclude_os = "";
		}

		if( !empty( $exclude_os ) ) {
			$exclude_os_array = array(
				'taxonomy' => 'os',
				'field' => 'term_id',
				'terms' => $exclude_os,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Modes ======*/
		$exclude_modes_array = "";

		if( !empty( $atts['exclude-modes'] ) ) {
			$exclude_modes = $atts['exclude-modes'];
			$exclude_modes = explode( ',', $exclude_modes );
		} else {
			$exclude_modes = "";
		}

		if( !empty( $exclude_modes ) ) {
			$exclude_modes_array = array(
				'taxonomy' => 'mode',
				'field' => 'term_id',
				'terms' => $exclude_modes,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Languages ======*/
		$exclude_languages_array = "";

		if( !empty( $atts['exclude-languages'] ) ) {
			$exclude_languages = $atts['exclude-languages'];
			$exclude_languages = explode( ',', $exclude_languages );
		} else {
			$exclude_languages = "";
		}

		if( !empty( $exclude_languages ) ) {
			$exclude_languages_array = array(
				'taxonomy' => 'language',
				'field' => 'term_id',
				'terms' => $exclude_languages,
				'operator' => 'NOT IN',
			);
		}

		/*====== Include Categories ======*/
		$include_categories_array = "";

		if( !empty( $atts['include-categories'] ) ) {
			$include_categories = $atts['include-categories'];
			$include_categories = explode( ',', $include_categories );
		} else {
			$include_categories = "";
		}

		if( !empty( $include_categories ) ) {
			$include_categories_array = array(
				'taxonomy' => 'game-category',
				'field' => 'term_id',
				'terms' => $include_categories,
				'operator' => 'IN',
			);
		}

		/*====== Include Tags ======*/
		$include_tags_array = "";

		if( !empty( $atts['include-tags'] ) ) {
			$include_tags = $atts['include-tags'];
			$include_tags = explode( ',', $include_tags );
		} else {
			$include_tags = "";
		}

		if( !empty( $include_tags ) ) {
			$include_tags_array = array(
				'taxonomy' => 'game-tags',
				'field' => 'term_id',
				'terms' => $include_tags,
				'operator' => 'IN',
			);
		}

		/*====== Include Genres ======*/
		$include_genres_array = "";

		if( !empty( $atts['include-genres'] ) ) {
			$include_genres = $atts['include-genres'];
			$include_genres = explode( ',', $include_genres );
		} else {
			$include_genres = "";
		}

		if( !empty( $include_genres ) ) {
			$include_genres_array = array(
				'taxonomy' => 'genre',
				'field' => 'term_id',
				'terms' => $include_genres,
				'operator' => 'IN',
			);
		}

		/*====== Include Companies ======*/
		$include_companies_array = "";

		if( !empty( $atts['include-companies'] ) ) {
			$include_companies = $atts['include-companies'];
			$include_companies = explode( ',', $include_companies );
		} else {
			$include_companies = "";
		}

		if( !empty( $include_companies ) ) {
			$include_companies_array = array(
				'taxonomy' => 'company',
				'field' => 'term_id',
				'terms' => $include_companies,
				'operator' => 'IN',
			);
		}

		/*====== Include Platforms ======*/
		$include_platforms_array = "";

		if( !empty( $atts['include-platforms'] ) ) {
			$include_platform = $atts['include-platforms'];
			$include_platform = explode( ',', $include_platform );
		} else {
			$include_platform = "";
		}

		if( !empty( $include_platform ) ) {
			$include_platforms_array = array(
				'taxonomy' => 'platform',
				'field' => 'term_id',
				'terms' => $include_os,
				'operator' => 'IN',
			);
		}

		/*====== Include OS ======*/
		$include_os_array = "";

		if( !empty( $atts['include-os'] ) ) {
			$include_os = $atts['include-os'];
			$include_os = explode( ',', $include_os );
		} else {
			$include_os = "";
		}

		if( !empty( $include_os ) ) {
			$include_os_array = array(
				'taxonomy' => 'os',
				'field' => 'term_id',
				'terms' => $include_os,
				'operator' => 'IN',
			);
		}

		/*====== Include Modes ======*/
		$include_modes_array = "";

		if( !empty( $atts['include-modes'] ) ) {
			$include_modes = $atts['include-modes'];
			$include_modes = explode( ',', $include_modes );
		} else {
			$include_modes = "";
		}

		if( !empty( $include_modes ) ) {
			$include_modes_array = array(
				'taxonomy' => 'mode',
				'field' => 'term_id',
				'terms' => $include_modes,
				'operator' => 'IN',
			);
		}

		/*====== Include Languages ======*/
		$include_languages_array = "";

		if( !empty( $atts['include-languages'] ) ) {
			$include_languages = $atts['include-languages'];
			$include_languages = explode( ',', $include_languages );
		} else {
			$include_languages = "";
		}

		if( !empty( $include_languages ) ) {
			$include_languages_array = array(
				'taxonomy' => 'language',
				'field' => 'term_id',
				'terms' => $include_languages,
				'operator' => 'IN',
			);
		}

		/*====== Main Query ======*/
		$arg = array(
			'posts_per_page' => $atts['game-count'],
			'offset' => $atts['offset'],
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'post_type' => 'game',
			'tax_query' => array (
				'relation' => 'AND',
				$exclude_categories_array,
				$exclude_tags_array,
				$exclude_genres_array,
				$exclude_companies_array,
				$exclude_platforms_array,
				$exclude_os_array,
				$exclude_modes_array,
				$exclude_languages_array,
				$include_categories_array,
				$include_tags_array,
				$include_genres_array,
				$include_companies_array,
				$include_platforms_array,
				$include_os_array,
				$include_modes_array,
				$include_languages_array,
			)
		);

		/*====== Game IDs & Include Posts ======*/
		if( !empty( $atts['game-ids'] ) ) {
			$game_ids = $atts['game-ids'];
			$include_posts = explode( ',', $game_ids );
		} else {
			$include_posts = "";
		}

		if( !empty( $include_posts ) ) {
			$extra_query = array(
				'post__in' => $include_posts,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Exclude Games ======*/
		if( !empty( $atts['exclude-games'] ) ) {
			$exclude_games = $atts['exclude-games'];
			$exclude = explode( ',', $exclude_games );
		} else {
			$exclude = "";
		}

		if( !empty( $exclude ) ) {
			$extra_query = array(
				'post__not_in' => $exclude,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Order ======*/
		if( $atts["order"] == "ASC" ) {
			$order = "ASC";
		} else {
			$order = "DESC";
		}

		if( !empty( $order ) ) {
			$extra_query = array(
				'order' => $order,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Order By ======*/
		if( $atts["order-type"] == "popular-comment" ) {
			$order_by = "comment_count";
		} elseif( $atts["order-type"] == "id" ) {
			$order_by = "ID";
		} elseif( $atts["order-type"] == "popular" ) {
			$order_by = "comment_count";
		} elseif( $atts["order-type"] == "title" ) {
			$order_by = "title";
		} elseif( $atts["order-type"] == "menu_order" ) {
			$order_by = "menu_order";
		} elseif( $atts["order-type"] == "rand" ) {
			$order_by = "rand";
		} elseif( $atts["order-type"] == "none" ) {
			$order_by = "none";
		} else {
			$order_by = "date";
		}

		if( !empty( $order_by ) ) {
			$extra_query = array(
				'orderby' => $order_by,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		$wp_query = new WP_Query( $arg );

		/*====== HTML of Arrows ======*/
		$prev_button = '<div class="prev arrow"></div>';
		$next_button = '<div class="next arrow"></div>';

		/*====== HTML Output ======*/
		if( $wp_query->have_posts() ) {
			$output .= '<div class="cloux-slider cloux-game-carousel ' . esc_attr( $dots_active ) . '" data-autoplay="' . esc_attr( $autoplay ) . '" data-autospeed="' . esc_attr( $autoplay_speed ) . '" data-item="' . esc_attr( $column ) . '" data-dots="'. esc_attr( $dots ) . '" data-arrows="'. esc_attr( $arrows ) . '" data-prevarrow="' . esc_attr( $prev_button ) . '" data-nextarrow="' . esc_attr( $next_button ) . '">';
				while ( $wp_query->have_posts() ) {
					$wp_query->the_post();

					$carousel_image = rwmb_meta( 'game-carousel-image' );
					if( !empty( $carousel_image ) ) {
						foreach ( $carousel_image as $image ) {
							if( !empty( $image ) ) {
								$image_url = wp_get_attachment_image_src( esc_attr( $image["ID"] ), 'cloux-carousel-1' );
							}
						}
					} else {
						if ( has_post_thumbnail() ) {
							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'cloux-carousel-1' );
							$image_url = $image_url[0];
						} else {
							$image_url = "";
						}
					}

					$excerpt = get_the_excerpt();

					$output .= '<div class="item">';
						$output .= '<div class="wrap" style="background-image:url(' . esc_url( $image_url ) . ');">';
							$output .= '<a href="' . get_permalink() . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '"></a>';
							$output .= '<div class="inner">';
								if( $game_platform == "true" or $game_genre == "true" or $game_price == "true" ) {
									$output .= cloux_game_details( $game = get_the_ID(), $platform = $game_platform, $genre = $game_genre, $style = "style-1", $price = $game_price );
								}

								$output .= '<div class="title">' . get_the_title() . '</div>';
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				}
				wp_reset_postdata();
			$output .= '</div>';
		}

		return $output;

	}

}
add_shortcode( "cloux_game_carousel", "cloux_game_carousel_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Game Carousel', 'cloux' ),
			"base" => "cloux_game_carousel",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/game-carousel.svg',
			"description" => esc_html__( 'Game carousel element for games.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Game IDs", 'cloux' ),
					"description" => esc_html__( 'You can enter game ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "game-ids",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Games', 'cloux' ),
					"description" => esc_html__( 'You can enter game ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-games",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Offset', 'cloux' ),
					"description" => esc_html__( 'You can enter offset number.', 'cloux' ),
					"param_name" => "offset",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Game Count', 'cloux' ),
					"description" => esc_html__( 'You can enter game count.', 'cloux' ),
					"param_name" => "game-count",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order', 'cloux' ),
					"description" => esc_html__( 'You can choose a order.', 'cloux' ),
					"param_name" => "order",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'DESC', 'cloux' ) => 'DESC',
						esc_html__( 'ASC', 'cloux' ) => 'ASC',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order Type', 'cloux' ),
					"description" => esc_html__( 'You can choose a order type.', 'cloux' ),
					"param_name" => "order-type",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'Added Date', 'cloux' ) => 'added-date',
						esc_html__( 'Popular by Comment', 'cloux' ) => 'popular-comment',
						esc_html__( 'ID', 'cloux' ) => 'id',
						esc_html__( 'Title', 'cloux' ) => 'title',
						esc_html__( 'Menu Order', 'cloux' ) => 'menu_order',
						esc_html__( 'Random', 'cloux' ) => 'rand',
						esc_html__( 'None', 'cloux' ) => 'none',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Categories', 'cloux' ),
					"description" => esc_html__( 'You can enter category ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-categories",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Tags', 'cloux' ),
					"description" => esc_html__( 'You can enter tag ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-tags",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Genres', 'cloux' ),
					"description" => esc_html__( 'You can enter genre ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-genres",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Companies', 'cloux' ),
					"description" => esc_html__( 'You can enter company ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-companies",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Platforms', 'cloux' ),
					"description" => esc_html__( 'You can enter platform ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-platforms",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude OS', 'cloux' ),
					"description" => esc_html__( 'You can enter OS ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-os",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Modes', 'cloux' ),
					"description" => esc_html__( 'You can enter mode ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-modes",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Languages', 'cloux' ),
					"description" => esc_html__( 'You can enter language ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-languages",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Categories', 'cloux' ),
					"description" => esc_html__( 'You can enter category ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-categories",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Tags', 'cloux' ),
					"description" => esc_html__( 'You can enter tag ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-tags",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Genres', 'cloux' ),
					"description" => esc_html__( 'You can enter genre ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-genres",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Companies', 'cloux' ),
					"description" => esc_html__( 'You can enter company ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-companies",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Platforms', 'cloux' ),
					"description" => esc_html__( 'You can enter platform ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-platforms",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include OS', 'cloux' ),
					"description" => esc_html__( 'You can enter OS ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-os",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Modes', 'cloux' ),
					"description" => esc_html__( 'You can enter mode ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-modes",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Languages', 'cloux' ),
					"description" => esc_html__( 'You can enter language ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-languages",
					"group" => esc_html__( 'Taxonomies', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Column', 'cloux' ),
					"description" => esc_html__( 'You can choose a column size.', 'cloux' ),
					"param_name" => "column",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'Column 1', 'cloux' ) => '1',
						esc_html__( 'Column 2', 'cloux' ) => '2',
						esc_html__( 'Column 3', 'cloux' ) => '3',
						esc_html__( 'Column 4', 'cloux' ) => '4',
						esc_html__( 'Column 5', 'cloux' ) => '5',
						esc_html__( 'Column 6', 'cloux' ) => '6',
						esc_html__( 'Column 7', 'cloux' ) => '7',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Platform', 'cloux' ),
					"description" => esc_html__( 'You can choose status of platform detail.', 'cloux' ),
					"param_name" => "game-platform",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Genre', 'cloux' ),
					"description" => esc_html__( 'You can choose status of genre detail.', 'cloux' ),
					"param_name" => "game-genre",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Price', 'cloux' ),
					"description" => esc_html__( 'You can choose status of price detail.', 'cloux' ),
					"param_name" => "game-price",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Autoplay', 'cloux' ),
					"description" => esc_html__( 'You can choose status of autoplay.', 'cloux' ),
					"param_name" => "autoplay",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Autoplay Speed', 'cloux' ),
					"description" => esc_html__( 'You can enter a autoplay speed. Example: 7000.', 'cloux' ),
					"param_name" => "autoplay-speed",
					"group" => esc_html__( 'Design', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Arrows', 'cloux' ),
					"description" => esc_html__( 'You can choose status of arrows.', 'cloux' ),
					"param_name" => "arrows",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Dots', 'cloux' ),
					"description" => esc_html__( 'You can choose status of dots.', 'cloux' ),
					"param_name" => "dots",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
			),
		)
	);
}



/*======
*
* Content Slider
*
======*/
function cloux_content_slider_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'style' => '',
			'full-height' => '',
			'autoplay' => '',
			'autoplay-speed' => '',
			'arrows' => '',
			'dots' => '',
			'fade' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		/*====== Autoplay ======*/
		if( !empty( $atts['autoplay'] ) ) {
			$autoplay = $atts['autoplay'];
		} else {
			$autoplay = "true";
		}

		/*====== Autoplay Speed ======*/
		if( !empty( $atts['autoplay-speed'] ) ) {
			$autoplay_speed = $atts['autoplay-speed'];
		} else {
			$autoplay_speed = "7000";
		}

		/*====== Full Height ======*/
		if( !empty( $atts['full-height'] ) ) {
			$full_height = "full-height-" . $atts['full-height'];
		} else {
			$full_height = "full-height-true";
		}

		/*====== Arrows ======*/
		if( !empty( $atts['arrows'] ) ) {
			$arrows = $atts['arrows'];
		} else {
			$arrows = "true";
		}

		/*====== Dots ======*/
		if( !empty( $atts['dots'] ) ) {
			$dots = $atts['dots'];
		} else {
			$dots = "true";
		}

		/*====== Fade ======*/
		if( !empty( $atts['fade'] ) ) {
			$fade = $atts['fade'];
		} else {
			$fade = "true";
		}

		/*====== Style ======*/
		if( !empty( $atts['style'] ) ) {
			$style = $atts['style'];
		} else {
			$style = "style-1";
		}

		/*====== HTML of Arrows ======*/
		$prev_button = '<div class="prev arrow"></div>';
		$next_button = '<div class="next arrow"></div>';

		/*====== HTML Output ======*/
		$output .= '<div class="cloux-slider cloux-content-slider ' . esc_attr( $style ) . ' ' . esc_attr( $full_height ) . '" data-autoplay="' . esc_attr( $autoplay ) . '" data-fade="' . esc_attr( $fade ) . '" data-autospeed="' . esc_attr( $autoplay_speed ) . '" data-item="1" data-dots="'. esc_attr( $dots ) . '" data-arrows="'. esc_attr( $arrows ) . '" data-prevarrow="' . esc_attr( $prev_button ) . '" data-nextarrow="' . esc_attr( $next_button ) . '">';
				$output .= do_shortcode( $content );
		$output .= '</div>';

		return $output;

	}

}
add_shortcode( "cloux_content_slider", "cloux_content_slider_output" );

function cloux_content_slider_item_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'style' => '',
			'title' => '',
			'colored-title' => '',
			'separate-titles' => '',
			'text' => '',
			'button-1' => '',
			'button-1-link' => '',
			'button-2' => '',
			'button-2-link' => '',
			'button-style' => '',
			'content-align' => '',
			'images' => '',
			'background-image' => '',
			'background-size' => '',
			'background-position' => '',
			'background-repeat' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		/*====== Background Size ======*/
		if( !empty( $atts['background-size'] ) ) {
			$bg_size = $atts['background-size'];
		} else {
			$bg_size = "cover";
		}

		/*====== Background Repeat ======*/
		if( !empty( $atts['background-repeat'] ) ) {
			$bg_repeat = $atts['background-repeat'];
		} else {
			$bg_repeat = "repeat";
		}

		/*====== Background Position ======*/
		if( $atts['background-position'] == "top-center" ) {
			$bg_position = "top center";
		} elseif( $atts['background-position'] == "top-right" ) {
			$bg_position = "top right";
		} elseif( $atts['background-position'] == "top-left" ) {
			$bg_position = "top left";
		} elseif( $atts['background-position'] == "center-center" ) {
			$bg_position = "center center";
		} elseif( $atts['background-position'] == "center-right" ) {
			$bg_position = "center right";
		} elseif( $atts['background-position'] == "center-left" ) {
			$bg_position = "center left";
		} elseif( $atts['background-position'] == "bottom-center" ) {
			$bg_position = "bottom center";
		} elseif( $atts['background-position'] == "bottom-right" ) {
			$bg_position = "bottom right";
		} elseif( $atts['background-position'] == "bottom-left" ) {
			$bg_position = "bottom left";
		} else {
			$bg_position = "center center";
		}

		/*====== Style ======*/
		if( !empty( $atts['style'] ) ) {
			$style = $atts['style'];
		} else {
			$style = "style-1";
		}

		/*====== Button 1 Status ======*/
		if( !empty( $atts['button-1'] ) ) {
			$button_1 = $atts['button-1'];
		} else {
			$button_1 = "true";
		}

		/*====== Button 2 Status ======*/
		if( !empty( $atts['button-2'] ) ) {
			$button_2 = $atts['button-2'];
		} else {
			$button_2 = "true";
		}

		/*====== Content Align ======*/
		if( !empty( $atts['content-align'] ) ) {
			$content_align = "content-align-" . $atts['content-align'];
		} else {
			$content_align = "content-align-left";
		}

		/*====== Background Image ======*/
		if( !empty( $atts["background-image"] ) ) {
			$background = $atts["background-image"];
			$background = wp_get_attachment_image_src( $background, 'cloux-slider-1', true );
			$background = $background[0];
		} else {
			$background = "";
		}

		/*====== Button Style ======*/
		if( !empty( $atts['button-style'] ) ) {
			$button_style = $atts['button-style'];
		} else {
			$button_style = "style-1";
		}

		/*====== Separate Titles ======*/
		if( !empty( $atts["separate-titles"] ) ) {
			$separate_titles = 'separate-titles-' . $atts["separate-titles"];
		} else {
			$separate_titles = "separate-titles-true";
		}

		/*====== HTML Output ======*/
		if( !empty( $atts["main-title"] ) or !empty( $atts["colored-title"] ) or !empty( $atts["text"] ) or !empty( $atts["background-image"] ) ) {
			$output .= '<div class="item">';
				$output .= '<div class="wrap ' . esc_attr( $content_align ) . ' ' . esc_attr( $separate_titles ) . ' ' . esc_attr( $style ) . '" style="background-image:url(' . esc_url( $background ) .  '); background-position:' . esc_attr( $bg_position ) . '; background-size:' . esc_attr( $bg_size ) . '; background-repeat:' . esc_attr( $bg_repeat ) . ';">';
					$output .= '<div class="cloux-element-wrapper">';
						$output .= '<div class="inner">';
							if( !empty( $atts["title"] ) or !empty( $atts["colored-title"] ) ) {
								$output .= '<div class="title">';
									if( !empty( $atts["title"] ) ) {
										$output .= esc_attr( $atts["title"] );
									}
									if( !empty( $atts["title"] ) and !empty( $atts["colored-title"] ) ) {
										$output .= ' ';
									}
									if( !empty( $atts["colored-title"] ) ) {
										$output .= '<span>';
											$output .= esc_attr( $atts["colored-title"] );
										$output .= '</span>';
									}
								$output .= '</div>';
							}

							if( !empty( $atts["text"] ) ) {
								$output .= '<div class="text">';
									$output .= esc_attr( $atts["text"] );
								$output .= '</div>';
							}

							if( $button_1 == "true" or $button_2 == "true" ) {
								$output .= '<div class="buttons ' . esc_attr( $button_style ) . '">';
									if( $button_1 == "true" ) {
										if( !empty( $atts["button-1-link"] ) ) {
											$button_1_link = $atts["button-1-link"];
											$button_1_link = vc_build_link( $button_1_link );

											if( !empty( $button_1_link["target"] ) ) {
												$button_1_target = $button_1_link["target"];
											} else {
												$button_1_target = "_parent";
											}

											$output .= '<div class="cloux-button ' . esc_attr( $button_style ) . '">';
												$output .= '<a href="' . esc_url( $button_1_link["url"] ) . '" title="' . esc_attr( $button_1_link["title"] ) . '" target="' . esc_attr( $button_1_target ) . '"><span>' . esc_attr( $button_1_link["title"] ) . '</span></a>';
											$output .= '</div>';
										}
									}

									if( $button_2 == "true" ) {
										if( !empty( $atts["button-2-link"] ) ) {
											$button_2_link = $atts["button-2-link"];
											$button_2_link = vc_build_link( $button_2_link );

											if( !empty( $button_2_link["target"] ) ) {
												$button_2_target = $button_2_link["target"];
											} else {
												$button_2_target = "_parent";
											}

											$output .= '<div class="cloux-button ' . esc_attr( $button_style ) . '">';
												$output .= '<a href="' . esc_url( $button_2_link["url"] ) . '" title="' . esc_attr( $button_2_link["title"] ) . '" target="' . esc_attr( $button_2_target ) . '"><span>' . esc_attr( $button_2_link["title"] ) . '</span></a>';
											$output .= '</div>';
										}
									}
								$output .= '</div>';
							}
						$output .= '</div>';

						if( !empty( $atts["images"] ) ) {
							$output .= '<div class="images">';
								$images = $atts["images"];
								if( !empty( $images ) ) {
									$output .= '<ul>';
										$images = explode( ',', $images );
										foreach ( $images as $image ) {
											if( !empty( $image ) ) {
												$output .= '<li>';
													$output .= wp_get_attachment_image( $image, 'cloux-carousel-2', true );
												$output .= '</li>';
											}
										}
									$output .= '</ul>';
								}
							$output .= '</div>';
						}
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';
		}

		return $output;

	}

}
add_shortcode( "cloux_content_slider_item", "cloux_content_slider_item_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Content Slider', 'cloux' ),
			"base" => "cloux_content_slider",
			"as_parent" => array( 'only' => 'cloux_content_slider_item' ),
			"js_view" => 'VcColumnView',
			"content_element" => true,
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/content-slider.svg',
			"description" => esc_html__( 'Content slider element for games.', 'cloux' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a style.', 'cloux' ),
					"param_name" => "style",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Full Height', 'cloux' ),
					"description" => esc_html__( 'You can choose status of full height design.', 'cloux' ),
					"param_name" => "full-height",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Autoplay', 'cloux' ),
					"description" => esc_html__( 'You can choose status of autoplay.', 'cloux' ),
					"param_name" => "autoplay",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Autoplay Speed', 'cloux' ),
					"description" => esc_html__( 'You can enter a autoplay speed. Example: 7000.', 'cloux' ),
					"param_name" => "autoplay-speed",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Arrows', 'cloux' ),
					"description" => esc_html__( 'You can choose status of arrows.', 'cloux' ),
					"param_name" => "arrows",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Dots', 'cloux' ),
					"description" => esc_html__( 'You can choose status of dots.', 'cloux' ),
					"param_name" => "dots",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Fade Effect', 'cloux' ),
					"description" => esc_html__( 'You can choose status of fade effect.', 'cloux' ),
					"param_name" => "fade",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
			),
		)
	);
}

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Content Slider Item', 'cloux' ),
			"base" => "cloux_content_slider_item",
			"as_child" => array( 'only' => 'cloux_content_slider' ),
			"content_element" => true,
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/content-slider.svg',
			"description" => esc_html__( 'Content slider item element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a style.', 'cloux' ),
					"param_name" => "style",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Main Title', 'cloux' ),
					"description" => esc_html__( 'You can enter a title.', 'cloux' ),
					"param_name" => "title",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Colored Title', 'cloux' ),
					"description" => esc_html__( 'You can enter a colored title.', 'cloux' ),
					"param_name" => "colored-title",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Separate Titles', 'cloux' ),
					"description" => esc_html__( 'You can choose status of separate.', 'cloux' ),
					"param_name" => "separate-titles",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Text', 'cloux' ),
					"description" => esc_html__( 'You can enter a description text.', 'cloux' ),
					"param_name" => "text",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Button Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a button style.', 'cloux' ),
					"param_name" => "button-style",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
						esc_html__( 'Style 3', 'cloux' ) => 'style-3',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Button 1', 'cloux' ),
					"description" => esc_html__( 'You can choose status of button 1.', 'cloux' ),
					"param_name" => "button-1",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Button 1', 'cloux' ),
					"description" => esc_html__( 'You can create a button.', 'cloux' ),
					"param_name" => "button-1-link",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Button 2', 'cloux' ),
					"description" => esc_html__( 'You can choose status of button 2.', 'cloux' ),
					"param_name" => "button-2",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Button 2', 'cloux' ),
					"description" => esc_html__( 'You can create a button.', 'cloux' ),
					"param_name" => "button-2-link",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Content Align', 'cloux' ),
					"description" => esc_html__( 'You can choose status of autoplay.', 'cloux' ),
					"param_name" => "content-align",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Left', 'cloux' ) => 'left',
						esc_html__( 'Right', 'cloux' ) => 'right',
						esc_html__( 'Center', 'cloux' ) => 'center',
					),
				),
				array(
					"type" => "attach_images",
					"heading" => esc_html__( 'Images', 'cloux' ),
					"description" => esc_html__( 'You can upload images.', 'cloux' ),
					"param_name" => "images",
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__( 'Background Image', 'cloux' ),
					"description" => esc_html__( 'You can upload a background image.', 'cloux' ),
					"param_name" => "background-image",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Background Size', 'cloux' ),
					"description" => esc_html__( 'You can choose a background size.', 'cloux' ),
					"param_name" => "background-size",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Cover', 'cloux' ) => 'cover',
						esc_html__( 'Contain', 'cloux' ) => 'contain',
						esc_html__( 'Auto', 'cloux' ) => 'auto',
						esc_html__( 'Inherit', 'cloux' ) => 'inherit',
						esc_html__( 'Initial', 'cloux' ) => 'initial',
						esc_html__( 'Unset', 'cloux' ) => 'unset',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Background Position', 'cloux' ),
					"description" => esc_html__( 'You can choose a background position.', 'cloux' ),
					"param_name" => "background-position",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Top Center', 'cloux' ) => 'top-center',
						esc_html__( 'Top Right', 'cloux' ) => 'top-right',
						esc_html__( 'Top Left', 'cloux' ) => 'top-left',
						esc_html__( 'Center Center', 'cloux' ) => 'center-center',
						esc_html__( 'Center Right', 'cloux' ) => 'center-right',
						esc_html__( 'Center Left', 'cloux' ) => 'center-left',
						esc_html__( 'Bottom Center', 'cloux' ) => 'bottom-center',
						esc_html__( 'Bottom Right', 'cloux' ) => 'bottom-right',
						esc_html__( 'Bottom Left', 'cloux' ) => 'bottom-left',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Background Repeat', 'cloux' ),
					"description" => esc_html__( 'You can choose a background repeat.', 'cloux' ),
					"param_name" => "background-repeat",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Inherit', 'cloux' ) => 'inherit',
						esc_html__( 'Initial', 'cloux' ) => 'initial',
						esc_html__( 'Repeat', 'cloux' ) => 'repeat',
						esc_html__( 'No Repeat', 'cloux' ) => 'no-repeat',
						esc_html__( 'Repeat X', 'cloux' ) => 'repeat-x',
						esc_html__( 'Repeat Y', 'cloux' ) => 'repeat-y',
						esc_html__( 'Round', 'cloux' ) => 'round',
						esc_html__( 'Space', 'cloux' ) => 'space',
						esc_html__( 'Unset', 'cloux' ) => 'unset',
					),
				),
			)
		)
	);
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_cloux_content_slider extends WPBakeryShortCodesContainer {}
}



/*======
*
* Game Search Tool
*
======*/
function cloux_game_search_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'title' => '',
			'style' => '',
			'column' => '',
			'background-style-1' => '',
			'keyword' => '',
			'category' => '',
			'platform' => '',
			'genre' => '',
			'os' => '',
			'company' => '',
			'language' => '',
			'tag' => '',
			'order-type' => '',
			'order-by' => '',
			'empty-taxonomies' => '',
			'childless' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		/*====== Style ======*/
		if( !empty( $atts["style"] ) ) {
			$style = $atts["style"];
		} else {
			$style = "style-1";
		}

		/*====== Column ======*/
		if( !empty( $atts["column"] ) ) {
			$column = $atts["column"];
		} else {
			$column = "column-1";
		}

		/*====== Keyword ======*/
		if( !empty( $atts["keyword"] ) ) {
			$keyword = $atts["keyword"];
		} else {
			$keyword = "true";
		}

		/*====== Category ======*/
		if( !empty( $atts["category"] ) ) {
			$category = $atts["category"];
		} else {
			$category = "true";
		}

		/*====== Platform ======*/
		if( !empty( $atts["platform"] ) ) {
			$platform = $atts["platform"];
		} else {
			$platform = "true";
		}

		/*====== Genre ======*/
		if( !empty( $atts["genre"] ) ) {
			$genre = $atts["genre"];
		} else {
			$genre = "true";
		}

		/*====== OS ======*/
		if( !empty( $atts["os"] ) ) {
			$os = $atts["os"];
		} else {
			$os = "true";
		}

		/*====== Company ======*/
		if( !empty( $atts["company"] ) ) {
			$company = $atts["company"];
		} else {
			$company = "true";
		}

		/*====== Language ======*/
		if( !empty( $atts["language"] ) ) {
			$language = $atts["language"];
		} else {
			$language = "true";
		}

		/*====== Tag ======*/
		if( !empty( $atts["tag"] ) ) {
			$tag = $atts["tag"];
		} else {
			$tag = "true";
		}

		/*====== Order Type ======*/
		if( !empty( $atts["order-type"] ) ) {
			$order_type = $atts["order-type"];
		} else {
			$order_type = "true";
		}

		/*====== Order By ======*/
		if( !empty( $atts["order-by"] ) ) {
			$order_by = $atts["order-by"];
		} else {
			$order_by = "true";
		}

		/*====== Empty Categories ======*/
		if( $atts['empty-taxonomies'] == 'false' ) {
			$empty_taxonomies = false;
		} else {
			$empty_taxonomies = true;
		}

		/*====== Childless ======*/
		if( $atts['childless'] == 'false' ) {
			$childless = false;
		} else {
			$childless = true;
		}

		/*====== Background Image ======*/
		if( $style == "style-1" ) {
			if( !empty( $atts["background-style-1"] ) ) {
				$background = $atts["background-style-1"];
				$background = wp_get_attachment_image_src( $background, 'cloux-page-banner', true );
				$background = $background[0];
				$background = ' style="background-image:url(' . esc_url( $background ) . ');"';
			} else {
				$background = "";
			}
		} else {
			$background = "";
		}

		/*====== HTML Output ======*/
		$search_page = get_theme_mod( "cloux_games_game_search_results_page" );

		/*====== HTML Output ======*/
		$output .= '<div class="cloux-game-search ' . esc_attr( $style ) . ' ' . esc_attr( $column ). '"' . $background . '>';
			if( !empty( $search_page ) ) {
				$output .= '<form method="get" action="' . get_the_permalink( $search_page ) . '">';
					if( $style == "style-1" ) {
						$output .= '<div class="cloux-element-wrapper">';
					}
						$output .= '<div class="items">';
							if( !empty( $atts["title"] ) ) {
								$output .= '<div class="item title">';
									$output .= esc_attr( $atts["title"] );
								$output .= '</div>';
							}

							if( $keyword == "true" ) {
								$output .= '<div class="item keyword">';
									$output .= '<input type="text" name="keyword" placeholder="' . esc_html__( 'Keyword', 'cloux' ) . '">';
								$output .= '</div>';
							}

							if( $category == "true" ) {
								$output .= '<div class="item category">';
									$output .= '<select name="category" class="cs-select">';
										$output .= '<option value="">' . esc_html__( 'Category', 'cloux' ) . '</option>';
										$category_terms = get_terms(
											array(
												'taxonomy' => 'game-category',
												'hide_empty' => $empty_taxonomies,
												'childless' => $childless
											)
										);
										if ( ! empty( $category_terms ) && ! is_wp_error( $category_terms ) ) {
											foreach ( $category_terms as $cat_term ) {
												$cat_term_id = $cat_term->term_id;
												$cat_name = $cat_term->name;
												$cat_group = $cat_term->term_group;
												$output .= '<option value="' . esc_attr( $cat_term_id ) . '" data-class="term-id-' . esc_attr( $cat_group ) . '">' . esc_attr( $cat_name ) . '</option>';
											}
										}
									$output .= '</select>';
								$output .= '</div>';
							}

							if( $platform == "true" ) {
								$output .= '<div class="item platform">';
									$output .= '<select name="platform" class="cs-select">';
										$output .= '<option value="">' . esc_html__( 'Platform', 'cloux' ) . '</option>';
										$platform_terms = get_terms(
											array(
												'taxonomy' => 'platform',
												'hide_empty' => $empty_taxonomies,
												'childless' => $childless
											)
										);
										if ( ! empty( $platform_terms ) && ! is_wp_error( $platform_terms ) ) {
											foreach ( $platform_terms as $platform_term ) {
												$platform_term_id = $platform_term->term_id;
												$platform_name = $platform_term->name;
												$platform_group = $platform_term->term_group;
												$output .= '<option value="' . esc_attr( $platform_term_id ) . '" data-class="term-id-' . esc_attr( $platform_group ) . '">' . esc_attr( $platform_name ) . '</option>';
											}
										}
									$output .= '</select>';
								$output .= '</div>';
							}

							if( $genre == "true" ) {
								$output .= '<div class="item genre">';
									$output .= '<select name="genre" class="cs-select">';
										$output .= '<option value="">' . esc_html__( 'Genre', 'cloux' ) . '</option>';
										$genre_terms = get_terms(
											array(
												'taxonomy' => 'genre',
												'hide_empty' => $empty_taxonomies,
												'childless' => $childless
											)
										);
										if ( ! empty( $genre_terms ) && ! is_wp_error( $genre_terms ) ) {
											foreach ( $genre_terms as $genre_term ) {
												$genre_term_id = $genre_term->term_id;
												$genre_name = $genre_term->name;
												$genre_group = $genre_term->term_group;
												$output .= '<option value="' . esc_attr( $genre_term_id ) . '" data-class="term-id-' . esc_attr( $genre_group ) . '">' . esc_attr( $genre_name ) . '</option>';
											}
										}
									$output .= '</select>';
								$output .= '</div>';
							}

							if( $os == "true" ) {
								$output .= '<div class="item os">';
									$output .= '<select name="os" class="cs-select">';
										$output .= '<option value="">' . esc_html__( 'OS', 'cloux' ) . '</option>';
										$os_terms = get_terms(
											array(
												'taxonomy' => 'os',
												'hide_empty' => $empty_taxonomies,
												'childless' => $childless
											)
										);
										if ( ! empty( $os_terms ) && ! is_wp_error( $os_terms ) ) {
											foreach ( $os_terms as $os_term ) {
												$os_term_id = $os_term->term_id;
												$os_name = $os_term->name;
												$os_group = $os_term->term_group;
												$output .= '<option value="' . esc_attr( $os_term_id ) . '" data-class="term-id-' . esc_attr( $os_group ) . '">' . esc_attr( $os_name ) . '</option>';
											}
										}
									$output .= '</select>';
								$output .= '</div>';
							}

							if( $company == "true" ) {
								$output .= '<div class="item company">';
									$output .= '<select name="company" class="cs-select">';
										$output .= '<option value="">' . esc_html__( 'Company', 'cloux' ) . '</option>';
										$company_terms = get_terms(
											array(
												'taxonomy' => 'company',
												'hide_empty' => $empty_taxonomies,
												'childless' => $childless
											)
										);
										if ( ! empty( $company_terms ) && ! is_wp_error( $company_terms ) ) {
											foreach ( $company_terms as $company_term ) {
												$company_term_id = $company_term->term_id;
												$company_name = $company_term->name;
												$company_group = $company_term->term_group;
												$output .= '<option value="' . esc_attr( $company_term_id ) . '" data-class="term-id-' . esc_attr( $company_group ) . '">' . esc_attr( $company_name ) . '</option>';
											}
										}
									$output .= '</select>';
								$output .= '</div>';
							}

							if( $language == "true" ) {
								$output .= '<div class="item language">';
									$output .= '<select name="language" class="cs-select">';
										$output .= '<option value="">' . esc_html__( 'Language', 'cloux' ) . '</option>';
										$language_terms = get_terms(
											array(
												'taxonomy' => 'language',
												'hide_empty' => $empty_taxonomies,
												'childless' => $childless
											)
										);
										if ( ! empty( $language_terms ) && ! is_wp_error( $language_terms ) ) {
											foreach ( $language_terms as $language_term ) {
												$language_term_id = $language_term->term_id;
												$language_name = $language_term->name;
												$language_group = $language_term->term_group;
												$output .= '<option value="' . esc_attr( $language_term_id ) . '" data-class="term-id-' . esc_attr( $language_group ) . '">' . esc_attr( $language_name ) . '</option>';
											}
										}
									$output .= '</select>';
								$output .= '</div>';
							}

							if( $tag == "true" ) {
								$output .= '<div class="item tag">';
									$output .= '<input type="text" name="tag" placeholder="' . esc_html__( 'Tag', 'cloux' ) . '">';
								$output .= '</div>';
							}

							if( $order_by == "true" ) {
								$output .= '<div class="item order-by">';
									$output .= '<select name="order-by" class="cs-select">';
										$output .= '<option value="">' . esc_html__( 'Order By', 'cloux' ) . '</option>';
										$output .= '<option value="added-date">' . esc_html__( 'Added Date', 'cloux' ) . '</option>';
										$output .= '<option value="title">' . esc_html__( 'Name', 'cloux' ) . '</option>';
										$output .= '<option value="popular-comment">' . esc_html__( 'Comment', 'cloux' ) . '</option>';
									$output .= '</select>';
								$output .= '</div>';
							}

							if( $order_type == "true" ) {
								$output .= '<div class="item order-type">';
									$output .= '<select name="order-type" class="cs-select">';
										$output .= '<option value="">' . esc_html__( 'Order Type', 'cloux' ) . '</option>';
										$output .= '<option value="DESC">' . esc_html__( 'DESC', 'cloux' ) . '</option>';
										$output .= '<option value="ASC">' . esc_html__( 'ASC', 'cloux' ) . '</option>';
									$output .= '</select>';
								$output .= '</div>';
							}

							$output .= '<div class="item submit">';
								$output .= '<button type="submit">' . esc_html__( 'Search', 'cloux' ) . '</button>';
							$output .= '</div>';
						$output .= '</div>';
					if( $style == "style-1" ) {
						$output .= '</div>';
					}
				$output .= '</form>';
			} else {
				if( $style == "style-1" ) {
					$output .= '<div class="cloux-element-wrapper">';
				}
					$output .= '<p class="no-page">';
						$output .= esc_html__( 'You should a Search Results page for search results. You can choose the page from Customize > Games panel. (Theme Options).', 'cloux' );
					$output .= '</p>';
				if( $style == "style-1" ) {
					$output .= '</div>';
				}
			}
		$output .= '</div>';

		return $output;

	}

}
add_shortcode( "cloux_game_search", "cloux_game_search_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Game Search Tool', 'cloux' ),
			"base" => "cloux_game_search",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/game-search-tool.svg',
			"description" => esc_html__( 'Game search element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Title', 'cloux' ),
					"description" => esc_html__( 'You can enter a title.', 'cloux' ),
					"param_name" => "title",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a style.', 'cloux' ),
					"param_name" => "style",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
						esc_html__( 'Style 3', 'cloux' ) => 'style-3',
						esc_html__( 'Style 4', 'cloux' ) => 'style-4',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Column', 'cloux' ),
					"description" => esc_html__( 'You can choose a column for style 1 and style 2.', 'cloux' ),
					"param_name" => "column",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Column 1', 'cloux' ) => 'column-1',
						esc_html__( 'Column 2', 'cloux' ) => 'column-2',
						esc_html__( 'Column 3', 'cloux' ) => 'column-3',
						esc_html__( 'Column 4', 'cloux' ) => 'column-4',
						esc_html__( 'Column 5', 'cloux' ) => 'column-5',
						esc_html__( 'Column 6', 'cloux' ) => 'column-6',
						esc_html__( 'Column 7', 'cloux' ) => 'column-7',
					),
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__( 'Background', 'cloux' ),
					"description" => esc_html__( 'You can upload a background for style 1.', 'cloux' ),
					"param_name" => "background-style-1",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Keyword', 'cloux' ),
					"description" => esc_html__( 'You can active search with keyword.', 'cloux' ),
					"param_name" => "keyword",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Category', 'cloux' ),
					"description" => esc_html__( 'You can active search with category.', 'cloux' ),
					"param_name" => "category",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Platform', 'cloux' ),
					"description" => esc_html__( 'You can active search with platform.', 'cloux' ),
					"param_name" => "platform",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Genre', 'cloux' ),
					"description" => esc_html__( 'You can active search with genre.', 'cloux' ),
					"param_name" => "genre",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'OS', 'cloux' ),
					"description" => esc_html__( 'You can active search with OS.', 'cloux' ),
					"param_name" => "os",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Mode', 'cloux' ),
					"description" => esc_html__( 'You can active search with mode.', 'cloux' ),
					"param_name" => "mode",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Company', 'cloux' ),
					"description" => esc_html__( 'You can active search with company.', 'cloux' ),
					"param_name" => "company",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Language', 'cloux' ),
					"description" => esc_html__( 'You can active search with language.', 'cloux' ),
					"param_name" => "language",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Tag', 'cloux' ),
					"description" => esc_html__( 'You can active search with tag.', 'cloux' ),
					"param_name" => "tag",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order Type', 'cloux' ),
					"description" => esc_html__( 'You can active search with order type.', 'cloux' ),
					"param_name" => "order-type",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order By', 'cloux' ),
					"description" => esc_html__( 'You can active search with order by.', 'cloux' ),
					"param_name" => "order-by",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Empty Taxonomies', 'cloux' ),
					"description" => esc_html__( 'You can choose visible status of empty taxonomies. If you choose true option empty taxonomies will be hide.', 'cloux' ),
					"param_name" => "empty-taxonomies",
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Childless', 'cloux' ),
					"description" => esc_html__( 'You can choose childless status of taxonomies.', 'cloux' ),
					"param_name" => "childless",
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
			),
		)
	);
}



/*======
*
* Game Search Results
*
======*/
function cloux_search_results_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'game-ids' => '',
			'offset' => '',
			'game-count' => '',
			'order' => '',
			'order-type' => '',
			'pagination' => '',
			'exclude-games' => '',
			'exclude-categories' => '',
			'exclude-tags' => '',
			'exclude-genres' => '',
			'exclude-companies' => '',
			'exclude-platforms' => '',
			'exclude-os' => '',
			'exclude-modes' => '',
			'exclude-languages' => '',
			'game-style' => '',
			'column' => '',
			'game-platform' => '',
			'game-genre' => '',
			'game-price' => '',
			'game-description' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		/*====== Exclude Categories ======*/
		$exclude_categories_array = "";

		if( !empty( $atts['exclude-categories'] ) ) {
			$exclude_categories = $atts['exclude-categories'];
			$exclude_categories = explode( ',', $exclude_categories );
		} else {
			$exclude_categories = "";
		}

		if( !empty( $exclude_categories ) ) {
			$exclude_categories_array = array(
				'taxonomy' => 'game-category',
				'field' => 'term_id',
				'terms' => $exclude_categories,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Tags ======*/
		$exclude_tags_array = "";

		if( !empty( $atts['exclude-tags'] ) ) {
			$exclude_tags = $atts['exclude-tags'];
			$exclude_tags = explode( ',', $exclude_tags );
		} else {
			$exclude_tags = "";
		}

		if( !empty( $exclude_tags ) ) {
			$exclude_tags_array = array(
				'taxonomy' => 'game-tag',
				'field' => 'term_id',
				'terms' => $exclude_tags,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Genres ======*/
		$exclude_genres_array = "";

		if( !empty( $atts['exclude-genres'] ) ) {
			$exclude_genres = $atts['exclude-genres'];
			$exclude_genres = explode( ',', $exclude_genres );
		} else {
			$exclude_genres = "";
		}

		if( !empty( $exclude_genres ) ) {
			$exclude_genres_array = array(
				'taxonomy' => 'genre',
				'field' => 'term_id',
				'terms' => $exclude_genres,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Companies ======*/
		$exclude_companies_array = "";

		if( !empty( $atts['exclude-companies'] ) ) {
			$exclude_companies = $atts['exclude-companies'];
			$exclude_companies = explode( ',', $exclude_companies );
		} else {
			$exclude_companies = "";
		}

		if( !empty( $exclude_companies ) ) {
			$exclude_companies_array = array(
				'taxonomy' => 'company',
				'field' => 'term_id',
				'terms' => $exclude_companies,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Platforms ======*/
		$exclude_platforms_array = "";

		if( !empty( $atts['exclude-platforms'] ) ) {
			$exclude_platforms = $atts['exclude-platforms'];
			$exclude_platforms = explode( ',', $exclude_platforms );
		} else {
			$exclude_platforms = "";
		}

		if( !empty( $exclude_platforms ) ) {
			$exclude_platforms_array = array(
				'taxonomy' => 'platform',
				'field' => 'term_id',
				'terms' => $exclude_platforms,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude OS ======*/
		$exclude_os_array = "";

		if( !empty( $atts['exclude-os'] ) ) {
			$exclude_os = $atts['exclude-os'];
			$exclude_os = explode( ',', $exclude_os );
		} else {
			$exclude_os = "";
		}

		if( !empty( $exclude_os ) ) {
			$exclude_os_array = array(
				'taxonomy' => 'os',
				'field' => 'term_id',
				'terms' => $exclude_os,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Modes ======*/
		$exclude_modes_array = "";

		if( !empty( $atts['exclude-modes'] ) ) {
			$exclude_modes = $atts['exclude-modes'];
			$exclude_modes = explode( ',', $exclude_modes );
		} else {
			$exclude_modes = "";
		}

		if( !empty( $exclude_modes ) ) {
			$exclude_modes_array = array(
				'taxonomy' => 'mode',
				'field' => 'term_id',
				'terms' => $exclude_modes,
				'operator' => 'NOT IN',
			);
		}

		/*====== Exclude Languages ======*/
		$exclude_languages_array = "";

		if( !empty( $atts['exclude-languages'] ) ) {
			$exclude_languages = $atts['exclude-languages'];
			$exclude_languages = explode( ',', $exclude_languages );
		} else {
			$exclude_languages = "";
		}

		if( !empty( $exclude_languages ) ) {
			$exclude_languages_array = array(
				'taxonomy' => 'language',
				'field' => 'term_id',
				'terms' => $exclude_languages,
				'operator' => 'NOT IN',
			);
		}

		/*====== Get Methods ======*/
		$include_categories_array = "";
		$include_platforms_array = "";
		$include_genres_array = "";
		$include_os_array = "";
		$include_companies_array = "";
		$include_languages_array = "";
		$include_tags_array = "";

		if( isset( $_GET['category'] ) or isset( $_GET['platform'] ) or isset( $_GET['genre'] ) or isset( $_GET['os'] ) or isset( $_GET['company'] ) or isset( $_GET['language'] ) ) {
			if( isset( $_GET['category'] ) ) {
				$category = esc_js( esc_sql( esc_attr( $_GET["category"] ) ) );
				if( !empty( $category ) ) {
					$include_categories = explode( ',', $category );
					$include_categories_array = array(
						'taxonomy' => 'game-category',
						'field' => 'term_id',
						'terms' => $include_categories,
						'operator' => 'IN',
					);
				}
			}

			if( isset( $_GET['platform'] ) ) {
				$platform = esc_js( esc_sql( esc_attr( $_GET["platform"] ) ) );
				if( !empty( $platform ) ) {
					$include_platforms = explode( ',', $platform );
					$include_platforms_array = array(
						'taxonomy' => 'platform',
						'field' => 'term_id',
						'terms' => $include_platforms,
						'operator' => 'IN',
					);
				}
			}

			if( isset( $_GET['genre'] ) ) {
				$genre = esc_js( esc_sql( esc_attr( $_GET["genre"] ) ) );
				if( !empty( $genre ) ) {
					$include_genres = explode( ',', $genre );
					$include_genres_array = array(
						'taxonomy' => 'genre',
						'field' => 'term_id',
						'terms' => $include_genres,
						'operator' => 'IN',
					);
				}
			}

			if( isset( $_GET['os'] ) ) {
				$os = esc_js( esc_sql( esc_attr( $_GET["os"] ) ) );
				if( !empty( $os ) ) {
					$include_os = explode( ',', $os );
					$include_os_array = array(
						'taxonomy' => 'os',
						'field' => 'term_id',
						'terms' => $include_os,
						'operator' => 'IN',
					);
				}
			}

			if( isset( $_GET['company'] ) ) {
				$company = esc_js( esc_sql( esc_attr( $_GET["company"] ) ) );
				if( !empty( $company ) ) {
					$include_companies = explode( ',', $company );
					$include_companies_array = array(
						'taxonomy' => 'company',
						'field' => 'term_id',
						'terms' => $include_companies,
						'operator' => 'IN',
					);
				}
			}

			if( isset( $_GET['language'] ) ) {
				$language = esc_js( esc_sql( esc_attr( $_GET["language"] ) ) );
				if( !empty( $language ) ) {
					$include_languages = explode( ',', $language );
					$include_languages_array = array(
						'taxonomy' => 'language',
						'field' => 'term_id',
						'terms' => $include_languages,
						'operator' => 'IN',
					);
				}
			}
		}

		/*====== Main Query ======*/
		$arg = array(
			'posts_per_page' => $atts['game-count'],
			'offset' => $atts['offset'],
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'post_type' => 'game',
			'tax_query' => array (
				'relation' => 'AND',
				$exclude_categories_array,
				$exclude_tags_array,
				$exclude_genres_array,
				$exclude_companies_array,
				$exclude_platforms_array,
				$exclude_os_array,
				$exclude_modes_array,
				$exclude_languages_array,
				$include_categories_array,
				$include_tags_array,
				$include_genres_array,
				$include_companies_array,
				$include_platforms_array,
				$include_os_array,
				$include_modes_array,
				$include_languages_array,
			)
		);

		if( isset( $_GET['keyword'] ) or isset( $_GET['tag'] ) or isset( $_GET['order-type'] ) or isset( $_GET['order-by'] ) ) {
			if( isset( $_GET['keyword'] ) ) {
				$keyword = esc_js( esc_sql( esc_attr( $_GET["keyword"] ) ) );
				if( !empty( $keyword ) ) {
					$extra_query = array(
						's' => $keyword,
					);
					$arg = wp_parse_args( $arg, $extra_query );
				}
			}

			if( isset( $_GET['order-type'] ) ) {
				$get_order_type = esc_js( esc_sql( esc_attr( $_GET["order-type"] ) ) );
				if( !empty( $get_order_type ) ) {
					$extra_query = array(
						'order' => $get_order_type,
					);
					$arg = wp_parse_args( $arg, $extra_query );
				}
			}

			if( isset( $_GET['order-by'] ) ) {
				$get_order_by = esc_js( esc_sql( esc_attr( $_GET["order-by"] ) ) );
				if( !empty( $get_order_by ) ) {
					$extra_query = array(
						'orderby' => $get_order_by,
					);
					$arg = wp_parse_args( $arg, $extra_query );
				}
			}

			if( isset( $_GET['tag'] ) ) {
				$tag = esc_js( esc_sql( esc_attr( $_GET["tag"] ) ) );
				if( !empty( $tag ) ) {
					$include_tags = explode( ',', $tag );
					$include_tags_array = array(
						'taxonomy' => 'game-tag',
						'field' => 'name',
						'terms' => $include_tags,
						'operator' => 'IN',
					);
				}
			}
		}

		/*====== Pagination ======*/
		if( !empty( $atts['pagination'] ) ) {
			$pagination = $atts['pagination'];
		} else {
			$pagination = "true";
		}

		if( $pagination == "true" ) {
			$paged = is_front_page() ? get_query_var( 'page', 1 ) : get_query_var( 'paged', 1 );
			if( empty( $paged ) ) { $paged = 1; }

			$extra_query = array(
				'paged' => $paged,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Order & Order By ======*/
		if( !isset( $_GET['order-type'] ) ) {
			$get_order_type = esc_js( esc_sql( esc_attr( $_GET["order-type"] ) ) );
			if( empty( $get_order_type ) ) {
				if( $atts["order"] == "ASC" ) {
					$order = "ASC";
				} else {
					$order = "DESC";
				}

				if( !empty( $order ) ) {
					$extra_query = array(
						'order' => $order,
					);
					$arg = wp_parse_args( $arg, $extra_query );
				}
			}
		}

		if( !isset( $_GET['order-by'] ) ) {
			$get_order_by = esc_js( esc_sql( esc_attr( $_GET["order-by"] ) ) );
			if( empty( $get_order_by ) ) {
				if( $atts["order-type"] == "popular-comment" ) {
					$order_by = "comment_count";
				} elseif( $atts["order-type"] == "id" ) {
					$order_by = "ID";
				} elseif( $atts["order-type"] == "popular" ) {
					$order_by = "comment_count";
				} elseif( $atts["order-type"] == "title" ) {
					$order_by = "title";
				} elseif( $atts["order-type"] == "menu_order" ) {
					$order_by = "menu_order";
				} elseif( $atts["order-type"] == "rand" ) {
					$order_by = "rand";
				} elseif( $atts["order-type"] == "none" ) {
					$order_by = "none";
				} else {
					$order_by = "date";
				}

				if( !empty( $order_by ) ) {
					$extra_query = array(
						'orderby' => $order_by,
					);
					$arg = wp_parse_args( $arg, $extra_query );
				}
			}
		}

		/*====== Game IDs & Include Games ======*/
		if( !empty( $atts['game-ids'] ) ) {
			$game_ids = $atts['game-ids'];
			$include_posts = explode( ',', $game_ids );
		} else {
			$include_posts = "";
		}

		if( !empty( $include_posts ) ) {
			$extra_query = array(
				'post__in' => $include_posts,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Platform Status ======*/
		if( !empty( $atts['game-platform'] ) ) {
			$platform_status = $atts['game-platform'];
		} else {
			$platform_status = "true";
		}

		/*====== Genre Status ======*/
		if( !empty( $atts['game-genre'] ) ) {
			$genre_status = $atts['game-genre'];
		} else {
			$genre_status = "true";
		}

		/*====== Price Status ======*/
		if( !empty( $atts['game-price'] ) ) {
			$price_status = $atts['game-price'];
		} else {
			$price_status = "true";
		}

		/*====== Description Status ======*/
		if( !empty( $atts['game-description'] ) ) {
			$description_status = $atts['game-description'];
		} else {
			$description_status = "true";
		}

		/*====== Description Status ======*/
		if( !empty( $atts['column'] ) ) {
			$column = $atts['column'];
		} else {
			$column = "column-1";
		}

		/*====== HTML Output ======*/
		$wp_query = new WP_Query( $arg );
		if( $wp_query->have_posts() ) {
			$output .= '<div class="game-listing">';
				$output .= '<div class="game-list-style-1 game-list ' . esc_attr( $column ) . '">';
					while ( $wp_query->have_posts() ) {
						$wp_query->the_post();
						if( $atts['game-style'] == "style-2" ) {
							$output .= cloux_game_style_2( $game = get_the_ID(), $platform = $platform_status, $price = $price_status, $genre = $genre_status );
						} elseif( $atts['game-style'] == "style-3" ) {
							$output .= cloux_game_style_3( $game = get_the_ID(), $image = "true", $platform = $platform_status, $price = $price_status, $genre = $genre_status, $excerpt = $description_status );
						} else {
							$output .= cloux_game_style_1( $game = get_the_ID(), $poster = "true", $genre = $genre_status, $platform = $platform_status, $price = $price_status, $excerpt = $description_status );
						}
					}
				$output .= '</div>';

				if( $pagination == "true" ) {
					$output .= cloux_element_pagination( $paged = $paged, $query = $wp_query, $style = "style-1" );
				}
			$output .= '</div>';
		} else {
			$output .= esc_html__( 'There are no results that match your search.', 'cloux' );
		}
		wp_reset_postdata();

		return $output;

	}

}
add_shortcode( "cloux_search_results", "cloux_search_results_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Game Search Results', 'cloux' ),
			"base" => "cloux_search_results",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/game-search-results.svg',
			"description" => esc_html__( 'Search results for game search.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Offset', 'cloux' ),
					"description" => esc_html__( 'You can enter offset number.', 'cloux' ),
					"param_name" => "offset",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Game Count', 'cloux' ),
					"description" => esc_html__( 'You can enter game count.', 'cloux' ),
					"param_name" => "game-count",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order', 'cloux' ),
					"description" => esc_html__( 'You can choose a order.', 'cloux' ),
					"param_name" => "order",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'DESC', 'cloux' ) => 'DESC',
						esc_html__( 'ASC', 'cloux' ) => 'ASC',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order Type', 'cloux' ),
					"description" => esc_html__( 'You can choose a order type.', 'cloux' ),
					"param_name" => "order-type",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'Added Date', 'cloux' ) => 'added-date',
						esc_html__( 'Popular by Comment', 'cloux' ) => 'popular-comment',
						esc_html__( 'ID', 'cloux' ) => 'id',
						esc_html__( 'Title', 'cloux' ) => 'title',
						esc_html__( 'Menu Order', 'cloux' ) => 'menu_order',
						esc_html__( 'Random', 'cloux' ) => 'rand',
						esc_html__( 'None', 'cloux' ) => 'none',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Pagination', 'cloux' ),
					"description" => esc_html__( 'You can choose status of pagination.', 'cloux' ),
					"param_name" => "pagination",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Games', 'cloux' ),
					"description" => esc_html__( 'You can enter game ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-games",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Categories', 'cloux' ),
					"description" => esc_html__( 'You can enter category ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-categories",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Tags', 'cloux' ),
					"description" => esc_html__( 'You can enter tag ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-tags",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Genres', 'cloux' ),
					"description" => esc_html__( 'You can enter genre ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-genres",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Companies', 'cloux' ),
					"description" => esc_html__( 'You can enter company ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-companies",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Platforms', 'cloux' ),
					"description" => esc_html__( 'You can enter platform ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-platforms",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude OS', 'cloux' ),
					"description" => esc_html__( 'You can enter OS ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-os",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Modes', 'cloux' ),
					"description" => esc_html__( 'You can enter mode ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-modes",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Languages', 'cloux' ),
					"description" => esc_html__( 'You can enter language ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-languages",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a game list style.', 'cloux' ),
					"param_name" => "game-style",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
						esc_html__( 'Style 3', 'cloux' ) => 'style-3',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Column', 'cloux' ),
					"description" => esc_html__( 'You can choose a column.', 'cloux' ),
					"param_name" => "column",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( '1 Column', 'cloux' ) => 'column-1',
						esc_html__( '2 Column', 'cloux' ) => 'column-2',
						esc_html__( '3 Column', 'cloux' ) => 'column-3',
						esc_html__( '4 Column', 'cloux' ) => 'column-4',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Platform', 'cloux' ),
					"description" => esc_html__( 'You can choose status of platform detail.', 'cloux' ),
					"param_name" => "game-platform",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Genre', 'cloux' ),
					"description" => esc_html__( 'You can choose status of genre detail.', 'cloux' ),
					"param_name" => "game-genre",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Price', 'cloux' ),
					"description" => esc_html__( 'You can choose status of price detail.', 'cloux' ),
					"param_name" => "game-price",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game Description', 'cloux' ),
					"description" => esc_html__( 'You can choose status of game description.', 'cloux' ),
					"param_name" => "game-description",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
			),
		)
	);
}


/*======
*
* Blog
*
======*/
function cloux_blog_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'category' => '',
			'tag' => '',
			'post-ids' => '',
			'exclude-posts' => '',
			'offset' => '',
			'post-count' => '',
			'order' => '',
			'order-type' => '',
			'pagination' => '',
			'style' => '',
			'column' => '',
			'image' => '',
			'excerpt' => '',
			'details' => '',
			'read-more' => '',
			'read-more-style' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		/*====== Main Query ======*/
		$arg = array(
			'posts_per_page' => $atts['post-count'],
			'offset' => $atts['offset'],
			'cat' => $atts['category'],
			'tag' => $atts['tag'],
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'post_type' => 'post',
		);

		/*====== Pagination ======*/
		if( !empty( $atts['pagination'] ) ) {
			$pagination = $atts['pagination'];
		} else {
			$pagination = "true";
		}

		if( $pagination == "true" ) {
			$paged = is_front_page() ? get_query_var( 'page', 1 ) : get_query_var( 'paged', 1 );
			if( empty( $paged ) ) { $paged = 1; }

			$extra_query = array(
				'paged' => $paged,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Order & Order By ======*/
		if( $atts["order"] == "ASC" ) {
			$order = "ASC";
		} else {
			$order = "DESC";
		}

		if( !empty( $order ) ) {
			$extra_query = array(
				'order' => $order,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		if( $atts["order-type"] == "popular-comment" ) {
			$order_by = "comment_count";
		} elseif( $atts["order-type"] == "id" ) {
			$order_by = "ID";
		} elseif( $atts["order-type"] == "popular" ) {
			$order_by = "comment_count";
		} elseif( $atts["order-type"] == "title" ) {
			$order_by = "title";
		} elseif( $atts["order-type"] == "menu_order" ) {
			$order_by = "menu_order";
		} elseif( $atts["order-type"] == "rand" ) {
			$order_by = "rand";
		} elseif( $atts["order-type"] == "none" ) {
			$order_by = "none";
		} else {
			$order_by = "date";
		}

		if( !empty( $order_by ) ) {
			$extra_query = array(
				'orderby' => $order_by,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Post IDs & Include Posts ======*/
		if( !empty( $atts['post-ids'] ) ) {
			$post_ids = $atts['post-ids'];
			$include_posts = explode( ',', $post_ids );
		} else {
			$include_posts = "";
		}

		if( !empty( $include_posts ) ) {
			$extra_query = array(
				'post__in' => $include_posts,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Exclude Posts ======*/
		if( !empty( $atts['exclude-posts'] ) ) {
			$exclude_posts = $atts['exclude-posts'];
			$exclude_posts = explode( ',', $exclude_posts );
		} else {
			$exclude_posts = "";
		}

		if( !empty( $exclude_posts ) ) {
			$extra_query = array(
				'post__not_in' => $exclude_posts,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Column ======*/
		if( !empty( $atts['column'] ) ) {
			$column = $atts['column'];
		} else {
			$column = "column-1";
		}

		/*====== Style ======*/
		if( !empty( $atts['style'] ) ) {
			$style = $atts['style'];
		} else {
			$style = "style-1";
		}

		/*====== Column ======*/
		if( !empty( $atts['column'] ) ) {
			$column = $atts['column'];
		} else {
			$column = "column-1";
		}

		/*====== Image ======*/
		if( !empty( $atts['image'] ) ) {
			$image = $atts['image'];
		} else {
			$image = "true";
		}

		/*====== Excerpt ======*/
		if( !empty( $atts['excerpt'] ) ) {
			$excerpt = $atts['excerpt'];
		} else {
			$excerpt = "true";
		}

		/*====== Details ======*/
		if( !empty( $atts['details'] ) ) {
			$details = $atts['details'];
		} else {
			$details = "true";
		}

		/*====== Read More ======*/
		if( !empty( $atts['read-more'] ) ) {
			$read_more = $atts['read-more'];
		} else {
			$read_more = "true";
		}

		/*====== Read More Style ======*/
		if( !empty( $atts['read-more-style'] ) ) {
			$read_more_style = $atts['read-more-style'];
		} else {
			$read_more_style = "true";
		}

		/*====== HTML Output ======*/
		$wp_query = new WP_Query( $arg );
		if( $wp_query->have_posts() ) {
			$output .= '<div class="cloux-blog ' . esc_attr( $style ) . '">';
				$output .= '<div class="post-list ' . esc_attr( $column ) . '">';
					while ( $wp_query->have_posts() ) {
						$wp_query->the_post();
						if( $atts['style'] == "style-2" ) {
							$output .= '<div class="item">';
								$output .= cloux_post_style_2( $post = get_the_ID(), $image = $image, $excerpt = $excerpt, $details = $details, $read_more = $read_more, $button_style = $read_more_style, $post_detail_style = "style-1" );
							$output .= '</div>';
						} elseif( $atts['style'] == "style-3" ) {
							$output .= '<div class="item">';
								$output .= cloux_post_style_3( $post = get_the_ID(), $image = $image, $excerpt = $excerpt, $details = $details, $read_more = $read_more, $button_style = $read_more_style, $post_detail_style = "style-1" );
							$output .= '</div>';
						} elseif( $atts['style'] == "style-4" ) {
							$output .= '<div class="item">';
								$output .= cloux_post_style_4( $post = get_the_ID(), $image = $image, $details = $details, $post_detail_style = "style-1" );
							$output .= '</div>';
						} elseif( $atts['style'] == "style-5" ) {
							$output .= '<div class="item none-shadow">';
								$output .= cloux_post_style_1( $post = get_the_ID(), $image = $image, $excerpt = $excerpt, $details = $details, $read_more = $read_more, $button_style = $read_more_style, $post_detail_style = "style-1" );
							$output .= '</div>';
						} else {
							$output .= '<div class="item">';
								$output .= cloux_post_style_1( $post = get_the_ID(), $image = $image, $excerpt = $excerpt, $details = $details, $read_more = $read_more, $button_style = $read_more_style, $post_detail_style = "style-1" );
							$output .= '</div>';
						}
					}
				$output .= '</div>';

				if( $pagination == "true" ) {
					$output .= cloux_element_pagination( $paged = $paged, $query = $wp_query, $style = "style-1" );
				}
			$output .= '</div>';

		}
		wp_reset_postdata();

		return $output;

	}

}
add_shortcode( "cloux_blog", "cloux_blog_output" );

if( function_exists( 'vc_map' ) ) {
	$post_categories = get_terms( 'category' );
	$post_categories_array = array();
	$post_categories_array[ esc_html__( 'All Categories', 'cloux' ) ] = "-";
	foreach($post_categories as $post_category) {
		$post_categories_array[$post_category->name] =  $post_category->term_id;
	}

	vc_map(
		array(
			"name" => esc_html__( 'Blog', 'cloux' ),
			"base" => "cloux_blog",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/blog.svg',
			"description" => esc_html__( 'Blog listing element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Category', 'cloux' ),
					"description" => esc_html__( 'You can choose a category.', 'cloux' ),
					"param_name" => "category",
					"value" => $post_categories_array,
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Tag', 'cloux' ),
					"description" => esc_html__( 'You can enter a tag name.', 'cloux' ),
					"param_name" => "tag",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Post IDs", 'cloux' ),
					"description" => esc_html__( 'You can enter post ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "post-ids",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Posts', 'cloux' ),
					"description" => esc_html__( 'You can enter post ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-posts",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Offset', 'cloux' ),
					"description" => esc_html__( 'You can enter offset number.', 'cloux' ),
					"param_name" => "offset",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Post Count', 'cloux' ),
					"description" => esc_html__( 'You can enter post count.', 'cloux' ),
					"param_name" => "post-count",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order', 'cloux' ),
					"description" => esc_html__( 'You can choose a order.', 'cloux' ),
					"param_name" => "order",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'DESC', 'cloux' ) => 'DESC',
						esc_html__( 'ASC', 'cloux' ) => 'ASC',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order Type', 'cloux' ),
					"description" => esc_html__( 'You can choose a order type.', 'cloux' ),
					"param_name" => "order-type",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'Added Date', 'cloux' ) => 'added-date',
						esc_html__( 'Popular by Comment', 'cloux' ) => 'popular-comment',
						esc_html__( 'ID', 'cloux' ) => 'id',
						esc_html__( 'Title', 'cloux' ) => 'title',
						esc_html__( 'Menu Order', 'cloux' ) => 'menu_order',
						esc_html__( 'Random', 'cloux' ) => 'rand',
						esc_html__( 'None', 'cloux' ) => 'none',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Pagination', 'cloux' ),
					"description" => esc_html__( 'You can choose status of pagination.', 'cloux' ),
					"param_name" => "pagination",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a list style.', 'cloux' ),
					"param_name" => "style",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
						esc_html__( 'Style 3', 'cloux' ) => 'style-3',
						esc_html__( 'Style 4', 'cloux' ) => 'style-4',
						esc_html__( 'Style 5', 'cloux' ) => 'style-5',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Column', 'cloux' ),
					"description" => esc_html__( 'You can choose a column.', 'cloux' ),
					"param_name" => "column",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( '1 Column', 'cloux' ) => 'column-1',
						esc_html__( '2 Column', 'cloux' ) => 'column-2',
						esc_html__( '3 Column', 'cloux' ) => 'column-3',
						esc_html__( '4 Column', 'cloux' ) => 'column-4',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Image', 'cloux' ),
					"description" => esc_html__( 'You can choose status of post image.', 'cloux' ),
					"param_name" => "image",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Excerpt', 'cloux' ),
					"description" => esc_html__( 'You can choose status of post excerpt.', 'cloux' ),
					"param_name" => "excerpt",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Details', 'cloux' ),
					"description" => esc_html__( 'You can choose status of post details.', 'cloux' ),
					"param_name" => "details",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Read More', 'cloux' ),
					"description" => esc_html__( 'You can choose status of read more button.', 'cloux' ),
					"param_name" => "read-more",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Read More Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a button style.', 'cloux' ),
					"param_name" => "read-more-style",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
						esc_html__( 'Style 3', 'cloux' ) => 'style-3',
					),
				),
			),
		)
	);
}



/*======
*
* Content Box
*
======*/
function cloux_content_box_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'type' => '',
			'style' => '',
			'popup-style' => '',
			'content-align' => '',
			'title' => '',
			'colored-title' => '',
			'separate-titles' => '',
			'excerpt' => '',
			'content' => '',
			'read-more' => '',
			'read-more-text' => '',
			'button-1' => '',
			'button-1-link' => '',
			'button-2' => '',
			'button-2-link' => '',
			'button-style' => '',
			'padding' => '',
			'image' => '',
			'video' => '',
			'background-image' => '',
			'sponsor-logos' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		/*====== Content ======*/
		$atts['content'] = $content;

		/*====== Separate Titles ======*/
		if( !empty( $atts["separate-titles"] ) ) {
			$separate_titles = 'separate-titles-' . $atts["separate-titles"];
		} else {
			$separate_titles = "separate-titles-true";
		}

		/*====== Style ======*/
		if( !empty( $atts["style"] ) ) {
			$style = $atts["style"];
		} else {
			$style = "style-1";
		}

		/*====== Popup Style ======*/
		if( !empty( $atts["popup-style"] ) ) {
			$popup_style = $atts["popup-style"];
		} else {
			$popup_style = "style-1";
		}

		/*====== Content Align ======*/
		if( !empty( $atts["content-align"] ) ) {
			$align = $atts["content-align"];
		} else {
			$align = "content-right";
		}

		/*====== Type ======*/
		if( !empty( $atts["type"] ) ) {
			$type = $atts["type"];
		} else {
			$type = "type-1";
		}

		/*====== Read More ======*/
		if( !empty( $atts["read-more"] ) ) {
			$read_more = $atts["read-more"];
		} else {
			$read_more = "true";
		}

		/*====== Read More Text ======*/
		if( !empty( $atts["read-more-text"] ) ) {
			$read_more_text = $atts["read-more-text"];
		} else {
			$read_more_text = esc_html__( 'Read More', 'cloux' );
		}

		/*====== Button 1 Status ======*/
		if( !empty( $atts["button-1"] ) ) {
			$button_1 = $atts["button-1"];
		} else {
			$button_1 = "true";
		}

		/*====== Button 2 Status ======*/
		if( !empty( $atts["button-2"] ) ) {
			$button_2 = $atts["button-2"];
		} else {
			$button_2 = "true";
		}

		/*====== Button Style ======*/
		if( !empty( $atts["button-style"] ) ) {
			$button_style = $atts["button-style"];
		} else {
			$button_style = "style-1";
		}

		/*====== Button Style ======*/
		if( !empty( $atts["padding"] ) ) {
			$padding = $atts["padding"];
		} else {
			$padding = "padding-150";
		}

		/*====== Background Image ======*/
		if( !empty( $atts["background-image"] ) ) {
			$background = $atts["background-image"];
			$background = wp_get_attachment_image_src( $background, 'cloux-content-box-bg', true );
			$background = $background[0];
		} else {
			$background = "";
		}

		/*====== HTML Output ======*/
		if( !empty( $atts["title"] ) or !empty( $atts["colored-title"] ) or !empty( $atts["excerpt"] ) or !empty( $atts["content"] ) ) {
			$output .= '<div class="cloux-content-box ' . esc_attr( $align ) . ' ' . esc_attr( $style ) . ' ' . esc_attr( $separate_titles ) . ' ' . esc_attr( $padding ) . '" style="background-image:url(' . esc_url( $background ) . ');">';
				$output .= '<div class="cloux-element-wrapper">';
					$output .= '<div class="inner main-content">';
						if( !empty( $atts["video"] ) or !empty( $atts["image"] ) or !empty( $atts["sponsor-logos"] ) ) {
							if( $type == "type-2" ) {
								if( !empty( $atts["video"] ) ) {
									$output .= '<div class="video media-content">';
										global $wp_embed;
										$embed_shortcode = '[embed width="350" height="450"]' . esc_url( $atts["video"] ) . '[/embed]';
										$output .= $wp_embed->run_shortcode( $embed_shortcode );
									$output .= '</div>';
								}
							} elseif( $type == "type-3" ) {
								if( !empty( $atts["sponsor-logos"] ) ) {
									$output .= '<div class="logos media-content">';
										$logos = $atts["sponsor-logos"];
										if( !empty( $logos ) ) {
											$output .= '<ul>';
												$logos = explode( ',', $logos );
												foreach ( $logos as $logo ) {
													if( !empty( $logo ) ) {
														$output .= '<li>';
															$output .= wp_get_attachment_image( $logo, 'cloux-sponsor-1', true );
														$output .= '</li>';
													}
												}
											$output .= '</ul>';
										}
									$output .= '</div>';
								}
							} else {
								if( !empty( $atts["image"] ) ) {
									$image = wp_get_attachment_image( $atts["image"], 'cloux-content-box' );
									if( !empty( $image ) ) {
										$output .= '<div class="image media-content">';
											$output .= $image;
										$output .= '</div>';
									}
								}
							}
						}

						if( !empty( $atts["title"] ) or !empty( $atts["colored-title"] ) or !empty( $atts["excerpt"] ) or !empty( $atts["content"] ) ) {
							$output .= '<div class="content">';
								if( !empty( $atts["title"] ) or !empty( $atts["colored-title"] ) ) {
									$output .= '<div class="title">';
										if( !empty( $atts["title"] ) ) {
											$output .= esc_attr( $atts["title"] );
										}
										if( !empty( $atts["title"] ) and !empty( $atts["colored-title"] ) ) {
											$output .= ' ';
										}
										if( !empty( $atts["colored-title"] ) ) {
											$output .= '<span>';
												$output .= esc_attr( $atts["colored-title"] );
											$output .= '</span>';
										}
									$output .= '</div>';
								}

								if( !empty( $atts["excerpt"] ) ) {
									$output .= '<div class="excerpt">';
										$output .= esc_attr( $atts["excerpt"] );
									$output .= '</div>';
								}

								if( $read_more == "true" or $button_1 == "true" or $button_2 == "true" ) {
									$output .= '<div class="buttons ' . esc_attr( $button_style ) . '">';
										if( $read_more == "true" ) {
											$output .= '<div class="cloux-button content-read-more ' . esc_attr( $button_style ) . '">';
												$output .= '<a title="' . esc_attr( $read_more_text ) . '"><span>' . esc_attr( $read_more_text ) . '</span></a>';
											$output .= '</div>';
										}

										if( $button_1 == "true" ) {
											if( !empty( $atts["button-1-link"] ) ) {
												$button_1_link = $atts["button-1-link"];
												$button_1_link = vc_build_link( $button_1_link );

												if( !empty( $button_1_link["target"] ) ) {
													$button_1_target = $button_1_link["target"];
												} else {
													$button_1_target = "_parent";
												}

												$output .= '<div class="cloux-button ' . esc_attr( $button_style ) . '">';
													$output .= '<a href="' . esc_url( $button_1_link["url"] ) . '" title="' . esc_attr( $button_1_link["title"] ) . '" target="' . esc_attr( $button_1_target ) . '"><span>' . esc_attr( $button_1_link["title"] ) . '</span></a>';
												$output .= '</div>';
											}
										}

										if( $button_2 == "true" ) {
											if( !empty( $atts["button-2-link"] ) ) {
												$button_2_link = $atts["button-2-link"];
												$button_2_link = vc_build_link( $button_2_link );

												if( !empty( $button_2_link["target"] ) ) {
													$button_2_target = $button_2_link["target"];
												} else {
													$button_2_target = "_parent";
												}

												$output .= '<div class="cloux-button ' . esc_attr( $button_style ) . '">';
													$output .= '<a href="' . esc_url( $button_2_link["url"] ) . '" title="' . esc_attr( $button_2_link["title"] ) . '" target="' . esc_attr( $button_2_target ) . '"><span>' . esc_attr( $button_2_link["title"] ) . '</span></a>';
												$output .= '</div>';
											}
										}
									$output .= '</div>';
								}
							$output .= '</div>';
						}
					$output .= '</div>';
				$output .= '</div>';

				if( $read_more == "true" and !empty( $atts["content"] ) ) {
					$output .= '<div class="popup ' . esc_attr( $popup_style ) . '">';
						$output .= '<div class="cloux-close"></div>';
						$output .= '<div class="hover-color hover-color-a"></div>';
						$output .= '<div class="hover-color hover-color-b"></div>';
						$output .= '<div class="hover-color hover-color-c"></div>';
						$output .= '<div class="wrap"><div class="wrap-block">';
							$output .= '<div class="container">';
								$output .= '<div class="hover-content-wrap">';
									$output .= '<div class="scrollbar-outer">';
										if( !empty( $atts["title"] ) or !empty( $atts["colored-title"] ) ) {
											$output .= '<div class="title">';
												if( !empty( $atts["title"] ) ) {
													$output .= esc_attr( $atts["title"] );
												}
												if( !empty( $atts["title"] ) and !empty( $atts["colored-title"] ) ) {
													$output .= ' ';
												}
												if( !empty( $atts["colored-title"] ) ) {
													$output .= '<span>';
														$output .= esc_attr( $atts["colored-title"] );
													$output .= '</span>';
												}
											$output .= '</div>';

											if( !empty( $atts["content"] ) ) {
												$output .= '<div class="hover-content">';
													$output .= wpautop( $atts["content"] );
												$output .= '</div>';
											}
										}
									$output .= '</div>';
								$output .= '</div>';
							$output .= '</div>';
						$output .= '</div></div>';
					$output .= '</div>';
				}
			$output .= '</div>';
		}

		return $output;

	}

}
add_shortcode( "cloux_content_box", "cloux_content_box_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Content Box', 'cloux' ),
			"base" => "cloux_content_box",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/content-box.svg',
			"description" => esc_html__( 'Content box element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Type', 'cloux' ),
					"description" => esc_html__( 'You can choose a style.', 'cloux' ),
					"param_name" => "type",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Standard (Content + Image)', 'cloux' ) => 'type-1',
						esc_html__( 'Video (Content + Video)', 'cloux' ) => 'type-2',
						esc_html__( 'Logos (Content + Logos)', 'cloux' ) => 'type-3',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a style.', 'cloux' ),
					"param_name" => "style",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
						esc_html__( 'Style 3', 'cloux' ) => 'style-3',
						esc_html__( 'Style 4', 'cloux' ) => 'style-4',
						esc_html__( 'Style 5', 'cloux' ) => 'style-5',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Popup Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a popup style.', 'cloux' ),
					"param_name" => "popup-style",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
						esc_html__( 'Style 3', 'cloux' ) => 'style-3',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Content Align', 'cloux' ),
					"description" => esc_html__( 'You can choose align of content.', 'cloux' ),
					"param_name" => "content-align",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Right', 'cloux' ) => 'content-right',
						esc_html__( 'Left', 'cloux' ) => 'content-left',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Title', 'cloux' ),
					"description" => esc_html__( 'You can enter a title.', 'cloux' ),
					"param_name" => "title",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Colored Title', 'cloux' ),
					"description" => esc_html__( 'You can enter a colored title.', 'cloux' ),
					"param_name" => "colored-title",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Separate Titles', 'cloux' ),
					"description" => esc_html__( 'You can choose status of separate.', 'cloux' ),
					"param_name" => "separate-titles",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Excerpt', 'cloux' ),
					"description" => esc_html__( 'You can enter a excerpt.', 'cloux' ),
					"param_name" => "excerpt",
				),
				array(
					"type" => "textarea_html",
					"heading" => esc_html__( 'Read More Content', 'cloux' ),
					"description" => esc_html__( 'You can enter content for popup.', 'cloux' ),
					"param_name" => "content",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Read More', 'cloux' ),
					"description" => esc_html__( 'You can choose status of read more button.', 'cloux' ),
					"param_name" => "read-more",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Read More Text', 'cloux' ),
					"description" => esc_html__( 'You can enter a read more button text. Default: Read More.', 'cloux' ),
					"param_name" => "read-more-text",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Button 1', 'cloux' ),
					"description" => esc_html__( 'You can choose status of button 1.', 'cloux' ),
					"param_name" => "button-1",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Button 1', 'cloux' ),
					"description" => esc_html__( 'You can create a button.', 'cloux' ),
					"param_name" => "button-1-link",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Button 2', 'cloux' ),
					"description" => esc_html__( 'You can choose status of button 2.', 'cloux' ),
					"param_name" => "button-2",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Button 2', 'cloux' ),
					"description" => esc_html__( 'You can create a button.', 'cloux' ),
					"param_name" => "button-2-link",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Button Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a button style.', 'cloux' ),
					"param_name" => "button-style",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
						esc_html__( 'Style 3', 'cloux' ) => 'style-3',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Padding', 'cloux' ),
					"description" => esc_html__( 'You can choose a padding status.', 'cloux' ),
					"param_name" => "padding",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Padding 150', 'cloux' ) => 'padding-150',
						esc_html__( 'Padding 90', 'cloux' ) => 'padding-90',
						esc_html__( 'Padding 75', 'cloux' ) => 'padding-75',
						esc_html__( 'Padding 50', 'cloux' ) => 'padding-50',
						esc_html__( 'Padding 45', 'cloux' ) => 'padding-45',
						esc_html__( 'Padding 30', 'cloux' ) => 'padding-30',
						esc_html__( 'Padding 15', 'cloux' ) => 'padding-15',
						esc_html__( 'Padding 0', 'cloux' ) => 'padding-0',
					),
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__( 'Image', 'cloux' ),
					"description" => esc_html__( 'You can upload a image.', 'cloux' ),
					"param_name" => "image",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Video URL', 'cloux' ),
					"description" => esc_html__( 'You can enter a video url. Details: https://codex.wordpress.org/Embeds.', 'cloux' ),
					"param_name" => "video",
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__( 'Background Image', 'cloux' ),
					"description" => esc_html__( 'You can upload a background image.', 'cloux' ),
					"param_name" => "background-image",
				),
				array(
					"type" => "attach_images",
					"heading" => esc_html__( 'Sponsor Logos', 'cloux' ),
					"description" => esc_html__( 'You can upload sponsor logos.', 'cloux' ),
					"param_name" => "sponsor-logos",
				),
			),
		)
	);
}



/*======
*
* Banner Box
*
======*/
function cloux_banner_box_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'top-title' => '',
			'main-title' => '',
			'text' => '',
			'link' => '',
			'background-image' => '',
			'button-style' => '',
			'shadow' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		if( !empty( $atts["top-title"] ) or !empty( $atts["main-title"] ) or !empty( $atts["text"] ) or !empty( $atts["link"] ) ) {

			/*====== Background Image ======*/
			if( !empty( $atts["background-image"] ) ) {
				$background = $atts["background-image"];
				$background = wp_get_attachment_image_src( $background, 'full', true );
				$background = $background[0];
			} else {
				$background = "";
			}

			/*====== Shadow ======*/
			if( !empty( $atts['shadow'] ) ) {
				$shadow = 'shadow-' . $atts['shadow'];
			} else {
				$shadow = "shadow-true";
			}

			/*====== HTML Output ======*/
			$output .= '<div class="banner-box ' . esc_attr( $shadow ) . '" style="background-image:url(' . esc_url( $background ) . ');">';
				$output .= '<div class="wrap">';

					if( !empty( $atts["top-title"] ) ) {
						$output .= '<div class="top-title">' . esc_attr( $atts["top-title"] ) . '</div>';
					}

					if( !empty( $atts["main-title"] ) ) {
						$output .= '<div class="main-title">' . esc_attr( $atts["main-title"] ) . '</div>';
					}

					if( !empty( $atts["text"] ) ) {
						$output .= '<div class="text">' . wpautop( $atts["text"] ) . '</div>';
					}

					if( !empty( $atts["link"] ) ) {
						if( !empty( $atts['button-style'] ) ) {
							$button_style = $atts['button-style'];
						} else {
							$button_style = "style-3";
						}

						$href = $atts["link"];
						$href = vc_build_link( $href );
						if( !empty( $href["target"] ) ) {
							$target = $href["target"];
						} else {
							$target = "_parent";
						}

						$output .= '<div class="cloux-button ' . esc_attr( $button_style ) . '">';
							$output .= '<a href="' . esc_url( $href["url"] ) . '" title="' . esc_attr( $href["title"] ) . '" target="' . esc_attr( $target ) . '"><span>' . esc_attr( $href["title"] ) . '</span></a>';
						$output .= '</div>';
					}

				$output .= '</div>';
			$output .= '</div>';
		}

		return $output;

	}

}
add_shortcode( "cloux_banner_box", "cloux_banner_box_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Banner Box', 'cloux' ),
			"base" => "cloux_banner_box",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/banner-box.svg',
			"description" => esc_html__( 'Banner box element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Top Title', 'cloux' ),
					"description" => esc_html__( 'You can enter a top title.', 'cloux' ),
					"param_name" => "top-title",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Main Title', 'cloux' ),
					"description" => esc_html__( 'You can enter a main title.', 'cloux' ),
					"param_name" => "main-title",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Text', 'cloux' ),
					"description" => esc_html__( 'You can enter a summary text.', 'cloux' ),
					"param_name" => "text",
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Link', 'cloux' ),
					"description" => esc_html__( 'You can enter a link.', 'cloux' ),
					"param_name" => "link",
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__( 'Background Image', 'cloux' ),
					"description" => esc_html__( 'You can upload a background image.', 'cloux' ),
					"param_name" => "background-image",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Button Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a button style.', 'cloux' ),
					"param_name" => "button-style",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
						esc_html__( 'Style 3', 'cloux' ) => 'style-3',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Shadow', 'cloux' ),
					"description" => esc_html__( 'You can choose status of shadow.', 'cloux' ),
					"param_name" => "shadow",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
			),
		)
	);
}



/*======
*
* Character Box
*
======*/
function cloux_character_box_output( $atts, $content = null ) {		
	$atts = shortcode_atts(
		array(
			'column' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = '';

		/*====== Column ======*/
		if( !empty( $atts['column'] ) ) {
			$column = $atts['column'];
		} else {
			$column = "column-1";
		}

		/*====== Characters ======*/
		$characters = $content;

		/*====== HTML Output ======*/
		if( !empty( $characters ) ) {
			$output .= '<div class="cloux-character-box ' . esc_attr( $column ) . '">';
				if( !empty( $characters ) ) {
					$output .= '<div class="characters">';
						$output .= do_shortcode( $content );
					$output .= '</div>';
				}
			$output .= '</div>';
		}

		return $output;

	}

}
add_shortcode( "cloux_character_box", "cloux_character_box_output" );

function cloux_character_box_item_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'name' => '',
			'image' => '',
			'content' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {
	
		$output = '';

		/*====== Content ======*/
		$atts['content'] = $content;

		/*====== HTML Output ======*/
		if( !empty( $atts["image"] ) or !empty( $atts["name"] ) or !empty( $atts["content"] ) ) {
			$output .= '<div class="item">';
				if( !empty( $atts["image"] ) ) {
					$output .= '<div class="image">';
						$image = $atts["image"];
						$image = wp_get_attachment_image_src( $image, 'cloux-character-image', true );
						$image = $image[0];
						$output .= '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $atts["name"] ) . '" />';
						$output .= '<div class="plus"></div>';

						if( !empty( $atts["name"] ) ) {
							$output .= '<div class="name-wrapper">';
								$output .= '<div class="name">' . esc_attr( $atts["name"] ) . '</div>';
							$output .= '</div>';
						}
					$output .= '</div>';
				}

				if( !empty( $atts["content"] ) ) {
					$output .= '<div class="cloux-modal">';
						$output .= '<div class="modal-color modal-color-a"></div>';
						$output .= '<div class="modal-color modal-color-b"></div>';
						$output .= '<div class="cloux-modal-content">';
							$output .= '<div class="cloux-close"></div>';
							$output .= '<div class="content-inner">';
								$output .= '<div class="scrollbar-outer">';
									if( !empty( $atts["name"] ) ) {
										$output .= '<div class="name">' . esc_attr( $atts["name"] ) . '</div>';
									}

									if( !empty( $atts["content"] ) ) {
										$output .= '<div class="content">' . $atts["content"] . '</div>';
									}
								$output .= '</div>';
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				}
			$output .= '</div>';
		}

		return $output;

	}

}
add_shortcode( "cloux_character_box_item", "cloux_character_box_item_shortcode" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Character Box', 'cloux' ),
			"base" => "cloux_character_box",
			"as_parent" => array( 'only' => 'cloux_character_box_item' ),
			"js_view" => 'VcColumnView',
			"content_element" => true,
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/character-box.svg',
			"description" => esc_html__( 'Character box element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Column', 'cloux' ),
					"description" => esc_html__( 'You can choose a column.', 'cloux' ),
					"param_name" => "column",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Column 1', 'cloux' ) => 'column-1',
						esc_html__( 'Column 2', 'cloux' ) => 'column-2',
						esc_html__( 'Column 3', 'cloux' ) => 'column-3',
						esc_html__( 'Column 4', 'cloux' ) => 'column-4',
					),
				),
			)
		)
	);
}

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Character Box Item', 'cloux' ),
			"base" => "cloux_character_box_item",
			"as_child" => array( 'only' => 'cloux_character_box' ),
			"content_element" => true,
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/character-box.svg',
			"description" => esc_html__( 'Character box item element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Character Name', 'cloux' ),
					"description" => esc_html__( 'You can enter a character name.', 'cloux' ),
					"param_name" => "name",
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__( 'Image', 'cloux' ),
					"description" => esc_html__( 'You can enter a character image.', 'cloux' ),
					"param_name" => "image",
				),
				array(
					"type" => "textarea_html",
					"heading" => esc_html__( 'Content', 'cloux' ),
					"description" => esc_html__( 'You can enter a content.', 'cloux' ),
					"param_name" => "content",
				),
			)
		)
	);
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_cloux_character_box extends WPBakeryShortCodesContainer {}
}



/*======
*
* eSport Fixture
*
======*/
function cloux_esport_fixture_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'game-ids' => '',
			'match-ids' => '',
			'exclude-matches' => '',
			'include-categories' => '',
			'exclude-categories' => '',
			'offset' => '',
			'count' => '',
			'order' => '',
			'order-type' => '',
			'pagination' => '',
			'empty-taxonomies' => '',
			'childless' => '',
			'category-list-align' => '',
			'tabs' => '',
			'all-tab' => '',
			'style' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		/*====== Main Query ======*/
		$arg = array(
			'posts_per_page' => $atts['count'],
			'offset' => $atts['offset'],
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'post_type' => 'esport-fixture',
		);

		/*====== Pagination ======*/
		if( !empty( $atts['pagination'] ) ) {
			$pagination = $atts['pagination'];
		} else {
			$pagination = "true";
		}

		if( $pagination == "true" ) {
			$paged = is_front_page() ? get_query_var( 'page', 1 ) : get_query_var( 'paged', 1 );
			if( empty( $paged ) ) { $paged = 1; }

			$extra_query = array(
				'paged' => $paged,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Order & Order By ======*/
		if( $atts["order"] == "ASC" ) {
			$order = "ASC";
		} else {
			$order = "DESC";
		}

		if( !empty( $order ) ) {
			$extra_query = array(
				'order' => $order,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		if( $atts["order-type"] == "popular-comment" ) {
			$order_by = "comment_count";
		} elseif( $atts["order-type"] == "id" ) {
			$order_by = "ID";
		} elseif( $atts["order-type"] == "popular" ) {
			$order_by = "comment_count";
		} elseif( $atts["order-type"] == "title" ) {
			$order_by = "title";
		} elseif( $atts["order-type"] == "menu_order" ) {
			$order_by = "menu_order";
		} elseif( $atts["order-type"] == "rand" ) {
			$order_by = "rand";
		} elseif( $atts["order-type"] == "none" ) {
			$order_by = "none";
		} else {
			$order_by = "date";
		}

		if( !empty( $order_by ) ) {
			$extra_query = array(
				'orderby' => $order_by,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Exclude Categories ======*/
		if( !empty( $atts['exclude-categories'] ) ) {
			$exclude_categories = $atts['exclude-categories'];
			$exclude_categories = explode( ',', $exclude_categories );
		} else {
			$exclude_categories = "";
		}

		if( !empty( $exclude_categories ) ) {
			$extra_query = array(
				'tax_query' => array(
					array(
					'taxonomy' => 'esport-fixture-category',
					'field' => 'term_id',
					'terms' => $exclude_categories,
					'operator' => 'NOT IN',
					),
				),
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Exclude Categories ======*/
		if( !empty( $atts['include-categories'] ) ) {
			$include_categories = $atts['include-categories'];
			$include_categories = explode( ',', $include_categories );
		} else {
			$include_categories = "";
		}

		if( !empty( $include_categories ) ) {
			$extra_query = array(
				'tax_query' => array(
					array(
					'taxonomy' => 'esport-fixture-category',
					'field' => 'term_id',
					'terms' => $include_categories,
					),
				),
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Exclude Matches ======*/
		if( !empty( $atts['exclude-matches'] ) ) {
			$exclude_matches = $atts['exclude-matches'];
			$exclude_matches = explode( ',', $exclude_matches );
		} else {
			$exclude_matches = "";
		}

		if( !empty( $exclude_matches ) ) {
			$extra_query = array(
				'post__not_in' => $exclude_matches,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Include Games ======*/
		if( !empty( $atts['game-ids'] ) ) {
			$include_games = $atts['game-ids'];
			$include_games = explode( ',', $include_games );
		} else {
			$include_games = "";
		}

		if( !empty( $include_games ) ) {
			$extra_query = array(
				'tax_query' => array(
					array(
					'taxonomy' => 'esport-game',
					'field' => 'term_id',
					'terms' => $include_games,
					),
				),
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Match IDs & Include Matches ======*/
		if( !empty( $atts['match-ids'] ) ) {
			$match_ids = $atts['match-ids'];
			$include_matches = explode( ',', $match_ids );
		} else {
			$include_matches = "";
		}

		if( !empty( $include_matches ) ) {
			$extra_query = array(
				'post__in' => $include_matches,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Style ======*/
		if( !empty( $atts['style'] ) ) {
			$style = $atts['style'];
		} else {
			$style = "style-1";
		}

		/*====== Empty Categories ======*/
		if( $atts['empty-taxonomies'] == 'false' ) {
			$empty_taxonomies = false;
		} else {
			$empty_taxonomies = true;
		}

		/*====== Childless ======*/
		if( $atts['childless'] == 'false' ) {
			$childless = false;
		} else {
			$childless = true;
		}

		/*====== Category List Align ======*/
		if( !empty( $atts['category-list-align'] ) ) {
			$category_list_align = $atts['category-list-align'];
		} else {
			$category_list_align = "left";
		}

		/*====== Tabs Control ======*/
		if( !empty( $atts['tabs'] ) ) {
			$tabs = $atts['tabs'];
		} else {
			$tabs = "true";
		}

		/*====== All Tab Control ======*/
		if( !empty( $atts['all-tab'] ) ) {
			$all_tab = $atts['all-tab'];
		} else {
			$all_tab = "true";
		}

		/*====== Tabs ======*/
		$terms = get_terms(
			array(
				'taxonomy' => 'esport-fixture-category',
				'exclude' => $exclude_categories,
				'include' => $include_categories,
				'hide_empty' => $empty_taxonomies,
				'childless' => $childless
			)
		);

		/*====== HTML Output ======*/
		$wp_query = new WP_Query( $arg );
		if( $wp_query->have_posts() ) {
			$output .= '<div class="esport-fixture">';
				/*====== Tabs ======*/
				if( $tabs == "true" ) {
					$output .= '<ul class="nav cloux-tabs esport-fixture-tabs cloux-first-tab ' . esc_attr( $category_list_align ) . '" role="tablist">';
						/*====== All Tab ======*/
						if( $all_tab == "true" ) {
							$output .= '<li><a data-toggle="tab" href="#esport-all-fixture" role="tab" aria-controls="esport-all-fixture">' . esc_html__( 'All', 'cloux' ) . '</a></li>';
						}

						/*====== Tabs of Terms ======*/
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
							if( !empty( $terms ) ) {
								foreach ( $terms as $term ) {
									if( !empty( $term ) ) {
										$tab_term_name = $term->name;
										$tab_term_slug = $term->slug;
										if( !empty( $tab_term_slug ) ) {
											$output .= '<li>';
												$output .= '<a data-toggle="tab" href="#esport-fixture-' . esc_attr( $tab_term_slug ) . '" aria-controls="esport-fixture-' . esc_attr( $tab_term_slug ) . '" role="tab">';
													if( !empty( $tab_term_name ) ) {
														$output .= $tab_term_name;
													}
												$output .= '</a>';
											$output .= '</li>';
										}
									}
								}
							}
						}
					$output .= '</ul>';
				}


				/*====== Content of Tabs ======*/
				$output .= '<div class="tab-content esport-players-tab-content cloux-first-tab">';
					/*====== All Tab Content ======*/
					if( $all_tab == "true" ) {
						$output .= '<div class="tab-pane fade" id="esport-all-fixture" role="tabpanel" aria-labelledby="esport-all-fixture">';
							$wp_query = new WP_Query( $arg );
							if( $wp_query->have_posts() ) {
								$output .= '<div class="esport-fixture-list-styles esport-fixture-list-style-1">';
									while ( $wp_query->have_posts() ) {
										$wp_query->the_post();
										$output .= cloux_esport_fixture_style_1( $match = get_the_ID(), $games = "true", $excerpt = "true", $date = "true", $time = "true", $score = "true", $home_team = "true", $away_team = "true" );
									}
								$output .= '</div>';
							}
							wp_reset_postdata();
						$output .= '</div>';
					}

					/*======  Terms ======*/
					if( !empty( $terms ) ) {
						foreach ( $terms as $content_term ) {
							if( !empty( $content_term ) ) {
								$content_term_name = $content_term->name;
								$content_term_slug = $content_term->slug;
								$content_term_term_id = $content_term->term_id;

								if( !empty( $content_term_slug ) ) {
									$output .= '<div class="tab-pane fade" id="esport-fixture-' . esc_attr( $content_term_slug ) . '" role="tabpanel" aria-labelledby="esport-fixture-' . esc_attr( $content_term_slug ) . '">';

										$tax_extra_query = array(
											'tax_query' => array(
												array(
													array(
														'taxonomy' => 'esport-fixture-category',
														'field' => 'slug',
														'terms' => array( $content_term_slug ),
													),
												),
											),
										);
										$args = wp_parse_args( $arg, $tax_extra_query );

										$wp_query = new WP_Query( $args );
										if( $wp_query->have_posts() ) {
											$output .= '<div class="esport-fixture-list-styles esport-fixture-list-style-1">';
												while ( $wp_query->have_posts() ) {
													$wp_query->the_post();
													$output .= cloux_esport_fixture_style_1( $match = get_the_ID(), $games = "true", $excerpt = "true", $date = "true", $time = "true", $score = "true", $home_team = "true", $away_team = "true" );
												}
											$output .= '</div>';
										}
										wp_reset_postdata();
									$output .= '</div>';
								}
							}
						}
					}
				$output .= '</div>';

				if( $pagination == "true" ) {
					$output .= cloux_element_pagination( $paged = $paged, $query = $wp_query, $style = "style-1" );
				}
			$output .= '</div>';

		}
		wp_reset_postdata();

		return $output;

	}

}
add_shortcode( "cloux_esport_fixture", "cloux_esport_fixture_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'eSport Fixture', 'cloux' ),
			"base" => "cloux_esport_fixture",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/esport-fixture.svg',
			"description" => esc_html__( 'Fixture element for eSport.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Game IDs", 'cloux' ),
					"description" => esc_html__( 'You can enter game ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "game-ids",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Match IDs", 'cloux' ),
					"description" => esc_html__( 'You can enter match ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "match-ids",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Matches', 'cloux' ),
					"description" => esc_html__( 'You can enter match ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-matches",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Categories', 'cloux' ),
					"description" => esc_html__( 'You can enter category ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-categories",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Categories', 'cloux' ),
					"description" => esc_html__( 'You can enter category ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-categories",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Offset', 'cloux' ),
					"description" => esc_html__( 'You can enter a offset number.', 'cloux' ),
					"param_name" => "offset",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Match Count', 'cloux' ),
					"description" => esc_html__( 'You can enter match count.', 'cloux' ),
					"param_name" => "count",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order', 'cloux' ),
					"description" => esc_html__( 'You can choose a order style.', 'cloux' ),
					"param_name" => "order",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'DESC', 'cloux' ) => 'DESC',
						esc_html__( 'ASC', 'cloux' ) => 'ASC',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order Type', 'cloux' ),
					"description" => esc_html__( 'You can choose a order type.', 'cloux' ),
					"param_name" => "order-type",
					"group" => esc_html__( 'General', 'cloux' ),
					"save_always" => true,
					"value" => array(
						esc_html__( 'Added Date', 'cloux' ) => 'added-date',
						esc_html__( 'Popular by Comment', 'cloux' ) => 'popular-comment',
						esc_html__( 'ID', 'cloux' ) => 'id',
						esc_html__( 'Title', 'cloux' ) => 'title',
						esc_html__( 'Menu Order', 'cloux' ) => 'menu_order',
						esc_html__( 'Random', 'cloux' ) => 'rand',
						esc_html__( 'None', 'cloux' ) => 'none',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Pagination', 'cloux' ),
					"description" => esc_html__( 'You can choose status of pagination.', 'cloux' ),
					"param_name" => "pagination",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Empty Taxonomies', 'cloux' ),
					"description" => esc_html__( 'You can choose status of empty games.', 'cloux' ),
					"param_name" => "empty-taxonomies",
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Childless', 'cloux' ),
					"description" => esc_html__( 'You can choose status of childless.', 'cloux' ),
					"param_name" => "childless",
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Category List Align', 'cloux' ),
					"description" => esc_html__( 'You can choose align of category list.', 'cloux' ),
					"param_name" => "category-list-align",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'Left', 'cloux' ) => 'left',
						esc_html__( 'Center', 'cloux' ) => 'center',
						esc_html__( 'Right', 'cloux' ) => 'right',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Tabs', 'cloux' ),
					"description" => esc_html__( 'You can choose status of tabs.', 'cloux' ),
					"param_name" => "tabs",
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'All Tab', 'cloux' ),
					"description" => esc_html__( 'You can choose status of all tab.', 'cloux' ),
					"param_name" => "all-tab",
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a style.', 'cloux' ),
					"param_name" => "style",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
					),
				),
			),
		)
	);
}



/*======
*
* eSport Players
*
======*/
function cloux_esport_players_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'player-ids' => '',
			'exclude-players' => '',
			'include-games' => '',
			'exclude-games' => '',
			'offset' => '',
			'player-count' => '',
			'order' => '',
			'order-type' => '',
			'empty-taxonomies' => '',
			'childless' => '',
			'game-list-align' => '',
			'tabs' => '',
			'all-tab' => '',
			'all-tab-link-status' => '',
			'all-tab-all-link' => '',
			'all-players-link-other' => '',
			'column' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		/*====== Main Query ======*/
		$arg = array(
			'posts_per_page' => $atts['player-count'],
			'offset' => $atts['offset'],
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'post_type' => 'esport-player',
		);

		/*====== Order & Order By ======*/
		if( $atts["order"] == "ASC" ) {
			$order = "ASC";
		} else {
			$order = "DESC";
		}

		if( !empty( $order ) ) {
			$extra_query = array(
				'order' => $order,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		if( $atts["order-type"] == "popular-comment" ) {
			$order_by = "comment_count";
		} elseif( $atts["order-type"] == "id" ) {
			$order_by = "ID";
		} elseif( $atts["order-type"] == "popular" ) {
			$order_by = "comment_count";
		} elseif( $atts["order-type"] == "title" ) {
			$order_by = "title";
		} elseif( $atts["order-type"] == "menu_order" ) {
			$order_by = "menu_order";
		} elseif( $atts["order-type"] == "rand" ) {
			$order_by = "rand";
		} elseif( $atts["order-type"] == "none" ) {
			$order_by = "none";
		} else {
			$order_by = "date";
		}

		if( !empty( $order_by ) ) {
			$extra_query = array(
				'orderby' => $order_by,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Player ID's & Include Players ======*/
		if( !empty( $atts['player-ids'] ) ) {
			$player_ids = $atts['player-ids'];
			$include_players = explode( ',', $player_ids );
		} else {
			$include_players = "";
		}

		if( !empty( $include_players ) ) {
			$extra_query = array(
				'post__in' => $include_players,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Include Games ======*/
		if( !empty( $atts['include-games'] ) ) {
			$include_games = $atts['include-games'];
			$include_games = explode( ',', $include_games );
		} else {
			$include_games = "";
		}

		/*====== Exclude Games ======*/
		if( !empty( $atts['exclude-games'] ) ) {
			$exclude_games = $atts['exclude-games'];
			$exclude_games = explode( ',', $exclude_games );
		} else {
			$exclude_games = "";
		}

		/*====== Exclude Players ======*/
		if( !empty( $atts['exclude-players'] ) ) {
			$exclude_players = $atts['exclude-players'];
			$exclude_players = explode( ',', $exclude_players );
		} else {
			$exclude_players = "";
		}

		if( !empty( $exclude_players ) ) {
			$extra_query = array(
				'post__not_in' => $exclude_players,
			);
			$arg = wp_parse_args( $arg, $extra_query );
		}

		/*====== Column ======*/
		if( !empty( $atts['column'] ) ) {
			$column = $atts['column'];
		} else {
			$column = "column-1";
		}

		/*====== Game List Align ======*/
		if( !empty( $atts['game-list-align'] ) ) {
			$game_list_align = $atts['game-list-align'];
		} else {
			$game_list_align = "left";
		}

		/*====== Tabs Control ======*/
		if( !empty( $atts['tabs'] ) ) {
			$tabs = $atts['tabs'];
		} else {
			$tabs = "true";
		}

		/*====== All Tab Control ======*/
		if( !empty( $atts['all-tab'] ) ) {
			$all_tab = $atts['all-tab'];
		} else {
			$all_tab = "true";
		}

		/*====== Empty Categories ======*/
		if( $atts['empty-taxonomies'] == 'false' ) {
			$empty_taxonomies = false;
		} else {
			$empty_taxonomies = true;
		}

		/*====== Childless ======*/
		if( $atts['childless'] == 'false' ) {
			$childless = false;
		} else {
			$childless = true;
		}

		/*====== Tabs ======*/
		$terms = get_terms(
			array(
				'taxonomy' => 'esport-game',
				'exclude' => $exclude_games,
				'include' => $include_games,
				'hide_empty' => $empty_taxonomies,
				'childless' => $childless
			)
		);


		/*====== HTML Output ======*/
		$wp_query = new WP_Query( $arg );
		if( $wp_query->have_posts() ) {
			$output .= '<div class="cloux-esport-players ' . esc_attr( $column ) . '">';
				/*====== Tabs ======*/
				if( $tabs == "true" ) {
					$output .= '<ul class="nav cloux-tabs esport-game-tabs cloux-first-tab ' . esc_attr( $game_list_align ) . '" role="tablist">';
						/*====== All Tab ======*/
						if( $all_tab == "true" ) {
							$output .= '<li><a data-toggle="tab" href="#esport-all-player" role="tab" aria-controls="esport-all-player">' . esc_html__( 'All', 'cloux' ) . '</a></li>';
						}

						/*====== Tabs of Terms ======*/
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
							if( !empty( $terms ) ) {
								foreach ( $terms as $term ) {
									if( !empty( $term ) ) {
										$tab_term_name = $term->name;
										$tab_term_slug = $term->slug;
										if( !empty( $tab_term_slug ) ) {
											$output .= '<li>';
												$output .= '<a data-toggle="tab" href="#esport-game-' . esc_attr( $tab_term_slug ) . '" aria-controls="esport-game-' . esc_attr( $tab_term_slug ) . '" role="tab">';
													if( !empty( $tab_term_name ) ) {
														$output .= $tab_term_name;
													}
												$output .= '</a>';
											$output .= '</li>';
										}
									}
								}
							}
						}
					$output .= '</ul>';
				}

				/*====== Content of Tabs ======*/
				$output .= '<div class="tab-content esport-players-tab-content cloux-first-tab">';
					/*====== All Tab Content ======*/
					if( $all_tab == "true" ) {
						$output .= '<div class="tab-pane fade" id="esport-all-player" role="tabpanel" aria-labelledby="esport-all-player">';
							$wp_query = new WP_Query( $arg );
							if( $wp_query->have_posts() ) {
								$output .= '<div class="player-list">';
									while ( $wp_query->have_posts() ) {
										$wp_query->the_post();
										$output .= '<div class="item">';
											$output .= cloux_esport_player_style_1( $player = get_the_ID() );
										$output .= '</div>';
									}
								$output .= '</div>';
							}
							wp_reset_postdata();
						$output .= '</div>';
					}

					/*====== Games of Terms ======*/
					if( !empty( $terms ) ) {
						foreach ( $terms as $content_term ) {
							if( !empty( $content_term ) ) {
								$content_term_name = $content_term->name;
								$content_term_slug = $content_term->slug;
								$content_term_term_id = $content_term->term_id;

								if( !empty( $content_term_slug ) ) {
									$output .= '<div class="tab-pane fade" id="esport-game-' . esc_attr( $content_term_slug ) . '" role="tabpanel" aria-labelledby="esport-game-' . esc_attr( $content_term_slug ) . '-tab">';

										$tax_extra_query = array(
											'tax_query' => array(
												array(
													array(
														'taxonomy' => 'esport-game',
														'field' => 'slug',
														'terms' => array( $content_term_slug ),
													),
												),
											),
										);
										$args = wp_parse_args( $arg, $tax_extra_query );

										$wp_query = new WP_Query( $args );
										if( $wp_query->have_posts() ) {
											$output .= '<div class="player-list">';
												while ( $wp_query->have_posts() ) {
													$wp_query->the_post();
													$output .= '<div class="item">';
														$output .= cloux_esport_player_style_1( $player = get_the_ID() );
													$output .= '</div>';
												}
											$output .= '</div>';
										}
										wp_reset_postdata();
									$output .= '</div>';
								}
							}
						}
					}
				$output .= '</div>';
			$output .= '</div>';

		}
		wp_reset_postdata();

		return $output;

	}

}
add_shortcode( "cloux_esport_players", "cloux_esport_players_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'eSport Players', 'cloux' ),
			"base" => "cloux_esport_players",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/esport-players.svg',
			"description" => esc_html__( 'eSport player listing element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Player IDs", 'cloux' ),
					"description" => esc_html__( 'You can enter player ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "player-ids",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Players', 'cloux' ),
					"description" => esc_html__( 'You can enter player ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-players",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Include Games', 'cloux' ),
					"description" => esc_html__( 'You can enter game ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "include-games",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Games', 'cloux' ),
					"description" => esc_html__( 'You can enter game ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-games",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Offset', 'cloux' ),
					"description" => esc_html__( 'You can enter offset number.', 'cloux' ),
					"param_name" => "offset",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Player Count', 'cloux' ),
					"description" => esc_html__( 'You can enter player count.', 'cloux' ),
					"param_name" => "player-count",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order', 'cloux' ),
					"description" => esc_html__( 'You can choose a order.', 'cloux' ),
					"param_name" => "order",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'DESC', 'cloux' ) => 'DESC',
						esc_html__( 'ASC', 'cloux' ) => 'ASC',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order Type', 'cloux' ),
					"description" => esc_html__( 'You can choose a order type.', 'cloux' ),
					"param_name" => "order-type",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'Added Date', 'cloux' ) => 'added-date',
						esc_html__( 'Popular by Comment', 'cloux' ) => 'popular-comment',
						esc_html__( 'ID', 'cloux' ) => 'id',
						esc_html__( 'Title', 'cloux' ) => 'title',
						esc_html__( 'Menu Order', 'cloux' ) => 'menu_order',
						esc_html__( 'Random', 'cloux' ) => 'rand',
						esc_html__( 'None', 'cloux' ) => 'none',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Game List Align', 'cloux' ),
					"description" => esc_html__( 'You can choose game list align status.', 'cloux' ),
					"param_name" => "game-list-align",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'Left', 'cloux' ) => 'left',
						esc_html__( 'Center', 'cloux' ) => 'center',
						esc_html__( 'Right', 'cloux' ) => 'right',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Empty Taxonomies', 'cloux' ),
					"description" => esc_html__( 'You can choose status of empty games.', 'cloux' ),
					"param_name" => "empty-taxonomies",
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Childless', 'cloux' ),
					"description" => esc_html__( 'You can choose status of childless.', 'cloux' ),
					"param_name" => "childless",
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Tabs', 'cloux' ),
					"description" => esc_html__( 'You can choose status of tabs.', 'cloux' ),
					"param_name" => "tabs",
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'All Tab', 'cloux' ),
					"description" => esc_html__( 'You can choose status of all tab.', 'cloux' ),
					"param_name" => "all-tab",
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Column', 'cloux' ),
					"description" => esc_html__( 'You can choose a column.', 'cloux' ),
					"param_name" => "column",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( '1 Column', 'cloux' ) => 'column-1',
						esc_html__( '2 Column', 'cloux' ) => 'column-2',
						esc_html__( '3 Column', 'cloux' ) => 'column-3',
						esc_html__( '4 Column', 'cloux' ) => 'column-4',
					),
				),
			),
		)
	);
}



/*======
*
* Achievement List
*
======*/
function cloux_achievement_list_output( $atts, $content = null ) {		
	$atts = shortcode_atts(
		array(
			'style' => '',
			'column' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = '';

		/*====== Style ======*/
		if( !empty( $atts["style"] ) ) {
			$style = $atts["style"];
		} else {
			$style = "style-1";
		}

		/*====== Column ======*/
		if( !empty( $atts["column"] ) ) {
			$column = $atts["column"];
		} else {
			$column = "column-1";
		}

		/*====== HTML Output ======*/
		$output .= '<div class="cloux-achievement-list ' . esc_attr( $style ) . ' ' . esc_attr( $column ) . '">';
			$output .= '<ul>';
				$output .= do_shortcode( $content );
			$output .= '</ul>';
		$output .= '</div>';

		return $output;

	}

}
add_shortcode( "cloux_achievement_list", "cloux_achievement_list_output" );

function cloux_achievement_list_item_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'title' => '',
			'text' => '',
			'number' => '',
			'link' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {
		
		$output = '';

		if( !empty( $atts["title"] ) or !empty( $atts["text"] ) or !empty( $atts["number"] ) or !empty( $atts["link"] ) ) {
			$output .= '<li>';
				if( !empty( $atts["link"] ) ) {
					$link = $atts["link"];
					$link = vc_build_link( $link );
					if( !empty( $link["target"] ) ) {
						$link_target = $link["target"];
					} else {
						$link_target = "_parent";
					}

					if( !empty( $link["url"] ) ) {
						$output .= '<a href="' . esc_url( $link["url"] ) . '" title="' . esc_attr( $link["title"] ) . '" target="' . esc_attr( $link_target ) . '">';
					}
				}

				if( !empty( $atts["number"] ) ) {
					$output .= '<div class="number">';
						$output .= esc_attr( $atts["number"] );
					$output .= '</div>';
				}

				if( !empty( $atts["title"] ) or !empty( $atts["text"] ) ) {
					$output .= '<div class="content">';
						if( !empty( $atts["text"] ) ) {
							$output .= '<p>' . esc_attr( $atts["text"] ) . '</p>';
						}
						if( !empty( $atts["title"] ) ) {
							$output .= '<div class="title">' . esc_attr( $atts["title"] ) . '</div>';
						}
					$output .= '</div>';
				}

				if( !empty( $atts["link"] ) ) {
					if( !empty( $link["url"] ) ) {
						$output .= '</a>';
					}
				}
			$output .= '</li>';
		}

		return $output;

	}

}
add_shortcode( "cloux_achievement_list_item", "cloux_achievement_list_item_shortcode" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Achievement List', 'cloux' ),
			"base" => "cloux_achievement_list",
			"as_parent" => array( 'only' => 'cloux_achievement_list_item' ),
			"js_view" => 'VcColumnView',
			"content_element" => true,
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/achievement-list.svg',
			"description" => esc_html__( 'Achievement listing element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'cloux' ),
					"description" => esc_html__( 'You can select a style.', 'cloux' ),
					"param_name" => "style",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
						esc_html__( 'Style 3', 'cloux' ) => 'style-4',
						esc_html__( 'Style 4', 'cloux' ) => 'style-4',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Column', 'cloux' ),
					"description" => esc_html__( 'You can select a column.', 'cloux' ),
					"param_name" => "column",
					"save_always" => true,
					"value" => array(
						esc_html__( '1 Column', 'cloux' ) => 'column-1',
						esc_html__( '2 Column', 'cloux' ) => 'column-2',
						esc_html__( '3 Column', 'cloux' ) => 'column-3',
						esc_html__( '4 Column', 'cloux' ) => 'column-4',
						esc_html__( '5 Column', 'cloux' ) => 'column-5',
					),
				),
			)
		)
	);
}

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Achievement List Item', 'cloux' ),
			"base" => "cloux_achievement_list_item",
			"as_child" => array( 'only' => 'cloux_achievement_list' ),
			"content_element" => true,
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/achievement-list.svg',
			"description" => esc_html__( 'Achievement listing item element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Title', 'cloux' ),
					"description" => esc_html__( 'You can enter a title.', 'cloux' ),
					"param_name" => "title",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Text', 'cloux' ),
					"description" => esc_html__( 'You can enter a text.', 'cloux' ),
					"param_name" => "text",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Number', 'cloux' ),
					"description" => esc_html__( 'You can enter a number.', 'cloux' ),
					"param_name" => "number",
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Link', 'cloux' ),
					"description" => esc_html__( 'You can enter a link.', 'cloux' ),
					"param_name" => "link",
				),
			)
		)
	);
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_cloux_achievement_list extends WPBakeryShortCodesContainer {}
}



/*======
*
* Title
*
======*/
function cloux_title_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'title' => '',
			'colored-title' => '',
			'style' => '',
			'color-style' => '',
			'align' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		/*====== Title ======*/
		if( !empty( $atts["title"] ) ) {
			$title = $atts["title"];
		} else {
			$title = "";
		}

		/*====== Colored Title ======*/
		if( !empty( $atts["colored-title"] ) ) {
			$colored_title = $atts["colored-title"];
		} else {
			$colored_title = "";
		}

		/*====== Style ======*/
		if( !empty( $atts["style"] ) ) {
			$style = $atts["style"];
		} else {
			$style = "style-1";
		}

		/*====== Color Style ======*/
		if( !empty( $atts["color-style"] ) ) {
			$color_style = $atts["color-style"];
		} else {
			$color_style = "color-style-1";
		}

		/*====== Align ======*/
		if( !empty( $atts["align"] ) ) {
			$align = $atts["align"];
		} else {
			$align = "left";
		}

		/*====== HTML Output ======*/
		if( !empty( $atts["title"] ) or !empty( $atts["colored-title"] ) ) {
			$output .= '<div class="cloux-title-wrapper ' . esc_attr( $color_style ) . '">';
				$output .= cloux_title( $title = $title, $style = $style, $align = $align, $colored_title = $colored_title );
			$output .= '</div>';
		}

		return $output;

	}

}
add_shortcode( "cloux_title", "cloux_title_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Title', 'cloux' ),
			"base" => "cloux_title",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/title.svg',
			"description" => esc_html__( 'Title element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Title', 'cloux' ),
					"description" => esc_html__( 'You can enter a title.', 'cloux' ),
					"param_name" => "title",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Colored Title', 'cloux' ),
					"description" => esc_html__( 'You can enter a colored title.', 'cloux' ),
					"param_name" => "colored-title",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a style.', 'cloux' ),
					"param_name" => "style",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
						esc_html__( 'Style 3', 'cloux' ) => 'style-3',
						esc_html__( 'Style 4', 'cloux' ) => 'style-4',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Color', 'cloux' ),
					"description" => esc_html__( 'You can choose a color.', 'cloux' ),
					"param_name" => "color-style",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Color Style 1', 'cloux' ) => 'color-style-1',
						esc_html__( 'Color Style 2', 'cloux' ) => 'color-style-2',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Align', 'cloux' ),
					"description" => esc_html__( 'You can choose a align.', 'cloux' ),
					"param_name" => "align",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Left', 'cloux' ) => 'left',
						esc_html__( 'Right', 'cloux' ) => 'right',
						esc_html__( 'Center', 'cloux' ) => 'center',
					),
				),
			),
		)
	);
}



/*======
*
* Video Carousel
*
======*/
function cloux_video_carousel_output( $atts, $content = null ) {		
	$atts = shortcode_atts(
		array(
			'arrows' => '',
			'autoplay-speed' => '',
			'autoplay' => '',
			'dots' => '',
			'column' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = '';

		/*====== Column ======*/
		if( !empty( $atts['column'] ) ) {
			$column = $atts['column'];
		} else {
			$column = "1";
		}

		/*====== Autoplay ======*/
		if( !empty( $atts['autoplay'] ) ) {
			$autoplay = $atts['autoplay'];
		} else {
			$autoplay = "true";
		}

		/*====== Autoplay Speed ======*/
		if( !empty( $atts['autoplay-speed'] ) ) {
			$autoplay_speed = $atts['autoplay-speed'];
		} else {
			$autoplay_speed = "7000";
		}

		/*====== Arrows ======*/
		if( !empty( $atts['arrows'] ) ) {
			$arrows = $atts['arrows'];
		} else {
			$arrows = "true";
		}

		/*====== Dots ======*/
		if( !empty( $atts['dots'] ) ) {
			$dots = $atts['dots'];
		} else {
			$dots = "true";
		}

		/*====== HTML of Arrows ======*/
		$prev_button = '<div class="prev arrow"></div>';
		$next_button = '<div class="next arrow"></div>';

		/*====== Characters ======*/
		$videos = $content;

		/*====== HTML Output ======*/
		$output .= '<div class="cloux-video-carousel-element">';
			if( !empty( $videos ) ) {
				$output .= '<div class="cloux-slider cloux-video-carousel" data-centermode="true" data-variablewidth="true" data-autoplay="' . esc_attr( $autoplay ) . '" data-autospeed="' . esc_attr( $autoplay_speed ) . '" data-item="'. esc_attr( $column ) . '" data-slidetoitem="1" data-dots="'. esc_attr( $dots ) . '" data-arrows="'. esc_attr( $arrows ) . '" data-prevarrow="' . esc_attr( $prev_button ) . '" data-nextarrow="' . esc_attr( $next_button ) . '">';
						$output .= do_shortcode( $content );
				$output .= '</div>';
			}
		$output .= '</div>';

		return $output;

	}
}
add_shortcode( "cloux_video_carousel", "cloux_video_carousel_output" );

function cloux_video_carousel_item_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'title' => '',
			'video-url' => '',
			'content' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {
	
		$output = '';

		/*====== Content ======*/
		$atts['content'] = $content;

		/*====== HTML Output ======*/
		if( !empty( $atts["video-url"] ) ) {
			$output .= '<div class="item">';
				if( !empty( $atts["video-url"] ) ) {
					$output .= '<div class="video">';
						global $wp_embed;
						$embed_shortcode = '[embed width="1080" height="660"]' . esc_url( $atts["video-url"] ) . '[/embed]';
						$output .= $wp_embed->run_shortcode( $embed_shortcode );
					$output .= '</div>';
				}
				if( !empty( $atts["content"] ) ) {
					$output .= '<div class="text">';
						$output .= $atts["content"];
					$output .= '</div>';
				}
			$output .= '</div>';
		}

		return $output;

	}

}
add_shortcode( "cloux_video_carousel_item", "cloux_video_carousel_item_shortcode" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Video Carousel', 'cloux' ),
			"base" => "cloux_video_carousel",
			"as_parent" => array( 'only' => 'cloux_video_carousel_item' ),
			"js_view" => 'VcColumnView',
			"content_element" => true,
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/video-carousel.svg',
			"description" => esc_html__( 'Video carousel element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Autoplay', 'cloux' ),
					"description" => esc_html__( 'You can choose status of autoplay.', 'cloux' ),
					"param_name" => "autoplay",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Autoplay Speed', 'cloux' ),
					"description" => esc_html__( 'You can enter a autoplay speed. Example: 7000.', 'cloux' ),
					"param_name" => "autoplay-speed",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Arrows', 'cloux' ),
					"description" => esc_html__( 'You can choose status of arrows.', 'cloux' ),
					"param_name" => "arrows",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Dots', 'cloux' ),
					"description" => esc_html__( 'You can choose status of dots.', 'cloux' ),
					"param_name" => "dots",
					"save_always" => true,
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Column', 'cloux' ),
					"description" => esc_html__( 'You can choose a column.', 'cloux' ),
					"param_name" => "column",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Column 1', 'cloux' ) => '1',
						esc_html__( 'Column 2', 'cloux' ) => '2',
						esc_html__( 'Column 3', 'cloux' ) => '3',
						esc_html__( 'Column 4', 'cloux' ) => '4',
					),
				),
			)
		)
	);
}

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Video Carousel Item', 'cloux' ),
			"base" => "cloux_video_carousel_item",
			"as_child" => array( 'only' => 'cloux_video_carousel' ),
			"content_element" => true,
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/video-carousel.svg',
			"description" => esc_html__( 'Video carousel item element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Video URL', 'cloux' ),
					"description" => esc_html__( 'You can enter a video URL. Details: https://codex.wordpress.org/Embeds.', 'cloux' ),
					"param_name" => "video-url",
				),
				array(
					"type" => "textarea_html",
					"heading" => esc_html__( 'Text', 'cloux' ),
					"description" => esc_html__( 'You can enter a text.', 'cloux' ),
					"param_name" => "content",
				),
			)
		)
	);
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_cloux_video_carousel extends WPBakeryShortCodesContainer {}
}



/*======
*
* MailChimp Newsletter
*
======*/
function cloux_mailchimp_newsletter_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'form-id' => '',
			'style' => '',
			'title' => '',
			'background-image' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		/*====== Style ======*/
		if( !empty( $atts["style"] ) ) {
			$style = $atts["style"];
		} else {
			$style = "style-1";
		}

		/*====== Shortcode ======*/
		if( !empty( $atts["form-id"] ) ) {
			$shortcode = '[mc4wp_form id="' . esc_attr( $atts["form-id"] ) . '"]';
		}

		/*====== Background Image ======*/
		if( $atts["style"] == "style-1" or $atts["style"] == "style-2" ) {
			if( !empty( $atts["background-image"] ) ) {
				$background = $atts["background-image"];
				$background = wp_get_attachment_image_src( $background, 'cloux-page-banner', true );
				$background = $background[0];
			} else {
				$background = "";
			}
		} else {
			$background = "";
		}

		/*====== HTML Output ======*/
		if( !empty( $atts["form-id"] ) ) {
			$output .= '<div class="cloux-mailchimp ' . esc_attr( $style ) . '" style="background-image:url(' . esc_url( $background ) . ');">';
				$output .= '<div class="cloux-element-wrapper">';
					$output .= '<div class="inner">';
						if( !empty( $atts["title"] ) ) {
							$output .= '<div class="title">';
								$output .= esc_attr( $atts["title"] );
							$output .= '</div>';
						}
						$output .= '<div class="content">';
							$output .= do_shortcode( $shortcode );
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';
		}

		return $output;

	}

}
add_shortcode( "cloux_mailchimp_newsletter", "cloux_mailchimp_newsletter_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'MailChimp Newsletter', 'cloux' ),
			"base" => "cloux_mailchimp_newsletter",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/mailchimp-newsletter.svg',
			"description" => esc_html__( 'MailChimp newsletter element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Form ID', 'cloux' ),
					"description" => esc_html__( 'You can enter a form ID.', 'cloux' ),
					"param_name" => "form-id",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a style.', 'cloux' ),
					"param_name" => "style",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
						esc_html__( 'Style 3', 'cloux' ) => 'style-3',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Title', 'cloux' ),
					"description" => esc_html__( 'You can enter a title.', 'cloux' ),
					"param_name" => "title",
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__( 'Background Image', 'cloux' ),
					"description" => esc_html__( 'You can upload a background image.', 'cloux' ),
					"param_name" => "background-image",
				),
			),
		)
	);
}



/*======
*
* Social Links
*
======*/
function cloux_social_links_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'style' => '',
			'column' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		/*====== Style ======*/
		if( !empty( $atts["style"] ) ) {
			$style = $atts["style"];
		} else {
			$style = "style-1";
		}

		/*====== Column ======*/
		if( !empty( $atts["column"] ) ) {
			$column = $atts["column"];
		} else {
			$column = "column-1";
		}


		/*====== HTML Output ======*/
		$social_sites = cloux_social_media_array_filter();

		foreach ( $social_sites as $social_site => $profile ) {
			if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
				$active_social_sites[ $social_site ] = $social_site;
			}
		}

		if ( ! empty( $active_social_sites ) ) {
			$output .= '<div class="cloux-social-links ' . esc_attr( $style ) . ' ' . esc_attr( $column ) . '">';
				if( $atts["style"] == "style-1" or $atts["style"] == "style-2" ) {
					$output .= '<div class="cloux-element-wrapper">';
				}
					$output .= '<ul>';
						foreach ( $active_social_sites as $key => $active_site ) {
							$icon_class = 'fa-' . esc_attr( $active_site );
							$link_name = $active_site;
							$label = ucfirst( $active_site );

							if ( $active_site == 'twitter' ) {
								$label = esc_html__( 'Twitter', 'cloux' );
							} elseif ( $active_site == 'facebook' ) {
								$label = esc_html__( 'Facebook', 'cloux' );
								$icon_class = 'fa-facebook-f';
							} elseif ( $active_site == 'google-plus' ) {
								$label = esc_html__( 'Google Plus', 'cloux' );
								$icon_class = 'fa-google-plus-g';
							} elseif ( $active_site == 'pinterest' ) {
								$label = esc_html__( 'Pinterest', 'cloux' );
								$icon_class = 'fa-pinterest-p';
							} elseif ( $active_site == 'youtube' ) {
								$label = esc_html__( 'YouTube', 'cloux' );
							} elseif ( $active_site == 'vimeo' ) {
								$label = esc_html__( 'Vimeo', 'cloux' );
								$icon_class = 'fa-vimeo-v';
							} elseif ( $active_site == 'tumblr' ) {
								$label = esc_html__( 'Tumblr', 'cloux' );
							} elseif ( $active_site == 'instagram' ) {
								$label = esc_html__( 'Instagram', 'cloux' );
							} elseif ( $active_site == 'flickr' ) {
								$label = esc_html__( 'Flickr', 'cloux' );
							} elseif ( $active_site == 'dribbble' ) {
								$label = esc_html__( 'Dribbble', 'cloux' );
							} elseif ( $active_site == 'reddit' ) {
								$label = esc_html__( 'Reddit', 'cloux' );
								$icon_class = 'fa-reddit-alien';
							} elseif ( $active_site == 'soundcloud' ) {
								$label = esc_html__( 'SoundCloud', 'cloux' );
							} elseif ( $active_site == 'spotify' ) {
								$label = esc_html__( 'Spotify', 'cloux' );
							} elseif ( $active_site == 'yahoo' ) {
								$label = esc_html__( 'Yahoo', 'cloux' );
							} elseif ( $active_site == 'behance' ) {
								$label = esc_html__( 'Behance', 'cloux' );
							} elseif ( $active_site == 'delicious' ) {
								$label = esc_html__( 'Delicious', 'cloux' );
							} elseif ( $active_site == 'stumbleupon' ) {
								$label = esc_html__( 'Stumbleupon', 'cloux' );
							} elseif ( $active_site == 'deviantart' ) {
								$label = esc_html__( 'DeviantArt', 'cloux' );
							} elseif ( $active_site == 'digg' ) {
								$label = esc_html__( 'Digg', 'cloux' );
							} elseif ( $active_site == 'github' ) {
								$label = esc_html__( 'GitHub', 'cloux' );
							} elseif ( $active_site == 'medium' ) {
								$label = esc_html__( 'Medium', 'cloux' );
								$icon_class = 'fa-medium-m';
							} elseif ( $active_site == 'steam' ) {
								$label = esc_html__( 'Steam', 'cloux' );
								$icon_class = 'fa-steam-symbol';
							} elseif ( $active_site == 'vk' ) {
								$label = esc_html__( 'VK', 'cloux' );
							} elseif ( $active_site == '500px' ) {
								$label = esc_html__( '500px', 'cloux' );
							} elseif ( $active_site == 'foursquare' ) {
								$label = esc_html__( 'Foursquare', 'cloux' );
							} elseif ( $active_site == 'slack' ) {
								$label = esc_html__( 'Slack', 'cloux' );
								$icon_class = 'fa-slack-hash';
							} elseif ( $active_site == 'whatsapp' ) {
								$label = esc_html__( 'WhatsApp', 'cloux' );
							} elseif ( $active_site == 'twitch' ) {
								$label = esc_html__( 'Twitch', 'cloux' );
							} elseif ( $active_site == 'paypal' ) {
								$label = esc_html__( 'PayPal', 'cloux' );
							} elseif ( $active_site == 'rss' ) {
								$label = esc_html__( 'RSS', 'cloux' );
								$icon_class = 'fas fa-rss';
							} elseif ( $active_site == 'codepen' ) {
								$label = esc_html__( 'CodePen', 'cloux' );
							} elseif ( $active_site == 'linkedin' ) {
								$label = esc_html__( 'LinkedIn', 'cloux' );
								$icon_class = 'fa-linkedin-in';
							} elseif ( $active_site == 'custom-url' ) {
								$label = '';
								$icon_class = 'fas fa-external-link-alt';
							}

							$output .='<li>';
								$target_name = $link_name . '-target';
								if( !empty( $target_name ) ) {
									if( !empty( get_theme_mod( $target_name ) ) or get_theme_mod( $target_name ) == "1" ) {
										$target = '_blank';
									} else {
										$target = '_self';
									}
								}
								$output .= '<a href="' . esc_url( get_theme_mod( $key ) ) . '" class="' . esc_attr( $link_name ) . '" title="' . esc_attr( $label ) . '" target="' . esc_attr( $target ) . '">';
									$output .= '<i class="fab ' . esc_attr( $icon_class ) . '"></i>';
									$output .= '<span>' . esc_attr( $label ) . '</span>';
								$output .= '</a>';
							$output .= '</li>';
						}
					$output .= '</ul>';
				if( $atts["style"] == "style-1" or $atts["style"] == "style-2" ) {
					$output .= '</div>';
				}
			$output .= '</div>';
		}

		return $output;

	}

}
add_shortcode( "cloux_social_links", "cloux_social_links_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Social Links', 'cloux' ),
			"base" => "cloux_social_links",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/social-links.svg',
			"description" => esc_html__( 'Social links element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a style.', 'cloux' ),
					"param_name" => "style",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
						esc_html__( 'Style 3', 'cloux' ) => 'style-3',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Column for Style 1', 'cloux' ),
					"description" => esc_html__( 'You can choose a column.', 'cloux' ),
					"param_name" => "column",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Column 1', 'cloux' ) => 'column-1',
						esc_html__( 'Column 2', 'cloux' ) => 'column-2',
						esc_html__( 'Column 3', 'cloux' ) => 'column-3',
						esc_html__( 'Column 4', 'cloux' ) => 'column-4',
						esc_html__( 'Column 5', 'cloux' ) => 'column-5',
						esc_html__( 'Column 6', 'cloux' ) => 'column-6',
						esc_html__( 'Column 7', 'cloux' ) => 'column-7',
					),
				),
			),
		)
	);
}



/*======
*
* Icon List
*
======*/
function cloux_icon_list_output( $atts, $content = null ) {		
	$atts = shortcode_atts(
		array(
			'style' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = '';

		/*====== Style ======*/
		if( !empty( $atts['style'] ) ) {
			$style = $atts['style'];
		} else {
			$style = "style-1";
		}

		/*====== HTML Output ======*/
		$output .= '<div class="cloux-icon-list ' . esc_attr( $style ) . '">';
			$output .= '<ul>';
				$output .= do_shortcode( $content );
			$output .= '</ul>';
		$output .= '</div>';

		return $output;

	}

}
add_shortcode( "cloux_icon_list", "cloux_icon_list_output" );

function cloux_icon_list_item_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'text' => '',
			'icon' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {
		
		$output = '';

		/*====== HTML Output ======*/
		if( !empty( $atts["text"] ) ) {
			$output .= '<li>';
				if( !empty( $atts["icon"] ) ) {
					$output .= '<i class="' . esc_attr( $atts["icon"] ) . '" aria-hidden="true"></i>';
				}
				if( !empty( $atts["text"] ) ) {
					$output .= '<span class="text">' . esc_attr( $atts["text"] ) . '</span>';
				}
			$output .= '</li>';
		}

		return $output;

	}

}
add_shortcode("cloux_icon_list_item", "cloux_icon_list_item_shortcode");

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Icon List', 'cloux' ),
			"base" => "cloux_icon_list",
			"as_parent" => array('only' => 'cloux_icon_list_item'),
			"js_view" => 'VcColumnView',
			"content_element" => true,
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/icon-list.svg',
			"description" =>esc_html__( 'Icon list element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a style.', 'cloux' ),
					"param_name" => "style",
					'save_always' => true,
					'value' => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style1',
						esc_html__( 'Style 2', 'cloux' ) => 'style2',
					),
				),
			)
		)
	);
}

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Icon List Item', 'cloux' ),
			"base" => "cloux_icon_list_item",
			"as_child" => array( 'only' => 'cloux_icon_list' ),
			"content_element" => true,
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/icon-list.svg',
			"description" =>esc_html__( 'Icon list item element.','cloux'),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Text', 'cloux' ),
					"description" => esc_html__( 'You can enter text.', 'cloux' ),
					"param_name" => "text",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Icon', 'cloux' ),
					"description" => esc_html__( 'You can enter a icon. Example: fab fa-wordpress-simple, fas fa-map-marker-alt. Icon list: https://goo.gl/vdPEsc', 'cloux' ),
					"param_name" => "icon",
				),
			)
		)
	);
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_cloux_icon_list extends WPBakeryShortCodesContainer {}
}



/*======
*
* WooCommerce Products
*
======*/
function cloux_woo_products_output( $atts, $content = null ) {

	if ( function_exists( 'rwmb_meta' ) ) {
	
		$output = "";

		if ( function_exists( 'is_woocommerce' ) ) {
			$atts = shortcode_atts(
				array(
					'category' => '',
					'product-ids' => '',
					'exclude-products' => '',
					'offset' => '',
					'product-count' => '',
					'order' => '',
					'order-type' => '',
					'pagination' => '',
					'style' => '',
					'column' => '',
					'image' => '',
					'price' => '',
					'excerpt' => '',
				), $atts
			);

			/*====== Main Query ======*/
			$arg = array(
				'posts_per_page' => $atts['product-count'],
				'offset' => $atts['offset'],
				'post_status' => 'publish',
				'ignore_sticky_posts' => true,
				'post_type' => 'product',
			);

			/*====== Pagination ======*/
			if( !empty( $atts['pagination'] ) ) {
				$pagination = $atts['pagination'];
			} else {
				$pagination = "true";
			}

			if( $pagination == "true" ) {
				$paged = is_front_page() ? get_query_var( 'page', 1 ) : get_query_var( 'paged', 1 );
				if( empty( $paged ) ) { $paged = 1; }

				$extra_query = array(
					'paged' => $paged,
				);
				$arg = wp_parse_args( $arg, $extra_query );
			}

			/*====== Order & Order By ======*/
			if( $atts["order"] == "ASC" ) {
				$order = "ASC";
			} else {
				$order = "DESC";
			}

			if( !empty( $order ) ) {
				$extra_query = array(
					'order' => $order,
				);
				$arg = wp_parse_args( $arg, $extra_query );
			}

			if( $atts["order-type"] == "popular-comment" ) {
				$order_by = "comment_count";
			} elseif( $atts["order-type"] == "id" ) {
				$order_by = "ID";
			} elseif( $atts["order-type"] == "popular" ) {
				$order_by = "comment_count";
			} elseif( $atts["order-type"] == "title" ) {
				$order_by = "title";
			} elseif( $atts["order-type"] == "menu_order" ) {
				$order_by = "menu_order";
			} elseif( $atts["order-type"] == "rand" ) {
				$order_by = "rand";
			} elseif( $atts["order-type"] == "none" ) {
				$order_by = "none";
			} else {
				$order_by = "date";
			}

			if( !empty( $order_by ) ) {
				$extra_query = array(
					'orderby' => $order_by,
				);
				$arg = wp_parse_args( $arg, $extra_query );
			}

			/*====== Post IDs & Include Products ======*/
			if( !empty( $atts['product-ids'] ) ) {
				$product_ids = $atts['product-ids'];
				$include_products = explode( ',', $product_ids );
			} else {
				$include_products = "";
			}

			if( !empty( $include_products ) ) {
				$extra_query = array(
					'post__in' => $include_products,
				);
				$arg = wp_parse_args( $arg, $extra_query );
			}

			/*====== Exclude Products ======*/
			if( !empty( $atts['exclude-products'] ) ) {
				$exclude_products = $atts['exclude-products'];
				$exclude_products = explode( ',', $exclude_products );
			} else {
				$exclude_products = "";
			}

			if( !empty( $exclude_products ) ) {
				$extra_query = array(
					'post__not_in' => $exclude_products,
				);
				$arg = wp_parse_args( $arg, $extra_query );
			}

			/*====== Product Categories ======*/
			if( !empty( $atts['category'] ) ) {
				$product_categories = $atts['category'];
				$product_categories = explode( ',', $product_categories );
			} else {
				$product_categories = "";
			}

			if( !empty( $product_categories ) ) {
				$extra_query = array(
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'terms' => $product_categories,
						),
					),
				);
				$arg = wp_parse_args( $arg, $extra_query );
			}

			/*====== Column ======*/
			if( !empty( $atts['column'] ) ) {
				$column = $atts['column'];
			} else {
				$column = "column-1";
			}

			/*====== Style ======*/
			if( !empty( $atts['style'] ) ) {
				$style = $atts['style'];
			} else {
				$style = "style-1";
			}

			/*====== Column ======*/
			if( !empty( $atts['column'] ) ) {
				$column = $atts['column'];
			} else {
				$column = "column-1";
			}

			/*====== Image ======*/
			if( !empty( $atts['image'] ) ) {
				$image = $atts['image'];
			} else {
				$image = "true";
			}

			/*====== Excerpt ======*/
			if( !empty( $atts['excerpt'] ) ) {
				$excerpt = $atts['excerpt'];
			} else {
				$excerpt = "true";
			}

			/*====== Price ======*/
			if( !empty( $atts['price'] ) ) {
				$price = $atts['price'];
			} else {
				$price = "true";
			}

			/*====== HTML Output ======*/
			$wp_query = new WP_Query( $arg );
			if( $wp_query->have_posts() ) {
				$output .= '<div class="cloux-woo-product ' . esc_attr( $style ) . '">';
					$output .= '<div class="product-list ' . esc_attr( $column ) . '">';
						while ( $wp_query->have_posts() ) {
							$wp_query->the_post();
							if( $atts['style'] == "style-2" ) {
								$output .= '<div class="item">';
									$output .= cloux_woo_product_style_2( $product = get_the_ID(), $image = $image, $price = $price, $excerpt = $excerpt );
								$output .= '</div>';
							} else {
								$output .= '<div class="item">';
									$output .= cloux_woo_product_style_1( $product = get_the_ID(), $image = $image, $price = $price, $excerpt = $excerpt );
								$output .= '</div>';
							}
						}
					$output .= '</div>';

					if( $pagination == "true" ) {
						$output .= cloux_element_pagination( $paged = $paged, $query = $wp_query, $style = "style-1" );
					}
				$output .= '</div>';

			}
			wp_reset_postdata();
		}

		return $output;

	}

}
add_shortcode( "cloux_woo_products", "cloux_woo_products_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'WooCommerce Products', 'cloux' ),
			"base" => "cloux_woo_products",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/woo-product.svg',
			"description" => esc_html__( 'WooCommerce products element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Category', 'cloux' ),
					"description" => esc_html__( 'You can enter category ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "category",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Product IDs", 'cloux' ),
					"description" => esc_html__( 'You can enter product ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "product-ids",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Products', 'cloux' ),
					"description" => esc_html__( 'You can enter product ids. Separate with commas 1,2,3 etc.', 'cloux' ),
					"param_name" => "exclude-products",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Offset', 'cloux' ),
					"description" => esc_html__( 'You can enter a offset number.', 'cloux' ),
					"param_name" => "offset",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Product Count', 'cloux' ),
					"description" => esc_html__( 'You can enter product count.', 'cloux' ),
					"param_name" => "product-count",
					"group" => esc_html__( 'General', 'cloux' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order', 'cloux' ),
					"description" => esc_html__( 'You can choose a order.', 'cloux' ),
					"param_name" => "order",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'DESC', 'cloux' ) => 'DESC',
						esc_html__( 'ASC', 'cloux' ) => 'ASC',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Order Type', 'cloux' ),
					"description" => esc_html__( 'You can choose a order type.', 'cloux' ),
					"param_name" => "order-type",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'Added Date', 'cloux' ) => 'added-date',
						esc_html__( 'Popular by Comment', 'cloux' ) => 'popular-comment',
						esc_html__( 'ID', 'cloux' ) => 'id',
						esc_html__( 'Title', 'cloux' ) => 'title',
						esc_html__( 'Menu Order', 'cloux' ) => 'menu_order',
						esc_html__( 'Random', 'cloux' ) => 'rand',
						esc_html__( 'None', 'cloux' ) => 'none',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Pagination', 'cloux' ),
					"description" => esc_html__( 'You can choose status of pagination.', 'cloux' ),
					"param_name" => "pagination",
					"save_always" => true,
					"group" => esc_html__( 'General', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a list style.', 'cloux' ),
					"param_name" => "style",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Column', 'cloux' ),
					"description" => esc_html__( 'You can choose a column.', 'cloux' ),
					"param_name" => "column",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( '1 Column', 'cloux' ) => 'column-1',
						esc_html__( '2 Column', 'cloux' ) => 'column-2',
						esc_html__( '3 Column', 'cloux' ) => 'column-3',
						esc_html__( '4 Column', 'cloux' ) => 'column-4',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Image', 'cloux' ),
					"description" => esc_html__( 'You can choose status of image.', 'cloux' ),
					"param_name" => "image",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Price', 'cloux' ),
					"description" => esc_html__( 'You can choose status of price.', 'cloux' ),
					"param_name" => "price",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Excerpt', 'cloux' ),
					"description" => esc_html__( 'You can choose status of excerpt.', 'cloux' ),
					"param_name" => "excerpt",
					"save_always" => true,
					"group" => esc_html__( 'Design', 'cloux' ),
					"value" => array(
						esc_html__( 'True', 'cloux' ) => 'true',
						esc_html__( 'False', 'cloux' ) => 'false',
					),
				),
			),
		)
	);
}



/*======
*
* Sponsors
*
======*/
function cloux_sponsors_output( $atts, $content = null ) {		
	$atts = shortcode_atts(
		array(
			'style' => '',
			'column' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = '';

		/*====== Style ======*/
		if( !empty( $atts["style"] ) ) {
			$style = $atts["style"];
		} else {
			$style = "style-1";
		}

		/*====== Style ======*/
		if( !empty( $atts["column"] ) ) {
			$column = $atts["column"];
		} else {
			$column = "column-1";
		}

		/*====== HTML Output ======*/
		$output .= '<div class="cloux-sponsors ' . esc_attr( $style ) . ' ' . esc_attr( $column ) . '">';
			$output .= '<ul>';
				$output .= do_shortcode( $content );
			$output .= '</ul>';
		$output .= '</div>';

		return $output;

	}

}
add_shortcode( "cloux_sponsors", "cloux_sponsors_output" );

function cloux_sponsors_item_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'logo' => '',
			'link' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {
		
		$output = '';

		if( !empty( $atts["thin-text"] ) or !empty( $atts["bold-text"] ) or !empty( $atts["icon"] ) or !empty( $atts["link"] ) ) {
			$output .= '<li>';
				$output .= '<div class="wrap">';
					if( !empty( $atts["link"] ) ) {
						$link = $atts["link"];
						$link = vc_build_link( $link );

						if( !empty( $link["target"] ) ) {
							$link_target = $link["target"];
						} else {
							$link_target = "_parent";
						}

						if( !empty( $link ) ) {
							$output .= '<a href="' . esc_url( $link["url"] ) . '" title="' . esc_attr( $link["title"] ) . '" target="' . esc_attr( $link_target ) . '">';
						}
					}

						if( !empty( $atts["logo"] ) ) {
							$logo = $atts["logo"];
							$logo = wp_get_attachment_image_src( $logo, 'cloux-sponsor', true );
							$logo = $logo[0];

							if( !empty( $logo ) ) {
								if( !empty( $link["title"] ) ) {
									$logo_title = esc_attr( $link["title"] );
								} else {
									$logo_title = "";
								}

								$output .= '<img src="' . esc_url( $logo ) . '" alt="' . esc_attr( $logo_title ) . '" />';
							}
						}

					if( !empty( $atts["link"] ) ) {
						if( !empty( $link ) ) {
							$output .= '</a>';
						}
					}
				$output .= '</div>';
			$output .= '</li>';
		}

		return $output;

	}

}
add_shortcode( "cloux_sponsors_item", "cloux_sponsors_item_shortcode" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Sponsors', 'cloux' ),
			"base" => "cloux_sponsors",
			"as_parent" => array( 'only' => 'cloux_sponsors_item' ),
			"js_view" => 'VcColumnView',
			"content_element" => true,
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/sponsors.svg',
			"description" => esc_html__( 'Sponsors element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'cloux' ),
					"description" => esc_html__( 'You can choose a style.', 'cloux' ),
					"param_name" => "style",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Column', 'cloux' ),
					"description" => esc_html__( 'You can choose a column.', 'cloux' ),
					"param_name" => "column",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Column 1', 'cloux' ) => 'column-1',
						esc_html__( 'Column 2', 'cloux' ) => 'column-2',
						esc_html__( 'Column 3', 'cloux' ) => 'column-3',
						esc_html__( 'Column 4', 'cloux' ) => 'column-4',
						esc_html__( 'Column 5', 'cloux' ) => 'column-5',
						esc_html__( 'Column 6', 'cloux' ) => 'column-6',
						esc_html__( 'Column 7', 'cloux' ) => 'column-7',
					),
				),
			)
		)
	);
}

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Sponsor Item', 'cloux' ),
			"base" => "cloux_sponsors_item",
			"as_child" => array( 'only' => 'cloux_sponsors' ),
			"content_element" => true,
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/sponsors.svg',
			"description" => esc_html__( 'App box item element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "attach_image",
					"heading" => esc_html__( 'Logo', 'cloux' ),
					"description" => esc_html__( 'You can upload a image.', 'cloux' ),
					"param_name" => "logo",
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Link', 'cloux' ),
					"description" => esc_html__( 'You can enter a link.', 'cloux' ),
					"param_name" => "link",
				),
			)
		)
	);
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_cloux_sponsors extends WPBakeryShortCodesContainer {}
}



/*======
*
* Service Box
*
======*/
function cloux_service_box_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'title' => '',
			'text' => '',
			'link' => '',
			'icon' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = "";

		if( !empty( $atts["top-title"] ) or !empty( $atts["main-title"] ) or !empty( $atts["text"] ) or !empty( $atts["link"] ) ) {

			/*====== Background Image ======*/
			if( !empty( $atts["background-image"] ) ) {
				$background = $atts["background-image"];
				$background = wp_get_attachment_image_src( $background, 'full', true );
				$background = $background[0];
			} else {
				$background = "";
			}

			/*====== Shadow ======*/
			if( !empty( $atts['shadow'] ) ) {
				$shadow = 'shadow-' . $atts['shadow'];
			} else {
				$shadow = "shadow-true";
			}

			/*====== HTML Output ======*/
			$output .= '<div class="cloux-service-box">';
				if( !empty( $atts["link"] ) ) {
					$href = $atts["link"];
					$href = vc_build_link( $href );
					if( !empty( $href["target"] ) ) {
						$target = $href["target"];
					} else {
						$target = "_parent";
					}

					if( !empty( $href["url"] ) ) {
						$output .= '<a href="' . esc_url( $href["url"] ) . '" title="' . esc_attr( $href["title"] ) . '" target="' . esc_attr( $target ) . '">';
					}
				}

					if( !empty( $atts["icon"] ) ) {
						$output .= '<i class="' . esc_attr( $atts["icon"] ) . '" aria-hidden="true"></i>';
					}

					if( !empty( $atts["title"] ) ) {
						$output .= '<div class="title">' . esc_attr( $atts["title"] ) . '</div>';
					}

					if( !empty( $atts["text"] ) ) {
						$output .= '<div class="text">' . wpautop( $atts["text"] ) . '</div>';
					}

				if( !empty( $atts["link"] ) ) {
					if( !empty( $href["url"] ) ) {
						$output .= '</a>';
					}
				}
			$output .= '</div>';
		}

		return $output;

	}

}
add_shortcode( "cloux_service_box", "cloux_service_box_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Service Box', 'cloux' ),
			"base" => "cloux_service_box",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/service-box.svg',
			"description" => esc_html__( 'Service box element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Title', 'cloux' ),
					"description" => esc_html__( 'You can enter a title.', 'cloux' ),
					"param_name" => "title",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Text', 'cloux' ),
					"description" => esc_html__( 'You can enter a summary text.', 'cloux' ),
					"param_name" => "text",
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Link', 'cloux' ),
					"description" => esc_html__( 'You can enter a link.', 'cloux' ),
					"param_name" => "link",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Icon', 'cloux' ),
					"description" => esc_html__( 'You can enter a icon. Example: fab fa-wordpress-simple, fas fa-map-marker-alt. Icon list: https://goo.gl/vdPEsc', 'cloux' ),
					"param_name" => "icon",
				),
			),
		)
	);
}



/*======
*
* App Box
*
======*/
function cloux_app_box_output( $atts, $content = null ) {		
	$atts = shortcode_atts(
		array(
			'style' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {

		$output = '';

		/*====== Style ======*/
		if( !empty( $atts["style"] ) ) {
			$style = $atts["style"];
		} else {
			$style = "style-1";
		}

		/*====== HTML Output ======*/
		$output .= '<div class="cloux-app-box ' . esc_attr( $style ) . '">';
			$output .= '<ul>';
				$output .= do_shortcode( $content );
			$output .= '</ul>';
		$output .= '</div>';

		return $output;

	}

}
add_shortcode( "cloux_app_box", "cloux_app_box_output" );

function cloux_app_box_item_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'thin-text' => '',
			'bold-text' => '',
			'icon' => '',
			'link' => '',
		), $atts
	);
	
	$output = '';

	if ( function_exists( 'rwmb_meta' ) ) {

		if( !empty( $atts["thin-text"] ) or !empty( $atts["bold-text"] ) or !empty( $atts["icon"] ) or !empty( $atts["link"] ) ) {
			$output .= '<li>';
				if( !empty( $atts["link"] ) ) {
					$link = $atts["link"];
					$link = vc_build_link( $link );
					if( !empty( $link["target"] ) ) {
						$link_target = $link["target"];
					} else {
						$link_target = "_parent";
					}

					$output .= '<a href="' . esc_url( $link["url"] ) . '" title="' . esc_attr( $link["title"] ) . '" target="' . esc_attr( $link_target ) . '">';
				}

					if( !empty( $atts["icon"] ) ) {
						$output .= '<i class="' . esc_attr( $atts["icon"] ) . '" aria-hidden="true"></i>';
					}

					if( !empty( $atts["thin-text"] ) or !empty( $atts["bold-text"] ) ) {
						$output .= '<div class="text">';
							if( !empty( $atts["thin-text"] ) ) {
								$output .= esc_attr( $atts["thin-text"] );
							}
							if( !empty( $atts["thin-text"] ) or !empty( $atts["bold-text"] ) ) {
								$output .= ' ';
							}
							if( !empty( $atts["bold-text"] ) ) {
								$output .= '<strong>' . esc_attr( $atts["bold-text"] ) . '</strong>';
							}
						$output .= '</div>';
					}

				if( !empty( $atts["link"] ) ) {
					$output .= '</a>';
				}
			$output .= '</li>';
		}

		return $output;

	}

}
add_shortcode( "cloux_app_box_item", "cloux_app_box_item_shortcode" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'App Box', 'cloux' ),
			"base" => "cloux_app_box",
			"as_parent" => array( 'only' => 'cloux_app_box_item' ),
			"js_view" => 'VcColumnView',
			"content_element" => true,
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/app-box.svg',
			"description" => esc_html__( 'App box element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'cloux' ),
					"description" => esc_html__( 'You can select a style.', 'cloux' ),
					"param_name" => "style",
					"save_always" => true,
					"value" => array(
						esc_html__( 'Style 1', 'cloux' ) => 'style-1',
						esc_html__( 'Style 2', 'cloux' ) => 'style-2',
					),
				),
			)
		)
	);
}

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'App Box Item', 'cloux' ),
			"base" => "cloux_app_box_item",
			"as_child" => array( 'only' => 'cloux_app_box' ),
			"content_element" => true,
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/app-box.svg',
			"description" => esc_html__( 'App box item element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Thin Text', 'cloux' ),
					"description" => esc_html__( 'You can enter a text.', 'cloux' ),
					"param_name" => "thin-text",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Bold Text', 'cloux' ),
					"description" => esc_html__( 'You can enter a text.', 'cloux' ),
					"param_name" => "bold-text",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Icon', 'cloux' ),
					"description" => esc_html__( 'You can enter a icon. Example: fab fa-wordpress-simple, fas fa-map-marker-alt. Icon list: https://goo.gl/vdPEsc', 'cloux' ),
					"param_name" => "icon",
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Link', 'cloux' ),
					"description" => esc_html__( 'You can enter a link.', 'cloux' ),
					"param_name" => "link",
				),
			)
		)
	);
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_cloux_app_box extends WPBakeryShortCodesContainer {}
}



/*======
*
* Contact Box
*
======*/
function cloux_contact_box_output( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'address' => '',
			'email' => '',
			'phone' => '',
			'fax' => '',
		), $atts
	);

	if ( function_exists( 'rwmb_meta' ) ) {
	
		$output = '';

		/*====== HTML Output ======*/
		if( !empty( $atts["address"] ) or !empty( $atts["email"] ) or !empty( $atts["phone"] ) or !empty( $atts["fax"] ) ) {
			$output .= '<div class="cloux-contact-box">';
				if( !empty( $atts["address"] ) ) {
					$output .= '<div class="contact-row address">';
						$output .= '<i class="fas fa-map-marker-alt" aria-hidden="true"></i>';
						$output .= '<span>';
							$output .= esc_attr( $atts["address"] );
						$output .= '</span>';
					$output .= '</div>';
				}

				if( !empty( $atts["email"] ) ) {
					$output .= '<div class="contact-row email">';
						$output .= '<i class="fas fa-envelope" aria-hidden="true"></i>';
						$output .= '<a href="mailto:' . esc_attr( str_replace(' ', '', $atts["email"] ) ) . '">';
							$output .= '<span>';
								$output .= esc_attr( $atts["email"] );
							$output .= '</span>';
						$output .= '</a>';
					$output .= '</div>';
				}

				if( !empty( $atts["phone"] ) ) {
					$output .= '<div class="contact-row phone">';
						$output .= '<i class="fas fa-phone" aria-hidden="true"></i>';
						$output .= '<a href="tel:+' . esc_attr( str_replace(' ', '', $atts["phone"] ) ) . '">';
							$output .= '<span>';
								$output .= esc_attr( $atts["phone"] );
							$output .= '</span>';
						$output .= '</a>';
					$output .= '</div>';
				}

				if( !empty( $atts["fax"] ) ) {
					$output .= '<div class="contact-row fax">';
						$output .= '<i class="fas fa-fax" aria-hidden="true"></i>';
						$output .= '<span>';
							$output .= esc_attr( $atts["fax"] );
						$output .= '</span>';
					$output .= '</div>';
				}
			$output .= '</div>';
		}

		return $output;

	}

}
add_shortcode( "cloux_contact_box", "cloux_contact_box_output" );

if( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			"name" => esc_html__( 'Contact Box', 'cloux' ),
			"base" => "cloux_contact_box",
			"category" => esc_html__( 'Cloux Theme', 'cloux' ),
			"icon" => get_template_directory_uri() . '/include/customize/assets/img/icons/contact-box.svg',
			"description" =>esc_html__( 'Contact box element.', 'cloux' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Address', 'cloux' ),
					"description" => esc_html__( 'You can enter a address.', 'cloux' ),
					"param_name" => "address",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Email', 'cloux' ),
					"description" => esc_html__( 'You can enter a email.', 'cloux' ),
					"param_name" => "email",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Phone', 'cloux' ),
					"description" => esc_html__( 'You can enter a phone number.', 'cloux' ),
					"param_name" => "phone",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Fax', 'cloux' ),
					"description" => esc_html__( 'You can enter a fax number.', 'cloux' ),
					"param_name" => "fax",
				),
			),
		)
	);
}