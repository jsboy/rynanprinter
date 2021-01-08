<?php
/*
 * Template Name: Simple
 * */
	get_header();
	while (have_posts()): the_post();
?>
	<section class="section waypoint-group" data-nav-effect="true" data-navigator='dark' data-navigator-up='dark'>
		<div class="container">
			<div class="content">
				<div class="section-heading">
					<div class="mb-4">

					</div>
					<h3 class="the-title text-dusk text-style-3">
						<?php the_title(); ?>
					</h3>
				</div>

				<div class="post-content text-block-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</section>

<?php
	endwhile;
	get_footer();
