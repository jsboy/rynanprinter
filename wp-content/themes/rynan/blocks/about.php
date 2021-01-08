<?php
	$heading = get_field('heading');
	$picture = get_field('picture');
	$about = get_field('about');
	$vision = get_field('vision');
	$effects = get_field('effects');
	$current = $effects['current']?$effects['current']:'dark';
	$up = $effects['up']?$effects['up']:'white';
?>
<section class="section section-top waypoint-group" data-nav-effect="true" data-navigator='<?php echo $current; ?>' data-navigator-up='<?php echo $up; ?>'>
	<div class="container">
		<div class="section-heading">
			<div class="mb-4">
				<div class="icons icon-quote"></div>
			</div>
			<?php the_text($heading, '<h3 class="the-title text-dusk text-style-3">', '</h3>'); ?>
		</div>
	</div>
</section>
<section class="section section-thumb py-0 text-right">
	<div class="section-thumb-right d-inline-block">
		<?php the_image($picture, 'img-full'); ?>
	</div>
</section>
<section class="section section-about-intro">
	<div class="container">
		<div class="row row-about">
			<div class="col-lg-6">
				<h3 class="the-title text-primary text-style-3"><?php _e('About'); ?></h3>
				<?php the_text($about, '<div class="text-block-content">', '</div>'); ?>
			</div>
			<div class="col-lg-6">
				<h3 class="the-title text-primary text-style-3"><?php _e('Vision'); ?></h3>
				<?php the_text($vision, '<div class="text-block-content">', '</div>'); ?>
			</div>
		</div>
	</div>
</section>