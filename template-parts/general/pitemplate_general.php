<?php
/* 
    Bootstrap 4 nav walker 
*/
include_once get_template_directory() . '/lib/bs4navwalker.php';

/*
    Wordpress core logo support
*/
add_theme_support( 'custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
));

/*
    Contact Detail
*/
function pitemplate_contact_option($wp_customize){
        $wp_customize->add_setting(
            'pitemplate_phone',
            array(
                'default'     => '9970439009'
            )
          );
        
          $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'pitemplate_phone',
                array(
                    'label'          => __( 'Phone number', 'pitemplate' ),
                    'description'=>'pitemplate_phone',
                    'section'        => 'title_tagline',
                    'type' => 'text',
                    'settings'       => 'pitemplate_phone'
                )
            )
          );

          $wp_customize->add_setting(
            'pitemplate_email',
            array(
                'default'     => 'rajeshsingh520@gmail.com'
            )
          );
        
          $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'pitemplate_email',
                array(
                    'label'          => __( 'Email', 'pitemplate' ),
                    'description'=>'pitemplate_email',
                    'section'        => 'title_tagline',
                    'type' => 'email',
                    'settings'       => 'pitemplate_email'
                )
            )
          );
    }
add_action( 'customize_register', 'pitemplate_contact_option' );

/* Registering Menu */
function register_my_menu() {
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'pitemplate' ),
	) );
}
add_action( 'init', 'register_my_menu' );

