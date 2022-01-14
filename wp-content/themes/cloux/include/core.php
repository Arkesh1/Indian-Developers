<?php
	/*======
	*
	* Theme After Setup Start
	*
	======*/
	function cloux_setup(){
		load_theme_textdomain( 'cloux', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'quote', 'gallery', 'image', 'video', 'audio', 'chat', 'link' ) );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		if( function_exists( 'add_image_size' ) ) { 
			add_image_size( 'cloux-post-1', 970, 570, true );
			add_image_size( 'cloux-post-2', 90, 65, true );
			add_image_size( 'cloux-post-3', 560, 370, true );
			add_image_size( 'cloux-post-4', 650, 500, true );
			add_image_size( 'cloux-post-5', 170, 100, true );
			add_image_size( 'cloux-gallery-thumbnail', 125, 80, true );
			add_image_size( 'cloux-post-gallery-thumbnail', 190, 190, true );
			add_image_size( 'cloux-poster-medium', 384, 488, true );
			add_image_size( 'cloux-poster-small', 280, 357, true );
			add_image_size( 'cloux-slider-1', 1920, 950, true );
			add_image_size( 'cloux-carousel-1', 850, 795, true );
			add_image_size( 'cloux-carousel-2', 405, 250, true );
			add_image_size( 'cloux-lightbox', 1250, 950, true );
			add_image_size( 'cloux-page-banner', 1920, 450, true );
			add_image_size( 'cloux-content-box-bg', 1920, 670, true );
			add_image_size( 'cloux-content-box', 530, 370, true );
			add_image_size( 'cloux-sponsor-1', 255, 170, true );
			add_image_size( 'cloux-product-medium', 560, 500, true );
			add_image_size( 'cloux-character-image', 570, 670, true );
			add_image_size( 'cloux-sponsors', 170, 120, true );
		}
		
		if( ! isset( $content_width ) ) {
			$content_width = 600;
		}
		
		if( is_singular() ) wp_enqueue_script( 'comment-reply' );
	}
	add_action( 'after_setup_theme', 'cloux_setup' );



	/*======
	*
	* Theme Scripts & Styles
	*
	======*/
	function cloux_scripts()
	{
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/include/assets/js/bootstrap.min.js', array(), false, true );

		if(function_exists('vc_map')) {
			wp_enqueue_script( 'prettyphoto', true, array(), false, true );
		}

		if(function_exists('vc_map')) {
			$prettyphoto_variable = "a[rel^='prettyPhoto']";
			wp_add_inline_script( "prettyphoto", 'jQuery(document).ready(function($){
				$(function () {
					$("' . $prettyphoto_variable . '").prettyPhoto({ social_tools: false });
				});
			});' );			
		}

		wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/include/assets/js/waypoints.min.js', array(), false, true );

		$fixed_sidebar = get_theme_mod( 'cloux_fixed_sidebar', '1' );
		if( $fixed_sidebar == "1" ) {
			wp_enqueue_script( 'cloux-fixed-sidebar', get_template_directory_uri() . '/include/assets/js/fixed-sidebar.js', array(), false, true );
		}

		wp_enqueue_script( 'scrollbar', get_template_directory_uri() . '/include/assets/js/scrollbar.min.js', array(), false, true );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/include/assets/js/slick.min.js', array(), false, true );
		wp_enqueue_script( 'plyr', get_template_directory_uri() . '/include/assets/js/plyr.min.js', array(), false, true );
		wp_enqueue_script( 'select-fx', get_template_directory_uri() . '/include/assets/js/select-fx.js', array(), false, true );
		wp_enqueue_script( 'classie-fx', get_template_directory_uri() . '/include/assets/js/classie-fx.js', array(), false, true );
		wp_enqueue_script( 'flexmenu', get_template_directory_uri() . '/include/assets/js/flexmenu.min.js', array(), false, true );
		wp_enqueue_script( 'tweenmax', get_template_directory_uri() . '/include/assets/js/tweenmax.min.js', array(), false, true );
		wp_enqueue_script( 'cloux', get_template_directory_uri() . '/include/assets/js/cloux.js', array(), false, true );
		wp_enqueue_script( 'ajax-app' );
		wp_enqueue_script( 'cloux-ajax-user-script', get_template_directory_uri() . '/include/assets/js/user-box.js', array(), false, true );
		wp_localize_script( 'cloux-ajax-user-script', 'clouxuserajax', array( 'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ) ) );

		wp_add_inline_script( "cloux", "jQuery(document).ready(function($){
			$('.cloux-tabs, #bbpress-forums #bbp-single-user-details #bbp-user-navigation ul').flexMenu({linkText:'" . esc_html__( "More", "cloux" ) . "',linkTitle:'" . esc_html__( "View More", "cloux" ) . "',linkTextAll:'" . esc_html__( "Menu", "cloux" ) . "',linkTitleAll:'" . esc_html__( "Open/Close Menu", "cloux" ) . "'});
		});" );

		if( function_exists( 'vc_map' ) ) {
			wp_enqueue_style( 'prettyphoto' );
		}

		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/include/assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/include/assets/css/fontawesome.min.css' );
		wp_enqueue_style( 'scrollbar', get_template_directory_uri() . '/include/assets/css/scrollbar.min.css' );
		wp_enqueue_style( 'select', get_template_directory_uri() . '/include/assets/css/select-fx.min.css' );
		wp_enqueue_style( 'plyr-io', get_template_directory_uri() . '/include/assets/css/plyr.min.css' );
		wp_enqueue_style( 'slick', get_template_directory_uri() . '/include/assets/css/slick.min.css' );
		wp_enqueue_style( 'cloux', get_stylesheet_uri() );
	}
	add_action( 'wp_enqueue_scripts', 'cloux_scripts' );



	/*======
	*
	* Admin Scripts & Styles
	*
	======*/
	function cloux_admin_scripts() {
		wp_enqueue_style( 'cloux-admin-metabox', get_template_directory_uri() . '/include/customize/assets/css/metabox.css', false, '1.0' );
		wp_enqueue_script( 'cloux-admin-metabox', get_template_directory_uri() . '/include/customize/assets/js/metabox.js', false, '1.0' );

		if ( is_customize_preview() ) {
			wp_enqueue_style( 'cloux-admin-customize', get_template_directory_uri() . '/include/customize/assets/css/customize.css', false, '1.0' );
			wp_enqueue_script( 'cloux-admin-customize', get_template_directory_uri() . '/include/customize/assets/js/customize.js', false, '1.0' );
		}
	}
	add_action( 'admin_enqueue_scripts', 'cloux_admin_scripts' );



	/*======
	*
	* Demo Importer
	*
	======*/
	function cloux_demo_content() {
		return array(
			array(
				'import_file_name' => esc_html__( 'Import Demo Content', 'cloux' ),
				'import_file_url' => get_template_directory_uri() . '/include/demos/demo-content.xml',
				'import_widget_file_url' => get_template_directory_uri() . '/include/demos/widget-content.wie',
			),
		);
	}
	add_filter( 'pt-ocdi/import_files', 'cloux_demo_content' );



	/*======
	*
	* Body Classes
	*
	======*/
	function cloux_class_names( $classes ) {
		$classes[] = 'cloux-theme';
		return $classes;
	}
	add_filter( 'body_class', 'cloux_class_names' );



	/*======
	*
	* Excerpt More
	*
	======*/
	function cloux_excerpt_more( $more ) {
		return '...';
	}
	add_filter( 'excerpt_more', 'cloux_excerpt_more' );



	/*======
	*
	* Excerpt Support for Pages
	*
	======*/
	function cloux_excerpts_for_pages() {
		add_post_type_support( 'page', 'excerpt' );
	}
	add_action( 'init', 'cloux_excerpts_for_pages' );



	/*======
	*
	* Word Cutter
	*
	======*/
	function cloux_word_cutter( $string = "", $word_limit = "" ) {
		$words = explode( ' ', $string, ( $word_limit + 1 ) );
		if( count( $words ) > $word_limit ) {
			array_pop( $words );
		}
		return implode( ' ', $words );
	}



	/*======
	*
	* Loader
	*
	======*/
	function cloux_loader() {
		$cloux_loader_status = get_theme_mod( 'cloux_loader_status', '' );
		$cloux_loader_style = get_theme_mod( 'cloux_loader_style', 'style-1' );
		if( $cloux_loader_status == '1' ) {
			if( $cloux_loader_style == 'style-2' ) {
				echo '<div class="loader-wrapper loader-style-2">
						<div class="spinner">
							<div class="bounce1"></div>
							<div class="bounce2"></div>
							<div class="bounce3"></div>
						</div>
					  </div>';
			} elseif( $cloux_loader_style == 'style-3' ) {
				echo '<div class="loader-wrapper loader-style-3">
						<div class="spinner"></div>
					  </div>';
			} elseif( $cloux_loader_style == 'style-4' ) {
				echo '<div class="loader-wrapper loader-style-4">
						<div class="sk-fading-circle">
							<div class="sk-circle1 sk-circle"></div>
							<div class="sk-circle2 sk-circle"></div>
							<div class="sk-circle3 sk-circle"></div>
							<div class="sk-circle4 sk-circle"></div>
							<div class="sk-circle5 sk-circle"></div>
							<div class="sk-circle6 sk-circle"></div>
							<div class="sk-circle7 sk-circle"></div>
							<div class="sk-circle8 sk-circle"></div>
							<div class="sk-circle9 sk-circle"></div>
							<div class="sk-circle10 sk-circle"></div>
							<div class="sk-circle11 sk-circle"></div>
							<div class="sk-circle12 sk-circle"></div>
						</div>
					  </div>';
			} else {
				echo '<div class="loader-wrapper loader-style-1">
						<div class="spinner">
						  <div class="double-bounce1"></div>
						  <div class="double-bounce2"></div>
						</div>
					  </div>';
			}
		}
	}



	/*======
	*
	* Global Date Converter
	*
	======*/
	function cloux_global_date_converter( $date = "" ) {
		$date = date_i18n( get_option( 'date_format' ), strtotime( $date ) );
		return $date;
	}



	/*======
	*
	* Finding Slug
	*
	======*/
	function cloux_to_slug( $string ) {
		return strtolower( trim( preg_replace('/[^A-Za-z0-9-]+/', '-', $string ) ) );
	}



	/*======
	*
	* Finding Attachment ID from Guid
	*
	======*/
	if( ! function_exists( 'cloux_attachment_id' ) ) {
		function cloux_attachment_id( $url ) {
			$attachment_id = 0;
			$dir = wp_upload_dir();
			if ( false !== strpos( $url, $dir['baseurl'] . '/' ) ) { // Is URL in uploads directory?
				$file = basename( $url );
				$query_args = array(
					'post_type'   => 'attachment',
					'post_status' => 'inherit',
					'fields'      => 'ids',
					'meta_query'  => array(
						array(
							'value'   => $file,
							'compare' => 'LIKE',
							'key'     => '_wp_attachment_metadata',
						),
					)
				);
				$query = new WP_Query( $query_args );
				if ( $query->have_posts() ) {
					foreach ( $query->posts as $post ) {
						$meta = wp_get_attachment_metadata( $post );
						$original_file       = basename( $meta['file'] );
						$cropped_image_files = wp_list_pluck( $meta['sizes'], 'file' );
						if ( $original_file === $file || in_array( $file, $cropped_image_files ) ) {
							$attachment_id = $post;
							break;
						}
					}
				}
			}
			return $attachment_id;
		}
	}



	/*======
	*
	* Menus
	*
	======*/
	register_nav_menus( 
		array(
			'mainmenu' => esc_html__( 'Main Menu', 'cloux' ),
			'copyrightmenu' => esc_html__( 'Copyright Menu', 'cloux' ),
		)
	);



	/*======
	*
	* Menu Walker
	*
	======*/
	class cloux_walker extends Walker_Nav_Menu {
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
		}

		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$li_attributes = '';
			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			if ($args->has_children){
				$classes[] 		= 'dropdown';
				$li_attributes .= ' data-dropdown="dropdown"';
			}
			$classes[] = 'menu-item-' . $item->ID;
			$classes[] = ($item->current) ? 'active' : '';

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = ' class="nav-item ' . esc_attr( $class_names ) . '"';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="'    . esc_attr( $item->xfn ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="'   . esc_attr( $item->url ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' class="nav-link"' : '';
			$attributes .= ($args->has_children) ? ' ' : ''; 

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before;
				$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
				$item_output .= $args->link_after;
			$item_output .= ($args->has_children) ? '<i class="fas fa-chevron-down caret" aria-hidden="true"></i>' : '';
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
	        if ( ! $element )
	            return;
	        $id_field = $this->db_fields['id'];
	        // Display this element.
	        if ( is_object( $args[0] ) )
	           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
	        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	    }
	}



	/*======
	*
	* Search Form
	*
	======*/
	function cloux_search_form() {
		$output = '<form role="search" method="get" class="searchform" action="' . esc_url( home_url( '/' ) ) . '">
			<div class="search-form">
				<input type="text" value="' . esc_attr( get_search_query() ) . '" placeholder="' . esc_html__( 'Enter the keyword...', 'cloux' ) . '" name="s" class="searchform-text" />
				<button><i class="fas fa-search" aria-hidden="true"></i></button>
			</div>
		</form>';

		return $output;
	}



	/*======
	*
	* Social Media Sites
	*
	======*/
	function cloux_social_media_sites() {
		$social_sites = cloux_social_media_array_filter();

		foreach ( $social_sites as $social_site => $profile ) {
			if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
				$active_social_sites[ $social_site ] = $social_site;
			}
		}

		if ( ! empty( $active_social_sites ) ) {
			$output = '<ul class="social-links">';
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
						$label = esc_html__( 'Custom Link', 'cloux' );
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
						$output .= '</a>';
					$output .= '</li>';
				}
			$output .= '</ul>';

			return $output;
		}
	}



	/*======
	*
	* Social Share
	*
	======*/
	function cloux_social_share() {
		$output = "";
		$social_shares = cloux_social_share_array_filter();

		foreach ( $social_shares as $social_share => $value ) {
			if ( strlen( get_theme_mod( $social_share . '_share' ) ) == "1" ) {
				$active_share_sites[ $social_share . '_share' ] = $social_share . '_share';
			}
		}

		if ( !empty( $active_share_sites ) ) {
			$output = '<ul class="social-share-links">';
				foreach ( $active_share_sites as $key => $site ) {
					if ( $site == 'twitter' . '_share' ) {
						$label = esc_html__( 'Twitter', 'cloux' );
						$link = esc_url( 'https://twitter.com/intent/tweet?url=' . get_the_permalink() . '&text=' . urlencode( get_the_title() ) );
						$icon_class = 'fab fa-twitter';
						$icon_name = 'twitter';
					} elseif ( $site == 'facebook' . '_share' ) {
						$label = esc_html__( 'Facebook', 'cloux' );
						$link = esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink() . '&t=' . urlencode( get_the_title() ) );
						$icon_class = 'fab fa-facebook-f';
						$icon_name = 'facebook';
					} elseif ( $site == 'google-plus' . '_share' ) {
						$label = esc_html__( 'Google+', 'cloux' );
						$link = esc_url( 'https://plus.google.com/share?url=' . get_the_permalink() );
						$icon_class = 'fab fa-google-plus-g';
						$icon_name = 'google-plus';
					} elseif ( $site == 'linkedin' . '_share' ) {
						$label = esc_html__( 'LinkedIn', 'cloux' );
						$link = esc_url( 'https://www.linkedin.com/shareArticle?mini=true&amp;url=' . get_the_permalink() . '&title=' . urlencode( get_the_title() ) );
						$icon_class = 'fab fa-linkedin-in';
						$icon_name = 'linkedin';
					} elseif ( $site == 'pinterest' . '_share' ) {
						$label = esc_html__( 'Pinterest', 'cloux' );
						$link = esc_url( 'https://pinterest.com/pin/create/button/?url=' . get_the_permalink() . '&description=' . urlencode( get_the_title() ) );
						$icon_class = 'fab fa-pinterest-p';
						$icon_name = 'pinterest';
					} elseif ( $site == 'reddit' . '_share' ) {
						$label = esc_html__( 'Reddit', 'cloux' );
						$link = esc_url( 'https://reddit.com/submit?url=' . get_the_permalink() . '&title=' . urlencode( get_the_title() ) );
						$icon_class = 'fab fa-reddit-alien';
						$icon_name = 'reddit';
					} elseif ( $site == 'delicious' . '_share' ) {
						$label = esc_html__( 'Delicious', 'cloux' );
						$link = esc_url( 'https://del.icio.us/post?url=' . get_the_permalink() );
						$icon_class = 'fab fa-delicious';
						$icon_name = 'delicious';
					} elseif ( $site == 'stumbleupon' . '_share' ) {
						$label = esc_html__( 'Stumbleupon', 'cloux' );
						$link = esc_url( 'https://www.stumbleupon.com/submit?url=' . get_the_permalink() . '&title=' . get_the_title() );
						$icon_class = 'fab fa-stumbleupon';
						$icon_name = 'stumbleupon';
					} elseif ( $site == 'tumblr' . '_share' ) {
						$label = esc_html__( 'Tumblr', 'cloux' );
						$link = esc_url( 'https://www.tumblr.com/share/link?url=' . get_the_permalink() );
						$icon_class = 'fab fa-tumblr';
						$icon_name = 'tumblr';
					} elseif ( $site == 'whatsapp' . '_share' ) {
						$label = esc_html__( 'WhatsApp', 'cloux' );
						$link = 'whatsapp://send?text=' . get_the_permalink();
						$icon_class = 'fab fa-whatsapp';
						$icon_name = 'whatsapp';
					} elseif ( $site == 'mail' . '_share' ) {
						$label = esc_html__( 'Email', 'cloux' );
						$link = 'mailto:' . get_the_permalink();
						$icon_class = 'far fa-envelope';
						$icon_name = 'envelope';
					}

					$link_name = $icon_name;
					$label = ucfirst( $label );

					if( is_single() or is_page() ) {
						$post = get_the_ID();						
					} else {
						$post = "";
					}

					if( $site == 'mail' . '_share' ) {
						$target = "_self";
					} else {
						$target = "_blank";
					}

					$output .='<li class="' . esc_attr( $link_name ) . '">';
						$output .= '<a href="' . $link . '" class="' . esc_attr( $link_name ) . '" title="' . esc_attr( $label ) . '" target="' . esc_attr( $target ) . '">';
							$output .= '<i class="' . esc_attr( $icon_class ) . '"></i>';
							$output .= '<span>' . esc_html__( 'Share on', 'cloux' ) . ' ' . esc_attr( $label ) . '</span>';
						$output .= '</a>';
					$output .= '</li>';
				}
			$output .= '</ul>';
		}

		return $output;
	}



	/*======
	*
	* Social Links of Authors
	*
	======*/
	function cloux_user_social_links( $user_id = "" ) {
		$user_social_sites = array(
			'facebook' => 'cloux_user_facebook_url',
			'twitter' => 'cloux_user_twitter_url',
			'google-plus' => 'cloux_user_googleplus_url',
			'pinterest' => 'cloux_user_pinterest_url',
			'linkedin' => 'cloux_user_linkedin_url',
			'youtube' => 'cloux_user_youtube_url',
			'vimeo' => 'cloux_user_vimeo_url',
			'tumblr' => 'cloux_user_tumblr_url',
			'instagram' => 'cloux_user_instagram_url',
			'flickr' => 'cloux_user_flickr_url',
			'dribbble' => 'cloux_user_dribbble_url',
			'reddit' => 'cloux_user_reddit_url',
			'soundcloud' => 'cloux_user_soundcloud_url',
			'spotify' => 'cloux_user_spotify_url',
			'yahoo' => 'cloux_user_yahoo_url',
			'behance' => 'cloux_user_behance_url',
			'codepen' => 'cloux_user_codepen_url',
			'delicious' => 'cloux_user_delicious_url',
			'stumbleupon' => 'cloux_user_stumbleupon_url',
			'deviantart' => 'cloux_user_deviantart_url',
			'digg' => 'cloux_user_digg_url',
			'github' => 'cloux_user_github_url',
			'medium' => 'cloux_user_medium_url',
			'steam' => 'cloux_user_steam_url',
			'vk' => 'cloux_user_vk_url',
			'500px' => 'cloux_user_500px_url',
			'foursquare' => 'cloux_user_foursquare_url',
			'slack' => 'cloux_user_slack_url',
			'whatsapp' => 'cloux_user_whatsapp_url',
			'skype' => 'cloux_user_skype_url',
			'twitch' => 'cloux_user_twitch_url',
			'paypal' => 'cloux_user_paypal_url',
			'custom-url' => 'cloux_user_custom_url',
		);

		foreach ( $user_social_sites as $user_social_site => $value ) {
			$active_sites[] = get_the_author_meta( $user_social_site, $user_id );
		}

		if( !empty( $active_sites ) ) {
			$output = '<div class="user-social-links">';
				$output .= '<ul>';
					foreach ( $user_social_sites as $user_social_site => $value ) {
						$label = ucfirst( $user_social_site );
						$icon_class = 'fa-' . esc_attr( $user_social_site );

						if ( $user_social_site == 'twitter' ) {
							$label = esc_html__( 'Twitter', 'cloux' );
							$icon_name = 'twitter';
						} elseif ( $user_social_site == 'facebook' ) {
							$label = esc_html__( 'Facebook', 'cloux' );
							$icon_name = 'facebook';
							$icon_class = 'fa-facebook-f';
						} elseif ( $user_social_site == 'google-plus' ) {
							$label = esc_html__( 'Google Plus', 'cloux' );
							$icon_name = 'google-plus';
							$icon_class = 'fa-google-plus-g';
						} elseif ( $user_social_site == 'pinterest' ) {
							$label = esc_html__( 'Pinterest', 'cloux' );
							$icon_name = 'pinterest';
							$icon_class = 'fa-pinterest-p';
						} elseif ( $user_social_site == 'youtube' ) {
							$label = esc_html__( 'YouTube', 'cloux' );
							$icon_name = 'youtube';
						} elseif ( $user_social_site == 'vimeo' ) {
							$label = esc_html__( 'Vimeo', 'cloux' );
							$icon_name = 'vimeo';
							$icon_class = 'fa-vimeo-v';
						} elseif ( $user_social_site == 'tumblr' ) {
							$label = esc_html__( 'Tumblr', 'cloux' );
							$icon_name = 'tumblr';
						} elseif ( $user_social_site == 'instagram' ) {
							$label = esc_html__( 'Instagram', 'cloux' );
							$icon_name = 'instagram';
						} elseif ( $user_social_site == 'flickr' ) {
							$label = esc_html__( 'Flickr', 'cloux' );
							$icon_name = 'flickr';
						} elseif ( $user_social_site == 'dribbble' ) {
							$label = esc_html__( 'Dribbble', 'cloux' );
							$icon_name = 'dribbble';
						} elseif ( $user_social_site == 'reddit' ) {
							$label = esc_html__( 'Reddit', 'cloux' );
							$icon_name = 'reddit';
							$icon_class = 'fa-reddit-alien';
						} elseif ( $user_social_site == 'soundcloud' ) {
							$label = esc_html__( 'SoundCloud', 'cloux' );
							$icon_name = 'soundcloud';
						} elseif ( $user_social_site == 'spotify' ) {
							$label = esc_html__( 'Spotify', 'cloux' );
							$icon_name = 'spotify';
						} elseif ( $user_social_site == 'yahoo' ) {
							$label = esc_html__( 'Yahoo', 'cloux' );
							$icon_name = 'yahoo';
						} elseif ( $user_social_site == 'behance' ) {
							$label = esc_html__( 'Behance', 'cloux' );
							$icon_name = 'behance';
						} elseif ( $user_social_site == 'delicious' ) {
							$label = esc_html__( 'Delicious', 'cloux' );
							$icon_name = 'delicious';
						} elseif ( $user_social_site == 'stumbleupon' ) {
							$label = esc_html__( 'Stumbleupon', 'cloux' );
							$icon_name = 'stumbleupon';
						} elseif ( $user_social_site == 'deviantart' ) {
							$label = esc_html__( 'DeviantArt', 'cloux' );
							$icon_name = 'deviantart';
						} elseif ( $user_social_site == 'digg' ) {
							$label = esc_html__( 'Digg', 'cloux' );
							$icon_name = 'digg';
						} elseif ( $user_social_site == 'github' ) {
							$label = esc_html__( 'GitHub', 'cloux' );
							$icon_name = 'github';
						} elseif ( $user_social_site == 'medium' ) {
							$label = esc_html__( 'Medium', 'cloux' );
							$icon_name = 'medium';
							$icon_class = 'fa-medium-m';
						} elseif ( $user_social_site == 'steam' ) {
							$label = esc_html__( 'Steam', 'cloux' );
							$icon_name = 'steam';
							$icon_class = 'fa-steam-symbol';
						} elseif ( $user_social_site == 'vk' ) {
							$label = esc_html__( 'VK', 'cloux' );
							$icon_name = 'vk';
						} elseif ( $user_social_site == '500px' ) {
							$label = esc_html__( '500px', 'cloux' );
							$icon_name = '500px';
						} elseif ( $user_social_site == 'foursquare' ) {
							$label = esc_html__( 'Foursquare', 'cloux' );
							$icon_name = 'foursquare';
						} elseif ( $user_social_site == 'slack' ) {
							$label = esc_html__( 'Slack', 'cloux' );
							$icon_name = 'slack';
							$icon_class = 'fa-slack-hash';
						} elseif ( $user_social_site == 'whatsapp' ) {
							$label = esc_html__( 'WhatsApp', 'cloux' );
							$icon_name = 'whatsapp';
						} elseif ( $user_social_site == 'twitch' ) {
							$label = esc_html__( 'Twitch', 'cloux' );
							$icon_name = 'twitch';
						} elseif ( $user_social_site == 'paypal' ) {
							$label = esc_html__( 'PayPal', 'cloux' );
							$icon_name = 'paypal';
						} elseif ( $user_social_site == 'codepen' ) {
							$label = esc_html__( 'CodePen', 'cloux' );
							$icon_name = 'codepen';
						} elseif ( $user_social_site == 'linkedin' ) {
							$label = esc_html__( 'LinkedIn', 'cloux' );
							$icon_name = 'linkedin';
							$icon_class = 'fa-linkedin-in';
						} elseif ( $user_social_site == 'custom-url' ) {
							$label = esc_html__( 'Link', 'cloux' );
							$icon_name = 'link';
							$icon_class = 'fas fa-external-link-alt';
						}

						$user_social_site = get_the_author_meta( $user_social_site, $user_id );
						if( !empty( $user_social_site ) ) {
							$output .= '<li><a href="' . esc_url( $user_social_site ) . '" title="' . esc_attr( $label ) . '" target="_blank"><i class="fab ' . esc_attr( $icon_class ) . '"></i></a></li>';
						}
					}
				$output .= '</ul>';
			$output .= '</div>';
			return $output;
		}
	}


/*======
*
* Comment List Template
*
======*/
	function cloux_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
		?>
			<<?php echo esc_attr( $tag ) ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
			
			<?php if ( 'div' != $args['style'] ) { ?>
				<div id="div-comment-<?php comment_ID() ?>" class="comment-wrapper">
			<?php } ?>
				<div class="comment-image">
					<?php $user = get_user_by( 'email', $comment->comment_author_email ); ?>
					<?php if ( $args['avatar_size'] != 0 ) { echo get_avatar( $comment, $args['avatar_size'] ); } ?>
				</div>

				<div class="comment-content">
					<div class="comment-author">
						<?php
							$author_control = get_comment_author();
							if( !empty( $author_control ) ) {
								echo get_comment_author(); 
							}
						?>
					</div>

					<?php if ( $comment->comment_approved == '0' ) { ?>
						<p class="moderation-message"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'cloux' ); ?></p>
					<?php } ?>

					<?php comment_text(); ?>

					<div class="comment-info">
						<div class="item comment-meta commentmetadata">
							<i class="far fa-clock" aria-hidden="true"></i>
							<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
								<?php printf( esc_html__( '%1$s', 'cloux' ), get_comment_date(),  get_comment_time() ); ?>
							</a>
						</div>
						
						<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => '<div class="item reply"><i class="fas fa-reply" aria-hidden="true"></i>', 'after' => '</div>' ) ) ); ?>
						
						<?php edit_comment_link( esc_html__( 'Edit', 'cloux' ), '<div class="item edit"><i class="fas fa-pencil-alt" aria-hidden="true"></i>', '</div>' ); ?>
					</div>
				</div>

			<?php if ( 'div' != $args['style'] ) { ?>
				</div>
			<?php }
	}



	/*======
	*
	* WooCommerce Support
	*
	======*/
	if( class_exists( 'Woocommerce' ) ) {
		function cloux_woocommerce_support() {
			add_theme_support( 'woocommerce' );
		}
		add_action( 'after_setup_theme', 'cloux_woocommerce_support' );
	}



	/*======
	*
	* Sidebars
	*
	======*/
	if( !function_exists( 'cloux_sidebars_init' ) ) {
		function cloux_sidebars_init() {
			register_sidebar(
				array(
					'id' => 'cloux-sidebar',
					'name' => esc_html__( 'General Sidebar', 'cloux' ),
					'before_widget' => '<div id="%1$s" class="cloux-sidebar-wrap widget-box %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<div class="widget-title cloux-title style-4">',
					'after_title' => '</div>',
				)
			);

			register_sidebar(
				array(
					'id' => 'cloux-shop-sidebar',
					'name' => esc_html__( 'Shop Sidebar', 'cloux' ),
					'before_widget' => '<div id="%1$s" class="cloux-sidebar-wrap widget-box %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<div class="widget-title cloux-title style-4">',
					'after_title' => '</div>',
				)
			);

			register_sidebar(
				array(
					'id' => 'cloux-bbpress-sidebar',
					'name' => esc_html__( 'bbPress Sidebar', 'cloux' ),
					'before_widget' => '<div id="%1$s" class="cloux-sidebar-wrap widget-box %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<div class="widget-title cloux-title style-4">',
					'after_title' => '</div>',
				)
			);
		}
	}
	add_action( 'widgets_init', 'cloux_sidebars_init' );



	/*======
	*
	* WooCommerce Sidebar
	*
	======*/
	function cloux_woo_sidebar( $classes ) {
		if ( function_exists( 'is_woocommerce' ) ) {
			if( is_woocommerce() ) {
				$sidebar_position = get_theme_mod( 'cloux_woo_sidebar_position', 'no-sidebar' );
				if( !empty( $sidebar_position ) ) {
					$classes[] = 'cloux-woo-' . esc_attr( $sidebar_position );
				}
			}
		}
		return $classes;
	}
	add_filter( 'body_class', 'cloux_woo_sidebar' );



	/*======
	*
	* bbPress Sidebar
	*
	======*/
	function cloux_bbpress_sidebar( $classes ) {
		if ( function_exists( 'is_bbpress' ) ) {
			if( is_bbpress() ) {
				$sidebar_position = get_theme_mod( 'cloux_bbpress_sidebar_position', 'no-sidebar' );
				if( !empty( $sidebar_position ) ) {
					$classes[] = 'cloux-bbpress-' . esc_attr( $sidebar_position );
				}
			}
		}
		return $classes;
	}
	add_filter( 'body_class', 'cloux_bbpress_sidebar' );



	/*======
	*
	* Sidebar & Wrapper Layouts
	*
	======*/
	function cloux_content_before() {
		if( is_category() ) {
			$sidebar_position = get_theme_mod( 'cloux_archives_categories_sidebar_position', 'right-sidebar' );
		} elseif( is_search() ) {
			$sidebar_position = get_theme_mod( 'cloux_archives_searches_sidebar_position', 'right-sidebar' );
		} elseif( is_tag() ) {
			$sidebar_position = get_theme_mod( 'cloux_archives_tags_sidebar_position', 'right-sidebar' );
		} elseif( is_author() ) {
			$sidebar_position = get_theme_mod( 'cloux_archives_authors_sidebar_position', 'right-sidebar' );
		} elseif ( get_post_type( get_the_ID() ) == 'esport-player' or is_post_type_archive( 'esport-player' ) ) {
			$sidebar_position = get_theme_mod( 'cloux_esport_players_sidebar_position', 'no-sidebar' );
		} elseif ( get_post_type( get_the_ID() ) == 'esport-fixture' or is_post_type_archive( 'esport-fixture' ) ) {
			$sidebar_position = get_theme_mod( 'cloux_esport_fixture_sidebar_position', 'no-sidebar' );
		} elseif ( is_post_type_archive( 'game' ) or is_tax( 'genre' ) or is_tax( 'game-category' ) or is_tax( 'game-tag' ) or is_tax( 'company' ) or is_tax( 'platform' ) or is_tax( 'os' ) or is_tax( 'mode' ) or is_tax( 'language' ) ) {
			$sidebar_position = get_theme_mod( 'cloux_games_archive_sidebar_position', 'right-sidebar' );
		} elseif( is_archive() ) {
			$sidebar_position = get_theme_mod( 'cloux_archives_archives_sidebar_position', 'right-sidebar' );
		} elseif( is_attachment() ) {
			$sidebar_position = get_theme_mod( 'cloux_archives_attachments_sidebar_position', 'no-sidebar' );
		} elseif( is_single() ) {
			$sidebar_position = get_theme_mod( 'cloux_posts_sidebar_position', 'right-sidebar' );
		} elseif( is_page() ) {
			$sidebar_position = get_theme_mod( 'cloux_pages_sidebar_position', 'no-sidebar' );
		} else {
			$sidebar_position = get_theme_mod( 'cloux_general_sidebar_position', 'right-sidebar' );
		}

		if( is_single() or is_page() ) {
			$custom_sidebar_position = get_post_meta( get_the_ID(), 'sidebar-position', true );
			if( !empty( $custom_sidebar_position ) ) {
				$sidebar_position = $custom_sidebar_position;
			}
		}

		if( $sidebar_position == 'no-sidebar' ) {
			echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left-layout">';
		}
		
		elseif( $sidebar_position == 'left-sidebar' ) {
			echo '<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 left-layout sidebar-align-right">';
		}
		
		elseif( $sidebar_position == 'right-sidebar' ) {
			echo '<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 left-layout">';
		}
		
		else {
			echo '<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 left-layout">';
		}
	}

	function cloux_content_after() {
		echo '</div>';
	}

	function cloux_sidebar_before() {
		if( is_category() ) {
			$sidebar_position = get_theme_mod( 'cloux_archives_categories_sidebar_position', 'right-sidebar' );
		} elseif( is_search() ) {
			$sidebar_position = get_theme_mod( 'cloux_archives_searches_sidebar_position', 'right-sidebar' );
		} elseif( is_tag() ) {
			$sidebar_position = get_theme_mod( 'cloux_archives_tags_sidebar_position', 'right-sidebar' );
		} elseif( is_author() ) {
			$sidebar_position = get_theme_mod( 'cloux_archives_authors_sidebar_position', 'right-sidebar' );
		} elseif ( get_post_type( get_the_ID() ) == 'esport-player' or is_post_type_archive( 'esport-player' ) ) {
			$sidebar_position = get_theme_mod( 'cloux_esport_players_sidebar_position', 'no-sidebar' );
		} elseif ( get_post_type( get_the_ID() ) == 'esport-fixture' or is_post_type_archive( 'esport-fixture' ) ) {
			$sidebar_position = get_theme_mod( 'cloux_esport_fixture_sidebar_position', 'no-sidebar' );
		} elseif ( is_post_type_archive( 'game' ) or is_tax( 'genre' ) or is_tax( 'game-category' ) or is_tax( 'game-tag' ) or is_tax( 'company' ) or is_tax( 'platform' ) or is_tax( 'os' ) or is_tax( 'mode' ) or is_tax( 'language' ) ) {
			$sidebar_position = get_theme_mod( 'cloux_games_archive_sidebar_position', 'right-sidebar' );
		} elseif( is_archive() ) {
			$sidebar_position = get_theme_mod( 'cloux_archives_archives_sidebar_position', 'right-sidebar' );
		} elseif( is_attachment() ) {
			$sidebar_position = get_theme_mod( 'cloux_archives_attachments_sidebar_position', 'no-sidebar' );
		} elseif( is_single() ) {
			$sidebar_position = get_theme_mod( 'cloux_posts_sidebar_position', 'right-sidebar' );
		} elseif( is_page() ) {
			$sidebar_position = get_theme_mod( 'cloux_pages_sidebar_position', 'no-sidebar' );
		} else {
			$sidebar_position = get_theme_mod( 'cloux_general_sidebar_position', 'right-sidebar' );
		}

		if( is_single() or is_page() ) {
			$custom_sidebar_position = get_post_meta( get_the_ID(), 'sidebar-position', true );
			if( !empty( $custom_sidebar_position ) ) {
				$sidebar_position = $custom_sidebar_position;
			}
		}
		
		if( $sidebar_position == 'no-sidebar' ) {
			echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide">';
		}
		
		elseif( $sidebar_position == 'left-sidebar' ) {
			echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 right-layout sidebar-align-left fixed-sidebar">';
		}
		
		elseif( $sidebar_position == 'right-sidebar' ) {
			echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 right-layout fixed-sidebar">';
		}
		
		else {
			echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 right-layout fixed-sidebar">';
		}
	}

	function cloux_sidebar_after() {
		echo '</div>';
	}



	/*======
	*
	* Theme Wrapper
	*
	======*/
	function cloux_wrapper_before() {
		echo '<div class="cloux-wrapper" id="cloux-wrapper">';
	}

	function cloux_wrapper_after() {
		echo '</div>';
	}



	/*======
	*
	* Row Wrapper
	*
	======*/
	function cloux_row_before( $extra_class = "", $echo = "true" ) {
		if( !empty( $extra_class ) ) {
			$extra_class = ' ' . $extra_class;
		}

		if( $echo == "true" ) {
			echo '<div class="row' . $extra_class . '">';
		} else {
			$output = '<div class="row' . $extra_class . '">';
			return $output;
		}
	}

	function cloux_row_after( $echo = "true" ) {
		if( $echo == "true" ) {
			echo '</div>';
		} else {
			$output = '</div>';
			return $output;
		}
	}



	/*======
	*
	* Container Wrapper
	*
	======*/
	function cloux_container_before( $extra_class = "", $echo = "true" ) {
		if( !empty( $extra_class ) ) {
			$extra_class = ' ' . $extra_class;
		}

		if( $echo == "true" ) {
			echo '<div class="container' . $extra_class . '">';
		} else {
			$output = '<div class="container' . $extra_class . '">';
			return $output;
		}
	}

	function cloux_container_after( $echo = "true" ) {
		if( $echo == "true" ) {
			echo '</div>';
		} else {
			$output = '</div>';
			return $output;
		}
	}



	/*======
	*
	* Fluid Container Wrapper
	*
	======*/
	function cloux_fluid_container_before( $extra_class = "" ) {
		if( !empty( $extra_class ) ) {
			$extra_class = ' ' . $extra_class;
		}
		echo '<div class="fluid-container' . $extra_class . '">';
	}

	function cloux_fluid_container_after() {
		echo '</div>';
	}



	/*======
	*
	* User Box Forms to Footer
	*
	======*/
	function cloux_user_box_forms() {
		?>
		<div class="cloux-modal login-modal inner inner-wxs">
			<div class="modal-color modal-color-a"></div>
			<div class="modal-color modal-color-b"></div>
			<div class="cloux-modal-content">
				<div class="cloux-close"></div>
				<div class="content-inner">
					<?php echo cloux_title( $title = esc_html__( 'Login', 'cloux' ), $style = "style-3", $align = "center" ); ?>
					<form id="cloux_login_form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
						<div class="item form-item">
							<input class="required" name="cloux_username" type="text" placeholder="<?php echo esc_html__( 'Username', 'cloux' ); ?>" />
						</div>
						<div class="item form-item">
							<input class="required" name="cloux_user_pass" id="cloux_user_pass" type="password" placeholder="<?php echo esc_html__( 'Password', 'cloux' ); ?>" />
						</div>
						<div class="item form-item">
							<input type="checkbox" value="None" id="login-remember-me" class="cloux-checkbox" name="cloux_remember_me" />
							<label for="login-remember-me" class="cloux-label">
								<?php echo esc_html__( 'Remember Me', 'cloux' ); ?>
							</label>
						</div>
						<div class="item form-item">
							<input type="hidden" name="action" value="cloux_login"/>
							<button data-loading-text="<?php echo esc_html__( 'Loading...', 'cloux' ); ?>" type="submit">
								<?php echo esc_html__( 'Sign in', 'cloux' ); ?>
							</button>
						</div>
						<div class="item links">
							<a href="<?php echo wp_lostpassword_url( get_permalink() ); ?>">
								<?php echo esc_html__( 'Lost Password?', 'cloux' ); ?>
							</a>
							<a id="signup-popup" class="create-an-account">
								<?php echo esc_html__( 'Create an Account', 'cloux' ) ?>
							</a>
						</div>
						<?php wp_nonce_field( 'ajax-login-nonce', 'login-security' ); ?>
					</form>
					<div class="cloux-errors"></div>
					<div class="cloux_loading">
						<i class="fas fa-spinner fa-spin"></i>
						<?php echo esc_html__( 'Loading...', 'cloux' ) ?>
					</div>
				</div>
			</div>
		</div>

		<div class="cloux-modal signup-modal inner inner-wxs">
			<div class="modal-color modal-color-a"></div>
			<div class="modal-color modal-color-b"></div>
			<div class="cloux-modal-content">
				<div class="cloux-close"></div>
					<div class="content-inner">
					<?php echo cloux_title( $title = esc_html__( 'Sign Up', 'cloux' ), $style = "style-3", $align = "center" ); ?>
					<?php
						if( get_option("users_can_register") == "0" ) {
							echo '<p class="users-register-text text-center">' . esc_html__( 'New membership are not allowed.', 'cloux' ) . '</p>';
						} else {
					?>
						<form id="cloux_registration_form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="POST">
							<div class="item form-item">
								<input class="required" name="cloux_username" placeholder="<?php echo esc_html__( 'Username', 'cloux' ); ?>" type="text"/>
							</div>
							<div class="item form-item">
								<input class="required" name="cloux_user_email" id="cloux_user_email" placeholder="<?php echo esc_html__( 'Email', 'cloux' ); ?>" type="email"/>
							</div>
							<?php
								$signup_text = get_theme_mod( 'cloux_signup_text' );
								if( !empty( $signup_text ) ) {
									echo '<div class="item form-item">' . $signup_text  . '</div>';
								}
							?>
							<div class="item">
								<input type="hidden" name="action" value="cloux_register"/>
								<button data-loading-text="<?php echo esc_html__( 'Loading...', 'cloux' ) ?>" type="submit"><?php echo esc_html__( 'Be Member', 'cloux' ); ?></button>
							</div>
							<?php wp_nonce_field( 'ajax-login-nonce', 'register-security' ); ?>
						</form>
						<div class="cloux-errors"></div>
					<?php } ?>
					<div class="cloux_loading">
						<i class="fas fa-spinner fa-spin"></i>
						<?php echo esc_html__( 'Loading...', 'cloux' ) ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	add_action( 'wp_footer', 'cloux_user_box_forms' );



	/*======
	*
	* Site Logo
	*
	======*/
	function cloux_site_logo() {
		$output = "";

		$logo = get_theme_mod( 'cloux_header_logo' );

		$logo_height = get_theme_mod( 'cloux_header_logo_height' );
		if( !empty( $logo_height ) ) {
			$logo_height = 'height="' . esc_attr( $logo_height ) . '"';
		}

		$logo_width = get_theme_mod( 'cloux_header_logo_width' );
		if( !empty( $logo_width ) ) {
			$logo_width = 'width="' . esc_attr( $logo_width ) . '"';
		}

		if( !$logo == ""  ) {
			$output .= '<div class="logo">';
				$output .= '<a href="' . esc_url( home_url( '/' ) ) . '" class="site-logo" title="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
					$output .= '<img alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" src="' . esc_url( wp_get_attachment_url( $logo ) ) . '" ' . $logo_height . $logo_width . ' />';
				$output .= '</a>';
			$output .= '</div>';
		} else {
			$output .= '<div class="logo">';
				$output .= '<a href="' . esc_url( home_url( '/' ) ) . '" class="site-logo site-logo-texted" title="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
					$output .= esc_attr( get_bloginfo( 'name' ) );
				$output .= '</a>';
			$output .= '</div>';
		}

		return $output;
	}



	/*======
	*
	* Alternative Site Logo
	*
	======*/
	function cloux_site_alternative_logo() {
		echo '<div class="header-logo header-alternative-logo">';
			$logo = get_theme_mod( 'cloux_header_alternative_logo' );

			$logo_height = get_theme_mod( 'cloux_header_logo_height' );
			if( !empty( $logo_height ) ) {
				$logo_height = 'height="' . esc_attr( $logo_height ) . '"';
			}

			$logo_width = get_theme_mod( 'cloux_header_logo_width' );
			if( !empty( $logo_width ) ) {
				$logo_width = 'width="' . esc_attr( $logo_width ) . '"';
			}

			if( !$logo == ""  ) {
				echo '<div class="logo">';
					echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="site-logo" title="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
						echo '<img alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" src="' . esc_url( wp_get_attachment_url( $logo ) ) . '" ' . $logo_height . $logo_width . ' />';
					echo '</a>';
				echo '</div>';
			} else {
				echo '<div class="logo">';
					echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="site-logo site-logo-texted" title="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
						echo esc_attr( get_bloginfo( 'name' ) );
					echo '</a>';
				echo '</div>';
			}
		echo '</div>';
	}




	/*======
	*
	* Header Elements
	*
	======*/
	function cloux_header_elements( $search = "true", $social = "true", $userbox = "true" ) {
		$header_social_media = get_theme_mod( 'cloux_header_social_media', '1' );
		$header_search = get_theme_mod( 'cloux_header_search' );
		$header_user_panel = get_theme_mod( 'cloux_header_user_panel', '1' );

		if( $header_user_panel == "1" or $header_search == "1" or $header_social_media == "1" ) {
			if( $search == "true" or $social == "true" or $userbox == "true" ) {
				echo '<div class="elements">';
					if( $search == "true" and $header_search == "1" ) {
						echo '<div class="search">';
							echo '<i class="fas fa-search open-button" aria-hidden="true"></i>';
							echo '<div class="cloux-modal modal-search inner inner-ws">';
								echo '<div class="modal-color modal-color-a"></div>';
								echo '<div class="modal-color modal-color-b"></div>';
								echo '<div class="cloux-modal-content search-content">';
									echo '<div class="cloux-close"></div>';
									echo '<div class="content-inner">';
										echo cloux_title( $title = esc_html__( 'Search', 'cloux' ), $style = "style-3", $align = "center" );
										echo cloux_search_form();
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}

					if( $social == "true" and $header_social_media == "1" ) {
						echo cloux_social_media_sites();
					}

					if( $userbox == "true" and $header_user_panel == "1" ) {
						echo '<div class="user-box">';
							if( ! is_user_logged_in() ) {
								echo '<a class="login-popup" title="' . esc_html__( 'Login', 'cloux' ) . '">' . esc_html__( 'Login', 'cloux' ) . '</a>';
								echo '<a class="signup-popup"  title="' . esc_html__( 'Sign Up', 'cloux' ) . '">' . esc_html__( 'Sign Up', 'cloux' ) . '</a>';
							} else {
								$current_user = wp_get_current_user();
								if( !empty( $current_user->ID ) ) {
									$loggined_user_id = $current_user->ID;
									echo '<a href="' . esc_url( get_edit_user_link( $loggined_user_id ) ) . '" class="login-links" title="' . esc_html__( 'Profile', 'cloux' ) . '">' . esc_html__( 'Profile', 'cloux' ) . '</a>';
									echo '<a href="' . esc_url( wp_logout_url( home_url( '/' ) ) ) . '" class="login-links" title="' . esc_html__( 'Logout', 'cloux' ) . '">' . esc_html__( 'Log Out', 'cloux' ) . '</a>';
								}
							}
						echo '</div>';
					}
				echo '</div>';
			}
		}
	}



	/*======
	*
	* Header
	*
	======*/
	function cloux_header() {
		$header_status = get_theme_mod( 'cloux_header_status', '1' );
		$header_status_default = get_theme_mod( 'cloux_header_status', '1' );
		$header_style = get_theme_mod( 'cloux_header_general_style', 'style-1' );
		$header_style_default = get_theme_mod( 'cloux_header_general_style', 'style-1' );

		if ( !$header_status_default == '' or $header_status_default == '1' ) {
			/*====== Post & Page Header Selector ======*/
			if ( is_page() or is_single() ) {
				global $post;
				$header_status = get_post_meta( $post->ID, 'hide-header', true );
				if( empty( $header_status ) ) {
					$header_status = $header_status_default;
				}

				$header_style = get_post_meta( $post->ID, 'header-style', true );
				if( empty( $header_style ) ) {
					$header_style = $header_style_default;
				}
			}
			else {
				$header_status = $header_status_default;
				$header_style = $header_style_default;
			}



			/*====== Header Styles ======*/
				/*====== Style 1 ======*/
				function cloux_navbar_style_1() {
					echo '<nav class="cloux-navbar style-1">';
						wp_nav_menu(
							array(
								'menu' => 'mainmenu',
								'theme_location' => 'mainmenu',
								'depth' => 5,
								'menu_class' => 'navbar-menu',
								'fallback_cb' => 'cloux_walker::fallback',
								'walker' => new cloux_walker()
							)
						);
					echo '</nav>';			
				}



			/*====== Header Styles ======*/
				/*====== Style 1 ======*/
				function cloux_header_style_1() {
					$header_position = get_theme_mod( 'cloux_header_general_position', 'position-2' );
					if( empty( $header_position ) ) {
						$header_position = "position-1";
					}

					if ( is_page() or is_single() ) {
						global $post;
						$single_header_position = get_post_meta( $post->ID, 'header-position', true );
						if( !empty( $single_header_position ) ) {
							$header_position = $single_header_position;
						}
					}

					$header_fixed = get_theme_mod( 'cloux_header_fixed', '1' );
					if( $header_fixed == "1" ) {
						$fixed = " ";
					} else {
						$fixed = "";
					}

					echo '<header class="cloux-header style-1 ' . $header_position . $fixed . '">';
						cloux_container_before( 'd-flex justify-content-between align-items-center' );
							if( $header_position == "position-2" ) {
								cloux_site_alternative_logo();
							} else {
								echo cloux_site_logo();
							}
							echo '<div class="contents">';
								cloux_header_elements();
								cloux_navbar_style_1();
							echo '</div>';
						cloux_container_after();
					echo '</header>';
				}



				/*====== Style 2 ======*/
				function cloux_header_style_2() {
					$header_position = get_theme_mod( 'cloux_header_general_position', 'position-2' );
					if( empty( $header_position ) ) {
						$header_position = "position-1";
					}

					if ( is_page() or is_single() ) {
						global $post;
						$single_header_position = get_post_meta( $post->ID, 'header-position', true );
						if( !empty( $single_header_position ) ) {
							$header_position = $single_header_position;
						}
					}

					$header_fixed = get_theme_mod( 'cloux_header_fixed', '1' );
					if( $header_fixed == "1" ) {
						$fixed = "";
					} else {
						$fixed = "";
					}

					echo '<header class="cloux-header style-2 ' . $header_position . $fixed . '">';
						cloux_fluid_container_before( 'd-flex justify-content-between align-items-center' );
							if( $header_position == "position-2" ) {
								cloux_site_alternative_logo();
							} else {
								echo cloux_site_logo();
							}
							cloux_navbar_style_1();
							cloux_header_elements();
						cloux_fluid_container_after();
					echo '</header>';
				}



				/*====== Style 3 ======*/
				function cloux_header_style_3() {
					$header_position = get_theme_mod( 'cloux_header_general_position', 'position-2' );
					if( empty( $header_position ) ) {
						$header_position = "position-1";
					}

					if ( is_page() or is_single() ) {
						global $post;
						$single_header_position = get_post_meta( $post->ID, 'header-position', true );
						if( !empty( $single_header_position ) ) {
							$header_position = $single_header_position;
						}
					}

					$header_fixed = get_theme_mod( 'cloux_header_fixed', '1' );
					if( $header_fixed == "1" ) {
						$fixed = "";
					} else {
						$fixed = "";
					}
					
					echo '<header class="cloux-header style-3 ' . $header_position . $fixed . '">';
						cloux_container_before( 'd-flex justify-content-between align-items-center' );
							cloux_header_elements( $search = "true", $social = "true", $userbox = "false" );
							if( $header_position == "position-2" ) {
								cloux_site_alternative_logo();
							} else {
								echo cloux_site_logo();
							}
							cloux_header_elements( $search = "false", $social = "false", $userbox = "true" );
						cloux_container_after();
						cloux_container_before();
							cloux_navbar_style_1();
						cloux_container_after();
					echo '</header>';
				}



				/*====== Style 4 ======*/
				function cloux_header_style_4() {
					$header_position = get_theme_mod( 'cloux_header_general_position', 'position-2' );
					if( empty( $header_position ) ) {
						$header_position = "position-1";
					}

					if ( is_page() or is_single() ) {
						global $post;
						$single_header_position = get_post_meta( $post->ID, 'header-position', true );
						if( !empty( $single_header_position ) ) {
							$header_position = $single_header_position;
						}
					}

					$header_fixed = get_theme_mod( 'cloux_header_fixed', '1' );
					if( $header_fixed == "1" ) {
						$fixed = "";
					} else {
						$fixed = "";
					}
					
					echo '<header class="cloux-header style-4 ' . $header_position . $fixed . '">';
						cloux_container_before( 'd-flex justify-content-between align-items-center' );
							cloux_header_elements( $search = "true", $social = "true", $userbox = "false" );
							if( $header_position == "position-2" ) {
								cloux_site_alternative_logo();
							} else {
								echo cloux_site_logo();
							}
							cloux_header_elements( $search = "false", $social = "false", $userbox = "true" );
						cloux_container_after();
						cloux_navbar_style_1();
					echo '</header>';
				}



				/*====== Style 5 ======*/
				function cloux_header_style_5() {
					$header_position = get_theme_mod( 'cloux_header_general_position', 'position-2' );
					if( empty( $header_position ) ) {
						$header_position = "position-1";
					}

					if ( is_page() or is_single() ) {
						global $post;
						$single_header_position = get_post_meta( $post->ID, 'header-position', true );
						if( !empty( $single_header_position ) ) {
							$header_position = $single_header_position;
						}
					}

					$header_fixed = get_theme_mod( 'cloux_header_fixed', '1' );
					if( $header_fixed == "1" ) {
						$fixed = "";
					} else {
						$fixed = "";
					}
					
					echo '<header class="cloux-header style-5 ' . $header_position . $fixed  . '">';
						cloux_container_before( 'd-flex justify-content-between align-items-center' );
							if( $header_position == "position-2" ) {
								cloux_site_alternative_logo();
							} else {
								echo cloux_site_logo();
							}
							cloux_navbar_style_1();
							cloux_header_elements();
						cloux_container_after();
					echo '</header>';
				}



			/*====== Header Style Selector ======*/
			if( $header_status == '1' ) {
				if( $header_style == "style-2" ) {
					cloux_header_style_2();
				} elseif( $header_style == "style-3" ) {
					cloux_header_style_3();
				} elseif( $header_style == "style-4" ) {
					cloux_header_style_4();
				} elseif( $header_style == "style-5" ) {
					cloux_header_style_5();
				} else {
					cloux_header_style_1();
				}
			}

		}
	}



	/*======
	*
	* Mobile Header
	*
	======*/
	function cloux_mobile_header() {
		echo '<div class="cloux-mobile-header">';
			echo '<div class="main-wrap">';
				echo cloux_site_logo();
				echo '<div class="menu-icon">';
					echo '<span></span>';
					echo '<span></span>';
					echo '<span></span>';
				echo '</div>';
			echo '</div>';

			echo '<div class="mobile-sidebar">';
				echo '<div class="overlay"></div>';
				echo '<div class="content-wrapper">';
					echo '<div class="cloux-close"></div>';
					echo '<div class="content scrollbar-outer">';
						echo cloux_site_logo();

						echo '<nav class="menu">';
							wp_nav_menu(
								array(
									'menu' => 'mainmenu',
									'theme_location' => 'mainmenu',
									'depth' => 5,
									'menu_class' => 'navbar-menu',
									'fallback_cb' => 'cloux_walker::fallback',
									'walker' => new cloux_walker()
								)
							);
						echo '</nav>';

						cloux_header_elements( $search = "false", $social = "true", $userbox = "true" );
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}



	/*======
	*
	* Footer
	*
	======*/
	function cloux_footer() {
		$footer_status = get_theme_mod( 'footer_status', '1' );
		$footer_status_default = get_theme_mod( 'footer_status', '1' );
		$footer_style = get_theme_mod( 'cloux_footer_general_style', 'style-1' );
		$footer_style_default = get_theme_mod( 'cloux_footer_general_style', 'style-1' );
		$content_page_1 = get_theme_mod( 'cloux_footer_page_1' );
		$content_page_2 = get_theme_mod( 'cloux_footer_page_2' );
		$hide_footer_gap = "";

		if ( $footer_status_default == '1' ) {
			/*====== Post & Page Header Selector ======*/
			if ( is_page() or is_single() ) {
				global $post;
				if( !empty( $post->ID ) ) {
						$footer_status = get_post_meta( $post->ID, 'hide-footer', true );

					if( empty( $footer_status ) ) {
						$footer_status = $footer_status_default;
					}

					$footer_style = get_post_meta( $post->ID, 'footer-style', true );
					if( empty( $footer_style ) ) {
						$footer_style = $footer_style_default;
					}
				} else {
					$footer_status = $footer_status_default;
					$footer_style = $footer_style_default;					
				}
			}
			else {
				$footer_status = $footer_status_default;
				$footer_style = $footer_style_default;
			}



			/*====== Footer Styles ======*/
			function cloux_copyright() {
				$hide_copyright_menu = get_theme_mod( 'cloux_hide_copyright_menu', '1' );
				$hide_copyright = get_theme_mod( 'cloux_hide_copyright', '1' );
				$copyright_logo = get_theme_mod( 'cloux_copyright_logo' );
				$copyright_text = get_theme_mod( 'cloux_copyright_text' );

				if ( $hide_copyright == '1' ) {
					echo '<div class="copyright">';
						echo cloux_container_before( $extra_class = "", $echo = "false" );
							if( !empty( $copyright_logo ) or !empty( $copyright_text ) ) {
								echo '<div class="copyright-content">';
									if( !empty( $copyright_logo ) ) {
										echo '<div class="copyright-logo">';
											echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
												echo '<img alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" src="' . esc_url( wp_get_attachment_url( $copyright_logo ) ) . '" />';
											echo '</a>';
										echo '</div>';
									}

									if( !empty( $copyright_text ) ) {
										echo '<div class="copyright-text">';
											echo get_theme_mod( 'cloux_copyright_text' );
										echo '</div>';
									}
								echo '</div>';
							}

							if ( $hide_copyright_menu == '1' ) {
								echo '<div class="menu">';
									wp_nav_menu(
										array(
											'menu' => 'copyrightmenu',
											'theme_location' => 'copyrightmenu',
											'depth' => 1,
											'menu_class' => 'copyright-menu',
											'fallback_cb' => 'cloux_walker::fallback',
											'walker' => new cloux_walker()
										)
									);
								echo '</div>';
							}
						echo cloux_container_after( $echo = "false" );
					echo '</div>';
				}
			}



			/*====== Blank Footer ======*/
			function cloux_blank_footer() {
				$output = '<div class="blank-footer"></div>';
				return $output;
			}



			/*====== Footer Styles ======*/
				/*====== Style 1 ======*/
				function cloux_footer_style_1() {
					if ( is_page() or is_single() ) {
						global $post;
						if( !empty( $post->ID ) ) {
							$hide_footer_gap = get_post_meta( $post->ID, 'hide-footer-gap', true );
							if( $hide_footer_gap == "1" ) {
								$hide_footer_gap = " remove-gap";
							} else {
								$hide_footer_gap = "";
							}
						} else {
							$hide_footer_gap = "";							
						}
					} else {
						$hide_footer_gap = "";
					}

					$content_page_1 = get_theme_mod( 'cloux_footer_page_1' );
					echo '<footer class="cloux-footer style-1' . esc_attr( $hide_footer_gap ) . '">';
						if( !empty( $content_page_1 ) ) {
							cloux_container_before();
								echo '<div class="contents">';
									$args = array(
										'p' => $content_page_1,
										'ignore_sticky_posts' => true,
										'post_type' => 'page',
										'post_status' => 'publish'
									);
									$wp_query = new WP_Query( $args );
									while ( $wp_query->have_posts() ) {
										$wp_query->the_post();
										echo do_shortcode( get_the_content() );
									}
									wp_reset_postdata();
								echo '</div>';
							cloux_container_after();
						}
						cloux_copyright();
					echo '</footer>';
				}



				/*====== Style 2 ======*/
				function cloux_footer_style_2() {
					if ( is_page() or is_single() ) {
						global $post;
						$hide_footer_gap = get_post_meta( $post->ID, 'hide-footer-gap', true );
						if( $hide_footer_gap == "1" ) {
							$hide_footer_gap = " remove-gap";
						} else {
							$hide_footer_gap = "";
						}
					} else {
						$hide_footer_gap = "";
					}

					$content_page_2 = get_theme_mod( 'cloux_footer_page_2' );
					echo '<footer class="cloux-footer style-1' . esc_attr( $hide_footer_gap ) . '">';
						if( !empty( $content_page_2 ) ) {
							cloux_container_before();
								echo '<div class="contents">';
									$args = array(
										'p' => $content_page_2,
										'ignore_sticky_posts' => true,
										'post_type' => 'page',
										'post_status' => 'publish'
									);
									$wp_query = new WP_Query( $args );
									while ( $wp_query->have_posts() ) {
										$wp_query->the_post();
										echo do_shortcode( get_the_content() );
									}
									wp_reset_postdata();
								echo '</div>';
							cloux_container_after();
						}
						cloux_copyright();
					echo '</footer>';
				}



			/*====== Footer Style Selector ======*/
			if( $footer_status == '1' ) {
				if( $footer_style == "style-2" ) {
					cloux_footer_style_2();
				} else {
					cloux_footer_style_1();
				}
			} else {
				echo cloux_blank_footer();
			}

		} else {
			echo cloux_blank_footer();
		}
	}



	/*======
	*
	* Register & Login Form Ajax
	*
	======*/
	function cloux_login(){
		$user_login = $_POST['cloux_username'];	
		$user_pass = $_POST['cloux_user_pass'];
		$remember = $_POST['cloux_remember_me'];
		if(isset($_POST['cloux_remember_me'])) {
			$remember_me = "true";
		} else {
			$remember_me = "false";
		}

		if( !check_ajax_referer( 'ajax-login-nonce', 'login-security', false ) ){
			echo json_encode( array( 'error' => true, 'message' => '<div class="alert-no">' . esc_html__( 'Session token has expired, please reload the page and try again.', 'cloux' ) . '</div>' ) );
		}
		elseif( empty( $user_login ) || empty( $user_pass ) ){
			echo json_encode( array( 'error' => true, 'message' => '<div class="alert-no">' . esc_html__( 'Please fill all form fields.', 'cloux' ) . '</div>' ) );
		} else {
			$user = wp_signon( array( 'user_login' => $user_login, 'user_password' => $user_pass, 'remember' => $remember_me ), false );
			if( is_wp_error( $user ) ){
				echo json_encode( array( 'error' => true, 'message' => '<div class="alert-no">' . $user->get_error_message() . '</div>' ) );
			} else{
				echo json_encode( array( 'error' => false, 'message' => '<div class="alert-ok">' . esc_html__( 'Login successful, you are being redirected.', 'cloux' ) . '</div>' ) );
			}
		}
		die();
	}
	add_action( 'wp_ajax_nopriv_cloux_login', 'cloux_login' );



	function cloux_register(){
		$user_login	= $_POST['cloux_username'];	
		$user_email	= $_POST['cloux_user_email'];
		
		if( !check_ajax_referer( 'ajax-login-nonce', 'register-security', false ) ){
			echo json_encode( array( 'error' => true, 'message' => '<div class="alert-no">' . esc_html__( 'Session token has expired, please reload the page and try again', 'cloux' ).'</div>' ) );
			die();
		}
	 	
	 	elseif( empty( $user_login ) || empty( $user_email ) ){
			echo json_encode( array( 'error' => true, 'message' => '<div class="alert-no">' . esc_html__( 'Please fill all form fields', 'cloux' ) . '</div>' ) );
			die();
	 	}
		
		$errors = register_new_user($user_login, $user_email);
		if( is_wp_error( $errors ) ){
			$registration_error_messages = $errors->errors;
			$display_errors = '<div class="alert alert-no">';
				foreach( $registration_error_messages as $error ){
					$display_errors .= '<p>' . $error[0] . '</p>';
				}
			$display_errors .= '</div>';
			echo json_encode( array( 'error' => true, 'message' => $display_errors ) );
		} else {
			echo json_encode( array( 'error' => false, 'message' => '<div class="alert-ok">' . esc_html__( 'Registration completed. Please check your e-mail.', 'cloux' ) . '</p>' ) );
		}
	 	die();
	}
	add_action( 'wp_ajax_nopriv_cloux_register', 'cloux_register' );



	/*======
	*
	* Titles
	*
	======*/
	function cloux_title( $title = "", $style = "style-1", $align = "left", $colored_title = "" ) {
		if( !empty( $title ) ) {
			$output = '<div class="cloux-title ' . $style . ' ' . $align . '">';
				$output .= $title;
				if( !empty( $colored_title ) ) {
					$output .= ' <span>' . $colored_title . '</span>';
				}
			$output .= '</div>';
		}

		return $output;
	}



	/*======
	*
	* Breadcrumb
	*
	======*/
	function cloux_breadcrumb() {
		if( function_exists( 'bcn_display' ) ) {
			$output = '<div class="cloux-breadcrumb">';
				$output .= '<ul>';
					$output .= bcn_display_list( $return = true );
				$output .= '</ul>';
			$output .= '</div>';
			return $output;
		}
	}



	/*======
	*
	* Page Banner
	*
	======*/
	function cloux_page_banner( $title = "", $style = "style-1", $breadcrumb = "true", $custom_background = "", $title_status = "true" ) {
		if( !empty( $title ) or $breadcrumb = "true" ) {
			$general_header_position = get_theme_mod( 'cloux_header_general_position', 'position-2' );

			if( $general_header_position == "position-2" ) {
				$position_control = " position-2";
			} else {
				$position_control = "";
			}

			$general_header_style = get_theme_mod( 'cloux_header_general_style', 'style-1' );
			if( !empty( $general_header_style ) ) {
				$header_style = " header-" . $general_header_style;
			} else {
				$header_style = "";				
			}

			if ( is_page() or is_single() ) {
				global $post;
				$hide_header_gap = get_post_meta( $post->ID, 'hide-header-gap', true );
				if( $hide_header_gap == "1" ) {
					$hide_header_gap = " remove-gap";
				} else {
					$hide_header_gap = "";
				}
			}
			else {
				$hide_header_gap = "";
			}

			$default_page_banner = get_theme_mod( 'cloux_default_page_banner_bg' );

			$output = '<div class="cloux-page-banner ' . $style . $position_control . $header_style . $hide_header_gap . '">';
				if( get_post_type( get_the_ID() ) == 'game' or is_singular( 'post' ) or is_page() ) {
					if ( function_exists( 'rwmb_meta' ) ) {
						$page_banner_bg = rwmb_meta( 'hide-page-banner-image' );
						if( !empty( $page_banner_bg ) ) {
							foreach ( $page_banner_bg as $bg ) {
								$image_url = wp_get_attachment_image_src( esc_attr( $bg["ID"] ), 'cloux-page-banner' );
								if( !empty( $image_url ) ) {
									$output .= '<div class="background" style="background-image:url(' . esc_url( $image_url[0] ) . ');"></div>';							
								} else {
									if( !empty( $default_page_banner ) ) {
										$output .= '<div class="background" style="background-image:url(' . esc_url( wp_get_attachment_url( $default_page_banner ) ) . ');"></div>';
									} else {
										$output .= '<div class="background"></div>';
									}
								}
							}
						} else {
							if( !empty( $default_page_banner ) ) {
								$output .= '<div class="background" style="background-image:url(' . esc_url( wp_get_attachment_url( $default_page_banner ) ) . ');"></div>';
							} else {
								$output .= '<div class="background"></div>';
							}
						}
					} else {
						if( !empty( $default_page_banner ) ) {
							$output .= '<div class="background" style="background-image:url(' . esc_url( wp_get_attachment_url( $default_page_banner ) ) . ');"></div>';
						} else {
							$output .= '<div class="background"></div>';
						}
					}
				} else {
					if( !empty( $default_page_banner ) ) {
						$output .= '<div class="background" style="background-image:url(' . esc_url( wp_get_attachment_url( $default_page_banner ) ) . ');"></div>';
					} else {
						$output .= '<div class="background"></div>';
					}
				}

				$output .= cloux_container_before( 'content', $echo = 'false' );
					if( !empty( $title ) ) {
						$output .= '<h1>' . $title . '</h1>';
					} else {
						if( is_category() ) {
							$title = single_cat_title( '', false );
						} elseif( is_tag() ) {
							$title = single_tag_title( '', false );
						} elseif( is_search() ) {
							$title = get_search_query();
						} elseif( is_author() ) {
							$title = esc_html__( 'Author', 'cloux' ) . ' <span>' . get_the_author() . '</span>';
						} elseif( is_home() ) {
							$title = esc_html__( 'Home', 'cloux' );
						} elseif( is_404() ) {
							$title = esc_html__( '404 Page', 'cloux' );
						} elseif( is_attachment() or is_page() or is_single() ) {
							$title = get_the_title();
						} elseif(  is_post_type_archive() ) {
							$title = post_type_archive_title( '', false );
						} elseif(  is_tax() ) {
							$title = single_term_title( '', false );
						} else {
							if ( is_day() ) {
								$title = sprintf( esc_html__( 'Daily Archives: %s', 'cloux' ), get_the_date() );
							} elseif ( is_month() ) {
								$title = sprintf( esc_html__( 'Monthly Archives: %s', 'cloux' ), get_the_date( _x( 'F Y', 'Monthly archives date format', 'cloux' ) ) );
							} elseif ( is_year() ) {
								$title = sprintf( esc_html__( 'Yearly Archives: %s', 'cloux' ), get_the_date( _x( 'Y', 'Yearly archives date format', 'cloux' ) ) );
							} else {
								$title = esc_html__( 'Archives', 'cloux' );
							}
						}
						$output .= '<h1>' . $title . '</h1>';
					}

					if( is_category() ) {
						$category_description = category_description();
						if( !empty( $category_description ) ) {
							$output .= '<div class="summary">' . category_description() . '</div>';
						}
					}

					$output .= cloux_breadcrumb();

				$output .= cloux_container_after( $echo = 'false' );
			$output .= '</div>';
		}
		return $output;
	}



	/*======
	*
	* Woo Product List Styles
	*
	======*/
	function cloux_woo_product_style_1( $product = "", $image = "", $price = "", $excerpt = "" ) {
		$output = "";
		if ( function_exists( 'is_woocommerce' ) ) {
			$output .= '<div class="product product-styles product-style-1">';
				if( $image == "true" ) {
					if ( has_post_thumbnail( $product ) ) {
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $product ), 'cloux-product-medium' );
						if( !empty( $image_url ) ) {
							$output .= '<div class="image">';
								$output .= '<a href="' . get_the_permalink( $product ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $product ) ) . '">';
									$output .= '<img src="' . esc_url( $image_url[0] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => $product ) ) . '" />';
								$output .= '</a>';
							$output .= '</div>';
						}
					}					
				}
				$output .= '<div class="content">';
					$output .= '<div class="title">';
						$output .= '<a href="' . get_the_permalink( $product ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $product ) ) . '">' . get_the_title( $product ) . '</a>';
					$output .= '</div>';

					$product = wc_get_product( get_the_ID() );
					if( !empty( $product ) ) {
						$price = $product->get_price_html();
						if( !empty( $price ) ) {
							$output .= '<span class="woo-product-price">' . $product->get_price_html() . '</span>';							
						}
					}

					if( $excerpt == 'true' ) {
						$summary = get_the_excerpt();
						if( !empty( $summary ) ) {
							$output .= '<div class="summary">' . get_the_excerpt() . '</div>';
						}
					}
				$output .= '</div>';
			$output .= '</div>';
		}
		return $output;
	}



	function cloux_woo_product_style_2( $product = "", $image = "", $price = "", $excerpt = "" ) {
		$output = "";
		if ( function_exists( 'is_woocommerce' ) ) {
			$output .= '<div class="product product-styles product-style-2">';
				if( $image == "true" ) {
					if ( has_post_thumbnail( $product ) ) {
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $product ), 'cloux-product-medium' );
						if( !empty( $image_url ) ) {
							$output .= '<div class="image">';
								$output .= '<a href="' . get_the_permalink( $product ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $product ) ) . '">';
									$output .= '<img src="' . esc_url( $image_url[0] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => $product ) ) . '" />';
								$output .= '</a>';
							$output .= '</div>';
						}
					}					
				}
				$output .= '<div class="content">';
					$output .= '<div class="title">';
						$output .= '<a href="' . get_the_permalink( $product ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $product ) ) . '">' . get_the_title( $product ) . '</a>';
					$output .= '</div>';

					$product = wc_get_product( get_the_ID() );
					if( !empty( $product ) ) {
						$price = $product->get_price_html();
						if( !empty( $price ) ) {
							$output .= '<span class="woo-product-price">' . $product->get_price_html() . '</span>';							
						}
					}

					if( $excerpt == 'true' ) {
						$summary = get_the_excerpt();
						if( !empty( $summary ) ) {
							$output .= '<div class="summary">' . get_the_excerpt() . '</div>';
						}
					}
				$output .= '</div>';
			$output .= '</div>';
		}
		return $output;
	}



	/*======
	*
	* eSport Fixture List Styles
	*
	======*/
	function cloux_esport_fixture_style_1( $match = "", $games = "", $excerpt = "", $date = "", $time = "", $score = "", $home_team = "", $away_team = "" ) {
		$output = "";
		if ( function_exists( 'rwmb_meta' ) ) {
			if( !empty( $match ) ) {
				$match_home_team = rwmb_meta( 'esport-fixture-home-team' );
				$match_home_score = rwmb_meta( 'esport-fixture-home-team-score' );
				$match_away_team = rwmb_meta( 'esport-fixture-away-team' );
				$match_away_score = rwmb_meta( 'esport-fixture-away-team-score' );
				$match_date = rwmb_meta( 'esport-fixture-match-date' );
				$match_time = rwmb_meta( 'esport-fixture-match-time' );
				$match_video = rwmb_meta( 'esport-fixture-match-video' );
				$match_excerpt = get_the_excerpt();
				$title = get_the_title();
				$match_games = wp_get_post_terms( $match, 'esport-game' );

				$output .= '<div class="fixture fixture-styles fixture-style-1">';
					$output .= '<div class="wrap">';
						if( !empty( $title ) or !empty( $match_games ) or !empty( $summary ) ) {
							$output .= '<div class="left">';
								if( $games == "true" ) {
									if( !empty( $match_games ) ) {
										$output .= '<div class="games">';
											$output .= '<ul>';
												foreach( $match_games as $game ) {
													if( !empty( $game ) ) {
														$output .= '<li>';
															$output .= '<a href="' . get_term_link( $game->term_id ) . '" title="' . esc_attr( $game->name ) . '">' . esc_attr( $game->name ) . '</a>';
														$output .= '</li>';
													}
												}
											$output .= '</ul>';
										$output .= '</div>';
									}
								}

								if( !empty( $title ) ) {
									$output .= '<div class="title">';
										$output .= '<a href="' . get_the_permalink( $match ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $match ) ) . '">' . get_the_title( $match ) . '</a>';
									$output .= '</div>';
								}

								if( $excerpt == "true" ) {
									if( !empty( $match_excerpt ) ) {
										$output .= '<div class="excerpt">';
											$output .= get_the_excerpt();
										$output .= '</div>';
									}
								}
							$output .= '</div>';
						}

						if( !empty( $match_home_team ) or !empty( $match_home_score ) or !empty( $match_away_team ) or !empty( $match_away_score ) or !empty( $match_date ) or !empty( $match_time ) ) {
							$output .= '<div class="right">';
								if( $home_team == "true" ) {
									if( !empty( $match_home_team ) or !empty( $match_home_score ) ) {
										if( !empty( $match_home_team ) ) {
											$home_t_name = $match_home_team->name;
											$home_t_id = $match_home_team->term_id;
											$home_t_logo = get_term_meta( $home_t_id, 'team-logo', true );
											if( !empty( $home_t_name ) or !empty( $home_t_logo ) ) {
												$output .= '<div class="home-team team">';
													if( !empty( $home_t_logo ) ) {
														$output .= '<div class="logo">';
														$home_t_logo_url = wp_get_attachment_image_src( $home_t_logo, 'thumbnail' );
														if( !empty( $home_t_logo_url ) ) {
															$output .= '<img src="' . esc_url( $home_t_logo_url[0] ) . '" alt="' . esc_url( $home_t_logo_url[1] ) . '" />';
														}
														$output .= '</div>';
													}
													if( !empty( $home_t_name ) ) {
														$output .= '<div class="name">' . esc_attr( $match_home_team->name ) . '</div>';
													}
												$output .= '</div>';
											}
										}
									}
								}

								if( !empty( $match_away_score ) or !empty( $match_home_score ) or !empty( $match_date ) or !empty( $match_time ) ) {
									$output .= '<div class="score-date">';
										if( $score == "true" ) {
											if( !empty( $match_away_score ) or !empty( $match_home_score ) ) {
												$output .= '<div class="score">';
													if( !empty( $match_home_score ) ) {
														$output .= '<span class="home-score">' . esc_attr( $match_home_score ) . '</span>';
													}
													if( !empty( $match_away_score ) and !empty( $match_home_score ) ) {
														$output .= '<span class="separator-score">-</span>';													
													}
													if( !empty( $match_away_score ) ) {
														$output .= '<span class="away-score">' . esc_attr( $match_away_score ) . '</span>';
													}
												$output .= '</div>';
											} else {
												$output .= '<div class="score">' . esc_html__( 'vs', 'cloux' ) . '</div>';
											}
										}

										if( $date == "true" or $time == "true" ) {
											if( !empty( $match_date ) or !empty( $match_time ) ) {
												$output .= '<div class="date-time">';
													if( !empty( $match_date ) ) {
														$output .= cloux_global_date_converter( $date = $match_date );
													}
													if( !empty( $match_time ) ) {
														$output .= '<span class="time">' . esc_attr( $match_time ) . '</span>';
													}
												$output .= '</div>';
											}
										}
									$output .= '</div>';
								}

								if( $away_team == "true" ) {
									if( !empty( $match_away_team ) ) {
										$away_t_name = $match_away_team->name;
										$away_t_id = $match_away_team->term_id;
										$away_t_logo = get_term_meta( $away_t_id, 'team-logo', true );
										if( !empty( $away_t_name ) or !empty( $away_t_logo ) ) {
											$output .= '<div class="away-team team">';
												if( !empty( $away_t_logo ) ) {
													$output .= '<div class="logo">';
													$away_t_logo_url = wp_get_attachment_image_src( $away_t_logo, 'thumbnail' );
													if( !empty( $away_t_logo_url ) ) {
														$output .= '<img src="' . esc_url( $away_t_logo_url[0] ) . '" alt="' . esc_url( $away_t_logo_url[1] ) . '" />';
													}
													$output .= '</div>';
												}
												if( !empty( $away_t_name ) ) {
													$output .= '<div class="name">' . esc_attr( $match_away_team->name ) . '</div>';
												}
											$output .= '</div>';
										}
									}
								}
							$output .= '</div>';
						}
					$output .= '</div>';
				$output .= '</div>';
			}
		}

		return $output;
	}



	function cloux_esport_fixture_style_2( $match = "", $games = "", $excerpt = "", $date = "", $time = "", $score = "", $home_team = "", $away_team = "" ) {
		$output = "";
		if ( function_exists( 'rwmb_meta' ) ) {
			if( !empty( $match ) ) {
				$match_home_team = rwmb_meta( 'esport-fixture-home-team' );
				$match_home_score = rwmb_meta( 'esport-fixture-home-team-score' );
				$match_away_team = rwmb_meta( 'esport-fixture-away-team' );
				$match_away_score = rwmb_meta( 'esport-fixture-away-team-score' );
				$match_date = rwmb_meta( 'esport-fixture-match-date' );
				$match_time = rwmb_meta( 'esport-fixture-match-time' );
				$match_video = rwmb_meta( 'esport-fixture-match-video' );
				$match_excerpt = get_the_excerpt();
				$title = get_the_title();
				$match_games = wp_get_post_terms( $match, 'esport-game' );

				$output .= '<div class="fixture fixture-styles fixture-style-2">';
					$output .= '<div class="wrap">';
						if( !empty( $title ) or !empty( $match_games ) or !empty( $summary ) ) {
							$output .= '<div class="left">';
								if( $games == "true" ) {
									if( !empty( $match_games ) ) {
										$output .= '<div class="games">';
											$output .= '<ul>';
												foreach( $match_games as $game ) {
													if( !empty( $game ) ) {
														$output .= '<li>';
															$output .= '<a href="' . get_term_link( $game->term_id ) . '" title="' . esc_attr( $game->name ) . '">' . esc_attr( $game->name ) . '</a>';
														$output .= '</li>';
													}
												}
											$output .= '</ul>';
										$output .= '</div>';
									}
								}

								if( !empty( $title ) ) {
									$output .= '<div class="title">';
										$output .= '<a href="' . get_the_permalink( $match ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $match ) ) . '">' . get_the_title( $match ) . '</a>';
									$output .= '</div>';
								}

								if( $excerpt == "true" ) {
									if( !empty( $match_excerpt ) ) {
										$output .= '<div class="excerpt">';
											$output .= get_the_excerpt();
										$output .= '</div>';
									}
								}
							$output .= '</div>';
						}

						if( !empty( $match_home_team ) or !empty( $match_home_score ) or !empty( $match_away_team ) or !empty( $match_away_score ) or !empty( $match_date ) or !empty( $match_time ) ) {
							$output .= '<div class="right">';
								if( $home_team == "true" ) {
									if( !empty( $match_home_team ) or !empty( $match_home_score ) ) {
										if( !empty( $match_home_team ) ) {
											$home_t_name = $match_home_team->name;
											$home_t_id = $match_home_team->term_id;
											$home_t_logo = get_term_meta( $home_t_id, 'team-logo', true );
											if( !empty( $home_t_name ) or !empty( $home_t_logo ) ) {
												$output .= '<div class="home-team team">';
													if( !empty( $home_t_logo ) ) {
														$output .= '<div class="logo">';
														$home_t_logo_url = wp_get_attachment_image_src( $home_t_logo, 'thumbnail' );
														if( !empty( $home_t_logo_url ) ) {
															$output .= '<img src="' . esc_url( $home_t_logo_url[0] ) . '" alt="' . esc_url( $home_t_logo_url[1] ) . '" />';
														}
														$output .= '</div>';
													}
													if( !empty( $home_t_name ) ) {
														$output .= '<div class="name">' . esc_attr( $match_home_team->name ) . '</div>';
													}
												$output .= '</div>';
											}
										}
									}
								}

								if( !empty( $match_away_score ) or !empty( $match_home_score ) or !empty( $match_date ) or !empty( $match_time ) ) {
									$output .= '<div class="score-date">';
										if( $score == "true" ) {
											if( !empty( $match_away_score ) or !empty( $match_home_score ) ) {
												$output .= '<div class="score">';
													if( !empty( $match_home_score ) ) {
														$output .= '<span class="home-score">' . esc_attr( $match_home_score ) . '</span>';
													}
													if( !empty( $match_away_score ) and !empty( $match_home_score ) ) {
														$output .= '<span class="separator-score">-</span>';													
													}
													if( !empty( $match_away_score ) ) {
														$output .= '<span class="away-score">' . esc_attr( $match_away_score ) . '</span>';
													}
												$output .= '</div>';
											} else {
												$output .= '<div class="score">' . esc_html__( 'vs', 'cloux' ) . '</div>';
											}
										}

										if( $date == "true" or $time == "true" ) {
											if( !empty( $match_date ) or !empty( $match_time ) ) {
												$output .= '<div class="date-time">';
													if( !empty( $match_date ) ) {
														$output .= cloux_global_date_converter( $date = $match_date );
													}
													if( !empty( $match_time ) ) {
														$output .= '<span class="time">' . esc_attr( $match_time ) . '</span>';
													}
												$output .= '</div>';
											}
										}
									$output .= '</div>';
								}

								if( $away_team == "true" ) {
									if( !empty( $match_away_team ) ) {
										$away_t_name = $match_away_team->name;
										$away_t_id = $match_away_team->term_id;
										$away_t_logo = get_term_meta( $away_t_id, 'team-logo', true );
										if( !empty( $away_t_name ) or !empty( $away_t_logo ) ) {
											$output .= '<div class="away-team team">';
												if( !empty( $away_t_logo ) ) {
													$output .= '<div class="logo">';
													$away_t_logo_url = wp_get_attachment_image_src( $away_t_logo, 'thumbnail' );
													if( !empty( $away_t_logo_url ) ) {
														$output .= '<img src="' . esc_url( $away_t_logo_url[0] ) . '" alt="' . esc_url( $away_t_logo_url[1] ) . '" />';
													}
													$output .= '</div>';
												}
												if( !empty( $away_t_name ) ) {
													$output .= '<div class="name">' . esc_attr( $match_away_team->name ) . '</div>';
												}
											$output .= '</div>';
										}
									}
								}
							$output .= '</div>';
						}
					$output .= '</div>';
				$output .= '</div>';
			}
		}

		return $output;
	}



	/*======
	*
	* eSport Fixture Listing
	*
	======*/
	function cloux_esport_fixture_listing() {
		function cloux_esport_fixture_list_style_1() {
			echo '<div class="esport-fixture-list-styles esport-fixture-list-style-1">';
				while ( have_posts() ) : the_post();
					echo cloux_esport_fixture_style_1( $match = get_the_ID(), $games = "true", $excerpt = "true", $date = "true", $time = "true", $score = "true", $home_team = "true", $away_team = "true" );
				endwhile;
			echo '</div>';
		}

		cloux_esport_fixture_list_style_1();
	}



	/*======
	*
	* eSport Player Social Links
	*
	======*/
	function cloux_esport_player_social_link() {
		if ( function_exists( 'rwmb_meta' ) ) {
			$facebook = rwmb_meta( 'esport-player-facebook-url' );
			$twitter = rwmb_meta( 'esport-player-twitter-url' );
			$google_plus = rwmb_meta( 'esport-player-google-plus-url' );
			$pinterest = rwmb_meta( 'esport-player-pinterest-url' );
			$linkedin = rwmb_meta( 'esport-player-linkedin-url' );
			$youtube = rwmb_meta( 'esport-player-youtube-url' );
			$vimeo = rwmb_meta( 'esport-player-vimeo-url' );
			$tumblr = rwmb_meta( 'esport-player-tumblr-url' );
			$instagram = rwmb_meta( 'esport-player-instagram-url' );
			$flickr = rwmb_meta( 'esport-player-flickr-url' );
			$dribbble = rwmb_meta( 'esport-player-dribbble-url' );
			$reddit = rwmb_meta( 'esport-player-reddit-url' );
			$soundcloud = rwmb_meta( 'esport-player-soundcloud-url' );
			$spotify = rwmb_meta( 'esport-player-spotify-url' );
			$yahoo = rwmb_meta( 'esport-player-yahoo-url' );
			$behance = rwmb_meta( 'esport-player-behance-url' );
			$codepen = rwmb_meta( 'esport-player-codepen-url' );
			$delicious = rwmb_meta( 'esport-player-delicious-url' );
			$stumbleupon = rwmb_meta( 'esport-player-stumbleupon-url' );
			$deviantart = rwmb_meta( 'esport-player-deviantart-url' );
			$digg = rwmb_meta( 'esport-player-digg-url' );
			$github = rwmb_meta( 'esport-player-github-url' );
			$medium = rwmb_meta( 'esport-player-medium-url' );
			$steam = rwmb_meta( 'esport-player-steam-url' );
			$vk = rwmb_meta( 'esport-player-vk-url' );
			$px500 = rwmb_meta( 'esport-player-500px-url' );
			$foursquare = rwmb_meta( 'esport-player-foursquare-url' );
			$slack = rwmb_meta( 'esport-player-slack-url' );
			$whatsapp = rwmb_meta( 'esport-player-whatsapp-url' );
			$skype = rwmb_meta( 'esport-player-skype-url' );
			$twitch = rwmb_meta( 'esport-player-twitch-url' );
			$paypal = rwmb_meta( 'esport-player-paypal-url' );
			$official_site = rwmb_meta( 'esport-player-official-site-url' );
			$custom_site = rwmb_meta( 'esport-player-custom-site-url' );

			if( !empty( $facebook ) or !empty( $twitter ) or !empty( $google_plus ) or !empty( $pinterest ) or !empty( $linkedin ) or !empty( $youtube ) or !empty( $vimeo ) or !empty( $tumblr ) or !empty( $instagram ) or !empty( $flickr ) or !empty( $dribbble ) or !empty( $reddit ) or !empty( $soundcloud ) or !empty( $spotify ) or !empty( $yahoo ) or !empty( $behance ) or !empty( $codepen ) or !empty( $delicious ) or !empty( $stumbleupon ) or !empty( $deviantart ) or !empty( $digg ) or !empty( $github ) or !empty( $medium ) or !empty( $steam ) or !empty( $vk ) or !empty( $px500 ) or !empty( $foursquare ) or !empty( $slack ) or !empty( $whatsapp ) or !empty( $skype ) or !empty( $twitch ) or !empty( $paypal ) or !empty( $official_site ) or !empty( $custom_site ) ) {
				$output = '<div class="esport-player-single-social-links">';
					$output .= '<ul>';
						if( !empty( $facebook ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $facebook ) . '" target="_blank" title="' . esc_html__( 'Facebook', 'cloux' ) . '">';
									$output .= '<i class="fab fa-facebook-f" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $twitter ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $twitter ) . '" target="_blank" title="' . esc_html__( 'Twitter', 'cloux' ) . '">';
									$output .= '<i class="fab fa-twitter" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $google_plus ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $google_plus ) . '" target="_blank" title="' . esc_html__( 'Google+', 'cloux' ) . '">';
									$output .= '<i class="fab fa-google-plus-g" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $pinterest ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $pinterest ) . '" target="_blank" title="' . esc_html__( 'Pinterest', 'cloux' ) . '">';
									$output .= '<i class="fab fa-pinterest-p" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $linkedin ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $linkedin ) . '" target="_blank" title="' . esc_html__( 'LinkedIn', 'cloux' ) . '">';
									$output .= '<i class="fab fa-linkedin-in" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $youtube ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $youtube ) . '" target="_blank" title="' . esc_html__( 'YouTube', 'cloux' ) . '">';
									$output .= '<i class="fab fa-youtube" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $vimeo ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $vimeo ) . '" target="_blank" title="' . esc_html__( 'Vimeo', 'cloux' ) . '">';
									$output .= '<i class="fab fa-vimeo-v" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $tumblr ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $tumblr ) . '" target="_blank" title="' . esc_html__( 'Tumblr', 'cloux' ) . '">';
									$output .= '<i class="fab fa-tumblr" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $instagram ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $instagram ) . '" target="_blank" title="' . esc_html__( 'Instagram', 'cloux' ) . '">';
									$output .= '<i class="fab fa-instagram" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $flickr ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $flickr ) . '" target="_blank" title="' . esc_html__( 'Flickr', 'cloux' ) . '">';
									$output .= '<i class="fab fa-flickr" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $dribbble ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $dribbble ) . '" target="_blank" title="' . esc_html__( 'Dribbble', 'cloux' ) . '">';
									$output .= '<i class="fab fa-dribbble" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $reddit ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $reddit ) . '" target="_blank" title="' . esc_html__( 'Reddit', 'cloux' ) . '">';
									$output .= '<i class="fab fa-reddit-alien" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $soundcloud ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $soundcloud ) . '" target="_blank" title="' . esc_html__( 'SoundCloud', 'cloux' ) . '">';
									$output .= '<i class="fab fa-soundcloud" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $spotify ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $spotify ) . '" target="_blank" title="' . esc_html__( 'Spotify', 'cloux' ) . '">';
									$output .= '<i class="fab fa-spotify" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $yahoo ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $yahoo ) . '" target="_blank" title="' . esc_html__( 'Yahoo', 'cloux' ) . '">';
									$output .= '<i class="fab fa-yahoo" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $behance ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $behance ) . '" target="_blank" title="' . esc_html__( 'Behance', 'cloux' ) . '">';
									$output .= '<i class="fab fa-behance" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $codepen ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $codepen ) . '" target="_blank" title="' . esc_html__( 'CodePen', 'cloux' ) . '">';
									$output .= '<i class="fab fa-codepen" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $delicious ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $delicious ) . '" target="_blank" title="' . esc_html__( 'Delicious', 'cloux' ) . '">';
									$output .= '<i class="fab fa-delicious" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $stumbleupon ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $stumbleupon ) . '" target="_blank" title="' . esc_html__( 'Stumbleupon', 'cloux' ) . '">';
									$output .= '<i class="fab fa-stumbleupon" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $deviantart ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $deviantart ) . '" target="_blank" title="' . esc_html__( 'DeviantArt', 'cloux' ) . '">';
									$output .= '<i class="fab fa-deviantart" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $digg ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $digg ) . '" target="_blank" title="' . esc_html__( 'Digg', 'cloux' ) . '">';
									$output .= '<i class="fab fa-digg" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $github ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $github ) . '" target="_blank" title="' . esc_html__( 'GitHub', 'cloux' ) . '">';
									$output .= '<i class="fab fa-github" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $medium ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $medium ) . '" target="_blank" title="' . esc_html__( 'Medium', 'cloux' ) . '">';
									$output .= '<i class="fab fa-medium-m" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $steam ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $steam ) . '" target="_blank" title="' . esc_html__( 'Steam', 'cloux' ) . '">';
									$output .= '<i class="fab fa-steam-symbol" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $vk ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $vk ) . '" target="_blank" title="' . esc_html__( 'VK', 'cloux' ) . '">';
									$output .= '<i class="fab fa-vk" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $px500 ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $px500 ) . '" target="_blank" title="' . esc_html__( '500px', 'cloux' ) . '">';
									$output .= '<i class="fab fa-500px" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $foursquare ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $foursquare ) . '" target="_blank" title="' . esc_html__( 'Foursquare', 'cloux' ) . '">';
									$output .= '<i class="fab fa-foursquare" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $slack ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $slack ) . '" target="_blank" title="' . esc_html__( 'Slack', 'cloux' ) . '">';
									$output .= '<i class="fab fa-slack-hash" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $whatsapp ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $whatsapp ) . '" target="_blank" title="' . esc_html__( 'WhatsApp', 'cloux' ) . '">';
									$output .= '<i class="fab fa-whatsapp" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $skype ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $skype ) . '" target="_blank" title="' . esc_html__( 'Skype', 'cloux' ) . '">';
									$output .= '<i class="fab fa-skype" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $twitch ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $twitch ) . '" target="_blank" title="' . esc_html__( 'Twitch', 'cloux' ) . '">';
									$output .= '<i class="fab fa-twitch" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $paypal ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $paypal ) . '" target="_blank" title="' . esc_html__( 'PayPal', 'cloux' ) . '">';
									$output .= '<i class="fab fa-paypal" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $official_site ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $official_site ) . '" target="_blank" title="' . esc_html__( 'Official Site', 'cloux' ) . '">';
									$output .= '<i class="fas fa-external-link-alt" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
						if( !empty( $custom_site ) ) {
							$output .= '<li>';
								$output .= '<a href="' . esc_url( $custom_site ) . '" target="_blank" title="' . esc_html__( 'Link', 'cloux' ) . '">';
									$output .= '<i class="fas fa-external-link-alt" aria-hidden="true"></i>';
								$output .= '</a>';
							$output .= '</li>';
						}
					$output .= '</ul>';
				$output .= '</div>';
				
				return $output;
			}
		}
	}



	/*======
	*
	* eSport Player List Styles
	*
	======*/
	function cloux_esport_player_style_1( $player = "" ) {
		$output = "";
		if ( function_exists( 'rwmb_meta' ) ) {
			if( !empty( $player ) ) {
				$username = rwmb_meta( 'esport-player-username' );
				$facebook = rwmb_meta( 'esport-player-facebook-url' );
				$twitter = rwmb_meta( 'esport-player-twitter-url' );
				$google_plus = rwmb_meta( 'esport-player-google-plus-url' );
				$pinterest = rwmb_meta( 'esport-player-pinterest-url' );
				$linkedin = rwmb_meta( 'esport-player-linkedin-url' );
				$youtube = rwmb_meta( 'esport-player-youtube-url' );
				$vimeo = rwmb_meta( 'esport-player-vimeo-url' );
				$tumblr = rwmb_meta( 'esport-player-tumblr-url' );
				$instagram = rwmb_meta( 'esport-player-instagram-url' );
				$flickr = rwmb_meta( 'esport-player-flickr-url' );
				$dribbble = rwmb_meta( 'esport-player-dribbble-url' );
				$reddit = rwmb_meta( 'esport-player-reddit-url' );
				$soundcloud = rwmb_meta( 'esport-player-soundcloud-url' );
				$spotify = rwmb_meta( 'esport-player-spotify-url' );
				$yahoo = rwmb_meta( 'esport-player-yahoo-url' );
				$behance = rwmb_meta( 'esport-player-behance-url' );
				$codepen = rwmb_meta( 'esport-player-codepen-url' );
				$delicious = rwmb_meta( 'esport-player-delicious-url' );
				$stumbleupon = rwmb_meta( 'esport-player-stumbleupon-url' );
				$deviantart = rwmb_meta( 'esport-player-deviantart-url' );
				$digg = rwmb_meta( 'esport-player-digg-url' );
				$github = rwmb_meta( 'esport-player-github-url' );
				$medium = rwmb_meta( 'esport-player-medium-url' );
				$steam = rwmb_meta( 'esport-player-steam-url' );
				$vk = rwmb_meta( 'esport-player-vk-url' );
				$px500 = rwmb_meta( 'esport-player-500px-url' );
				$foursquare = rwmb_meta( 'esport-player-foursquare-url' );
				$slack = rwmb_meta( 'esport-player-slack-url' );
				$whatsapp = rwmb_meta( 'esport-player-whatsapp-url' );
				$skype = rwmb_meta( 'esport-player-skype-url' );
				$twitch = rwmb_meta( 'esport-player-twitch-url' );
				$paypal = rwmb_meta( 'esport-player-paypal-url' );
				$official_site = rwmb_meta( 'esport-player-official-site-url' );
				$custom_site = rwmb_meta( 'esport-player-custom-site-url' );
				$content = get_the_content();
				$title = get_the_title();
				if ( has_post_thumbnail() ) {
					$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'cloux-character-image' );
					if( !empty( $image_url ) ) {
						$output .= '<div class="image">';
								$output .= '<img src="' . esc_url( $image_url[0] ) . '" alt="' . esc_attr( $username ) . '" />';
								$output .= '<div class="plus"></div>';

							if( !empty( $username ) ) {
								$output .= '<div class="username-wrapper">';
									$output .= '<div class="username">' . esc_attr( $username ) . '</div>';
								$output .= '</div>';
							}
						$output .= '</div>';
					}
				}


				if( !empty( $content ) ) {
					$output .= '<div class="cloux-modal">';
						$output .= '<div class="modal-color modal-color-a"></div>';
						$output .= '<div class="modal-color modal-color-b"></div>';
						$output .= '<div class="cloux-modal-content">';
							$output .= '<div class="cloux-close"></div>';
							$output .= '<div class="content-inner">';
								$output .= '<div class="scrollbar-outer">';
									if( !empty( $username ) or !empty( $title ) ) {
										$output .= '<div class="username">';
											if( !empty( $username ) ) {
												$output .= esc_attr( $username );
											}

											if( !empty( $title ) ) {
												$output .= '<span>';
													$output .= esc_attr( $title );
												$output .= '</span>';
											}
										$output .= '</div>';
									}

									if( !empty( $facebook ) or !empty( $twitter ) or !empty( $google_plus ) or !empty( $pinterest ) or !empty( $linkedin ) or !empty( $youtube ) or !empty( $vimeo ) or !empty( $tumblr ) or !empty( $instagram ) or !empty( $flickr ) or !empty( $dribbble ) or !empty( $reddit ) or !empty( $soundcloud ) or !empty( $spotify ) or !empty( $yahoo ) or !empty( $behance ) or !empty( $codepen ) or !empty( $delicious ) or !empty( $stumbleupon ) or !empty( $deviantart ) or !empty( $digg ) or !empty( $github ) or !empty( $medium ) or !empty( $steam ) or !empty( $vk ) or !empty( $px500 ) or !empty( $foursquare ) or !empty( $slack ) or !empty( $whatsapp ) or !empty( $skype ) or !empty( $twitch ) or !empty( $paypal ) or !empty( $official_site ) or !empty( $custom_site ) ) {
										$output .= '<div class="social-links">';
											$output .= '<ul>';
												if( !empty( $facebook ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $facebook ) . '" target="_blank" title="' . esc_html__( 'Facebook', 'cloux' ) . '">';
															$output .= '<i class="fab fa-facebook-f" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $twitter ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $twitter ) . '" target="_blank" title="' . esc_html__( 'Twitter', 'cloux' ) . '">';
															$output .= '<i class="fab fa-twitter" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $google_plus ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $google_plus ) . '" target="_blank" title="' . esc_html__( 'Google+', 'cloux' ) . '">';
															$output .= '<i class="fab fa-google-plus-g" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $pinterest ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $pinterest ) . '" target="_blank" title="' . esc_html__( 'Pinterest', 'cloux' ) . '">';
															$output .= '<i class="fab fa-pinterest-p" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $linkedin ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $linkedin ) . '" target="_blank" title="' . esc_html__( 'LinkedIn', 'cloux' ) . '">';
															$output .= '<i class="fab fa-linkedin-in" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $youtube ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $youtube ) . '" target="_blank" title="' . esc_html__( 'YouTube', 'cloux' ) . '">';
															$output .= '<i class="fab fa-youtube" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $vimeo ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $vimeo ) . '" target="_blank" title="' . esc_html__( 'Vimeo', 'cloux' ) . '">';
															$output .= '<i class="fab fa-vimeo-v" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $tumblr ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $tumblr ) . '" target="_blank" title="' . esc_html__( 'Tumblr', 'cloux' ) . '">';
															$output .= '<i class="fab fa-tumblr" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $instagram ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $instagram ) . '" target="_blank" title="' . esc_html__( 'Instagram', 'cloux' ) . '">';
															$output .= '<i class="fab fa-instagram" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $flickr ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $flickr ) . '" target="_blank" title="' . esc_html__( 'Flickr', 'cloux' ) . '">';
															$output .= '<i class="fab fa-flickr" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $dribbble ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $dribbble ) . '" target="_blank" title="' . esc_html__( 'Dribbble', 'cloux' ) . '">';
															$output .= '<i class="fab fa-dribbble" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $reddit ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $reddit ) . '" target="_blank" title="' . esc_html__( 'Reddit', 'cloux' ) . '">';
															$output .= '<i class="fab fa-reddit-alien" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $soundcloud ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $soundcloud ) . '" target="_blank" title="' . esc_html__( 'SoundCloud', 'cloux' ) . '">';
															$output .= '<i class="fab fa-soundcloud" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $spotify ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $spotify ) . '" target="_blank" title="' . esc_html__( 'Spotify', 'cloux' ) . '">';
															$output .= '<i class="fab fa-spotify" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $yahoo ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $yahoo ) . '" target="_blank" title="' . esc_html__( 'Yahoo', 'cloux' ) . '">';
															$output .= '<i class="fab fa-yahoo" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $behance ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $behance ) . '" target="_blank" title="' . esc_html__( 'Behance', 'cloux' ) . '">';
															$output .= '<i class="fab fa-behance" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $codepen ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $codepen ) . '" target="_blank" title="' . esc_html__( 'CodePen', 'cloux' ) . '">';
															$output .= '<i class="fab fa-codepen" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $delicious ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $delicious ) . '" target="_blank" title="' . esc_html__( 'Delicious', 'cloux' ) . '">';
															$output .= '<i class="fab fa-delicious" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $stumbleupon ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $stumbleupon ) . '" target="_blank" title="' . esc_html__( 'Stumbleupon', 'cloux' ) . '">';
															$output .= '<i class="fab fa-stumbleupon" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $deviantart ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $deviantart ) . '" target="_blank" title="' . esc_html__( 'DeviantArt', 'cloux' ) . '">';
															$output .= '<i class="fab fa-deviantart" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $digg ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $digg ) . '" target="_blank" title="' . esc_html__( 'Digg', 'cloux' ) . '">';
															$output .= '<i class="fab fa-digg" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $github ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $github ) . '" target="_blank" title="' . esc_html__( 'GitHub', 'cloux' ) . '">';
															$output .= '<i class="fab fa-github" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $medium ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $medium ) . '" target="_blank" title="' . esc_html__( 'Medium', 'cloux' ) . '">';
															$output .= '<i class="fab fa-medium-m" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $steam ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $steam ) . '" target="_blank" title="' . esc_html__( 'Steam', 'cloux' ) . '">';
															$output .= '<i class="fab fa-steam-symbol" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $vk ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $vk ) . '" target="_blank" title="' . esc_html__( 'VK', 'cloux' ) . '">';
															$output .= '<i class="fab fa-vk" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $px500 ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $px500 ) . '" target="_blank" title="' . esc_html__( '500px', 'cloux' ) . '">';
															$output .= '<i class="fab fa-500px" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $foursquare ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $foursquare ) . '" target="_blank" title="' . esc_html__( 'Foursquare', 'cloux' ) . '">';
															$output .= '<i class="fab fa-foursquare" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $slack ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $slack ) . '" target="_blank" title="' . esc_html__( 'Slack', 'cloux' ) . '">';
															$output .= '<i class="fab fa-slack-hash" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $whatsapp ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $whatsapp ) . '" target="_blank" title="' . esc_html__( 'WhatsApp', 'cloux' ) . '">';
															$output .= '<i class="fab fa-whatsapp" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $skype ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $skype ) . '" target="_blank" title="' . esc_html__( 'Skype', 'cloux' ) . '">';
															$output .= '<i class="fab fa-skype" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $twitch ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $twitch ) . '" target="_blank" title="' . esc_html__( 'Twitch', 'cloux' ) . '">';
															$output .= '<i class="fab fa-twitch" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $paypal ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $paypal ) . '" target="_blank" title="' . esc_html__( 'PayPal', 'cloux' ) . '">';
															$output .= '<i class="fab fa-paypal" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $official_site ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $official_site ) . '" target="_blank" title="' . esc_html__( 'Official Site', 'cloux' ) . '">';
															$output .= '<i class="fas fa-external-link-alt" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $custom_site ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $custom_site ) . '" target="_blank" title="' . esc_html__( 'Link', 'cloux' ) . '">';
															$output .= '<i class="fas fa-external-link-alt" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
											$output .= '</ul>';
										$output .= '</div>';
									}

									if( !empty( $content ) ) {
										$output .= '<div class="content">' . do_shortcode( $content ) . '</div>';
									}
								$output .= '</div>';
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				}
			}
		}

		return $output;
	}



	/*======
	*
	* eSport Player Listing
	*
	======*/
	function cloux_esport_player_listing() {
		function cloux_esport_player_list_style_1() {
			echo '<div class="post-list-style-2 post-list column-2">';
				while ( have_posts() ) : the_post();
					echo cloux_post_style_2( $post = get_the_ID(), $image = "true", $excerpt = "true", $detail = "false", $read_more = "false" );
				endwhile;
			echo '</div>';
		}

		cloux_esport_player_list_style_1();
	}



	/*======
	*
	* Game List Styles
	*
	======*/
	function cloux_game_style_1( $game = "", $poster = "", $genre = "", $platform = "", $price = "", $excerpt = "" ) {
		$output = "";
		if( !empty( $game ) ) {
			$output .= '<div class="game game-styles game-style-1">';
				if( $poster == "true" ) {
					if ( function_exists( 'rwmb_meta' ) ) {
						$game_poster = rwmb_meta( 'game-poster' );
						if( !empty( $game_poster ) ) {
							foreach ( $game_poster as $image ) {
								if( !empty( $image ) ) {
									$image_src = wp_get_attachment_image_src( esc_attr( $image["ID"] ), 'cloux-poster-medium' );
									if( !empty( $image_src ) ) {
										$output .= '<div class="poster">';
											$output .= '<a href="' . get_the_permalink( $game ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $game ) ) . '">';
												$output .= '<img src="' . esc_url( $image_src[0] ) . '" width="' . esc_attr( $image_src[1] ) . '" height="' . esc_attr( $image_src[2] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => $game ) ) . '">';
											$output .= '</a>';
											if( $genre == "true" ) {
												$genres = wp_get_post_terms( $game, 'genre' );
												if( !empty( $genres ) ) {
													$output .= '<div class="genre">';
														$output .= '<ul>';
															foreach( $genres as $genre ) {
																if( !empty( $genre ) ) {
																	$output .= '<li>';
																		$output .= '<a href="' . get_term_link( $genre->term_id ) . '" title="' . esc_attr( $genre->name ) . '">' . esc_attr( $genre->name ) . '</a>';
																	$output .= '</li>';
																}
															}
														$output .= '</ul>';
														$output .= '<i class="fas fa-tags" aria-hidden="true"></i>';
													$output .= '</div>';
												}
											}
										$output .= '</div>';
									}
								}
							}
						}
					}
				}

				$output .= '<div class="content">';
					$output .= '<div class="title">';
						$output .= '<a href="' . get_the_permalink( $game ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $game ) ) . '">' . get_the_title( $game ) . '</a>';
					$output .= '</div>';

					if( $platform == "true" or $price == "true" ) {
						$output .= cloux_game_details( $game = $game, $platform = $platform, $genre = "false", $style = "style-1", $price = $price );
					}

					if( $excerpt == "true" ) {
						$summary = get_the_excerpt();
						if( !empty( $summary ) ) {
							$output .= '<div class="summary">' . get_the_excerpt() . '</div>';
						}
					}
				$output .= '</div>';
			$output .= '</div>';

		}
		return $output;
	}



	function cloux_game_style_2( $game = "", $platform = "", $price = "", $genre = "" ) {
		$output = "";
		if( !empty( $game ) ) {
			$output .= '<div class="game game-styles game-style-2">';
				if ( function_exists( 'rwmb_meta' ) ) {
					$game_poster = rwmb_meta( 'game-poster' );
					$output .= '<div class="wrap">';
						$output .= '<a href="' . get_the_permalink( $game ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $game ) ) . '"></a>';
						if( !empty( $game_poster ) ) {
							foreach ( $game_poster as $image ) {
								if( !empty( $image ) ) {
									$image_src = wp_get_attachment_image_src( esc_attr( $image["ID"] ), 'cloux-poster-medium' );
									if( !empty( $image_src ) ) {
										$output .= '<div class="poster">';
											$output .= '<img src="' . esc_url( $image_src[0] ) . '" width="' . esc_attr( $image_src[1] ) . '" height="' . esc_attr( $image_src[2] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => $game ) ) . '">';
										$output .= '</div>';
									}
								}
							}
						}
						$output .= '<div class="content main-content">';
							$output .= '<div class="title">';
								$output .= '<a href="' . get_the_permalink( $game ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $game ) ) . '">' . get_the_title( $game ) . '</a>';
							$output .= '</div>';

							if( $platform == "true" or $price == "true" or $genre == "true" ) {
								$output .= cloux_game_details( $game = $game, $platform = $platform, $genre = $genre, $style = "style-1", $price = $price );
							}
						$output .= '</div>';
						$output .= '<div class="content hover-content">';
							$output .= '<div class="title">';
								$output .= '<a href="' . get_the_permalink( $game ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $game ) ) . '">' . get_the_title( $game ) . '</a>';
							$output .= '</div>';

						$output .= '</div>';
					$output .= '</div>';
				}
			$output .= '</div>';

		}
		return $output;
	}



	function cloux_game_style_3( $game = "", $image = "", $platform = "", $price = "", $genre = "", $excerpt = "" ) {
		$output = "";
		if( !empty( $game ) ) {
			$output .= '<div class="game game-styles game-style-3">';
				if ( function_exists( 'rwmb_meta' ) ) {
					if ( has_post_thumbnail() ) {
						$output .= '<div class="image">';
							$output .= '<a href="' . get_the_permalink( $game ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $game ) ) . '">';
								$output .= get_the_post_thumbnail( $game, 'cloux-post-5' );
							$output .= '</a>';
						$output .= '</div>';
					}

					$output .= '<div class="content">';
						$output .= '<div class="title">';
							$output .= '<a href="' . get_the_permalink( $game ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $game ) ) . '">' . get_the_title( $game ) . '</a>';
						$output .= '</div>';

						if( $platform == "true" or $price == "true" or $genre == "true" ) {
							$output .= cloux_game_details( $game = $game, $platform = $platform, $genre = $genre, $style = "style-1", $price = $price );
						}

						if( $excerpt == "true" ) {
							$summary = get_the_excerpt();
							if( !empty( $summary ) ) {
								$output .= '<div class="summary">' . get_the_excerpt() . '</div>';
							}
						}
					$output .= '</div>';

				}
			$output .= '</div>';

		}
		return $output;
	}



	/*======
	*
	* Game Listing
	*
	======*/
	function cloux_game_listing() {
		function cloux_game_list_style_1() {
			$listing_column = 'column-' . get_theme_mod( 'cloux_games_archive_listing_column', '2' );

			echo '<div class="game-list-style-1 game-list ' . esc_attr( $listing_column ) . '">';
				while ( have_posts() ) : the_post();
					echo cloux_game_style_1( $game = get_the_ID(), $poster = "true", $genre = "true", $platform = "true", $price = "true", $excerpt = "true" );
				endwhile;
			echo '</div>';
		}



		function cloux_game_list_style_2() {
			$listing_column = 'column-' . get_theme_mod( 'cloux_games_archive_listing_column', '2' );

			echo '<div class="game-list-style-2 game-list ' . esc_attr( $listing_column ) . '">';
				while ( have_posts() ) : the_post();
					echo cloux_game_style_2( $game = get_the_ID(), $platform = "true", $price = "true", $genre = "true" );
				endwhile;
			echo '</div>';
		}



		function cloux_game_list_style_3() {
			$listing_column = 'column-' . get_theme_mod( 'cloux_games_archive_listing_column', '2' );

			echo '<div class="game-list-style-3 content-box game-list ' . esc_attr( $listing_column ) . '">';
				while ( have_posts() ) : the_post();
					echo cloux_game_style_3( $game = get_the_ID(), $image = "true", $platform = "true", $price = "true", $genre = "true", $excerpt = "true" );
				endwhile;
			echo '</div>';
		}

		$list_style = get_theme_mod( 'cloux_games_archive_listing_style', 'style-1' );

		if( $list_style == "style-2" ) {
			cloux_game_list_style_2();
		} elseif( $list_style == "style-3" ) {
			cloux_game_list_style_3();
		} else {
			cloux_game_list_style_1();
		}
	}



	/*======
	*
	* Post List Styles
	*
	======*/
	function cloux_post_style_1( $post = "", $image = "", $excerpt = "", $details = "", $read_more = "", $button_style = "style-1", $post_detail_style = "style-1" ) {
		$output = "";
		if( !empty( $post ) ) {
			if ( is_sticky( $post ) ) {
				$output .= '<div class="post post-styles post-style-1 sticky-post">';
			} else {
				$output .= '<div class="post post-styles post-style-1">';
			}
				if( $image == "true" ) {
					if ( has_post_thumbnail( $post ) ) {
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post ), 'cloux-post-1' );
						if( !empty( $image_url ) ) {
							$output .= '<div class="image">';
								$output .= '<a href="' . get_the_permalink( $post ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post ) ) . '">';
									$output .= '<img src="' . esc_url( $image_url[0] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => $post ) ) . '" />';
								$output .= '</a>';
							$output .= '</div>';
						}
					}
				}

				$output .= '<div class="content">';
					$output .= '<div class="title">';
						$output .= '<a href="' . get_the_permalink( $post ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post ) ) . '">' . get_the_title( $post ) . '</a>';
					$output .= '</div>';

					if( $excerpt == 'true' ) {
						$summary = get_the_excerpt();
						if( !empty( $summary ) ) {
							$output .= '<div class="summary">' . get_the_excerpt() . '</div>';
						}
					}

					if( $read_more == 'true' or $details == 'true' ) {
						$output .= '<div class="details">';
							if( $details == 'true' ) {
								$output .= cloux_post_details( $post = get_the_ID(), $author = "true", $comment = "true", $category = "true", $date = "true", $style = $post_detail_style );
							}

							if( $read_more == 'true' ) {
								$output .= cloux_read_more_button( $post = get_the_ID(), $style = $button_style );
							}
						$output .= '</div>';
					}
				$output .= '</div>';

			$output .= '</div>';
		}
		return $output;
	}



	function cloux_post_style_2( $post = "", $image = "", $excerpt = "", $details = "", $read_more = "", $button_style = "style-1", $post_detail_style = "style-1" ) {
		$output = "";
		if( !empty( $post ) ) {
			if ( is_sticky( $post ) ) {
				$output .= '<div class="post post-styles post-style-2 sticky-post">';
			} else {
				$output .= '<div class="post post-styles post-style-2">';
			}
				$output .= '<div class="post-inner-wrapper">';
					if( $image == "true" ) {
						if ( has_post_thumbnail( $post ) ) {
							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post ), 'cloux-post-3' );
							if( !empty( $image_url ) ) {
								$output .= '<div class="image">';
									$output .= '<a href="' . get_the_permalink( $post ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post ) ) . '">';
										$output .= '<img src="' . esc_url( $image_url[0] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => $post ) ) . '" />';
									$output .= '</a>';
								$output .= '</div>';
							}
						}
					}

					$output .= '<div class="content">';
						$output .= '<div class="title">';
							$output .= '<a href="' . get_the_permalink( $post ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post ) ) . '">' . get_the_title( $post ) . '</a>';
						$output .= '</div>';

						if( $excerpt == 'true' ) {
							$summary = get_the_excerpt();
							if( !empty( $summary ) ) {
								$output .= '<div class="summary">' . get_the_excerpt() . '</div>';
							}
						}

						if( $read_more == 'true' or $details == 'true' ) {
							$output .= '<div class="details">';
								if( $details == 'true' ) {
									$output .= cloux_post_details( $post = get_the_ID(), $author = "false", $comment = "false", $category = "true", $date = "true", $style = $post_detail_style );
								}

								if( $read_more == 'true' ) {
									$output .= cloux_read_more_button( $post = get_the_ID(), $style = $button_style );
								}
							$output .= '</div>';
						}
					$output .= '</div>';

				$output .= '</div>';
			$output .= '</div>';
		}
		return $output;
	}



	function cloux_post_style_3( $post = "", $image = "", $excerpt = "", $details = "", $read_more = "", $button_style = "style-1", $post_detail_style = "style-1" ) {
		$output = "";
		if( !empty( $post ) ) {
			if ( is_sticky( $post ) ) {
				$output .= '<div class="post post-styles post-style-3 sticky-post">';
			} else {
				$output .= '<div class="post post-styles post-style-3">';
			}
				if( $image == "true" ) {
					if ( has_post_thumbnail( $post ) ) {
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post ), 'cloux-post-3' );
						if( !empty( $image_url ) ) {
							$output .= '<div class="image">';
								$output .= '<a href="' . get_the_permalink( $post ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post ) ) . '">';
									$output .= '<img src="' . esc_url( $image_url[0] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => $post ) ) . '" />';
								$output .= '</a>';
							$output .= '</div>';
						}
					}
				}

				$output .= '<div class="content">';
					$output .= '<div class="title">';
						$output .= '<a href="' . get_the_permalink( $post ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post ) ) . '">' . get_the_title( $post ) . '</a>';
					$output .= '</div>';

					if( $excerpt == 'true' ) {
						$summary = get_the_excerpt();
						if( !empty( $summary ) ) {
							$output .= '<div class="summary">' . get_the_excerpt() . '</div>';
						}
					}

					if( $read_more == 'true' or $details == 'true' ) {
						$output .= '<div class="details">';
							if( $details == 'true' ) {
								$output .= cloux_post_details( $post = get_the_ID(), $author = "true", $comment = "false", $category = "true", $date = "true", $style = $post_detail_style );
							}

							if( $read_more == 'true' ) {
								$output .= cloux_read_more_button( $post = get_the_ID(), $style = $button_style );
							}
						$output .= '</div>';
					}
				$output .= '</div>';
			$output .= '</div>';
		}
		return $output;
	}



	function cloux_post_style_4( $post = "", $image = "", $details = "", $post_detail_style = "style-1" ) {
		$output = "";
		if( !empty( $post ) ) {
			if ( is_sticky( $post ) ) {
				$output .= '<div class="post post-styles post-style-4 sticky-post">';
			} else {
				$output .= '<div class="post post-styles post-style-4">';
			}
				if( $image == "true" ) {
					if ( has_post_thumbnail( $post ) ) {
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post ), 'cloux-post-2' );
						if( !empty( $image_url ) ) {
							$output .= '<div class="image">';
								$output .= '<a href="' . get_the_permalink( $post ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post ) ) . '">';
									$output .= '<img src="' . esc_url( $image_url[0] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => $post ) ) . '" />';
								$output .= '</a>';
							$output .= '</div>';
						}
					}
				}

				$output .= '<div class="content">';
					$output .= '<div class="title">';
						$output .= '<a href="' . get_the_permalink( $post ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post ) ) . '">' . get_the_title( $post ) . '</a>';
					$output .= '</div>';

					if( $details == 'true' ) {
						$output .= cloux_post_details( $post = get_the_ID(), $author = "false", $comment = "false", $category = "false", $date = "true", $style = $post_detail_style );
					}
					
				$output .= '</div>';
			$output .= '</div>';
		}
		return $output;
	}



	/*======
	*
	* Post Listing
	*
	======*/
	function cloux_post_listing() {
		function cloux_post_list_style_1() {
			echo '<div class="post-list-style-1 post-list">';
				while ( have_posts() ) : the_post();
					echo cloux_post_style_1( $post = get_the_ID(), $image = "true", $excerpt = "true", $detail = "true", $read_more = "true" );
				endwhile;
			echo '</div>';
		}

		function cloux_post_list_style_2() {
			echo '<div class="post-list-style-2 post-list">';
				while ( have_posts() ) : the_post();
					echo cloux_post_style_2( $post = get_the_ID(), $image = "true", $excerpt = "true", $detail = "true", $read_more = "true" );
				endwhile;
			echo '</div>';
		}

		function cloux_post_list_style_3() {
			echo '<div class="post-list-style-3 post-list">';
				while ( have_posts() ) : the_post();
					echo cloux_post_style_3( $post = get_the_ID(), $image = "true", $excerpt = "true", $detail = "true", $read_more = "true" );
				endwhile;
			echo '</div>';
		}

		if( is_category() ) {
			$list_style = get_theme_mod( 'cloux_archives_categories_post_style', 'style-1' );
		} elseif( is_tag() ) {
			$list_style = get_theme_mod( 'cloux_archives_tags_post_style', 'style-1' );
		} elseif( is_search() ) {
			$list_style = get_theme_mod( 'cloux_archives_searches_post_style', 'style-1' );
		} elseif( is_author() ) {
			$list_style = get_theme_mod( 'cloux_archives_authors_post_style', 'style-1' );
		} else {
			$list_style = get_theme_mod( 'cloux_archives_archives_post_style', 'style-1' );
		}

		if( $list_style == "style-2" ) {
			cloux_post_list_style_2();
		} elseif( $list_style == "style-3" ) {
			cloux_post_list_style_3();
		} else {
			cloux_post_list_style_1();
		}
	}



	/*======
	*
	* Read More Button
	*
	======*/
	function cloux_read_more_button( $post = "", $style = "" ) {
		if( !empty( $post ) ) {
			if( !empty( $style ) ) {
				$style = esc_attr( $style );
			} else {
				$style = "style-1";
			}

			$output = '';
			$output .= '<div class="cloux-button ' . esc_attr( $style ) . '">';
				$output .= '<a href="' . get_the_permalink( $post ) . '" title="' . esc_html__( 'Read More', 'cloux' ) . '"><span>' . esc_html__( 'Read More', 'cloux' ) . '</span></a>';
			$output .= '</div>';
			return $output;
		}
	}



	/*======
	*
	* Pagination for Archive
	*
	======*/
	function cloux_pagination( $style = "" ) {
		if( is_singular() )
			return;

		global $wp_query;

		if( $wp_query->max_num_pages <= 1 )
			return;

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max   = intval( $wp_query->max_num_pages );

		if( $paged >= 1 )
			$links[] = $paged;

		if( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}

		if( !empty( $style ) ) {
			$style = esc_attr( $style );
		} else {
			$style = "style-1";
		}

		$prev = '<span>' . esc_html__( 'Previous', 'cloux' ) . '</span>';
		$next = '<span>' . esc_html__( 'Next', 'cloux' ) . '</span>';
		$prev_text = '<i class="fas fa-chevron-left" aria-hidden="true"></i>' . $prev;
		$next_text = $next . '<i class="fas fa-chevron-right" aria-hidden="true"></i>';

		echo '<nav class="post-pagination ' . esc_attr( $style ) . '"><ul>' . "\n";

		if( get_previous_posts_link() )
			printf( '<li class="previous">' . get_previous_posts_link( $prev_text ) . '</li>' );

		?>
			<li class="total-pages"><span><?php echo esc_html__( 'Page', 'cloux' ) . ' ' . $paged . ' ' . esc_html__( 'of', 'cloux' ) . ' ' . $max; ?></span></li>
		<?php
		if( get_next_posts_link() )
			printf( '<li class="next">' . get_next_posts_link( $next_text ) . '</li>' );

		echo '</ul></nav>' . "\n";
	}



	/*======
	*
	* Pagination for Elements
	*
	======*/
	function cloux_element_pagination( $paged = "", $query = "", $style = "" ) {
		if( !empty( $paged ) or !empty( $query ) ) {
			if( !empty( $style ) ) {
				$style = esc_attr( $style );
			} else {
				$style = "style-1";
			}

			$output = "";
			$prev = '<span>' . esc_html__( 'Previous', 'cloux' ) . '</span>';
			$next = '<span>' . esc_html__( 'Next', 'cloux' ) . '</span>';	
			$prev_text = '<i class="fas fa-chevron-left" aria-hidden="true"></i>' . $prev;
			$next_text = $next . '<i class="fas fa-chevron-right" aria-hidden="true"></i>';
			$prev_link = get_previous_posts_link( $prev_text );
			$next_link = get_next_posts_link( $next_text, $query->max_num_pages );

			if( !empty( $prev_link ) or !empty( $next_link ) ) {
				$output .= '<nav class="post-pagination ' . esc_attr( $style ) . '">';
					$output .= '<ul>';
						$prev_link = get_previous_posts_link( $prev_text );
						if( !empty( $prev_link ) ) {
							$output .= '<li class="previous">' . get_previous_posts_link( $prev_text ) . '</li>';
						}

						$next_link = get_next_posts_link( $next_text, $query->max_num_pages );
						if( !empty( $next_link ) ) {
							$output .= '<li class="next">' . get_next_posts_link( $next_text, $query->max_num_pages ) . '</li>';
						}
					$output.= '</ul>';
				$output .= '</nav>';
			}

			return $output;
		}
	}



	/*======
	*
	* Elements of Game Singles
	*
	======*/
		/*====== Related Games ======*/
		function cloux_related_games( $game = "" ) {
			$tags = wp_get_post_tags( $game );
			$count = get_theme_mod( 'cloux_games_related_games_count', '6' );
			if ( !empty( $tags ) ) {
				$tag_ids = array();
				foreach( $tags as $individual_tag ) {
					$tag_ids[] = $individual_tag->term_id;
				}
				if( !empty( $tag_ids ) ) {
					$args = array(
						'tag__in' => $tag_ids,
						'post__not_in' => array( $game ),
						'post_status' => 'publish',
						'post_type' => 'game',
						'ignore_sticky_posts' => true,
						'posts_per_page' => $count
					);
					$wp_query = new wp_query( $args );
					if ( $wp_query->have_posts() ) {
						$output = '<div class="related-games content-box">';
							$output .= cloux_title( $title = esc_html__( 'More', 'cloux' ), $style = "style-4", $align = "left", $colored_title = esc_html__( 'Like This', 'cloux' ) );
							$output .= '<div class="cloux-slider related-games-slider" data-item="3" data-dots="false" data-arrows="true" data-prevarrow="' . esc_attr( '<div class="prev"><i class="fas fa-chevron-left" aria-hidden="true"></i></div>' ) . '" data-nextarrow="' . esc_attr( '<div class="next"><i class="fas fa-chevron-right" aria-hidden="true"></i></div>' ) . '">';
								while( $wp_query->have_posts() ) {
									$wp_query->the_post();
									$output .= '<div class="item">';
										$output .= cloux_game_style_1( $game = get_the_ID(), $poster = "true", $genre = "true", $platform = "true", $price = "true", $excerpt = "true" );
									$output .= '</div>';
								}
							$output .= '</div>';
						$output .= '</div>';
						return $output;
					}
					wp_reset_postdata();
				}
			}
		}



		/*====== Post Details ======*/
		function cloux_game_details( $game = "", $platform = "", $genre = "", $style = "", $price = "" ) {
			if( !empty( $game ) ) {
				if( !empty( $style ) ) {
					$style = esc_attr( $style );
				} else {
					$style = "style-1";
				}

				if( !empty( $game ) or $platform == "true" or $genre == "true" ) {
					$output = '';
					$output .= '<ul class="game-details ' . esc_attr( $style ) . '">';
						if( $platform == "true" ) {
							$platforms = wp_get_post_terms( $game, 'platform' );
							if( !empty( $platforms ) ) {
								$output .= '<li class="platform">';
									$output .= '<i class="fas fa-tv" aria-hidden="true"></i>';
									$output .= '<ul>';
										foreach( $platforms as $platform ) {
											if ( !empty( $platform ) ) {
												$output .= '<li>';
													$output .= '<a href="' . get_term_link( $platform->term_id ) . '" title="' . esc_attr( $platform->name ) . '">' . esc_attr( $platform->name ) . '</a>';
												$output .= '</li>';
											}
										}
									$output .= '</ul>';
								$output .= '</li>';
							}
						}
						if( $price == "true" ) {
							if ( function_exists( 'rwmb_meta' ) ) {
								$price = rwmb_meta( 'game-main-price' );
								$currency = rwmb_meta( 'game-main-price-currency' );
								if( !empty( $price ) ) {
									$output .= '<li class="price">';
										$output .= '<i class="fas fa-credit-card" aria-hidden="true"></i>';
										$output .= '<span>';
											$output .= esc_attr( $price );
											if( !empty( $currency ) ) {
												$output .= esc_attr( $currency );
											}
										$output .= '</span>';
									$output .= '</li>';
								}
							}
						}
						if( $genre == "true" ) {
							$genres = wp_get_post_terms( get_the_ID(), 'genre' );
							if( !empty( $genres ) ) {
								$output .= '<li class="genre">';
									$output .= '<i class="fas fa-tags" aria-hidden="true"></i>';
									$output .= '<ul>';
										foreach( $genres as $genre ) {
											if( !empty( $genre ) ) {
												$output .= '<li>';
													$output .= '<a href="' . get_term_link( $genre->term_id ) . '" title="' . esc_attr( $genre->name ) . '">' . esc_attr( $genre->name ) . '</a>';
												$output .= '</li>';
											}
										}
									$output .= '</ul>';
								$output .= '</li>';
							}
						}
					$output .= '</ul>';
					return $output;
				}
			}
		}



		/*====== Game Price List ======*/
		function cloux_game_price_list() {
			if ( function_exists( 'rwmb_meta' ) ) {
				$output = "";
				$lists = rwmb_meta( 'game-price-list' );
				$lists_status = rwmb_meta( 'price-list-status' );

				if( $lists_status == "1" ) {
					if( !empty( $lists ) ) {
						$output .= '<div class="game-price-list" id="buynow">';
							foreach ( $lists as $list ) {
								if( !empty( $list ) ) {

									$contact_form_default = get_theme_mod( 'cloux_games_sales_contact_form' );
									$title =  isset( $list['title'] ) ? $list['title'] : '';
									$type =  isset( $list['sales-type'] ) ? $list['sales-type'] : '';
									$game_woo_product =  isset( $list['woocommerce-product'] ) ? $list['woocommerce-product'] : '';
									$platforms =  isset( $list['platform'] ) ? $list['platform'] : '';
									$price =  isset( $list['price'] ) ? $list['price'] : '';
									$text =  isset( $list['text'] ) ? $list['text'] : '';

									$button_target =  isset( $list['button-target'] ) ? $list['button-target'] : '';
									$button_link =  isset( $list['button-link'] ) ? $list['button-link'] : '';
									$button_text =  isset( $list['button-text'] ) ? $list['button-text'] : '';
									if( empty( $button_text ) ) {
										$button_text = esc_html__( 'Buy Now', 'cloux' );
									}

									$details_button_type =  isset( $list['details-button-type'] ) ? $list['details-button-type'] : '';
									$details_button_link =  isset( $list['details-button-link'] ) ? $list['details-button-link'] : '';
									$details_popup_content =  isset( $list['details-popup-content'] ) ? $list['details-popup-content'] : '';
									$details_button_text =  isset( $list['details-button-text'] ) ? $list['details-button-text'] : '';
									if( empty( $details_button_text ) ) {
										$details_button_text = esc_html__( 'Details', 'cloux' );
									}

									$contact_form =  isset( $list['contact-form'] ) ? $list['contact-form'] : '';
									$working_style =  isset( $list['working-style'] ) ? $list['working-style'] : '';
									$image_gallery =  isset( $list['image-gallery'] ) ? $list['image-gallery'] : '';
									$bg_image =  isset( $list['bg-image'] ) ? $list['bg-image'] : '';

									if( !empty( $type ) or !empty( $title ) or !empty( $price ) or !empty( $text ) or !empty( $working_style ) ) {
										$item_bg = "";
										$bg_class = "";
										if( !empty( $bg_image ) ) {
											foreach ( $bg_image as $img ) {
												if( !empty( $img ) ) {
													$image_src = wp_get_attachment_image_src( esc_attr( $img ), 'full' );
													if( !empty( $image_src ) ) {
														$item_bg = ' style="background-image:url(' . esc_url( $image_src[0] ) . ');"';
														$bg_class = ' background-active';
													}
												}
											}
										}

										$output .= '<div class="game-price-item widget-box' . $bg_class . '"' . $item_bg . '>';
											$output .= '<div class="content">';
												if( !empty( $title ) ) {
													$output .= '<div class="title item">';
														$output .= esc_attr( $title );
													$output .= '</div>';
												}
												if( !empty( $game_woo_product ) or !empty( $platforms ) or !empty( $price ) ) {
													$output .= '<ul class="game-details style-1 item">';
														if( !empty( $platforms ) ) {
															$output .= '<li class="item platform">';
																$output .= '<i class="fas fa-tv" aria-hidden="true"></i>';
																$output .= '<ul>';
																	foreach( $platforms as $platform ) {
																		if( !empty( $platform ) ) {
																			$item = get_term( $platform, 'platform' );
																			if( !empty( $item ) ) {
																				$output .= '<li>';
																					$output .= '<a href="' . get_term_link( $item->term_id ) . '" title="' . esc_attr( $item->name ) . '">' . esc_attr( $item->name ) . '</a>';
																				$output .= '</li>';
																			}
																		}
																	}
																$output .= '</ul>';
															$output .= '</li>';
														}
														if( !empty( $price ) or !empty( $game_woo_product ) ) {
															$output .= '<li class="item price">';
																$output .= '<i class="far fa-money-bill-alt" aria-hidden="true"></i>';
																if( $type == "woocommerce" and !empty( $game_woo_product ) ) {
																	if ( function_exists( 'is_product' ) and function_exists( 'is_woocommerce' ) ) {
																		$product = wc_get_product( $game_woo_product );
																		$output .= '<span class="woo-product-price">' . $product->get_price_html() . '</span>';
																	} else {
																		$output .= '<span>' . esc_attr( $price ) . '</span>';
																	}
																} else {
																	$output .= '<span>' . esc_attr( $price ) . '</span>';
																}
															$output .= '</li>';
														}
													$output .= '</ul>';
												}
												if( !empty( $text ) ) {
													$output .= '<div class="text item">';
														$output .= $text;
													$output .= '</div>';
												}

												if( !empty( $image_gallery ) ) {
													$output .= '<div class="gallery item">';
														$rand = rand( 0, 99999 );
														foreach ( $image_gallery as $image_gallery_item ) {
															if( !empty( $image_gallery_item ) ) {
																$thumb_image_src = wp_get_attachment_image_src( esc_attr( $image_gallery_item ), 'cloux-gallery-thumbnail' );
																$large_image_src = wp_get_attachment_image_src( esc_attr( $image_gallery_item ), 'cloux-lightbox' );
																if( !empty( $thumb_image_src ) and !empty( $large_image_src ) ) {
																	$output .= '<div class="item">';
																		$output .= '<a href="' . esc_url( $large_image_src[0] ) . '" rel="prettyPhoto[price-gallery-' . esc_attr( $rand ) .  ']">';
																			$output .= '<img src="' . esc_url( $thumb_image_src[0] ) . '" width="' . esc_attr( $thumb_image_src[1] ) . '" height="' . esc_attr( $thumb_image_src[2] ) . '">';
																		$output .= '</a>';
																	$output .= '</div>';
																}
															}
														}
													$output .= '</div>';
												}

												if( $type == "contact-form" ) {
													if( $working_style == "style-2" or $working_style == "style-1" ) {
														$output .= '<div class="contact-form item">';
															if( $working_style == "style-1" ) {
																$output .= '<div class="wrap">';
															}
																if( !empty( $contact_form ) ) {
																	$output .= do_shortcode( $contact_form );
																} else {
																	if( !empty( $contact_form_default ) ) {
																		$output .= do_shortcode( $contact_form_default );
																	}
																}
															if( $working_style == "style-1" ) {
																$output .= '</div>';
															}
														$output .= '</div>';
													}
												}

											$output .= '</div>';
											$output .= '<div class="buttons">';
												if( $type == "woocommerce" ) {
													if( !empty( $game_woo_product ) ) {
														$output .= '<div class="cloux-button style-1">';
															$output .= '<a href="?add-to-cart=' . esc_attr( $game_woo_product ) . '" title="' . esc_attr( $button_text ) . '">' . esc_attr( $button_text ) . '</a>';
														$output .= '</div>';
													}
												} elseif( $type == "external-link" ) {
													if( !empty( $button_link ) ) {
														if( $button_target == "_blank" ) {
															$target = "_blank";
														} else {
															$target = "_self";
														}

														$output .= '<div class="cloux-button style-1">';
															$output .= '<a href="' . esc_url( $button_link ) . '" title="' . esc_attr( $button_text ) . '" target="' . esc_attr( $target ) . '">' . esc_attr( $button_text ) . '</a>';
														$output .= '</div>';
													}
												} elseif( $type == "contact-form" ) {
													if( $working_style == "style-1" ) {
														$output .= '<div class="cloux-button style-1 game-purchase-contact-form">';
															$output .= '<a href="#game-purchase-contact-form" title="' . esc_attr( $button_text ) . '">' . esc_attr( $button_text ) . '</a>';
														$output .= '</div>';
													}
												}

												if( !empty( $details_button_link ) or $details_button_type == "popup" ) {
													if( $details_button_type == "blank-link" ) {
														$details_target = "_blank";
													} elseif( $details_button_type == "self-link" ) {
														$details_target = "_self";
													} elseif( $details_button_type == "popup" ) {
														$details_target = "_self";
													}

													if( $details_button_type == "popup" ) {
														if( !empty( $details_popup_content ) ) {
															$rand = rand( 0, 99999 );
															$output .= '<div class="cloux-button style-1 purchase-modal" data-purchase-button="' . esc_attr( $rand ) . '">';
																$output .= '<a title="' . esc_attr( $details_button_text ) . '" target="' . esc_attr( $details_target ) . '">' . esc_attr( $details_button_text ) . '</a>';
																$output .= '<div class="cloux-modal">';
																	$output .= '<div class="modal-color modal-color-a"></div>';
																	$output .= '<div class="modal-color modal-color-b"></div>';
																	$output .= '<div class="cloux-modal-content">';
																		$output .= '<div class="cloux-close"></div>';
																		$output .= '<div class="content-inner">';
																			$output .= '<div class="scrollbar-outer">';
																				$output .= cloux_title( $title = esc_html__( 'Details', 'cloux' ), $style = "style-3", $align = "center" );
																				$output .= wpautop( $details_popup_content );
																			$output .= '</div>';
																		$output .= '</div>';
																	$output .= '</div>';
																$output .= '</div>';
															$output .= '</div>';
														}
													} else {
														if( !empty( $details_button_link ) ) {
															$output .= '<div class="cloux-button style-1">';
																$output .= '<a href="' . esc_url( $details_button_link ) . '" title="' . esc_attr( $details_button_text ) . '" target="' . esc_attr( $details_target ) . '">' . esc_attr( $details_button_text ) . '</a>';
															$output .= '</div>';
														}
													}

												}
											$output .= '</div>';
										$output .= '</div>';
									}
								}
							}
						$output .= '</div>';
					}
				}
				return $output;
			}
		}



		/*====== Game Related News ======*/
		function cloux_game_related_news() {
			if ( function_exists( 'rwmb_meta' ) ) {
				$output = "";
				$current_post = get_the_ID();
				$count = get_theme_mod( 'cloux_games_related_news_count', 3 );

				$query_arg = array(
					'posts_per_page' => $count,
					'offset' => 0,
					'post_status' => 'publish',
					'ignore_sticky_posts' => true,
					'post_type' => 'post',
					'meta_query' => array(
						array(
							'key' => 'releated-games',
							'value' => array( $current_post ),
							'compare' => 'IN',
						),
					),
				);
				$post_query = new WP_Query( $query_arg );
				if ( $post_query->have_posts() ) {
					$output .= '<div class="game-related-news widget-box">';
						$output .= cloux_title( $title = esc_html__( 'Related', 'cloux' ), $style = "style-4", $align = "left", $colored_title = esc_html__( 'News', 'cloux' ) );
						$output .= '<ul class="post-list-style-4">';
							while ( $post_query->have_posts() ) {
								$post_query->the_post();
								$output .= '<li>';
									$output .= cloux_post_style_4( $post = get_the_ID(), $image = "true", $details = "true", $post_detail_style = "style-1" );
								$output .= '</li>';
							}
						$output .= '</ul>';
					$output .= '</div>';
					wp_reset_postdata();
				}
				return $output;
			}
		}



		/*====== Game Contact ======*/
		function cloux_game_contact() {
			if ( function_exists( 'rwmb_meta' ) ) {
				$output = "";
				$contact_page = get_theme_mod( 'cloux_games_contact_page' );
				$report_page = get_theme_mod( 'cloux_games_report_page' );
				$general_copyright = get_theme_mod( 'cloux_games_general_copyright' );
				$copyright = rwmb_meta( 'copyright-text' );

				if( !empty( $copyright ) or !empty( $general_copyright ) or $report_page == '1' or $contact_page == '1' ){
					$output .= '<div class="game-contact widget-box">';
						if( !empty( $copyright ) or !empty( $general_copyright ) ) {
							$output .= '<div class="copyright">';
								if( !empty( $copyright ) ) {
									$output .= $copyright;
								} elseif( !empty( $general_copyright ) ) {
									$output .= $general_copyright;
								}
							$output .= '</div>';
						}

						if( !empty( $report_page ) or !empty( $contact_page ) ) {
							$output .= '<div class="buttons">';
								if( !empty( $report_page ) ) {
									$output .= '<div class="cloux-button style-1">';
										$output .= '<a href="' . get_permalink( $report_page ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $report_page ) ) . '">' . get_the_title( $report_page ) . '</a>';
									$output .= '</div>';
								}

								if( !empty( $contact_page ) ) {
									$output .= '<div class="cloux-button style-1">';
										$output .= '<a href="' . get_permalink( $contact_page ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $contact_page ) ) . '">' . get_the_title( $contact_page ) . '</a>';
									$output .= '</div>';
								}
							$output .= '</div>';
						}
					$output .= '</div>';
				}

				return $output;
			}
		}



		/*====== Game Reviews ======*/
		function cloux_game_reviews() {
			if ( function_exists( 'rwmb_meta' ) ) {
				$output = "";
				$reviews = rwmb_meta( 'game-review-list' );
				$reviews_status = rwmb_meta( 'game-review-list-status' );

				if( $reviews_status == "1" ) {
					if( !empty( $reviews ) ) {
						$output .= '<div class="game-review widget-box">';
							$output .= cloux_title( $title = esc_html__( 'Reviews', 'cloux' ), $style = "style-4", $align = "left", $colored_title = '' );
							$output .= '<ul>';
								foreach ( $reviews as $review ) {
									if( !empty( $review ) ) {
										$bg =  isset( $review['bg-image'] ) ? $review['bg-image'] : '';
										$title =  isset( $review['title'] ) ? $review['title'] : '';
										$text =  isset( $review['text'] ) ? $review['text'] : '';
										$point =  isset( $review['point'] ) ? $review['point'] : '';
										$link =  isset( $review['link'] ) ? $review['link'] : '';
										$target =  isset( $review['target'] ) ? $review['target'] : '';

										if( !empty( $title ) or !empty( $text ) or !empty( $point ) ) {
											$item_bg = "";
											if( !empty( $bg ) ) {
												foreach ( $bg as $img ) {
													if( !empty( $img ) ) {
														$image_src = wp_get_attachment_image_src( esc_attr( $img ), 'full' );
														if( !empty( $image_src ) ) {
															$item_bg = ' style="background-image:url(' . esc_url( $image_src[0] ) . ');"';
														}
													}
												}
											}

											$output .= '<li' . $item_bg . '>';
												if( !empty( $link ) ) {
													$output .= '<a href="' . esc_url( $link ) . '" target="' . esc_attr( $target ) . '">';
												}
													$output .= '<div class="wrap">';
														if( !empty( $point ) ) {
															$output .= '<div class="point">' . esc_attr( $point ) . '</div>';
														}

														if( !empty( $title ) or !empty( $text ) ) {
															$output .= '<div class="content">';
																if( !empty( $title ) ) {
																	$output .= '<div class="title">' . esc_attr( $title ) . '</div>';
																}

																if( !empty( $text ) ) {
																	$output .= '<div class="text">';
																		$output .= esc_attr( $text );
																		if( !empty( $link ) ) {
																			$output .= '<i class="fas fa-external-link" aria-hidden="true"></i>';
																		}
																	$output .= '</div>';
																}
															$output .= '</div>';
														}
													$output .= '</div>';
												if( !empty( $link ) ) {
													$output .= '</a>';
												}
											$output .= '</li>';
										}
									}
								}
							$output .= '</ul>';
						$output .= '</div>';
					}
				}

				return $output;
			}
		}



		/*====== Game Image Information ======*/
		function cloux_game_image_info() {
			if ( function_exists( 'rwmb_meta' ) ) {
				$output = "";
				$informations = rwmb_meta( 'game-image-information' );
				$informations_status = rwmb_meta( 'game-image-information-status' );
				if( $informations_status == "1" ) {
					if( !empty( $informations ) ) {
						foreach ( $informations as $info ) {
							if( !empty( $info ) ) {
								$output .= '<div class="game-image-info widget-box">';
									$image =  isset( $info['image'] ) ? $info['image'] : '';
									$text =  isset( $info['text'] ) ? $info['text'] : '';

									if( !empty( $image ) ) {
										$output .= '<div class="image">';
											foreach ( $image as $img ) {
												if( !empty( $img ) ) {
													$image_src = wp_get_attachment_image_src( esc_attr( $img ), 'full' );
													$output .= '<img src="' . esc_url( $image_src[0] ) . '" width="' . esc_attr( $image_src[1] ) . '" height="' . esc_attr( $image_src[2] ) . '">';
												}
											}
										$output .= '</div>';
									}

									if( !empty( $text ) ) {
										$output .= '<div class="text">' . $text . '</div>';
									}

								$output .= '</div>';
							}
						}
					}
				}
				return $output;
			}
		}



		/*====== Game Content Boxes ======*/
		function cloux_game_content_boxes() {
			if ( function_exists( 'rwmb_meta' ) ) {
				$output = "";
				$boxes = rwmb_meta( 'game-content-boxes' );
				$boxes_status = rwmb_meta( 'game-content-boxes-status' );
				if( $boxes_status == "1" ) {
					if( !empty( $boxes ) ) {
						foreach ( $boxes as $box ) {
							if( !empty( $box ) ) {
								$output .= '<div class="game-content-boxes widget-box">';
									$title =  isset( $box['title'] ) ? $box['title'] : '';
									$text =  isset( $box['text'] ) ? $box['text'] : '';

									if( !empty( $title ) ) {
										$output .= cloux_title( $title = esc_attr( $title ), $style = "style-4", $align = "left", $colored_title = '' );
									}

									if( !empty( $text ) ) {
										$output .= '<div class="text">' . $text . '</div>';
									}

								$output .= '</div>';
							}
						}
					}
				}
				return $output;
			}
		}



		/*====== Game Sidebar Boxes ======*/
		function cloux_game_sidebar_boxes() {
			if ( function_exists( 'rwmb_meta' ) ) {
				$output = "";
				$boxes = rwmb_meta( 'game-sidebar-boxes' );
				$boxes_status = rwmb_meta( 'game-sidebar-boxes-status' );
				if( $boxes_status == "1" ) {
					if( !empty( $boxes ) ) {
						foreach ( $boxes as $box ) {
							if( !empty( $box ) ) {
								$output .= '<div class="game-sidebar-boxes widget-box">';
									$title =  isset( $box['title'] ) ? $box['title'] : '';
									$text =  isset( $box['text'] ) ? $box['text'] : '';

									if( !empty( $title ) ) {
										$output .= cloux_title( $title = esc_attr( $title ), $style = "style-4", $align = "left", $colored_title = '' );
									}

									if( !empty( $text ) ) {
										$output .= '<div class="text">' . $text . '</div>';
									}

								$output .= '</div>';
							}
						}
					}
				}
				return $output;
			}
		}



		/*====== Game Languages ======*/
		function cloux_game_languages() {
			if ( function_exists( 'rwmb_meta' ) ) {
				$output = "";
				$languages = rwmb_meta( 'game-languages' );
				$languages_status = rwmb_meta( 'game-languages-status' );
				if( $languages_status == "1" ) {
					if( !empty( $languages ) ) {
						$output .= '<div class="game-language widget-box">';
							$output .= cloux_title( $title = esc_html__( 'Languages', 'cloux' ), $style = "style-4", $align = "left", $colored_title = '' );
							$output .= '<ul>';
								$output .= '<li class="title name">' . esc_html__( 'Language', 'cloux' ) . '</li>';
								$output .= '<li class="title interface">' . esc_html__( 'Interface', 'cloux' ) . '</li>';
								$output .= '<li class="title audio">' . esc_html__( 'Audio', 'cloux' ) . '</li>';
								$output .= '<li class="title subtitles">' . esc_html__( 'Subtitles', 'cloux' ) . '</li>';
								foreach ( $languages as $language ) {
									if( !empty( $language ) ) {
										$name =  isset( $language['language-name'] ) ? $language['language-name'] : '';
										$interface =  isset( $language['interface'] ) ? $language['interface'] : '';
										$audio =  isset( $language['audio'] ) ? $language['audio'] : '';
										$subtitles =  isset( $language['subtitles'] ) ? $language['subtitles'] : '';

										if( !empty( $name ) or !empty( $interface ) or !empty( $audio ) or !empty( $subtitles ) ) {
											$output .= '<li class="item name">';
												if( !empty( $name ) ) {
													$name = get_term( $name, 'language' );
													if( !empty( $name ) ) {
														$output .= '<a href="' . get_term_link( $name ) . '">' . esc_attr( $name->name ) . '</a>';
													}
												}
											$output .= '</li>';
											$output .= '<li class="item interface status">';
												if( $interface == "true" ) {
													$output .= '<i class="fas fa-check" aria-hidden="true"></i>';
												} else {
													$output .= '<i class="fas fa-times" aria-hidden="true"></i>';
												}
											$output .= '</li>';
											$output .= '<li class="item audio status">';
												if( $audio == "true" ) {
													$output .= '<i class="fas fa-check" aria-hidden="true"></i>';
												} else {
													$output .= '<i class="fas fa-times" aria-hidden="true"></i>';
												}
											$output .= '</li>';
											$output .= '<li class="item subtitles status">';
												if( $subtitles == "true" ) {
													$output .= '<i class="fas fa-check" aria-hidden="true"></i>';
												} else {
													$output .= '<i class="fas fa-times" aria-hidden="true"></i>';
												}
											$output .= '</li>';
										}
									}
								}
							$output .= '</ul>';
						$output .= '</div>';
					}
				}
				return $output;
			}
		}



		/*====== Game Poster ======*/
		function cloux_game_poster() {
			if ( function_exists( 'rwmb_meta' ) ) {
				$output = "";
				$game_poster = rwmb_meta( 'game-poster' );
				$description = rwmb_meta( 'poster-description' );
				if( !empty( $game_poster ) ) {
					foreach ( $game_poster as $image ) {
						if( !empty( $image ) ) {
							$image_src = wp_get_attachment_image_src( esc_attr( $image["ID"] ), 'cloux-poster-medium' );
							if( !empty( $image_src ) ) {
								$output .= '<div class="game-poster widget-box">';
									$output .= cloux_title( $title = esc_html__( 'Game', 'cloux' ), $style = "style-4", $align = "left", $colored_title = esc_html__( 'Poster', 'cloux' ) );
									$output .= '<a href="' . esc_url( $image["full_url"] ) . '" rel="prettyPhoto[game-poster]">';
										$output .= '<img src="' . esc_url( $image_src[0] ) . '" width="' . esc_attr( $image_src[1] ) . '" height="' . esc_attr( $image_src[2] ) . '" alt="' . esc_html__( 'Poster', 'cloux' ) . '">';
									$output .= '</a>';
									if( !empty( $description ) ) {
										$output .= '<div class="text">' . $description . '</div>';
									}
								$output .= '</div>';
							}
						}
					}
				}
				return $output;
			}
		}



		/*====== Game Details ======*/
		function cloux_game_details_box() {
			if ( function_exists( 'rwmb_meta' ) ) {
				$details_status = rwmb_meta( 'game-details-status' );

				$languages = wp_get_post_terms( get_the_ID(), 'language' );
				$categories = wp_get_post_terms( get_the_ID(), 'category' );
				$companies = wp_get_post_terms( get_the_ID(), 'company' );
				$genres = wp_get_post_terms( get_the_ID(), 'genre' );
				$platforms = wp_get_post_terms( get_the_ID(), 'platform' );
				$modes = wp_get_post_terms( get_the_ID(), 'mode' );

				$release_date = rwmb_meta( 'release-date' );
				$developers = rwmb_meta( 'game-developers' );
				$publishers = rwmb_meta( 'game-publishers' );

				$facebook = rwmb_meta( 'game-facebook-url' );
				$twitter = rwmb_meta( 'game-twitter-url' );
				$google_plus = rwmb_meta( 'game-google-plus-url' );
				$pinterest = rwmb_meta( 'game-pinterest-url' );
				$linkedin = rwmb_meta( 'game-linkedin-url' );
				$youtube = rwmb_meta( 'game-youtube-url' );
				$vimeo = rwmb_meta( 'game-vimeo-url' );
				$tumblr = rwmb_meta( 'game-tumblr-url' );
				$instagram = rwmb_meta( 'game-instagram-url' );
				$flickr = rwmb_meta( 'game-flickr-url' );
				$dribbble = rwmb_meta( 'game-dribbble-url' );
				$reddit = rwmb_meta( 'game-reddit-url' );
				$soundcloud = rwmb_meta( 'game-soundcloud-url' );
				$spotify = rwmb_meta( 'game-spotify-url' );
				$yahoo = rwmb_meta( 'game-yahoo-url' );
				$behance = rwmb_meta( 'game-behance-url' );
				$codepen = rwmb_meta( 'game-codepen-url' );
				$delicious = rwmb_meta( 'game-delicious-url' );
				$stumbleupon = rwmb_meta( 'game-stumbleupon-url' );
				$deviantart = rwmb_meta( 'game-deviantart-url' );
				$digg = rwmb_meta( 'game-digg-url' );
				$github = rwmb_meta( 'game-github-url' );
				$medium = rwmb_meta( 'game-medium-url' );
				$steam = rwmb_meta( 'game-steam-url' );
				$vk = rwmb_meta( 'game-vk-url' );
				$px500 = rwmb_meta( 'game-500px-url' );
				$foursquare = rwmb_meta( 'game-foursquare-url' );
				$slack = rwmb_meta( 'game-slack-url' );
				$whatsapp = rwmb_meta( 'game-whatsapp-url' );
				$skype = rwmb_meta( 'game-skype-url' );
				$twitch = rwmb_meta( 'game-twitch-url' );
				$paypal = rwmb_meta( 'game-paypal-url' );
				$official_site = rwmb_meta( 'game-official-site-url' );
				$custom_site = rwmb_meta( 'game-custom-site-url' );

				if( $details_status == "1" ) {
					if( !empty( $genres ) or !empty( $platforms ) or !empty( $modes ) or !empty( $release_date ) or !empty( $developers ) or !empty( $publishers ) or !empty( $facebook ) or !empty( $twitter ) or !empty( $google_plus ) or !empty( $pinterest ) or !empty( $linkedin ) or !empty( $youtube ) or !empty( $vimeo ) or !empty( $tumblr ) or !empty( $instagram ) or !empty( $flickr ) or !empty( $dribbble ) or !empty( $reddit ) or !empty( $soundcloud ) or !empty( $spotify ) or !empty( $yahoo ) or !empty( $behance ) or !empty( $codepen ) or !empty( $delicious ) or !empty( $stumbleupon ) or !empty( $deviantart ) or !empty( $digg ) or !empty( $github ) or !empty( $medium ) or !empty( $steam ) or !empty( $vk ) or !empty( $px500 ) or !empty( $foursquare ) or !empty( $slack ) or !empty( $whatsapp ) or !empty( $skype ) or !empty( $twitch ) or !empty( $paypal ) or !empty( $official_site ) or !empty( $custom_site ) ) {
						$output = '';
						$output .= '<div class="game-details-box widget-box">';
							$output .= cloux_title( $title = esc_html__( 'Game', 'cloux' ), $style = "style-4", $align = "left", $colored_title = esc_html__( 'Details', 'cloux' ) );
							$output .= '<ul>';
								if( !empty( $genres ) ) {
									$output .= '<li>';
										$output .= '<div class="title">';
											$output .= '<i class="fas fa-tags" aria-hidden="true"></i>';
											$output .= '<span>' . esc_html__( 'Genre', 'cloux' ) . '</span>';
										$output .= '</div>';
										$output .= '<div class="content">';
											$output .= '<ul>';
												foreach( $genres as $genre ) {
													if( !empty( $genre ) ) {
														$output .= '<li>';
															$output .= '<a href="' . get_term_link( $genre->term_id ) . '" title="' . esc_attr( $genre->name ) . '">' . esc_attr( $genre->name ) . '</a>';
														$output .= '</li>';
													}
												}
											$output .= '</ul>';
										$output .= '</div>';
									$output .= '</li>';
								}
								if( !empty( $release_date ) ) {
									$output .= '<li>';
										$output .= '<div class="title">';
											$output .= '<i class="far fa-clock" aria-hidden="true"></i>';
											$output .= '<span>' . esc_html__( 'Release Date', 'cloux' ) . '</span>';
										$output .= '</div>';
										$output .= '<div class="content">';
											$output .= cloux_global_date_converter( $date = esc_attr( $release_date ) );
										$output .= '</div>';
									$output .= '</li>';
								}
								if( !empty( $developers ) ) {
									$output .= '<li>';
										$output .= '<div class="title">';
											$output .= '<i class="fas fa-cogs" aria-hidden="true"></i>';
											$output .= '<span>' . esc_html__( 'Developer', 'cloux' ) . '</span>';
										$output .= '</div>';
										$output .= '<div class="content">';
											$output .= '<ul>';
												foreach( $developers as $developer ) {
													if( !empty( $developer ) ) {
														$output .= '<li>';
															$output .= '<a href="' . get_term_link( $developer->term_id ) . '" title="' . esc_attr( $developer->name ) . '">' . esc_attr( $developer->name ) . '</a>';
														$output .= '</li>';
													}
												}
											$output .= '</ul>';
										$output .= '</div>';
									$output .= '</li>';
								}
								if( !empty( $publishers ) ) {
									$output .= '<li>';
										$output .= '<div class="title">';
											$output .= '<i class="fas fa-globe" aria-hidden="true"></i>';
											$output .= '<span>' . esc_html__( 'Publisher', 'cloux' ) . '</span>';
										$output .= '</div>';
										$output .= '<div class="content">';
											$output .= '<ul>';
												foreach( $publishers as $publisher ) {
													if( !empty( $publisher ) ) {
														$output .= '<li>';
															$output .= '<a href="' . get_term_link( $publisher->term_id ) . '" title="' . esc_attr( $publisher->name ) . '">' . esc_attr( $publisher->name ) . '</a>';
														$output .= '</li>';
													}
												}
											$output .= '</ul>';
										$output .= '</div>';
									$output .= '</li>';
								}
								if( !empty( $platforms ) ) {
									$output .= '<li>';
										$output .= '<div class="title">';
											$output .= '<i class="fas fa-tv" aria-hidden="true"></i>';
											$output .= '<span>' . esc_html__( 'Platforms', 'cloux' ) . '</span>';
										$output .= '</div>';
										$output .= '<div class="content">';
											$output .= '<ul>';
												foreach( $platforms as $platform ) {
													if( !empty( $platform ) ) {
														$output .= '<li>';
															$output .= '<a href="' . get_term_link( $platform->term_id ) . '" title="' . esc_attr( $platform->name ) . '">' . esc_attr( $platform->name ) . '</a>';
														$output .= '</li>';
													}
												}
											$output .= '</ul>';
										$output .= '</div>';
									$output .= '</li>';
								}
								if( !empty( $modes ) ) {
									$output .= '<li>';
										$output .= '<div class="title">';
											$output .= '<i class="fas fa-users" aria-hidden="true"></i>';
											$output .= '<span>' . esc_html__( 'Modes', 'cloux' ) . '</span>';
										$output .= '</div>';
										$output .= '<div class="content">';
											$output .= '<ul>';
												foreach( $modes as $mode ) {
													if( !empty( $mode ) ) {
														$output .= '<li>';
															$output .= '<a href="' . get_term_link( $mode->term_id ) . '" title="' . esc_attr( $mode->name ) . '">' . esc_attr( $mode->name ) . '</a>';
														$output .= '</li>';
													}
												}
											$output .= '</ul>';
										$output .= '</div>';
									$output .= '</li>';
								}
								if( !empty( $facebook ) or !empty( $twitter ) or !empty( $google_plus ) or !empty( $pinterest ) or !empty( $linkedin ) or !empty( $youtube ) or !empty( $vimeo ) or !empty( $tumblr ) or !empty( $instagram ) or !empty( $flickr ) or !empty( $dribbble ) or !empty( $reddit ) or !empty( $soundcloud ) or !empty( $spotify ) or !empty( $yahoo ) or !empty( $behance ) or !empty( $codepen ) or !empty( $delicious ) or !empty( $stumbleupon ) or !empty( $deviantart ) or !empty( $digg ) or !empty( $github ) or !empty( $medium ) or !empty( $steam ) or !empty( $vk ) or !empty( $px500 ) or !empty( $foursquare ) or !empty( $slack ) or !empty( $whatsapp ) or !empty( $skype ) or !empty( $twitch ) or !empty( $paypal ) or !empty( $official_site ) or !empty( $custom_site ) ) {
									$output .= '<li>';
										$output .= '<div class="title">';
											$output .= '<i class="fas fa-share-alt"></i>';
											$output .= '<span>' . esc_html__( 'Sites', 'cloux' ) . '</span>';
										$output .= '</div>';
										$output .= '<div class="content">';
											$output .= '<ul class="social-media">';
												if( !empty( $facebook ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $facebook ) . '" target="_blank" title="' . esc_html__( 'Facebook', 'cloux' ) . '">';
															$output .= '<i class="fab fa-facebook-f" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $twitter ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $twitter ) . '" target="_blank" title="' . esc_html__( 'Twitter', 'cloux' ) . '">';
															$output .= '<i class="fab fa-twitter" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $google_plus ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $google_plus ) . '" target="_blank" title="' . esc_html__( 'Google+', 'cloux' ) . '">';
															$output .= '<i class="fab fa-google-plus-g" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $pinterest ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $pinterest ) . '" target="_blank" title="' . esc_html__( 'Pinterest', 'cloux' ) . '">';
															$output .= '<i class="fab fa-pinterest-p" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $linkedin ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $linkedin ) . '" target="_blank" title="' . esc_html__( 'LinkedIn', 'cloux' ) . '">';
															$output .= '<i class="fab fa-linkedin" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $youtube ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $youtube ) . '" target="_blank" title="' . esc_html__( 'YouTube', 'cloux' ) . '">';
															$output .= '<i class="fab fa-youtube" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $vimeo ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $vimeo ) . '" target="_blank" title="' . esc_html__( 'Vimeo', 'cloux' ) . '">';
															$output .= '<i class="fab fa-vimeo-v" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $tumblr ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $tumblr ) . '" target="_blank" title="' . esc_html__( 'Tumblr', 'cloux' ) . '">';
															$output .= '<i class="fab fa-tumblr" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $instagram ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $instagram ) . '" target="_blank" title="' . esc_html__( 'Instagram', 'cloux' ) . '">';
															$output .= '<i class="fab fa-instagram" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $flickr ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $flickr ) . '" target="_blank" title="' . esc_html__( 'Flickr', 'cloux' ) . '">';
															$output .= '<i class="fab fa-flickr" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $dribbble ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $dribbble ) . '" target="_blank" title="' . esc_html__( 'Dribbble', 'cloux' ) . '">';
															$output .= '<i class="fab fa-dribbble" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $reddit ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $reddit ) . '" target="_blank" title="' . esc_html__( 'Reddit', 'cloux' ) . '">';
															$output .= '<i class="fab fa-reddit-alien" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $soundcloud ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $soundcloud ) . '" target="_blank" title="' . esc_html__( 'SoundCloud', 'cloux' ) . '">';
															$output .= '<i class="fab fa-soundcloud" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $spotify ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $spotify ) . '" target="_blank" title="' . esc_html__( 'Spotify', 'cloux' ) . '">';
															$output .= '<i class="fab fa-spotify" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $yahoo ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $yahoo ) . '" target="_blank" title="' . esc_html__( 'Yahoo', 'cloux' ) . '">';
															$output .= '<i class="fab fa-yahoo" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $behance ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $behance ) . '" target="_blank" title="' . esc_html__( 'Behance', 'cloux' ) . '">';
															$output .= '<i class="fab fa-behance" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $codepen ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $codepen ) . '" target="_blank" title="' . esc_html__( 'CodePen', 'cloux' ) . '">';
															$output .= '<i class="fab fa-codepen" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $delicious ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $delicious ) . '" target="_blank" title="' . esc_html__( 'Delicious', 'cloux' ) . '">';
															$output .= '<i class="fab fa-delicious" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $stumbleupon ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $stumbleupon ) . '" target="_blank" title="' . esc_html__( 'Stumbleupon', 'cloux' ) . '">';
															$output .= '<i class="fab fa-stumbleupon" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $deviantart ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $deviantart ) . '" target="_blank" title="' . esc_html__( 'DeviantArt', 'cloux' ) . '">';
															$output .= '<i class="fab fa-deviantart" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $digg ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $digg ) . '" target="_blank" title="' . esc_html__( 'Digg', 'cloux' ) . '">';
															$output .= '<i class="fab fa-digg" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $github ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $github ) . '" target="_blank" title="' . esc_html__( 'GitHub', 'cloux' ) . '">';
															$output .= '<i class="fab fa-github" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $medium ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $medium ) . '" target="_blank" title="' . esc_html__( 'Medium', 'cloux' ) . '">';
															$output .= '<i class="fab fa-medium" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $steam ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $steam ) . '" target="_blank" title="' . esc_html__( 'Steam', 'cloux' ) . '">';
															$output .= '<i class="fab fa-steam" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $vk ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $vk ) . '" target="_blank" title="' . esc_html__( 'VK', 'cloux' ) . '">';
															$output .= '<i class="fab fa-vk" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $px500 ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $px500 ) . '" target="_blank" title="' . esc_html__( '500px', 'cloux' ) . '">';
															$output .= '<i class="fab fa-500px" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $foursquare ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $foursquare ) . '" target="_blank" title="' . esc_html__( 'Foursquare', 'cloux' ) . '">';
															$output .= '<i class="fab fa-foursquare" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $slack ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $slack ) . '" target="_blank" title="' . esc_html__( 'Slack', 'cloux' ) . '">';
															$output .= '<i class="fab fa-slack" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $whatsapp ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $whatsapp ) . '" target="_blank" title="' . esc_html__( 'WhatsApp', 'cloux' ) . '">';
															$output .= '<i class="fab fa-whatsapp" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $skype ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $skype ) . '" target="_blank" title="' . esc_html__( 'Skype', 'cloux' ) . '">';
															$output .= '<i class="fab fa-skype" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $twitch ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $twitch ) . '" target="_blank" title="' . esc_html__( 'Twitch', 'cloux' ) . '">';
															$output .= '<i class="fab fa-twitch" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $paypal ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $paypal ) . '" target="_blank" title="' . esc_html__( 'PayPal', 'cloux' ) . '">';
															$output .= '<i class="fab fa-paypal" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $official_site ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $official_site ) . '" target="_blank" title="' . esc_html__( 'Official Site', 'cloux' ) . '">';
															$output .= '<i class="fas fa-link" aria-hidden="true"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
												if( !empty( $custom_site ) ) {
													$output .= '<li>';
														$output .= '<a href="' . esc_url( $custom_site ) . '" target="_blank" title="' . esc_html__( 'Link', 'cloux' ) . '">';
															$output .= '<i class="fas fa-external-link-alt"></i>';
														$output .= '</a>';
													$output .= '</li>';
												}
											$output .= '</ul>';
										$output .= '</div>';
									$output .= '</li>';
								}
							$output .= '</ul>';
						$output .= '</div>';

						return $output;
					}
				}
			}
		}



		/*====== Game Media ======*/
		function cloux_game_media() {
			if ( function_exists( 'rwmb_meta' ) ) {
				$output = "";
				$hide_media_gallery = rwmb_meta( 'hide-media-gallery' );
				$hide_image_gallery = rwmb_meta( 'hide-image-gallery' );
				$hide_video_gallery = rwmb_meta( 'hide-video-gallery' );
				$gallery_type = rwmb_meta( 'image-gallery-type' );
				$image_gallery = rwmb_meta( 'image-gallery', array( 'size' => 'thumbnail' ) );
				$video_gallery = rwmb_meta( 'video-gallery' );

				if( !$hide_media_gallery == '1' ) {
					if( !$hide_image_gallery == '1' or !$hide_video_gallery == '1' ) {
						if( !empty( $video_gallery ) or !empty( $image_gallery ) ) {
							$output .= '<div class="game-media content-box">';
								$output .= '<ul class="nav media-tabs cloux-first-tab" role="tablist">';
									if( !$hide_image_gallery == '1' ) {
										if( !empty( $image_gallery ) ) {
											$output .= '<li class="image-gallery"><a data-toggle="tab" href="#media-image-gallery" role="tab"><i class="far fa-image" aria-hidden="true"></i></a></li>';
										}
									}

									if( !$hide_video_gallery == '1' ) {
										if( !empty( $video_gallery ) ) {
											$output .= '<li class="video-gallery"><a data-toggle="tab" href="#media-video-gallery" role="tab"><i class="fas fa-video" aria-hidden="true"></i></a></li>';
										}
									}
								$output .= '</ul>';

								$output .= '<div class="tab-content media-tab-content cloux-first-tab">';
									if( !$hide_image_gallery == '1' ) {
										if( !empty( $image_gallery ) ) {
											$output .= '<div class="tab-pane fade" id="media-image-gallery" role="tabpanel" aria-labelledby="media-image-gallery-tab">';
												if( $gallery_type == "carousel" ) {
													$output .= '<div class="cloux-slider game-image-carousel shadow-box" data-item="1" data-dots="false" data-arrows="true" data-prevarrow="' . esc_attr( '<div class="prev"></div>' ) . '" data-nextarrow="' . esc_attr( '<div class="next"></div>' ) . '" data-asnavfor=".game-image-carousel-nav" data-slidetoitem="1" data-lazy="ondemand">';
														foreach ( $image_gallery as $image ) {
															if( !empty( $image ) ) {
																$image_src = wp_get_attachment_image_src( esc_attr( $image["ID"] ), 'cloux-post-1' );
																$large_src = wp_get_attachment_image_src( esc_attr( $image["ID"] ), 'cloux-lightbox' );
																if( !empty( $image_src ) ) {
																	$output .= '<div class="item">';
																		$output .= '<div class="shadow-box">';
																			$output .= '<a href="' . esc_url( $large_src[0] ) . '" rel="prettyPhoto[featured-image-gallery]">';
																				$output .= '<img  data-lazy="' . esc_url( $image_src[0] ) . '" width="' . esc_attr( $image_src[1] ) . '" height="' . esc_attr( $image_src[2] ) . '">';
																			$output .= '</a>';
																		$output .= '</div>';
																	$output .= '</div>';
																}
															}
														}
													$output .= '</div>';
													$output .= '<div class="cloux-slider game-image-carousel-nav" data-item="6" data-dots="false" data-arrows="false" data-asnavfor=".game-image-carousel" data-slidetoitem="1" data-focusselect="true" data-centermode="true" data-centerpad="2.308rem">';
														foreach ( $image_gallery as $nav_image ) {
															if( !empty( $nav_image ) ) {
																$nav_image_src = wp_get_attachment_image_src( esc_attr( $nav_image["ID"] ), 'cloux-gallery-thumbnail' );
																if( !empty( $nav_image_src ) ) {
																	$output .= '<div class="item">';
																		$output .= '<div>';
																			$output .= '<img src="' . esc_url( $nav_image_src[0] ) . '" width="' . esc_attr( $nav_image_src[1] ) . '" height="' . esc_attr( $nav_image_src[2] ) . '">';
																		$output .= '</div>';
																	$output .= '</div>';
																}
															}
														}
													$output .= '</div>';
												} elseif( $gallery_type == "slider" ) {
													$output .= '<div class="cloux-slider game-image-carousel shadow-box-2" data-item="1" data-dots="false" data-arrows="true" data-prevarrow="' . esc_attr( '<div class="prev"></div>' ) . '" data-nextarrow="' . esc_attr( '<div class="next"></div>' ) . '" data-slidetoitem="1" data-lazy="ondemand">';
														foreach ( $image_gallery as $image ) {
															if( !empty( $image ) ) {
																$image_src = wp_get_attachment_image_src( esc_attr( $image["ID"] ), 'cloux-post-1' );
																if( !empty( $image_src ) ) {
																	$output .= '<div class="item">';
																		$output .= '<div class="shadow-box">';
																			$output .= '<img data-lazy="' . esc_url( $image_src[0] ) . '" width="' . esc_attr( $image_src[1] ) . '" height="' . esc_attr( $image_src[2] ) . '">';
																		$output .= '</div>';
																	$output .= '</div>';
																}
															}
														}
													$output .= '</div>';
												} elseif( $gallery_type == "grid" ) {
													$output .= '<div class="game-grid-image shadow-box-2">';
														foreach ( $image_gallery as $image ) {
															if( !empty( $image ) ) {
																$image_src = wp_get_attachment_image_src( esc_attr( $image["ID"] ), 'cloux-post-1' );
																if( !empty( $image_src ) ) {
																	$output .= '<div class="item">';
																		$output .= '<a href="' . esc_url( $image["full_url"] ) . '" rel="prettyPhoto[featured-gallery-grid]">';
																			$output .= '<img src="' . esc_url( $image["url"] ) . '" width="' . esc_attr( $image["width"] ) . '" height="' . esc_attr( $image["height"] ) . '">';
																		$output .= '</a>';
																	$output .= '</div>';
																}
															}
														}
													$output .= '</div>';
												}
											$output .= '</div>';
										}
									}

									if( !$hide_video_gallery == '1' ) {
										if( !empty( $video_gallery ) ) {
											$output .= '<div class="tab-pane fade" id="media-video-gallery" role="tabpanel" aria-labelledby="media-video-gallery-tab">';
												$output .= '<div class="cloux-slider game-video-carousel shadow-box-1" data-item="1" data-dots="false" data-arrows="true" data-prevarrow="' . esc_attr( '<div class="prev"><i class="fas fa-chevron-left" aria-hidden="true"></i></div>' ) . '" data-nextarrow="' . esc_attr( '<div class="next"><i class="fas fa-chevron-right" aria-hidden="true"></i></div>' ) . '" data-asnavfor=".game-video-carousel-nav" data-slidetoitem="1" data-lazy="progressive">';
													foreach ( $video_gallery as $video ) {
														if( !empty( $video ) ) {
															$title =  isset( $video['title'] ) ? $video['title'] : '';
															$text =  isset( $video['text'] ) ? $video['text'] : '';
															$embed =  isset( $video['embed'] ) ? $video['embed'] : '';
															if( !empty( $embed ) ) {
																$output .= '<div class="item">';
																	global $wp_embed;
																	$embed_shortcode = '[embed width="350" height="450"]' . $embed . '[/embed]';
																	$output .= $wp_embed->run_shortcode( $embed_shortcode );
																	if( !empty( $text ) ) {
																		$output .= wpautop( $text );
																	}
																$output .= '</div>';
															} else {
																$output .= '<div class="thumbnail"></div>';
															}
														}
													}
												$output .= '</div>';
												$output .= '<div class="cloux-slider game-video-carousel-nav" data-item="6" data-dots="false" data-arrows="false" data-asnavfor=".game-video-carousel" data-slidetoitem="1" data-focusselect="true" data-centermode="true" data-centerpad="2.308rem">';
													foreach ( $video_gallery as $nav_video ) {
														if( !empty( $nav_video ) ) {
															$nav_embed =  isset( $nav_video['embed'] ) ? $nav_video['embed'] : '';
															if( !empty( $nav_embed ) ) {
																$output .= '<div class="item">';
																	$thumbnails =  isset( $nav_video['thumbnail-image'] ) ? $nav_video['thumbnail-image'] : '';
																	if( !empty( $thumbnails ) ) {
																		foreach ( $thumbnails as $thumbnail ) {
																			if( !empty( $thumbnail ) ) {
																				$nav_video_src = wp_get_attachment_image_src( esc_attr( $thumbnail ), 'cloux-gallery-thumbnail' );
																				if( !empty( $nav_video_src ) ) {
																						$output .= '<i class="fas fa-play" aria-hidden="true"></i>';
																						$output .= '<img src="' . esc_url( $nav_video_src[0] ) . '" width="' . esc_attr( $nav_video_src[1] ) . '" height="' . esc_attr( $nav_video_src[2] ) . '">';
																				}
																			}
																		}
																	} else {
																		$output .= '<div class="thumbnail"></div>';
																	}
																$output .= '</div>';
															}
														}
													}
												$output .= '</div>';
											$output .= '</div>';
										}
									}
								$output .= '</div>';
							$output .= '</div>';
						}
					}
				}

				return $output;
			}
		}



		/*====== System Requirements ======*/
		function cloux_system_requirements() {
			if ( function_exists( 'rwmb_meta' ) ) {
				$system_requirements = rwmb_meta( 'game-system-requirements' );
				$system_requirements_status = rwmb_meta( 'game-system-requirements-status' );

				if( $system_requirements_status == "1" ) {
					if( !empty( $system_requirements ) ) {
						$output = "";
						$output .= '<div class="system-requirements content-box">';
							$output .= cloux_title( $title = esc_html__( 'System', 'cloux' ), $style = "style-4", $align = "left", $colored_title = esc_html__( 'Requirements', 'cloux' ) );

							foreach ( $system_requirements as $requirement ) {
								if( !empty( $requirement ) ) {
									$os =  isset( $requirement['os-name'] ) ? $requirement['os-name'] : '';
									if( !empty( $os ) ) {
										$os_list[] = $os;
									}
								}
							}

							if( !empty( $os_list ) ) {
								$output .= '<ul class="nav cloux-tabs cloux-first-tab" role="tablist">';
									foreach ( $os_list as $item ) {
										if( !empty( $item ) ) {
											$tax_name = get_term( $item, 'os' );
											if( !empty( $tax_name ) ) {
												$output .= '<li>';
													$output .= '<a data-toggle="tab" href="#system-requirements-' . esc_attr( $item ) . '" role="tab">' . esc_attr( $tax_name->name ) . '</a>';
												$output .= '</li>';
											}
										}
									}
								$output .= '</ul>';
							}

							$output .= '<div class="tab-content cloux-tab-content cloux-first-tab">';
								foreach ( $system_requirements as $requirement ) {
									if( !empty( $requirement ) ) {
										$os =  isset( $requirement['os-name'] ) ? $requirement['os-name'] : '';
										$items =  isset( $requirement['items'] ) ? $requirement['items'] : '';
										$output .= '<div class="tab-pane fade" id="system-requirements-' . esc_attr( $os ) . '" role="tabpanel" aria-labelledby="system-requirements-' . esc_attr( $os ) . '-tab">';
											if( !empty( $items ) ) {
												foreach ( $items as $item ) {
													$output .= '<div class="item">';
														if( !empty( $item ) ) {
															$title =  isset( $item['title'] ) ? $item['title'] : '';
															$items_item =  isset( $item['items'] ) ? $item['items'] : '';
															if( !empty( $title ) ) {
																$output .= '<div class="list-name">' . esc_attr( $title ) . '<span>:</span></div>';
															}
															if( !empty( $items_item ) ) {
																$output .= '<ul>';
																	foreach ( $items_item as $item_item_item ) {
																		if( !empty( $item_item_item ) ) {
																			$sub_title =  isset( $item_item_item['title'] ) ? $item_item_item['title'] : '';
																			$text =  isset( $item_item_item['text'] ) ? $item_item_item['text'] : '';
																			$style =  isset( $item_item_item['style'] ) ? $item_item_item['style'] : '';

																			$output .= '<li class="' . esc_attr( $style ) . '">';
																				if( !empty( $sub_title ) ) {
																					$output .= '<div class="title">' . esc_attr( $sub_title ) . '<span>:</span></div>';
																				}

																				if( !empty( $text ) ) {
																					$output .= '<div class="text">' . wpautop( $text ) . '</div>';							
																				}

																			$output .= '</li>';
																		}
																	}
																$output .= '</ul>';
															}
														}
													$output .= '</div>';
												}
											}
										$output .= '</div>';
									}
								}
							$output .= '</div>';

						$output .= '</div>';
						return $output;
					}
				}

			}
		}



	/*======
	*
	* Elements of Post Singles
	*
	======*/
		/*====== Featured Content ======*/
		function cloux_featured_content( $post = "" ) {
			if ( function_exists( 'rwmb_meta' ) ) {
				$output = "";
				$hide_featured_content = rwmb_meta( 'hide-featured-content' );
				$audio_content = rwmb_meta( 'audio-html' );
				$video_embed = rwmb_meta( 'video-embed' );
				$embed =  isset( $video['video-embed'] ) ? $video['video-embed'] : '';
				$gallery_type = rwmb_meta( 'image-gallery-type' );
				$image_gallery = rwmb_meta( 'image-gallery', array( 'size' => 'thumbnail' ) );

				if( !$hide_featured_content == '1' ) {
					if ( has_post_format( 'video' ) ) {
						if( !empty( $video_embed ) ) {
							$output .= '<div class="featured-codes video">';
								$output .= $video_embed;
							$output .= '</div>';
						}
					} elseif ( has_post_format( 'audio' ) ) {
						if( !empty( $audio_content ) ) {
							$output .= '<div class="featured-codes audio">';
								$output .= rwmb_meta( 'audio-html' );
							$output .= '</div>';
						}
					} elseif( has_post_format( 'gallery' ) ) {
						if( $gallery_type == "grid" ) {
							if( !empty( $image_gallery ) ) {
								$output .= '<div class="featured-gallery grid">';
									foreach ( $image_gallery as $image ) {
										if( !empty( $image ) ) {
											$thumbnail_image = wp_get_attachment_image_src( esc_attr( $image["ID"] ), 'cloux-post-gallery-thumbnail' );
											$output .= '<div class="item" title="' . esc_attr( $image["alt"] ) . '">';
												$output .= '<a href="' . esc_url( $image["full_url"] ) . '" rel="prettyPhoto[featured-gallery-grid]">';
													$output .= '<img src="' . esc_url( $thumbnail_image[0] ) . '" width="' . esc_attr( $thumbnail_image[1] ) . '" height="' . esc_attr( $thumbnail_image[2] ) . '">';
												$output .= '</a>';
											$output .= '</div>';
										}
									}
								$output .= '</div>';
							}
						} else {
							if( !empty( $image_gallery ) ) {
								$output .= '<div class="featured-gallery">';
									$output .= '<div class="cloux-slider featured-gallery" data-item="1" data-dots="true" data-arrows="true" data-prevarrow="' . esc_attr( '<div class="prev"></div>' ) . '" data-nextarrow="' . esc_attr( '<div class="next"></div>' ) . '" data-slidetoitem="1" data-lazy="ondemand">';
										foreach ( $image_gallery as $image ) {
											if( !empty( $image ) ) {
												$image_src = wp_get_attachment_image_src( esc_attr( $image["ID"] ), 'cloux-post-1' );
												if( !empty( $image_src ) ) {
													$output .= '<div class="item"><img data-lazy="' . esc_url( $image_src[0] ) . '" width="' . esc_attr( $image_src[1] ) . '" height="' . esc_attr( $image_src[2] ) . '"></div>';	
												}								
											}
										}
									$output .= '</div>';
								$output .= '</div>';
							}
						}
					} else {
						if( is_singular( 'post' ) ) {
							$post_image = get_theme_mod( 'cloux_posts_image', '1' );
							if ( $post_image == '1' ) {
								if ( has_post_thumbnail() ) {
									$output .= '<div class="featured-content">';
										$output .= get_the_post_thumbnail( $post, 'cloux-post-1' );
									$output .= '</div>';
								}
							}
						} else {
							if ( has_post_thumbnail() ) {
								$output .= '<div class="featured-content">';
									$output .= get_the_post_thumbnail( $post, 'cloux-post-1' );
								$output .= '</div>';
							}
						}
					}
				}
				return $output;
			}
		}



		/*====== Post Details ======*/
		function cloux_post_details( $post = "", $author = "", $comment = "", $category = "", $date = "", $style = "" ) {
			if( !empty( $post ) ) {
				if( !empty( $style ) ) {
					$style = esc_attr( $style );
				} else {
					$style = "style-1";
				}

				if( $author == "true" or $category == "true" or $date == "true" ) {
					$output = '';
					$output .= '<div class="post-details ' . esc_attr( $style ) . '">';
						$output .= '<ul>';
							if( $author == "true" ) {
								$get_the_author = get_the_author();
								$get_the_author_id = get_user_by( 'ID', $get_the_author );
								$output .= $get_the_author_id;
								$author_avatar = get_avatar( get_the_author_meta( 'user_email', $get_the_author_id ), apply_filters( 'wpex_author_bio_avatar_size', 120 ) );
								$display_name = get_the_author_meta( 'display_name', $get_the_author_id );
								if( !empty( $display_name ) ) {
									$output .= '<li class="author">';
										$output .= '<a href="' . get_author_posts_url( get_the_author_meta( 'ID', $get_the_author_id ) ) . '">';
											if( !empty( $author_avatar ) ) {
												$output .= get_avatar( get_the_author_meta( 'user_email', $get_the_author_id ), apply_filters( 'thumbnail', 20 ) );
											}
											if( !empty( $display_name ) ) {
												$output .= '<span>' . get_the_author_meta( 'display_name', $get_the_author_id ) . '</span>';
											}
										$output .= '</a>';
									$output .= '</li>';
								}
							}
							if( $comment == "true" ) {
								if ( comments_open() ) {
									$output .= '<li class="comment">';
										$output .= '<i class="fas fa-comments" aria-hidden="true"></i>';
										$num_comments = get_comments_number( $post );
										if ( $num_comments == 0 ) {
											$comments = esc_html__( '0 Comment', 'cloux' );
										} elseif ( $num_comments > 1 ) {
											$comments = $num_comments . ' ' . esc_html__( 'Comments', 'cloux' );
										} else {
											$comments = esc_html__( '1 Comment', 'cloux' );
										}
										$output .= $comments;
									$output .= '</li>';
								}
							}
							if( $category == "true" ) {
								if ( !empty( get_the_category_list( ", ", '', $post ) ) ) {
									$output .= '<li class="category">';
										$output .= '<i class="fas fa-folder-open" aria-hidden="true"></i>';
										$output .= get_the_category_list( ", ", '', $post );
									$output .= '</li>';
								}
							}
							if( $date == "true" ) {
								$output .= '<li class="date">';
									$output .= '<i class="far fa-clock" aria-hidden="true"></i>';
									$output .= get_the_time( get_option( 'date_format' ), $post );
								$output .= '</li>';
							}
						$output .= '</ul>';
					$output .= '</div>';
					return $output;
				}
			}
		}



		/*====== Author Box ======*/
		function cloux_post_author() {
			$author = get_the_author();
			$author_display_name = get_the_author_meta( 'display_name' );
			$author_description = get_the_author_meta( 'description' );
			$author_url = get_the_author_meta( 'user_url' );
			$author_posts_url = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
			$author_avatar = get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpex_author_bio_avatar_size', 110 ) );

			if ( !empty( $author_description ) ) {
				$output = '<div class="post-author content-box">';
					$output .= '<div class="post-author">';
						if ( !empty( $author_display_name ) ) {
							$output .= cloux_title( $title = esc_html__( 'About', 'cloux' ), $style = "style-4", $align = "left", $colored_title = esc_attr( $author_display_name ) );
						}

						$output .= '<div class="content-wrapper">';
							if ( !empty( $author_avatar ) ) {
								$output .= '<div class="image">';
									$output .= '<a href="' . esc_url( $author_posts_url ). '" rel="author">';
										$output .= get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpex_author_bio_avatar_size', 150 ) );
									$output .= '</a>';
								$output .= '</div>';
							}
							if ( !empty( $author_description ) or !empty( $author_display_name ) ) {
								$output .= '<div class="content">';
									$output .= cloux_user_social_links( $user_id = get_the_author_meta( 'ID' ) );
									if ( !empty( $author_url ) ) {
										$output .= '<a href="' . esc_url( $author_url ) . '" target="_blank" class="author-site">' . esc_url( $author_url ) . '</a>';
									}
									if ( !empty( $author_description ) ) {
										$output .= get_the_author_meta( 'description' );
									}
								$output .= '</div>';
							}
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
				return $output;
			}
		}



		/*====== Post Navigation ======*/
		function cloux_post_navigation() {
			$prev_text = esc_html__( 'Previous', 'cloux' );
			$next_text = esc_html__( 'Next', 'cloux' );
			$prev_post = get_previous_post( false );
			$next_post = get_next_post( false );

			if( !empty( $prev_post ) or !empty( $next_post ) ) {
				$output = '<div class="post-navigation content-box">';
					$output .= '<nav>';
						$output .= '<ul>';
							if( !empty( $prev_post ) ) {
								$output .= '<li class="previous">';
									$output .= '<a href="' . get_permalink( $prev_post->ID ) . '" title="' . esc_attr( $prev_post->post_title ) . '"><i class="fas fa-chevron-left" aria-hidden="true"></i><span>' . $prev_text . '</span></a>';
								$output .= '</li>';
							}
							if( !empty( $next_post ) ) {
								$output .= '<li class="next">';
									$output .= '<a href="' . get_permalink( $next_post->ID ) . '" title="' . esc_attr( $next_post->post_title ) . '"><span>' . $next_text . '</span><i class="fas fa-chevron-right" aria-hidden="true"></i></a>';
								$output .= '</li>';
							}
						$output .= '</ul>';
					$output .= '</nav>';
				$output .= '</div>';
				return $output;
			}
		}



		/*====== Related Posts ======*/
		function cloux_related_posts( $post = "" ) {
			$tags = wp_get_post_tags( $post );
			$count = get_theme_mod( 'cloux_posts_related_count', '2' );
			if ( !empty( $tags ) ) {
				$tag_ids = array();
				foreach( $tags as $individual_tag ) {
					$tag_ids[] = $individual_tag->term_id;
				}
				if( !empty( $tag_ids ) ) {
					$args = array(
						'tag__in' => $tag_ids,
						'post__not_in' => array( $post ),
						'post_status' => 'publish',
						'post_type' => 'post',
						'ignore_sticky_posts' => true,
						'posts_per_page' => $count
					);
					$wp_query = new wp_query( $args );
					if ( $wp_query->have_posts() ) {
						$output = '<div class="related-posts content-box">';
							$output .= cloux_title( $title = esc_html__( 'Related', 'cloux' ), $style = "style-4", $align = "left", $colored_title = esc_html__( 'Posts', 'cloux' ) );
							$output .= '<div class="related-posts-list column column-' . esc_attr( $count ) . '">';
								while( $wp_query->have_posts() ) {
									$wp_query->the_post();
									$output .= cloux_post_style_3( $post = get_the_ID(), $image = "true", $excerpt = "false", $detail = "true", $read_more = "false" );
								}
							$output .= '</div>';
						$output .= '</div>';
						return $output;
					}
					wp_reset_postdata();
				}
			}
		}



		/*====== Post Review ======*/
		function cloux_post_review( $post = "" ) {
			if( !empty( $post ) ) {
				if ( function_exists( 'rwmb_meta' ) ) {
					$output = '';
					$reviews = rwmb_meta( 'review' );
					$analysis = rwmb_meta( 'analysis' );

					$review_status = rwmb_meta( 'review-status' );
					$analysis_status = rwmb_meta( 'analysis-status' );

					if( $review_status == "1" ) {
						if( !empty( $reviews ) ) {
							$output .= '<div class="post-review content-box">';
									$output .= cloux_title( $title = esc_html__( 'Review', 'cloux' ), $style = "style-4", $align = "left" );
									$output .= '<ul class="review">';
										foreach ( $reviews as $review ) {
											$output .= '<li>';
												$title =  isset( $review['review-title'] ) ? $review['review-title'] : '';
												$text =  isset( $review['review-text'] ) ? $review['review-text'] : '';
												$score =  isset( $review['review-score'] ) ? $review['review-score'] : '';
												$items =  isset( $review['items'] ) ? $review['items'] : '';

												if( !empty( $score ) or !empty( $text ) ) {
													$output .= '<div class="content">';
														if( !empty( $title ) ) {
															$output .= '<div class="title">' . esc_attr( $title ) . '</div>';
														}

														if( !empty( $score ) ) {
															$output .= '<div class="score">';
																$output .= esc_attr( $score );
																$output .= '<span>' . esc_html__( 'Total Score', 'cloux' ) . '</span>';
															$output .= '</div>';
														}

														if( !empty( $text ) ) {
															$output .= '<div class="text">';
																$output .= wpautop( $text );
															$output .= '</div>';
														}
													$output .= '</div>';
												}

												if( !empty( $items ) ) {
													$output .= '<ul class="items">';
														foreach ( $items as $item ) {
															if( !empty( $item ) ) {
																$title =  isset( $item['title'] ) ? $item['title'] : '';
																$style_type =  isset( $item['style-type'] ) ? $item['style-type'] : '';
																$score_type =  isset( $item['score-type'] ) ? $item['score-type'] : '';
																$score =  isset( $item['score'] ) ? $item['score'] : '';

																if( $style_type == "progress-bar" ) {
																	$li_class = "bar";
																} else {
																	$li_class = "star";
																}

																if( $score_type == "score-100" ) {
																	$max = "100";
																	$progress_score = $score;
																} elseif( $score_type == "score-10" ) {
																	$max = "10";
																	$progress_score = $score * 10;
																} elseif( $score_type == "score-5" ) {
																	$max = "5";
																	$progress_score = $score * 20;
																}

																if( !empty( $title ) or !empty( $title ) ) {
																	$output .= '<li class="' . esc_attr( $li_class ) . '">';
																			if( $style_type == "progress-bar" ) {
																				$output .= '<div class="content">';
																					if( !empty( $title ) ) {
																						$output .= '<div class="title">' . esc_attr( $title ) . '</div>';
																					}
																					if( !empty( $score ) ) {
																						$output .= '<div class="score">' . esc_attr( $score ) . '</div>';
																					}
																				$output .= '</div>';

																				if( !empty( $score ) or !empty( $style_type ) or !empty( $score_type ) ) {
																					if( !empty( $score ) ) {
																						$output .= '<div class="cloux-progress-bar">';
																							$output .= '<div class="cloux-progress" data-progress="' . esc_attr( $progress_score ) . '" data-max="' . esc_attr( $max ) . '"></div>';
																						$output .= '</div>';
																					}
																				}
																			} elseif( $style_type == "star" ) {
																				$output .= '<div class="content">';
																					if( !empty( $title ) ) {
																						$output .= '<div class="title">' . esc_attr( $title ) . '</div>';
																					}

																					if( !empty( $score ) or !empty( $style_type ) or !empty( $score_type ) ) {
																						if( $score_type == "score-10" or $score_type == "score-5" ) {
																							if( !empty( $score ) ) {
																								if( $score_type == "score-10" ) {
																									$total_score = "10";
																								} else {
																									$total_score = "5";
																								}

																								$output .= '<div class="cloux-star-review">';
																									for( $sc = 1; $sc <= $total_score; $sc++ ) {
																										$output .= '<i class="fas fa-star"></i>';
																									}
																									$output .= '<div class="cloux-star-review-skill">';
																										for( $sc = 1; $sc <= $score; $sc++ ) {
																											$output .= '<i class="fas fa-star"></i>';
																										}
																									$output .= '</div>';
																								$output .= '</div>';
																							}
																						}
																					}

																					$output .= '</div>';
																			}
																	$output .= '</li>';
																}
															}
														}
													$output .= '</ul>';
												}
											$output .= '</li>';
										}
									$output .= '</ul>';
								$output .= '</div>';
						}
					}

					if( $analysis_status == "1" ) {
						if( !empty( $analysis ) ) {
							$output .= '<div class="post-analysis content-box">';
								foreach ( $analysis as $analys ) {
									if( !empty( $analys ) ) {
										$title =  isset( $analys['title'] ) ? $analys['title'] : '';
										$text =  isset( $analys['text'] ) ? $analys['text'] : '';
										$column =  isset( $analys['column'] ) ? $analys['column'] : '';
										if( empty( $column ) ) {
											$column = "column-1";
										}
										$items =  isset( $analys['analysis-items'] ) ? $analys['analysis-items'] : '';

										$output .= cloux_title( $title = esc_attr( $title ), $style = "style-4", $align = "left" );

										if( !empty( $text ) ) {
											$output .= '<p>' . wpautop( $text ) . '</p>';
										}

										$output .= '<ul class="analysis">';
											if( !empty( $items ) ) {
												$output .= '<li class="column ' . esc_attr( $column ) . '">';
													$output .= '<ul>';
														foreach ( $items as $item ) {
															$item_title =  isset( $item['title'] ) ? $item['title'] : '';
															$item_items =  isset( $item['items'] ) ? $item['items'] : '';
															$output .= '<li>';
																if( !empty( $item_title ) ) {
																	if( !empty( $item_title ) ) {
																		$output .= '<div class="title">' . esc_attr( $item_title ) . '</div>';
																	}
																}
																if( !empty( $item_items ) ) {
																	$output .= '<ul>';
																		foreach ( $item_items as $item_item ) {
																			if( $item_item ) {
																				$text =  isset( $item_item['text'] ) ? $item_item['text'] : '';
																				$icon =  isset( $item_item['icon'] ) ? $item_item['icon'] : '';
																				$icon_color =  isset( $item_item['icon-color'] ) ? $item_item['icon-color'] : '';
																				if( !empty( $text ) ) {
																					$output .= '<li>';
																						if( !empty( $icon ) ) {
																							if( !empty( $icon_color ) ) {
																								$custom_color = ' style="color:' . esc_attr( $icon_color ) . '"';
																							} else {
																								$custom_color = "";
																							}

																							$output .= '<i ' . $custom_color . ' class="fas fa-' . esc_attr( $icon ) . '"></i>';
																						}
																						$output .= esc_attr( $text );
																					$output .= '</li>';
																				}
																			}
																		}
																	$output .= '</ul>';
																}
															$output .= '</li>';
														}
													$output .= '</ul>';
												$output .= '</li>';
											}
										$output .= '</ul>';
									}
								}
							$output .= '</div>';
						}
					}
					return $output;
				}
			}
		}