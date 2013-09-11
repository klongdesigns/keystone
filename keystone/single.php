<?php get_header(); ?>
	<?php while(have_posts()) : the_post(); ?>
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php the_content(); ?>
		<div id="comment-area">
			<?php comments_template(); ?>
		</div>
	<?php endwhile; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>