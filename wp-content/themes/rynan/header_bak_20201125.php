<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title><?php wp_title(); ?></title>
	<?php
	wp_head();
	?>
</head>
<body class="on-popup">
<?php
	$socials = get_field('socials', 'option');
	$dark_style = (is_front_page())?'style="height: 0;"':'';
?>
<div id="loading">
	<div class="container text-center">
		<i class="loading-icon"></i>
		<div class="loading-text">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="text-lg">
						<span class="loading-message">Loading</span>
						<span class="loading-dots"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="progress">
		<div class="progress-bar bg-primary progressLoading" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
</div>
<div class="wrapper" id="wrapper">
	<div class="collapse" id="main-nav">
		<div class="main-nav-wrapper">
			<div class="container">
				<?php
				wp_nav_menu(array(
						'theme_location' => 'primary',
						'container' => 'ul',
						'menu_class' => 'main-menu list-unstyled',
				));
				$login = get_field('login', 'option');
				$login_url = $login?$login:'#';
				?>
				<div class="mb-3">
					<a class="btn-login" href="<?php echo $login_url; ?>">
						<i class="icons icon-login"></i><?php _e('Login'); ?>
					</a>
				</div>
				<div class="extra-nav d-block d-sm-none">
					<?php

					if($socials):
						?>
						<div class="socials">
							<?php if($socials['facebook']): ?>
								<a class="icons" href="<?php echo $socials['facebook']; ?>">
									<i class="fab fa-facebook-f"></i>
								</a>
							<?php endif; ?>
							<?php if($socials['twitter']): ?>
								<a class="icons" href="<?php echo $socials['twitter']; ?>">
									<i class="fab fa-twitter"></i>
								</a>
							<?php endif; ?>
							<?php if($socials['instagram']): ?>
								<a class="icons" href="<?php echo $socials['instagram']; ?>">
									<i class="fab fa-instagram"></i>
								</a>
							<?php endif; ?>
							<?php if($socials['linkedin']): ?>
								<a class="icons" href="<?php echo $socials['linkedin']; ?>">
									<i class="fab fa-linkedin-in"></i>
								</a>
							<?php endif; ?>
							<?php if($socials['youtube']): ?>
								<a class="icons" href="<?php echo $socials['youtube']; ?>">
									<i class="fab fa-youtube"></i>
								</a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
				<div id="language-menu" class="row"><?php do_action('wpml_add_language_selector'); ?></div>
				<h6 class="text-style-11 copyright text-grey">© 2020 RYNAN Technologies Pte Ltd. All rights reserved.</h6>
			</div>
		</div>
	</div>
	<header class="header" id="header">
		<div class="header__blocks header__block-white">
			<div class="top-line"></div>
			<div class="bottom-line"></div>
			<div class="header__block-wrap">
				<a class="navbar-brand" href="<?php echo home_url('/') ;?>">
					<img class="img-fluid d-none" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="#">
				</a>
				<div class="hamburger" data-toggle="collapse" data-target="#main-nav">
					<div class="hamburger__container">
						<div class="hamburger__inner"></div>
						<div class="hamburger__hidden"></div>
					</div>
				</div>
				<div class="extra-nav d-none d-sm-block">
					<?php

					if($socials):
						?>
						<div class="socials">
							<?php if($socials['facebook']): ?>
								<a class="icons" href="<?php echo $socials['facebook']; ?>">
									<i class="fab fa-facebook-f"></i>
								</a>
							<?php endif; ?>
							<?php if($socials['twitter']): ?>
								<a class="icons" href="<?php echo $socials['twitter']; ?>">
									<i class="fab fa-twitter"></i>
								</a>
							<?php endif; ?>
							<?php if($socials['instagram']): ?>
								<a class="icons" href="<?php echo $socials['instagram']; ?>">
									<i class="fab fa-instagram"></i>
								</a>
							<?php endif; ?>
							<?php if($socials['linkedin']): ?>
								<a class="icons" href="<?php echo $socials['linkedin']; ?>">
									<i class="fab fa-linkedin-in"></i>
								</a>
							<?php endif; ?>
							<?php if($socials['youtube']): ?>
								<a class="icons" href="<?php echo $socials['youtube']; ?>">
									<i class="fab fa-youtube"></i>
								</a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header>
	<div class="fixed-top-right">
		<a class="btn-login" href="<?php echo $login_url; ?>">
			<i class="icons icon-login"></i><?php _e('Login'); ?>
		</a>
		<?php do_action('wpml_add_language_selector'); ?>
	</div>
	<main class="main">
