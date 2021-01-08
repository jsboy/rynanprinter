<?php
$title = get_field('title');
$button_link = get_field('button_link');
$effects = get_field('effects');
$current = $effects['current']?$effects['current']:'dark';
$up = $effects['up']?$effects['up']:'white';
?>
<section class="section section-cta waypoint-group" data-nav-effect="true" data-navigator='<?php echo $current; ?>' data-navigator-up='<?php echo $up; ?>'>
	<div class="container">
		<div class="row">
			<div class="col-xl-10 offset-xl-1">
				<div class="text-center">
					<div class="section-heading">
						<?php the_text($title, '<h3 class="the-title text-primary text-style-3">', '</h3>'); ?>
					</div>
					<?php if($button_link): ?>
					<a class="btn btn-outline-secondary btn-lg btn-wrapper" href="<?php echo $button_link['url'];?>" target="<?php echo $button_link['target'];?>">
						<span><?php echo $button_link['title'];?></span>
					</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
