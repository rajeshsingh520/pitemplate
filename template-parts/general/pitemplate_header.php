<?php
/*
    Header option:
    Sticky 
*/
function pitemplate_header_option($wp_customize){
    $wp_customize->add_section( 'pitemplate_header' , array(
        'title' => 'Header',
        'priority'=>1
    ) );

    $wp_customize->add_setting(
        'sticky_header',
        array(
            'default'     => 0
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'sticky_header',
            array(
                'label'          => __( 'Sticky header', 'pitemplate' ),
                'description'   => 'sticky_header',
                'section'        => 'pitemplate_header',
                'settings'       => 'sticky_header',
                'type'           => 'radio',
                'choices'        => array(
                    '1'   => __( 'Sticky' ),
                    '0'  => __( 'Non Sticky' )
                )
            )
        )
    );
}
  add_action( 'customize_register', 'pitemplate_header_option' );