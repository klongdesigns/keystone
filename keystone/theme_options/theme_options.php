<?php
######################################################################
# MODIFY BELOW TO CHANGE THE THEME SETTINGS OPTIONS
######################################################################
$themename = "Company Name";
$shortname = "kd";

/* Define a Var for All Categories */
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
    $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "");

/* Define a Var for All Tags */
$tags = get_tags('hide_empty=0&orderby=name');
$wp_tags = array();
foreach ($tags as $tag_list ) {
    $wp_tags[$tag_list->term_id] = $tag_list->name;
}
array_unshift($wp_tags, "");

$theme_options = array (
	array( "name" => $themename." Options", "type" => "title"),

######################################################################
# SETTINGS BOX - GENERAL SETTINGS
######################################################################
	array( "name" => "General Settings", "type" => "section"), 
	array( "type" => "open"),

		array( "name" => "Custom Header Code",
			"desc" => "Add your custom header code here. This will be placed between the <head></head> tags.",
			"id" => $shortname."_header_code",
			"type" => "textarea",
			"std" => ""),
			
		array( "name" => "Custom Footer Code",
			"desc" => "Add your custom footer code here. This will be placed before the closing </body> tag.",
			"id" => $shortname."_footer_code",
			"type" => "textarea",
			"std" => ""),

	array( "type" => "close"),
######################################################################
# SETTINGS BOX - SOCIAL SETTINGS
######################################################################

/*
	array( "name" => "Social Media", "type" => "section"),
	array( "type" => "open"),

		array( "name" => "Facebook Link",
			"desc" => "Enter your Facebook URL.",
			"id" => $shortname."_social_fb",
			"type" => "text",
			"std" => ""),

		array( "name" => "Twitter Link",
			"desc" => "Enter your Twitter URL.",
			"id" => $shortname."_social_twitter",
			"type" => "text",
			"std" => ""),
			
		array( "name" => "YouTube Link",
			"desc" => "Enter your YouTube URL.",
			"id" => $shortname."_social_youtube",
			"type" => "text",
			"std" => ""),

	array( "type" => "close"),
	
	*/


######################################################################
# SETTINGS BOX - HEADER SETTINGS
######################################################################
/*
	array( "name" => "Header Options", "type" => "section"),
	array( "type" => "open"),
		
		array( "name" => "Address Line 1",
			"desc" => "",
			"id" => $shortname."_al1",
			"type" => "text",
			"std" => ""),
		
		array( "name" => "Address Line 2",
			"desc" => "",
			"id" => $shortname."_al2",
			"type" => "text",
			"std" => ""),

		array( "name" => "Phone Number",
			"desc" => "Phone number to show on homepage",
			"id" => $shortname."_al3",
			"type" => "text",
			"std" => ""),
			
		array( "name" => "Email Address",
			"desc" => "Your Email Address",
			"id" => $shortname."_al4",
			"type" => "text",
			"std" => ""),
		
		array( "name" => "Business Hours Title Line",
			"desc" => "The Title line that displays before the hours (e.g. - Pirates Alley Cafe Hours",
			"id" => $shortname."_bhtl",
			"type" => "text",
			"std" => ""),

		array( "name" => "Business Hours Line 1",
			"desc" => "Your Business Hours (e.g. - 8am-6pm Sunday-Friday",
			"id" => $shortname."_bh1",
			"type" => "text",
			"std" => ""),
			
		array( "name" => "Business Hours Line 2",
			"desc" => "Your Business Hours (e.g. - 8am-8pm Saturday",
			"id" => $shortname."_bh2",
			"type" => "text",
			"std" => ""),
		
		array( "name" => "Business Hours Footer Line",
			"desc" => "The footer line you want to display after the hours(e.g. - (11/28/11 - 02/29/12)",
			"id" => $shortname."_bhfl",
			"type" => "text",
			"std" => ""),

	array( "type" => "close"),

*/


######################################################################
# SETTINGS BOX - FOOTER SETTINGS
######################################################################
/*
	array( "name" => "Footer Options", "type" => "section"),
	array( "type" => "open"),
		
		array( "name" => "Copyright Name",
			"desc" => "Text to go after the copyright year.",
			"id" => $shortname."_copyright_name",
			"type" => "text",
			"std" => ""),
		
		array( "name" => "Privacy Link",
			"desc" => "Enter your Privacy URL.",
			"id" => $shortname."_privacy_link",
			"type" => "text",
			"std" => ""),

		array( "name" => "Legal Link",
			"desc" => "Enter your Legal URL.",
			"id" => $shortname."_legal_link",
			"type" => "text",
			"std" => ""),
			
		array( "name" => "Contact Link",
			"desc" => "Enter your Contact URL.",
			"id" => $shortname."_contact_link",
			"type" => "text",
			"std" => ""),


	array( "type" => "close"),

*/

######################################################################
# CREATES THEME SETTINGS FUNCTIONALITY - DONT TOUCH
######################################################################
);

function mytheme_add_admin() {
	global $themename, $shortname, $theme_options;
	if ( $_GET['page'] == basename(__FILE__) ) {
		if ( 'save' == $_REQUEST['action'] ) {
			foreach ($theme_options as $value) {
				update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
			}
			foreach ($theme_options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } 
			}
			header("Location: admin.php?page=theme_options.php&saved=true");
			die;
		} else if( 'reset' == $_REQUEST['action'] ) {
			foreach ($theme_options as $value) {
				delete_option( $value['id'] ); 
			}
			header("Location: admin.php?page=theme_options.php&reset=true");
			die;
		}
	}
	add_menu_page('Theme Settings', 'Theme Settings', 'administrator', basename(__FILE__), 'mytheme_admin',get_bloginfo('stylesheet_directory')."/klongdesigns/images/themeLogo.png",7);
}

function mytheme_add_init() {
	$file_dir = get_bloginfo('stylesheet_directory');
	wp_enqueue_style("theme_options", $file_dir. "/theme_options/theme_options.css", false, "1.0", "all");
	wp_enqueue_script("theme_options", $file_dir ."/theme_options/theme_options.js", false, "1.0");
}

function mytheme_admin() {
	global $themename, $shortname, $theme_options;
	$i=0;

	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>Theme settings saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>Theme settings reset.</strong></p></div>';

	?>
	<div class="wrap rm_wrap">
	<h2>Theme Settings</h2>
		<div class="rm_opts">
		<form method="post">

		<?php foreach ($theme_options as $value) {
			switch ( $value['type'] ) {
				case "open":
				
				break; case "close": 
		?>
					</div>
				</div>
				<br />

				<?php break; case "title": ?>
				<p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>

				<?php break; case 'text': ?>
				<div class="rm_input rm_text">
					<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
					<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
					<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
				 </div>
				 
				<?php break; case 'textarea': ?>
				<div class="rm_input rm_textarea">
					<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
					<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
				 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
				 </div>

				<?php break; case 'select': ?>
				<div class="rm_input rm_select">
					<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
					<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php foreach ($value['options'] as $option) { ?>
							<option value="<?php echo $option; ?>" <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
					</select>
					<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
				</div>
				
				<?php break; case "checkbox": ?>
				<div class="rm_input rm_checkbox">
					<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
					<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
					<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
					<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
				 </div>
				 
				<?php break; case "section": $i++; ?>
				<div class="rm_section">
				<div class="rm_title"><h3><img src="<?php bloginfo('stylesheet_directory')?>/theme_options/images/trans.png" class="inactive" alt=""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
				</span><div class="clearfix"></div></div>
				<div class="rm_options">

				<?php break;
			} // end switch statement
		} // end foreach
	?>

	<input type="hidden" name="action" value="save" />
	</form>
	
	<form method="post">
		<p class="submit">
		<input name="reset" type="submit" value="Reset" />
		<input type="hidden" name="action" value="reset" />
		</p>
	</form>
	
	</div> 

<?php } // end mytheme_admin() function
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');