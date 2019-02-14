<?php
/* Remove Admin bar from website */
if(get_theme_mod('admin_bar',0) == 0){
    add_filter('show_admin_bar', '__return_false');
}

$GLOBALS['primary_color'] = "#ee6443"; // this is used for the link color
$GLOBALS['secondary_color'] = "#00a69f"; //this is used for link hover color
$GLOBALS['thrid_color'] = "#eda11b"; // this is icon normal color
$GLOBALS['dark_color'] = "#1a4562"; // font color
$GLOBALS['light_color'] = "#ffffff"; //background color

/*
    Register css and js
    (only registers the css and js does not add it to docuent)
*/
include_once(get_template_directory().'/include/register-css-js.php');

/*
    Enqueue CSS and JS
    (enqueue is attaches the css and js to document code)
*/
include_once(get_template_directory().'/include/enqueue-css-js.php');

/*
    Widgets
*/
include_once(get_template_directory().'/template-parts/general/pitemplate_widgets.php');

/*
    Customizer option
*/
include_once(get_template_directory().'/template-parts/general/pitemplate_header.php');
include_once(get_template_directory().'/template-parts/general/pitemplate_content.php');
include_once(get_template_directory().'/template-parts/general/pitemplate_developer.php');
include_once(get_template_directory().'/template-parts/general/pitemplate_general.php');
include_once(get_template_directory().'/template-parts/general/pitemplate_social.php');
include_once(get_template_directory().'/template-parts/pitemplate_top/pitemplate_top.php');
include_once(get_template_directory().'/template-parts/pitemplate_menu/pitemplate_menu.php');
include_once(get_template_directory().'/template-parts/pitemplate_footer/pitemplate_footer.php');
include_once(get_template_directory().'/template-parts/pitemplate_copyright/pitemplate_copyright.php');




/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
*/
add_theme_support( 'title-tag' );

/*
    Title function:
    with this we can change title desing through out the site
*/
function pi_title($size=1){
	if(is_page() || is_single() || is_home()){
		echo '<h1 class="display-'.$size.'">'.single_post_title(null,false).'</h1>';
	}else{
		the_archive_title( '<h1 class="display-'.$size.'">', '</h1>' );
	}
}

/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
*/
    add_theme_support( 'post-thumbnails' );
    
/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
*/
	
	function custom_theme_setup() {
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );
	}
	add_action( 'after_setup_theme', 'custom_theme_setup' );

/*
	Thumbnail function
	Reference: twentyfifteen_post_thumbnail()
*/
function pi_thumbnail() { 
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) { 
        return; 
    } 
 
    if ( is_singular() ) : 
    ?> 
 
    <div class="post-thumbnail"> 
        <?php the_post_thumbnail('full', array( 'alt' => get_the_title(), 'class'=>'img-fluid' ) ); ?> 
    </div><!-- .post-thumbnail --> 
 
    <?php else : ?> 
 
    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true"> 
        <?php 
            the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'class'=>'img-fluid' ) ); 
        ?> 
    </a> 
 
    <?php endif; // End is_singular() 
} 

/*
	Bootstrap 4 based paging
*/
function wpbeginner_numeric_posts_nav($pages = '', $range = 2) 
{  
	$showitems = ($range * 2) + 1;  
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == '')
	{
		global $wp_query; 
		$pages = $wp_query->max_num_pages;
	
		if(!$pages)
			$pages = 1;		 
	}   
	
	if(1 != $pages)
	{
	    echo '<nav aria-label="Page navigation" role="navigation">';
        echo '<span class="sr-only">Page navigation</span>';
        echo '<ul class="pagination justify-content-center ft-wpbs">';
		
       // echo '<li class="page-item disabled hidden-md-down d-none d-lg-block"><span class="page-link">Page '.$paged.' of '.$pages.'</span></li>';
	
	 	if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link(1).'" aria-label="First Page">&laquo;<span class="hidden-sm-down d-none d-md-block"> First</span></a></li>';
	
	 	if($paged > 1 && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'" aria-label="Previous Page">&lsaquo;<span class="hidden-sm-down d-none d-md-block"> Previous</span></a></li>';
	
		for ($i=1; $i <= $pages; $i++)
		{
		    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				echo ($paged == $i)? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>'.$i.'</span></li>' : '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'"><span class="sr-only">Page </span>'.$i.'</a></li>';
		}
		
		if ($paged < $pages && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" aria-label="Next Page"><span class="hidden-sm-down d-none d-md-block">Next </span>&rsaquo;</a></li>';  
	
	 	if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'" aria-label="Last Page"><span class="hidden-sm-down d-none d-md-block">Last </span>&raquo;</a></li>';
	
	 	echo '</ul>';
        echo '</nav>';
        echo '<div class="pagination-info mb-1 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">of</span> '.$pages.' ]</div>';	 	
	}
}
