<?php
	$name = get_field('name');
	$picture = get_field('picture');
	$picture_mobile = (get_field('picture_mobile'))?get_field('picture_mobile'): $picture;
	$button_link = get_field('button_link');
	$theme = get_field('theme');
	$heading_style =  '';
	$text_style = '';
	if($theme == 'blue') {
		$text_style = 'text-info';
		$btn_class = 'btn-blue';
	}elseif ($theme ==  'yellow') {
		$text_style = 'text-warning';
		$btn_class = 'btn-yellow';
	}elseif ($theme == 'purple') {
		$text_style = 'text-easter-purple';
		$btn_class = 'btn-purple';
	}
?>
<section class="section section-product waypoint-group" data-nav-effect="true" data-navigator='dark' data-navigator-up='dark'>
	<div class="container">
		<div class="img-section">
			<picture>
				<source media="(max-width:768px)" srcset="<?php echo $picture_mobile['url']; ?>">
				<source media="(min-width:769px)" srcset="<?php echo $picture['url']; ?>">
				<img class="img-fluid"  src="<?php echo $picture['url']; ?>" alt="<?php echo $picture_mobile['alt']; ?>">
			</picture>
		</div>
		<div class="text-center">
			<?php the_text($name, '<h2 class="the-title '. $text_style .' text-style-2">', '</h2>'); ?>
			<?php if(have_rows('feature_list')): ?>
			<div class="infos-list">
				<?php while (have_rows('feature_list')): the_row(); ?>
				<?php if(get_sub_field('text')): ?>
				<div class="infos-item">
					<h6 class="<?php echo $text_style; ?> text-style-12"><?php the_sub_field('name');?></h6>
					<h5 class="text-style-5"><?php the_sub_field('text'); ?></h5>
				</div>
				<?php endif; ?>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>
			<?php if($button_link): ?>
			<a class="btn btn-outline-primary btn-lg btn-wrapper <?php echo $btn_class; ?>" href="<?php echo $button_link['url']; ?>" target="<?php echo $button_link['target']; ?>">
				<span><?php echo $button_link['title']; ?></span>
			</a>
			<?php endif; ?>
		</div>
	</div>
</section>
