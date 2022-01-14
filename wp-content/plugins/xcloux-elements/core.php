<?php
/*======
*
* Create Social Media Links for User Profiles
*
======*/
	function cloux_user_social_links_create( $user_profile_create_fields ) {
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

			$label = ucfirst( $user_social_site );
			if ( $user_social_site == 'twitter' ) {
				$label = esc_html__( 'Twitter', 'cloux' );
			} elseif ( $user_social_site == 'facebook' ) {
				$label = esc_html__( 'Facebook', 'cloux' );
			} elseif ( $user_social_site == 'google-plus' ) {
				$label = esc_html__( 'Google Plus', 'cloux' );
			} elseif ( $user_social_site == 'pinterest' ) {
				$label = esc_html__( 'Pinterest', 'cloux' );
			} elseif ( $user_social_site == 'youtube' ) {
				$label = esc_html__( 'YouTube', 'cloux' );
			} elseif ( $user_social_site == 'vimeo' ) {
				$label = esc_html__( 'Vimeo', 'cloux' );
			} elseif ( $user_social_site == 'tumblr' ) {
				$label = esc_html__( 'Tumblr', 'cloux' );
			} elseif ( $user_social_site == 'instagram' ) {
				$label = esc_html__( 'Instagram', 'cloux' );
			} elseif ( $user_social_site == 'flickr' ) {
				$label = esc_html__( 'Flickr', 'cloux' );
			} elseif ( $user_social_site == 'dribbble' ) {
				$label = esc_html__( 'Dribbble', 'cloux' );
			} elseif ( $user_social_site == 'reddit' ) {
				$label = esc_html__( 'Reddit', 'cloux' );
			} elseif ( $user_social_site == 'soundcloud' ) {
				$label = esc_html__( 'SoundCloud', 'cloux' );
			} elseif ( $user_social_site == 'spotify' ) {
				$label = esc_html__( 'Spotify', 'cloux' );
			} elseif ( $user_social_site == 'yahoo' ) {
				$label = esc_html__( 'Yahoo', 'cloux' );
			} elseif ( $user_social_site == 'behance' ) {
				$label = esc_html__( 'Behance', 'cloux' );
			} elseif ( $user_social_site == 'delicious' ) {
				$label = esc_html__( 'Delicious', 'cloux' );
			} elseif ( $user_social_site == 'stumbleupon' ) {
				$label = esc_html__( 'Stumbleupon', 'cloux' );
			} elseif ( $user_social_site == 'deviantart' ) {
				$label = esc_html__( 'DeviantAr', 'cloux' );
			} elseif ( $user_social_site == 'digg' ) {
				$label = esc_html__( 'Digg', 'cloux' );
			} elseif ( $user_social_site == 'github' ) {
				$label = esc_html__( 'GitHub', 'cloux' );
			} elseif ( $user_social_site == 'medium' ) {
				$label = esc_html__( 'Medium', 'cloux' );
			} elseif ( $user_social_site == 'steam' ) {
				$label = esc_html__( 'Steam', 'cloux' );
			} elseif ( $user_social_site == 'vk' ) {
				$label = esc_html__( 'VK', 'cloux' );
			} elseif ( $user_social_site == '500px' ) {
				$label = esc_html__( '500px', 'cloux' );
			} elseif ( $user_social_site == 'foursquare' ) {
				$label = esc_html__( 'Foursquare', 'cloux' );
			} elseif ( $user_social_site == 'slack' ) {
				$label = esc_html__( 'Slack', 'cloux' );
			} elseif ( $user_social_site == 'whatsapp' ) {
				$label = esc_html__( 'WhatsApp', 'cloux' );
			} elseif ( $user_social_site == 'twitch' ) {
				$label = esc_html__( 'Twitch', 'cloux' );
			} elseif ( $user_social_site == 'paypal' ) {
				$label = esc_html__( 'PayPal', 'cloux' );
			} elseif ( $user_social_site == 'codepen' ) {
				$label = esc_html__( 'CodePen', 'cloux' );
			} elseif ( $user_social_site == 'custom-url' ) {
				$label = esc_html__( 'Custom URL', 'cloux' );
			}

			$user_profile_fields[$user_social_site] = $label;
		}

		return $user_profile_fields;
	}
	add_filter( 'user_contactmethods', 'cloux_user_social_links_create', 10, 1 );