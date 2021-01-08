<?php
	$heading = get_field('heading');
	$description = get_field('description');
	$picture = get_field('picture');
	$layout = get_field('layout');
	$effects = get_field('effects');
	$text_color = get_field('text_color')?get_field('text_color'): 'text-content-lightgrey';

	if($layout == 'horizontal'):
		$current = $effects['current']?$effects['current']:'dark';
		$up = $effects['up']?$effects['up']:'white';
?>
<section class="section section-text-media waypoint-group" data-nav-effect="true" data-navigator='<?php echo $current; ?>' data-navigator-up='<?php echo $up; ?>'>
	<div class="container">
		<div class="row row-about">
			<div class="col-lg-6">
				<?php the_text($heading, '<h3 class="the-title text-primary text-style-3">', '</h3>'); ?>
				<?php the_text($description, '<div class="text-default '.$text_color.'">', '</div>'); ?>
			</div>
			<div class="col-lg-6">
				<?php the_image($picture, 'img-full'); ?>
			</div>
		</div>
	</div>
</section>
<?php else:
		$current = $effects['current']?$effects['current']:'white';
		$up = $effects['up']?$effects['up']:'white';
		$clazz = (is_front_page())? 'section-textmedia': '';
?>
<section class="section <?php echo $clazz; ?> section-background waypoint-group" data-nav-effect="true" data-navigator='<?php echo $current; ?>' data-navigator-up='<?php echo $up; ?>'>
	<div class="container">
		<div class="row">
			<div class="col-xl-10 offset-xl-1">
				<div class="text-center">
					<div class="section-heading">
						<?php
							the_text($heading, '<h3 class="the-title text-primary text-style-3">', '</h3>');
							the_text($description, '<h6 class="'.$text_color.' text-style-6">', '</h6>');
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="img-section text-center">
			<?php the_image($picture, 'img-fluid'); ?>
		</div>
	</div>
</section>
<?php endif; ?>
