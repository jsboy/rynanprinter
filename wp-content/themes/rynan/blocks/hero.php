<?php
	$background_image = get_field('background_image');
	$hero_welcome = get_field('hero_welcome');
	$hero_text = get_field('hero_text');
	$video = get_field('video');
	$video_url = ($video)?$video:'#';
?>
<section class="section py-0" id="section01">
	<div id="main-banner" class='waypoint-group' data-nav-effect="true" data-navigator='white' data-navigator-up='white'>
		<div class="main-banner-item" style="background-image: url(<?php echo $background_image['url']; ?>)">
			<div class="container">
				<div class="main-banner-item-text">
					<h5 class="text-style-9 text-primary"><?php the_text($hero_welcome); ?></h5>
					<?php the_text($hero_text, '<h1 class="banner-title text-white text-style-1">', '</h1>'); ?>
				</div>
				<a class="play-video" data-fancybox href="<?php echo $video_url ?>">
					<i class="fas fa-play"></i>
					<span class="circletype-animation">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/ic-play.svg" alt="">
					</span>
				</a>
			</div>
			<div class="mouse"></div>
		</div>
	</div>
</section>
