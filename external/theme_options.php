<?php
	/* ========================================================================================================================
	
	Cartogram Theme Options
	
	======================================================================================================================== */

	function cartogram_general()
	{
	    include '../admin/admin-options-general.php';
	}

	/**
	 * Add the admin menu
	 *
	 */
	function cartogram_admin_menu()
	{
	    add_menu_page( 'Cartogram', 'Cartogram', 'manage_options', 'cartogram', 'cartogram_general' );
		add_submenu_page( 'cartogram', 'Cartogram', 'General', 'manage_options', 'cartogram', 'cartogram_general');
	}

	/**
	 * Load the admin Assets
	 *
	 */
	function cartogram_admin_assets()
	{
	    if( is_admin() )
	    {
	        wp_enqueue_script( 'jquery-ui-sortable' );
	        wp_enqueue_style( 'cartogram-admin', get_bloginfo( 'template_directory' ) . '/admin/css/cartogram-options.css', NULL, NULL, NULL );
	        wp_enqueue_script( 'cartogram-admin', get_bloginfo( 'template_directory' ) . '/admin/js/cartogram-utils.js', 'jquery', NULL, true );
	    }
	}    

	/**
	 * Theme Dev Mode
	 *
	 */
	function cartogram_devmode() {
		$cartogram_general = get_option( '_cartogram_general' );
		if($cartogram_general) return $cartogram_general['devmode'];
	}

	/**
	 * Theme Footer
	 *
	 */
	function cartogram_footer() {
		$cartogram_general = get_option( '_cartogram_general' );
	    if($cartogram_general) echo stripslashes($cartogram_general['footer']);
	}

	/**
	 * Theme Header
	 *
	 */
	function cartogram_header() {
		$cartogram_general = get_option( '_cartogram_general' );
	    if($cartogram_general) echo stripslashes($cartogram_general['header']);
	}

	/**
	 * Theme Description
	 *
	 */
	function cartogram_desciption() {
		$cartogram_general = get_option( '_cartogram_general' );
	    if($cartogram_general) echo stripslashes($cartogram_general['description']);
	}