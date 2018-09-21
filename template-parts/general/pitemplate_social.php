<?php
/*
    Reference: https://www.competethemes.com/blog/social-icons-wordpress-menu-theme-customizer/
*/

function ct_pitemplate_social_array() {

	$social_sites = array(
		'twitter'       => 'pitemplate_twitter_profile',
		'facebook'      => 'pitemplate_facebook_profile',
		'google-plus'   => 'pitemplate_googleplus_profile',
		'pinterest'     => 'pitemplate_pinterest_profile',
		'linkedin'      => 'pitemplate_linkedin_profile',
		'youtube'       => 'pitemplate_youtube_profile',
		'vimeo'         => 'pitemplate_vimeo_profile',
		'tumblr'        => 'pitemplate_tumblr_profile',
		'instagram'     => 'pitemplate_instagram_profile',
		'flickr'        => 'pitemplate_flickr_profile',
		'dribbble'      => 'pitemplate_dribbble_profile',
		'rss'           => 'pitemplate_rss_profile',
		'reddit'        => 'pitemplate_reddit_profile',
		'soundcloud'    => 'pitemplate_soundcloud_profile',
		'spotify'       => 'pitemplate_spotify_profile',
		'vine'          => 'pitemplate_vine_profile',
		'yahoo'         => 'pitemplate_yahoo_profile',
		'behance'       => 'pitemplate_behance_profile',
		'codepen'       => 'pitemplate_codepen_profile',
		'delicious'     => 'pitemplate_delicious_profile',
		'stumbleupon'   => 'pitemplate_stumbleupon_profile',
		'deviantart'    => 'pitemplate_deviantart_profile',
		'digg'          => 'pitemplate_digg_profile',
		'github'        => 'pitemplate_github_profile',
		'hacker-news'   => 'pitemplate_hacker-news_profile',
		'steam'         => 'pitemplate_steam_profile',
		'vk'            => 'pitemplate_vk_profile',
		'weibo'         => 'pitemplate_weibo_profile',
		'tencent-weibo' => 'pitemplate_tencent_weibo_profile',
		'foursquare'    => 'pitemplate_foursquare_profile',
		'slack'         => 'pitemplate_slack_profile',
		'slideshare'    => 'pitemplate_slideshare_profile',
		'qq'            => 'pitemplate_qq_profile',
		'whatsapp'      => 'pitemplate_whatsapp_profile',
		'skype'         => 'pitemplate_skype_profile',
		'xing'          => 'pitemplate_xing_profile',
		'paypal'        => 'pitemplate_paypal_profile',
	);

	return apply_filters( 'ct_pitemplate_social_array_filter', $social_sites );
}


function my_add_customizer_sections( $wp_customize ) {

	$social_sites = ct_pitemplate_social_array();

	// set a priority used to order the social sites
	$priority = 5;

	// section
	$wp_customize->add_section( 'ct_pitemplate_social_media_icons', array(
		'title'       => __( 'Social Media Icons', 'pitemplate' ),
		'priority'    => 25,
		'description' => __( 'Add the URL for each of your social profiles.', 'pitemplate' )
	) );

	// create a setting and control for each social site
	foreach ( $social_sites as $social_site => $value ) {

		$label = ucfirst( $social_site );

		if ( $social_site == 'google-plus' ) {
			$label = 'Google Plus';
		} elseif ( $social_site == 'rss' ) {
			$label = 'RSS';
		} elseif ( $social_site == 'soundcloud' ) {
			$label = 'SoundCloud';
		} elseif ( $social_site == 'slideshare' ) {
			$label = 'SlideShare';
		} elseif ( $social_site == 'codepen' ) {
			$label = 'CodePen';
		} elseif ( $social_site == 'stumbleupon' ) {
			$label = 'StumbleUpon';
		} elseif ( $social_site == 'deviantart' ) {
			$label = 'DeviantArt';
		} elseif ( $social_site == 'hacker-news' ) {
			$label = 'Hacker News';
		} elseif ( $social_site == 'whatsapp' ) {
			$label = 'WhatsApp';
		} elseif ( $social_site == 'qq' ) {
			$label = 'QQ';
		} elseif ( $social_site == 'vk' ) {
			$label = 'VK';
		} elseif ( $social_site == 'wechat' ) {
				$label = 'WeChat';
		} elseif ( $social_site == 'tencent-weibo' ) {
			$label = 'Tencent Weibo';
		} elseif ( $social_site == 'paypal' ) {
			$label = 'PayPal';
		} elseif ( $social_site == 'email-form' ) {
			$label = 'Contact Form';
		}
		// setting
		$wp_customize->add_setting( $social_site, array(
			'sanitize_callback' => 'esc_url_raw'
		) );
		// control
		$wp_customize->add_control( $social_site, array(
			'type'     => 'url',
			'label'    => $label,
			'section'  => 'ct_pitemplate_social_media_icons',
			'priority' => $priority
		) );
		// increment the priority for next site
		$priority = $priority + 5;
	}
}
add_action( 'customize_register', 'my_add_customizer_sections' );


function pitemplate_social_icons_output() {

	$social_sites = ct_pitemplate_social_array();

	foreach ( $social_sites as $social_site => $profile ) {

		if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
			$active_sites[ $social_site ] = $social_site;
		}
	}

	if ( ! empty( $active_sites ) ) {

		echo '<ul class="list-inline mb-0">';
		foreach ( $active_sites as $key => $active_site ) { 
        	$class = 'fab fa-'. $active_site; ?>
		 	<li class="list-inline-item">
				<a class="<?php echo esc_attr( $active_site ); ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $key ) ); ?>">
					<i class="<?php echo esc_attr( $class ); ?>" title="<?php echo esc_attr( $active_site ); ?>"></i>
				</a>
			</li>
		<?php } 
		echo "</ul>";
	}
}

