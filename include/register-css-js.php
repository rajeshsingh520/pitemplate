<?php

/*
    Register Style
*/
function pitemplate_register_css(){

    wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css',null, '4.1.3');
    wp_register_style('fontawesome', get_template_directory_uri().'/css/all.min.css',null, '5.3.1');
    wp_register_style('comment', get_template_directory_uri().'/css/comment.css');
    wp_register_style('animate', get_template_directory_uri().'/css/animate.min.css',null,'3.7.0');
    wp_register_style('pitemplate-style', get_template_directory_uri().'/style.css');
}
add_action('init', 'pitemplate_register_css');

/*
    Register JS
*/
function pitemplate_register_js(){

    wp_register_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), '4.1.3');
    wp_register_script('sticky', get_template_directory_uri().'/js/sticky.min.js', array('jquery'),'1.0.4');
    wp_register_script('smooth-scroll', get_template_directory_uri().'/js/smooth-scroll.polyfills.min.js', array('jquery'),'14.2.1');
    wp_register_script('fittext', get_template_directory_uri().'/js/jquery.fittext.js', array('jquery'),'1.2');
    wp_register_script('wow', get_template_directory_uri().'/js/wow.min.js', array('jquery'),'1.1.3');
    
}
add_action('init', 'pitemplate_register_js');