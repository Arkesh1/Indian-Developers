<?php
/*======
*
* Post Types
*
======*/
	/*====== Games ======*/
	if ( ! function_exists('cloux_games') ) {
		function cloux_games() {
			$labels = array(
				'name' => _x( 'Games', 'Games General Name', 'cloux' ),
				'singular_name' => _x( 'Game', 'Games Singular Name', 'cloux' ),
				'menu_name' => esc_html__( 'Games', 'cloux' ),
				'parent_item_colon' => esc_html__( 'Parent Game:', 'cloux' ),
				'all_items' => esc_html__( 'All Games', 'cloux' ),
				'view_item' => esc_html__( 'View Game', 'cloux' ),
				'add_new_item' => esc_html__( 'Add New Game Item', 'cloux' ),
				'add_new' => esc_html__( 'Add New Game', 'cloux' ),
				'edit_item' => esc_html__( 'Edit Game', 'cloux' ),
				'update_item' => esc_html__( 'Update Game', 'cloux' ),
				'search_items' => esc_html__( 'Search Game', 'cloux' ),
				'not_found' => esc_html__( 'Not Game Found', 'cloux' ),
				'not_found_in_trash' => esc_html__( 'Not Game Found in Trash', 'cloux' ),
			);
			$args = array(
				'label' => esc_html__( 'Games', 'cloux' ),
				'description' => esc_html__( 'Game post type description.', 'cloux' ),
				'labels' => $labels,
				'supports' => array( 'title', 'comments', 'author', 'excerpt', 'thumbnail', 'revisions', 'editor', 'custom-fields' ),
				'hierarchical' => false,
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'show_in_nav_menus' => true,
				'show_in_admin_bar' => true,
				'menu_position' => 20,
				'menu_icon' => 'dashicons-welcome-view-site',
				'can_export' => true,
				'has_archive' => true,
				'exclude_from_search' => false,
				'publicly_queryable' => true,
				'capability_type' => 'post',
			);
			register_post_type( 'game', $args );
		}
		add_action( 'init', 'cloux_games', 0 );
	}



	/*====== eSport Players ======*/
	if ( ! function_exists('cloux_esport_players') ) {
		function cloux_esport_players() {
			$labels = array(
				'name' => _x( 'eSport Players', 'eSport Players General Name', 'cloux' ),
				'singular_name' => _x( 'Player', 'eSport Players Singular Name', 'cloux' ),
				'menu_name' => esc_html__( 'eSport Players', 'cloux' ),
				'parent_item_colon' => esc_html__( 'Parent Player:', 'cloux' ),
				'all_items' => esc_html__( 'All Players', 'cloux' ),
				'view_item' => esc_html__( 'View Player', 'cloux' ),
				'add_new_item' => esc_html__( 'Add New Player Item', 'cloux' ),
				'add_new' => esc_html__( 'Add New Player', 'cloux' ),
				'edit_item' => esc_html__( 'Edit Player', 'cloux' ),
				'update_item' => esc_html__( 'Update Player', 'cloux' ),
				'search_items' => esc_html__( 'Search Player', 'cloux' ),
				'not_found' => esc_html__( 'Not Player Found', 'cloux' ),
				'not_found_in_trash' => esc_html__( 'Not Player Found in Trash', 'cloux' ),
			);
			$args = array(
				'label' => esc_html__( 'eSport Players', 'cloux' ),
				'description' => esc_html__( 'Player post type description.', 'cloux' ),
				'labels' => $labels,
				'supports' => array( 'title', 'comments', 'author', 'excerpt', 'thumbnail', 'revisions', 'editor', 'custom-fields' ),
				'hierarchical' => false,
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'show_in_nav_menus' => true,
				'show_in_admin_bar' => true,
				'menu_position' => 20,
				'menu_icon' => 'dashicons-groups',
				'can_export' => true,
				'has_archive' => true,
				'exclude_from_search' => false,
				'publicly_queryable' => true,
				'capability_type' => 'post',
			);
			register_post_type( 'esport-player', $args );
		}
		add_action( 'init', 'cloux_esport_players', 0 );
	}




	/*====== eSport Fixture ======*/
	if ( ! function_exists('cloux_esport_fixture') ) {
		function cloux_esport_fixture() {
			$labels = array(
				'name' => _x( 'eSport Fixture', 'eSport Fixture General Name', 'cloux' ),
				'singular_name' => _x( 'Fixture', 'eSport Fixture Singular Name', 'cloux' ),
				'menu_name' => esc_html__( 'eSport Fixture', 'cloux' ),
				'parent_item_colon' => esc_html__( 'Parent Fixture:', 'cloux' ),
				'all_items' => esc_html__( 'All Fixture', 'cloux' ),
				'view_item' => esc_html__( 'View Fixture', 'cloux' ),
				'add_new_item' => esc_html__( 'Add New Fixture Item', 'cloux' ),
				'add_new' => esc_html__( 'Add New Fixture', 'cloux' ),
				'edit_item' => esc_html__( 'Edit Fixture', 'cloux' ),
				'update_item' => esc_html__( 'Update Fixture', 'cloux' ),
				'search_items' => esc_html__( 'Search Fixture', 'cloux' ),
				'not_found' => esc_html__( 'Not Fixture Found', 'cloux' ),
				'not_found_in_trash' => esc_html__( 'Not Fixture Found in Trash', 'cloux' ),
			);
			$args = array(
				'label' => esc_html__( 'eSport Fixture', 'cloux' ),
				'description' => esc_html__( 'Fixture post type description.', 'cloux' ),
				'labels' => $labels,
				'supports' => array( 'title', 'comments', 'author', 'excerpt', 'thumbnail', 'revisions', 'editor', 'custom-fields' ),
				'hierarchical' => false,
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'show_in_nav_menus' => true,
				'show_in_admin_bar' => true,
				'menu_position' => 20,
				'menu_icon' => 'dashicons-calendar-alt',
				'can_export' => true,
				'has_archive' => true,
				'exclude_from_search' => false,
				'publicly_queryable' => true,
				'capability_type' => 'post',
			);
			register_post_type( 'esport-fixture', $args );
		}
		add_action( 'init', 'cloux_esport_fixture', 0 );
	}



/*======
*
* Taxonomies
*
======*/
	/*====== eSport Games ======*/
	if ( ! function_exists( 'esport_game' ) ) {
		function esport_game() {
			$labels = array(
				'name' => _x( 'Games', 'Games General Name', 'cloux' ),
				'singular_name' => _x( 'Games', 'Games Singular Name', 'cloux' ),
				'menu_name' => esc_html__( 'Games', 'cloux' ),
				'all_items' => esc_html__( 'All Games', 'cloux' ),
				'parent_item' => esc_html__( 'Parent Game', 'cloux' ),
				'parent_item_colon' => esc_html__( 'Parent Game:', 'cloux' ),
				'new_item_name' => esc_html__( 'New Game Name', 'cloux' ),
				'add_new_item' => esc_html__( 'Add New Game', 'cloux' ),
				'edit_item' => esc_html__( 'Edit Game', 'cloux' ),
				'view_item' => esc_html__( 'View Game', 'cloux' ),
				'update_item' => esc_html__( 'Update Game', 'cloux' ),
				'separate_items_with_commas' => esc_html__( 'Separate games with commas', 'cloux' ),
				'search_items' => esc_html__( 'Search Games', 'cloux' ),
				'add_or_remove_items' => esc_html__( 'Add or remove games', 'cloux' ),
				'choose_from_most_used' => esc_html__( 'Choose from the most used games', 'cloux' ),
				'not_found' => esc_html__( 'Not Found', 'cloux' ),
			);
			$args = array(
				'labels' => $labels,
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
			);
			register_taxonomy( 'esport-game', array( 'esport-player', 'esport-fixture' ), $args );

		}
		add_action( 'init', 'esport_game', 0 );
	}



	/*====== eSport Teams ======*/
	if ( ! function_exists( 'esport_team' ) ) {
		function esport_team() {
			$labels = array(
				'name' => _x( 'Teams', 'Teams General Name', 'cloux' ),
				'singular_name' => _x( 'Teams', 'Teams Singular Name', 'cloux' ),
				'menu_name' => esc_html__( 'Teams', 'cloux' ),
				'all_items' => esc_html__( 'All Teams', 'cloux' ),
				'parent_item' => esc_html__( 'Parent Team', 'cloux' ),
				'parent_item_colon' => esc_html__( 'Parent Team:', 'cloux' ),
				'new_item_name' => esc_html__( 'New Team Name', 'cloux' ),
				'add_new_item' => esc_html__( 'Add New Team', 'cloux' ),
				'edit_item' => esc_html__( 'Edit Team', 'cloux' ),
				'view_item' => esc_html__( 'View Team', 'cloux' ),
				'update_item' => esc_html__( 'Update Team', 'cloux' ),
				'separate_items_with_commas' => esc_html__( 'Separate teams with commas', 'cloux' ),
				'search_items' => esc_html__( 'Search Teams', 'cloux' ),
				'add_or_remove_items' => esc_html__( 'Add or remove teams', 'cloux' ),
				'choose_from_most_used' => esc_html__( 'Choose from the most used teams', 'cloux' ),
				'not_found' => esc_html__( 'Not Found', 'cloux' ),
			);
			$args = array(
				'labels' => $labels,
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
			);
			register_taxonomy( 'esport-team', array( 'esport-fixture' ), $args );

		}
		add_action( 'init', 'esport_team', 0 );
	}



	/*====== eSport Fixture Categories ======*/
	if ( ! function_exists( 'esport_fixture_category' ) ) {
		function esport_fixture_category() {
			$labels = array(
				'name' => _x( 'Categories', 'Categories General Name', 'cloux' ),
				'singular_name' => _x( 'Categories', 'Categories Singular Name', 'cloux' ),
				'menu_name' => esc_html__( 'Categories', 'cloux' ),
				'all_items' => esc_html__( 'All Categories', 'cloux' ),
				'parent_item' => esc_html__( 'Parent Category', 'cloux' ),
				'parent_item_colon' => esc_html__( 'Parent Category:', 'cloux' ),
				'new_item_name' => esc_html__( 'New Category Name', 'cloux' ),
				'add_new_item' => esc_html__( 'Add New Category', 'cloux' ),
				'edit_item' => esc_html__( 'Edit Category', 'cloux' ),
				'view_item' => esc_html__( 'View Category', 'cloux' ),
				'update_item' => esc_html__( 'Update Category', 'cloux' ),
				'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'cloux' ),
				'search_items' => esc_html__( 'Search Categories', 'cloux' ),
				'add_or_remove_items' => esc_html__( 'Add or remove categories', 'cloux' ),
				'choose_from_most_used' => esc_html__( 'Choose from the most used categories', 'cloux' ),
				'not_found' => esc_html__( 'Not Found', 'cloux' ),
			);
			$args = array(
				'labels' => $labels,
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
			);
			register_taxonomy( 'esport-fixture-category', array( 'esport-fixture' ), $args );

		}
		add_action( 'init', 'esport_fixture_category', 0 );
	}



	/*====== Game Categories ======*/
	if ( ! function_exists( 'game_category' ) ) {
		function game_category() {
			$labels = array(
				'name' => _x( 'Categories', 'Categories General Name', 'cloux' ),
				'singular_name' => _x( 'Categories', 'Categories Singular Name', 'cloux' ),
				'menu_name' => esc_html__( 'Categories', 'cloux' ),
				'all_items' => esc_html__( 'All Categories', 'cloux' ),
				'parent_item' => esc_html__( 'Parent Category', 'cloux' ),
				'parent_item_colon' => esc_html__( 'Parent Category:', 'cloux' ),
				'new_item_name' => esc_html__( 'New Category Name', 'cloux' ),
				'add_new_item' => esc_html__( 'Add New Category', 'cloux' ),
				'edit_item' => esc_html__( 'Edit Category', 'cloux' ),
				'view_item' => esc_html__( 'View Category', 'cloux' ),
				'update_item' => esc_html__( 'Update Category', 'cloux' ),
				'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'cloux' ),
				'search_items' => esc_html__( 'Search Categories', 'cloux' ),
				'add_or_remove_items' => esc_html__( 'Add or remove categories', 'cloux' ),
				'choose_from_most_used' => esc_html__( 'Choose from the most used categories', 'cloux' ),
				'not_found' => esc_html__( 'Not Found', 'cloux' ),
			);
			$args = array(
				'labels' => $labels,
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
			);
			register_taxonomy( 'game-category', array( 'game' ), $args );

		}
		add_action( 'init', 'game_category', 0 );
	}



	/*====== Game Tags ======*/
	if ( ! function_exists( 'game_tag' ) ) {
		function game_tag() {
			$labels = array(
				'name' => _x( 'Tags', 'Tags General Name', 'cloux' ),
				'singular_name' => _x( 'Tags', 'Tags Singular Name', 'cloux' ),
				'menu_name' => esc_html__( 'Tags', 'cloux' ),
				'all_items' => esc_html__( 'All Tags', 'cloux' ),
				'parent_item' => esc_html__( 'Parent Tag', 'cloux' ),
				'parent_item_colon' => esc_html__( 'Parent Tag:', 'cloux' ),
				'new_item_name' => esc_html__( 'New Tag Name', 'cloux' ),
				'add_new_item' => esc_html__( 'Add New Tag', 'cloux' ),
				'edit_item' => esc_html__( 'Edit Tag', 'cloux' ),
				'view_item' => esc_html__( 'View Tag', 'cloux' ),
				'update_item' => esc_html__( 'Update Tag', 'cloux' ),
				'separate_items_with_commas' => esc_html__( 'Separate tags with commas', 'cloux' ),
				'search_items' => esc_html__( 'Search Tags', 'cloux' ),
				'add_or_remove_items' => esc_html__( 'Add or remove tags', 'cloux' ),
				'choose_from_most_used' => esc_html__( 'Choose from the most used tags', 'cloux' ),
				'not_found' => esc_html__( 'Not Found', 'cloux' ),
			);
			$args = array(
				'labels' => $labels,
				'hierarchical' => false,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => false,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
			);
			register_taxonomy( 'game-tag', array( 'game' ), $args );

		}
		add_action( 'init', 'game_tag', 0 );
	}



	/*====== Game Genres ======*/
	if ( ! function_exists( 'game_genres' ) ) {
		function game_genres() {
			$labels = array(
				'name' => _x( 'Genres', 'Genres General Name', 'cloux' ),
				'singular_name' => _x( 'Genres', 'Genres Singular Name', 'cloux' ),
				'menu_name' => esc_html__( 'Genres', 'cloux' ),
				'all_items' => esc_html__( 'All Genres', 'cloux' ),
				'parent_item' => esc_html__( 'Parent Genre', 'cloux' ),
				'parent_item_colon' => esc_html__( 'Parent Genre:', 'cloux' ),
				'new_item_name' => esc_html__( 'New Genre Name', 'cloux' ),
				'add_new_item' => esc_html__( 'Add New Genre', 'cloux' ),
				'edit_item' => esc_html__( 'Edit Genre', 'cloux' ),
				'view_item' => esc_html__( 'View Genre', 'cloux' ),
				'update_item' => esc_html__( 'Update Genre', 'cloux' ),
				'separate_items_with_commas' => esc_html__( 'Separate genres with commas', 'cloux' ),
				'search_items' => esc_html__( 'Search Genres', 'cloux' ),
				'add_or_remove_items' => esc_html__( 'Add or remove genres', 'cloux' ),
				'choose_from_most_used' => esc_html__( 'Choose from the most used genres', 'cloux' ),
				'not_found' => esc_html__( 'Not Found', 'cloux' ),
			);
			$args = array(
				'labels' => $labels,
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
			);
			register_taxonomy( 'genre', array( 'game' ), $args );

		}
		add_action( 'init', 'game_genres', 0 );
	}



	/*====== Game Companies ======*/
	if ( ! function_exists( 'game_companies' ) ) {
		function game_companies() {
			$labels = array(
				'name' => _x( 'Companies', 'Companies General Name', 'cloux' ),
				'singular_name' => _x( 'Companies', 'Companies Singular Name', 'cloux' ),
				'menu_name' => esc_html__( 'Companies', 'cloux' ),
				'all_items' => esc_html__( 'All Companies', 'cloux' ),
				'parent_item' => esc_html__( 'Parent Company', 'cloux' ),
				'parent_item_colon' => esc_html__( 'Parent Company:', 'cloux' ),
				'new_item_name' => esc_html__( 'New Company Name', 'cloux' ),
				'add_new_item' => esc_html__( 'Add New Company', 'cloux' ),
				'edit_item' => esc_html__( 'Edit Company', 'cloux' ),
				'view_item' => esc_html__( 'View Company', 'cloux' ),
				'update_item' => esc_html__( 'Update Company', 'cloux' ),
				'separate_items_with_commas' => esc_html__( 'Separate companies with commas', 'cloux' ),
				'search_items' => esc_html__( 'Search Companies', 'cloux' ),
				'add_or_remove_items' => esc_html__( 'Add or remove companies', 'cloux' ),
				'choose_from_most_used' => esc_html__( 'Choose from the most used companies', 'cloux' ),
				'not_found' => esc_html__( 'Not Found', 'cloux' ),
			);
			$args = array(
				'labels' => $labels,
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
			);
			register_taxonomy( 'company', array( 'game' ), $args );

		}
		add_action( 'init', 'game_companies', 0 );
	}



	/*====== Game Platforms ======*/
	if ( ! function_exists( 'game_platforms' ) ) {
		function game_platforms() {
			$labels = array(
				'name' => _x( 'Platforms', 'Platforms General Name', 'cloux' ),
				'singular_name' => _x( 'Platforms', 'Platforms Singular Name', 'cloux' ),
				'menu_name' => esc_html__( 'Platforms', 'cloux' ),
				'all_items' => esc_html__( 'All Platforms', 'cloux' ),
				'parent_item' => esc_html__( 'Parent Platform', 'cloux' ),
				'parent_item_colon' => esc_html__( 'Parent Platform:', 'cloux' ),
				'new_item_name' => esc_html__( 'New Platform Name', 'cloux' ),
				'add_new_item' => esc_html__( 'Add New Platform', 'cloux' ),
				'edit_item' => esc_html__( 'Edit Platform', 'cloux' ),
				'view_item' => esc_html__( 'View Platform', 'cloux' ),
				'update_item' => esc_html__( 'Update Platform', 'cloux' ),
				'separate_items_with_commas' => esc_html__( 'Separate platforms with commas', 'cloux' ),
				'search_items' => esc_html__( 'Search Platforms', 'cloux' ),
				'add_or_remove_items' => esc_html__( 'Add or remove platforms', 'cloux' ),
				'choose_from_most_used' => esc_html__( 'Choose from the most used platforms', 'cloux' ),
				'not_found' => esc_html__( 'Not Found', 'cloux' ),
			);
			$args = array(
				'labels' => $labels,
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
			);
			register_taxonomy( 'platform', array( 'game' ), $args );

		}
		add_action( 'init', 'game_platforms', 0 );
	}



	/*====== Game OS ======*/
	if ( ! function_exists( 'game_os' ) ) {
		function game_os() {
			$labels = array(
				'name' => _x( 'OS', 'OS General Name', 'cloux' ),
				'singular_name' => _x( 'OS', 'OS Singular Name', 'cloux' ),
				'menu_name' => esc_html__( 'OS', 'cloux' ),
				'all_items' => esc_html__( 'All OS', 'cloux' ),
				'parent_item' => esc_html__( 'Parent OS', 'cloux' ),
				'parent_item_colon' => esc_html__( 'Parent OS:', 'cloux' ),
				'new_item_name' => esc_html__( 'New OS Name', 'cloux' ),
				'add_new_item' => esc_html__( 'Add New OS', 'cloux' ),
				'edit_item' => esc_html__( 'Edit OS', 'cloux' ),
				'view_item' => esc_html__( 'View OS', 'cloux' ),
				'update_item' => esc_html__( 'Update OS', 'cloux' ),
				'separate_items_with_commas' => esc_html__( 'Separate OS with commas', 'cloux' ),
				'search_items' => esc_html__( 'Search OS', 'cloux' ),
				'add_or_remove_items' => esc_html__( 'Add or remove OS', 'cloux' ),
				'choose_from_most_used' => esc_html__( 'Choose from the most used OS', 'cloux' ),
				'not_found' => esc_html__( 'Not Found', 'cloux' ),
			);
			$args = array(
				'labels' => $labels,
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => false,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
			);
			register_taxonomy( 'os', array( 'game' ), $args );

		}
		add_action( 'init', 'game_os', 0 );
	}



	/*====== Game Modes ======*/
	if ( ! function_exists( 'game_modes' ) ) {
		function game_modes() {
			$labels = array(
				'name' => _x( 'Modes', 'Modes General Name', 'cloux' ),
				'singular_name' => _x( 'Modes', 'Modes Singular Name', 'cloux' ),
				'menu_name' => esc_html__( 'Modes', 'cloux' ),
				'all_items' => esc_html__( 'All Modes', 'cloux' ),
				'parent_item' => esc_html__( 'Parent Modes', 'cloux' ),
				'parent_item_colon' => esc_html__( 'Parent Modes:', 'cloux' ),
				'new_item_name' => esc_html__( 'New Modes Name', 'cloux' ),
				'add_new_item' => esc_html__( 'Add New Modes', 'cloux' ),
				'edit_item' => esc_html__( 'Edit Modes', 'cloux' ),
				'view_item' => esc_html__( 'View Modes', 'cloux' ),
				'update_item' => esc_html__( 'Update Modes', 'cloux' ),
				'separate_items_with_commas' => esc_html__( 'Separate modes with commas', 'cloux' ),
				'search_items' => esc_html__( 'Search Modes', 'cloux' ),
				'add_or_remove_items' => esc_html__( 'Add or remove modes', 'cloux' ),
				'choose_from_most_used' => esc_html__( 'Choose from the most used modes', 'cloux' ),
				'not_found' => esc_html__( 'Not Found', 'cloux' ),
			);
			$args = array(
				'labels' => $labels,
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => false,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
			);
			register_taxonomy( 'mode', array( 'game' ), $args );

		}
		add_action( 'init', 'game_modes', 0 );
	}



	/*====== Game Languages ======*/
	if ( ! function_exists( 'game_languages' ) ) {
		function game_languages() {
			$labels = array(
				'name' => _x( 'Languages', 'Languages General Name', 'cloux' ),
				'singular_name' => _x( 'Languages', 'Languages Singular Name', 'cloux' ),
				'menu_name' => esc_html__( 'Languages', 'cloux' ),
				'all_items' => esc_html__( 'All Languages', 'cloux' ),
				'parent_item' => esc_html__( 'Parent Languages', 'cloux' ),
				'parent_item_colon' => esc_html__( 'Parent Languages:', 'cloux' ),
				'new_item_name' => esc_html__( 'New Languages Name', 'cloux' ),
				'add_new_item' => esc_html__( 'Add New Languages', 'cloux' ),
				'edit_item' => esc_html__( 'Edit Languages', 'cloux' ),
				'view_item' => esc_html__( 'View Languages', 'cloux' ),
				'update_item' => esc_html__( 'Update Languages', 'cloux' ),
				'separate_items_with_commas' => esc_html__( 'Separate languages with commas', 'cloux' ),
				'search_items' => esc_html__( 'Search Languages', 'cloux' ),
				'add_or_remove_items' => esc_html__( 'Add or remove languages', 'cloux' ),
				'choose_from_most_used' => esc_html__( 'Choose from the most used languages', 'cloux' ),
				'not_found' => esc_html__( 'Not Found', 'cloux' ),
			);
			$args = array(
				'labels' => $labels,
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
			);
			register_taxonomy( 'language', array( 'game' ), $args );

		}
		add_action( 'init', 'game_languages', 0 );
	}