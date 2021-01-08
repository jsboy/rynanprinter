<?php
	get_header();
?>
	<section class="section waypoint-group" data-nav-effect="true" data-navigator='dark' data-navigator-up='dark'>
		<div class="container">
			<div class="content text-center">
				<div class="section-heading">
					<h2 class="the-title text-dusk text-style-3">
						404
					</h3>
				</div>

				<div class="post-content text-block-content">
					<p>We couldn't find this cont!</p>
					<a class="btn btn-outline-primary btn-lg btn-wrapper" href="<?php echo home_url('/'); ?>">
						<span><?php _e('Home'); ?></span>
					</a>
				</div>
			</div>
		</div>
	</section>

<?php
	
	get_footer();
