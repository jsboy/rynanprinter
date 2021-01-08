<?php
	$heading = get_field('heading');
	$effects = get_field('effects');
	$current = $effects['current']?$effects['current']:'dark';
	$up = $effects['up']?$effects['up']:'white';
?>
<section class="section waypoint-group" data-nav-effect="true" data-navigator='<?php echo $current; ?>' data-navigator-up='<?php echo $up; ?>'>
	<div class="container">
		<?php the_text($heading, '<h3 class="the-title text-primary text-style-3 mb-5">', '</h3>'); ?>
		<?php if(have_rows('text_columns')): ?>
		<div class="section-block">
			<div class="row row-about">
				<?php while (have_rows('text_columns')): the_row(); ?>
				<?php
					$title = get_sub_field('title');
					$description = get_sub_field('description');
				?>
				<div class="col-lg-4">
					<div class="service-card mb-4">
						<?php
							the_text($title, '<h5 class="text-style-5 text-dusk mb-lg-5 mb-4">', '</h5>');
							the_text($description, '<div class="text-style-12">', '</div>');
						?>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
		<?php endif; ?>
		<?php if(have_rows('picture_columns')): ?>
		<div class="row row-service">
			<?php while (have_rows('picture_columns')): the_row(); ?>
			<?php
				$picture = get_sub_field('picture');
				$caption = get_sub_field('caption');
			?>
			<div class="col-lg-3 col-md-6">
				<div class="service-card text-center mb-4">
					<?php
						the_image($picture, 'img-full');
						the_text($caption, '<h6 class="text-style-7 text-primary">', '</h6>');
					?>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
