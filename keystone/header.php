<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>

	<title><?php wp_title(''); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1">
	<?php
	/*if you are wanting to use browser detection to adjust your css, uncomment the following:
	?>
    <?php require('Browser.php');
	$browser = new Browser();
	
if( $browser->getBrowser() == Browser::BROWSER_SAFARI or $browser->getBrowser() == Browser::BROWSER_CHROME) {
//Do stuff if browser is Safari or Chrome -- need to set above to check for browser that is causing issues with layout
} else {
//if it's not those browsers, you can do something else
}
?>
	<?php /* end commenting of browser detection script*/?>
    <!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
	<link rel="alternate" type="text/xml" title="<?php bloginfo('name'); ?> RSS 0.92 Feed" href="<?php bloginfo('rss_url'); ?>">
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0 Feed" href="<?php bloginfo('rss2_url'); ?>">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head(); ?>
	<?php // echo stripslashes(get_option('oc_header_code')); ?>

</head>
<body>
<div id="container">
    <header class="row">
        <?php 
		// To use the top bar menu, uncomment this line of code.
		/*
		<nav class="top-bar">
		  <ul class="title-area">
			<!-- Title Area -->
			<li class="name">
				<div class="sitetitle"></div>
			</li>
			<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		  </ul>
		
		  <section class="top-bar-section">
			<?php
			  // Left Nav Section
			  wp_nav_menu( array(
				  'theme_location' => 'top-menu',
				  'container' => false,
				  'depth' => 0,
				  'items_wrap' => '<ul class="left">%3$s</ul>',
				  'fallback_cb' => false,
				  'walker' => new cornerstone_walker( array(
					  'in_top_bar' => true,
					  'item_type' => 'li'
				  ) ),
			  ) );
			  ?>
		  </section>
		</nav>
		*/
?>
    </header>
    <section class="row">
<?php /*bloginfo('url'); ?>
<?php bloginfo('template_directory'); */ ?>