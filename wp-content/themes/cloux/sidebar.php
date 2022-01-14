<?php
if ( is_attachment() ) {

	$attachment_sidebar = get_theme_mod( 'cloux_archives_attachments_sidebar', 'cloux-sidebar' );

	if ( !empty( $attachment_sidebar ) ) {
		if ( is_active_sidebar( $attachment_sidebar ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( $attachment_sidebar ); 
			cloux_sidebar_after();
		} else {
			if ( is_active_sidebar( 'cloux-sidebar' ) ) {
				cloux_sidebar_before();
					dynamic_sidebar( 'cloux-sidebar' );
				cloux_sidebar_after();
			}
		}
	} else {
		if ( is_active_sidebar( 'cloux-sidebar' ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( 'cloux-sidebar' );
			cloux_sidebar_after(); 			
		}
	}

} elseif ( get_post_type( get_the_ID() ) == 'esport-player' or is_post_type_archive( 'esport-player' ) ) {
	
	$esport_player_sidebar = get_theme_mod( 'cloux_esport_players_sidebar', 'cloux-sidebar' );

	if ( !empty( $esport_player_sidebar) ) {
		if ( is_active_sidebar( $esport_player_sidebar ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( $esport_player_sidebar ); 
			cloux_sidebar_after();
		} else {
			if ( is_active_sidebar( 'cloux-sidebar' ) ) {
				cloux_sidebar_before();
					dynamic_sidebar( 'cloux-sidebar' );
				cloux_sidebar_after();
			}
		}
	} else {
		if ( is_active_sidebar( 'cloux-sidebar' ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( 'cloux-sidebar' );
			cloux_sidebar_after(); 			
		}
	}

} elseif ( get_post_type( get_the_ID() ) == 'game' or is_post_type_archive( 'game' ) or is_tax( 'genre' ) or is_tax( 'game-category' ) or is_tax( 'game-tag' ) or is_tax( 'company' ) or is_tax( 'platform' ) or is_tax( 'os' ) or is_tax( 'mode' ) or is_tax( 'language' ) ) {
	
	$game_sidebar = get_theme_mod( 'cloux_games_archive_sidebar', 'cloux-sidebar' );

	if( get_post_type( get_the_ID() ) == 'game' ) {
		$single_sidebar = get_post_meta( get_the_ID(), 'sidebar', true );
	}

	if( !empty( $single_sidebar ) ) {
		if ( is_active_sidebar( $single_sidebar ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( $single_sidebar ); 
			cloux_sidebar_after();
		} else {
			if ( is_active_sidebar( 'cloux-sidebar' ) ) {
				cloux_sidebar_before();
					dynamic_sidebar( 'cloux-sidebar' );
				cloux_sidebar_after();
			}
		}
	} elseif ( !empty( $game_sidebar) ) {
		if ( is_active_sidebar( $game_sidebar ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( $game_sidebar ); 
			cloux_sidebar_after();
		} else {
			if ( is_active_sidebar( 'cloux-sidebar' ) ) {
				cloux_sidebar_before();
					dynamic_sidebar( 'cloux-sidebar' );
				cloux_sidebar_after();
			}
		}
	} else {
		if ( is_active_sidebar( 'cloux-sidebar' ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( 'cloux-sidebar' );
			cloux_sidebar_after(); 			
		}
	}
		
} elseif( is_single() ) {
	$post_sidebar = get_theme_mod( 'cloux_posts_sidebar', 'cloux-sidebar' );
	$single_sidebar = get_post_meta( get_the_ID(), 'sidebar', true );
	
	if( !empty( $single_sidebar ) ) {
		if ( is_active_sidebar( $single_sidebar ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( $single_sidebar ); 
			cloux_sidebar_after();
		} else {
			if ( is_active_sidebar( 'cloux-sidebar' ) ) {
				cloux_sidebar_before();
					dynamic_sidebar( 'cloux-sidebar' );
				cloux_sidebar_after();
			}
		}
	} elseif ( !empty( $post_sidebar) ) {
		if ( is_active_sidebar( $post_sidebar ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( $post_sidebar ); 
			cloux_sidebar_after();
		} else {
			if ( is_active_sidebar( 'cloux-sidebar' ) ) {
				cloux_sidebar_before();
					dynamic_sidebar( 'cloux-sidebar' );
				cloux_sidebar_after();
			}
		}
	} else {
		if ( is_active_sidebar( 'cloux-sidebar' ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( 'cloux-sidebar' );
			cloux_sidebar_after(); 			
		}
	}
	
}  elseif( is_page() ) {

	$page_sidebar = get_theme_mod( 'cloux_pages_sidebar', 'cloux-sidebar' );
	$single_sidebar = get_post_meta( get_the_ID(), 'sidebar', true );
	
	if( !empty( $single_sidebar ) ) {
		if ( is_active_sidebar( $single_sidebar ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( $single_sidebar ); 
			cloux_sidebar_after();
		} else {
			if ( is_active_sidebar( 'cloux-sidebar' ) ) {
				cloux_sidebar_before();
					dynamic_sidebar( 'cloux-sidebar' );
				cloux_sidebar_after();
			}
		}
	} elseif ( !empty( $page_sidebar) ) {
		if ( is_active_sidebar( $page_sidebar ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( $page_sidebar ); 
			cloux_sidebar_after();
		} else {
			if ( is_active_sidebar( 'cloux-sidebar' ) ) {
				cloux_sidebar_before();
					dynamic_sidebar( 'cloux-sidebar' );
				cloux_sidebar_after();
			}
		}
	} else {
		if ( is_active_sidebar( 'cloux-sidebar' ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( 'cloux-sidebar' );
			cloux_sidebar_after(); 			
		}
	}

} elseif ( is_category() ) {
	
	$category_sidebar = get_theme_mod( 'cloux_archives_categories_sidebar', 'cloux-sidebar' ); 

	if( !empty( $category_sidebar ) ) {
		if ( is_active_sidebar( $category_sidebar ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( $category_sidebar ); 
			cloux_sidebar_after();
		} else {
			if ( is_active_sidebar( 'cloux-sidebar' ) ) {
				cloux_sidebar_before();
					dynamic_sidebar( 'cloux-sidebar' );
				cloux_sidebar_after();
			}
		}
	} else {
		if ( is_active_sidebar( 'cloux-sidebar' ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( 'cloux-sidebar' );
			cloux_sidebar_after(); 			
		}
	}
	
} elseif ( is_tag() ) {

	$tag_sidebar = get_theme_mod( 'cloux_archives_tags_sidebar', 'cloux-sidebar' );

	if ( !empty( $tag_sidebar ) ) {
		if ( is_active_sidebar( $tag_sidebar ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( $tag_sidebar ); 
			cloux_sidebar_after();
		} else {
			if ( is_active_sidebar( 'cloux-sidebar' ) ) {
				cloux_sidebar_before();
					dynamic_sidebar( 'cloux-sidebar' );
				cloux_sidebar_after();
			}
		}
		
	} else {
		if ( is_active_sidebar( 'cloux-sidebar' ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( 'cloux-sidebar' );
			cloux_sidebar_after(); 			
		}
	}
	
} elseif ( is_author() ) {

	$author_sidebar = get_theme_mod( 'cloux_archives_authors_sidebar', 'cloux-sidebar' );

	if ( !empty( $author_sidebar ) ) {
		if ( is_active_sidebar( $author_sidebar ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( $author_sidebar ); 
			cloux_sidebar_after();
		} else {
			if ( is_active_sidebar( 'cloux-sidebar' ) ) {
				cloux_sidebar_before();
					dynamic_sidebar( 'cloux-sidebar' );
				cloux_sidebar_after();
			}
		}
		
	} else {
		if ( is_active_sidebar( 'cloux-sidebar' ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( 'cloux-sidebar' );
			cloux_sidebar_after(); 			
		}
	}
	
} elseif ( is_search() ) {

	$search_sidebar = get_theme_mod( 'cloux_archives_searches_sidebar', 'cloux-sidebar' );

	if ( !empty( $search_sidebar_select) ) {
		if ( is_active_sidebar( $search_sidebar_select ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( $search_sidebar_select ); 
			cloux_sidebar_after();
		} else {
			if ( is_active_sidebar( 'cloux-sidebar' ) ) {
				cloux_sidebar_before();
					dynamic_sidebar( 'cloux-sidebar' );
				cloux_sidebar_after();
			}
		}
		
	} else {
		if ( is_active_sidebar( 'cloux-sidebar' ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( 'cloux-sidebar' );
			cloux_sidebar_after(); 			
		}
	}
	
} elseif ( is_archive() ) {

	$archive_sidebar = get_theme_mod( 'cloux_archives_archives_sidebar', 'cloux-sidebar' );

	if ( !empty( $archive_sidebar ) ) {
		if ( is_active_sidebar( $archive_sidebar ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( $archive_sidebar ); 
			cloux_sidebar_after();
		} else {
			if ( is_active_sidebar( 'cloux-sidebar' ) ) {
				cloux_sidebar_before();
					dynamic_sidebar( 'cloux-sidebar' );
				cloux_sidebar_after();
			}
		}

	} else {
		if ( is_active_sidebar( 'cloux-sidebar' ) ) {
			cloux_sidebar_before();
				dynamic_sidebar( 'cloux-sidebar' );
			cloux_sidebar_after();
		}
	}
	
} else {
	if ( is_active_sidebar( 'cloux-sidebar' ) ) {
		cloux_sidebar_before();
			dynamic_sidebar( 'cloux-sidebar' );
		cloux_sidebar_after();
	}
}
