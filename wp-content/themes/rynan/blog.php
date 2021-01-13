<?php
/*
 * Template Name: Blog
 *
 * */
	get_header();
	$args = array(
		'posts_per_page' => 1,
		'post__in' => get_option( 'sticky_posts' ),
		'ignore_sticky_posts' => 1
	);
	$query = new WP_Query( $args );
	
	if($query->have_posts()):
		while ($query->have_posts()): $query->the_post();
			$feature = get_the_ID();
?>
	<div class="section section-featured" data-nav-effect="true" data-navigator="dark" data-navigator-up="dark">
		<div class="container">
			<div class="featured-post post" data-postid="<?php the_ID(); ?>">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?></a>
				<div class="featured-post__description">
					<div class="post-date"><?php the_time("F j, Y");  ?></div>
					<div class="post-title"><?php the_title();  ?></div>
					<div class="post-excerpt"><?php the_excerpt();  ?></div>
					<a href="<?php the_permalink(); ?>" class="read-more">Read more</a>
				</div>
			</div>
		</div>
	</div>
<?php
		endwhile;
		wp_reset_query();
	endif;
	$query = new WP_Query(array(
		'post__not_in' => array($feature),
		'posts_per_page' => 4
	));
	if($query->have_posts()):	
?>
	<div class="section section-posts" data-nav-effect="true" data-navigator="dark" data-navigator-up="dark">
		<div class="container">
			<div class="post-list">
				<?php while ($query->have_posts()): $query->the_post(); ?>
				<div class="post-item post" data-postid="<?php the_ID(); ?>">
					<div class="post-item__content">
						<?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
						<div class="post-date"><?php the_time("F j, Y");  ?></div>
						<div class="post-title"><?php the_title();  ?></div>
						<div class="post-excerpt"><?php the_excerpt();  ?></div>
					</div>
					<a href="<?php the_permalink(); ?>" class="read-more">Read more</a>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
	<div class="post-action text-centet">
		<a class="btn btn-outline-primary btn-lg btn-wrapper" id="loadmore" href="#loadmore">
			<span>Load more</span>
		</a>
	</div>
	<script>
	var $ = jQuery;
	$(function() {
		$('#loadmore').on('click', function(e) {
			e.preventDefault();
			var posts = $('.post');
			var ignore_list = '';
			posts.each(function(){
				ignore_list += ',' + $(this).data('postid');
			})
			ignore_list = ignore_list.substring(1);
			$.ajax({
				url:     '<?php echo admin_url( 'admin-ajax.php' ); ?>',
				method: 'POST',
				dataType: 'HTML',
				data:    {
				  action  : 'getposts',
				  ignore: ignore_list
				},
				success: function(data){
					if(data) {
						$('.post-list').append(data);
					}else {
						$('#loadmore').parent().hide();
					}
					
				}
        	});
		});
	});
</script>
<?php
		wp_reset_query();
	endif;
	get_footer();
