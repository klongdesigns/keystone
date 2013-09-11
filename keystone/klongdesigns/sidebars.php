<?php
function remove_cornerstone_sidebars(){

	// Unregister some of the TwentyTen sidebars
	unregister_sidebar( 'right_sidebar' );
	unregister_sidebar( 'footer_sidebar' );
}
add_action( 'widgets_init', 'remove_cornerstone_sidebars', 11 );


if ( function_exists('register_sidebar') )
register_sidebar(array(
'name'=> 'Main Sidebar',
		'id' => 'main_sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
));

// for sidebar.php if needed (remove the // below the if() statement)
// if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : endif;