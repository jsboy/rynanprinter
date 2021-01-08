<?php
/*
 * Template Name: Blog
 *
 * */
	get_header();
	if(have_posts()):
		while (have_posts()): the_post();
?>
	<div class="container">
		<?php echo get_the_title(); ?>
	</div>
<?php
		endwhile;
		wp_reset_query();
	endif;
	get_footer();
