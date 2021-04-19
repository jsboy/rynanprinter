<?php
	get_header();
	while (have_posts()): the_post();
		$product_image = get_field('product_image');
		$heading = get_field('heading');
		$description = get_field('short_description');
		$feature_introduction = get_field('feature_introduction');
		$pictures = get_field('pictures');
		$brochure = get_field('brochure');
		$video = get_field('video');
		$features_icon = get_field('features_icon');

?>
	<section class="section section-top waypoint-group" data-nav-effect="true" data-navigator='dark' data-navigator-up='dark'>
		<div class="container text-center">
			<div class="section-heading mb-xl">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<h3 class="the-title text-primary text-style-3"><?php the_title(); ?></h3>
						<?php the_text($heading, '<h4 class="the-title text-dusk text-style-4 mb-0">', '</h4>'); ?>
					</div>
				</div>
			</div>
			<div class="img-section mb-lg">
				<?php the_image($product_image, 'img-fluid'); ?>
			</div>
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<?php the_text($description, '<div class="mb-md text-style-6 font-light">', '</div>'); ?>
					<div class="text-center btn-action">
						<?php if($video): ?>
						<a class="btn btn-outline-primary btn-lg btn-wrapper btn-blue" data-fancybox href="<?php echo $video; ?>">
							<span><?php _e('Watch Video'); ?></span>
						</a>
						<?php endif; ?>
						<?php if($brochure): ?>
						<a class="btn btn-outline-primary btn-lg btn-wrapper" href="<?php echo $brochure['url']; ?>" target="_blank">
							<span><?php _e('Product Brochure'); ?></span>
						</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="section section-background section-160 waypoint-group" data-nav-effect="true" data-navigator='white' data-navigator-up='dark'>
		<div class="container">
			<?php if(have_rows('features')): ?>
			<div class="section-block section-text-block-wide">
				<h3 class="the-title text-primary text-style-3"><?php _e('Key Features'); ?></h3>
				<div class="text-block-content mb-xl">
					<div class="row">
						<div class="col-lg-8">
							<?php the_text($feature_introduction, '<div class="mb-lg text-style-6 text-content-lightgrey">', '</div>'); ?>
							<?php
							
								while (have_rows('features')): the_row();
									$subfields = get_field('features');
									foreach ($subfields as $name => $value) :
										if($value){
											$subfield = get_sub_field_object($name);
											the_text($subfield['label'], '<div class="h6 text-style-7 text-info mb-3">', '</div>');
											the_text( $value, '<div class="mb-sm text-style-6 text-content-lightgrey">', '</div>');
										}
										
									endforeach;
								endwhile;
							
							?>
						</div>
						<div class="col-lg-4 d-flex-center">
							<?php the_image($features_icon, 'img-full'); ?>
						</div>
					</div>
				</div>
				<hr class="my-0">
			</div>
			<?php endif; 
			if(have_rows('benefits_list')):
			?>
			<div class="section-text-block-wide">
				<h3 class="the-title text-primary text-style-3"><?php _e('Benefits'); ?></h3>
				<div class="text-block-content">
					<?php
						while (have_rows('benefits_list')): the_row();
							$subfields = get_field('benefits_list');
							foreach ($subfields as $name => $value) :
								$subfield = get_sub_field_object($name);
								if($value){
								echo '<div class="row">
										<div class="col-lg-3">
											<div class="h6 text-style-7 text-info py-3">'.$subfield['label'].'</div>
										</div>
										<div class="col-lg-9 text-style-6 pt-2 text-content-lightgrey">'.$value.'</div>
									</div>';
								}
							endforeach;
						endwhile;
					
					?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</section>
	<?php if(!empty($pictures)): ?>
	<section class="section product-slider waypoint-group" data-nav-effect="true" data-navigator='dark' data-navigator-up='white'>
		<div class="container">
			<div class="mb-md text-center">
				<h3 class="the-title text-primary text-style-3">Gallery</h3>
			</div>
			<div class="slick-carousel" data-slick='{"arrows":false,"dots":true,"infinite":false,"slidesToShow":3,"slidesToScroll":1,"responsive":[{"breakpoint":768,"settings":{"infinite":false,"slidesToShow":2,"slidesToScroll":1}},{"breakpoint":480,"settings":{"infinite":false,"slidesToShow":1.2,"slidesToScroll":1}}]}'>
				<?php
					foreach ($pictures as $picture):?>
				<div class="slider-item">
					<div class="product-slider-item">
						<div class="slider-thumb">
							<!--w:413 h:360-->
							<img src="<?php echo $picture['url'] ;?>" class="card-img-top" alt="<?php echo $picture['alt'] ;?>">
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div  class="text-center slide-to-view-more">
				slide to view more
			</div>
		</div>
	</section>
	<?php endif; ?>
	<?php if(have_rows('specifications_list')): ?>
	<section class="section waypoint-group" data-nav-effect="true" data-navigator='dark' data-navigator-up='dark'>
		<div class="container">
			<div class="mb-md text-center">
				<h3 class="the-title text-primary text-style-3"><?php _e('Specifications'); ?></h3>
			</div>
			<div class="row row-service">
				<div class="col-lg-6">
					<?php
				
					while (have_rows('specifications_list')): the_row();
						$subfields = get_field('specifications_list');
						$size = floor(count($subfields)/2);
						$i = 0;
						foreach ($subfields as $name => $value) :
							$subfield = get_sub_field_object($name);
							if($value) {
							$value = str_replace('<ul>', '<ul class="list-plus">', $value, $count);
							if($count <= 0){
								$value = '<ul class="list-plus"><li>'. $value .'</li></ul>';
							}
					?>
					<div class="product-specifications">
					<?php
						
							the_text($subfield['label'], '<h6 class="text-style-9 text-primary text-uppercase">', '</h6>');
							the_text( $value );
						
					?>
					</div>
				<?php
							}
							if($i == $size) {
								echo '</div><div class="col-lg-6">';
							}
							$i++;
						endforeach;
					endwhile;
				
				?>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
<?php

	endwhile;
	get_footer();
