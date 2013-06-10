<?php

	/* ========================================================================================================================
	
	Cartogram Post Types and Taxonomies Functions v.1.0
	
	======================================================================================================================== */

	function create_post_types() {

		$slide_labels = array(
			'name' => __( 'Slides' ),
			'singular_name' => __( 'Slide' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Slide' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Slide' ),
			'new_item' => __( 'New Slide' ),
			'view' => __( 'View Slide' ),
			'view_item' => __( 'View Slide' ),
			'search_items' => __( 'Search Slides' ),
			'not_found' => __( 'No Slide found' ),
			'not_found_in_trash' => __( 'No Slides found in Trash' ),
			'parent' => __( 'Parent Slide' ),
		);
		
		$slide_args = array(
			'labels' => $slide_labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => true,		
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title', 'editor', 'thumbnail')
		); 	
		
		register_post_type( 'slides' , $slide_args );

		flush_rewrite_rules( false );

	}

	function create_taxonomies() {
	
		$labels = array(
	    	'name' => __( 'Client' ),
	    	'singular_name' => __( 'Client' ),
	    	'search_items' =>  __( 'Search Clients' ),
	    	'all_items' => __( 'All Clients' ),
	    	'parent_item' => __( 'Parent Client' ),
	    	'parent_item_colon' => __( 'Parent Client:' ),
	    	'edit_item' => __( 'Edit Client' ),
	    	'update_item' => __( 'Update Client' ),
	    	'add_new_item' => __( 'Add New Client' ),
	    	'new_item_name' => __( 'New Client Name' )
	  	);
	  	register_taxonomy('client','case-study',array(
	    	'hierarchical' => true,
	    	'labels' => $labels
	  	));
		flush_rewrite_rules( false );
	}
?>