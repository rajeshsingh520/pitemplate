<?php

/*
    Enqueue Style
*/
function pitemplate_enqueue_css(){

    

    if( get_theme_mod('style_combine', 0)){
        wp_enqueue_style('pitemplate-combine',get_template_directory_uri().'/css/template.css.php');
    }else{
        wp_enqueue_style('bootstrap');
        wp_enqueue_style('fontawesome');
        wp_enqueue_style('comment');
        wp_enqueue_style('pitemplate-style');
    }
    
}
add_action('wp_enqueue_scripts', 'pitemplate_enqueue_css');

/*
    Enqueue JS
*/
function pitemplate_enqueue_js(){

    wp_enqueue_script('bootstrap');

    /*
        If sticky_header is 1 then load sticky header else not
    */
    if(get_theme_mod('sticky_header',0) == 1){
        wp_enqueue_script('sticky');
        wp_add_inline_script( 'sticky','
            jQuery(document).ready(function($){
                var sticky = new Sticky("#pitemplate_menu");
            });
        ');
    }

    /*
        If smooth_scroll is 1 then load smooth scroll librarry
    */
    if(get_theme_mod('smooth_scroll',1) == 1){
        wp_enqueue_script('smooth-scroll');
        wp_add_inline_script( 'smooth-scroll','
            jQuery(document).ready(function($){
                var scroll = new SmoothScroll(\'a[href*="#"]\');
            });
        ');
    }

    /*
        Responsive Font librarry for display-1 to display-4 class
    */
    wp_enqueue_script('fittext');
        wp_add_inline_script( 'fittext','
            jQuery(document).ready(function($){
                $(\'.display-1, .display-2, .display-3, .display-4\').fitText(0.8);
            });
        ');

}
add_action('wp_enqueue_scripts', 'pitemplate_enqueue_js');
