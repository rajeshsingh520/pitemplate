<?php

/*
    input: section name, customizer oject, setting needed for the section
*/

class pitemplate_layout_option{

    private $section_name;
    private $wp_customize;
    private $needed;

    function __construct($panel_name, $wp_customize, $needed){
        
        $this->panel_name = $panel_name;
        $this->section_name = $this->panel_name.'_layout';
        $this->wp_customize = $wp_customize;
        $this->needed = $needed;
        
        $wp_customize->add_section( $this->section_name , array(
            'title' => 'Layout',
            'panel' => $this->panel_name,
          ) );

        $this->needed_settings();

    }

    function needed_settings(){
        foreach($this->needed as $function){
            $this->$function();
        }
    }

    /* Show or hide section */
    function show(){
        $this->wp_customize->add_setting(
            'show_'.$this->section_name,
            array(
                'default'     => 1
            )
          );
        
          $this->wp_customize->add_control(
            new WP_Customize_Control(
                $this->wp_customize,
                'show_'.$this->section_name,
                array(
                    'label'          => __( 'Display this section', 'pitemplate' ),
                    'description'=>'show_'.$this->section_name,
                    'section'        => $this->section_name,
                    'settings'       => 'show_'.$this->section_name,
                    'type'           => 'radio',
                    'choices'        => array(
                        '1'   => __( 'Show' ),
                        '0'  => __( 'Hide' )
                    )
                )
            )
          );
    }


     /* Show or hide section */
     function mobile_show(){
        $this->wp_customize->add_setting(
            'mobile_show_'.$this->section_name,
            array(
                'default'     => 0
            )
          );
        
          $this->wp_customize->add_control(
            new WP_Customize_Control(
                $this->wp_customize,
                'mobile_show_'.$this->section_name,
                array(
                    'label'          => __( 'Display this section on mobile', 'pitemplate' ),
                    'description'=>'mobile_show_'.$this->section_name,
                    'section'        => $this->section_name,
                    'settings'       => 'mobile_show_'.$this->section_name,
                    'type'           => 'radio',
                    'choices'        => array(
                        '1'   => __( 'Show' ),
                        '0'  => __( 'Hide' )
                    )
                )
            )
          );
    }

    /* Show or hide section */
    function sticky(){
        $this->wp_customize->add_setting(
            'sticky_'.$this->section_name,
            array(
                'default'     => 0
            )
          );
        
          $this->wp_customize->add_control(
            new WP_Customize_Control(
                $this->wp_customize,
                'sticky_'.$this->section_name,
                array(
                    'label'          => __( 'Show on Sticky', 'pitemplate' ),
                    'description'=>'sticky_'.$this->section_name,
                    'section'        => $this->section_name,
                    'settings'       => 'sticky_'.$this->section_name,
                    'type'           => 'radio',
                    'choices'        => array(
                        '1'   => __( 'Sticky' ),
                        '0'  => __( 'Non Sticky' )
                    )
                )
            )
          );
    }

     /* Shrink menu on scroll when sticky */
     function shrink(){
        $this->wp_customize->add_setting(
            'shrink_'.$this->section_name,
            array(
                'default'     => 0
            )
          );
        
          $this->wp_customize->add_control(
            new WP_Customize_Control(
                $this->wp_customize,
                'shrink_'.$this->section_name,
                array(
                    'label'          => __( 'Shrink logo on scroll', 'pitemplate' ),
                    'description'=>'shrink_'.$this->section_name,
                    'section'        => $this->section_name,
                    'settings'       => 'shrink_'.$this->section_name,
                    'type'           => 'radio',
                    'choices'        => array(
                        '1'   => __( 'Shrink' ),
                        '0'  => __( 'No' )
                    )
                )
            )
          );
    }


    /*
        Full width stratched
        full width with container
        contained
    */
    function width(){
        $this->wp_customize->add_setting(
            'width_'.$this->section_name,
            array(
                'default'     => 1
            )
          );
        
          $this->wp_customize->add_control(
            new WP_Customize_Control(
                $this->wp_customize,
                'width_'.$this->section_name,
                array(
                    'label'          => __( 'Section width', 'pitemplate' ),
                    'description'=>'width_'.$this->section_name,
                    'section'        => $this->section_name,
                    'settings'       => 'width_'.$this->section_name,
                    'type'           => 'radio',
                    'choices'        => array(
                        '0'   => __( 'Full width stratched' ),
                        '1'  => __( 'Full width contained' ),
                        '2'  => __( 'Contained' )
                    )
                )
            )
          );
    }

    /*
        find all the files in the template folder of the given section
        and return then as array of only name
    */
    function get_files(){
        $files = array_diff(preg_grep('~\.(php)$~',scandir(get_template_directory().'/template-parts/'.$this->panel_name.'/template')), array('..', '.'));
        $return = array();
        foreach($files as $file){
            $final = str_replace('.php',"", $file);
            $return[$final] = $final;   
        }
        return $return;
    }

    function template(){

        $templates = $this->get_files();

        $this->wp_customize->add_setting(
            'template_'.$this->section_name,
            array(
                'default'     => 'default'
            )
          );
        
          $this->wp_customize->add_control(
            new WP_Customize_Control(
                $this->wp_customize,
                'template_'.$this->section_name,
                array(
                    'label'          => __( 'Select template', 'pitemplate' ),
                    'description'=>'template_'.$this->section_name,
                    'section'        => $this->section_name,
                    'settings'       => 'template_'.$this->section_name,
                    'type'           => 'select',
                    'choices'        => $templates
                )
            )
          );
    }

}