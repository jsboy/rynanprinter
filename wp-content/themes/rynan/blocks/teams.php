<?php
	$heading = get_field('heading');
	$description = get_field('description');
	$effects = get_field('effects');
	$current = $effects['current']?$effects['current']:'white';
	$up = $effects['up']?$effects['up']:'dark';
	if(have_rows('members')):
?>
<section class="section section-team section-background-gradient-slider waypoint-group" data-nav-effect="true" data-navigator='<?php echo $current; ?>' data-navigator-up='<?php echo $up; ?>'>
	<div class="team-slider">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php the_text($heading, '<h3 class="the-title text-primary text-style-3">', '</h3>'); ?>
					<?php the_text($description, '<div class="text-style-12 mb-lg-4">', '</div>'); ?>
				</div>
			</div>
			<div class="slick-carousel" data-slick='{"arrows":false,"dots":true,"slidesToShow":4,"infinite":false,"slidesToScroll":1,"responsive":[{"breakpoint":992,"settings":{"infinite":false,"slidesToShow":3,"slidesToScroll":1}},{"breakpoint":768,"settings":{"infinite":false,"slidesToShow":2,"slidesToScroll":1}},{"breakpoint":480,"settings":{"arrows":false,"infinite":false,"slidesToShow":1.3,"slidesToScroll":1}}]}'>
				<?php
					while (have_rows('members')): the_row();
						$name = get_sub_field('name');
						$title = get_sub_field('title');
						$bio = get_sub_field('bio');
						$picture = get_sub_field('picture');
				?>
				<div class="slider-item">
					<div class="service-card text-center">
						<?php the_image($picture, 'img-full'); ?>
						<!-- <h6 class="text-style-7 text-primary">Electrical Engineers</h6> -->
						<?php the_text($name, '<h6 class="text-style-7 text-primary mb-3">', '</h6>'); ?>
						<?php the_text($title, '<div class="text-style-12">', '</div>'); ?>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
			<!-- <div class="fullbanner-slider slick-carousel" data-slick='{"arrows":false,"dots":true,"slidesToShow":1,"infinite":false,"slidesToScroll":1}'>
				<?php
					// while (have_rows('members')): the_row();
					// 	$name = get_sub_field('name');
					// 	$title = get_sub_field('title');
					// 	$bio = get_sub_field('bio');
					// 	$picture = get_sub_field('picture');
				?>
				<div class="slider-item">
					<div class="team-slider-item">
						<div class="slider-content">
							<?php //the_text($heading, '<h3 class="the-title text-primary text-style-3">', '</h3>'); ?>
							<?php //the_text($name, '<h5 class="the-title text-primary text-style-5 mb-4">', '</h5>'); ?>
							<?php //the_text($title, '<h6 class="the-title text-white text-style-7 mb-4">', '</h6>'); ?>
							<?php //the_text($bio, '<div class="text-style-12">', '</div>'); ?>
						</div>
						<div class="slider-thumb">
							<?php //the_image($picture, 'img-full'); ?>
						</div>
					</div>
				</div>
				<?php //endwhile; ?>
			</div> -->
		</div>
	</div>
</section>
<?php endif; ?>
