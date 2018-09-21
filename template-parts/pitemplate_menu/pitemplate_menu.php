<?php 

include_once(get_template_directory().'/include/layout-option.php');
include_once(get_template_directory().'/include/color-option.php');
include_once(get_template_directory().'/include/generate-color.php');

$pitemplate_menu_layout_option = array('mobile_show', 'width', 'template', 'shrink');

$pitemplate_menu_color_option = array('background','font','link','icon');


/*
  This part adds pannel to customizer and then adds pre defined section to that customizer
*/
function pitemplate_menu_option( $wp_customize ) {
  $panel = 'pitemplate_menu';
  /* Top Bar section */
  $wp_customize->add_panel( $panel , array(
    'title'      => __('Menu bar section','pitemplate'),
    'description' => "Menu bar",
    'priority'   => 3,
  ) );

  

  new pitemplate_layout_option($panel, $wp_customize, $GLOBALS['pitemplate_menu_layout_option'] );

  new pitemplate_color_option($panel, $wp_customize, $GLOBALS['pitemplate_menu_color_option'] );
  
}
add_action( 'customize_register', 'pitemplate_menu_option' );

/*
  Add layout file
*/
function pitemplate_menu(){
  $panel = 'pitemplate_menu'; 
  $show = get_theme_mod('show_'.$panel.'_layout',1);
  if($show == '0'){
    return;
  } 

  $mobile_show = get_theme_mod('mobile_show_'.$panel.'_layout',0);
  $width = get_theme_mod('width_'.$panel.'_layout',1);
  $shrink = get_theme_mod('shrink_'.$panel.'_layout',0);
  $template = get_theme_mod('template_'.$panel.'_layout','default');

  include('template/'.$template.'.php');
}

/*
  This add template css file and other css from the color setting
*/
new generate_color('pitemplate_menu');
