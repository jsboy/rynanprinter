<?php

	$effects = get_field('effects', $post->ID);
	$current = $effects['current']?$effects['current']:'white';
	$up = $effects['up']?$effects['up']:'dark';
?>
			</main>
			<!-- <?php if(is_front_page()):  ?>
			<div id="indicator">
				<ul>
					<li class="active">01</li>
					<li>02</li>
					<li>03</li>
					<li>04</li>
					<li>05</li>
					<li>06</li>
					<li>07</li>
					<li>08</li>
					<li>09</li>
				</ul>
			</div>
			<?php endif; ?> -->
			<footer id="footer" class='waypoint-group' data-nav-effect="true" data-navigator='<?php echo $current; ?>' data-navigator-up='<?php echo $up; ?>'>
				<section class="section">
					<div class="container">
						<div class="row">
							<div class="col-xl-10 offset-xl-1">
								<div class="text-center">
									<h2 class="logo">
										<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-color.svg" alt="">
									</h2>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="footer-nav">
											<h6 class="text-style-7 text-primary"><?php _e('Company'); ?></h6>
											<?php
											wp_nav_menu(array(
													'theme_location' => 'footer',
													'container' => 'ul',
													'menu_class' => 'list-unstyled',
											)); ?>
										</div>
									</div>
									<div class="col-md-4">
										<div class="footer-nav">
											<h6 class="text-style-7 text-primary"><?php _e('Products'); ?></h6>
											<?php
											$terms = get_terms( array(
													'taxonomy' => 'product-category',
													'hide_empty' => false,
											) );
											?>
											<ul class="list-unstyled">
												<?php
													foreach ($terms as $term):
												?>

												<li>
													<a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a>
												</li>
												<?php endforeach; ?>
											</ul>
										</div>
									</div>
									<div class="col-md-4">
										<div class="footer-nav">
											<h6 class="text-style-7 text-primary"><?php _e('Follow RYNAN'); ?></h6>
											<?php
											$socials = get_field('socials', 'option');
											if($socials):
												?>
												<ul class="list-unstyled">
													<?php if($socials['facebook']): ?>
														<li><a href="<?php echo $socials['facebook']; ?>">Facebook</a></li>
													<?php endif; ?>
													<?php if($socials['twitter']): ?>
														<li><a href="<?php echo $socials['twitter']; ?>">Twitter</a></li>
													<?php endif; ?>
													<?php if($socials['instagram']): ?>
														<li><a href="<?php echo $socials['instagram']; ?>">Instagram</a></li>
													<?php endif; ?>
													<?php if($socials['linkedin']): ?>
														<li><a href="<?php echo $socials['linkedin']; ?>">LinkedIn</a></li>
													<?php endif; ?>
													<?php if($socials['youtube']): ?>
														<li><a href="<?php echo $socials['youtube']; ?>">Youtube</a></li>
													<?php endif; ?>
												</ul>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<div class="text-center">
									<h6 class="text-style-11 copyright text-grey">© 2020 RYNAN Technologies Pte Ltd. All rights reserved.</h6>
								</div>
							</div>
						</div>
					</div>
				</section>
			</footer>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
