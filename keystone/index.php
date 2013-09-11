<?php get_header(); ?>
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php the_content(); ?>
	<?php endwhile; else : ?>
		<h2>Page Not Found</h2>
		<p>Looks like the page you're looking for isn't here anymore. Try browsing the <a href="">categories</a>, <a href="">archives</a>, or using the search box below.</p>
		<?php include(TEMPLATEPATH.'/searchform.php'); ?>
	<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>