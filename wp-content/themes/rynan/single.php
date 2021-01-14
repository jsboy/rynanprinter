<?php
/*
 * Template Name: Blog main
 *
 * */
	get_header();
	if(have_posts()):
?>
	<div class="section section-postcontent" data-nav-effect="true" data-navigator="dark" data-navigator-up="dark">
		<div class="container">
			<article class="post-detail">
			
<?php
		while (have_posts()): the_post();
?>
			<?php the_post_thumbnail('full', array('class' => 'img-featured img-fluid')); ?>
			<div class="post-socials">
				<div class="socials">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="icons" target="_blank"><i class="fab fa-facebook-f"></i></a>
					<a class="icons" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>&url=<?php the_permalink(); ?>"><i class="fab fa-twitter"></i></a>
					<a class="icons" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>"><i class="fab fa-linkedin-in"></i></a>
				</div>
			</div>
			<div class="post-date"><?php the_time("F j, Y"); ?></div>
			<h1 class="post-title"><?php the_title();  ?></h1>
<?php
			the_content();
		endwhile;
		wp_reset_postdata();
	endif;
?>
			<article>
		</div>
	</div>
	<?php 
		$posttags = get_the_tags();
		if ($posttags) :
	?>
	<div  class="section section-tags" data-nav-effect="true" data-navigator="dark" data-navigator-up="dark">
		<div class="post-tags">
			<div class="tags-title">Tags</div>
			<div class="tags-list">
			<?php foreach($posttags as $tag) : ?>
				<span><?php echo $tag->name; ?></span>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
	<?php
		endif;
		$postId = get_the_ID();
		$related = get_posts( array( 'category__in' => wp_get_post_categories($postId), 'numberposts' => 2, 'post__not_in' => array($postId)));
		if( $related ): 
	?>
	<div  class="section section-related" data-nav-effect="true" data-navigator="dark" data-navigator-up="dark">
		<div class="container">
			<h2>More articles</h2>
			<div class="post-list">
				<?php foreach( $related as $post ) : setup_postdata($post);?>
				<div class="post-item">
					<div class="post-item__content">
						<?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
						<div class="post-date"><?php the_time("F j, Y");  ?></div>
						<div class="post-title"><?php the_title();  ?></div>
					</div>
					<a href="<?php the_permalink(); ?>" class="read-more">Read more</a>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php
		endif;
	get_footer();
