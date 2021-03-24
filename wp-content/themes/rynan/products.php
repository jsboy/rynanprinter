<?php
/*
 * Template Name: Products
 *
 * */
get_header();
$product_cats = get_terms(array('taxonomy'=>'product-category', 'hide_empty' => false));
$args = array(
	'post_type' => 'product',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC',
);

$query = new WP_Query( $args );
?>
	<section class="section section-top waypoint-group" data-nav-effect="true" data-navigator='dark' data-navigator-up='dark'>
		<div class="container">
			<div class="section-heading">
				<h3 class="the-title text-primary text-style-3"><?php _e('RYNAN Products'); ?></h3>
			</div>
			<div class="dropdown products-dropdown d-block d-sm-none">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				All
				</button>
				<div class="dropdown-menu dropdown-cat" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item active" href="#" data-filter="*">All</a>
					<?php foreach ($product_cats as $cat): ?>
						<a class="dropdown-item" href="#" data-filter=".<?php echo naming_clazz($cat->slug) ;?>"><?php echo $cat->name; ;?></a>
					<?php endforeach; ?>
				</div>
			</div>
			<ul class="nav nav-pills nav-fill product-nav nav-lg d-none d-sm-inline-flex">
				<li class="nav-item">
					<a class="nav-link active" href="#" data-filter="*">All</a>
				</li>
				<?php foreach ($product_cats as $cat): ?>
				<li class="nav-item">
					<a class="nav-link" href="#" data-filter=".<?php echo naming_clazz($cat->slug) ;?>"><?php echo $cat->name; ;?></a>
				</li>
				<?php endforeach; ?>
			</ul>
			<div class="row product-list">
			<?php
				while ( $query->have_posts() ) : $query->the_post();
					$postId = get_the_ID();
					$terms = get_the_terms( $postId, 'product-category' );
					$catName = ($terms[0]->slug)?$terms[0]->name:'Uncategorized';
					$product_image = get_field('product_image');
					$product_thumb = (get_field('product_thumb'))? get_field('product_thumb') : $product_image;
					$specifications_list = get_field('specifications_list');
			?>
				<a href="<?php the_permalink();?>" class="col-md-4 product-item <?php echo naming_clazz($catName); ?>">
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
								$i = 0;
								foreach ($specifications_list as $name => $value) :
									if($i >=  3)  {
										break;
									}
									if($value) {
										$subfield = get_sub_field_object($name);
										echo '<!--';
										the_text($subfield);
										echo '-->';
										echo '<strong>';
										echo $subfield['label'];
										echo '</strong>';
										echo $value . '<br>';
										// echo 'Up to '.$specifications_list['print_heads'].'<br>';
										$i++;
									}
								// echo '<strong>';
								// _e('Print speed: ');
								// echo '</strong>';
								// echo $specifications_list['print_speed'].'<br>';
								// echo '<strong>';
								// _e('Resolution: ');
								// echo '</strong>';
								// echo $specifications_list['resolution'];
								endforeach;
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
		</div>
	</section>
<?php
get_footer();
