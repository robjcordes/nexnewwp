<?php

include( TEMPLATEPATH.'/constants.php' );
include( TEMPLATEPATH.'/classes.php' );
include( TEMPLATEPATH.'/widgets.php' );

/**
 * Disable automatic general feed link outputting.
 */
automatic_feed_links( false );

//remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'id' => 'default-sidebar',
		'name' => 'Default Sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'id' => 'menus-sidebar',
		'name' => 'Menus Sidebar',
		'before_widget' => '<div class="col">',
		'after_widget' => '</div>',
		'before_title' => '<h4><a href="#">',
		'after_title' => '</a></h4>'
	));
	register_sidebar(array(
		'id' => 'footer-sidebar',
		'name' => 'Footer Sidebar',
		'before_widget' => '<div class="frame">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
	register_sidebar(array(
		'id' => 'social-sidebar',
		'name' => 'Social Sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'id' => 'carousel-sidebar',
		'name' => 'Carousel Sidebar',
		'before_widget' => '<div class="carousel">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'id' => 'promo-sidebar',
		'name' => 'Promo Sidebar',
		'before_widget' => '<div class="promo-box">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'id' => 'section-one-sidebar',
		'name' => 'Section One Sidebar',
		'before_widget' => '<section class="grid_8 alpha col1">',
		'after_widget' => '</section>',
		'before_title' => '<div class="heading"><h2>',
		'after_title' => '</h2></div>'
	));
	register_sidebar(array(
		'id' => 'section-two-sidebar',
		'name' => 'Section Two Sidebar',
		'before_widget' => '<section class="grid_4 omega col2">',
		'after_widget' => '</section>',
		'before_title' => '<div class="heading"><h2>',
		'after_title' => '</h2></div>'
	));
	register_sidebar(array(
		'id' => 'carousel-post-sidebar',
		'name' => 'Carousel Post Sidebar',
		'before_widget' => '<div class="carousel1">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'id' => 'posts-sidebar',
		'name' => 'Posts Sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
		register_sidebar(array(
		'id' => 'posts-sidebar-comm',
		'name' => 'Posts Sidebar Commercial',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 50, 50, true ); // Normal post thumbnails
	add_image_size( 'single-post-thumbnail', 620, 220, true );
}

register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'base' ),
	
) );


//add [email]...[/email] shortcode
function shortcode_email($atts, $content) {
	$result = '';
	for ($i=0; $i<strlen($content); $i++) {
		$result .= '&#'.ord($content{$i}).';';
	}
	return $result;
}
add_shortcode('email', 'shortcode_email');

// register tag [template-url]
function filter_template_url($text) {
	return str_replace('[template-url]',get_bloginfo('template_url'), $text);
}
add_filter('the_content', 'filter_template_url');
add_filter('get_the_content', 'filter_template_url');
add_filter('widget_text', 'filter_template_url');

// register tag [site-url]
function filter_site_url($text) {
	return str_replace('[site-url]',get_bloginfo('url'), $text);
}
add_filter('the_content', 'filter_site_url');
add_filter('get_the_content', 'filter_site_url');
add_filter('widget_text', 'filter_site_url');


/* Replace Standart WP Menu Classes */
function change_menu_classes($css_classes) {
        $css_classes = str_replace("current-menu-item", "active", $css_classes);
        $css_classes = str_replace("current-menu-parent", "active", $css_classes);
        return $css_classes;
}
add_filter('nav_menu_css_class', 'change_menu_classes');


//allow tags in category description
$filters = array('pre_term_description', 'pre_link_description', 'pre_link_notes', 'pre_user_description');
foreach ( $filters as $filter ) {
    remove_filter($filter, 'wp_filter_kses');
}


//Make WP Admin Menu HTML Valid
function wp_admin_bar_valid_search_menu( $wp_admin_bar ) {
	if ( is_admin() )
		return;

	$form  = '<form action="' . esc_url( home_url( '/' ) ) . '" method="get" id="adminbarsearch"><div>';
	$form .= '<input class="adminbar-input" name="s" id="adminbar-search" tabindex="10" type="text" value="" maxlength="150" />';
	$form .= '<input type="submit" class="adminbar-button" value="' . __('Search') . '"/>';
	$form .= '</div></form>';

	$wp_admin_bar->add_menu( array(
		'parent' => 'top-secondary',
		'id'     => 'search',
		'title'  => $form,
		'meta'   => array(
			'class'    => 'admin-bar-search',
			'tabindex' => -1,
		)
	) );
}
function fix_admin_menu_search() {
	remove_action( 'admin_bar_menu', 'wp_admin_bar_search_menu', 4 );
	add_action( 'admin_bar_menu', 'wp_admin_bar_valid_search_menu', 4 );
}
add_action( 'add_admin_bar_menus', 'fix_admin_menu_search' );

add_action('init', 'theme_custom_init');
function theme_custom_init() 
{
  $labels = array(
    'name' => _x('Grids', 'post type general name'),
    'singular_name' => _x('Grids Item', 'post type singular name'),
    'add_new' => _x('Add New', 'Homepage Grids Item'),
    'add_new_item' => __('Add New Grids Item'),
    'edit_item' => __('Edit Grids Item'),
    'new_item' => __('New Grids Item'),
    'view_item' => __('View Grids Item'),
    'search_items' => __('Search Grids Item'),
    'not_found' =>  __('No Grids Item found'),
    'not_found_in_trash' => __('No Grids Items found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Grids'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title', 'editor', 'custom-fields', 'page-attributes', 'thumbnail', 'excerpt')
  ); 
  register_post_type('grid',$args);

}

?>