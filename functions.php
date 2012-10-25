<?php
	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/custom_post_types_taxonomies.php' );
	require_once( 'external/media.php' );
	require_once( 'external/multiple_featured_images.php' );
	require_once( 'external/widgets.php' );
	require_once( 'external/navigation.php' );
	require_once( 'external/utilities.php' );
	require_once( 'external/metaboxes.php' );
	require_once( 'external/comments.php' );
	require_once( 'external/theme_options.php' );
	require_once( 'external/gravity_forms.php' );

	/* ========================================================================================================================
	
	Navigation Menus
	
	======================================================================================================================== */

	register_nav_menus( array(
		'main' => 'Main Navigation Menu',
		'footer' => 'Footer Navigation Menu'
	) );

	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 */
	function cartogram_scripts() {
        wp_deregister_script('jquery');
        wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js');
	    wp_enqueue_script( 'jquery' );
        

		wp_register_script( 'modernizr', get_template_directory_uri() . '/javascripts/modernizr.foundation.js', NULL, NULL, NULL);
		wp_enqueue_script( 'modernizr' );

		wp_register_script( 'app', get_template_directory_uri().'/javascripts/index-ck.js', NULL, NULL, NULL );
		wp_enqueue_script( 'app' );

		wp_register_style( 'screen', get_template_directory_uri().'/stylesheets/app.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	

	/* ========================================================================================================================
	
	Images

	- Set thumbnail sizes and add any additional featured images.
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');

	set_post_thumbnail_size(100, 100, true);

	add_image_size('cartogram_post_thumb_big',470, 9000, false);
	add_image_size('cartogram_post_thumb_big_cropped',470, 340, true);

	add_image_size('cartogram_post_thumb_small', 300, 180, true);
	add_image_size('cartogram_post_thumb_tiny', 220, 140, true);
	add_image_size('cartogram_slideshow_image_full', 1000, 444, true);

	new MultiPostThumbnails(array(
		'label' => 'Slideshow Image',
		'id' => 'slideshow_image',
		'post_type' => 'products'
		)
	);

	/* ========================================================================================================================
	
	Call Everthing!

	- Put all Hooks (actions/filters/etc) in one place.
	
	======================================================================================================================== */

	/**
	 * Scripts
	 *
	 **/
	add_action( 'wp_enqueue_scripts', 'cartogram_scripts' );

	/**
	 * Post types and taxonomies
	 *
	 **/
	add_action( 'init', 'create_post_types' );
	add_action( 'init', 'create_taxonomies' );
	
	/**
	 * Classes
	 *
	 **/
	add_filter( 'body_class', 'add_slug_to_body_class' );

	/**
	 * Content
	 *
	 **/
	add_filter('the_excerpt', 'excerpt_ellipsis');
	add_filter('the_content', 'cartogram_remove_more_link');
	add_action('the_content', 'add_video_containers');
		
		/**
		 * Shortcodes
		 *
		 **/
		add_shortcode('button', 'cartogram_button');
		add_shortcode('flex-video', 'cartogram_flexVideo');
		add_shortcode('slideshow', 'cartogram_slideshow');

		/**
		 * Other
		 *
		 **/	
		remove_filter('term_description','wpautop');	

	/**
	 * Theme Parts
	 *
	 **/
	add_action('wp_footer','cartogram_footer');
	add_action('wp_header','cartogram_header');
	
	/**
	 * Admin
	 *
	 **/
	add_action( 'admin_menu', 'cartogram_admin_menu' ); 
	add_action( 'init', 'cartogram_admin_assets' );	

	/**
	 * Gravity Forms
	 *
	 **/
	add_filter("gform_submit_button", "form_submit_button", 10, 2);


?>