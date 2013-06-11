<?php
	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/custom_post_types_taxonomies.php' );
	require_once( 'external/media.php' );
	require_once( 'external/navigation.php' );
	require_once( 'external/utilities.php' );
	require_once( 'external/gravity_forms.php' );
	require_once( 'external/comments.php' );

	/* ========================================================================================================================
	
	Navigation Menus
	
	======================================================================================================================== */

	register_nav_menus( array(
		'main' => 'Main Navigation Menu',
		'footer' => 'Footer Navigation Menu',

	) );

	/* ========================================================================================================================
	
	Define Widgetized Areas
	
	======================================================================================================================== */

	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'description' => __('This is the default widget area for the sidebar. This will be displayed if the other sidebars have not been populated with widgets.', 'cartogram'),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));


	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 */
	function cartogram_scripts() {
		wp_deregister_script('jquery');

		wp_register_script( 'modernizr', get_template_directory_uri().'/javascripts/modernizr.cartogram.js', NULL , NULL, NULL );
		wp_enqueue_script( 'modernizr' );

		wp_register_script( 'app', get_template_directory_uri().'/javascripts/cartogram.min.js', false, false, true);
		wp_enqueue_script( 'app' );

		wp_register_style( 'normalize', get_template_directory_uri().'/stylesheets/normalize.css', '', '', 'screen' );
        wp_enqueue_style( 'normalize' );

		wp_register_style( 'screen', get_template_directory_uri().'/stylesheets/app.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );

        if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') ) {
			wp_enqueue_script( 'comment-reply' );
        }
	}	

	/* ========================================================================================================================
	
	Images

	- Set thumbnail sizes and add any additional featured images.
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	add_image_size('cartogram_post_thumb_big',800, 500, true);
	
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
		//remove_filter('term_description','wpautop');	

	/**
	 * Theme Parts
	 *
	 **/
	
	/**
	 * Admin
	 *
	 **/

	/**
	 * Gravity Forms
	 *
	 **/
	add_filter("gform_submit_button", "form_submit_button", 10, 2);
	
	/**
	 * Comments
	 *
	 **/


	/* ========================================================================================================================
	
	Custom Stuff
	
	======================================================================================================================== */

	add_theme_support( 'woocommerce' );

?>