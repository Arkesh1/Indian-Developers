<?php
/*======
*
* Customize Types
*
======*/
	/*====== Range Value ======*/
	if ( class_exists( 'WP_Customize_Control' ) ) {
		class Cloux_Customizer_Range_Value_Control extends WP_Customize_Control {
			public $type = 'range-value';
			public function render_content() {
				echo '<label>';
					echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
					if ( !empty( $this->description ) ) {
						echo '<span class="description customize-control-description">' . $this->description . '</span>';
					}
					echo '<div class="range-slider">';
						echo '<span>';
							echo '<input class="range-slider__range" type="range" value="' . esc_attr( $this->value() ) . '"';
								$this->input_attrs();
								$this->link();
							echo '>';
							echo '<span class="range-slider__value">0</span>';
						echo '</span>';
					echo '</div>';
				echo '</label>';
			}
		}
	}



	/*====== Toggle ======*/
	if ( class_exists( 'WP_Customize_Control' ) ) {
		class Cloux_Customizer_Toggle_Control extends WP_Customize_Control {
			public $type = 'toggle';
			public function render_content() {
				echo '<label>';
					echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
					if ( !empty( $this->description ) ) {
						echo '<span class="description customize-control-description">' . $this->description . '</span>';
					}
					echo '<div>';
						echo '<input id="cloux' . $this->instance_number . '" type="checkbox" class="tgl tgl-' . $this->type . '" value="' . esc_attr( $this->value() ) . '"';
							$this->link(); checked( $this->value() );
						echo '/>';
						echo '<label for="cloux' . $this->instance_number . '" class="tgl-btn"></label>';
					echo '</div>';
				echo '</label>';
			}
		}
	}



	/*====== Radio Image ======*/
	if ( class_exists( 'WP_Customize_Control' ) ) {
		class Cloux_Customize_Control_Radio_Image extends WP_Customize_Control {
			public $type = 'radio-image';

			public function enqueue() {
				wp_enqueue_script( 'jquery-ui-button' );
			}

			public function to_json() {
				parent::to_json();
				foreach ( $this->choices as $value => $args ) {
					$this->choices[ $value ]['url'] = esc_url( sprintf( $args['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) );
					$this->json['choices'] = $this->choices;
					$this->json['link'] = $this->get_link();
					$this->json['value'] = $this->value();
					$this->json['id'] = $this->id;
				}
			}

			public function content_template() { ?>
				<# if ( ! data.choices ) {
					return;
				} #>

				<# if ( data.label ) { #>
					<span class="customize-control-title">{{ data.label }}</span>
				<# } #>

				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>

				<div class="buttonset">
					<# for ( key in data.choices ) { #>
						<input type="radio" value="{{ key }}" name="_customize-{{ data.type }}-{{ data.id }}" id="{{ data.id }}-{{ key }}" {{{ data.link }}} <# if ( key === data.value ) { #> checked="checked" <# } #> /> 
						<label for="{{ data.id }}-{{ key }}">
							<span class="screen-reader-text">{{ data.choices[ key ]['label'] }}</span>
							<img src="{{ data.choices[ key ]['url'] }}" alt="{{ data.choices[ key ]['label'] }}" />
						</label>
					<# } #>
				</div>
			<?php }
		}
	}



	/*====== Font List ======*/
	if ( ! function_exists( 'cloux_register_customizer_control_google_fonts' ) ) {
		function cloux_register_customizer_control_google_fonts( $wp_customize ) {
			if ( ! isset( $wp_customize ) ) {
				return;
			}

			class Cloux_Customize_Google_Fonts_Control extends WP_Customize_Control {
				public $type = 'google-fonts';
				public $api_key = null;
				public $amount = 'all';
				public $cache_time = 365;
				public $fonts = null;

				public function render_content() {
					if ( $this->fonts ) {
						if ( is_array( $this->fonts ) ) {
							$fonts = $this->fonts;
						} else {
							return;
						}
					} else {
						$fonts = $this->cloux_get_fonts();
						if ( ! $fonts ) {
							return;
						}
					}

					if ( ! empty( $this->label ) ) {
						echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
					}

					if ( ! empty( $this->description ) ) {
						echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';
					}

					echo '<select ';
						$this->link();
					echo '>';

					if ( $this->fonts ) {
						foreach ( $fonts as $font ) {
							printf( '<option value="%s" %s>%s</option>', $font, selected( $this->value(), $font ), $font );
						}
					} else {
						foreach ( $fonts as $font => $value ) {
							printf( '<option value="%s" %s>%s</option>', $value->family, selected( $this->value(), $value->family ), $value->family );
						}
					}

					echo '</select>';
				}

				private function cloux_get_fonts() {
					$api_key = $this->api_key;
					$cache_time = DAY_IN_SECONDS * $this->cache_time;

					if ( ! $api_key ) {
						return null;
					}

					if ( ! get_transient( 'cloux_google_fonts' ) ) {
						$cloud_url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=' . $api_key;
						$local_url = get_template_directory_uri() . '/assets/fonts/google-fonts/google-fonts.json?ver=' . CLOUX_THEME_VERSION;
						$cloud_data = wp_remote_get( $cloud_url, array( 'sslverify' => false ) );
						$local_data = wp_remote_get( $local_url, array( 'sslverify' => false ) );

						if ( ! is_wp_error( $cloud_data ) ) {
							$content = json_decode( $cloud_data['body'] );
							if ( isset( $content->error ) ) {
								if ( ! is_wp_error( $local_data ) ) {
									$content = json_decode( $local_data['body'] );
								} else {
									return null;
								}
							}
						} else {
							if ( ! is_wp_error( $local_data ) ) {
								$content = json_decode( $local_data['body'] );
							} else {
								return null;
							}
						}
						set_transient( 'cloux_google_fonts', $content, $cache_time );
					}

					if ( ! get_transient( 'cloux_popular_google_fonts' ) ) {
						$cloud_url = 'https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=' . $api_key;
						$local_url = get_template_directory_uri() . '/assets/fonts/google-fonts/google-fonts-popular.json?ver=' . CLOUX_THEME_VERSION;
						$cloud_data = wp_remote_get( $cloud_url, array( 'sslverify' => false ) );
						$local_data = wp_remote_get( $local_url, array( 'sslverify' => false ) );

						if ( ! is_wp_error( $cloud_data ) ) {
							$content = json_decode( $cloud_data['body'] );
							if ( isset( $content->error ) ) {
								if ( ! is_wp_error( $local_data ) ) {
									$content = json_decode( $local_data['body'] );
								} else {
									return null;
								}
							}
						} else {
							if ( ! is_wp_error( $local_data ) ) {
								$content = json_decode( $local_data['body'] );
							} else {
								return null;
							}
						}

						set_transient( 'cloux_popular_google_fonts', $content, $cache_time );
					}

					if ( 'all' == $this->amount ) {
						$content = get_transient( 'cloux_google_fonts' );
						return $content->items;
					} else {
						$content = get_transient( 'cloux_popular_google_fonts' );
						return array_slice( $content->items, 0, $this->amount );
					}
				}
			}
		}
		add_action( 'customize_register', 'cloux_register_customizer_control_google_fonts', 0 );
	}



	/*====== Sidebar Dropdown ======*/
	if ( class_exists( 'WP_Customize_Control' ) ) {
		class Cloux_Sidebar_Dropdown_Custom_Control extends WP_Customize_Control {
			public $type = 'sidebar_dropdown';
			public function render_content() {
				echo '<label class="customize_dropdown_input">';
					echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
					if ( ! empty( $this->description ) ) {
						echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';
					}

					global $wp_registered_sidebars;
					echo '<select id="' . esc_attr( $this->id ) . '" name="' . esc_attr( $this->id ) . '" ';
						$this->link();
					echo ' >';
						$sidebar_shop = $wp_registered_sidebars;
						if ( is_array( $sidebar_shop ) && ! empty( $sidebar_shop ) ) {
							foreach ( $sidebar_shop as $sidebar ) {
								echo '<option value="' . esc_attr( $sidebar['id'] ) . '" ' . selected( $this->value(), $sidebar['name'], false ) . '>' . esc_html( $sidebar['name'] ) . '</option>';
							}
						}
					echo '</select>';
				echo '</label>';
			}
		}
	}



	/*====== Social Media ======*/
	function cloux_social_media_array_filter() {
		$social_sites = array(
			'facebook' => 'cloux_facebook_url',
			'twitter' => 'cloux_twitter_url',
			'google-plus' => 'cloux_googleplus_url',
			'pinterest' => 'cloux_pinterest_url',
			'linkedin' => 'cloux_linkedin_url',
			'youtube' => 'cloux_youtube_url',
			'vimeo' => 'cloux_vimeo_url',
			'tumblr' => 'cloux_tumblr_url',
			'instagram' => 'cloux_instagram_url',
			'flickr' => 'cloux_flickr_url',
			'dribbble' => 'cloux_dribbble_url',
			'reddit' => 'cloux_reddit_url',
			'soundcloud' => 'cloux_soundcloud_url',
			'spotify' => 'cloux_spotify_url',
			'yahoo' => 'cloux_yahoo_url',
			'behance' => 'cloux_behance_url',
			'codepen' => 'cloux_codepen_url',
			'delicious' => 'cloux_delicious_url',
			'stumbleupon' => 'cloux_stumbleupon_url',
			'deviantart' => 'cloux_deviantart_url',
			'digg' => 'cloux_digg_url',
			'github' => 'cloux_github_url',
			'medium' => 'cloux_medium_url',
			'steam' => 'cloux_steam_url',
			'vk' => 'cloux_vk_url',
			'500px' => 'cloux_500px_url',
			'foursquare' => 'cloux_foursquare_url',
			'slack' => 'cloux_slack_url',
			'whatsapp' => 'cloux_whatsapp_url',
			'skype' => 'cloux_skype_url',
			'twitch' => 'cloux_twitch_url',
			'paypal' => 'cloux_paypal_url',
			'rss' => 'cloux_rss_url',
			'custom-url' => 'cloux_custom_url',
		);
		return apply_filters( 'cloux_social_media_array_filter', $social_sites );
	}

	function cloux_social_share_array_filter() {
		$social_sites = array(
			'facebook' => 'cloux_facebook_share',
			'twitter' => 'cloux_twitter_share',
			'google-plus' => 'cloux_googleplus_share',
			'pinterest' => 'cloux_pinterest_share',
			'linkedin' => 'cloux_linkedin_share',
			'tumblr' => 'cloux_tumblr_share',
			'reddit' => 'cloux_reddit_share',
			'delicious' => 'cloux_delicious_share',
			'stumbleupon' => 'cloux_stumbleupon_share',
			'whatsapp' => 'cloux_whatsapp_share',
			'mail' => 'cloux_mail_share',
		);
		return apply_filters( 'cloux_social_share_array_filter', $social_sites );
	}