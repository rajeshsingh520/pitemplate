<?php

class generate_color{

    private $panel_name;

    function __construct($panel_name, $external_css = true){
        
        $this->panel_name = $panel_name;
        $this->external_css = $external_css;

        add_action( 'wp_enqueue_scripts', array($this,'pitemplate_color_css') );
    }

    function pitemplate_color_css() {

        $panel_name = $this->panel_name;

        $combine_css = get_theme_mod('style_combine', 0);
      
        $template = get_theme_mod('template_'.$panel_name.'_layout','default');
        
        if($this->external_css){
          /*
          wp_enqueue_style(
            $panel_name,
              get_template_directory_uri() . '/template-parts/'.$panel_name.'/template/'.$template.'.css'
                );
          */
           $file_content = file_get_contents(get_template_directory_uri() . '/template-parts/'.$panel_name.'/template/'.$template.'.css');
           $custom_css = $file_content;
        }else{
           $custom_css ="";
        }
        
        $bg_color = get_theme_mod( 'bg_'.$panel_name.'_color','#000' ); //E.g. #FF0000
        $font_color = get_theme_mod( 'font_'.$panel_name.'_color','#fff' ); //E.g. #FF0000
        $custom_css .= "
              #".$panel_name."{
                              background-color: {$bg_color};
                              color:{$font_color};
                      }";
      
      
        $link_color = get_theme_mod( 'link_'.$panel_name.'_color','#ccc' ); //E.g. #FF0000
        $link_hover_color = get_theme_mod( 'link_hover_'.$panel_name.'_color','#000' ); //E.g. #FF0000
        $custom_css .= "
              #".$panel_name." a{
                              color:{$link_color};
                      }
              
              #".$panel_name." a:hover{
                        color:{$link_hover_color};
                      }
                      ";
      
        $icon_color = get_theme_mod( 'icon_'.$panel_name.'_color','#000' ); //E.g. #FF0000
        $icon_hover_color = get_theme_mod( 'icon_hover_'.$panel_name.'_color','#000' ); //E.g. #FF0000
        $custom_css .= "
              #".$panel_name." .fab, #".$panel_name." .fas{
                              color:{$icon_color};
                      }
              
              #".$panel_name." .fab:hover, #".$panel_name." .fas:hover{
                        color:{$icon_hover_color};
                      }
                      ";  
        
              if($combine_css == 0){
                wp_add_inline_style( 'bootstrap', $custom_css );
              }else{
                wp_add_inline_style( 'pitemplate-combine', $custom_css );
              }
        
              
      }
}