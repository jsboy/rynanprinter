<?php
	$heading = get_field('heading');
	$description = get_field('description');
	$text_color = get_field('text_color')?get_field('text_color'): 'text-content-lightgrey';
	$button_link = get_field('button_link');
	$button_position = get_field('button_position');
	$picture = get_field('picture');
	$img_postion = ($button_position !== 'under')? 'img-section-bottom':'';
	$effects = get_field('effects');
	$current = $effects['current']?$effects['current']:'white';
	$up = $effects['up']?$effects['up']:'white';
?>
<section class="section section-background-gradient section-complex waypoint-group" data-nav-effect="true" data-navigator='<?php echo $current; ?>' data-navigator-up='<?php echo $up; ?>' id="section-07">
	<div class="container">
		<div class="row">
			<div class="col-xl-10 offset-xl-1">
				<div class="text-center">
					<div class="section-heading">
						<?php the_text($heading, '<h3 class="the-title text-primary text-style-3">', '</h3>'); ?>
						<?php the_text($description, '<h6 class="'.$text_color.' text-style-6">', '</h6>'); ?>
					</div>
					<?php if($button_link && $button_position != 'under'): ?>
					<a class="btn btn-outline-primary btn-lg btn-wrapper" href="<?php echo $button_link['url']; ?>" target="<?php echo $button_link['target']; ?>">
						<span><?php echo $button_link['title']; ?></span>
					</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="img-section <?php echo $img_postion; ?> text-center">
			<?php the_image($picture, 'img-fluid'); ?>
			<?php if($button_link && $button_position == 'under'): ?>
				<div class="text-center">
					<a class="btn btn-outline-primary btn-lg btn-wrapper" href="<?php echo $button_link['url']; ?>" target="<?php echo $button_link['target']; ?>">
						<span><?php echo $button_link['title']; ?></span>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
