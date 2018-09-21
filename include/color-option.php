<?php

/*
    input: section name, customizer oject, setting needed for the section
*/

class pitemplate_color_option{

    private $section_name;
    private $wp_customize;
    private $needed;

    function __construct($panel_name, $wp_customize, $needed){
        
        $this->panel_name = $panel_name;
        $this->section_name = $this->panel_name.'_color';
        $this->wp_customize = $wp_customize;
        $this->needed = $needed;

        $wp_customize->add_section( $this->section_name , array(
            'title' => 'Color',
            'panel' => $this->panel_name,
          ) );

        $this->needed_settings();

    }

    function needed_settings(){
        foreach($this->needed as $function){
            $this->$function();
        }
    }

    /* Background color */
    function background(){
        $this->wp_customize->add_setting(
            'bg_'.$this->section_name,
            array(
                'default'     => '#000'
            )
          );
        
          $this->wp_customize->add_control(
            new WP_Customize_Color_Control(
                $this->wp_customize,
                'bg_'.$this->section_name,
                array(
                    'label'          => __( 'Background color', 'pitemplate' ),
                    'description'=>'bg_'.$this->section_name,
                    'section'        => $this->section_name,
                    'settings'       => 'bg_'.$this->section_name,
                )
            )
          );
    }

    /* Font color */
    function font(){
        $this->wp_customize->add_setting(
            'font_'.$this->section_name,
            array(
                'default'     => '#fff'
            )
          );
        
          $this->wp_customize->add_control(
            new WP_Customize_Color_Control(
                $this->wp_customize,
                'font_'.$this->section_name,
                array(
                    'label'          => __( 'Font color', 'pitemplate' ),
                    'description'=>'font_'.$this->section_name,
                    'section'        => $this->section_name,
                    'settings'       => 'font_'.$this->section_name,
                )
            )
          );
    }

    /* Link color and link hover */
    function link(){
        $this->wp_customize->add_setting(
            'link_'.$this->section_name,
            array(
                'default'     => '#ccc'
            )
          );
        
          $this->wp_customize->add_control(
            new WP_Customize_Color_Control(
                $this->wp_customize,
                'link_'.$this->section_name,
                array(
                    'label'          => __( 'Link color', 'pitemplate' ),
                    'description'=>'link_'.$this->section_name,
                    'section'        => $this->section_name,
                    'settings'       => 'link_'.$this->section_name,
                )
            )
          );

          $this->wp_customize->add_setting(
            'link_hover_'.$this->section_name,
            array(
                'default'     => '#fff'
            )
          );
        
          $this->wp_customize->add_control(
            new WP_Customize_Color_Control(
                $this->wp_customize,
                'link_hover_'.$this->section_name,
                array(
                    'label'          => __( 'Link hover color', 'pitemplate' ),
                    'description'=>'link_hover_'.$this->section_name,
                    'section'        => $this->section_name,
                    'settings'       => 'link_hover_'.$this->section_name,
                )
            )
          );
    }
    
     /* Icon color and hover */
     function icon(){
        $this->wp_customize->add_setting(
            'icon_'.$this->section_name,
            array(
                'default'     => '#ccc'
            )
          );
        
          $this->wp_customize->add_control(
            new WP_Customize_Color_Control(
                $this->wp_customize,
                'icon_'.$this->section_name,
                array(
                    'label'          => __( 'Icon color', 'pitemplate' ),
                    'description'=>'icon_'.$this->section_name,
                    'section'        => $this->section_name,
                    'settings'       => 'icon_'.$this->section_name,
                )
            )
          );

          $this->wp_customize->add_setting(
            'icon_hover_'.$this->section_name,
            array(
                'default'     => '#fff'
            )
          );
        
          $this->wp_customize->add_control(
            new WP_Customize_Color_Control(
                $this->wp_customize,
                'icon_hover_'.$this->section_name,
                array(
                    'label'          => __( 'Icon hover color', 'pitemplate' ),
                    'description'=>'icon_hover_'.$this->section_name,
                    'section'        => $this->section_name,
                    'settings'       => 'icon_hover_'.$this->section_name,
                )
            )
          );
    }
}