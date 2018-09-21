<?php
/*
    Developer option:
    Sticky 
*/
function pitemplate_developer_option($wp_customize){
    $wp_customize->add_section( 'pitemplate_developer' , array(
        'title' => 'Developer option',
        'priority'=>10
    ) );

    /*
        Show or hide admin bar on front end
    */
    $wp_customize->add_setting(
        'admin_bar',
        array(
            'default'     => 0
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'admin_bar',
            array(
                'label'          => __( 'Admin bar on front end', 'pitemplate' ),
                'description'   => 'admin_bar',
                'section'        => 'pitemplate_developer',
                'settings'       => 'admin_bar',
                'type'           => 'radio',
                'choices'        => array(
                    '1'   => __( 'Show' ),
                    '0'  => __( 'Hide' )
                )
            )
        )
    );

    /*
        Load style saperatelly or combine them all
    */
    $wp_customize->add_setting(
        'style_combine',
        array(
            'default'     => 0
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'style_combine',
            array(
                'label'          => __( 'Combine template styles', 'pitemplate' ),
                'description'   => 'style_combine',
                'section'        => 'pitemplate_developer',
                'settings'       => 'style_combine',
                'type'           => 'radio',
                'choices'        => array(
                    '1'   => __( 'Combine' ),
                    '0'  => __( 'Separate' )
                )
            )
        )
    );

    /*
        Smooth scroll library
    */
    $wp_customize->add_setting(
        'smooth_scroll',
        array(
            'default'     => 1
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'smooth_scroll',
            array(
                'label'          => __( 'Smooth scroll', 'pitemplate' ),
                'description'   => 'smooth_scroll',
                'section'        => 'pitemplate_developer',
                'settings'       => 'smooth_scroll',
                'type'           => 'radio',
                'choices'        => array(
                    '1'   => __( 'Smooth scroll' ),
                    '0'  => __( 'No' )
                )
            )
        )
    );
}
  add_action( 'customize_register', 'pitemplate_developer_option' );