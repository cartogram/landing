<?php

	/* ========================================================================================================================
	
	Cartogram Post Types and Taxonomies Functions v.1.0
	
	======================================================================================================================== */

	function create_post_types() {
		
		$labels = array(
			'name' => __( 'Products' ),
			'singular_name' => __( 'Product' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Product' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Product' ),
			'new_item' => __( 'New Product' ),
			'view' => __( 'View Product' ),
			'view_item' => __( 'View Product' ),
			'search_items' => __( 'Search Products' ),
			'not_found' => __( 'No Products found' ),
			'not_found_in_trash' => __( 'No Products found in Trash' ),
			'parent' => __( 'Parent Product' ),
		);
		
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => true,		
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'taxonomies' => array('category'),
			'menu_position' => null,
			'supports' => array('title', 'editor', 'thumbnail')
		); 	
		
		register_post_type( 'products' , $args );
		flush_rewrite_rules( false );
	}

	function create_taxonomies() {
		$labels = array(
	    	'name' => __( 'Designer' ),
	    	'singular_name' => __( 'Designer' ),
	    	'search_items' =>  __( 'Search Designers' ),
	    	'all_items' => __( 'All Designers' ),
	    	'parent_item' => __( 'Parent Designer' ),
	    	'parent_item_colon' => __( 'Parent Designer:' ),
	    	'edit_item' => __( 'Edit Designer' ),
	    	'update_item' => __( 'Update Designer' ),
	    	'add_new_item' => __( 'Add New Designer' ),
	    	'new_item_name' => __( 'New Designer Name' )
	  	); 	

		$manufacturerlabels = array(
	    	'name' => __( 'Manufacturer' ),
	    	'singular_name' => __( 'Manufacturer' ),
	    	'search_items' =>  __( 'Search Manufacturers' ),
	    	'all_items' => __( 'All Manufacturers' ),
	    	'parent_item' => __( 'Parent Manufacturer' ),
	    	'parent_item_colon' => __( 'Parent Manufacturer:' ),
	    	'edit_item' => __( 'Edit Manufacturer' ),
	    	'update_item' => __( 'Update Manufacturer' ),
	    	'add_new_item' => __( 'Add New Manufacturer' ),
	    	'new_item_name' => __( 'New Manufacturer Name' )
	  	); 	

	  	register_taxonomy('manufacturer','products',array(
	    	'hierarchical' => false,
	    	'labels' => $manufacturerlabels
	  	));

	  	register_taxonomy('designer','products',array(
	    	'hierarchical' => false,
	    	'labels' => $labels
	  	));

		flush_rewrite_rules( false );
	}
?>