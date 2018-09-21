<?php
include_once(get_template_directory().'/include/generate-color.php');

/*
    Content region option:
    Sticky 
*/

$pitemplate_content_layout_option = array('width');

$pitemplate_content_color_option = array('background','font','link','icon');

function pitemplate_content_option($wp_customize){
  
    $panel = 'pitemplate_content';
    /* Top Bar section */
    $wp_customize->add_panel( $panel , array(
        'title'      => __('Content section','pitemplate'),
        'description' => "Content section",
        'priority'   => 4,
    ) );

    new pitemplate_layout_option($panel, $wp_customize, $GLOBALS['pitemplate_content_layout_option'] );

    new pitemplate_color_option($panel, $wp_customize, $GLOBALS['pitemplate_content_color_option'] );
  

   
}
add_action( 'customize_register', 'pitemplate_content_option' );

/*
  This add template css file and other css from the color setting
*/
new generate_color('pitemplate_content', false);