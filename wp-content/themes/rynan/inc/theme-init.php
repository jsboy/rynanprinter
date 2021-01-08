<?php
function theme_assets(){
    $root_css = get_template_directory_uri().'/assets/css/';
    $root_js = get_template_directory_uri().'/assets/js/';

    wp_enqueue_style('fontawesome', $root_css . 'fontawesome.css');
    wp_enqueue_style('vendor', $root_css.'vendors.css');
    wp_enqueue_style('fancy', $root_css.'jquery.fancybox.min.css');
    wp_enqueue_style('main', $root_css.'template.css');

    wp_enqueue_script('jquery', $root_js . 'jquery.js', array(), false, true);
    wp_enqueue_script('proper', $root_js . 'popper.min.js', array(), false, true);
    wp_enqueue_script('bootstrap', $root_js . 'bootstrap.js', array(), false, true);
    wp_enqueue_script('slick', $root_js . 'slick.js', array(), false, true);
    wp_enqueue_script('wow', $root_js . 'wow.min.js', array(), false, true);
    wp_enqueue_script('fancybox', $root_js . 'jquery.fancybox.min.js', array(), false, true);
    wp_enqueue_script('scrollmagic', $root_js . 'ScrollMagic.min.js', array(), false, true);
    wp_enqueue_script('gsap', $root_js . 'animation.gsap.min.js', array(), false, true);
    wp_enqueue_script('isotope', $root_js.'isotope.js', array(), false, true);
    wp_enqueue_script('waypoint', $root_js.'jquery.waypoints.min.js', array(), false, true);
    wp_enqueue_script('imageloaded', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', array(), false, true);
    wp_enqueue_script('main', $root_js.'main.js', array('jquery'), false, true);
}

add_action('wp_enqueue_scripts', 'theme_assets');

function register_my_menu()
{
    register_nav_menu('primary', __('Header'));
    register_nav_menu('footer', __('Footer'));
}

add_action('init', 'register_my_menu');

if (function_exists('acf_add_options_page')) {

    acf_add_options_page();

}

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

add_theme_support( 'title-tag' );

function binary_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
    if ( !$crop ) return null;
    
    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
    
    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);
    
    $s_x = floor( ($orig_w - $crop_w) / 2 );
    $s_y = floor( ($orig_h - $crop_h) / 2 );
    
    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
    }
add_filter( 'image_resize_dimensions', 'binary_thumbnail_upscale', 10, 6 );

add_theme_support( 'post-thumbnails', array( 'page', 'post' ) );
add_post_type_support( 'page', 'excerpt' );

add_action('init', 'do_output_buffer');
function do_output_buffer() {
    ob_start();
}

add_action('init', 'register_my_menu');

// Register Sidebars
function custom_sidebars() {

	$args = array(
			'id'            => 'language',
			'class'         => 'language-swicher',
			'name'          => __( 'Language', 'text_domain' ),
			'description'   => __( 'language', 'text_domain' ),
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_sidebars' );
