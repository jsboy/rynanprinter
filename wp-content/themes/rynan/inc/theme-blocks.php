<?php
add_action('acf/init', 'aib_acf_init');
function aib_acf_init()
{

    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name' => 'product-heading',
            'title' => __('Product heading'),
            'description' => __('Product heading block'),
            'render_callback' => 'flexible_content_blocks_render_callback',
            'category' => 'formatting',
            'mode' => 'edit',
            'supports' => array('mode' => false, 'align' => false),
            'keywords' => array('product-heading'),
        ));

        acf_register_block(array(
            'name' => 'text-media',
            'title' => __('Text & media'),
            'description' => __('Evaluate Text & media block'),
            'render_callback' => 'flexible_content_blocks_render_callback',
            'category' => 'formatting',
            'mode' => 'edit',
            'supports' => array('mode' => false, 'align' => false),
            'keywords' => array('text-media'),
        ));
        acf_register_block(array(
            'name' => 'columns',
            'title' => __('Columns'),
            'description' => __('Columns layout block'),
            'render_callback' => 'flexible_content_blocks_render_callback',
            'category' => 'formatting',
            'mode' => 'edit',
            'supports' => array('mode' => false, 'align' => false),
            'keywords' => array('columns'),
        ));

		acf_register_block(array(
				'name' => 'about',
				'title' => __('About block'),
				'description' => __('About block'),
				'render_callback' => 'flexible_content_blocks_render_callback',
				'category' => 'formatting',
				'mode' => 'edit',
				'supports' => array('mode' => false, 'align' => false),
				'keywords' => array('about'),
		));

        acf_register_block(array(
            'name' => 'teams',
            'title' => __('Teams'),
            'description' => __('Teams block'),
            'render_callback' => 'flexible_content_blocks_render_callback',
            'category' => 'formatting',
            'mode' => 'edit',
            'supports' => array('mode' => false, 'align' => false),
            'keywords' => array('teams'),
        ));

        acf_register_block(array(
            'name' => 'cta',
            'title' => __('CTA'),
            'description' => __('CTA block'),
            'render_callback' => 'flexible_content_blocks_render_callback',
            'category' => 'formatting',
            'mode' => 'edit',
            'supports' => array('mode' => false, 'align' => false),
            'keywords' => array('cta'),
        ));

		acf_register_block(array(
				'name' => 'complex',
				'title' => __('Complex'),
				'description' => __('Complex block'),
				'render_callback' => 'flexible_content_blocks_render_callback',
				'category' => 'formatting',
				'mode' => 'edit',
				'supports' => array('mode' => false, 'align' => false),
				'keywords' => array('complex'),
		));

        acf_register_block(array(
            'name' => 'hero',
            'title' => __('Hero'),
            'description' => __('Hero block'),
            'render_callback' => 'flexible_content_blocks_render_callback',
            'category' => 'formatting',
            'mode' => 'edit',
            'supports' => array('mode' => false, 'align' => false),
            'keywords' => array('hero'),
        ));

        acf_register_block(array(
            'name' => 'feature-product',
            'title' => __('Feature products'),
            'description' => __('Feature product block'),
            'render_callback' => 'flexible_content_blocks_render_callback',
            'category' => 'formatting',
            'mode' => 'edit',
            'supports' => array('mode' => false, 'align' => false),
            'keywords' => array('feature-productt'),
        ));
    }
}

function flexible_content_blocks_render_callback($block)
{

    $slug = str_replace('acf/', '', $block['name']);
    if (file_exists(get_theme_file_path("/blocks/{$slug}.php"))) {
        include(get_theme_file_path("/blocks/{$slug}.php"));
    }
}

add_filter( 'allowed_block_types', 'funct_allowed_block_types', 10, 2 );

function funct_allowed_block_types( $allowed_blocks, $post ) {
    $template_file = get_post_meta($post->ID, '_wp_page_template', true);
    if ( $post->post_type === 'post' || $template_file === 'template-simple-content.php') {
        return array( 
            'core/paragraph', 
            'core/heading', 
            'core/list', 
            'core/image', 
            'core/table',
            'core/columns',
		    'core-embed/vimeo',
            'core-embed/youtube',
			'acf/hero',
			'acf/feature-product',
			'acf/text-media',
			'acf/cta',
			'acf/complex',
			'acf/product-heading',
			'acf/about',
			'acf/teams',
			'acf/columns',
        );
    }
    return array(
		'core/paragraph',
		'core/heading',
		'acf/hero',
        'acf/feature-product',
        'acf/text-media',
		'acf/cta',
		'acf/complex',
		'acf/product-heading',
		'acf/about',
		'acf/teams',
		'acf/columns',
    );

}


// Register Custom Post Type Product
function create_product_cpt() {

	$labels = array(
			'name' => _x( 'Products', 'Post Type General Name', 'textdomain' ),
			'singular_name' => _x( 'Product', 'Post Type Singular Name', 'textdomain' ),
			'menu_name' => _x( 'Products', 'Admin Menu text', 'textdomain' ),
			'name_admin_bar' => _x( 'Product', 'Add New on Toolbar', 'textdomain' ),
			'archives' => __( 'Product Archives', 'textdomain' ),
			'attributes' => __( 'Product Attributes', 'textdomain' ),
			'parent_item_colon' => __( 'Parent Product:', 'textdomain' ),
			'all_items' => __( 'All Products', 'textdomain' ),
			'add_new_item' => __( 'Add New Product', 'textdomain' ),
			'add_new' => __( 'Add New', 'textdomain' ),
			'new_item' => __( 'New Product', 'textdomain' ),
			'edit_item' => __( 'Edit Product', 'textdomain' ),
			'update_item' => __( 'Update Product', 'textdomain' ),
			'view_item' => __( 'View Product', 'textdomain' ),
			'view_items' => __( 'View Products', 'textdomain' ),
			'search_items' => __( 'Search Product', 'textdomain' ),
			'not_found' => __( 'Not found', 'textdomain' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
			'featured_image' => __( 'Featured Image', 'textdomain' ),
			'set_featured_image' => __( 'Set featured image', 'textdomain' ),
			'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
			'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
			'insert_into_item' => __( 'Insert into Product', 'textdomain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Product', 'textdomain' ),
			'items_list' => __( 'Products list', 'textdomain' ),
			'items_list_navigation' => __( 'Products list navigation', 'textdomain' ),
			'filter_items_list' => __( 'Filter Products list', 'textdomain' ),
	);
	$args = array(
			'label' => __( 'Product', 'textdomain' ),
			'description' => __( '', 'textdomain' ),
			'labels' => $labels,
			'menu_icon' => '',
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields'),
			'taxonomies' => array('product-category'),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => true,
			'hierarchical' => false,
			'exclude_from_search' => false,
			'show_in_rest' => true,
			'rest_base' => 'product',
			'publicly_queryable' => true,
			'capability_type' => 'post',
	);
	register_post_type( 'product', $args );

}
add_action( 'init', 'create_product_cpt', 0 );

// Register Taxonomy Product category
function create_productcategory_tax() {

	$labels = array(
			'name'              => _x( 'Product Categories', 'taxonomy general name', 'textdomain' ),
			'singular_name'     => _x( 'Product category', 'taxonomy singular name', 'textdomain' ),
			'search_items'      => __( 'Search Product Categories', 'textdomain' ),
			'all_items'         => __( 'All Product Categories', 'textdomain' ),
			'parent_item'       => __( 'Parent Product category', 'textdomain' ),
			'parent_item_colon' => __( 'Parent Product category:', 'textdomain' ),
			'edit_item'         => __( 'Edit Product category', 'textdomain' ),
			'update_item'       => __( 'Update Product category', 'textdomain' ),
			'add_new_item'      => __( 'Add New Product category', 'textdomain' ),
			'new_item_name'     => __( 'New Product category Name', 'textdomain' ),
			'menu_name'         => __( 'Product category', 'textdomain' ),
	);
	$args = array(
			'labels' => $labels,
			'description' => __( '', 'textdomain' ),
			'hierarchical' => true,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => false,
			'show_in_quick_edit' => true,
			'show_admin_column' => false,
			'show_in_rest' => true,
	);
	register_taxonomy( 'product-category', array('product'), $args );

}
add_action( 'init', 'create_productcategory_tax' );


