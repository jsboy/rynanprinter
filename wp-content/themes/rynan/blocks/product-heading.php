<?php
	$root_img = get_template_directory_uri(). '/';
	$heading = get_field('heading');
	$description = get_field('description');
	$effects = get_field('effects');
	$current = $effects['current']?$effects['current']:'dark';
	$up = $effects['up']?$effects['up']:'white';
?>
<section class="section section__product-heading waypoint-group" data-nav-effect="true" data-navigator='<?php echo $current; ?>' data-navigator-up='<?php echo $up; ?>'>
	<div class="container">
		<div class="section-block">
			<div class="row">
				<div class="col-md-8">
					<?php the_text($heading, '<h3 class="the-title text-success text-style-3">', '</h3>'); ?>
				</div>
				<div class="col-md-4 text-md-right"></div>
			</div>
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6 text-md-right">
					<?php the_text($description, '<h4 class="the-title-icon text-style-4">', '</h4>'); ?>
				</div>
			</div>
		</div>
	</div>
</section>
