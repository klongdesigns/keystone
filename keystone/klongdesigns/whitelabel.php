<?php

/**********************************************************************************
 	Rebrand WP Login
	This section is for customizations 
	to the wp-admin login page.
	my_custom_login adds the css file that will change the images
	new_wp_login_url changes the link that is attached to the login image
	new_wp_login_title changes the display text when you hover over the login image
**********************************************************************************/
function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/klongdesigns/custom_admin.css" />';
}
function new_wp_login_url() {
    return get_bloginfo('url');
}

function new_wp_login_title() {
    return get_option('blogname') . ' - Powered by Klong Designs';
}

add_action('login_head', 'my_custom_login');
add_filter('login_headerurl', 'new_wp_login_url');
add_filter('login_headertitle', 'new_wp_login_title');







/**********************************************************************************
 	REBRAND TITLE ON WP-ADMIN SECTION AT TOP
	This function changes the title of the admin section.
**********************************************************************************/
function new_wp_title() {
	$new_title= get_option('blogname') . ' - Admin Section';
	return $new_title;
}

add_filter('admin_title', 'new_wp_title');








/**********************************************************************************
 	REPLACE WP LOGO Admin Side
	This function adds the custom_admin.css stylesheet that changes css on the admin page.
	If also hides the updates notifications for any user that is NOT klongdesigns (our user)
**********************************************************************************/
function custom_admin_css() {
	global $current_user;
	get_currentuserinfo();
echo '<link rel="stylesheet" id="custom_admin" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/klongdesigns/custom_admin.css" />';
	if ($current_user->user_login != 'klongdesigns') {
			echo '<style type="text/css">.plugin-count, .update-count { display: none!important; } #wp-admin-bar-updates { display: none; }</style>';
	}
}

add_action('admin_head','custom_admin_css');





/**********************************************************************************
 	REPLACE FOOTER TEXT
	This function changes the text that is displayed in the footer of the site.
**********************************************************************************/
function filter_footer_admin() { ?>
Website designed and maintained by <a href="http://www.klongdesigns.com/" target="_blank">Klong Designs</a> | <a href="http://www.klongdesigns.com/support" target="_blank">Support</a>
<?php }

add_filter('admin_footer_text', 'filter_footer_admin');




/**********************************************************************************
 	REPLACE HOWDY
	This function replaces the "Howdy" text next to a user with a more professional
	"Welcome Back, "
**********************************************************************************/
add_filter('gettext', 'change_howdy', 10, 3);
function change_howdy($translated, $text, $domain) {
    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Welcome Back', $translated);
    return $translated;
}







/**********************************************************************************
 	REMOVE DASHBOARD WIDGETS
	This function removes all the dashboard widgets that users aren't interested in
	Comment out the ones you want to keep.
**********************************************************************************/

function remove_dashboard_widgets() {

global $wp_meta_boxes;

unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

remove_action( 'wp_version_check', 'wp_version_check' );
remove_action( 'admin_init', '_maybe_update_core' );
add_filter( 'pre_transient_update_core', create_function( '$a', "return null;" ) );

}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );





/**********************************************************************************
 	REMOVE ADMIN BAR WP-LOGO SUBMENU
	This function removes the Wordpress logo (and icon) that is normally at the top
	left of the admin panel.
**********************************************************************************/
function annointed_admin_bar_remove() {
        global $wp_admin_bar;

        /* Remove their stuff */
        $wp_admin_bar->remove_menu('wp-logo');
}

add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);






/**********************************************************************************
 	INSERT CUSTOM DASHBOARD WIDGETS
	This function adds our Dashboard Widget to the admin section.  This is where
	we can give instructions on using the CMS, with links to pdfs and videos.
**********************************************************************************/

/*
function tutorial_dashboard() {
?>
<h4>Adding Images</h4>
<p>From the Post or Page Edit Screen look for the Icons to the right of "Upload/Insert."  Click on the first Icon and follow the instructions on screen</p>
<h4>Adding Gallery Images</h4>
<p><a href="#">Adding Gallery Video Tutorial</a>
<h4>Cheat Sheats</h4>
<p><a href="#">View video tutorial</a> on how to use your new CMS</p>
<?php }

function tutorial_dashboard_setup() {
wp_add_dashboard_widget( 'tutorial_dashboard', __( 'Using Your Klong Designs CMS' ), 'tutorial_dashboard' );
}

add_action('wp_dashboard_setup', 'tutorial_dashboard_setup');

*/






/**********************************************************************************
 	REMOVE ADMIN PANELS
	
	This function removes certain panels that aren't used from non klongdesigns users.
**********************************************************************************/

/*
function klongdesigns_lock() {
	global $userdata;
	get_currentuserinfo();
	if ($userdata->user_login != 'klongdesigns') {
		remove_menu_page('link-manager.php');
		remove_menu_page('edit-comments.php');
		remove_menu_page('plugins.php');
		remove_menu_page('tools.php');
		//remove_submenu_page('themes.php', 'widgets.php');
		remove_submenu_page('themes.php', 'themes.php');
		remove_submenu_page('index.php', 'update-core.php');
	}
}

//For some reason, the theme editor can only be removed from the admin_init function call
function klongdesigns_lock_theme() {
	global $userdata;
	get_currentuserinfo();
	if ($userdata->user_login != 'klongdesigns') {
		remove_submenu_page('themes.php', 'theme-editor.php');
	}
}

add_action( 'admin_menu', 'klongdesigns_lock');
add_action( 'admin_init', 'klongdesigns_lock_theme');
*/