<?php 

include_once(get_template_directory().'/include/layout-option.php');
include_once(get_template_directory().'/include/color-option.php');
include_once(get_template_directory().'/include/generate-color.php');

$pitemplate_copyright_layout_option = array('show', 'width','template');

$pitemplate_copyright_color_option = array('background','font','link','icon');


/*
  This part adds pannel to customizer and then adds pre defined section to that customizer
*/
function pitemplate_copyright_option( $wp_customize ) {
  $panel = 'pitemplate_copyright';
  /* Top Bar section */
  $wp_customize->add_panel( $panel , array(
    'title'      => __('Copyright section','pitemplate'),
    'description' => "Copyright section",
    'priority'   => 7,
  ) );

  

  new pitemplate_layout_option($panel, $wp_customize, $GLOBALS['pitemplate_copyright_layout_option'] );

  new pitemplate_color_option($panel, $wp_customize, $GLOBALS['pitemplate_copyright_color_option'] );
  
  /* Copyright msg and other option */
  $wp_customize->add_section( 'pitemplate_copyright_content', array(
		'title'       => __( 'Content', 'pitemplate' ),
    'priority'    => 25,
    'panel'=>'pitemplate_copyright',
		'description' => __( 'content for copyright section', 'pitemplate' )
  ) );
  
  $wp_customize->add_setting( 'copyright_msg', array(
    'default' => '&copy; Copyright'
  ) );

  $wp_customize->add_control( 'copyright_msg', array(
    'type'     => 'text',
    'label'    => 'Copyright msg',
    'section'  => 'pitemplate_copyright_content',
  ) );

  $wp_customize->add_setting( 'show_social_icon_copyright', array(
    'default' => '1'
  ) );

  $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'show_social_icon_copyright',
        array(
            'label'          => __( 'Show social icon', 'pitemplate' ),
            'description'=>'show_social_icon_copyright',
            'section'        => 'pitemplate_copyright_content',
            'type' => 'radio',
            'settings'       => 'show_social_icon_copyright',
            'choices'        => array(
              '1'   => __( 'Show' ),
              '0'  => __( 'Hide' )
            )
        )
    )
  );

}
add_action( 'customize_register', 'pitemplate_copyright_option' );

/*
  Add layout file
*/
function pitemplate_copyright(){

  $panel = 'pitemplate_copyright'; 

  $show = get_theme_mod('show_'.$panel.'_layout',1);
  if($show == '0'){
    return;
  } 

  $width = get_theme_mod('width_'.$panel.'_layout',1);
  $template = get_theme_mod('template_'.$panel.'_layout','default');
  $social_icon_show = get_theme_mod('show_social_icon_copyright',1);
  $copyright_msg = get_theme_mod('copyright_msg','&copy; copyright');

  include('template/'.$template.'.php');
}

/*
  This add template css file and other css from the color setting
*/
new generate_color('pitemplate_copyright');
