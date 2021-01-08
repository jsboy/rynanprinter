<?php
get_header();
?>

<section class="section section-top waypoint-group" data-nav-effect="true" data-navigator='dark' data-navigator-up='dark'>
	<div class="container">
		<div class="section-heading">
			<h3 class="the-title text-primary text-style-3"><?php single_term_title(); ?></h3>
		</div>
		<div class="row product-list">
			<?php
			while ( have_posts() ) : the_post();
				$postId = get_the_ID();
				$terms = get_the_terms( $postId, 'product-category' );
				$catName = $terms[0]->name;
				$product_image = get_field('product_image');
				$product_thumb = (get_field('product_thumb'))? get_field('product_thumb') : $product_image;
				$specifications_list = get_field('specifications_list');
				?>
				<a href="<?php the_permalink();?>" class="col-md-3 product-item <?php echo naming_clazz($catName); ?>">
					<div class="card card-product">
						<!--w:440 h:320-->
						<div class="product-thumb">
							<?php the_image($product_thumb, 'card-img-top'); ?>
						</div>
						<div class="card-body">
							<h6 class="text-primary text-style-9"><?php echo $catName; ?></h6>
							<h5 class="card-title text-dusk text-style-5"><?php the_title(); ?></h5>
							<?php if($specifications_list): ?>
								<div class="card-text">
									<?php
									_e('Printheads: Up to ');
									echo $specifications_list['print_heads'].'<br>';
									_e('Print speed: ');
									echo $specifications_list['print_speed'].'<br>';
									_e('Resolution: ');
									echo $specifications_list['resolution'];
									?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</a>
			<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>>
</section>
<?php
get_footer();
