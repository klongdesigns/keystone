<?php

/*****************************************************
     Overwriting default functions of cornerstone
******************************************************/
function remove_cornerstone_actions() {
	remove_action('wp_enqueue_scripts', 'load_cornerstone_scripts',0);
	remove_action('init', 'Orbit');
	remove_action('init', 'cornerstone_menus');
}
add_action('after_setup_theme','remove_cornerstone_actions', 10);


function load_klongdesigns_scripts() {
	global $wp_styles;
	wp_register_style(
		'foundation_css',
		get_stylesheet_directory_uri() . '/style.css',
		array(),
		'4.3.1',
		'all'
	);
	wp_register_style(
		'foundation_ie8_grid',
		get_template_directory_uri() . '/css/ie8-grid-foundation-4.css',
		array( 'foundation_css' ),
		'1.0',
		'all'
	);
	wp_register_script(
		'foundation_modernizr_js',
		get_template_directory_uri() . '/js/custom.modernizr.js',
		array(),
		'2.6.2',
		false
	);
	wp_register_script(
		'foundation_js',
		get_template_directory_uri() . '/js/foundation.min.js',
		array('jquery'),
		'4.3.1',
		true
	);
	/* To enqueue more scripts or styles, follow that format: */

    //wp_register_script('cycle', get_bloginfo('stylesheet_directory') . '/js/cycle.js', array('jquery'));
	//wp_enqueue_script('cycle');
	
	wp_enqueue_style('foundation_css');
	wp_enqueue_style('foundation_ie8_grid');
	$wp_styles->add_data( 'foundation_ie8_grid', 'conditional', 'lt IE 8' );
	wp_enqueue_script('jquery');
	wp_enqueue_script('foundation_modernizr_js');
	wp_enqueue_script('foundation_js');

}

add_action('wp_enqueue_scripts', 'load_klongdesigns_scripts',0);




/*****************************************
 	Sidebar Widget Creations
*****************************************/
require_once('klongdesigns/sidebars.php');


/*************************************************************
 	Get all the images attached to the current post function
**************************************************************/
//require_once('klongdesigns/aldenta.php');


/*****************************************
 	White Labeling with Klong Designs
*****************************************/
require_once('klongdesigns/whitelabel.php');

/*****************************************
 	Theme Options Page
*****************************************/
require_once('theme_options/theme_options.php');



/*****************************************
 	Featured Image Support
*****************************************/

	//Add additional specs for image sizes
	//true means that it will crop it at thta size, false means that it will shrink either horiz or vert to the smallest unit specified for that size.
    //add_image_size('index-categories', 150, 150, true);
    //add_image_size('page-single', 350, 350, true);



/*****************************************
 	Add Menu Functionality
*****************************************/
add_action('init','register_my_menu');

/*
to use the menu, you will need to add this to the place where you want the menu to show up
wp_nav_menu(array('theme_location'=> 'top-menu', 'container'=>'nav','container_class'=>'grid_20 alpha'));

other options you can set:
	'menu'            => '', 
	'container_id'    => '',
	'menu_class'      => 'menu', 
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
View options for the wp_nav_menu at http://codex.wordpress.org/Function_Reference/wp_nav_menu

*/

function register_my_menu() {
	register_nav_menu('top-menu',__('Top Menu'));
}




/*****************************************
 	Allow excerpts for pages
*****************************************/
add_post_type_support( 'page', 'excerpt' );