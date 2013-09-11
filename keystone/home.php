<?php get_header(); ?>
	<?php 
	// You need to set a specific page you want to include on the home page
$homeQuery = new WP_Query('query');
	if($homeQuery->have_posts()):
		//code to run
	while($homeQuery->have_posts()):$homeQuery->the_post();
	?>
		<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
	<?php
	endwhile;
	
	endif;wp_reset_postdata();

?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>