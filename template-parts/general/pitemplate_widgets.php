<?php

if (function_exists('register_sidebar')) {  
    register_sidebar(array(  
        'name' => 'Sidebar Right',  
        'id'   => 'sidebar',  
        'description'   => 'Sidebar',  
        'before_widget' => '<div  class="sidebar-right sidebar">',  
        'after_widget'  => '</div>',  
        'before_title'  => '<h3 class="widget-title sidebar-title sidebar-right-title">',  
        'after_title'   => '</h3>' ,
    ));

    register_sidebar(array(  
        'name' => 'Footer',  
        'id'   => 'footer',  
        'description'   => 'Footer',  
        'before_widget' => '<div  class="col-12 col-md">',  
        'after_widget'  => '</div>',  
        'before_title'  => '<h3 class="widget-title footer">',  
        'after_title'   => '</h3>' ,
    )); 
}