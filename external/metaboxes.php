<?php

	/* ========================================================================================================================
	
	Cartogram MetaBoxes v.1.0
	
	======================================================================================================================== */

	$prefix = "_cartogram_";

	$home_slideshow_options = array(
		
			"in_slideshow" => array(
	    	"type" => "checkbox",
			"name" => $prefix."in_home_slideshow",
	    	"std" => "",
	    	"title" => __('Include in Home Page Slideshow','themetrust'),
	    	"description" => __('Display this in the home page slideshow.','themetrust'))	
	);


	$product_options = array(
	    	"on_hompage" => array(
	    	"type" => "checkbox",
			"name" => $prefix."on_hompage",
	    	"std" => "",
	    	"title" => __('Homepage Bottom','themetrust'),
	    	"description" => __('Display on the Homepage.','themetrust')),

			"tagline" => array(
	    	"type" => "textfield",
			"name" => $prefix."tagline",
	    	"std" => "",
	    	"title" => __('Tagline','themetrust'),
	    	"description" => __('Enter the tagline of this product.','themetrust')),

	    	"in_clearance" => array(
	    	"type" => "checkbox",
			"name" => $prefix."in_clearance",
	    	"std" => "",
	    	"title" => __('Clearance','themetrust'),
	    	"description" => __('Display in the Clearance section.','themetrust'))
	);
	$database_options = array(
	    	"architonic_source" => array(
	    	"type" => "textfield",
			"name" => $prefix."architonic_source",
	    	"std" => "",
	    	"title" => __('Architonic Source','themetrust'),
	    	"description" => __('Paste the Architonic Source into the field above.','themetrust'))
	);



	$meta_box_groups = array($home_slideshow_options, $product_options, $database_options);

	function new_meta_box($post, $metabox) {	
		
		$meta_boxes_inputs = $metabox['args']['inputs'];

		foreach($meta_boxes_inputs as $meta_box) {
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
			if($meta_box_value == "") $meta_box_value = $meta_box['std'];
			
			echo'<div class="meta-field">';
			
			echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
			
			echo'<p><strong>'.$meta_box['title'].'</strong></p>';
			
			if(isset($meta_box['type']) && $meta_box['type'] == 'checkbox') {
			
				if($meta_box_value == 'true') {
					$checked = "checked=\"checked\"";
				} elseif($meta_box['std'] == "true") {	
						$checked = "checked=\"checked\"";	
				} else {
						$checked = "";
				}
			
				echo'<p class="clearfix"><input type="checkbox" class="meta-radio" name="'.$meta_box['name'].'_value" id="'.$meta_box['name'].'_value" value="true" '.$checked.' /> ';		
				echo'<label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p><br />';		
			
			} elseif(isset($meta_box['type']) && $meta_box['type'] == 'textarea')  {			
				
				echo'<textarea rows="4" style="width:98%" name="'.$meta_box['name'].'_value" id="'.$meta_box['name'].'_value">'.$meta_box_value.'</textarea><br />';			
				echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p><br />';			
			
			} else {
				
				echo'<input style="width:70%"type="text" name="'.$meta_box['name'].'_value" id="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" /><br />';		
				echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p><br />';			
			
			}
			
			echo'</div>';
			
		} // end foreach
			
		echo'<br style="clear:both" />';
		
	} // end meta boxes

	function create_meta_box() {	
		global $home_slideshow_options, $product_options, $database_options;	
		
		if ( function_exists('add_meta_box') ) {				
			add_meta_box( 'new-meta-boxes-home-slideshow', __('Home Slideshow Options','themetrust'), 'new_meta_box', 'products', 'normal', 'high', array('inputs'=>$home_slideshow_options) );
			add_meta_box( 'new-meta-boxes-video', __('Product Options','themetrust'), 'new_meta_box', 'products', 'normal', 'high', array('inputs'=>$product_options) );
			add_meta_box( 'new-meta-boxes-video', __('Architonic Options','themetrust'), 'new_meta_box', 'page', 'normal', 'high', array('inputs'=>$database_options) );

		}
	}



	function save_postdata( $post_id ) {
	global $post, $new_meta_boxes, $meta_box_groups;

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return $post_id;
	}

	if( defined('DOING_AJAX') && DOING_AJAX ) { //Prevents the metaboxes from being overwritten while quick editing.
		return $post_id;
	}

	if( ereg('/\edit\.php', $_SERVER['REQUEST_URI']) ) { //Detects if the save action is coming from a quick edit/batch edit.
		return $post_id;
	}

	foreach($meta_box_groups as $group) {
		foreach($group as $meta_box) {

			// Verify
			if(isset($_POST[$meta_box['name'].'_noncename'])){
				if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
					return $post_id;
				}
			}

			if ( isset($_POST['post_type']) && 'page' == $_POST['post_type'] ) {
				if ( !current_user_can( 'edit_page', $post_id ))
					return $post_id;
			} else {
				if ( !current_user_can( 'edit_post', $post_id ))
					return $post_id;
			}

			$data = "";
			if(isset($_POST[$meta_box['name'].'_value'])){
				$data = $_POST[$meta_box['name'].'_value'];
			}

			if(get_post_meta($post_id, $meta_box['name'].'_value') == "") 
				add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
			elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
				update_post_meta($post_id, $meta_box['name'].'_value', $data);
			elseif($data == "" || $data == $meta_box['std'] )
				delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
		
			} // end foreach
		} // end foreach
	} // end save_postdata

	add_action('admin_menu', 'create_meta_box');
	add_action('save_post', 'save_postdata');
	
